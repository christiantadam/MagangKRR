@extends('layouts.appABM')
@section('content')
    <script type="text/javascript" src="{{ asset('js/BarcodeKerta2/HanguskanBarcode.js') }}"></script>


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
                                            <input type="text" class="form-control" name="IdDivisi" id="IdDivisi"
                                                placeholder="ID Divisi" readonly>
                                        </div>
                                        <div class="form-group col-md-7 mt-3 mt-md-0">
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
                                                    <th>Nolndex </th>
                                                    <th>Jumlah Primer </th>
                                                    <th>Jumlah Sekunder </th>
                                                    <th>Jumlah Tritier </th>
                                                    <th>Tanggal </th>
                                                    <th>IdType </th>
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

                        <div class="row mb-3">
                            <div class="col- row justify-content-md-center">
                                <div style="margin-top: -8px ">
                                    <div class="text-center col-md-auto mt-3">
                                        <button type="button" onclick="openModal1()" id="ButtonJumlahBarang"
                                            style="width:100px;margin-bottom: 10px">Cari</button>
                                    </div>
                                    <div class="modal" id="myModal1">
                                        <div class="modal-content">
                                            <span class="close-btn" onclick="closeModal1()">&times;</span>
                                            <div class="card col-md-auto"
                                                style="margin-left:50px; margin-right:50px; margin-top:50px; margin-bottom:50px;">
                                                <div class="row form-group">
                                                    <div class="col-md-3 d-flex justify-content-end">
                                                        <span class="aligned-text mt-3">Masukkan kode barcode:</span>
                                                    </div>
                                                    <div class="mt-4">
                                                        <div class="form-group col-md-9 mt-md-0">
                                                            <input type="text" class="form-control" name="Barcode"
                                                                id="Barcode" style="width: 1080px; margin-left: 13px"
                                                                placeholder="Barcode">
                                                        </div>
                                                    </div>
                                                    <div class="text-center col-md-auto"
                                                        style="margin-top: 15px; margin-left:350px">
                                                        <button type="button" onclick="closeModal1()">Ok</button>
                                                    </div>
                                                    <div class="text-center col-md-auto" style="margin-top: 15px;"
                                                        onclick="closeModal1()">
                                                        <button type="button">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center col-md-auto"><button type="button"
                                        style="width: 100px; margin-top: 8px" id="btnProses">Proses</button></div>
                                <div class="text-center col-md-auto"><button type="button"
                                        style="width: 100px; margin-top: 8px">Tutup</button></div>
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

    </html>
@endsection
