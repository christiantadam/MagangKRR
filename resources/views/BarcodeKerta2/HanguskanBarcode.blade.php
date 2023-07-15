@extends('layouts.appABM')
@section('content')
<body onload="Greeting()">
    <div id="app">


        <div class="form-wrapper mt-4">
        <div class="form-container">
        <div class="card">
            <div class="card-header">FrmHanguskanBarcode</div>
            <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <div class="form berat_woven">
                <form action="#" method="post" role="form">
                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Divisi:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Divisi" id="Divsi" placeholder="Divisi" required>
                            <div class="text-center col-md-auto"><button type="submit">...</button></div>
                        </div>
                    </div>

                    <div class="card">
                    <div class="card-header">Type</div>
                    <h6 class="mt-3">Beri tanda (v) pada barcode yang ingin dihanguskan</h6>
                            <table>
                                <tr>
                                    <th>Type </th>
                                    <th>Barcode </th>
                                    <th>SubKelompok </th>
                                    <th>- </th>
                                    <th>- </th>
                                    <th>- </th>
                                    <th>- </th>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-4">
                    <div class="card-header">Type</div>
                    <h6 class="mt-3">Daftar barcode yang akan dihanguskan</h6>
                            <table>
                                <tr>
                                    <th>Type </th>
                                    <th>Primer </th>
                                    <th>Sekunder </th>
                                    <th>Tertier </th>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col- row justify-content-md-center">
                            <div class="text-center col-md-auto"><button type="submit">Cari</button></div>
                            <div class="text-center col-md-auto"><button type="submit">Proses</button></div>
                            <div class="text-center col-md-auto"><button type="submit">Tutup</button></div>
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
</html>
@endsection
