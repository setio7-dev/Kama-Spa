<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <a class="navbar-brand brand-logo"><img src="{{ asset('/logo.jpg') }}" class="me-3" style="scale: 1.5;" alt="logo" /></a>
    <h6 class="text-primary navbar-brand brand-logo mt-2">Kama Spa</h6>
    <a class="navbar-brand brand-logo-mini"><img style="scale: 1.5;" src="{{ asset('/logo.jpg') }}" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav mr-lg-2">
      <li class="nav-item nav-search d-none d-lg-block">
        <div class="input-group">
          <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
            <span class="input-group-text" id="search">
              <i class="icon-search"></i>
            </span>
          </div>
          <input type="text" class="form-control" id="navbar-search-input" placeholder="Cari..." aria-label="search" aria-describedby="search">
        </div>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">      
      <li class="nav-item nav-profile dropdown" style="transform: translateX(30%);">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
          <i class="mdi mdi-account" style="font-size: 26px;" alt="profile"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a href="#" class="dropdown-item"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="ti-power-off text-primary"></i> Keluar
          </a>
          
          <form id="logout-form" action="{{ route('logoutPost') }}" method="POST" style="display:none;">
            @csrf
          </form>
        </div>
      </li>
      <li class="nav-item nav-settings d-none d-lg-flex" style="margin-right: 14px;">
        {{ auth()->user()->name }}
      </li>
      <li class="nav-item nav-settings d-none d-lg-flex">
        <a class="nav-link" href="#">
          <i class="icon-ellipsis"></i>
        </a>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>