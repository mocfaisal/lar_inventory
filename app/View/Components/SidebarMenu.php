<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Helpers\MenuHelper;

class SidebarMenu extends Component {
    public $menus;

    /**
     * Create a new component instance.
     */
    public function __construct() {
        $this->menus = MenuHelper::getMenu_Sidebar();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.sidebar-menu');
    }
}
