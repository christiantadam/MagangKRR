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
                width: 1000px;
            }

            .close-btn {
                position: absolute;
                top: 10px;
                right: 10px;
                size: 100%;
                cursor: pointer;
            }
        </style>
        <div id="app">
            <div class="form-wrapper mt-4">
                <div class="form-container">
                    <div class="card">
                        <div class="card-header">Schedule</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                            <div class="form berat_woven">
                                <form action="#" method="post" role="form">
                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Divisi:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="selectedDataInput" id="selectedDataInput"
                                                placeholder="ID Divisi" readonly>
                                            <input type="text" class="form-control" name="Divisi" id="Divsi"
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
                                                                <th>Select</th> <!-- New header for the checkbox column -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Test1</td>
                                                                <td>Test1</td>

                                                                <td> <!-- Add the checkbox here -->
                                                                    <label>
                                                                        <input type="checkbox" name="divisi" value="value2">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <!-- Add more rows as needed -->
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Kelut:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="id_Kelut" id="id_Kelut"
                                                placeholder="ID Kelut" readonly>
                                            <input type="text" class="form-control" name="Kelut" id="Kelut"
                                                placeholder="Kelut" readonly>
                                            <div class="text-center col-md-auto"><button type="submit"
                                                    onclick="openModal1()" id="ButtonKelut">...</button></div>
                                            <div class="modal" id="myModal1">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal1()">&times;</span>
                                                    <h2>Table Kelompok Utama</h2>
                                                    <p>Id Kelompok Utama & Kelompok Utama</p>
                                                    <table id="TableKelut">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Ketua Kelompok </th>
                                                                <th>Ketua Kelompok </th>
                                                                <th>Select</th> <!-- New header for the checkbox column -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>ID Ketua Kelompok </td>
                                                                <td>Ketua Kelompok </td>
                                                                <td> <!-- Add the checkbox here -->
                                                                    <label>
                                                                        <input type="checkbox" name="kelut" value="value2">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Kelompok:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="id_Kelompok" id="id_Kelompok"
                                                placeholder="ID Kelompok" readonly>
                                            <input type="text" class="form-control" name="Kelompok" id="Kelompok"
                                                placeholder="Kelompok" readonly>
                                            <div class="text-center col-md-auto"><button type="submit"
                                                    onclick="openModal2()" id="ButtonKelompok">...</button></div>
                                            <div class="modal" id="myModal2">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal2()">&times;</span>
                                                    <h2>Table Kelompok</h2>
                                                    <p>Id Kelompok & Kelompok</p>
                                                    <table id="TableKelompok">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Kelompok </th>
                                                                <th>Kelompok </th>
                                                                <th>Select</th> <!-- New header for the checkbox column -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>ID Kelompok </td>
                                                                <td>Kelompok </td>
                                                                <td> <!-- Add the checkbox here -->
                                                                    <label>
                                                                        <input type="checkbox" name="kelompok" value="value2">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Sub Kelompok:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="id_SubKelompok"
                                                id="id_SubKelompok" placeholder="ID SubKelompok" readonly>
                                            <input type="text" class="form-control" name="Sub_kelompok" id="Sub_kelompok"
                                                placeholder="Sub Kelompok" readonly>
                                            <div class="text-center col-md-auto"><button type="submit"
                                                    onclick="openModal3()" id="ButtonSubKelompok">...</button></div>
                                            <div class="modal" id="myModal3">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal3()">&times;</span>
                                                    <h2>Table Sub Kelompok</h2>
                                                    <p>Id Sub Kelompok & Sub Kelompok</p>
                                                    <table id="TableSubKelompok">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Sub Kelompok </th>
                                                                <th>Sub Kelompok </th>
                                                                <th>Select</th> <!-- New header for the checkbox column -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>ID Sub Kelompok </td>
                                                                <td>Sub Kelompok </td>
                                                                <td> <!-- Add the checkbox here -->
                                                                    <label>
                                                                        <input type="checkbox" name="sub_kelompok" value="value2">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Type:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="id_Type" id="id_Type"
                                                placeholder="ID Type" readonly>
                                            <input type="text" class="form-control" name="Type" id="Type"
                                                placeholder="Type" readonly>
                                            <div class="text-center col-md-auto"><button type="submit"
                                                    onclick="openModal4()" id="ButtonType">...</button></div>
                                            <div class="modal" id="myModal4">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal4()">&times;</span>
                                                    <h2>Table Type</h2>
                                                    <p>Id Type & Type</p>
                                                    <table id="TableType">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Type </th>
                                                                <th>Type </th>
                                                                <th>Select</th> <!-- New header for the checkbox column -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>ID Type </td>
                                                                <td>Type </td>
                                                                <td> <!-- Add the checkbox here -->
                                                                    <label>
                                                                        <input type="checkbox" name="type" value="value2">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card">
                                        <div class="card-header">Type</div>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Divisi </th>
                                                    <th>Kelut </th>
                                                    <th>Kelompok </th>
                                                    <th>Sub Kelompok </th>
                                                    <th>Type </th>
                                                </tr>
                                            </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Test1</td>
                                                        <td>Test1</td>
                                                        <td>Test1</td>
                                                        <td>Test1</td>
                                                        <td>Test1</td>
                                                    </tr>
                                                </tbody>
                                        </table>
                                    </div>
                                </div>

                            <div class="row mt-3">
                                <div class="col- row justify-content-md-center">
                                    <div class="text-center col-md-auto"><button type="submit">Pilih Semua</button></div>
                                    <div class="text-center col-md-auto"><button type="submit">Hapus</button></div>
                                    <div class="text-center col-md-auto"><button type="submit">Keluar</button></div>
                                </div>
                            </div>
                            </form>
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

        <script>
            var ButtonDivisi = document.getElementById('ButtonDivisi')

            ButtonDivisi.addEventListener("click", function(event) {
                event.preventDefault();
            });

            var ButtonKelut = document.getElementById('ButtonKelut')

            ButtonKelut.addEventListener("click", function(event) {
                event.preventDefault();
            });

            var ButtonKelompok = document.getElementById('ButtonKelompok')

            ButtonKelompok.addEventListener("click", function(event) {
                event.preventDefault();
            });

            var ButtonSubKelompok = document.getElementById('ButtonSubKelompok')

            ButtonSubKelompok.addEventListener("click", function(event) {
                event.preventDefault();
            });

            var ButtonType = document.getElementById('ButtonType')

            ButtonType.addEventListener("click", function(event) {
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
                $('#TableType').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });

            $(document).ready(function() {
                $('#TableSubKelompok').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });

            $(document).ready(function() {
                $('#TableKelompok').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });

            $(document).ready(function() {
                $('#TableKelut').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });

            $(document).ready(function() {
                $('#TableDivisi').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });
        </script>


    </body>
@endsection
