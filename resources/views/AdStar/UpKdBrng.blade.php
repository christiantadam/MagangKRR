@extends('layouts.appAdStar')
@section('content')
    <script>
        $(document).ready(function() {
        $('#tabel_Barang').DataTable({
            order: [[0, 'asc']]
        });
    });
    </script>
    <h2>Maint Kode Barang</h2>

    <div class="body">
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
                            <tr>
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
                <input type="text" id="nama-barang" required>
                <input type="text" id="input1">
            </div>

            <div class="input-container">
                <label for="kd-barang">Kode Barang:</label>
                <input type="text" id="kd-barang" required>
                <input type="text" id="input2">
            </div>

            <div class="input-container">
                <button type="button">List Data</button>
            </div>
        </div>

        <div class="button-container">
            <button class="add">Add</button>
            <button class="update">Update</button>
            <button class="del">Delete</button>
        </div>

        <div class="scrollable-container">
            <!-- Add content here -->
        </div>
    </div>
@endsection
