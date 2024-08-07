@php
$WEB_USER = 'https://priludestudio.com/jali/webuser/';
$foto_profile = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->first()
@endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <span class="brand-text font-weight-light">JALI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if ($foto_profile->foto_profile != null)
                    <div style="background:center no-repeat url({{ $WEB_USER . 'public/profile/' . $foto_profile->foto_profile }}); background-size:cover; width:33.6px; height:33.6px;" class="img-circle elevation-2"></div>
                @else
                    <div style="background:center no-repeat url('https://writestylesonline.com/wp-content/uploads/2016/08/Follow-These-Steps-for-a-Flawless-Professional-Profile-Picture.jpg'); background-size:cover; width:33.6px; height:33.6px;" class="img-circle elevation-2"></div>
                @endif
            </div>
            <div class="info">
                <a href="{{url('pengguna/'.base64_encode(session()->get('id_pengguna')))}}" class="d-block">{{session()->get('alamat_email')}}</a>
                <small style="color:white;"><a data-widget="control-sidebar" data-slide="true">{{session()->get('role')}}</a></small>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @php

                include(resource_path('views/menu/menu_admin.php'));

                foreach ($arr_menu as $menu) {
                if ($menu['has_sub']) {
                @endphp
                    <li class="nav-item has-treeview" id="{{ str_replace(' ', '', str_replace('.', '', strtolower($menu['text']))) }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon {{ $menu['icon'] }}"></i>
                            <p>
                                {{ $menu['text'] }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @foreach ($menu['sub_menu'] as $submenu)
                                @if ($submenu['has_sub'])
                                    <li class="nav-item {{ str_replace(' ', '', str_replace('.', '', strtolower($menu['text']))) }} has-treeview" id="{{ str_replace(' ', '', str_replace('.', '', strtolower($submenu['text']))) }}">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon {{ $submenu['icon'] }}"></i>
                                            <p>
                                                {{ $submenu['text'] }}
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            @foreach ($submenu['sub_menu'] as $submenuagain)
                                                <li class="nav-item {{ str_replace(' ', '', str_replace('.', '', strtolower($submenu['text']))) }}" id="{{ $submenuagain['url'] }}_">
                                                    <a href="{{ url($submenuagain['url']) }}" data-toggle="tooltip" data-placement="bottom" title="{{ $submenuagain['text'] }}" class="nav-link {{ $submenuagain['url'] == request()->segment(1) ? 'active' : '' }}">
                                                        <i class="nav-icon {{ $submenuagain['icon'] }}"></i>
                                                        <p>{{ $submenuagain['text'] }}</p>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item {{ str_replace(' ', '', str_replace('.', '', strtolower($menu['text']))) }}" id="{{ $submenu['url'] }}_">
                                        <a href="{{ url($submenu['url']) }}" data-toggle="tooltip" data-placement="bottom" title="{{ $submenu['text'] }}" class="nav-link {{ $submenu['url'] == request()->segment(1) ? "active" : "" }}">
                                            <i class="nav-icon {{ $submenu['icon'] }}"></i>
                                            <p>{{ $submenu['text'] }}</p>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @php
                } else {
                @endphp
                <li class="nav-item">
                    <a href="{{ url($menu['url']) }}" class="nav-link {{ $menu['url'] == request()->segment(1) ? "active" : "" }}">
                        <i class="nav-icon {{ $menu['icon'] }}"></i>
                        <p>{{ $menu['text'] }}</p>
                    </a>
                </li>
                @php
                }
                }
                @endphp
            </ul>
        </nav>
    </div>
</aside>
<script>
    const url = '{{ request()->segment(1) }}'
    const sub_menu = document.getElementById(`${url}_`).classList[1];
    let menu;
    @foreach ($arr_menu as $menu)
        menu = '{{ str_replace(' ', '', str_replace('.', '', strtolower($menu['text']))) }}'
        if (menu == sub_menu) {
            $('#{{ str_replace(' ', '', str_replace('.', '', strtolower($menu['text']))) }}').addClass('menu-open');
        }
        @foreach ($menu['sub_menu'] as $submenu)
            @if ($submenu['has_sub'])
                let submenu = document.getElementById(`{{ str_replace(' ', '', str_replace('.', '', strtolower($submenu['text']))) }}`).classList[1];

                menu = '{{ str_replace(' ', '', str_replace('.', '', strtolower($submenu['text']))) }}'
                if (menu == sub_menu) {
                    $('#{{ str_replace(' ', '', str_replace('.', '', strtolower($submenu['text']))) }}').addClass('menu-open');
                    $(`#${submenu}`).addClass('menu-open');
                }
            @endif
        @endforeach
    @endforeach
</script>