@php
    $navbar = [
        'homepage' => 'Home',
        'barang.index' => 'Barang',
        'supplier.index' => 'Supplier',
        'pelanggan.index' => 'Pelanggan',
        'tipe-barang.index' => 'Tipe Barang',
        'faktur-jual.laporan' => 'Laporan Penjualan',
        'faktur-beli.laporan' => 'Laporan Pembelian',
        'mutasi-stok.mutasi' => 'Mutasi Stok'



    ];

    $dropdown = [
        'Transaksi' => [
            'faktur-jual.index' => 'Penjualan',
            'faktur-beli.index' => 'Pembelian',
            'pembayaran-hutang.index' => 'Pembayaran Hutang',
            'pelunasan-piutang.index' => 'Pelunasan piutang'





        ]
    ]
@endphp
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('homepage') }}">Mill</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav mr-auto">
                    @foreach ($navbar as $routeKey => $label)
                        @php
                            $activeNavbar = '';
                            if ($routeKey === 'homepage') {
                                $activeNavbar = url()->current() === route($routeKey) ? 'active' : '';
                            } else if (strpos(url()->current(), route($routeKey)) === false) {
                                $activeNavbar = '';
                            } else {
                                $activeNavbar = 'active';
                            }
                        @endphp
                        <li class="nav-item {{ $activeNavbar }}">
                            <a class="nav-link" href="{{route($routeKey)}}">{{$label}}</a>
                        </li>
                    @endforeach
                    @foreach ($dropdown as $dropdownKey => $dropdownChildren)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $dropdownKey }}
                            </a>
                            <div class="dropdown-menu">
                                @foreach ($dropdownChildren as $dcKey => $dcLabel)
                                    <a class="dropdown-item" href="{{route($dcKey)}}">{{$dcLabel}}</a>
                                @endforeach
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>
