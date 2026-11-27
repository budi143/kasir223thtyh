
<div class="alert alert-info">
    <i class="fas fa-user-circle mr-1"></i>
    Login sebagai: <b>{{ auth()->user()->email }}</b>
</div>

<div class="row p-2">

    {{-- ============ KARTU STATISTIK ============ --}}
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stat-card tone-indigo">
            <div class="stat-icon"><i class="fas fa-box"></i></div>
            <div class="stat-body">
                <span class="stat-label">Total Produk</span>
                <span class="stat-value">{{ number_format($totalProduk, 0, ',', '.') }}</span>
                <span class="stat-note">Item terdaftar</span>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stat-card tone-emerald">
            <div class="stat-icon"><i class="fas fa-coins"></i></div>
            <div class="stat-body">
                <span class="stat-label">Pendapatan Hari Ini</span>
                <span class="stat-value">Rp {{ number_format($pendapatanHariIni, 0, ',', '.') }}</span>
                <span class="stat-note">Sejak 00:00 hari ini</span>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stat-card tone-sky">
            <div class="stat-icon"><i class="fas fa-receipt"></i></div>
            <div class="stat-body">
                <span class="stat-label">Transaksi Hari Ini</span>
                <span class="stat-value">{{ number_format($transaksiHariIni, 0, ',', '.') }}</span>
                <span class="stat-note">Nota tercetak</span>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stat-card tone-amber">
            <div class="stat-icon"><i class="fas fa-chart-line"></i></div>
            <div class="stat-body">
                <span class="stat-label">Pendapatan Bulan Ini</span>
                <span class="stat-value">Rp {{ number_format($pendapatanBulanIni, 0, ',', '.') }}</span>
                <span class="stat-note">Akumulasi bulan berjalan</span>
            </div>
        </div>
    </div>

    {{-- ============ PRODUK STOK MENIPIS ============ --}}
    <div class="col-lg-6 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="panel-head">
                    <span class="panel-icon tone-amber"><i class="fas fa-exclamation-triangle"></i></span>
                    <h5>Produk Stok Menipis</h5>
                </div>

                @if($produkHabis > 0)
                    <div class="alert alert-danger py-2">
                        <b>{{ $produkHabis }}</b> produk <b>HABIS</b> &mdash; segera restok!
                    </div>
                @endif

                @if($produkMenipis->isEmpty())
                    <p class="text-muted mb-0">Semua produk stoknya aman.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th width="80">Stok</th>
                                    <th width="110"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produkMenipis as $p)
                                    <tr>
                                        <td>{{ $p->name }}</td>
                                        <td>
                                            <span class="badge badge-warning">{{ $p->stok }}</span>
                                        </td>
                                        <td>
                                            <a href="/admin/produk/{{ $p->id }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-plus"></i> Restok
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- ============ PRODUK TERLARIS ============ --}}
    <div class="col-lg-6 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="panel-head">
                    <span class="panel-icon tone-rose"><i class="fas fa-fire"></i></span>
                    <h5>Produk Terlaris</h5>
                </div>

                @if($produkTerlaris->isEmpty())
                    <p class="text-muted mb-0">Belum ada penjualan.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th width="100">Terjual</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produkTerlaris as $pt)
                                    <tr>
                                        <td>{{ $pt->produk->name ?? '(produk dihapus)' }}</td>
                                        <td><b>{{ $pt->total_qty }}</b> pcs</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- ============ TRANSAKSI TERBARU ============ --}}
    <div class="col-12 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="panel-head">
                    <span class="panel-icon tone-sky"><i class="fas fa-receipt"></i></span>
                    <h5 class="flex-grow-1">Transaksi Terbaru</h5>
                    <a href="/admin/transaksi" class="link-more">
                        Lihat semua <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                @if($transaksiTerbaru->isEmpty())
                    <p class="text-muted mb-0">Belum ada transaksi.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Kasir</th>
                                    <th>Pembeli</th>
                                    <th>Total</th>
                                    <th width="60"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksiTerbaru as $t)
                                    <tr>
                                        <td>#{{ str_pad($t->id, 6, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $t->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ $t->kasir_name }}</td>
                                        <td>{{ $t->nama_pembeli ?? '-' }}</td>
                                        <td><b>Rp {{ number_format($t->total, 0, ',', '.') }}</b></td>
                                        <td>
                                            <a href="/admin/transaksi/{{ $t->id }}" class="btn btn-sm btn-info" title="Lihat">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>