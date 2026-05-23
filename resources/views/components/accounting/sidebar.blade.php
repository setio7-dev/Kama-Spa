<nav class="ks-sidebar" id="ks-sidebar">
  <ul class="ks-sidebar-nav">
    <li class="ks-nav-item {{ request()->path() == 'keuangan/dashboard' ? 'active' : '' }}">
      <a class="ks-nav-link" href="{{ route('keuanganDashboard') }}">
        <i class="icon-grid ks-nav-icon"></i>
        <span class="ks-nav-title">Dashboard</span>
      </a>
    </li>
    <li class="ks-nav-item {{ request()->path() == 'keuangan/dana' ? 'active' : '' }}">
      <a class="ks-nav-link" href="{{ route('keuanganDana') }}">
        <i class="mdi mdi-cash ks-nav-icon"></i>
        <span class="ks-nav-title">Dana</span>
      </a>
    </li>
    <li class="ks-nav-item {{ request()->path() == 'keuangan/laporan' ? 'active' : '' }}">
      <a class="ks-nav-link" href="{{ route('accountingReport') }}">
        <i class="mdi mdi-content-save-all ks-nav-icon"></i>
        <span class="ks-nav-title">Laporan</span>
      </a>
    </li>
    <li class="ks-nav-item {{ request()->path() == 'keuangan/profile' ? 'active' : '' }}">
      <a class="ks-nav-link" href="{{ route('keuanganProfile') }}">
        <i class="mdi mdi-account ks-nav-icon"></i>
        <span class="ks-nav-title">Profil</span>
      </a>
    </li>
  </ul>
</nav>