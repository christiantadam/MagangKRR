@extends('layouts.appABM')
@section('content')
<body onload="Greeting()">
    <div id="app">


        <div class="form-wrapper mt-4">
        <div class="form-container">
        <div class="card">
            <div class="card-header">Total Barcode</div>
            <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <div class="form berat_woven">
                <form action="#" method="post" role="form">
                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Tanggal:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="date" class="form-control" name="tgl_total_barcode" id="tgl_total_barcode" placeholder="tgl" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Pilih Shift:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="number" class="form-control" name="shift_total_barcode" id="shift_total_barcode" placeholder="Shift" required>
                            <div class="text-center col-md-auto"><button type="submit">Proses</button></div>
                        </div>
                    </div>

                    <div class="card mt-auto">
                    <div class="card-header">Type</div>
                            <table>
                                <tr>
                                    <th>Kode Barang </th>
                                    <th>Nama Type </th>
                                    <th>Jumlah Primer </th>
                                    <th>Jumlah Sekunder </th>
                                    <th>Jumlah Tertier</th>
                                    <th>-</th>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col- row justify-content-md-center">
                            <div class="text-center col-md-auto"><button type="submit">Pilih Semua</button></div>
                            <div class="text-center col-md-auto"><button type="submit">Hapus</button></div>
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
