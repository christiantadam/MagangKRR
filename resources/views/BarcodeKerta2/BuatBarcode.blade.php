@extends('layouts.appABM')
@section('content')

    <body onload="Greeting()">
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
                                                <div class="form-group col-md-3 d-flex justify-content-end">
                                                    <span class="aligned-text">Tanggal:</span>
                                                </div>
                                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                                    <input type="date" class="form-control" name="Tanggal" id="Tanggal"
                                                        placeholder="Tanggal" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-3 d-flex justify-content-end">
                                                    <span class="aligned-text">Shift:</span>
                                                </div>
                                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Shift" id="Shift"
                                                        placeholder="Shift" required>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="form-group col-md-3 d-flex justify-content-end">
                                                    <span class="aligned-text">Type:</span>
                                                </div>
                                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                                    <textarea class="form-control" name="type" rows="3" placeholder="Type" required></textarea>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-3 d-flex justify-content-end">
                                                    <span class="aligned-text">Jenis:</span>
                                                </div>
                                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Jenis" id="Jenis"
                                                        placeholder="Jenis" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-3 d-flex justify-content-end">
                                                    <span class="aligned-text">Satuan:</span>
                                                </div>
                                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Satuan" id="Satuan"
                                                        placeholder="Satuan" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-3 d-flex justify-content-end">
                                                    <span class="aligned-text">Lembar:</span>
                                                </div>
                                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Lembar" id="Lembar"
                                                        placeholder="Lembar" required>
                                                </div>
                                            </div>


                                            <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                                                <div class="card-body" style="flex: 1; margin-left: 10px;">
                                                    <!-- Konten Card Body Kanan-->
                                                    <div class="card">
                                                        <div class="card-header">Jumlah Barcode</div>
                                                        <h1 class="form-group">-</h1>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="flex: 1; margin-left: 10px;">
                        <!-- Konten Card Body Kanan-->
                        <div class="form-wrapper mt-4">
                            <div class="form-container">
                                <div class="card">
                                    <div class="card-header">Permohonan Barcode</div>
                                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                                        <div class="form berat_woven">
                                            <form action="#" method="post" role="form">
                                                <div class="row">
                                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                                        <span class="aligned-text">Primer:</span>
                                                    </div>
                                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                                        <input type="text" class="form-control" name="Primer"
                                                            id="Primer" placeholder="Primer">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                                        <span class="aligned-text">Sekunder:</span>
                                                    </div>
                                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                                        <input type="text" class="form-control" name="Sekunder"
                                                            id="Primer" placeholder="Sekunder">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                                        <span class="aligned-text">Tertier:</span>
                                                    </div>
                                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                                        <input type="text" class="form-control" name="Tertier"
                                                            id="Tertier" placeholder="Tertier">
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col- row justify-content-md-center">
                                                        <div class="text-center col-md-auto"><button type="submit">Pilih
                                                                Shift</button></div>
                                                        <div class="text-center col-md-auto"><button
                                                                type="submit">Divisi</button></div>
                                                        <div class="text-center col-md-auto"><button type="submit">Isi
                                                                Jumlah Barang</button></div>
                                                        <div class="text-center col-md-auto"><button
                                                                type="submit">Timbang</button></div>
                                                    </div>
                                                    <div class="col- row justify-content-md-center mt-4">
                                                        <div class="text-center col-md-auto"><button type="submit">Print
                                                                Barcode</button></div>
                                                        <div class="text-center col-md-auto"><button type="submit">ACC
                                                                Barcode</button></div>
                                                        <div class="text-center col-md-auto"><button type="submit">Print
                                                                Ulang</button></div>
                                                        <div class="text-center col-md-auto"><button
                                                                type="submit">Keluar</button></div>
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
    </body>

    @endsection
