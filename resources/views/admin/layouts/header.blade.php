<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav align-items-center">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item">
      <div class="navbar-title">
        <span class="t">{{ $title ?? 'Dashboard' }}</span>
        <span class="s">Halo, {{ auth()->user()->name ?? 'Pengguna' }} &middot; {{ now()->locale('id')->translatedFormat('d M Y') }}</span>
      </div>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button" title="Layar penuh">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item d-none d-md-flex">
      <div class="user-chip">
        <span class="avatar">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 2)) }}</span>
        <span class="u-meta">
          <span class="u-name">{{ auth()->user()->name ?? '-' }}</span>
          <span class="u-role">{{ auth()->user()->email == 'admin@gmail.com' ? 'Administrator' : 'Kasir' }}</span>
        </span>
      </div>
    </li>
    <li class="nav-item">
      <form action="/logout" method="POST" class="m-0">
        @csrf
        <button type="submit" class="btn-logout" title="Logout">
          <i class="fas fa-sign-out-alt"></i><span>Logout</span>
        </button>
      </form>
    </li>
  </ul>
</nav>
<!-- /.navbar -->