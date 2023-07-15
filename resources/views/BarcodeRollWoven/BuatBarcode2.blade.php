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
                                <input type="date" class="form-control" name="Tanggal" id="Tanggal" placeholder="Tanggal" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Shift:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="Shift" id="Shift" placeholder="Shift" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Kel. Utama:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="Kel_Utama" id="Kel_Utama" placeholder="Kel.Utama" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Kelompok:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="Jenis" id="Jenis" placeholder="Jenis" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Sub Kelompok:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="Sub_Kelompok2" id="Sub_Kelompok2" placeholder="Sub Kelompok" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Type:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="Type_buatbarcode2" id="Type_buatbarcode2" placeholder="Type" required>
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
                            <span class="aligned-text">Kode Barang:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Kode_barang" id="Kode_barang" placeholder="Kode Barang">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Stok Akhir Primer:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Stok_primer" id="Stok_primer" placeholder="Stok Primer">
                            <div class="text-center col-md-auto"><button type="submit">Null</button></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Stok Akhir Sekunder:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Stok_sekunder" id="Stok_sekunder" placeholder="Stok Sekunder">
                            <div class="text-center col-md-auto"><button type="submit">Dos</button></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Stok Akhir Tertier:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Stok_tertier" id="Stok_tertier" placeholder="Stok Tertier">
                            <div class="text-center col-md-auto"><button type="submit">Kg</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                            <input type="text" class="form-control" name="Primer" id="Primer" placeholder="Primer">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Sekunder:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Sekunder" id="Primer" placeholder="Sekunder">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Tertier:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Tertier" id="Tertier" placeholder="Tertier">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">No. Roll:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Roll" id="Roll" placeholder="Roll">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Alafan:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Alafan" id="Alafan" placeholder="Alafan">
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
