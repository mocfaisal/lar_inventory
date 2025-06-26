<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class MasterMenu extends Model {
    public const CREATED_AT = 'date_create';
    public const UPDATED_AT = 'date_update';

    protected $table = 'cp_menu';
    protected $primaryKey = 'id';
    // protected $fillable = ['*'];
    protected $guarded = ['id'];

    public function parent() {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(self::class, 'parent_id')->where('is_active', '1')->orderBy('sort_no');
    }

    public function childrenRecursive() {
        return $this->children()->with('childrenRecursive');
    }

    public function scopeRootMenus($query) {
        return $query
            ->where(function ($queryz) {
                $queryz->whereNull('parent_id')
                    ->orWhere('parent_id', '0');
            })
            ->where('is_active', '1')->orderBy('sort_no');
    }

    public function isActiveRecursive(string $currentUrl): bool {
        // Check current active item
        if (trim($this->url, '/') === trim($currentUrl, '/')) {
            return true;
        }

        // Check nodes
        foreach ($this->childrenRecursive as $child) {
            if ($child->isActiveRecursive($currentUrl)) {
                return true;
            }
        }

        return false;
    }

    public function getBreadcrumb() {
        $breadcrumb = [];
        $menu = $this;

        while ($menu) {
            $breadcrumb[] = [
                'name' => $menu->name,
                'url' => $menu->url,
            ];
            $menu = $menu->parent;
        }

        return array_reverse($breadcrumb);
    }
}
