<?php

namespace App\View\Components\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Spinner extends Component {
    public $type;
    public $class;
    public $icon;
    public $loadingTarget;
    public $loadingTargetRemove;
    public $isDisabled;

    /**
     * Create a new component instance.
     */
    public function __construct($type = 'button', $class = 'btn btn-primary', $icon = null, $loadingTarget = null, $loadingTargetRemove = null, $isDisabled = false) {
        $this->type = $type;
        $this->class = $class;
        $this->icon = $icon;
        $this->loadingTarget = $loadingTarget;
        $this->loadingTargetRemove = $loadingTargetRemove ?: $loadingTarget;
        $this->isDisabled = $isDisabled;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.button.spinner');
    }
}
