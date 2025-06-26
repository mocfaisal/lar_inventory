    @foreach ($menus as $menu)
        @include('components.partials.sidebar-menu-item', ['item' => $menu, 'url' => url()->current()])
    @endforeach
