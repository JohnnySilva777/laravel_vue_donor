<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="/admin" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                    {{--                            <span class="right badge badge-danger">New</span>--}}
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-building"></i>
                <p>
                    Organization
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('organizations.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('organizations.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-building"></i>
                <p>
                    Donors
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('donors.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('donors.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
