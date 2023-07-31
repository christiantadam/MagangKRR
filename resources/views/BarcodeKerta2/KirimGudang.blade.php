@extends('layouts.appABM')
@section('content')

    <body onload="Greeting()">
        <div id="app">
            <div class="form-wrapper mt-4">
                <div class="form-container">
                    <div class="card">
                        <div class="card-header">Scan Barcode Sebelum Dikirim Ke Gudang</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                            <div class="form berat_woven">
                                <form action="#" method="post" role="form">
                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Divisi:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Divisi" id="Divsi"
                                                placeholder="Divisi" readonly>
                                        </div>
                                        <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Divisi" id="Divsi"
                                                placeholder="Divisi" readonly>
                                            <div class="text-center col-md-auto"><button type="submit">...</button></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">No Barcode:</span>
                                        </div>
                                        <div class="form-group col-md-8 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="No_barcode" id="No_barcode"
                                                placeholder="No Barcode">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">No SP:</span>
                                        </div>
                                        <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="No_sp" id="No_sp"
                                                placeholder="No SP">
                                            <div class="text-center col-md-auto"><button type="submit">...</button></div>
                                        </div>
                                    </div>

                                    <div class="card mt-4">
                                        <div class="card-header">Type</div>
                                        <h5 class="mt-3">Rekap Barcode Yang Dikirim</h5>
                                        <table>
                                            <tr>
                                                <th>Tanggal </th>
                                                <th>Type </th>
                                                <th>Shift </th>
                                                <th>Primer </th>
                                                <th>Sekunder </th>
                                                <th>Tertier </th>
                                                <th>IdType</th>
                                                <th>No SP</th>
                                            </tr>
                                        </table>
                                    </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header">Type</div>
                                <h5 class="mt-3">Daftar Barcode Yang Dikirim</h5>
                                <table>
                                    <tr>
                                        <th>Tanggal </th>
                                        <th>Type </th>
                                        <th>Shift </th>
                                        <th>No Barcode </th>
                                        <th>SubKelompok </th>
                                        <th>Kelompok </th>
                                        <th>Kode Barang</th>
                                        <th>Noln...</th>
                                        <th>Primer</th>
                                        <th>Sekunder</th>
                                        <th>Tritier</th>
                                        <th>No SP</th>
                                    </tr>
                                </table>
                            </div>
                        </div>




                        <div class="row mt-3 mb-3">
                            <div class="text-center col-md-auto" style="margin-left: 280px"><button type="submit"
                                    onclick="openModal()" id="ButtonProcess">Process</button></div>
                            <div class="modal" id="myModal">
                                <div class="modal-content">
                                    <span class="close-btn" onclick="closeModal()">&times;</span>
                                    <h2>Table Divisi</h2>
                                    <p>Id Divisi & Divisi</p>
                                    <table id="TableProcess">
                                        <thead>
                                            <tr>
                                                <th>Nama Divisi</th>
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
                                        <button type="button">Ok</button>
                                        <button type="button" onclick="closeModal()">Batal</button>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center col-md-auto"><button type="submit">Belum Dikirim</button></div>
                            <div class="text-center col-md-auto"><button type="submit">Cetak S.Jalan</button></div>
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

            var ButtonProcess = document.getElementById('ButtonProcess')
            ButtonProcess.addEventListener("click", function(event) {
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

            $(document).ready(function() {
                $('#TableProcess').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });
        </script>
    </body>
@endsection
