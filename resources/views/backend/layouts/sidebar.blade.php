<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('backend.dashboard') }}" class="brand-link">
      <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
      <span class="brand-text font-weight-light">Air Link Cargo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      @if(Request::is('admin*'))
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('backend.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dasboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.settings.create') }}" class="nav-link {{ Request::is('admin/settings') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview 
          @if (Request::is('admin/user/create') || Request::is('admin/user'))
           menu-open
          @endif ">
            <a href="#" class="nav-link 
            @if (Request::is('admin/user/create') || Request::is('admin/user'))
              active
            @endif ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.user.create') }}" class="nav-link {{ Request::is('admin/user/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.user.index') }}" class="nav-link {{ Request::is('admin/user') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview 
          @if (Request::is('admin/awb/create') || Request::is('admin/awb'))
           menu-open
          @endif ">
            <a href="#" class="nav-link 
            @if (Request::is('admin/awb/create') || Request::is('admin/awb'))
              active
            @endif ">
              <i class="nav-icon fas fa-plane"></i>
              <p>
                Air Way Bill
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.awb.create') }}" class="nav-link {{ Request::is('admin/awb/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Storage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.awb.index') }}" class="nav-link {{ Request::is('admin/awb') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Storage List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview 
          @if (Request::is('admin/branch/create') || Request::is('admin/branch'))
           menu-open
          @endif 
          ">
            <a href="#" class="nav-link 
            @if (Request::is('admin/branch/create') || Request::is('admin/branch')) 
              active  
            @endif
            ">
              <i class="nav-icon fas fa-bezier-curve"></i>
              <p>
                Branches
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.branch.create') }}" class="nav-link {{ Request::is('admin/branch/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Branch</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.branch.index') }}" class="nav-link {{ Request::is('admin/branch') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Branch List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview
          @if (Request::is('admin/product/create') || Request::is('admin/product'))
           menu-open
          @endif 
          ">
            <a href="#" class="nav-link
            @if (Request::is('admin/product/create') || Request::is('admin/product')) 
              active  
            @endif
            ">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.product.create') }}" class="nav-link {{ Request::is('admin/product/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.product.index') }}" class="nav-link {{ Request::is('admin/product') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview 
          @if (Request::is('admin/bill/create') || Request::is('admin/bill'))
           menu-open
          @endif 
          ">
            <a href="#" class="nav-link 
            @if (Request::is('admin/bill/create') || Request::is('admin/bill'))
              active
            @endif 
            ">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Billing
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.bill.create') }}" class="nav-link {{ Request::is('admin/bill/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Bill</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.bill.index') }}" class="nav-link {{ Request::is('admin/bill') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Bill</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      @endif
    </div>
    <!-- /.sidebar -->
  </aside>