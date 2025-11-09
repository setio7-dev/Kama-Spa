<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item {{ request()->path() == 'admin/dashboard' ? 'active' : '' }}">
      <a class="nav-link" href="/admin/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>    
    <li class="nav-item {{ request()->is('admin/kas-kecil*') ? 'active' : '' }}">
      <a class="nav-link" data-bs-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
        <i class="mdi mdi-book menu-icon"></i>
        <span class="menu-title">Kas Kecil</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="error">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link {{ request()->path() == 'admin/kas-kecil/pengajuan-kas' ? 'active' : '' }}" href="{{ route('adminPengajuan') }}">Req Pengajuan Kas</a></li>
          <li class="nav-item"> <a class="nav-link {{ request()->path() == 'admin/kas-kecil/pengelolaan-kas' ? 'active' : '' }}" href="{{ route('adminPengelolaan') }}">Pengelolaan Kas</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item {{ request()->path() == 'admin/laporan' ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('adminReport') }}">
        <i class="mdi mdi-content-save-all menu-icon"></i>
        <span class="menu-title">Laporan</span>
      </a>
    </li>
  </ul>
</nav>