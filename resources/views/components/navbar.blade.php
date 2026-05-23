<nav class="ks-navbar">
  <div class="ks-navbar-brand">
    <div class="ks-navbar-logo-wrap">
      <img src="{{ asset('/logo.jpg') }}" alt="logo">
    </div>
    <span class="ks-navbar-brand-name">Kama Spa</span>
  </div>

  <div class="ks-navbar-actions">
    <div class="ks-search-wrap d-none d-lg-flex">
      <i class="icon-search ks-search-icon"></i>
      <input type="text" class="ks-search-input" placeholder="Cari...">
    </div>

    <span class="ks-username d-none d-lg-inline">{{ auth()->user()->name }}</span>

    <div class="ks-profile-dropdown">
      <button class="ks-profile-btn" id="profileDropdownBtn">
        <i class="mdi mdi-account"></i>
      </button>
      <div class="ks-dropdown-menu" id="profileDropdownMenu">
        <a href="#" class="ks-dropdown-item"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="ti-power-off"></i> Keluar
        </a>
        <form id="logout-form" action="{{ route('logoutPost') }}" method="POST" style="display:none;">
          @csrf
        </form>
      </div>
    </div>

    <button class="ks-toggler d-lg-none" id="sidebarToggler">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>

<style>
  .ks-navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 100;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 1.5rem;
    background: rgba(14, 12, 9, 0.92);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(210, 180, 130, 0.15);
  }

  .ks-navbar-brand {
    display: flex;
    align-items: center;
    gap: 0.7rem;
    text-decoration: none;
  }

  .ks-navbar-logo-wrap {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    overflow: hidden;
    border: 1px solid rgba(210, 180, 130, 0.35);
    flex-shrink: 0;
  }

  .ks-navbar-logo-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .ks-navbar-brand-name {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.2rem;
    font-weight: 500;
    color: #e8d5b0;
    letter-spacing: 0.15em;
    text-transform: uppercase;
  }

  .ks-navbar-actions {
    display: flex;
    align-items: center;
    gap: 1.2rem;
  }

  .ks-search-wrap {
    display: flex;
    align-items: center;
    background: rgba(255, 250, 244, 0.05);
    border: 1px solid rgba(210, 180, 130, 0.18);
    border-radius: 2px;
    padding: 0.35rem 0.8rem;
    gap: 0.5rem;
  }

  .ks-search-icon {
    color: rgba(210, 180, 130, 0.45);
    font-size: 0.85rem;
  }

  .ks-search-input {
    background: transparent;
    border: none;
    outline: none;
    color: #f0e6d0;
    font-family: 'Jost', sans-serif;
    font-size: 0.82rem;
    font-weight: 300;
    width: 160px;
  }

  .ks-search-input::placeholder {
    color: rgba(210, 180, 130, 0.3);
  }

  .ks-username {
    font-family: 'Jost', sans-serif;
    font-size: 0.78rem;
    letter-spacing: 0.08em;
    color: rgba(210, 180, 130, 0.65);
  }

  .ks-profile-dropdown {
    position: relative;
  }

  .ks-profile-btn {
    background: rgba(210, 180, 130, 0.1);
    border: 1px solid rgba(210, 180, 130, 0.3);
    border-radius: 50%;
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #e8d5b0;
    font-size: 1.1rem;
    cursor: pointer;
    transition: background 0.2s, border-color 0.2s;
  }

  .ks-profile-btn:hover {
    background: rgba(210, 180, 130, 0.2);
    border-color: rgba(210, 180, 130, 0.55);
  }

  .ks-dropdown-menu {
    position: absolute;
    right: 0;
    top: calc(100% + 8px);
    background: rgba(22, 18, 12, 0.97);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(210, 180, 130, 0.18);
    border-radius: 2px;
    min-width: 140px;
    padding: 0.4rem 0;
    display: none;
    z-index: 200;
    animation: fadeDown 0.2s ease;
  }

  @keyframes fadeDown {
    from { opacity: 0; transform: translateY(-6px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .ks-dropdown-menu.open {
    display: block;
  }

  .ks-dropdown-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.6rem 1rem;
    font-family: 'Jost', sans-serif;
    font-size: 0.78rem;
    letter-spacing: 0.08em;
    color: rgba(210, 180, 130, 0.75);
    text-decoration: none;
    transition: background 0.2s, color 0.2s;
  }

  .ks-dropdown-item:hover {
    background: rgba(210, 180, 130, 0.08);
    color: #e8d5b0;
  }

  .ks-toggler {
    background: transparent;
    border: 1px solid rgba(210, 180, 130, 0.25);
    border-radius: 2px;
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #e8d5b0;
    cursor: pointer;
    font-size: 1rem;
  }
</style>

<script>
  const profileBtn = document.getElementById('profileDropdownBtn');
  const profileMenu = document.getElementById('profileDropdownMenu');
  if (profileBtn && profileMenu) {
    profileBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      profileMenu.classList.toggle('open');
    });
    document.addEventListener('click', () => profileMenu.classList.remove('open'));
  }

  const sidebarToggler = document.getElementById('sidebarToggler');
  if (sidebarToggler) {
    sidebarToggler.addEventListener('click', () => {
      document.getElementById('ks-sidebar')?.classList.toggle('open');
    });
  }
</script>