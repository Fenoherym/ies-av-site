<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="https://via.placeholder.com/200x200" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-tachometer-alt"></i>
            <p>
              Mentions
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.filiere.index') }}" class="nav-link">
                <i class="fa fa-circle nav-icon"></i>
                <p>Gestion des mentions</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-tachometer-alt"></i>
            <p>
              Starter Pages
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.blogs.index') }}" class="nav-link">
                <i class="fa fa-circle nav-icon"></i>
                <p>Les actualités</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-circle nav-icon"></i>
                <p>Gestion des mentions</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.blogs.index') }}" class="nav-link">
              <i class="fa fa-circle nav-icon"></i>
              <p>Les actualités</p>
            </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-th"></i>
            <p>
              Simple Link
              {{-- <span class="right badge badge-danger">New</span> --}}
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
