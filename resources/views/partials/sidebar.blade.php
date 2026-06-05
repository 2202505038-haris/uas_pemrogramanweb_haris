<aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
  <div class="sidebar-header">
    <a class="brand-mark" href="{{ url('/') }}" aria-label="adminHMD dashboard">
      <span class="brand-icon"><i class="bi bi-grid-1x2-fill" aria-hidden="true"></i></span>
      <span class="brand-copy">
        <span class="brand-title">HARIS GUNAWAN</span>
        <span class="brand-subtitle">RPL_ELEKTROMEDIS_UMPKU</span>
      </span>
    </a>
  </div>

  <nav class="sidebar-nav">
    <a class="nav-link {{ request()->is('dashboard') || request()->is('/') ? 'active' : '' }}" href="{{ url('/dashboard') }}" aria-current="page">
      <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
      <span class="nav-text">Dashboard</span>
    </a>
    
    <a class="nav-link {{ request()->is('alat') || request()->is('alat/*') ? 'active' : '' }}" href="{{ route('alat.index') }}">
      <span class="nav-icon"><i class="bi bi-table" aria-hidden="true"></i></span>
      <span class="nav-text">Data Alat</span>
    </a>

    <a class="nav-link {{ request()->is('alat/create') ? 'active' : '' }}" href="{{ route('alat.create') }}">
      <span class="nav-icon"><i class="bi bi-person-plus" aria-hidden="true"></i></span>
      <span class="nav-text">Tambah Alat</span>
    </a>

    <a class="nav-link" href="#">
      <span class="nav-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
      <span class="nav-text">Users</span>
    </a>

    <a class="nav-link" href="#">
      <span class="nav-icon"><i class="bi bi-person-badge" aria-hidden="true"></i></span>
      <span class="nav-text">Profile</span>
    </a>

    <a class="nav-link" href="#">
      <span class="nav-icon"><i class="bi bi-bar-chart-line" aria-hidden="true"></i></span>
      <span class="nav-text">Charts</span>
    </a>

    <a class="nav-link" href="#">
      <span class="nav-icon"><i class="bi bi-gear" aria-hidden="true"></i></span>
      <span class="nav-text">Settings</span>
    </a>
  </nav>

 <div class="sidebar-user">
    <img class="avatar-img avatar-md sidebar-user-avatar" src="{{ asset('template/assets/images/avatar/profile-haris.jpg') }}" alt="Haris Gunawan">
    {{ auth()->user()?->name }}
    <small>Administrator</small>
</div>

  <div class="sidebar-footer">
    <span class="status-dot"></span>
    <span class="sidebar-footer-text">System running smoothly</span>
  </div>
</aside>
