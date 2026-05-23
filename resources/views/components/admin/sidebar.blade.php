<nav class="ks-sidebar" id="ks-sidebar">
  <ul class="ks-sidebar-nav">
    <li class="ks-nav-item {{ request()->path() == 'admin/dashboard' ? 'active' : '' }}">
      <a class="ks-nav-link" href="/admin/dashboard">
        <i class="icon-grid ks-nav-icon"></i>
        <span class="ks-nav-title">Dashboard</span>
      </a>
    </li>
    <li class="ks-nav-item {{ request()->is('admin/kas-kecil*') ? 'active' : '' }} has-submenu">
      <a class="ks-nav-link ks-nav-toggle" href="#" onclick="toggleSubmenu(this, event)">
        <i class="mdi mdi-book ks-nav-icon"></i>
        <span class="ks-nav-title">Kas Kecil</span>
        <i class="mdi mdi-chevron-down ks-nav-arrow"></i>
      </a>
      <ul class="ks-submenu {{ request()->is('admin/kas-kecil*') ? 'open' : '' }}">
        <li class="ks-subnav-item">
          <a class="ks-subnav-link {{ request()->path() == 'admin/kas-kecil/pengajuan-kas' ? 'active' : '' }}"
             href="{{ route('adminPengajuan') }}">Req Pengajuan Kas</a>
        </li>
        <li class="ks-subnav-item">
          <a class="ks-subnav-link {{ request()->path() == 'admin/kas-kecil/pengelolaan-kas' ? 'active' : '' }}"
             href="{{ route('adminPengelolaan') }}">Pengelolaan Kas</a>
        </li>
      </ul>
    </li>
    <li class="ks-nav-item {{ request()->path() == 'admin/laporan' ? 'active' : '' }}">
      <a class="ks-nav-link" href="{{ route('adminReport') }}">
        <i class="mdi mdi-content-save-all ks-nav-icon"></i>
        <span class="ks-nav-title">Laporan</span>
      </a>
    </li>
    <li class="ks-nav-item {{ request()->path() == 'admin/profile' ? 'active' : '' }}">
      <a class="ks-nav-link" href="{{ route('adminProfile') }}">
        <i class="mdi mdi-account ks-nav-icon"></i>
        <span class="ks-nav-title">Profil</span>
      </a>
    </li>
  </ul>
</nav>