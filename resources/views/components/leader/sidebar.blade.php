<nav class="ks-sidebar" id="ks-sidebar">
  <ul class="ks-sidebar-nav">
    <li class="ks-nav-item {{ request()->path() == 'pimpinan/dashboard' ? 'active' : '' }}">
      <a class="ks-nav-link" href="{{ route('leaderDashboard') }}">
        <i class="icon-grid ks-nav-icon"></i>
        <span class="ks-nav-title">Dashboard</span>
      </a>
    </li>
    <li class="ks-nav-item {{ request()->path() == 'pimpinan/laporan' ? 'active' : '' }}">
      <a class="ks-nav-link" href="{{ route('leaderReport') }}">
        <i class="mdi mdi-content-save-all ks-nav-icon"></i>
        <span class="ks-nav-title">Laporan</span>
      </a>
    </li>
    <li class="ks-nav-item {{ request()->path() == 'pimpinan/profile' ? 'active' : '' }}">
      <a class="ks-nav-link" href="{{ route('leaderProfile') }}">
        <i class="mdi mdi-account ks-nav-icon"></i>
        <span class="ks-nav-title">Profil</span>
      </a>
    </li>
  </ul>
</nav>