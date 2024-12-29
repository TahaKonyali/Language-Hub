<div class="header ">
            
    <!-- START MOBILE SIDEBAR TOGGLE -->
    <a href="#" class="btn-link toggle-sidebar d-lg-none pg-icon btn-icon-link" data-toggle="sidebar">
        menu</a>
    <!-- END MOBILE SIDEBAR TOGGLE -->
    <div class="">
        <div class="brand inline   ">
        </div>
        <ul class="d-lg-inline-block d-none notification-list no-margin d-lg-inline-block no-style p-l-20 p-r-20">
            <li class="p-r-5 inline">
              <a href="#" class="header-icon btn-icon-link menu-button-sidebar">
                <i class="pg-icon">menu</i>
              </a>
            </li>
          </ul>
    </div>
    <div class="d-flex align-items-center">
        <!-- START User Info-->
        <div class="dropdown pull-right d-lg-block d-none">
            <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" aria-label="profile dropdown">
                <span class="thumbnail-wrapper d32 circular inline">
                    <img src="{{ asset('admin_asset/img/profiles/avatar.png') }}" alt=""
                        data-src="{{ asset('admin_asset/img/profiles/avatar.png') }}" width="32" height="32">
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                <a href="#" class="dropdown-item"><span>Signed in as <br /><b> Super Admin</b></span></a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.logout') }}" class="dropdown-item">Logout</a>
                <div class="dropdown-divider"></div>
            </div>
        </div>
    </div>
</div>
