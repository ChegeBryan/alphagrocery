    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
        <div class="sidebar-brand-icon">
          <i class="fas fa-shield-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ Auth::guard('admin')->user()->name }}</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Products Categories
      </div>

      <!-- Nav Item - Product Categories -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
           aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Categories</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Actions:</h6>
            <a class="collapse-item" href="{{ route('category.create') }}">Add Category</a>
            <a class="collapse-item" href="{{ route('category.index') }}">Manage Category</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Product parameters Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubCats"
           aria-expanded="true" aria-controls="collapseSubCats">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Subcategory</span>
        </a>
        <div id="collapseSubCats" class="collapse" aria-labelledby="headingSubCats" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Actions:</h6>
            <a class="collapse-item" href="{{ route('subcategory.create') }}">Add Subcategory</a>
            <a class="collapse-item" href="{{ route('subcategory.index') }}">Manage Subcategories</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepar" aria-expanded="true"
           aria-controls="collapsepar">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Product Parameters</span>
        </a>
        <div id="collapsepar" class="collapse" aria-labelledby="headingpar" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Actions:</h6>
            <a class="collapse-item" href="{{ route('prodparameter.create') }}">Add Parameter</a>
            <a class="collapse-item" href="{{ route('prodparameter.index') }}">Manage Parameters</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
