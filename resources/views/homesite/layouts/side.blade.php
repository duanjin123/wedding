<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="header-pic img-circle" src="/assets/adminlte/img/head.png"/>
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"></span> <span class="block m-t-xs"> <strong
                                    class="font-bold">test</strong></span>
                        <span class="text-muted text-xs block">admin</span>
                    </a>
                    <button id="openMenu" class="btn btn-primary btn-outline btn-sm">展开全部 <i class="fa fa-plus"></i>
                    </button>
                </div>
                <div class="logo-element">
                    MXJ
                </div>
            </li>
            <li>
                <a id="menu_index" href=""><i class="fa fa-dashboard"></i> <span class="nav-label">首页</span></a>
            </li>
            {{--@if (!empty($page_side_menus))--}}
                {{--@foreach($page_side_menus as $menus)--}}
                    {{--<li>--}}
                        {{--<a href="javascript:;"><i class="{{ $menus['icon'] }}"></i> <span class="nav-label">{{ $menus['module_name'] }}</span> </a>--}}
                        {{--@if (!empty($menus['menus']))--}}
                            {{--<ul class="nav nav-second-level">--}}
                                {{--@foreach($menus['menus'] as $menu)--}}
                                    {{--<li class="menu-item"><a href="{{ $menu['url'] }}"><i class="fa fa-dot-circle-o"></i> {{ $menu['name'] }}</a></li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--@endif--}}
                    {{--</li>--}}
                {{--@endforeach--}}
            {{--@endif--}}
        </ul>

    </div>
</nav>

