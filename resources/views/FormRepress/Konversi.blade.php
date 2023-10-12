@extends('layouts.appBarcode')
@section('content')
<link href="{{ asset('css/Barcode/Repress.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js\FormRepress.js\Konversi.js') }}"></script>


<body onload="Greeting()">
    <div class="form-wrapper mt-4">
        <div style="width: 80%;">
            <div class="card" style="height: 850px">
                <div class="card-header">FrmPembayaranStaff</div>
                <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                    <div class="form berat_woven">
                        <form action="#" method="post" role="form">
                            <div style="display:flex; gap:3%">
                                <div style="display: flex; flex-direction: column; gap:5px; white-space:nowrap">
                                    <div class="row">
                                        <div class="form-group col-md-6 d-flex justify-content-end">
                                            <span class="aligned-text">Tanggal:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input style="margin-left: 15px" type="date" class="form-control"
                                                name="tanggal" id="tanggalInput" placeholder="Tanggal">
                                        </div>
                                    </div>

                                    <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                        <div class="text-center col-md-auto">
                                            <button type="button" onclick="openModal()" id="ButtonShift"
                                                style="width:180px; height: 50px" disabled>Pilih
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
                                        <div class="text-center col-md-auto mt-3"><button type="button" id="ButtonScanBarcode"
                                                onclick="openModal1()" style="width:180px; height: 50px" disabled>Scan
                                                Barcode</button>
                                        </div>
                                        <div class="modal" id="myModal1">
                                            <div class="modal-content">
                                                <span class="close-btn" onclick="closeModal1()">&times;</span>
                                                <h2>Scan Barcode</h2>
                                                <p>Masuskan Barcode</p>
                                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                                    <input style="margin-left: -15px;" type="text"
                                                        class="form-control" name="Barcode" id="BarcodeInput"
                                                        placeholder="Barcode">
                                                    <button
                                                        style="margin-left: 20px;width: 100px;position: absolute;right: -105px;"
                                                        type="button" onclick="closeModal1()">Ok</button>
                                                    <button
                                                        style="margin-left: 20px;width: 100px;position: absolute;right: -231px;"
                                                        type="button" onclick="closeModal1()">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                        <div class="text-center col-md-auto mt-3">
                                            <button type="button" onclick="openModal2()" id="ButtonType"
                                                style="width:180px; height: 50px" disabled>Pilih Type</button>
                                        </div>
                                        <div class="modal" id="myModal2">
                                            <div class="modal-content">
                                                <span class="close-btn" onclick="closeModal2()">&times;</span>
                                                <h2>Table Type</h2>
                                                <p>Id Type & Type</p>
                                                <table id="TableType">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Type</th>
                                                            <th>Id Type</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Add more rows as needed -->
                                                    </tbody>
                                                </table>
                                                <div class="text-center col-md-auto mt-3">
                                                    <button type="button"
                                                        onclick="enableButtonJumlahBarang()">Process</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                        <div class="text-center col-md-auto mt-3"><button type="button" id="ButtonTimbang"
                                                style="width:180px; height: 50px" disabled>Timbang</button>
                                        </div>
                                    </div>

                                    <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                        <div class="text-center col-md-auto mt-3"><button type="button" id="ButtonPrintBarcodeKonversi"
                                                style="width:180px; height: 50px" disabled>Print
                                                Barcode Konversi</button>
                                        </div>
                                    </div>

                                    <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                        <div class="text-center col-md-auto mt-3"><button type="button"
                                                onclick="openModal4()" id="ButtonJumlahBarang"
                                                style="width:180px; height: 50px" >Acc Barcode</button>
                                        </div>
                                        <div class="modal" id="myModal4">
                                            <div class="modal-content">
                                                <span class="close-btn" onclick="closeModal4()">&times;</span>
                                                <div class="card col-md-auto">
                                                    <div class="row form-group">
                                                        <div class="col-md-3 d-flex justify-content-end"
                                                            style="margin-left: -50px">
                                                            <span class="aligned-text mt-3">No Barcode:</span>
                                                        </div>
                                                        <div class="mt-4">
                                                            <div class="form-group col-md-auto mt-3 mt-md-1">
                                                                <input type="text" class="form-control"
                                                                    name="Barcode" id="Barcode"
                                                                    style="width: 400px" placeholder="Barcode">
                                                            </div>
                                                        </div>
                                                        <div class="text-center col-md-auto"
                                                            style="margin-top: 15px;"><button style="width: 100px" onclick="prosesACCBarcode()"
                                                                type="button">Ok</button></div>
                                                        <div class="text-center col-md-auto" style="margin-top: 15px;"
                                                            onclick="closeModal4()"><button style="width: 100px"
                                                                type="button">Cancel</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                        <div class="text-center col-md-auto mt-3"><button type="button" onclick="PrintUlangData()"
                                                style="width:180px; height: 50px" >Print
                                                Ulang</button>
                                        </div>
                                    </div>

                                    <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                        <div class="text-center col-md-auto mt-3"><button type="button"
                                                class="btn-danger" style="width:180px; height: 50px">Keluar</button>
                                        </div>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                                <div class="card" style="width: 100%; height: 510px">
                                    <div class="card-header">Data Barang</div>
                                    <div class="row mt-3">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Tanggal:</span>
                                        </div>
                                        <div class="form-group col-md-4 mt-3 mt-md-0">
                                            <input class="form-control" type="date" name="tanggal"
                                                id="tanggalOutput" placeholder="Tanggal" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Shift:</span>
                                        </div>
                                        <div class="form-group col-md-4 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="shift" id="shift"
                                                placeholder="Shift" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Barcode:</span>
                                        </div>
                                        <div class="form-group col-md-4 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="BarcodeKonversi"
                                                id="BarcodeKonversi" placeholder="Barcode Konversi" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Type Asal:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <textarea class="form-control" name="asal" id="TypeAsal" rows="asal" placeholder="Asal" style="height: 100px" readonly></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Type Tujuan:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <textarea class="form-control" name="tujuan" rows="tujuan" placeholder="Tujuan"
                                            id="tujuan" style="height: 100px" readonly></textarea>
                                        </div>
                                    </div>

                                    <div style="display: flex; flex-wrap:wrap; margin:10px;">
                                        <div
                                            style="flex: 0 0 50%; max-width: 50%; margin-left:94px; margin-top: -10px">
                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Divisi:</span>
                                                </div>
                                                <div class="form-group col-md-5 mt-3 mt-md-0">
                                                    <input class="form-control" type="text" name="Divisi" id="Divisi"
                                                        rows="Divisi" placeholder="Divisi" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card mt-3"
                                style="width: 80.5%;margin-left:260px;display: flex;flex-direction: column;gap:5px;white-space:nowrap;position: absolute;top: 571px;">
                                <div class="card-header">Hasil Produksi</div>
                                <div class="row mt-3">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Primer:</span>
                                    </div>
                                    <div class="form-group col-md-5 mt-3 mt-md-0">
                                        <input class="form-control" type="text" name="primer" rows="primer" id="Primer"
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
                                        <input class="form-control" type="text" name="sekunder"
                                            id="Sekunder" rows="sekunder" placeholder="Sekunder" readonly>
                                        <div class="text-center col-md-auto">
                                            <button type="button" style="width: 100px"
                                                onclick="openModal3()">LBR</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Tritier:</span>
                                    </div>
                                    <div class="form-group col-md-5 mt-3 mt-md-0">
                                        <input class="form-control" type="text" name="tritier" rows="tritier"
                                            placeholder="Tritier" id="Tritier">
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
