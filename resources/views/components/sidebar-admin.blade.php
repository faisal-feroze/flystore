<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
      <div class="sidebar-brand-icon rotate-n-15">
        {{--  <i class="fas fa-laugh-wink"></i>  --}}
      </div>
      <div class="sidebar-brand-text mx-3">Flystore</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Order Informations
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
         aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Products</span>
      </a>
      <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{route('show_products')}}">View All Products</a>
              <a class="collapse-item" href="{{route('add_products')}}">Add New Product</a>
              <!-- <a class="collapse-item" href="">Settings</a> -->
          </div>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="{{route('show_category')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Category</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>All New Orders</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Running Orders</span></a>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Delivered Orders</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Returned Orders</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Payment</span></a>
    </li>

    <!-- <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Paid</span></a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Company/Agents
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>All Customers</span></a>
    </li>

    <!-- Nav Item - Tables -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
