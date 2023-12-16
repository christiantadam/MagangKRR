@extends('layouts.appABM')
@section('content')
    <title style="font-size: 20px">@yield('title', 'Kirim Circular')</title>
    <script type="text/javascript" src="{{ asset('js/BarcodeRollWoven/KirimCircular.js') }}"></script>
    <style>
        .modal-content-scroll {
            max-height: 1000px;
            /* Atur tinggi maksimum modal di sini */
            overflow: auto;
            /* Aktifkan overflow untuk mengaktifkan scrollbar jika konten meluas */
        }
    </style>


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
                                            <span class="aligned-text">Kelompok Utama:</span>
                                        </div>
                                        <div class="form-group col-md-2 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="IdKelut" id="IdKelut"
                                                placeholder="ID Kelut" readonly>
                                        </div>
                                        <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Kelut" id="Kelut"
                                                placeholder="Kelut" readonly>
                                            <div class="text-center col-md-auto"><button type="button"
                                                    onclick="openModal()" id="ButtonKelut">...</button></div>
                                            <div class="modal" id="myModal">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal()">&times;</span>
                                                    <h2>Table Kelut</h2>
                                                    <p>Id Kelut & Kelut</p>
                                                    <table id="TableKelut">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Kelut</th>
                                                                <th>Kelut</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($dataKelut as $data)
                                                                <tr>
                                                                    <td>{{ $data->IdKelompokUtama }}</td>
                                                                    <td>{{ $data->NamaKelompokUtama }}</td>
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
                                            <span class="aligned-text">Kelompok:</span>
                                        </div>
                                        <div class="form-group col-md-2 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="IdKelompok" id="IdKelompok"
                                                placeholder="ID Kelompok" readonly>
                                        </div>
                                        <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Kelompok" id="Kelompok"
                                                placeholder="Kelompok" readonly>
                                            <div class="text-center col-md-auto"><button type="button"
                                                    onclick="openModal1()" id="ButtonKelompok">...</button></div>
                                            <div class="modal" id="myModal1">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal1()">&times;</span>
                                                    <h2>Table Kelompok</h2>
                                                    <p>Id Kelompok & Kelompok</p>
                                                    <table id="TableKelompok">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Kelompok</th>
                                                                <th>Kelompok</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{-- @foreach ($dataKelompok as $data)
                                                                <tr>
                                                                    <td>{{ $data->idkelompok }}</td>
                                                                    <td>{{ $data->namakelompok }}</td>
                                                                </tr>
                                                            @endforeach --}}
                                                            <!-- Add more rows as needed -->
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal1()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Sub Kelompok:</span>
                                        </div>
                                        <div class="form-group col-md-2 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="IdSubKelompok"
                                                id="IdSubKelompok" placeholder="ID Sub Kelompok" readonly>
                                        </div>
                                        <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="SubKelompok" id="SubKelompok"
                                                placeholder="Sub Kelompok" readonly>
                                            <div class="text-center col-md-auto"><button type="button"
                                                    onclick="openModal2()" id="ButtonSubKelompok">...</button></div>
                                            <div class="modal" id="myModal2">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal2()">&times;</span>
                                                    <h2>Table Sub Kelompok</h2>
                                                    <p>Id Sub Kelompok & Sub Kelompok</p>
                                                    <table id="TableSubKelompok">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Kelompok</th>
                                                                <th>Kelompok</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{-- @foreach ($dataSubKelompok as $data)
                                                                <tr>
                                                                    <td>{{ $data->IdSubkelompok }}</td>
                                                                    <td>{{ $data->NamaSubKelompok }}</td>
                                                                </tr>
                                                            @endforeach --}}
                                                            <!-- Add more rows as needed -->
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal2()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">No Barcode:</span>
                                        </div>
                                        <div class="form-group col-md-7 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="No_barcode" id="No_barcode"
                                                placeholder="<<no barcode>>" required>
                                        </div>
                                        <h6 class="form-group">Tekan Enter</h6>
                                    </div>

                                    <div class="card mt-4">
                                        <div class="card-header">Type</div>
                                        <h5 class="mt-3 form-group">Rekap Barcode Yang Dikirim</h5>
                                        <table id="RekapKirim">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal </th>
                                                    <th>Type </th>
                                                    <th>Shift </th>
                                                    <th>Primer </th>
                                                    <th>Sekunder </th>
                                                    <th>Tritier </th>
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
                                <h5 class="mt-3 form-group">Daftar Barcode Yang Dikirim</h5>
                                <table id="DaftarKirim">
                                    <thead>
                                        <tr>
                                            <th>Tanggal </th>
                                            <th>Type </th>
                                            <th>Shift </th>
                                            <th>No Barcode </th>
                                            <th>SubKelompok </th>
                                            <th>Kode Barang </th>
                                            <th>No Index </th>
                                            <th>Primer</th>
                                            <th>Sekunder</th>
                                            <th>Tritier</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="form-container"></div>

                        <div class="row mt-3 mb-3">
                            <div class="col- row justify-content-md-center">
                                <div class="text-center col-md-auto"><button style="width: 120px" type="button"
                                        onclick="ProcessData()">Proses</button></div>
                                <div class="text-center col-md-auto"><button style="width: 120px" type="button"
                                        onclick="openModal3()">Belum Dikirim</button></div>
                                <div class="modal" id="myModal3">
                                    <div class="modal-content modal-content-scroll"
                                    style="width: 1500px; max-height: 500px; height: 500px ;overflow: auto;">>
                                        <h2>Belum Kirim</h2>
                                        <span class="close-btn" onclick="closeModal3()">&times;</span>
                                        <div class="row">
                                            <div class="form-group col-md-1 d-flex justify-content-end">
                                                <span class="aligned-text">Objek:</span>
                                            </div>
                                            <div class="form-group col-md-2 mt-3 mt-md-0">
                                                <input type="text" class="form-control" name="IdObjek" id="IdObjek"
                                                    placeholder="ID Objek" readonly>
                                            </div>
                                            <div class="form-group col-md-5 mt-3 mt-md-0">
                                                <input type="text" class="form-control" name="Objek" id="Objek"
                                                    placeholder="Objek" readonly>
                                                <div class="text-center col-md-auto"><button type="button"
                                                        onclick="openModal4()" id="ButtonObjek">...</button></div>
                                                <div class="modal" id="myModal4">
                                                    <div class="modal-content"
                                                        style="width: 500px; max-height: 500px; overflow: auto;">
                                                        <span class="close-btn" onclick="closeModal4()">&times;</span>
                                                        <h2>Table Objek</h2>
                                                        <p>Id Objek & Objek</p>
                                                        <table id="TableObjek">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID Objek</th>
                                                                    <th>Objek</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($dataObjek as $data)
                                                                    <tr>
                                                                        <td>{{ $data->IdObjek }}</td>
                                                                        <td>{{ $data->NamaObjek }}</td>
                                                                    </tr>
                                                                @endforeach
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
                                        </div>
                                        <div class="card-header">Table Belum Kirim</div>
                                        <table id="TableBelumKirim">
                                            <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>No Barcode</th>
                                                    <th>Sub Kelompok</th>
                                                    <th>Kelompok</th>
                                                    <th>Kode Barang</th>
                                                    <th>No Indeks</th>
                                                    <th>Primer</th>
                                                    <th>Sekunder</th>
                                                    <th>Tritier</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Add more rows as needed -->
                                            </tbody>
                                        </table>
                                        <div class="text-center col-md-auto">
                                            <button type="button" onclick="closeModal3()">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center col-md-auto"><button style="width: 120px" class="btn-danger"
                                        type="button">Keluar</button></div>
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
