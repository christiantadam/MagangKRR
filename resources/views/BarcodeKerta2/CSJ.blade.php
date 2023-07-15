@extends('layouts.appABM')
@section('content')
<body onload="Greeting()">
    <div id="app">


        <div class="form-wrapper mt-4">
        <div class="form-container">
        <div class="card">
            <div class="card-header">Cek Surat Jalan</div>
            <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <div class="form berat_woven">
                <form action="#" method="post" role="form">
                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">No. Surat Jalan:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Surat_jalan" id="Surat_jalan" placeholder="Surat Jalan" required>
                            <div class="text-center col-md-auto"><button type="submit">Open</button></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Tanggal:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tanggal" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Truk No. Pol:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Truk_pol" id="Truk_pol" placeholder="No. Pol" required>
                        </div>
                    </div>

                    <div class="card mt-auto">
                    <div class="card-header">Type</div>
                            <table>
                                <tr>
                                    <th>Type </th>
                                    <th>No Barcode </th>
                                    <th>Sub Kelompok </th>
                                    <th>Kelompok </th>
                                    <th>Kode Barang</th>
                                    <th>Noln.. </th>
                                    <th>Primal</th>
                                    <th>Sekunder</th>
                                    <th>Tertier</th>
                                    <th>Tanggal</th>
                                    <th>Divisi</th>
                                    <th>Shift</th>
                                    <th>-</th>
                                </tr>
                            </table>
                        </div>
                    </div>

                        <h5>Lembar 1 untuk : Penerima Barang <br>
                            Lembar 2 untuk : Adm. Pembelian <br>
                            Lembar 3 untuk : Gudang <br>
                            Lembar 4 untuk : Satpam <br>
                        </h5>

                    <div class="row mt-3">
                        <div class="col- row justify-content-md-center">
                            <div class="text-center col-md-auto"><button type="submit">Cek Surat Jalan</button></div>
                            <div class="text-center col-md-auto"><button type="submit">Batal Cetak</button></div>
                            <div class="text-center col-md-auto"><button type="submit">Keluar</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        $(document).ready(function() {
            $('.dropdown-submenu a.test').on("click", function(e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });
    </script>
</body>
@endsection
