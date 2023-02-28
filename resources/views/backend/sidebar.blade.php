<!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item me-auto"><a class="navbar-brand" href="">
              <h2 class="brand-text">Bàn ghế</h2></a></li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a class="d-flex align-items-center" href=""><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards"> Tables-chairs</span></a>
            <ul class="menu-content">
                <li><a class="d-flex align-items-center" href=""><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="eCommerce">Trang chủ</span></a>
              </li>
            </ul>
          </li>
          <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Quản lý &amp; xắp sếp</span><i data-feather="more-horizontal"></i>
          </li>
          {{--  --}}
          </li>
           <li class=" nav-item {{ request()->is('admin/category') ||  request()->is('admin/category/create')  ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href=""><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Danh mục</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center {{ request()->is('admin/category') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('admin.category')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Quản lý danh mục</span></a>
              </li>
              <li><a class="d-flex align-items-center {{ request()->is('admin/category/create') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('admin.createCategory')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Thêm danh mục </span></a>
              </li>
            </ul>
          </li>
          <li class=" nav-item {{ request()->is('admin/banner') ||  request()->is('admin/banner/create')  ? 'has-sub open' : '' }}"><a class="d-flex align-items-center" href=""><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Banner slide</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center {{ request()->is('admin/banner') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('admin.Banner')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Quản lý banner</span></a>
              </li>
              <li><a class="d-flex align-items-center {{ request()->is('admin/banner/create') ? 'bg-primary shadow-lg shadow-primary/30 rounded ' : '' }}" href="{{route('admin.createBanner')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Thêm banner </span></a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a class="d-flex align-items-center" href=""><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Sản phẩm</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center" href="{{route('admin.showProductList')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Quản lý sản phẩm</span></a>
              </li>
              <li><a class="d-flex align-items-center" href="{{route('admin.createProduct')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Thêm sản phẩm </span></a>
              </li>
            </ul>
          </li>
          <!--    -->
          <!--    -->
          <li class=" navigation-header"><span data-i18n="Misc">chỉnh sửa hệ thống </span><i data-feather="more-horizontal"></i>
          </li>
          <!-- <li class=" nav-item"><a class="d-flex align-items-center" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation" target="_blank"><i data-feather="folder"></i><span class="menu-title text-truncate" data-i18n="Documentation">Documentation</span></a>
          </li> -->
          <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="menu"></i><span class="menu-title text-truncate" data-i18n="Menu Levels">Thông tin footer</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center" href=""><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">Chỉnh sửa thông tin</span></a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!-- END: Main Menu-->