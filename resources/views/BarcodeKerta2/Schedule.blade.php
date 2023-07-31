@extends('layouts.appABM')
@section('content')

    <body onload="Greeting()">

        <div id="app">
            <div class="form-wrapper mt-4">
                <div class="form-container">
                    <div class="card">
                        <div class="card-header">Schedule</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                            <div class="form berat_woven">
                                <form action="#" method="post" role="form">
                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Divisi:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="IdDivisi" id="IdDivisi"
                                                placeholder="ID Divisi" readonly>
                                        </div>
                                        <div class="form-group col-md-7 mt-3 mt-md-0">
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
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Kelut:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="id_Kelut" id="id_Kelut"
                                                placeholder="ID Kelut" readonly>
                                        </div>
                                        <div class="form-group col-md-7 mt-3 mt-md-0">
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
                                                                <th>ID Ketua Kelompok</th>
                                                                <th>Ketua Kelompok</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($dataKelut as $data)
                                                                <tr>
                                                                    <td>{{ $data->IdKelompokUtama }}</td>
                                                                    <td>{{ $data->NamaKelompokUtama }}</td>
                                                                </tr>
                                                            @endforeach
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
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Kelompok:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="id_Kelompok" id="id_Kelompok"
                                                placeholder="ID Kelompok" readonly>
                                        </div>
                                        <div class="form-group col-md-7 mt-3 mt-md-0">
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
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($dataKelompok as $data)
                                                                <tr>
                                                                    <td>{{ $data->idkelompok }}</td>
                                                                    <td>{{ $data->namakelompok }}</td>
                                                                </tr>
                                                            @endforeach
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
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Sub Kelompok:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="id_SubKelompok"
                                                id="id_SubKelompok" placeholder="ID SubKelompok" readonly>
                                        </div>
                                        <div class="form-group col-md-7 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Sub_kelompok"
                                                id="Sub_kelompok" placeholder="Sub Kelompok" readonly>
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
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($dataSubKelompok as $data)
                                                                <tr>
                                                                    <td>{{ $data->IdSubkelompok }}</td>
                                                                    <td>{{ $data->NamaSubKelompok }}</td>
                                                                </tr>
                                                            @endforeach
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
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Type:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="id_Type" id="id_Type"
                                                placeholder="ID Type" readonly>
                                        </div>
                                        <div class="form-group col-md-7 mt-3 mt-md-0">
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
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($dataType as $data)
                                                                <tr>
                                                                    <td>{{ $data->IdType }}</td>
                                                                    <td>{{ $data->NamaType }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center col-md-10 mb-3" id="TambahButton"
                                            style="margin-left:53.3%"><button type="button">Tambah</button></div>
                                    </div>


                                    <div class="card">
                                        <div class="card-header">Table Type</div>
                                        <table id="TypeTable">
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

                                            </tbody>
                                        </table>
                                    </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col- row justify-content-md-center">
                                    <div class="text-center col-md-auto"><button type="submit">Pilih
                                            Semua</button></div>
                                    <div class="text-center col-md-auto"><button type="submit">Hapus</button>
                                    </div>
                                    <div class="text-center col-md-auto"><button type="submit">Keluar</button>
                                    </div>
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

        <!-- ... Rest of the code ... -->

        <script>
            function addDataToTable() {
                // Extract data from input fields
                var divisi = document.getElementById('Divisi').value;
                var kelut = document.getElementById('Kelut').value;
                var kelompok = document.getElementById('Kelompok').value;
                var subKelompok = document.getElementById('Sub_kelompok').value;
                var type = document.getElementById('Type').value;

                // Get the DataTable instance
                var table = $('#TypeTable').DataTable();

                // Add the new row to the DataTable
                table.row.add([divisi, kelut, kelompok, subKelompok, type]).draw();
            }

            // Add an event listener to the "Tambah" button
            var tambahButton = document.getElementById('TambahButton');
            tambahButton.addEventListener('click', function(event) {
                event.preventDefault();
                addDataToTable();
            });
        </script>

        <!-- ... Rest of the code ... -->


        <script>
            // function addDataToTable() {
            //     // Extract data from input fields
            //     var divisi = document.getElementById('Divisi').value;
            //     var kelut = document.getElementById('Kelut').value;
            //     var kelompok = document.getElementById('Kelompok').value;
            //     var subKelompok = document.getElementById('Sub_kelompok').value;
            //     var type = document.getElementById('Type').value;

            //     // Append a new row to the table with the extracted data
            //     var table = document.getElementById('TypeTable').getElementsByTagName('tbody')[0];
            //     var newRow = table.insertRow(table.rows.length);
            //     var cells = [divisi, kelut, kelompok, subKelompok, type];

            //     for (var i = 0; i < cells.length; i++) {
            //         var cell = newRow.insertCell(i);
            //         cell.innerHTML = cells[i];
            //     }
            // }

            // // Add an event listener to the "Tambah" button
            // var tambahButton = document.getElementById('TambahButton');
            // tambahButton.addEventListener('click', function(event) {
            //     event.preventDefault();
            //     addDataToTable();
            // });

            $('#TableDivisi tbody').on('click', 'tr', function() {
                // Get the data from the clicked row

                var rowData = $('#TableDivisi').DataTable().row(this).data();

                // Populate the input fields with the data
                $('#IdDivisi').val(rowData[0]);
                $('#Divisi').val(rowData[1]);

                // Hide the modal immediately after populating the data
                closeModal();
            });

            $('#TableKelut tbody').on('click', 'tr', function() {
                // Get the data from the clicked row

                var rowData = $('#TableKelut').DataTable().row(this).data();

                // Populate the input fields with the data
                $('#id_Kelut').val(rowData[0]);
                $('#Kelut').val(rowData[1]);

                // Hide the modal immediately after populating the data
                closeModal1();
            });

            $('#TableKelompok tbody').on('click', 'tr', function() {
                // Get the data from the clicked row

                var rowData = $('#TableKelompok').DataTable().row(this).data();

                // Populate the input fields with the data
                $('#id_Kelompok').val(rowData[0]);
                $('#Kelompok').val(rowData[1]);

                // Hide the modal immediately after populating the data
                closeModal2();
            });

            $('#TableSubKelompok tbody').on('click', 'tr', function() {
                // Get the data from the clicked row

                var rowData = $('#TableSubKelompok').DataTable().row(this).data();

                // Populate the input fields with the data
                $('#id_SubKelompok').val(rowData[0]);
                $('#Sub_kelompok').val(rowData[1]);

                // Hide the modal immediately after populating the data
                closeModal3();
            });

            $('#TableType tbody').on('click', 'tr', function() {
                // Get the data from the clicked row

                var rowData = $('#TableType').DataTable().row(this).data();

                // Populate the input fields with the data
                $('#id_Type').val(rowData[0]);
                $('#Type').val(rowData[1]);

                // Hide the modal immediately after populating the data
                closeModal4();
            });

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

            $(document).ready(function() {
                $('#TypeTable').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });
        </script>


    </body>
@endsection
