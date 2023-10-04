@extends('layouts.appBarcode')
@section('content')
    <<link href="{{ asset('css/Barcode/Repress.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js\FormRepress.js\PaletJadiBal.js') }}"></script>

    <body onload="Greeting()">
        <style>
            .form-size-plus {
                font-size: 20px;
                /* Ukuran teks secara keseluruhan */
            }
        </style>

        <div class="form-wrapper mt-4">
            <div style="width: 80%;">
                <div class="card" style="height: 900px">
                    <div class="card-header">FrmPembayaranStaff</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form berat_woven">
                            <form action="#" method="post" role="form">
                                <div style="display:flex; gap:3%">
                                    <div style="display: flex; flex-direction: column; gap:5px; white-space:nowrap">
                                        <div class="row">
                                            <div class="form-group col-md-5 d-flex justify-content-end">
                                                <span class="aligned-text" style="">Tanggal:</span>
                                            </div>
                                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                                <input type="date" class="form-control" name="tanggal" id="tanggalInput"
                                                    style="margin-left: 15px; width: 230px" placeholder="Tanggal"
                                                    onchange="checkDateAndEnableButton()">
                                            </div>
                                        </div>

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto">
                                                <button type="button" onclick="openModal(); enableDivisiButton();"
                                                    id="ButtonShift" style="width: 180px; height: 50px" disabled>Pilih
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
                                                <button type="button" onclick="openModal1(); enableNamaTypeButton();"
                                                    id="ButtonDivisi" style="width: 180px; height: 50px"
                                                    disabled>Divisi</button>
                                            </div>
                                            <div class="modal" id="myModal1">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal1()">&times;</span>
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
                                                    <div class="text-center col-md-auto mt-3">
                                                        <button type="button" onclick="enableButtonType()"
                                                            onclick="closeModal1()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto mt-3">
                                                <button type="button"
                                                    onclick="openModal2(); enableIsiJumlahBarangButton();" id="ButtonType"
                                                    style="width: 180px; height: 50px" disabled>Nama Type</button>
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
                                            <div class="text-center col-md-auto mt-3">
                                                <button type="button" onclick="openModal3(); enableTimbangButton();"
                                                    id="ButtonJumlahBarangModal" style="width: 180px; height: 50px"
                                                    disabled>Isi Jumlah Barang</button>
                                            </div>
                                            <div class="modal" id="myModal3">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal3()">&times;</span>
                                                    <div class="card col-md-auto"
                                                        style="margin-left:50px; margin-right:50px; margin-top:50px; margin-bottom:50px;">
                                                        <div class="row form-group">
                                                            <div class="col-md-3 d-flex justify-content-end">
                                                                <span class="aligned-text mt-3">Jumlah Sekunder:</span>
                                                            </div>
                                                            <div class="mt-4">
                                                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                                                    <input style="width: 500px" type="text"
                                                                        class="form-control" name="Sekunder"
                                                                        id="Sekunder" placeholder="Sekunder"
                                                                        value="10">
                                                                </div>
                                                            </div>
                                                            <div class="text-center col-md-auto"
                                                                style="margin-top: 5px; margin-left:-100px">
                                                                <button type="button"
                                                                    onclick="setSekunderValue()">Ok</button>
                                                            </div>
                                                            <div class="text-center col-md-auto" style="margin-top: 5px;"
                                                                onclick="closeModal3()">
                                                                <button type="button">Cancel</button>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <h6>Masukan Jumlah Pcs, lembar, atau meter<br>Barang</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3">
                                                <button type="button" id="ButtonTimbang"
                                                    style="width:180px; height: 50px" disabled>Timbang</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    id="ButtonPrintBarcode" style="width:180px; height: 50px"
                                                    disabled>Print Barcode</button>
                                            </div>
                                        </div>

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    onclick="openModal4()" id="ButtonJumlahBarang"
                                                    style="width:180px; height: 50px">Acc Barcode</button>
                                            </div>
                                            <div class="modal" id="myModal4">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal4()">&times;</span>
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
                                                                onclick="closeModal4()"><button
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

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    class="btn-danger" style="width:180px; height: 50px">Keluar</button>
                                            </div>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                    <div class="card" style="width: 100%; margin-left: -75px; height: 500px">
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
                                                <input class="form-control" type="text" name="shift" id="shift"
                                                    placeholder="Shift" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Type :</span>
                                            </div>
                                            <div class="form-group col-md-5 mt-3 mt-md-0">
                                                <textarea class="form-control" type="text" name="Type" id="Type" rows="Type" placeholder="Type"
                                                    style="height: 100px" readonly></textarea>
                                            </div>
                                        </div>

                                        <div style="display: flex; flex-wrap:wrap; margin:10px;">
                                            <div style="flex: 0 0 50%; max-width: 50%; margin-left:94px">
                                                <div class="row">
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Jenis:</span>
                                                    </div>
                                                    <div class="form-group col-md-5 mt-3 mt-md-0">
                                                        <input class="form-control" type="text" name="Jenis"
                                                            rows="Jenis" placeholder="Jenis" id="Jenis" readonly>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Satuan:</span>
                                                    </div>
                                                    <div class="form-group col-md-5 mt-3 mt-md-0">
                                                        <input class="form-control" type="text" name="Satuan"
                                                            rows="Satuan" placeholder="Satuan" id="Satuan" readonly>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Lembar:</span>
                                                    </div>
                                                    <div class="form-group col-md-5 mt-3 mt-md-0">
                                                        <input class="form-control" type="text" name="Lembar"
                                                            id="LembarOutput" rows="Lembar" placeholder="Lembar"
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div style="margin-top:-20px; margin-left:20px">
                                                    <div class="d-flex flex-column align-items-center">
                                                        <label for="text" class="aligned-text">Jumlah
                                                            Barcode:</label>
                                                        <div class="textarea-container">
                                                            <textarea class="form-control text-center" name="text" rows="5" id="JumlahBarcode" readonly>
                                                                </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="form-container"></div>

                                <div class="card mt-3"
                                    style="width: 50%; margin-left:250px; display: flex; flex-direction: column;gap:5px;white-space:nowrap; position: absolute; top: 570px">
                                    <div class="card-header">Hasil Produksi</div>
                                    <div class="row mt-3">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Primer:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="primer" rows="primer"
                                                id="Primer" placeholder="Primer">
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
                                                id="SekunderOutput" rows="sekunder" placeholder="Sekunder">
                                            <div class="text-center col-md-auto">
                                                <button type="button" style="width: 100px">LBR</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Tritier:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="tritier" rows="tritier"
                                                id="tritier" placeholder="Tritier">
                                            <div class="text-center col-md-auto"><button type="button"
                                                    style="width: 100px">KG</button></div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div id="kodeBarcodeContainer"></div>

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
