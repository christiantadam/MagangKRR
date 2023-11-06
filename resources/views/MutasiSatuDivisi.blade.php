@extends('layouts.appABM')
@section('content')
    <title style="font-size: 20px">@yield('title', 'Mutasi Satu Divisi')</title>
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

        .modal {
            display: none;
            /* Sembunyikan modal secara default */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            /* Latar belakang gelap transparan */
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            width: 700px;
            max-height: 500px;
            /* Atur tinggi maksimum modal di sini */
            overflow: auto;
            /* Aktifkan overflow untuk mengaktifkan scrollbar jika konten meluas */
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>


    <body onload="Greeting()">
        <div id="app">
            <div class="form-wrapper mt-4">
                <div class="form-container">
                    <div class="card" style="width: 1200px; margin-left: -100px; height: 1250px">
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

                                    <div class="card mt-5" style="width: 1000px">
                                        <div class="card-header">Penerima</div>
                                        <div class="row mt-3">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Id Transaksi : </span>
                                            </div>
                                            <div class="form-group col-md-3 mt-3 mt-md-0 ml-3">
                                                <input type="text" class="form-control" id="Transaksi"
                                                    placeholder="Id Transaksi" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Objek : </span>
                                            </div>
                                            <div class="form-group col-md-3 mt-3 mt-md-0 ml-3">
                                                <input type="text" class="form-control" id="ObjekPenerima"
                                                    placeholder="Objek" readonly>
                                            </div>
                                            <div class="text-center col-md-auto"><button type="button"
                                                    onclick="openModal6()" id="ButtonObjek">...</button></div>
                                            <div class="modal" id="myModal6">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal6()">&times;</span>
                                                    <h2>Table Objek Penerima</h2>
                                                    <p>Id Objek & Objek</p>
                                                    <table id="TableObjekPenerima">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Objek</th>
                                                                <th>Objek</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{-- @foreach ($dataDivisi as $data)
                                                                        <tr>
                                                                            <td>{{ $data->IdDivisi }}</td>
                                                                            <td>{{ $data->NamaDivisi }}</td>
                                                                        </tr>
                                                                    @endforeach --}}
                                                            <!-- Add more rows as needed -->
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal6()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Kelompok Utama : </span>
                                            </div>
                                            <div class="form-group col-md-3 mt-3 mt-md-0 ml-3">
                                                <input type="text" class="form-control" id="KelutPenerima"
                                                    placeholder="Kelompok Utama" readonly>
                                            </div>
                                            <div class="text-center col-md-auto"><button type="button"
                                                    onclick="openModal7()" id="ButtonKelompokUtamavisi">...</button>
                                            </div>
                                            <div class="modal" id="myModal7">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal7()">&times;</span>
                                                    <h2>Table Kelompok Utama Penerima</h2>
                                                    <p>Id Kelompok Utama & Kelompok Utama</p>
                                                    <table id="TableKelompokUtamaPenerima">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Kelompok Utama</th>
                                                                <th>Kelompok Utama</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{-- @foreach ($dataDivisi as $data)
                                                                        <tr>
                                                                            <td>{{ $data->IdDivisi }}</td>
                                                                            <td>{{ $data->NamaDivisi }}</td>
                                                                        </tr>
                                                                    @endforeach --}}
                                                            <!-- Add more rows as needed -->
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal7()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Kelompok : </span>
                                            </div>
                                            <div class="form-group col-md-3 mt-3 mt-md-0 ml-3">
                                                <input type="text" class="form-control" id="KelompokPenerima"
                                                    placeholder="Kelompok" readonly>
                                            </div>
                                            <div class="text-center col-md-auto"><button type="button"
                                                    onclick="openModal8()" id="ButtonKelompok">...</button></div>
                                            <div class="modal" id="myModal8">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal8()">&times;</span>
                                                    <h2>Table Kelompok Penerima</h2>
                                                    <p>Id Kelompok & Kelompok</p>
                                                    <table id="TableKelompokPenerima">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Kelompok</th>
                                                                <th>Kelompok</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{-- @foreach ($dataDivisi as $data)
                                                                        <tr>
                                                                            <td>{{ $data->IdDivisi }}</td>
                                                                            <td>{{ $data->NamaDivisi }}</td>
                                                                        </tr>
                                                                    @endforeach --}}
                                                            <!-- Add more rows as needed -->
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal8()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Sub Kelompok : </span>
                                            </div>
                                            <div class="form-group col-md-3 mt-3 mt-md-0 ml-3">
                                                <input type="text" class="form-control" id="SubKelompokPenerima"
                                                    placeholder="Sub Kelompok" readonly>
                                            </div>
                                            <div class="text-center col-md-auto"><button type="button"
                                                    onclick="openModal9()" id="ButtonSubKelompok">...</button></div>
                                            <div class="modal" id="myModal9">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal9()">&times;</span>
                                                    <h2>Table Sub Kelompok Penerima</h2>
                                                    <p>Id Sub Kelompok & Sub Kelompok</p>
                                                    <table id="TableSubKelompokPenerima">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Sub Kelompok</th>
                                                                <th>Sub Kelompok</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{-- @foreach ($dataDivisi as $data)
                                                                        <tr>
                                                                            <td>{{ $data->IdDivisi }}</td>
                                                                            <td>{{ $data->NamaDivisi }}</td>
                                                                        </tr>
                                                                    @endforeach --}}
                                                            <!-- Add more rows as needed -->
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal9()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Jumlah Mutasi : </span>
                                            </div>
                                            <div class="form-group col-md-2 mt-3 mt-md-0 ml-3">
                                                <input type="text" class="form-control" id="MutasiPrimer"
                                                    placeholder="Primer" readonly>
                                            </div>
                                            <div class="form-group col-md-2 mt-3 mt-md-0 ml-3">
                                                <input type="text" class="form-control" id="MutasiSekunder"
                                                    placeholder="Sekunder" readonly>
                                            </div>
                                            <div class="form-group col-md-2 mt-3 mt-md-0 ml-3">
                                                <input type="text" class="form-control" id="MutasiTritier"
                                                    placeholder="Tritier" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Alasan Mutasi : </span>
                                            </div>
                                            <div class="form-group col-md-7 mt-3 mt-md-0 ml-3">
                                                <input type="text" class="form-control" id="Alasan"
                                                    placeholder="Alasan" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mt-4" style="width: 1000px">
                                        <div class="card-header">Barcode Yang Sudah Di Scan</div>
                                        <h6 class="mt-3">Daftar barcode yang akan dihanguskan</h6>
                                        <table id="TableType1">
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


                            <div class="button-group" style="margin-top: -575px">
                                <button type="button" style="width: 120px; margin-right: 10px;height: 100px; margin-top: -450px"
                                    onclick="openModal1()">Isi</button>
                                <div class="modal" id="myModal1">
                                    <div class="modal-content" style="width: 1500px">
                                        <span class="close-btn" onclick="closeModal1()">&times;</span>
                                        <h2>Mutasi Satu Divisi</h2>
                                        <p>Mutasi</p>

                                        <div class="card">
                                            <h2 style="margin: auto">Pemberi</h2>
                                            <div class="row mt-3">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Objek : </span>
                                                </div>
                                                <div class="form-group col-md-3 mt-3 mt-md-0 ml-3">
                                                    <input type="text" class="form-control" id="ObjekPemberi"
                                                        placeholder="Objek" readonly>
                                                </div>
                                                <div class="text-center col-md-auto"><button type="button"
                                                        onclick="openModal2()" id="ButtonObjek">...</button></div>
                                                <div class="modal" id="myModal2">
                                                    <div class="modal-content">
                                                        <span class="close-btn" onclick="closeModal2()">&times;</span>
                                                        <h2>Table Objek</h2>
                                                        <p>Id Objek & Objek</p>
                                                        <table id="TableObjekPemberi">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID Objek</th>
                                                                    <th>Objek</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {{-- @foreach ($dataDivisi as $data)
                                                                            <tr>
                                                                                <td>{{ $data->IdDivisi }}</td>
                                                                                <td>{{ $data->NamaDivisi }}</td>
                                                                            </tr>
                                                                        @endforeach --}}
                                                                <!-- Add more rows as needed -->
                                                            </tbody>
                                                        </table>
                                                        <div class="text-center col-md-auto">
                                                            <button type="button"
                                                                onclick="closeModal2()">Process</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Kelompok Utama : </span>
                                                </div>
                                                <div class="form-group col-md-3 mt-3 mt-md-0 ml-3">
                                                    <input type="text" class="form-control" id="KelutPemberi"
                                                        placeholder="Kelompok Utama" readonly>
                                                </div>
                                                <div class="text-center col-md-auto"><button type="button"
                                                        onclick="openModal3()" id="ButtonKelompokUtamavisi">...</button>
                                                </div>
                                                <div class="modal" id="myModal3">
                                                    <div class="modal-content">
                                                        <span class="close-btn" onclick="closeModal3()">&times;</span>
                                                        <h2>Table Kelompok Utama</h2>
                                                        <p>Id Kelompok Utama & Kelompok Utama</p>
                                                        <table id="TableKelompokUtamaPemberi">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID Kelompok Utama</th>
                                                                    <th>Kelompok Utama</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {{-- @foreach ($dataDivisi as $data)
                                                                            <tr>
                                                                                <td>{{ $data->IdDivisi }}</td>
                                                                                <td>{{ $data->NamaDivisi }}</td>
                                                                            </tr>
                                                                        @endforeach --}}
                                                                <!-- Add more rows as needed -->
                                                            </tbody>
                                                        </table>
                                                        <div class="text-center col-md-auto">
                                                            <button type="button"
                                                                onclick="closeModal3()">Process</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Kelompok : </span>
                                                </div>
                                                <div class="form-group col-md-3 mt-3 mt-md-0 ml-3">
                                                    <input type="text" class="form-control" id="KelompokPemberi"
                                                        placeholder="Kelompok" readonly>
                                                </div>
                                                <div class="text-center col-md-auto"><button type="button"
                                                        onclick="openModal4()" id="ButtonKelompok">...</button></div>
                                                <div class="modal" id="myModal4">
                                                    <div class="modal-content">
                                                        <span class="close-btn" onclick="closeModal4()">&times;</span>
                                                        <h2>Table Kelompok</h2>
                                                        <p>Id Kelompok & Kelompok</p>
                                                        <table id="TableKelompokPemberi">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID Kelompok</th>
                                                                    <th>Kelompok</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {{-- @foreach ($dataDivisi as $data)
                                                                            <tr>
                                                                                <td>{{ $data->IdDivisi }}</td>
                                                                                <td>{{ $data->NamaDivisi }}</td>
                                                                            </tr>
                                                                        @endforeach --}}
                                                                <!-- Add more rows as needed -->
                                                            </tbody>
                                                        </table>
                                                        <div class="text-center col-md-auto">
                                                            <button type="button"
                                                                onclick="closeModal4()">Process</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Sub Kelompok : </span>
                                                </div>
                                                <div class="form-group col-md-3 mt-3 mt-md-0 ml-3">
                                                    <input type="text" class="form-control" id="SubKelompokPemberi"
                                                        placeholder="Sub Kelompok" readonly>
                                                </div>
                                                <div class="text-center col-md-auto"><button type="button"
                                                        onclick="openModal5()" id="ButtonSubKelompok">...</button></div>
                                                <div class="modal" id="myModal5">
                                                    <div class="modal-content">
                                                        <span class="close-btn" onclick="closeModal5()">&times;</span>
                                                        <h2>Table Sub Kelompok</h2>
                                                        <p>Id Sub Kelompok & Sub Kelompok</p>
                                                        <table id="TableSubKelompokPemberi">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID Sub Kelompok</th>
                                                                    <th>Sub Kelompok</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {{-- @foreach ($dataDivisi as $data)
                                                                            <tr>
                                                                                <td>{{ $data->IdDivisi }}</td>
                                                                                <td>{{ $data->NamaDivisi }}</td>
                                                                            </tr>
                                                                        @endforeach --}}
                                                                <!-- Add more rows as needed -->
                                                            </tbody>
                                                        </table>
                                                        <div class="text-center col-md-auto">
                                                            <button type="button"
                                                                onclick="closeModal5()">Process</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Kode Type : </span>
                                                </div>
                                                <div class="form-group col-md-3 mt-3 mt-md-0 ml-3">
                                                    <input type="text" class="form-control" id="IdKodeType"
                                                        placeholder="Id Kode Type" readonly>
                                                </div>
                                                <div class="form-group col-md-2 mt-3 mt-md-0 ml-3">
                                                    <input type="text" class="form-control" id="KodeType"
                                                        placeholder="Kode Type" readonly>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Nama Barang : </span>
                                                </div>
                                                <div class="form-group col-md-6 mt-3 mt-md-0 ml-3">
                                                    <input type="text" class="form-control" id="Barang"
                                                        placeholder="Nama Barang" readonly>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Saldo Akhir : </span>
                                                </div>
                                                <div class="form-group col-md-2 mt-3 mt-md-0 ml-3">
                                                    <input type="text" class="form-control" id="SaldoPrimer"
                                                        placeholder="Primer" readonly>
                                                </div>
                                                <div class="form-group col-md-2 mt-3 mt-md-0 ml-3">
                                                    <input type="text" class="form-control" id="SaldoSekunder"
                                                        placeholder="Sekunder" readonly>
                                                </div>
                                                <div class="form-group col-md-2 mt-3 mt-md-0 ml-3">
                                                    <input type="text" class="form-control" id="SaldoTritier"
                                                        placeholder="Tritier" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center col-md-auto mt-3">
                                            <button type="button" style="width: 150px" disabled>Process</button>
                                            <button type="button" class="btn-danger" style="width: 150px"
                                                onclick="closeModal1()">Keluar</button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button"
                                    style="width: 120px; margin-right: 10px;height: 100px;">Koreksi</button>
                                <button type="button"
                                    style="width: 120px; margin-right: 10px;height: 100px;">Hapus</button>
                                <button type="button"
                                    style="width: 120px; margin-right: 10px;height: 100px;">Proses</button>
                                <button type="button"
                                    style="width: 120px; margin-right: 10px;height: 100px;">Keluar</button>
                                <button type="button" style="width: 120px; margin-right: 10px;height: 100px;">Cek
                                    Barcode</button>
                            </div>
                        </div>
                        <div class="row mt-5 mb-3">
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
