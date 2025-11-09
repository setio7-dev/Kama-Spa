<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item {{ request()->path() == 'keuangan/dashboard' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('keuanganDashboard') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>     
    <li class="nav-item {{ request()->path() == 'keuangan/dana' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('keuanganDana') }}">
        <i class="mdi mdi-content-save-all menu-icon"></i>
        <span class="menu-title">Dana</span>
      </a>
    </li> 
    <li class="nav-item {{ request()->path() == 'keuangan/laporan' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('accountingReport') }}">
        <i class="mdi mdi-content-save-all menu-icon"></i>
        <span class="menu-title">Laporan</span>
      </a>
    </li>   
  </ul>
</nav>