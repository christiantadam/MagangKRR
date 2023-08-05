@extends('layouts.appABM')
@section('content')

    <body onload="Greeting()">
        <div id="app">


            <div class="form-wrapper mt-4">
                <div class="form-container">
                    <div class="card">
                        <div class="card-header">Scan Barcode</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                            <div class="form berat_woven">
                                <form action="#" method="post" role="form">
                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Item Number - Kode Barang:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Barang" id="Barang"
                                                placeholder="Barang">
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">Barcode Yang Dikirim Ke Gudang</div>
                                        <table id="TableType">
                                            <thead>
                                                <tr>
                                                    <th>No. </th>
                                                    <th>Id Transaksi </th>
                                                    <th>Kode Barang </th>
                                                    <th>Nama Type </th>
                                                    <th>Jumlah Primier </th>
                                                    <th>Jumlah Sekunder </th>
                                                    <th>Jumlah Tritier </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>

                                        </table>
                                    </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header">Barcode Yang Di Scan</div>
                                <table id="TableType1">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Id Transaksi </th>
                                            <th>Kode Barang </th>
                                            <th>Nama Type </th>
                                            <th>Jumlah Primier </th>
                                            <th>Jumlah Sekunder </th>
                                            <th>Jumlah Tritier </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col- row justify-content-md-center">
                                <div class="text-center col-md-auto"><button type="submit" style="width: 100px">Proses</button></div>
                                <div class="text-center col-md-auto"><button type="submit" style="width: 100px">Keluar</button></div>
                                <div class="form-group col-md-3 mt-3 mt-md-0">
                                    <input type="text" class="form-control ml-5" name="test" id="test">
                                </div>
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
