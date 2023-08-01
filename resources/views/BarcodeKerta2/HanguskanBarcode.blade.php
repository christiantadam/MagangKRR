@extends('layouts.appABM')
@section('content')

    <body onload="Greeting()">
        <div id="app">


            <div class="form-wrapper mt-4">
                <div class="form-container">
                    <div class="card">
                        <div class="card-header">FrmHanguskanBarcode</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                            <div class="form berat_woven">
                                <form action="#" method="post" role="form">
                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Divisi:</span>
                                        </div>
                                        <div class="form-group col-md-2 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Divisi" id="Divsi"
                                                placeholder="Divisi" readonly>
                                        </div>
                                        <div class="form-group col-md-7 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Divisi" id="Divsi"
                                                placeholder="Divisi" readonly>
                                            <div class="text-center col-md-auto"><button type="submit">...</button></div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">Type</div>
                                        <h6 class="mt-3">Beri tanda (v) pada barcode yang ingin dihanguskan</h6>
                                        <table id="TableType">
                                            <thead>
                                                <tr>
                                                    <th>Type </th>
                                                    <th>Barcode </th>
                                                    <th>SubKelompok </th>
                                                    <th>Kelompok </th>
                                                    <th>Kode Barang </th>
                                                    <th>Noln... </th>
                                                    <th>Jumlah Primer </th>
                                                    <th>Jumlah Sekunder </th>
                                                    <th>Jumlah Tritier </th>
                                                    <th>Tanggal </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>

                                        </table>
                                    </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header">Type</div>
                                <h6 class="mt-3">Daftar barcode yang akan dihanguskan</h6>
                                <table id="TableType1">
                                    <thead>
                                        <tr>
                                            <th>Type </th>
                                            <th>Primer </th>
                                            <th>Sekunder </th>
                                            <th>Tertier </th>
                                            <th>Id Type </th>
                                            <th>Tanggal </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col- row justify-content-md-center">
                                <div class="text-center col-md-auto"><button type="submit">Cari</button></div>
                                <div class="text-center col-md-auto"><button type="submit">Proses</button></div>
                                <div class="text-center col-md-auto"><button type="submit">Tutup</button></div>
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

            $(document).ready(function() {
                $('#TableType').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });

            $(document).ready(function() {
                $('#TableType1').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });
        </script>
    </body>

    </html>
@endsection
