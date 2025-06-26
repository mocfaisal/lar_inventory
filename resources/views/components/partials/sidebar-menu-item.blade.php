@aware(['url' => null])

@php
    $hasChildren = $item->childrenRecursive && $item->childrenRecursive->count();
    $isExternal = $item->is_external;
    $linkUrl = trim($item->url);
    $is_navigated = $item->is_navigated;
    $currentUrl = Route::current()->getName();
    $isActiveRecursive = $item->isActiveRecursive($currentUrl);

    // dd($isActiveRecursive, $currentUrl, $item->name, $linkUrl);
    // dd(request()->routeIs($linkUrl), $linkUrl, $item->name, $isActiveRecursive);

    if (empty($linkUrl)) {
        $linkUrl = null;
    }

    // Prepare final URL
    try {
        if ($linkUrl) {
            $finalUrl = $isExternal ? $linkUrl : route($linkUrl);
        } else {
            $finalUrl = 'javascript:void(0);';
        }
    } catch (\Exception $e) {
        $finalUrl = url($linkUrl);
    }
@endphp

<div
    class="menu-item{{ $hasChildren ? ' has-sub' : '' }}{{ (!$hasChildren && $isActiveRecursive ? ' active' : $isActiveRecursive) ? ' active expand' : '' }}">
    @if ($hasChildren)
        <a class="menu-link" href="{{ $finalUrl }}">
            @if ($item->icon)
                <div class="menu-icon"><i class="{{ $item->icon }}"></i></div>
            @else
                <div class="menu-icon"><span class="fa fa-bullet-dot"></span></div>
            @endif
            <div class="menu-text">{{ $item->name }}</div>
            <div class="menu-caret"></div>
        </a>

        <div class="menu-submenu">
            @foreach ($item->childrenRecursive as $child)
                @include('components.partials.sidebar-menu-item', ['item' => $child])
            @endforeach
        </div>
    @else
        <a class="menu-link" href="{{ $finalUrl }}" @if ($isExternal) target="_blank" @endif
            @if ($is_navigated) wire:navigate @endif
            @if (!empty($item->tooltip)) data-bs-toggle="tooltip" title="{{ $item->tooltip }}" @endif>
            @if ($item->icon)
                <div class="menu-icon"><i class="{{ $item->icon }}"></i></div>
            @else
                <div class="menu-icon"><span class="fa fa-bullet-dot"></span></div>
            @endif
            <div class="menu-text">{{ $item->name }}</div>
        </a>
    @endif

</div>
