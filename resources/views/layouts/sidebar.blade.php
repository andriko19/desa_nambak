<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{url('index')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('/assets/images/logo-indracode.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('/assets/images/logo-indracode.png') }}" alt="" height="20">
            </span>
        </a>

        <a href="{{url('index')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('/assets/images/logo-indracode.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('/assets/images/logo-indracode.png') }}" alt="" height="20">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">@lang('Home')</li>

                <li>
                    {{-- <a href="{{url('index')}}"> --}}
                    <a href="{{url('admin/dashboard')}}">
                        <i class="uil-home-alt"></i><span class="badge rounded-pill bg-primary float-end">01</span>
                        <span>@lang('translation.Dashboard')</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-user-circle"></i>
                        <span>@lang('Users Management')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href={{ route('users.index') }}>@lang('Users')</a></li>
                        <li><a href={{ route('roles.index') }}>@lang('Roles')</a></li>
                        <li><a href="tables-responsive3">@lang('Access')</a></li>
                           @can('menu-permission')


                        <li><a href={{ route('permissions.index') }}>@lang('Permissions')</a></li> @endcan
                    </ul>
                </li>

                <li class="menu-title">@lang('Master')</li>

                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="uil-database"></i>
                        <span>@lang('Master')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{url('ui/master')}}">@lang('Master User')</a></li>
                        <li><a href="#">@lang('Master Produk')</a></li>
                        <li><a href="#">@lang('Master Bank')</a></li>
                        <li><a href="#">@lang('Master Harga')</a></li>
                    </ul>
                </li>

                <li class="menu-title">@lang('Menu')</li>

                <li>
                    <a href="{{ url('admin/banner') }}">
                        <i class="uil-home-alt"></i>
                        <span>@lang('Banner')</span>
                    </a>
                </li>

                <li class="menu-title">@lang('General Information')</li>

                <li>
                    <a href="{{ route('generals.index') }}">
                        <i class="uil-home-alt"></i>
                        <span>@lang('General')</span>
                    </a>
                </li>


                <li class="menu-title">@lang('Setting')</li>

                <li>
                    <a href="{{url('admin/websetup')}}">
                        <i class="uil-analytics"></i>
                        <span>@lang('Setup Web')</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-database"></i>
                        <span>@lang('Sync Database')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href={{ route('sync-product.index') }}>@lang('Sync Products')</a></li>
                        <li><a href="#">@lang('Sync Orders')</a></li>
                    </ul>
                </li>







            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
