@extends('layouts.appAdStar')
@section('content')
    <h2>Maint Kode Barang</h2>
    <link href="{{ asset('css/AdStar/UpKdBrng.css') }}" rel="stylesheet">

    <div class="card">
        <div class="table-responsive">
            <table id="tabel_Barang" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Kode Barang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataUpKdBrng as $data)
                        <tr data-idbrng="{{ $data->id }}" data-nama="{{ $data->Nama_brg }}" data-kode="{{ $data->kd_brg }}">
                            <td>{{ $data->Nama_brg }}</td>
                            <td>{{ $data->kd_brg }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="input-container">
            <label for="nama-barang">Nama Barang:</label>
            <input type="text" id="nama-barang" required class="input-small">
            <input type="text" id="input1" class="input-medium">
        </div>

        <div class="input-container">
            <label for="kd-barang">Kode Barang:</label>
            <input type="text" id="kd-barang" required class="input-small">
            <input type="text" id="input2" class="input-medium">
        </div>

        <div class="input-container">
            <button type="button" onclick="openModal()">List Data</button>
            <div class="overlay" id="overlay">
                <div class="modal" id="myModal">
                    <div class="modal-content">
                        <span class="close" onclick="closeModal()">&times;</span>
                        <div class="table-responsive">
                            <table id="TableDivisi" class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama Divisi</th>
                                        <th>Id Divisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Populate TableDivisi with appropriate data -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="button-container">
        <button class="update" onclick="updateData()">Update</button>
    </div>

    <div class="scrollable-container">
        <!-- Add content here -->
    </div>

    <script>
        // Click event handler for table rows
        $('#tabel_Barang tbody').on('click', 'tr', function() {
            // Get the data from the clicked row
            var nama = $(this).data('nama');
            var kode = $(this).data('kode');
            var idbrng = $(this).data('idbrng');

            // Populate the form fields with the data
            $('#nama-barang').val(idbrng);
            $('#input1').val(nama);
            $('#input2').val(kode);
        });

        // Sample data for demonstration purposes
        const tableData = [
            { id: 1, name: "John Doe" },
            { id: 2, name: "Jane Smith" },
            { id: 3, name: "Alice Johnson" },
            // Add more data here
        ];

        function openModal() {
            document.getElementById('myModal').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
            populateTable(tableData);
        }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        function populateTable(data) {
            const tableBody = document.querySelector('#TableDivisi tbody');
            tableBody.innerHTML = '';

            data.forEach(item => {
                const row = `<tr>
                                <td>${item.id}</td>
                                <td>${item.name}</td>
                                <td>
                                    <button onclick="addDataToForm(${item.id}, '${item.name}')">
                                        Add
                                    </button>
                                </td>
                            </tr>`;
                tableBody.innerHTML += row;
            });
        }

        function searchData() {
            const searchValue = document.getElementById('searchInput').value.toLowerCase();
            const maxRows = parseInt(document.getElementById('maxRowsInput').value);

            // Filter the tableData based on the search input
            const filteredData = tableData.filter(item => {
                return item.name.toLowerCase().includes(searchValue);
            });

            // Limit the number of rows to display based on the maxRows input
            const slicedData = filteredData.slice(0, maxRows);

            populateTable(slicedData);
        }

        function addDataToForm(id, name) {
            // Here, you can implement the logic to add the selected data
            // (id and name) to another form or perform any other desired action.
            console.log(`Selected Data: ID-${id}, Name-${name}`);
        }

        function updateData() {
            // Implement the functionality to update the data here
            // Retrieve the data from the form fields and send it to the server
            const idbrng = $('#nama-barang').val();
            const nama = $('#input1').val();
            const kode = $('#input2').val();

            // You can use Ajax or other methods to send the data to the server for updating
            console.log('Updating data...');
            console.log(`ID: ${idbrng}, Nama: ${nama}, Kode: ${kode}`);
        }
    </script>
@endsection
