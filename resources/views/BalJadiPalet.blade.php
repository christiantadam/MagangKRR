@extends('layouts.appABM')
@section('content')
<script type="text/javascript" src="{{ asset('js/BarcodeKerta2/BalJadiPalet.js') }}"></script>


    <body onload="Greeting()">
        <div class="form-wrapper mt-4">
            <div style="width: 80%;">
                <div class="card" style="margin-right: 30px">
                    <div class="card-header">Press Ulang</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form berat_woven">
                            <form action="#" method="post" role="form">
                                <div style="display:flex;gap:3%">
                                    <div style="display: flex; flex-direction: column;gap:5px;white-space:nowrap">
                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto">
                                                <button type="button" onclick="openModal()" id="ButtonShift"
                                                    style="width:180px;">Pilih
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
                                            <div class="text-center col-md-auto mt-3">
                                                <button type="button" onclick="openModal()" id="ButtonDivisi"
                                                    style="width:180px;">Divisi</button>
                                            </div>
                                            <div class="modal" id="myModal">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal()">&times;</span>
                                                    <h2>Table Divisi</h2>
                                                    <p>Id Divisi & Divisi</p>
                                                    <table id="TableDivisi">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama Divisi</th>
                                                                <th>Id Divisi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>p</td>
                                                                <td>p</td>
                                                            </tr>
                                                            <!-- Add more rows as needed -->
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto mt-3">
                                                        <button type="button" onclick="closeModal()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto mt-3">
                                                <button type="button" onclick="openModal1()" id="ButtonType"
                                                    style="width:180px;">Pilih Type</button>
                                            </div>
                                            <div class="modal" id="myModal1">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal1()">&times;</span>
                                                    <h2>Table Type</h2>
                                                    <p>Id Type & Type</p>
                                                    <table id="TableType">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama Type</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Test</td>
                                                            </tr>
                                                            <!-- Add more rows as needed -->
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto mt-3">
                                                        <button type="button"
                                                            onclick="closeModal1()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%;">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width: 180px">Scan
                                                    Barcode</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width: 180px">Print
                                                    Barcode</button>
                                            </div>
                                        </div>

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto mt-3">
                                                <button type="button" onclick="openModal2()" id="ButtonType"
                                                    style="width:180px;">Acc Barcode</button>
                                            </div>
                                            <div class="modal" id="myModal2">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal2()">&times;</span>
                                                    <h2>Acc Barcde</h2>
                                                    <p>Masukan Barcode</p>
                                                    <div class="row">
                                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                                            <span class="aligned-text">Barcode:</span>
                                                        </div>
                                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                                            <input type="text" class="form-control" name="Barang" id="Barang"
                                                                placeholder="Barang">
                                                        </div>
                                                    </div>
                                                    <div class="text-center col-md-auto mt-3">
                                                        <button type="button"
                                                            onclick="closeModal2()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width: 180px" class="btn-danger">Keluar</button>
                                            </div>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                    <div class="card" style="width: 100%; margin-left: 72px">
                                        <div class="card-header">Press Ulang</div>
                                        <div class="row mt-3">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Shift:</span>
                                            </div>
                                            <div class="form-group col-md-3 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="shift" rows="shift"
                                                    placeholder="Shift">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Type:</span>
                                            </div>
                                            <div class="form-group col-md-2 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="Type" rows="Type"
                                                    placeholder="Type">
                                            </div>
                                            <div class="form-group col-md-5 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="Type" rows="Type"
                                                    placeholder="Type">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">No Barcode:</span>
                                            </div>
                                            <div class="form-group col-md-5 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="Barcode" rows="Barcode"
                                                    placeholder="Barcode">
                                            </div>
                                        </div>

                                        <div class="card ml-5 mr-5 mt-3 m-3">
                                            <div class="card-header">Type</div>
                                            <table id="TableType1">
                                                <thead>
                                                    <th>Barcode</th>
                                                    <th>Jumlah </th>
                                                    <th>Jumlah </th>
                                                    <th>Jumlah</th>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="card mt-3" style="width: 77.5%; margin-left:327px; margin-right: 100px">
                            <div class="card-header">Total</div>
                            <div class="row mt-3">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Primer:</span>
                                </div>
                                <div class="form-group col-md-5 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="primer" rows="primer"
                                        placeholder="Primer">
                                    <div class="text-center col-md-auto"><button type="button">Ball</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Sekunder:</span>
                                </div>
                                <div class="form-group col-md-5 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="sekunder" rows="sekunder"
                                        placeholder="Sekunder">
                                    <div class="text-center col-md-auto"><button type="button">LBR</button></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Tritier:</span>
                                </div>
                                <div class="form-group col-md-5 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="tritier" rows="tritier"
                                        placeholder="Tritier">
                                    <div class="text-center col-md-auto"><button type="button">KG</button></div>
                                </div>
                            </div>
                        </div>


                        <div class="card mt-3" style="width: 77.5%; margin-left:327px">
                            <div class="card-header">Input Data Barang</div>
                            <div class="row mt-3">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Tanggal:</span>
                                </div>
                                <div class="form-group col-md-5 mt-3 mt-md-0">
                                    <input class="form-control" type="date" name="Tanggal" rows="Tanggal"
                                        placeholder="Tanggal">
                                    <span class="text-center ml-3">Bulan/Tanggal/Tahun</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Kode Barang:</span>
                                </div>
                                <div class="form-group col-md-7 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="Barang" rows="Barang"
                                        placeholder="Barang">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Kelompok:</span>
                                </div>
                                <div class="form-group col-md-2 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="Kelompok" rows="Kelompok"
                                        placeholder="Kelompok">
                                </div>
                                <div class="form-group col-md-5 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="Kelompok" rows="Kelompok"
                                        placeholder="Kelompok">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Sub Kelompok:</span>
                                </div>
                                <div class="form-group col-md-2 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="sub_kelompok" rows="sub_kelompok"
                                        placeholder="Sub Kelompok">
                                </div>
                                <div class="form-group col-md-5 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="sub_kelompok" rows="sub_kelompok"
                                        placeholder="Sub Kelompok">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Divisi:</span>
                                </div>
                                <div class="form-group col-md-2 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="Divisi" rows="Divisi"
                                        placeholder="Divisi">
                                </div>
                                <div class="form-group col-md-5 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="Divisi" rows="Divisi"
                                        placeholder="Divisi">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Kelut:</span>
                                </div>
                                <div class="form-group col-md-2 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="Kelut" rows="Kelut"
                                        placeholder="Kelut">
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-4">Gunakan Untuk Menggabungkan Bal Menjadi 1 Palet (Press Ulang)</h4>
                    </div>
                    </form>
                </div>
            </div>
        <main class="py-4">
            @yield('content')
        </main>
        </div>
    </body>
@endsection
