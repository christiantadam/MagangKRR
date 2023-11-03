@extends('layouts.appABM')
@section('content')
    <script type="text/javascript" src="{{ asset('js/AccPermohonanSatuDivisi.js') }}"></script>


    <body onload="Greeting()">
        <style>
            /* Gaya untuk modal */
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
            }

            .close-btn {
                position: absolute;
                top: 10px;
                right: 10px;
                cursor: pointer;
            }
        </style>
        <div id="app">
            <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                <div class="card-body" style="flex: 1; margin-right: -20px; margin-left: 75px;">
                    <!-- Konten Card Body Kiri -->
                    <div class="form-wrapper mt-4">
                        <div class="form-container">
                            <div class="card" style="width: 1200px; margin-left: -110px">
                                <div class="card-header">Pemberi Barang</div>
                                <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                                    <div class="form berat_woven">
                                        <form action="#" method="post" role="form">
                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Divisi:</span>
                                                </div>
                                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="IdDivisi" id="IdDivisi"
                                                        placeholder="IdDivisi" readonly>
                                                    <div class="text-center col-md-auto"><button type="button"
                                                            onclick="openModal()" id="ButtonDivisi">...</button></div>
                                                    <div class="form-group col-md-3 mt-3 mt-md-0">
                                                        <input type="date" class="form-control" name="date"
                                                            id="date" placeholder="Tanggal"
                                                            style="width: 400px; margin-left: 350px; margin-top: 10px">
                                                    </div>
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
                                                                </tbody>
                                                            </table>
                                                            <div class="text-center col-md-auto">
                                                                <button type="button"
                                                                    onclick="closeModal()">Process</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Objek:</span>
                                                </div>
                                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Objek" id="NamaObjek"
                                                        placeholder="NamaObjek" readonly>
                                                    <div class="text-center col-md-auto"><button type="button"
                                                            onclick="openModal1()" id="ButtonObjek">...</button></div>
                                                    <div class="modal" id="myModal1">
                                                        <div class="modal-content">
                                                            <span class="close-btn" onclick="closeModal1()">&times;</span>
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
                                                                </tbody>
                                                            </table>
                                                            <div class="text-center col-md-auto">
                                                                <button type="button"
                                                                    onclick="closeModal1()">Process</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="card row">
                                                <!-- Kelompok Utama & Kode Transaksi -->
                                                <div class="col-md-6">
                                                    <div class="form-group d-flex align-items-center">
                                                        <span class="aligned-text pr-2">Kelompok&nbsp;Utama:</span>
                                                        <input type="text" class="form-control" name="kelut" id="kelut"
                                                            placeholder="Kelompok Utama">
                                                    </div>
                                                    <div class="form-group d-flex align-items-center">
                                                        <span style="margin-left: 15px" class="aligned-text pr-2">Kode&nbsp;Transaksi:</span>
                                                        <input style="width: 200px" type="text" class="form-control" name="Transaksi" id="Transaksi"
                                                            placeholder="Transaksi">
                                                    </div>
                                                </div>
                                                <!-- Kelompok & Sub Kelompok -->
                                                <div class="col-md-6">
                                                    <div class="form-group d-flex align-items-center">
                                                        <span class="aligned-text pr-2">Kelompok:</span>
                                                        <input type="text" class="form-control" name="Kelompok" id="Kelompok"
                                                            placeholder="Kelompok">
                                                    </div>
                                                    <div class="form-group d-flex align-items-center">
                                                        <span class="aligned-text pr-2">Sub&nbsp;Kelompok:</span>
                                                        <input type="text" class="form-control" name="sub_kelompok" id="sub_kelompok"
                                                            placeholder="Sub Kelompok">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Nama Barang:</span>
                                                </div>
                                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Barang" id="Barang"
                                                        placeholder="Nama Barang">
                                                </div>
                                            </div> --}}
                                            <div class="card">
                                                <div class="row mt-3">
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Kelompok Utama:</span>
                                                    </div>
                                                    <div class="form-group col-md-3 mt-3 mt-md-0">
                                                        <input type="text" class="form-control" name="Kelut"
                                                            id="Kelut" placeholder="Kelompok Utama">
                                                    </div>
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Sub Kelompok :</span>
                                                    </div>
                                                    <div class="form-group col-md-3 mt-3 mt-md-0">
                                                        <input type="text" class="form-control" name="SubKelompok"
                                                            id="SubKelompok" placeholder="Sub Kelompok ">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Kode Transaksi:</span>
                                                    </div>
                                                    <div class="form-group col-md-2 mt-3 mt-md-0">
                                                        <input type="text" class="form-control" name="Transaksi"
                                                            id="Transaksi" placeholder="Kode Transaksi">
                                                    </div>
                                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                                        <span class="aligned-text">Kelompok :</span>
                                                    </div>
                                                    <div class="form-group col-md-3 mt-3 mt-md-0">
                                                        <input type="text" class="form-control" name="Kelompok"
                                                            id="Kelompok" placeholder="Kelompok ">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Nama Barang:</span>
                                                </div>
                                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Barang"
                                                        id="Barang" placeholder="Nama Barang">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Jenis Mutasi:</span>
                                                </div>
                                                <div class="form-group col-md-4 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Mutasi"
                                                        id="Mutasi" placeholder="Jenis Mutasi">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Jumlah Barang:</span>
                                                </div>
                                                <div class="form-group col-md-2 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Primer"
                                                        id="Primer" placeholder="Primer">
                                                </div>
                                                <div class="form-group col-md-1 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="JumlahPrimer"
                                                        id="JumlahPrimer" style="margin-left: -20px">
                                                </div>
                                                <div class="form-group col-md-2 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Sekunder"
                                                        id="Sekunder" placeholder="Sekunder">
                                                </div>
                                                <div class="form-group col-md-1 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="JumlahSekunder"
                                                        id="JumlahSekunder" style="margin-left: -20px">
                                                </div>
                                                <div class="form-group col-md-2 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Tritier"
                                                        id="Tritier" placeholder="Tritier">
                                                </div>
                                                <div class="form-group col-md-1 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="JumlahTritier"
                                                        id="JumlahTritier" style="margin-left: -20px">
                                                </div>
                                            </div>

                                    </div>

                                    <div class="card mt-auto">
                                        <div class="card-header">Type</div>
                                        <table id="TableType">
                                            <thead>
                                                <th>Id Transaksi</th>
                                                <th>Tanggal </th>
                                                <th>Barang </th>
                                                <th>Alasan </th>
                                                <th>Objek Pemberi</th>
                                                <th>Kel. Utama</th>
                                                <th>Kelompok</th>
                                                <th>Sub Kel</th>
                                                <th>Permohonan</th>
                                                <th>Primer</th>
                                                <th>Sekunder</th>
                                                <th>Tritier</th>
                                                <th>Kd Barang</th>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card mt-4 ml-4 mr-4">
                                        <div class="card-header">Type</div>
                                        <table id="TableTest1">
                                            <thead>
                                                <th>Test</th>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col- row justify-content-md-center ml-3">
                    <div class="text-center col-md-auto mb-3"><button type="button"
                            style="width: 100px">Refresh</button>
                    </div>
                    <div class="text-center col-md-auto mb-3"><button type="button" style="width: 100px">Proses</button>
                    </div>
                    <div class="text-center col-md-auto mb-3"><button type="button" style="width: 100px">Exit</button>
                    </div>
                </div>
            </div>
            </form>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
        </div>
    </body>
@endsection
