@extends('layouts.appAdStar')
@section('content')

<link href="{{ asset('css/AdStar/CpTbl.css') }}" rel="stylesheet">

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

<h2>Form Copy Tabel </h2>

<div class="body">
    <div class="card">
        <div class="input-container">
            <div class=radio>
            <label for="customer">Product Name:</label>
            <input type="radio" id="pilihan1" name="pilihan" value="pilihan1">StarPark
            {{-- <label for="pilihan1">StarPark</label><br> --}}
            <input type="radio" id="pilihan2" name="pilihan" value="pilihan2">AdStar
            {{-- <label for="pilihan2">AdStar</label><br> --}}
            </div>
        </div>
        <div class="input-container">
            <div class=checkbox>
            <label for="customer">Model:</label>
            <input type="checkbox" id="opsi1" name="opsi" value="opsi1">Top Open
            <input type="checkbox" id="opsi2" name="opsi" value="opsi2">Top Close
            </div>
        </div>
        <div class="input-container">
            <label for="customer">Design For:</label>
            <input type="text" id="customer" required>
            <input type="text" id="input1" placeholder="">
            <button type="button">...</button>
        </div>
        <div class="input-container">
            <label for="nama-barang">Product Type:</label>
            <input type="text" id="nama-barang" required>
            <input type="text" id="input2">
            <button type="button">List Type</button>
        </div>
        <h1>Copy To</h1>
        <div class="input-container">
            <label for="no-pesanan">Design For:</label>
            <input type="text" id="no-pesanan" required>
            <button onclick="openModal()" type="button">...</button>
            <!-- The Modal -->
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
                    <div class="text-center col-md-auto"><button type="submit"
                        onclick="openModal()" id="ButtonDivisi">Process</button></div>
                </div>
            </div>
        </div>
        <div class="input-container">
            <label for="surat-pesanan">Product Type:</label>
            <input type="text" id="surat-pesanan" required>
        </div>
    <div class="button-container">
        <button class="update">Copy</button>
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
@endsection
