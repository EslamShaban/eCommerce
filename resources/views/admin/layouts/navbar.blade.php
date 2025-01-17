  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{url('/')}}/design/adminlte/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{url('/')}}/design/adminlte/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{url('/')}}/design/adminlte/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-globe"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{aurl('lang/ar')}}" class="dropdown-item">
             عربى
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{aurl('lang/en')}}" class="dropdown-item">
            English
          </a>
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{Storage::url(setting()->logo)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
           <?php $sitename='sitename_'. session('lang'); ?>
      <span class="brand-text font-weight-light">{{ setting()->$sitename }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('/')}}/design/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{admin()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{aurl()}}" class="nav-link <?php if(active_menu('admin')['0'] == '' && active_menu('users')['0'] == '') echo 'active' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{trans('admin.dashboard')}}
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{active_menu('admin')['0']}}">
            <a href="#" class="nav-link {{active_menu('admin')['1']}}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                {{trans('admin.admin')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{aurl('admin')}}" class="nav-link {{active_menu('admin')['1']}}">
                  <i class="far fa-user nav-icon"></i>
                  <p>{{trans('admin.admin')}}</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{active_menu('users')['0']}}">
            <a href="#" class="nav-link {{active_menu('users')['1']}}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                {{trans('admin.users')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{aurl('users')}}" class="nav-link {{ (request('level') == '') ? active_menu('users')['1'] :''}}">
                  <i class="far fa-user nav-icon"></i>
                  <p>{{trans('admin.users')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{aurl('users')}}?level=user" class="nav-link {{ request('level') == 'user' ? 'active' : ''}}">
                  <i class="far fa-user nav-icon"></i>
                  <p>{{trans('admin.user')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{aurl('users')}}?level=company" class="nav-link {{ request('level') == 'company' ? 'active' : ''}}">
                  <i class="far fa-user nav-icon"></i>
                  <p>{{trans('admin.company')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{aurl('users')}}?level=vendor" class="nav-link {{ request('level') == 'vendor' ? 'active' : ''}}">
                  <i class="far fa-user nav-icon"></i>
                  <p>{{trans('admin.vendor')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{active_menu('settings')['0']}}">
            <a href="#" class="nav-link {{active_menu('settings')['1']}}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                {{trans('admin.settings')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{aurl('settings')}}" class="nav-link {{active_menu('settings')['1']}}">
                  <i class="far fa-user nav-icon"></i>
                  <p>{{trans('admin.settings')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{active_menu('countries')['0']}}">
            <a href="#" class="nav-link {{active_menu('countries')['1']}}">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                {{trans('admin.countries')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{aurl('countries')}}" class="nav-link {{active_menu('countries')['1']}}">
                  <i class="far fa-flag nav-icon"></i>
                  <p>{{trans('admin.countries')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{active_menu('cities')['0']}}">
            <a href="#" class="nav-link {{active_menu('cities')['1']}}">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                {{trans('admin.cities')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{aurl('cities')}}" class="nav-link {{active_menu('cities')['1']}}">
                  <i class="far fa-flag nav-icon"></i>
                  <p>{{trans('admin.cities')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{active_menu('states')['0']}}">
            <a href="#" class="nav-link {{active_menu('states')['1']}}">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                {{trans('admin.states')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{aurl('states')}}" class="nav-link {{active_menu('states')['1']}}">
                  <i class="far fa-flag nav-icon"></i>
                  <p>{{trans('admin.states')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{active_menu('departements')['0']}}">
            <a href="#" class="nav-link {{active_menu('departements')['1']}}">
              <i class="nav-icon fas fa-list"></i>
              <p>
                {{trans('admin.departements')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{aurl('departements')}}" class="nav-link {{active_menu('departements')['1']}}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>{{trans('admin.departements')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{aurl('departements/create')}}" class="nav-link {{active_menu('departements')['1']}}">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>{{trans('admin.add')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{active_menu('trademarks')['0']}}">
            <a href="#" class="nav-link {{active_menu('trademarks')['1']}}">
              <i class="nav-icon fas fa-cube"></i>
              <p>
                {{trans('admin.trademarks')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{aurl('trademarks')}}" class="nav-link {{active_menu('trademarks')['1']}}">
                  <i class="fas fa-cube nav-icon"></i>
                  <p>{{trans('admin.trademarks')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{active_menu('manufactories')['0']}}">
            <a href="#" class="nav-link {{active_menu('manufactories')['1']}}">
              <i class="nav-icon fas fa-cube"></i>
              <p>
                {{trans('admin.manufactories')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{aurl('manufactories')}}" class="nav-link {{active_menu('manufactories')['1']}}">
                  <i class="fas fa-cube nav-icon"></i>
                  <p>{{trans('admin.manufactories')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{active_menu('shippings')['0']}}">
            <a href="#" class="nav-link {{active_menu('shippings')['1']}}">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                {{trans('admin.shippings')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{aurl('shippings')}}" class="nav-link {{active_menu('shippings')['1']}}">
                  <i class="fas fa-truck nav-icon"></i>
                  <p>{{trans('admin.shippings')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{active_menu('malls')['0']}}">
            <a href="#" class="nav-link {{active_menu('malls')['1']}}">
              <i class="nav-icon fas fa-building"></i>
              <p>
                {{trans('admin.malls')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{aurl('malls')}}" class="nav-link {{active_menu('malls')['1']}}">
                  <i class="fas fa-building nav-icon"></i>
                  <p>{{trans('admin.malls')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{active_menu('colors')['0']}}">
            <a href="#" class="nav-link {{active_menu('colors')['1']}}">
              <i class="nav-icon fas fa-paint-brush"></i>
              <p>
                {{trans('admin.colors')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{aurl('colors')}}" class="nav-link {{active_menu('colors')['1']}}">
                  <i class="fas fa-paint-brush nav-icon"></i>
                  <p>{{trans('admin.colors')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{active_menu('sizes')['0']}}">
            <a href="#" class="nav-link {{active_menu('sizes')['1']}}">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                {{trans('admin.sizes')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{aurl('sizes')}}" class="nav-link {{active_menu('sizes')['1']}}">
                  <i class="fas fa-info-circle nav-icon"></i>
                  <p>{{trans('admin.sizes')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{active_menu('weights')['0']}}">
            <a href="#" class="nav-link {{active_menu('weights')['1']}}">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                {{trans('admin.weights')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{aurl('weights')}}" class="nav-link {{active_menu('weights')['1']}}">
                  <i class="fas fa-info-circle nav-icon"></i>
                  <p>{{trans('admin.weights')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{active_menu('products')['0']}}">
            <a href="#" class="nav-link {{active_menu('products')['1']}}">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                {{trans('admin.products')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{aurl('products')}}" class="nav-link {{active_menu('products')['1']}}">
                  <i class="fas fa-tags nav-icon"></i>
                  <p>{{trans('admin.products')}}</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>