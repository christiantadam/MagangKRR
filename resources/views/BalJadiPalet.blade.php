@extends('layouts.appABM')
@section('content')
    <title style="font-size: 20px">@yield('title', 'Bal Jadi Palet')</title>
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
                                                                    style="width: 100px; margin-top: 10px"
                                                                    onchange="setShiftValue(this.value)">
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
                                                <button type="button" onclick="openModal1()" id="ButtonDivisi"
                                                    style="width:180px; height: 50px" disabled>Divisi</button>
                                            </div>
                                            <div class="modal" id="myModal1">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal1()">&times;</span>
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
                                                            @foreach ($dataDivisi as $data)
                                                                <tr>
                                                                    <td>{{ $data->IdDivisi }}</td>
                                                                    <td>{{ $data->NamaDivisi }}</td>
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

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto mt-3">
                                                <button type="button" onclick="openModal2()" id="ButtonType"
                                                    style="width:180px; height: 50px" disabled>Pilih Type</button>
                                            </div>
                                            <div class="modal" id="myModal2">
                                                <div class="modal-content" style="width: 1750px">
                                                    <span class="close-btn" onclick="closeModal2()">&times;</span>
                                                    <h2>Table Type</h2>
                                                    <p>Id Type & Type</p>
                                                    <table id="TableType">
                                                        <thead>
                                                            <tr>
                                                                <th>Id Type</th>
                                                                <th style="width: 500px">Nama Type</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <!-- Add more rows as needed -->
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto mt-3">
                                                        <button type="button" onclick="closeModal2()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%;">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    id="ScanBarcodeButton" style="width: 180px; height: 50px"
                                                    onclick="scanBarcode()" disabled>Scan Barcode</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    id="ButtonPrintBarcode" style="width: 180px; height: 50px"
                                                    disabled>Print Barcode</button>
                                            </div>
                                        </div>

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto mt-3">
                                                <button type="button" onclick="openModal3()" id="ButtonType"
                                                    style="width:180px; height: 50px">Acc Barcode</button>
                                            </div>
                                            <div class="modal" id="myModal3">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal3()">&times;</span>
                                                    <h2>Acc Barcde</h2>
                                                    <p>Masukan Barcode</p>
                                                    <div class="row">
                                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                                            <span class="aligned-text">Barcode:</span>
                                                        </div>
                                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                                            <input type="text" class="form-control" name="Barang"
                                                                id="Barang" placeholder="Barang">
                                                        </div>
                                                    </div>
                                                    <div class="text-center col-md-auto mt-3">
                                                        <button type="button" onclick="closeModal3()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width: 180px; height: 50px" class="btn-danger">Keluar</button>
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
                                                <input id="shiftInput" class="form-control" type="text"
                                                    name="shift" rows="shift" placeholder="Shift" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Type:</span>
                                            </div>
                                            <div class="form-group col-md-2 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="IdType" rows="IdType"
                                                    id="IdType" placeholder="IdType" readonly>
                                            </div>
                                            <div class="form-group col-md-5 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="NamaType"
                                                    rows="NamaType" id="NamaType" placeholder="Type" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">No Barcode:</span>
                                            </div>
                                            <div class="form-group col-md-5 mt-3 mt-md-0">
                                                <input id="BarcodeInput" class="form-control" type="text"
                                                    name="BarcodeInput" rows="BarcodeInput" placeholder="Barcode"
                                                    readonly>
                                            </div>
                                        </div>

                                        <div class="card ml-5 mr-5 mt-3 m-3">
                                            <div class="card-header">Type</div>
                                            <table id="TableType1">
                                                <thead>
                                                    <th style="width: 400px">Barcode</th>
                                                    <th>Jumlah Primer </th>
                                                    <th>Jumlah Sekunder</th>
                                                    <th>Jumlah Tritier</th>
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
                                        placeholder="Primer" id="primer">
                                    <div class="text-center col-md-auto"><button style="width: 100px"
                                            type="button">Ball</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Sekunder:</span>
                                </div>
                                <div class="form-group col-md-5 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="sekunder" rows="sekunder"
                                        placeholder="Sekunder" id="sekunder">
                                    <div class="text-center col-md-auto"><button style="width: 100px"
                                            type="button">LBR</button></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Tritier:</span>
                                </div>
                                <div class="form-group col-md-5 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="tritier" rows="tritier"
                                        placeholder="Tritier" id="tritier">
                                    <div class="text-center col-md-auto"><button style="width: 100px"
                                            type="button">KG</button></div>
                                </div>
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
