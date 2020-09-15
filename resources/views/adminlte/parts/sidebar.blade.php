<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
        <img src="adminlte/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('manufacturers.index') }}" class="nav-link {{ Route::currentRouteNamed('manufacturers.index', 'manufacturers.create', 'manufacturers.edit') ? 'active' : null }}">
                        <i class="nav-icon fas fa-industry"></i>
                        <p>{{ __('admin.sidebar.manufacturers') }}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link {{ Route::currentRouteNamed('categories.index', 'categories.create', 'categories.edit') ? 'active' : null }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>{{ __('admin.sidebar.categories') }}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('trademarks.index') }}" class="nav-link {{ Route::currentRouteNamed('trademarks.index', 'trademarks.create', 'trademarks.edit') ? 'active' : null }}">
                        <i class="nav-icon fas fa-trademark"></i>
                        <p>{{ __('admin.sidebar.trademarks') }}</p>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteNamed('countries.index', 'countries.create', 'countries.edit', 'cities.index', 'cities.create', 'cities.edit') ? 'menu-open' : null }}">
                    <a href="#" class="nav-link {{ Route::currentRouteNamed('countries.index', 'countries.create', 'countries.edit', 'cities.index', 'cities.create', 'cities.edit') ? 'active' : null }}">
                        <i class="nav-icon fas fa-globe-europe"></i>
                        <p>
                            {{ __('admin.sidebar.countries') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('countries.index') }}" class="nav-link {{ Route::currentRouteNamed('countries.index', 'countries.create', 'countries.edit') ? 'active' : null }}">
                                <i class="nav-icon fas fa-flag"></i>
                                <p>{{ __('admin.sidebar.countries') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('cities.index') }}" class="nav-link {{ Route::currentRouteNamed('cities.index', 'cities.create', 'cities.edit') ? 'active' : null }}">
                                <i class="nav-icon fas fa-city"></i>
                                <p>{{ __('admin.sidebar.cities') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('states.index') }}" class="nav-link {{ Route::currentRouteNamed('states.index', 'states.create', 'states.edit') ? 'active' : null }}">
                                <i class="nav-icon fas fa-city"></i>
                                <p>{{ __('admin.sidebar.states') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ Route::currentRouteNamed('users.index', 'users.create', 'users.edit', 'userstypes.index', 'userstypes.create', 'userstypes.edit') ? 'menu-open' : null }}">
                    <a href="#" class="nav-link {{ Route::currentRouteNamed('users.index', 'users.create', 'users.edit', 'userstypes.index', 'userstypes.create', 'userstypes.edit') ? 'active' : null }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ __('admin.sidebar.users') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link {{ Route::currentRouteNamed('users.index', 'users.create', 'users.edit') ? 'active' : null }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>{{ __('admin.sidebar.users') }}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('userstypes.index') }}" class="nav-link {{ Route::currentRouteNamed('userstypes.index', 'userstypes.create', 'userstypes.edit') ? 'active' : null }}">
                                <i class="nav-icon fas fa-user-shield"></i>
                                <p>{{ __('admin.sidebar.users types') }}</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admins.index') }}" class="nav-link {{ Route::currentRouteNamed('admins.index', 'admins.create', 'admins.edit') ? 'active' : null }}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>{{ __('admin.sidebar.admins') }}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.settings') }}" class="nav-link {{ Route::currentRouteNamed('admin.settings') ? 'active' : null }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        
                        <p>{{ __('admin.settings.title') }}</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>