  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">لوحة التحكم</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
      <div style="direction: rtl">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="https://secure.gravatar.com/avatar/5ffa2a1ffeb767c60ab7e1052e385d5c?s=52&d=mm&r=g" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
             <a href="#" class="d-block">{{auth()->user()->name}}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->


                 <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa fa-product-hunt"></i>
                      <p>
                        {{ __('dashboard.attributes.prodcuts') }}
                        <i class="right fa fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">

                            <li class="nav-item">
                            <a href="{{ route('products.index') }}" class="nav-link">
                                <i class="fa fa-product-hunt"></i>
                             <p>{{ __('dashboard.attributes.show') }} {{ __('dashboard.attributes.prodcuts') }}</p>
                            </a>
                          </li>


                    </ul>
                  </li>


                    @if (Gate::allows('admin', auth()->user()))
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-product-hunt"></i>
                          <p>
                            {{ __('dashboard.attributes.categories') }}
                            <i class="right fa fa-angle-left"></i>
                          </p>
                        </a>

                       <ul class="nav nav-treeview">

                            <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <i class="fa fa-product-hunt"></i>
                            <p>{{ __('dashboard.attributes.show') }} {{ __('dashboard.attributes.categories') }}</p>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa fa-users"></i>
                      <p>
                        {{ __('dashboard.attributes.users') }}
                        <i class="right fa fa-angle-left"></i>
                      </p>
                    </a>

                   <ul class="nav nav-treeview">

                        <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="fa fa-users"></i>
                        <p>{{ __('dashboard.attributes.show') }} {{ __('dashboard.attributes.users') }}</p>
                        </a>
                    </li>


                </ul>
            </li>

                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <i class="fa fa-cog"></i>
                      <p>
                        {{ __('dashboard.attributes.setting') }}
                        {{-- <i class="right fa fa-angle-left"></i> --}}
                      </p>
                    </a>


            </li>

                 @endif


          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>
