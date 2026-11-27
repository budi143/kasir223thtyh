<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link">
        <span class="brand-mark"><i class="fas fa-cash-register"></i></span>
        <span class="brand-text">Toko Anda<small>Point of Sale</small></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-1">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                <li class="nav-section">Utama</li>

                <!-- Dashboard: semua user -->
                <li class="nav-item">
                    <a href="/admin/dashboard"
                       class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Menu khusus Admin -->
                @if(auth()->user()->email == 'admin@gmail.com')

                <li class="nav-section">Master Data</li>

                <!-- User -->
                <li class="nav-item">
                    <a href="/admin/user"
                       class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User</p>
                    </a>
                </li>

                <!-- Kategori -->
                <li class="nav-item">
                    <a href="/admin/kategori"
                       class="nav-link {{ request()->is('admin/kategori*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Kelola Kategori</p>
                    </a>
                </li>

                <!-- Produk -->
                <li class="nav-item">
                    <a href="/admin/produk"
                       class="nav-link {{ request()->is('admin/produk*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Kelola Produk</p>
                    </a>
                </li>

                @endif

                <li class="nav-section">Penjualan</li>

                <!-- Transaksi: semua user -->
                <li class="nav-item">
                    <a href="/admin/transaksi"
                       class="nav-link {{ request()->is('admin/transaksi*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Kelola Transaksi</p>
                    </a>
                </li>

            </ul>
        </nav>

        <!-- Info user -->
        <div class="sidebar-user">
            <span class="avatar">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 2)) }}</span>
            <div class="u-meta">
                <div class="u-name">{{ auth()->user()->name ?? '-' }}</div>
                <div class="u-role">{{ auth()->user()->email == 'admin@gmail.com' ? 'Administrator' : 'Kasir' }}</div>
            </div>
        </div>
    </div>
</aside>

<div class="content-wrapper">