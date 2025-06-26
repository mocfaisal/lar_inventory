<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;

use App\Models\User;
use App\Models\UserManagement\BlockedUserPermission;

use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;

class PermissionHelper {
    protected $CACHE_KEY;

    public function __construct() {
        $this->CACHE_KEY = config('app_custom.cache.sidebar');
    }


    public static function isPermissionBlocked($userId, $permissionName) {
        return BlockedUserPermission::where('user_id', $userId)
            ->whereHas('permission', function ($query) use ($permissionName) {
                $query->where('name', $permissionName);
            })
            ->exists();
    }

    public static function clearCache(): void {
        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }

    public static function clearSidebarMenuCacheForUser(int $userId): void {
        Cache::forget((new self())->CACHE_KEY . $userId);
    }

    public static function clearSidebarMenuCacheForRole(int $roleId): void {
        $role = Role::find($roleId);
        if (!$role) return;

        $users = User::role($role->name)->get();
        foreach ($users as $user) {
            self::clearSidebarMenuCacheForUser($user->id);
        }
    }
}
