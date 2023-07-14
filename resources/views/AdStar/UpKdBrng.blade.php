@extends('layouts.appAdStar')
@section('content')

<h2>Maint Kode Barang</h2>

<div class="body">
    <div class="card">
        <div class="table-container">
            <table>
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Kode Barang</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  // Simulasi pengambilan data dari database
                  $data = array(
                    array("Value 1", "Value 2"),
                    array("Value 1", "Value 2"),
                    array("Value 1", "Value 2"),
                    array("Value 1", "Value 2"),
                    array("Value 1", "Value 2"),
                    array("Value 1", "Value 2"),
                    array("Value 1", "Value 2"),
                    array("Value 1", "Value 2"),
                    array("Value 1", "Value 2"),
                    array("Value 1", "Value 2"),
                    array("Value 1", "Value 2"),
                    array("Value 1", "Value 2"),
                    // Tambahkan data lainnya dari database
                  );

                  // Iterasi melalui data dan buat baris tabel
                  foreach ($data as $row) {
                    echo "<tr>";
                    echo "<td>".$row[0]."</td>";
                    echo "<td>".$row[1]."</td>";
                    echo "</tr>";
                  }
                ?>
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
