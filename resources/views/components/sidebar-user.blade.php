<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/user">
      Joytu Construction
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="/user">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Heading -->

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
      Modules
    </div>

    <!-- <li class="nav-item">
      <a class="nav-link" href="/project">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Project</span></a>
    </li> -->

      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
             aria-expanded="true" aria-controls="collapsePages">
              <i class="fas fa-fw fa-chart-area"></i>
              <span>Construction Project</span>
          </a>
          <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="{{route('view_projects')}}">View All Project</a>
                  <a class="collapse-item" href="/project">Create New Project</a>
                  <a class="collapse-item" href="{{route('project_settings_options')}}">Settings</a>
              </div>
          </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-chalkboard"></i>
                <span>Salary Expense</span>
            </a>
            <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('view_all_salary_expense')}}">View Salary Sheet</a>
                    <a class="collapse-item" href="/salary_expense">Create Salary Sheet</a>
                    <a class="collapse-item" href="{{route('salary_setting')}}">Settings</a>
                </div>
            </div>
          </li>

          <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
                 aria-expanded="true" aria-controls="collapsePages">
                  <i class="fas fa-fw fa-coins"></i>
                  <span>Office Expense</span>
              </a>
              <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <a class="collapse-item" href="{{route('view_office_expense')}}">Expense Summary</a>
                      <a class="collapse-item" href="/office_expense">Add Expense</a>
                      <a class="collapse-item" href="">Settings</a>
                  </div>
              </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages4"
                   aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-chess-king"></i>
                    <span>Investment</span>
                </a>
                <div id="collapsePages4" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('view_all_investent')}}">Investment Summary</a>
                        <a class="collapse-item" href="/investment_expense">New Investment</a>
                        <a class="collapse-item" href="{{route('investment_settings')}}">Settings</a>
                    </div>
                </div>
              </li>

              <li class="nav-item">
                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages5"
                     aria-expanded="true" aria-controls="collapsePages">
                      <i class="fas fa-fw fa-chart-area"></i>
                      <span>Admin Setup</span>
                  </a>
                  <div id="collapsePages5" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                      <div class="bg-white py-2 collapse-inner rounded">
                          <a class="collapse-item" href="{{route('show_user')}}">View All Users</a>
                          <a class="collapse-item" href="{{route('user_creation_form')}}">Create New User</a>
                          <a class="collapse-item" href="{{route('create_location_page')}}">Create Locations</a>
                      </div>
                  </div>
                </li>



    <!-- <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Completed Orders</span></a>
    </li> -->


    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Heading -->
    {{--  <div class="sidebar-heading">
      DOCUMENTS
    </div>

    <li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Cash Memos</span></a>
    </li>  --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
