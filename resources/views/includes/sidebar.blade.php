<div id="sidebar-container" class="scrollbar_of sidebar-expanded d-none d-md-block">
    <!-- Bootstrap List Group -->
    <ul class="list-group rounded-0">
        <li class="list-group-item sidebar-separator-title d-flex align-items-center menu-collapsed text-light bg-secondary">
            <div class="w-100">
                <small>MAIN MENU</small>
                <a href="{{URL::to('/')}}">
                    <span class="float-end"><i class="fa-solid fa-home mx-2"></i></span>
                </a>
            </div>
        </li>
        <a href="/administration" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center text-light">
                <i class="fa-solid fa-gauge mx-2"></i>
                <span class="menu-collapsed">Dashboard</span>
            </div>
        </a>
        @foreach ($menus as $title => $submenus)
            <li class="list-group-item sidebar-separator-title d-flex align-items-center menu-collapsed text-light bg-secondary">
                <span><small>{{ $title }}</small></span>
            </li>
            @foreach ($submenus as $single_submenu)
                <a href="{{ $single_submenu['url'] }}" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center text-light">
                        <i class="fa-solid fa-{{ $single_submenu['icon'] }} mx-2"></i>
                        <span class="menu-collapsed"> {{ $single_submenu['title'] }}</span>
                    </div>
                </a>
            @endforeach
        @endforeach
    </ul><!-- List Group END-->
</div><!-- sidebar-container END -->