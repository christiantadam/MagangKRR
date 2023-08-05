@extends('layouts.appABM')
@section('content')

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
                                                <div class="form-group col-md-2 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="id_Divisi"
                                                        id="id_Divisi" placeholder="ID Divisi" readonly>
                                                </div>
                                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Divisi" id="Divisi"
                                                        placeholder="Divisi" readonly>
                                                    <div class="text-center col-md-auto"><button type="submit"
                                                            onclick="openModal()" id="ButtonDivisi">...</button></div>
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
                                                <div class="form-group col-md-2 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="id_Objek"
                                                        id="id_Objek" placeholder="ID Objek" readonly>
                                                </div>
                                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Objek" id="Objek"
                                                        placeholder="Objek" readonly>
                                                    <div class="text-center col-md-auto"><button type="submit"
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
                                                                    @foreach ($dataObjek as $data)
                                                                        <tr>
                                                                            <td>{{ $data->IdObjek }}</td>
                                                                            <td>{{ $data->NamaObjek }}</td>
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

                                            <div class="row mt-3 mb-3">
                                                <div class="col- row justify-content-md-center">
                                                    <div class="text-center col-md-auto"><button
                                                            type="submit">Refresh</button></div>
                                                    <div class="text-center col-md-auto"><button
                                                            type="submit">Keluar</button></div>
                                                    <div class="row ml-5">
                                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                                            <span class="aligned-text">Penerima:</span>
                                                        </div>
                                                        <div class="form-group col-md-6 mt-3 mt-md-0">
                                                            <input type="text" class="form-control" name="Penerima"
                                                                id="Penerima" placeholder="Penerima">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card mt-auto">
                                        <div class="card-header">Type</div>
                                        <table id="TableType">
                                            <thead>
                                                <th>Id Transaksi</th>
                                                <th>Kelompok Utama </th>
                                                <th>Kelompok </th>
                                                <th>Sub Kelompok</th>
                                                <th>Nama Type</th>
                                                <th>Alasan Mutasi</th>
                                                <th>User</th>
                                                <th>Primer</th>
                                                <th>Sekunder</th>
                                                <th>Tritier</th>
                                                <th>Terkirim (Sekunder)</th>
                                                <th>Tanggal Mohon</th>
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
            <div class="form-wrapper mt-4" style="margin-left:95px">
                <div class="form-container">
                    <div class="card">
                        <div class="card-header">Pemberi Barang</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                            <div class="form berat_woven">
                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Divisi:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input type="text" class="form-control" name="Divisi" id="Divisi"
                                            placeholder="Divisi">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Objek:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input type="text" class="form-control" name="Objek" id="Objek"
                                            placeholder="Objek">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Kelompok Utama:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input type="text" class="form-control" name="kelut" id="kelut"
                                            placeholder="Kelompok Utama">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3" style="margin-left: 400px">
                                <div class="text-center col-md-auto">
                                    <button type="button" onclick="openModal2()" id="ButtonShift"
                                        style="width: 180px;">Pilih Shift</button>
                                </div>
                                <div class="modal" id="myModal2">
                                    <div class="modal-content" style="width: 1200px">
                                        <span class="close-btn" onclick="closeModal2()">&times;</span>
                                        <h2>Lihat Barcode</h2>
                                        <table id="TableBarcode">
                                            <thead>
                                                <tr>
                                                    <th>Id Transaksi</th>
                                                    <th>Kelompok Utama </th>
                                                    <th>Kelompok </th>
                                                    <th>Sub Kelompok</th>
                                                    <th>Nama Type</th>
                                                    <th>Alasan Mutasi</th>
                                                    <th>User</th>
                                                    <th>Primer</th>
                                                    <th>Sekunder</th>
                                                    <th>Tritier</th>
                                                    <th>Tanggal Mohon</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Add more rows as needed -->
                                            </tbody>
                                        </table>
                                        <div class="text-center col-md-auto mt-3">
                                            <button style="width: 100px;" type="button"
                                                onclick="closeModal2()">Ok</button>
                                        </div>
                                        <div class="form-group col-md-auto mt-3">
                                            <input type="text" class="form-control text-center" name="Objek"
                                                id="Objek" style="width: 300px; margin-left: 415px">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Kelompok:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="Kelompok" id="Kelompok"
                                        placeholder="Kelompok">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Sub Kelompok:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="sub_kelompok" id="sub_kelompok"
                                        placeholder="Sub Kelompok">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-wrapper mt-4" style="margin-left:95px">
            <div class="form-container">
                <div class="card">
                    <div class="card-header">Penerima Barang</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form berat_woven">
                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Kelompok Utama:</span>
                                </div>
                                <div class="form-group col-md-4 mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="kelut" id="kelut"
                                        placeholder="Kelompok Utama">
                                </div>
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Tanggal:</span>
                                </div>
                                <input type="date" class="form-control col-md-2" name="Tanggal" id="Tanggal"
                                    placeholder="Tanggal">
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Kelompok:</span>
                                </div>
                                <div class="form-group col-md-4 mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="Kelompok" id="Kelompok"
                                        placeholder="Kelompok">
                                </div>
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Kode Transaksi:</span>
                                </div>
                                <input type="text" class="form-control col-md-2" name="Transaksi" id="Transaksi"
                                    placeholder="Transaksi">
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Kelompok:</span>
                                </div>
                                <div class="form-group col-md-4 mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="Kelompok" id="Kelompok"
                                        placeholder="Kelompok">
                                </div>
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Kode Barang:</span>
                                </div>
                                <input type="text" class="form-control col-md-2" name="kode_barang" id="kode_barang"
                                    placeholder="Barang">
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Nama Barang:</span>
                                </div>
                                <div class="form-group col-md-10 mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                                        placeholder="Nama Barang">
                                </div>
                            </div>

                            <div class="form-group col-md-2 d-flex" style="margin-left: 10px">
                                <span class="aligned-text">Jumlah Barang:</span>
                            </div>
                            <div class="row" style="margin-left: 5px">
                                <div class="form-group col-md-2 d-flex justify-content-end" style="margin-left: -17px">
                                    <span class="aligned-text">Satuan Primier:</span>
                                </div>
                                <div class="form-group col-md-2 mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="Primier" id="Primier"
                                        placeholder="Primier">
                                </div>
                                <div class="form-group col-md-2 d-flex justify-content-end" style="margin-left: -25px">
                                    <span class="aligned-text">Satuan Sekunder:</span>
                                </div>
                                <input type="text" class="form-control col-md-2" name="Sekunder" id="Sekunder"
                                    placeholder="Sekunder">
                                <div class="form-group col-md-2 d-flex justify-content-end" style="margin-left: -25px">
                                    <span class="aligned-text">Satuan Tritier:</span>
                                </div>
                                <input type="text" class="form-control col-md-2" name="Tritier" id="Tritier"
                                    placeholder="Tritier">
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Alasan Mutasi:</span>
                                </div>
                                <div class="form-group col-md-10 mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="Alasan" id="Alasan"
                                        placeholder="Alasan Mutasi">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col- row justify-content-md-center">
                <div class="text-center col-md-auto mb-3"><button type="submit">Konversi</button></div>
                <div class="text-center col-md-auto mb-3"><button type="submit">Hanguskan</button></div>
                <div class="text-center col-md-auto mb-3"><button type="submit">Print Ulang</button></div>
            </div>
        </div>
        </form>
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

            $('#TableDivisi tbody').on('click', 'tr', function() {
                // Get the data from the clicked row

                var rowData = $('#TableDivisi').DataTable().row(this).data();

                // Populate the input fields with the data
                $('#id_Divisi').val(rowData[0]);
                $('#Divisi').val(rowData[1]);

                // Hide the modal immediately after populating the data
                closeModal();
            });

            $('#TableObjek tbody').on('click', 'tr', function() {
                // Get the data from the clicked row

                var rowData = $('#TableObjek').DataTable().row(this).data();

                // Populate the input fields with the data
                $('#id_Objek').val(rowData[0]);
                $('#Objek').val(rowData[1]);

                // Hide the modal immediately after populating the data
                closeModal1();
            });

            var ButtonDivisi = document.getElementById('ButtonDivisi')

            ButtonDivisi.addEventListener("click", function(event) {
                event.preventDefault();
            });

            var ButtonObjek = document.getElementById('ButtonObjek')

            ButtonObjek.addEventListener("click", function(event) {
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


            $(document).ready(function() {
                $('#TableDivisi').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });

            $(document).ready(function() {
                $('#TableObjek').DataTable({
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

            $(document).ready(function() {
                $('#TableBarcode').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });
        </script>
    </body>
@endsection
