@extends('layouts.appABM')
@section('content')
    <script type="text/javascript" src="{{ asset('js/BarcodeRollWoven/BuatBarcode2.js') }}"></script>

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
                <div class="card">
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

                                        {{-- <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button" style="width: 160px">Scan
                                                    Barcode</button></div>
                                        </div> --}}

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto mt-3">
                                                <button type="button" onclick="openModal1()" id="ButtonJumlahBarang"
                                                    style="width:180px;">Scan Barcode</button>
                                            </div>
                                            <div class="modal" id="myModal1">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal1()">&times;</span>
                                                    <div class="card col-md-auto"
                                                        style="margin-left:50px; margin-right:50px; margin-top:50px; margin-bottom:50px;">
                                                        <div class="row form-group">
                                                            <div class="col-md-3 d-flex justify-content-end">
                                                                <span class="aligned-text mt-3">Masukan Barcode:</span>
                                                            </div>
                                                            <div class="mt-4">
                                                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                                                    <input type="text" class="form-control"
                                                                        name="barcode" id="barcode" placeholder="Barcode">
                                                                </div>
                                                            </div>
                                                            <div class="text-center col-md-auto"
                                                                style="margin-top: 15px; margin-left:200px">
                                                                <button type="button" onclick="closeModal1()">Ok</button>
                                                            </div>
                                                            <div class="text-center col-md-auto" style="margin-top: 15px;"
                                                                onclick="closeModal1()">
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

                                        {{-- <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"style="width: 160px">Pilih Sub
                                                    Kelompok</button></div>
                                        </div> --}}

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto mt-3">
                                                <button type="button" onclick="openModal2()" id="ButtonSubKelompok"
                                                    style="width:180px;">Pilih Sub Kelompok</button>
                                            </div>
                                            <div class="modal" id="myModal2">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal2()">&times;</span>
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
                                                            @foreach ($dataSubKelompok as $data)
                                                                <tr>
                                                                    <td>{{ $data->NamaSubKelompok }}</td>
                                                                    <td>{{ $data->IdSubkelompok }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto mt-3">
                                                        <button type="button" onclick="closeModal2()">Process</button>
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
                                                <button type="button" onclick="openModal2()" id="ButtonSubKelompok"
                                                    style="width:180px;">Pilih Type</button>
                                            </div>
                                            <div class="modal" id="myModal2">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal2()">&times;</span>
                                                    <h2>Table Type</h2>
                                                    <p>Type & Id Type</p>
                                                    <table id="TableSubKelompok">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama Type</th>
                                                                <th>Id Type</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($dataSubKelompokType as $data)
                                                                <tr>
                                                                    <td>{{ $data->NamaType }}</td>
                                                                    <td>{{ $data->IdType }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto mt-3">
                                                        <button type="button" onclick="closeModal2()">Process</button>
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
                                                    style="width:180px;">Print Barcode
                                                    Konversi</button></div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width:180px;">ACC Barcode</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width:180px;">Print Ulang</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button class="btn-danger"
                                                    type="button" style="width:180px;">Keluar</button>
                                            </div>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                    <div class="card" style="width: 100%; margin-left: -12px">
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
                                                <input class="form-control" type="text" name="shift" id="shift"
                                                    placeholder="Shift" readonly>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Barcode:</span>
                                            </div>
                                            <div class="form-group col-md-5 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="barcode" rows="barcode"
                                                    placeholder="Barcode" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Type Asal:</span>
                                            </div>
                                            <div class="form-group col-md-5 mt-3 mt-md-0">
                                                <textarea class="form-control" name="asal" rows="asal" placeholder="Asal" readonly></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Type Tujuan:</span>
                                            </div>
                                            <div class="form-group col-md-5 mt-3 mt-md-0">
                                                <textarea class="form-control" name="tujuan" rows="tujuan" placeholder="Tujuan" readonly></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Divisi:</span>
                                            </div>
                                            <div class="form-group col-md-5 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="divisi" rows="divisi"
                                                    placeholder="Divisi" readonly>
                                            </div>
                                            <div style="width: 450px; margin-left: 15px">
                                                <input class="form-control" type="text" name="text" rows="text"
                                                    style="margin-right:10px">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div style="margin-left:733px; width: 450px ">
                                                <input class="form-control " type="text" name="text"
                                                    rows="text" style="margin-right:10px">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-3" style="width: 83.2%; margin-left:250px">
                                    <div class="card-header">Hasil Produksi</div>
                                    <div class="row mt-3">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Primer:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="primer" rows="primer"
                                                placeholder="Primer">
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
                                                placeholder="Sekunder">
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
        <script>
            $(document).ready(function() {
                $('.dropdown-submenu a.test').on("click", function(e) {
                    $(this).next('ul').toggle();
                    e.stopPropagation();
                    e.preventDefault();
                });
            });
        </script>
    </body>
@endsection
