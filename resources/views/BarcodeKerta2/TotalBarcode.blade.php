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
                                        <div class="form-group col-md-4 mt-3 mt-md-0">
                                            <input type="date" class="form-control" name="tgl_total_barcode"
                                                id="tgl_total_barcode" placeholder="tgl" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Pilih Shift:</span>
                                        </div>
                                        <div class="form-group ml-3">
                                            <select id="shift" style="width: 100px">
                                                <option value="1">Satu</option>
                                                <option value="2">Dua</option>
                                                <option value="3">Tiga</option>
                                            </select>
                                        </div>
                                        <div class="form-group text-center col-md-auto"><button
                                                type="submit" style="margin-left: 115px">Proses</button></div>
                                    </div>

                                    <div class="card mt-auto">
                                        <div class="card-header">Type</div>
                                        <table id="TableType">
                                            <thead>
                                                <tr>
                                                    <th>Kode Barang </th>
                                                    <th>Nama Type </th>
                                                    <th>Jumlah Primer </th>
                                                    <th>Jumlah Sekunder </th>
                                                    <th>Jumlah Tertier</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>

                            <div class="row mt-3">
                                <div class="ml-5 row">
                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Total:</span>
                                        </div>
                                        <div class="form-group col-md-7 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="total" id="total"
                                                placeholder="Total">
                                        </div>
                                    </div>
                                    <div class="text-center col-md-auto"><button type="submit" class="btn-danger"
                                            style="margin-left: 538px">Keluar</button></div>
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
        </script>
    </body>
@endsection
