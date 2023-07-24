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
                            <div class="card">
                                <div class="card-header">Permohonan Barcode</div>
                                <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                                    <div class="form berat_woven">
                                        <form action="#" method="post" role="form">
                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Divisi:</span>
                                                </div>
                                                <div class="form-group col-md-3 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Divisi" id="Divisi"
                                                        placeholder="Divisi" >
                                                </div>
                                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Divisi" id="Divisi"
                                                        placeholder="Divisi" >
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Objek:</span>
                                                </div>
                                                <div class="form-group col-md-3 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Objek" id="Objek"
                                                        placeholder="Objek" >
                                                </div>
                                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Objek" id="Objek"
                                                        placeholder="Objek" >
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Kelompok Utama:</span>
                                                </div>
                                                <div class="form-group col-md-3 mt-3 mt-md-0">
                                                    <input class="form-control" name="type" rows="kelut" placeholder="Kelut" >
                                                </div>
                                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                                    <input class="form-control" name="type" rows="kelut" placeholder="Kelut" >
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Tanggal:</span>
                                                </div>
                                                <div class="form-group col-md-2 mt-3 mt-md-0">
                                                    <input type="date" class="form-control" name="Jenis" id="Jenis"
                                                        placeholder="Jenis" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Kelompok:</span>
                                                </div>
                                                <div class="form-group col-md-3 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Kelompok" id="Kelompok"
                                                        placeholder="Kelompok" >
                                                </div>
                                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Kelompok" id="Kelompok"
                                                        placeholder="Kelompok" >
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Sub Kelompok:</span>
                                                </div>
                                                <div class="form-group col-md-3 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="sub_kelompok" id="sub_kelompok"
                                                        placeholder="Sub Kelompok" >
                                                </div>
                                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="sub_kelompok" id="sub_kelompok"
                                                        placeholder="Sub Kelompok" >
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-wrapper mt-4" style="margin-left: 95px">
                <div class="form-container">
                    <div class="card">
                        <div class="card-header">Permohonan Barcode</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                            <div class="form berat_woven">
                                <form action="#" method="post" role="form">
                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Divisi:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Divisi" id="Divisi"
                                                placeholder="Divisi" >
                                        </div>
                                        <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Divisi" id="Divisi"
                                                placeholder="Divisi" >
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Objek:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Objek" id="Objek"
                                                placeholder="Objek" >
                                        </div>
                                        <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Objek" id="Objek"
                                                placeholder="Objek" >
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Kelompok Utama:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input class="form-control" name="type" rows="kelut" placeholder="Kelut" >
                                        </div>
                                        <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <input class="form-control" name="type" rows="kelut" placeholder="Kelut" >
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Kode Transaksi:</span>
                                        </div>
                                        <div class="form-group col-md-4 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Transaksi" id="Transaksi"
                                                placeholder="Transaksi" >
                                        </div>
                                        <div class="form-group col-md-4 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Transaksi" id="Transaksi"
                                                placeholder="Transaksi" >
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Kelompok:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Kelompok" id="Kelompok"
                                                placeholder="Kelompok" >
                                        </div>
                                        <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Kelompok" id="Kelompok"
                                                placeholder="Kelompok" >
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Sub Kelompok</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input class="form-control" name="type" rows="sub_kelompok" placeholder="Sub Kelompok" >
                                        </div>
                                        <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <input class="form-control" name="type" rows="sub_kelompok" placeholder="Sub Kelompok" >
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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

                            var PrintUlang = document.getElementById('PrintUlang')
                            PrintUlang.addEventListener("click", function(event) {
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
                        </script>
    </body>
@endsection
