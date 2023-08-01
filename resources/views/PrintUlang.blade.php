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
                                            <span class="aligned-text">Pilih Shift:</span>
                                        </div>
                                        <div class="form-group ml-3">
                                            <select id="shift">
                                                <option value="1">Satu</option>
                                                <option value="2">Dua</option>
                                                <option value="3">Tiga</option>
                                                <option value="4">Empat</option>
                                                <option value="5">Lima</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">No Barcode:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Barcode" id="Barcode"
                                                placeholder="Barcode">
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="row mt-3">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Item Number:</span>
                                            </div>
                                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                                <input type="text" class="form-control" name="Item" id="Item"
                                                    placeholder="Item">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Kode Barang:</span>
                                            </div>
                                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                                <input type="text" class="form-control" name="Kode" id="Kode"
                                                    placeholder="Kode">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Nama Type:</span>
                                            </div>
                                            <div class="form-group col-md-8 mt-3 mt-md-0">
                                                <input type="text" class="form-control" name="nama_type" id="nama_type"
                                                    placeholder="Nama Type">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Sekunder:</span>
                                            </div>
                                            <div class="form-group col-md-4 mt-3 mt-md-0">
                                                <input type="text" class="form-control" name="Sekunder" id="Sekunder"
                                                    placeholder="Sekunder">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Tritier:</span>
                                            </div>
                                            <div class="form-group col-md-4 mt-3 mt-md-0">
                                                <input type="text" class="form-control" name="Tritier" id="v"
                                                    placeholder="Tritier">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mt-3">
                                        <div class="col- row justify-content-md-center">
                                            <div class="text-center col-md-auto"><button type="submit">Timbang</button>
                                            </div>
                                            <div class="text-center col-md-auto"><button type="submit">Print Ulang</button>
                                            </div>
                                            <div class="text-center col-md-auto"><button type="submit">Scan
                                                    Barcode</button></div>
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