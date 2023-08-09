@extends('layouts.appABM')
@section('content')
<script type="text/javascript" src="{{ asset('js/BarcodeKerta2/BuatBarcode.js') }}"></script>

    <body onload="Greeting()">
        <style>
            .form-size-plus {
                font-size: 20px;
                /* Ukuran teks secara keseluruhan */
            }
        </style>

        <div class="form-wrapper mt-4">
            <div style="width: 80%;">
                <div class="card">
                    <div class="card-header">FrmPembayaranStaff</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form berat_woven">
                            <form action="#" method="post" role="form">
                                <div style="display:flex; gap:3%">
                                    <div style="display: flex; flex-direction: column; gap:5px; white-space:nowrap">
                                        <div class="row">
                                            <div class="form-group col-md-5 d-flex justify-content-end">
                                                <span class="aligned-text">Tanggal:</span>
                                            </div>
                                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                                <input type="date" class="form-control" name="tanggal" id="tanggalInput"
                                                    placeholder="Tanggal">
                                            </div>
                                        </div>

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
                                                <button type="button" onclick="openModal1()" id="ButtonDivisi"
                                                    style="width:180px;" disabled>Divisi</button>
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
                                                        <button type="button" onclick="enableButtonType()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto mt-3">
                                                <button type="button" onclick="openModal2()" id="ButtonType"
                                                    style="width:180px;" disabled>Nama Type</button>
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
                                                            <tr>
                                                                <td>Test</td>
                                                            </tr>
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

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto mt-3">
                                                <button type="button" onclick="openModal3()" id="ButtonJumlahBarang"
                                                    style="width:180px;" disabled>Isi Jumlah Barang</button>
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
                                                                    <input type="text" class="form-control"
                                                                        name="Sekunder" id="Sekunder"
                                                                        placeholder="Sekunder">
                                                                </div>
                                                            </div>
                                                            <div class="text-center col-md-auto"
                                                                style="margin-top: 15px; margin-left:200px">
                                                                <button type="button"
                                                                    onclick="setSekunderValue()">Ok</button>
                                                            </div>
                                                            <div class="text-center col-md-auto" style="margin-top: 15px;"
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
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width:180px;">Timbang</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width:180px;">Print
                                                    Barcode</button>
                                            </div>
                                        </div>

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    onclick="openModal4()" id="ButtonJumlahBarang"
                                                    style="width:180px;">Acc Barcode</button>
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
                                                                        name="Barcode" id="Barcode"
                                                                        placeholder="Barcode">
                                                                </div>
                                                            </div>
                                                            <div class="text-center col-md-auto"
                                                                style="margin-top: 15px; margin-left:200px"><button
                                                                    type="button">Ok</button></div>
                                                            <div class="text-center col-md-auto" style="margin-top: 15px;"
                                                                onclick="closeModal4()"><button
                                                                    type="button">Cancel</button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width:180px;">Print
                                                    Ulang</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    class="btn-danger" style="width:180px;">Keluar</button>
                                            </div>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                    <div class="card" style="width: 100%">
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
                                                <textarea class="form-control" name="Type" id="Type" rows="Type" placeholder="Type" readonly></textarea>
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
                                                            rows="Jenis" placeholder="Jenis" readonly>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Satuan:</span>
                                                    </div>
                                                    <div class="form-group col-md-5 mt-3 mt-md-0">
                                                        <input class="form-control" type="text" name="Satuan"
                                                            rows="Satuan" placeholder="Satuan" readonly>
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
                                                <div style="margin-top:-20px; margin-left:-198px">
                                                    <div class="d-flex flex-column align-items-center">
                                                        <label for="text" class="aligned-text">Jumlah
                                                            Barcode:</label>
                                                        <div class="textarea-container">
                                                            <textarea class="form-control" name="text" rows="5" readonly>
                                                                </textarea>
                                                            <div class="centered-text">0</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mt-3"
                                    style="width: 83.3%; margin-left:250px; display: flex; flex-direction: column;gap:5px;white-space:nowrap">
                                    <div class="card-header">Hasil Produksi</div>
                                    <div class="row mt-3">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Primer:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="primer" rows="primer"
                                                placeholder="1" readonly>
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
                                                id="SekunderOutput" rows="sekunder" placeholder="Sekunder" readonly>
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
                                                placeholder="Tritier" readonly>
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
