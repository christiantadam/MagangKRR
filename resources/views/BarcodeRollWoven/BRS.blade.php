@extends('layouts.appABM')
@section('content')
<title style="font-size: 20px">@yield('title', 'Barcode Roll Sisa')</title>
    <script type="text/javascript" src="{{ asset('js/BarcodeRollWoven/BRS.js') }}"></script>

    <body onload="Greeting()">
        <div class="form-wrapper mt-4">
            <div style="width: 80%;">
                <div class="card" style="height: 1000px">
                    <div class="card-header">FrmPembayaranStaff</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form berat_woven">
                            <form action="#" method="post" role="form">
                                <div style="display:flex;gap:3%">
                                    <div style="display: flex; flex-direction: column;gap:5px;white-space:nowrap">
                                        <div class="row">
                                            <div class="form-group col-md-5 d-flex justify-content-end">
                                                <span class="aligned-text" style="">Tanggal:</span>
                                            </div>
                                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                                <input type="date" class="form-control" name="tanggal" id="tanggalInput"
                                                    style="margin-left: 15px; width: 230px" placeholder="Tanggal">
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

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width: 180px; height: 50px" onclick="openModal1()">Pilih Sub
                                                    Kelompok</button></div>
                                            <div class="modal" id="myModal1">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal1()">&times;</span>
                                                    <h2>Table Sub Kelompok </h2>
                                                    <p>Id Sub Kelompok & Sub Kelompok </p>
                                                    <table id="TableSubKelompok">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Sub Kelompok </th>
                                                                <th>Nama Sub Kelompok </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($dataSubKelompok as $data)
                                                                <tr>
                                                                    <td>{{ $data->IdSubkelompok }}</td>
                                                                    <td>{{ $data->NamaSubKelompok }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal1()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width: 180px; height: 50px" onclick="openModal2()">Pilih
                                                    Type</button>
                                            </div>
                                            <div class="modal" id="myModal2">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal2()">&times;</span>
                                                    <h2>Table Type </h2>
                                                    <p>Id Type & Type </p>
                                                    <table id="TableType">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Type </th>
                                                                <th>Type </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{-- @foreach ($dataKelut as $data)
                                                                        <tr>
                                                                            <td>{{ $data->IdKelompokUtama }}</td>
                                                                            <td>{{ $data->NamaKelompokUtama }}</td>
                                                                        </tr>
                                                                    @endforeach --}}
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal2()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width: 180px; height: 50px">Timbang</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    id="ButtonPrintBarcode" style="width: 180px; height: 50px">Print Barcode
                                                </button></div>
                                        </div>

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    onclick="openModal3()" id="ButtonJumlahBarang"
                                                    style="width:180px; height: 50px">Acc Barcode</button>
                                            </div>
                                            <div class="modal" id="myModal3">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal3()">&times;</span>
                                                    <div class="card col-md-auto">
                                                        <div class="row form-group">
                                                            <div class="col-md-3 d-flex justify-content-end">
                                                                <span class="aligned-text mt-3">No Barcode:</span>
                                                            </div>
                                                            <div class="mt-4">
                                                                <div class="form-group col-md-auto mt-3 mt-md-1">
                                                                    <input type="text" class="form-control"
                                                                        name="BarcodeACC" id="BarcodeACC"
                                                                        style="width: 500px" placeholder="Barcode">
                                                                </div>
                                                            </div>
                                                            <div class="text-center col-md-auto"
                                                                style="margin-top: 15px; margin-left:350px;"><button
                                                                    style="width: 100px; height: 50px"
                                                                    onclick="prosesACCBarcode()"
                                                                    type="button">Ok</button></div>
                                                            <div class="text-center col-md-auto" style="margin-top: 15px;"
                                                                onclick="closeModal3()"><button
                                                                    style="width: 100px; height: 50px"
                                                                    type="button">Cancel</button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    onclick="PrintUlangData()" style="width:180px; height: 50px">Print
                                                    Ulang</button>
                                            </div>
                                        </div>

                                        <div id="form-container"></div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    class="btn-danger" style="width: 180px; height: 50px">Keluar</button>
                                            </div>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                    <div class="card" style="width: 80%;position: absolute;right: 19px;">
                                        <div class="card-header">Data Barang</div>
                                        <div class="row mt-3">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Tanggal:</span>
                                            </div>
                                            <div class="form-group col-md-3 mt-3 mt-md-0">
                                                <input class="form-control" type="date" name="tanggal" rows="tanggal"
                                                    id="tanggalOutput" placeholder="Tanggal" readonly>
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
                                                <span class="aligned-text">Kelompok:</span>
                                            </div>
                                            <div class="form-group col-md-2 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="ID_Kelompok"
                                                    rows="ID_Kelompok" placeholder="Id Kelompok" readonly>
                                            </div>
                                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="Kelompok"
                                                    rows="Kelompok" placeholder="Kelompok" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Sub Kelompok:</span>
                                            </div>
                                            <div class="form-group col-md-2 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="ID_Subkelompok"
                                                    id="ID_Subkelompok" rows="ID_Subkelompok"
                                                    placeholder="Id SubKelompok" readonly>
                                            </div>
                                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="Subkelompok"
                                                    id="Subkelompok" rows="Subkelompok" placeholder="Sub Kelompok"
                                                    readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Type:</span>
                                            </div>
                                            <div class="form-group col-md-2 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="IdType" rows="IdType"
                                                    id="IdType" placeholder="Id Type" readonly>
                                            </div>
                                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="Type" rows="Type"
                                                    id="Type" placeholder="Type" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-3"
                                    style="width: 80%;margin-left:315px;position: absolute;top: 414px;right: 19px;">
                                    <div class="card-header">Info Barang</div>
                                    <div class="row mt-3">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Kode Barang:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="Barang" rows="Barang"
                                                placeholder="Barang" id="Barang" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Stok Akhir Primer :</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="stok_Primer"
                                                rows="stok_Primer" placeholder="Primer" id="stok_Primer" readonly>
                                            {{-- <div class="text-center col-md-auto"><button type="button"
                                                    style="width: 100px">NULL</button></div> --}}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Stok Akhir Sekunder :</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="stok_Sekunder"
                                                rows="stok_Sekunder" placeholder="Sekunder" id="stok_Sekunder" readonly>
                                            {{-- <div class="text-center col-md-auto"><button type="button"
                                                    style="width: 100px">DOS</button></div> --}}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text"> Stok Akhir Tritier:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="stok_Tritier"
                                                rows="stok_Tritier" placeholder="Tritier" id="stok_Tritier" readonly>
                                            {{-- <div class="text-center col-md-auto"><button type="button"
                                                    style="width: 100px">KG</button></div> --}}
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="card mt-3"
                            style="width: 80%;margin-left:315px;position: absolute;right: 18px;top: 727px;">
                            <div class="card-header">Hasil Produksi</div>
                            <div class="row mt-3">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Primer:</span>
                                </div>
                                <div class="form-group col-md-5 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="primer" rows="primer"
                                        placeholder="Primer" readonly>
                                    <div class="text-center col-md-auto"><button type="button"
                                            style="width: 100px">Ball</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Sekunder:</span>
                                </div>
                                <div class="form-group col-md-5 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="sekunder" rows="sekunder"
                                        placeholder="Sekunder" readonly>
                                    <div class="text-center col-md-auto"><button type="button"
                                            style="width: 100px">LBR</button></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Tritier:</span>
                                </div>
                                <div class="form-group col-md-5 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="tritier" rows="tritier"
                                        placeholder="Tritier">
                                    <div class="text-center col-md-auto"><button type="button"
                                            style="width: 100px">KG</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 style="margin-left: 10px">Lakukan Print Ulang Jika Barcode Rusak atau Printer Rusak</h6>
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
