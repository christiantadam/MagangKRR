@extends('layouts.appABM')
@section('content')
<body onload="Greeting()">
    <div id="app">

        <div class="form-wrapper mt-4">
        <div class="form-container">
        <div class="card">
            <div class="card-header">Scan Barcode Sebelum Dikirim Ke Gudang</div>
            <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <div class="form berat_woven">
                <form action="#" method="post" role="form">
                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Kelut:</span>
                        </div>
                        <div class="form-group col-md-6 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Kelut" id="Kelut" placeholder="Kelut" required>
                            <div class="text-center col-md-auto"><button type="submit">...</button></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Kelompok:</span>
                        </div>
                        <div class="form-group col-md-6 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Kelompok" id="Kelompok" placeholder="Kelompok" required>
                            <div class="text-center col-md-auto"><button type="submit">...</button></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Sub Kelompok:</span>
                        </div>
                        <div class="form-group col-md-6 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Sub_kelompok" id="Sub_kelompok" placeholder="Sub Kelompok" required>
                            <div class="text-center col-md-auto"><button type="submit">...</button></div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">No Barcode:</span>
                        </div>
                        <div class="form-group col-md-7 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="No_barcode" id="No_barcode" placeholder="<<no barcode>>" required>
                        </div>
                        <h6 class="form-group">Tekan Enter</h6>
                    </div>

                    <div class="card mt-4">
                    <div class="card-header">Type</div>
                    <h5 class="mt-3 form-group">Rekap Barcode Yang Dikirim</h5>
                            <table>
                                <tr>
                                    <th>Tanggal </th>
                                    <th>Type </th>
                                    <th>Shift </th>
                                    <th>Primer </th>
                                    <th>Sekunder </th>
                                    <th>Tertier </th>
                                    <th>IdType</th>
                                    <th>-</th>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-4">
                    <div class="card-header">Type</div>
                    <h5 class="mt-3 form-group">Daftar Barcode Yang Dikirim</h5>
                            <table>
                                <tr>
                                    <th>Tanggal </th>
                                    <th>Type </th>
                                    <th>Shift </th>
                                    <th>No Barcode </th>
                                    <th>SubKelompok </th>
                                    <th>Kelompok </th>
                                    <th>-</th>
                                    <th>-</th>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-3 mb-3">
                        <div class="col- row justify-content-md-center">
                            <div class="text-center col-md-auto"><button type="submit">Proses</button></div>
                            <div class="text-center col-md-auto"><button type="submit">Belum Dikirim</button></div>
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
