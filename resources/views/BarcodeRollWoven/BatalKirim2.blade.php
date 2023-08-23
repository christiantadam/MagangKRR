@extends('layouts.appABM')
@section('content')
<script type="text/javascript" src="{{ asset('js/BarcodeRollWoven/BatalKirim2.js') }}"></script>

    <body onload="Greeting()">
        <div id="app">


            <div class="form-wrapper mt-4">
                <div class="card" style="width: 1000px">
                    <div class="card-header">Batal Kirim Gudang</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form berat_woven">
                            <form action="#" method="post" role="form">
                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Objek:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input type="text" class="form-control" name="Objek" id="Objek"
                                            placeholder="Objek" required>
                                    </div>
                                </div>

                                <div class="card mt-auto">
                                    <div class="card-header">Type</div>
                                    <table id="TableType">
                                        <thead>
                                            <tr>
                                                <th>Type </th>
                                                <th>No Barcode </th>
                                                <th>Sub Kelompok </th>
                                                <th>Kelompok </th>
                                                <th>Kode Barang</th>
                                                <th>NoIndeks </th>
                                                <th>Primal</th>
                                                <th>Sekunder</th>
                                                <th>Tertier</th>
                                                <th>Tanggal</th>
                                                <th>Divisi</th>
                                                <th>Shift</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col- row justify-content-md-center">
                                <div class="text-center col-md-auto"><button type="button" style="width: 120px">Pilih Semua</button></div>
                                <div class="text-center col-md-auto"><button type="button" style="width: 120px">Hapus</button></div>
                                <div class="text-center col-md-auto"><button type="button" style="width: 120px">Keluar</button></div>
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
