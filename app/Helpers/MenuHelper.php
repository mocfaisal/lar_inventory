<?php

namespace App\Helpers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

use App\Models\Master\MasterMenu;
use App\Models\User;

class MenuHelper {
    protected $CACHE_KEY;

    public function __construct() {
        $this->CACHE_KEY = config('app_custom.cache.sidebar');
    }

    public static function getMenu_Sidebar(): Collection {
        $userId = auth()->id();
        $cacheKey = (new self())->CACHE_KEY . $userId;

        return Cache::remember($cacheKey, now()->addHours(1), function () use ($userId) {
            // Step 1: Dapatkan semua permission yang dimiliki user (tidak termasuk yang diblokir)
            $user = User::with(['permissions', 'blockedPermissions'])->find($userId);

            $is_super_admin = $user->hasRole('Super Admin');

            // Dapatkan semua permission yang tidak diblokir
            if (!$is_super_admin) {
                // Jika bukan Super Admin, ambil permission yang tidak diblokir
                $userPermissions = $user->getAllPermissions()
                    ->reject(function ($permission) use ($user) {
                        return $user->blockedPermissions->contains('name', $permission->name);
                    })
                    ->pluck('name')
                    ->toArray();

                // Step 2: Ambil semua menu yang diakses user
                $accessibleMenus = MasterMenu::whereNotNull('permission_name')
                    // ->where('permission_name', 'like', '%.menu')
                    // ->whereIn('permission_name', $userPermissions)
                    ->where('is_active', '1')
                    ->get(['id', 'parent_id']);
            } else {
                $accessibleMenus = MasterMenu::whereNotNull('permission_name')
                    ->where('is_active', '1')
                    ->get(['id', 'parent_id']);
            }

            // Step 3: Kumpulkan semua parent_id hingga root
            $menuIds = collect();
            $currentIds = $accessibleMenus->pluck('id');

            // Jika tidak ada menu yang diakses, return collection kosong
            if ($currentIds->isEmpty()) {
                return collect();
            }

            // Gunakan recursive query untuk mendapatkan semua parent
            $allMenuIds = collect();
            $parentIds = $currentIds;

            while (!$parentIds->isEmpty()) {
                $allMenuIds = $allMenuIds->merge($parentIds);

                // Dapatkan parent dari menu saat ini
                $parents = MasterMenu::whereIn('id', $parentIds)
                    ->whereNotNull('parent_id')
                    ->pluck('parent_id')
                    ->unique()
                    ->filter(function ($id) use ($allMenuIds) {
                        return !$allMenuIds->contains($id);
                    });

                $parentIds = $parents;
            }

            // Step 4: Ambil semua menu yang termasuk dalam hierarki akses
            $menus = MasterMenu::whereIn('id', $allMenuIds)
                ->select(
                    'id',
                    'parent_id',
                    'name',
                    'url',
                    'icon',
                    'tooltip',
                    'is_external',
                    'is_navigated',
                    'permission_name'
                )
                ->where('is_active', '1')
                ->orderBy('sort_no')
                ->get();

            // Step 5: Bangun struktur hierarki
            return self::buildMenuTree($menus);
        });
    }

    private static function buildMenuTree(Collection $menus, $parentId = null): Collection {
        return $menus
            ->filter(function ($menu) use ($parentId) {
                return $menu->parent_id == $parentId ||
                    (is_null($parentId) && (is_null($menu->parent_id) || $menu->parent_id == 0));
            })
            ->map(function ($menu) use ($menus) {
                $children = self::buildMenuTree($menus, $menu->id);
                if ($children->isNotEmpty()) {
                    $menu->setRelation('childrenRecursive', $children);
                }
                return $menu;
            })
            ->values();
    }


    public static function clearSidebarMenuCache(int $userId): void {
        Cache::forget((new self())->CACHE_KEY . $userId);
    }

    public static function clearSidebarMenuCacheForAllUsers(): void {
        $prefix = (new self())->CACHE_KEY;

        DB::table('cache')
            ->where('key', 'like', $prefix . '%')
            ->delete();
    }
}
