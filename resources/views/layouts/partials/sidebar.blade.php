  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            @can('view-categories', \App\Models\Category::class)
            <li class="nav-item">
              <a href="{{ route('categories.index') }}" class="nav-link {{ request()->is('categories*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Categories
                </p>
              </a>
            </li>              
            @endcan   
            @can('view-subjects', \App\Models\Subject::class)
            <li class="nav-item">
              <a href="{{ route('subjects.index') }}" class="nav-link {{ request()->is('subjects*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Subjects
                </p>
              </a>
            </li>              
            @endcan  
            @can('view-courses', \App\Models\Subject::class)
            <li class="nav-item">
              <a href="{{ route('courses.index') }}" class="nav-link {{ request()->is('courses*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>
                  Courses
                </p>
              </a>
            </li>              
            @endcan    
            @can('view-diplomas', \App\Models\Diploma::class)
            <li class="nav-item">
              <a href="{{ route('diplomas.index') }}" class="nav-link {{ request()->is('diplomas*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-certificate"></i>
                <p>
                  Diplomas
                </p>
              </a>
            </li>              
            @endcan   
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>