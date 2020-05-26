<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if(Request::is('admin*'))
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.category.index') }}" class="nav-link {{ Request::is('admin/category*') ? 'active' : '' }}">
              <i class="fas fa-circle nav-icon"></i>
              <p>
               Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.product.index') }}" class="nav-link {{ Request::is('admin/product*') ? 'active' : '' }}">
              <i class="fas fa-circle nav-icon"></i>
              <p>
               Product
              </p>
            </a>
          </li>
          
          <li class="nav-header">Setting Option</li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>
               Setting
              </p>
            </a>
          </li>
         <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>
               User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>
          @endif
        </ul>
      </nav>