@extends('layouts.appABM')
@section('content')
<title style="font-size: 20px">@yield('title', 'Barcode Barang Jadi')</title>
    <script type="text/javascript" src="{{ asset('js/BarcodeRollWoven/BBJ.js') }}"></script>

    <style>
        /* Menyesuaikan penempatan bidang input dalam kontainer */
        .input-container {
            display: flex;
            justify-content: flex-end;
        }

        /* Menentukan lebar bidang input */
        #tanggal {
            width: 140px;
            /* Sesuaikan nilai ini sesuai kebutuhan */
        }
    </style>


    <body onload="Greeting()">
        <div class="form-wrapper mt-4">
            <div style="width: 80%;">
                <div class="card" style="height: 1025px">
                    <div class="card-header">FrmPembayaranStaff</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form berat_woven">
                            <form action="#" method="post" role="form">
                                <div style="display:flex;gap:3%">
                                    <div style="display: flex; flex-direction: column;gap:5px;white-space:nowrap">
                                        <div class="row">
                                            <div class="form-group col-md-5 d-flex justify-content-end">
                                                <span class="aligned-text">Tanggal:</span>
                                            </div>
                                            <div class="form-group col-md-9 mt-3 mt-md-0 ml-3">
                                                <input type="date" class="form-control" id="tanggalInput"
                                                    placeholder="Tanggal">
                                            </div>
                                        </div>

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto">
                                                <button type="button" onclick="openModal()" id="ButtonShift"
                                                    style="width:180px; height: 50px">Pilih
                                                    Shift</button>
                                            </div>
                                            <div class="modal" id="myModal">
                                                <div class="modal-content">
                                                    <span>&times;</span>
                                                    <div class="card col-md-auto"
                                                        style="margin-left:50px; margin-right:50px; margin-top:50px; margin-bottom:50px;">
                                                        <div class="row form-group">
                                                            <div class="col-md-3 d-flex justify-content-end">
                                                                <span class="aligned-text mt-3">Pilih Shift:</span>
                                                            </div>
                                                            <div class="form-group mt-4">
                                                                <select id="Shift"
                                                                    style="width: 100px; margin-top: 10px">
                                                                    <option value="Pagi">1</option>
                                                                    <option value="Sore">2</option>
                                                                    <option value="Malam">3</option>
                                                                </select>
                                                            </div>
                                                            <div class="text-center col-md-auto"
                                                                style="margin-top: 15px; margin-left:200px">
                                                                <button type="button" id="okButton"
                                                                    onclick="setShiftValue()">Ok</button>
                                                            </div>
                                                            <div class="text-center col-md-auto" style="margin-top: 15px;"
                                                                onclick="closeModal()">
                                                                <button type="button">Cancel</button>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <h6>Ketik 1 Untuk Shift Pagi, Ketik 2 Untuk Shift Sore,
                                                                dan<br>Ketik 3 Untuk Shift Malam</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"style="width: 160px">Pilih Sub
                                                    Kelompok</button></div>
                                        </div> --}}

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto mt-3">
                                                <button type="button" onclick="openModal1()" id="ButtonKelompokUtama"
                                                    style="width:180px; height: 50px">Pilih Kelompok Utama</button>
                                            </div>
                                            <div class="modal" id="myModal1">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal1()">&times;</span>
                                                    <h2>Table Kelompok Utama</h2>
                                                    <p>Kelompok Utama & Id Kelompok Utama</p>
                                                    <table id="TableKelompokUtama">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama Kelompok Utama</th>
                                                                <th>Id Kelompok Utama</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($dataKelompokUtama as $data)
                                                                <tr>
                                                                    <td>{{ $data->NamaKelompokUtama }}</td>
                                                                    <td>{{ $data->IdKelompokUtama }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto mt-3">
                                                        <button type="button" onclick="closeModal1()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width: 160px">Pilih Type</button>
                                            </div>
                                        </div> --}}

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto mt-3">
                                                <button type="button" onclick="openModal2()" id="ButtonKelompokUtama"
                                                    style="width:180px; height: 50px">Pilih Kelompok</button>
                                            </div>
                                            <div class="modal" id="myModal2">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal2()">&times;</span>
                                                    <h2>Table Kelompok</h2>
                                                    <p>Kelompok & Id Kelompok</p>
                                                    <table id="TableKelompok">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama Kelompok</th>
                                                                <th>Id Kelompok</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto mt-3">
                                                        <button type="button" onclick="closeModal2()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto mt-3">
                                                <button type="button" onclick="openModal3()" id="ButtonSubKelompok"
                                                    style="width:180px; height: 50px">Pilih Sub Kelompok</button>
                                            </div>
                                            <div class="modal" id="myModal3">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal3()">&times;</span>
                                                    <h2>Table SubKelompok</h2>
                                                    <p>SubKelompok & Id SubKelompok</p>
                                                    <table id="TableSubKelompok">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama SubKelompok</th>
                                                                <th>Id SubKelompok</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto mt-3">
                                                        <button type="button" onclick="closeModal3()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto mt-3">
                                                <button type="button" onclick="openModal4()" id="ButtonSubKelompok"
                                                    style="width:180px; height: 50px">Pilih Type</button>
                                            </div>
                                            <div class="modal" id="myModal4">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal4()">&times;</span>
                                                    <h2>Table Type</h2>
                                                    <p>Type & Id Type</p>
                                                    <table id="TableType">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama Type</th>
                                                                <th>Id Type</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto mt-3">
                                                        <button type="button" onclick="closeModal4()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width:180px; height: 50px">Timbang</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width:180px; height: 50px" id="ButtonPrintBarcode">Print
                                                    Barcode
                                                </button></div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    onclick="prosesACCBarcode()" style="width:180px; height: 50px">ACC
                                                    Barcode</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    onclick="PrintUlangData()" style="width:180px; height: 50px">Print
                                                    Ulang</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button class="btn-danger"
                                                    type="button" style="width:180px; height: 50px">Keluar</button>
                                            </div>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                    <div class="card"
                                        style="width: 80%;margin-left: -12px;position: absolute;right: 19px;">
                                        <div class="card-header">Data Barang</div>
                                        <div class="row mt-3">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Tanggal:</span>
                                            </div>
                                            <div class="form-group col-md-3 mt-3 mt-md-0">
                                                <input type="date" class="form-control" id="tanggalOutput" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Shift:</span>
                                            </div>
                                            <div class="form-group col-md-3 mt-3 mt-md-0">
                                                <input type="text" class="form-control" name="shift"
                                                    id="shiftInput" rows="shift" placeholder="Shift" readonly>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Kel. Utama:</span>
                                            </div>
                                            <div class="form-group col-md-2 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="namaKelut"
                                                    rows="namaKelut" id="namaKelut" placeholder="Kel. Utama" readonly>
                                            </div>
                                            <div class="form-group col-md-5 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="IdKelut" rows="IdKelut"
                                                    id="IdKelut" placeholder="Id Kel. Utama" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Kelompok :</span>
                                            </div>
                                            <div class="form-group col-md-2 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="Kelompok"
                                                    id="Kelompok" rows="Kelompok" placeholder="Kelompok" readonly>
                                            </div>
                                            <div class="form-group col-md-5 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="IdKelompok"
                                                    id="IdKelompok" rows="IdKelompok" placeholder="IdKelompok" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text"> Sub Kelompok:</span>
                                            </div>
                                            <div class="form-group col-md-2 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="sub_kelompok"
                                                    id="sub_kelompok" rows="sub_kelompok" placeholder="Sub Kelompok"
                                                    readonly>
                                            </div>
                                            <div class="form-group col-md-5 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="idsub_kelompok"
                                                    id="idsub_kelompok" rows="idsub_kelompok"
                                                    placeholder="Id Sub Kelompok" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Type :</span>
                                            </div>
                                            <div class="form-group col-md-2 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="IdType" rows="IdType"
                                                    id="IdType" placeholder="Id Type" readonly>
                                            </div>
                                            <div class="form-group col-md-5 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="Type" rows="Type"
                                                    id="Type" placeholder="Type" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-3"
                                    style="width: 80%;margin-left:250px;position: absolute;top: 460px;right: 19px;">
                                    <div class="card-header">Hasil Produksi</div>

                                    <div class="row mt-3">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Kode Barang:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="Barang" rows="Barang"
                                                id="Barang" placeholder="Barang" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Stok Primer:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="primer" rows="primer"
                                                id="primer" placeholder="Primer" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Stok Sekunder:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="sekunder" rows="sekunder"
                                                id="sekunder" placeholder="Sekunder" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Stok Tritier:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="tritier" rows="tritier"
                                                id="tritier" placeholder="Tritier" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-3"
                                    style="width: 80%;margin-left:250px;position: absolute;top: 758px;right: 19px;">
                                    <div class="card-header">Hasil Produksi</div>
                                    <div class="row mt-3">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Primer:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="primer" rows="primer"
                                                placeholder="Primer" id="PrimerProduksi">
                                            <div class="text-center col-md-auto"><button type="button"
                                                    style="width: 100px">NULL</button>
                                            </div>
                                            <span style="margin-right: -250px; margin-left:207px">NoRoll</span>
                                            <input class="form-control" type="text" name="NoRoll" rows="NoRoll" value="0"
                                                style="margin-right: -500px; margin-left: 300px; width: 200px"
                                                placeholder="NoRoll">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Sekunder:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="sekunder" rows="sekunder"
                                                placeholder="Sekunder" id="SekunderProduksi">
                                            <div class="text-center col-md-auto"><button type="button"
                                                    style="width: 100px">DOS</button></div>
                                            <span style="margin-right: -250px; margin-left:207px">Afalan</span>
                                            <input class="form-control" type="text" name="Afalan" rows="Afalan" value="0"
                                                style="margin-right: -500px; margin-left: 300px; width: 200px"
                                                placeholder="Afalan">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Tritier:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="tritier" rows="tritier"
                                                placeholder="Tritier" id="TritierProduksi">
                                            <div class="text-center col-md-auto"><button type="button"
                                                    style="width: 100px">KG</button></div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
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
