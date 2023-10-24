@extends('layouts.appABM')
@section('content')
    <script type="text/javascript" src="{{ asset('js/BarcodeRollWoven/KirimGudang2.js') }}"></script>


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
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Divisi:</span>
                                        </div>
                                        <div class="form-group col-md-2 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="IdDivisi" id="IdDivisi"
                                                placeholder="ID Divisi" readonly>
                                        </div>
                                        <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Divisi" id="Divisi"
                                                placeholder="Divisi" readonly>
                                            <div class="text-center col-md-auto"><button type="button"
                                                    onclick="openModal()" id="ButtonDivisi">...</button></div>
                                            <div class="modal" id="myModal">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal()">&times;</span>
                                                    <h2>Table Divisi</h2>
                                                    <p>Id Divisi & Divisi</p>
                                                    <table id="TableDivisi">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Divisi</th>
                                                                <th>Divisi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($dataDivisi as $data)
                                                                <tr>
                                                                    <td>{{ $data->IdDivisi }}</td>
                                                                    <td>{{ $data->NamaDivisi }}</td>
                                                                </tr>
                                                            @endforeach
                                                            <!-- Add more rows as needed -->
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">No Barcode:</span>
                                        </div>
                                        <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="No_barcode" id="No_barcode"
                                                placeholder="No Barcode">
                                        </div>
                                        <h6 class="ml-3 form-group">Tekan Enter</h6>
                                    </div>

                                    <div class="card mt-4">
                                        <div class="card-header">Type</div>
                                        <h5 class="mt-3">Rekap Barcode Yang Dikirim</h5>
                                        <table id="RekapKirim">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal </th>
                                                    <th>Type </th>
                                                    <th>Shift </th>
                                                    <th>Primer </th>
                                                    <th>Sekunder </th>
                                                    <th>Tertier </th>
                                                    <th>IdType</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header">Type</div>
                                <h5 class="mt-3">Daftar Barcode Yang Dikirim</h5>
                                <table id="DaftarKirim">
                                    <thead>
                                        <tr>
                                            <th>Tanggal </th>
                                            <th>Type </th>
                                            <th>Shift </th>
                                            <th>No Barcode </th>
                                            <th>SubKelompok </th>
                                            <th>Kelompok </th>
                                            <th>Kode Barang </th>
                                            <th>No. Index </th>
                                            <th>Primer </th>
                                            <th>Sekunder </th>
                                            <th>Tritier </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col- row justify-content-md-center">
                                <div class="text-center col-md-auto"><button type="Button">Proses</button></div>
                                <div class="text-center col-md-auto"><button type="Button">Belum Dikirim</button></div>
                                <div class="text-center col-md-auto"><button type="Button">Keluar</button></div>
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
    </body>
@endsection
