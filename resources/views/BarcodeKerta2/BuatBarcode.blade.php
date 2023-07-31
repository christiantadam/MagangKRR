@extends('layouts.appABM')
@section('content')

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
                                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                                <input type="date" class="form-control" name="tanggal" id="tanggal"
                                                    placeholder="Tanggal">
                                            </div>
                                        </div>

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto"><button type="button"
                                                    onclick="openModal()" id="ButtonShift">Pilih Shift</button></div>
                                            <div class="modal" id="myModal">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal()">&times;</span>
                                                    <div class="card col-md-auto"
                                                        style="margin-left:50px; margin-right:50px; margin-top:50px; margin-bottom:50px;">
                                                        <div class="row form-group">
                                                            <div class="col-md-3 d-flex justify-content-end">
                                                                <span class="aligned-text mt-3">Pilih Shift:</span>
                                                            </div>
                                                            <div class="mt-4">
                                                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                                                    <input type="text" class="form-control"
                                                                        name="Shift" id="Shift" placeholder="Shift">
                                                                </div>
                                                            </div>
                                                            <div class="text-center col-md-auto"
                                                                style="margin-top: 15px; margin-left:200px"><button
                                                                    type="button">Ok</button></div>
                                                            <div class="text-center col-md-auto" style="margin-top: 15px;"
                                                                onclick="closeModal()"><button
                                                                    type="button">Cancel</button></div>
                                                        </div>
                                                        <div class="text-center">
                                                            <h6>Pilih 1 Untuk Shift Pagi, Pilih 2 Untuk Shift Sore, dan
                                                                <br>Pilih 3 Untuk Shift Malam
                                                            </h6>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    onclick="openModal1()" id="ButtonDivisi">Divisi</button></div>
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
                                                            <tr>
                                                                <td>-</td>
                                                                <td>-</td>
                                                            </tr>

                                                            <!-- Add more rows as needed -->
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto mt-3">
                                                        <button type="button" onclick="closeModal1()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    onclick="openModal2()" id="ButtonType">Nama Type</button></div>
                                            <div class="modal" id="myModal2">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal2()">&times;</span>
                                                    <h2>Table Divisi</h2>
                                                    <p>Id Divisi & Divisi</p>
                                                    <table id="TableType">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama Type</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>-</td>
                                                            </tr>

                                                            <!-- Add more rows as needed -->
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto mt-3">
                                                        <button type="button" onclick="closeModal2()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    onclick="openModal3()" id="ButtonJumlahBarang">Isi Jumlah Barang</button></div>
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
                                                                        name="Sekunder" id="Sekunder" placeholder="Sekunder">
                                                                </div>
                                                            </div>
                                                            <div class="text-center col-md-auto"
                                                                style="margin-top: 15px; margin-left:200px"><button
                                                                    type="button">Ok</button></div>
                                                            <div class="text-center col-md-auto" style="margin-top: 15px;"
                                                                onclick="closeModal()"><button
                                                                    type="button">Cancel</button></div>
                                                        </div>
                                                        <div class="text-center">
                                                            <h6>Masukan Jumlah Pcs, lembar, atau meter
                                                                <br>Barang
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button
                                                    type="button">Timbang</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button">Print
                                                    Barcode</button>
                                            </div>
                                        </div>

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    onclick="openModal4()" id="ButtonJumlahBarang">Acc Barcode</button></div>
                                            <div class="modal" id="myModal4">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal4()">&times;</span>
                                                    <div class="card col-md-auto"
                                                        style="margin-left:50px; margin-right:50px; margin-top:50px; margin-bottom:50px;">
                                                        <div class="row form-group">
                                                            <div class="col-md-3 d-flex justify-content-end">
                                                                <span class="aligned-text mt-3">No Barcode:</span>
                                                            </div>
                                                            <div class="mt-4">
                                                                <div class="form-group col-md-auto mt-3 mt-md-1">
                                                                    <input type="text" class="form-control"
                                                                        name="Barcode" id="Barcode" placeholder="Barcode">
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
                                            <div class="text-center col-md-auto mt-3"><button type="button">Print
                                                    Ulang</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button" >Keluar</button>
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
                                                    placeholder="Tanggal" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Shift:</span>
                                            </div>
                                            <div class="form-group col-md-3 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="shift" rows="shift"
                                                    placeholder="Shift" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Type :</span>
                                            </div>
                                            <div class="form-group col-md-5 mt-3 mt-md-0">
                                                <textarea class="form-control" name="Type" rows="Type" placeholder="Type" readonly></textarea>
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
                                                            rows="Lembar" placeholder="Lembar" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div style="margin-top:-20px; margin-left:-198px">
                                                    <div class="d-flex flex-column align-items-center">
                                                        <label for="text" class="aligned-text">Jumlah Barcode:</label>
                                                        <textarea class="form-control" type="text" name="text" rows="5" style="margin-right: 10px;" readonly></textarea>
                                                    </div>
                                                </div>
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

            var ButtonShift = document.getElementById('ButtonShift')
            ButtonShift.addEventListener("click", function(event) {
                event.preventDefault();
            });

            var ButtonDivisi = document.getElementById('ButtonDivisi')
            ButtonDivisi.addEventListener("click", function(event) {
                event.preventDefault();
            });

            var ButtonType = document.getElementById('ButtonType')
            ButtonType.addEventListener("click", function(event) {
                event.preventDefault();
            });

            var ButtonJumlahBarang = document.getElementById('ButtonJumlahBarang')
            ButtonJumlahBarang.addEventListener("click", function(event) {
                event.preventDefault();
            });

            function openModal() {
                var modal = document.getElementById('myModal');
                modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
            }

            function closeModal() {
                var modal = document.getElementById('myModal');
                modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
            }

            function openModal1() {
                var modal = document.getElementById('myModal1');
                modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
            }

            function closeModal1() {
                var modal = document.getElementById('myModal1');
                modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
            }

            function openModal2() {
                var modal = document.getElementById('myModal2');
                modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
            }

            function closeModal2() {
                var modal = document.getElementById('myModal2');
                modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
            }

            function openModal3() {
                var modal = document.getElementById('myModal3');
                modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
            }

            function closeModal3() {
                var modal = document.getElementById('myModal3');
                modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
            }

            function openModal4() {
                var modal = document.getElementById('myModal4');
                modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
            }

            function closeModal4() {
                var modal = document.getElementById('myModal4');
                modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
            }

            $(document).ready(function() {
                $('#TableDivisi').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });

            $(document).ready(function() {
                $('#TableType').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });
        </script>
    </body>
@endsection
