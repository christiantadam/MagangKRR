@extends('layouts.appABM')
@section('content')
    <script type="text/javascript" src="{{ asset('js/MutasiSatuDivisi.js') }}"></script>

    <style>
        .form-wrapper {
            display: flex;
            gap: 20px;
        }

        .card {
            flex: 1;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 10px;
            padding-top: 10px;
        }
    </style>


    <body onload="Greeting()">
        <div id="app">
            <div class="form-wrapper mt-4">
                <div class="form-container">
                    <div class="card" style="width: 1200px; margin-left: -100px">
                        <div class="card-header">Mutasi Satu Divisi</div>
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

                                    <div class="card mt-4" style="width: 1000px">
                                        <div class="card-header">Barcode Yang Sudah Di Scan</div>
                                        <h6 class="mt-3">Daftar barcode yang akan dihanguskan</h6>
                                        <table id="TableType">
                                            <thead>
                                                <tr>
                                                    <th>No </th>
                                                    <th>Type </th>
                                                    <th>No Indeks </th>
                                                    <th>Kode Barang </th>
                                                    <th>Primer </th>
                                                    <th>Sekunder </th>
                                                    <th>Tritier </th>
                                                    <th>Tanggal Scan </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                            </div>


                            <div class="button-group" style="margin-top: -275px">
                                <button type="button" style="width: 120px; margin-right: 10px;">Isi</button>
                                <button type="button" style="width: 120px; margin-right: 10px;">Koreksi</button>
                                <button type="button" style="width: 120px; margin-right: 10px;">Hapus</button>
                                <button type="button" style="width: 120px; margin-right: 10px;">Proses</button>
                                <button type="button" style="width: 120px; margin-right: 10px;">Keluar</button>
                                <button type="button" style="width: 120px; margin-right: 10px;">Cek Barcode</button>
                                <button type="button" style="width: 120px; margin-right: 10px;">Cetak SJ </button>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col- row justify-content-md-center">
                                <div class="text-center col-md-auto">
                                    <button type="button" style="width: 120px">Batal Kirim</button>
                                </div>
                                <div class="text-center col-md-auto">
                                    <button type="button" style="width: 120px">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>

    </html>
@endsection
