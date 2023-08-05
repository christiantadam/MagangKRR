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
                            <div class="card" style="width: 1500px; margin-left:-300px">
                                <div class="card-header">Scan Barcode</div>
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
                                                                    onclick="closeModal1()">Process</button>
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
                                                        <th>Tanggal Mohon</th>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row mt-3 ">
                                                <div class="col- row justify-content-md-center">
                                                    <a href="{{ url('ABM/Scan') }}">
                                                        <button type="button" style="width: 150px">Scan Barcode</button>
                                                    </a>
                                                    <div class="text-center col-md-auto"><button
                                                            type="button" style="width: 150px; margin-left: 15px">Refresh</button></div>
                                                    <div class="text-center col-md-auto"><button
                                                            type="button" style="width: 150px">Keluar</button></div>
                                                    <input class="form-group col-md-2 ml-5" name="type" rows="blank">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
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
            </script>
    </body>
@endsection
