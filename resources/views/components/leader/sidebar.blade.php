<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item {{ request()->path() == 'pimpinan/dashboard' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('leaderDashboard') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>     
    <li class="nav-item {{ request()->path() == 'pimpinan/laporan' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('leaderReport') }}">
        <i class="mdi mdi-content-save-all menu-icon"></i>
        <span class="menu-title">Laporan</span>
      </a>
    </li>    
    <li class="nav-item {{ request()->path() == 'pimpinan/profile' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('leaderProfile') }}">
        <i class="mdi mdi-account menu-icon"></i>
        <span class="menu-title">Profil</span>
      </a>
    </li>
  </ul>
</nav>