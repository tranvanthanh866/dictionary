<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/vendor/AdminLTE3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::user()->avatar != '')
                    <img src="{{asset(Auth::user()->avatar)}}" class="img-circle elevation-2" alt="User Image">
                @else
                    <img src="{{asset('vendor/AdminLTE2/img/flag_VN.png')}}" class="img-circle elevation-2"
                         alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{asset('admin/page')}}" class="nav-link">
                        <i class="nav-icon far fa-bookmark"></i>
                        <p>
                            Page
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{asset('admin/media')}}" class="nav-link">
                        <i class="nav-icon fa fa-file-medical-alt"></i>
                        <p>
                            Media
                        </p>
                    </a>
                </li>
                @can(config('const.permissions.USERS_MANAGE'))
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link nav-toggle">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                User management
                                <i class="right fas fa-angle-left"></i>
                            </p>

                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{asset('admin/permissions')}}" class="nav-link ">
                                    <i class="nav-icon far fa-circle nav-icon"></i>
                                    <p>Permissions</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{asset('admin/roles')}}" class="nav-link ">
                                    <i class="nav-icon far fa-circle nav-icon"></i>
                                    <p>Roles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{asset('admin/users')}}" class="nav-link ">
                                    <i class="nav-icon far fa-circle nav-icon"></i>
                                    <p>User</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                <li class="nav-item ">
                    <a href="{{asset('admin/change_password')}}" class="nav-link">
                        <i class="nav-icon fa fa-key"></i>
                        <p>
                             Thay đổi mật khẩu
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{asset('logout')}}" class="nav-link "
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Thoát
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
