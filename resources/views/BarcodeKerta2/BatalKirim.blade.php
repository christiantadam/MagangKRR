@extends('layouts.appABM')
@section('content')

    <body onload="Greeting()">
        <div id="app">
            <div class="card mt-auto">
                <div class="card-header">Type</div>
                <table id="TypeTable">
                    <thead>
                        <tr>
                            <th>Type </th>
                            <th>No Barcode </th>
                            <th>Sub Kelompok </th>
                            <th>Kelompok </th>
                            <th>Kode Barang</th>
                            <th>NoIndex </th>
                            <th>Primal</th>
                            <th>Sekunder</th>
                            <th>Tertier</th>
                            <th>Tanggal</th>
                            <th>Divisi</th>
                            <th>Shift</th>
                            <th>-</th>
                        </tr>
                    </thead>

                </table>
                <div class="row mt-3 mb-3">
                    <div class="col- row justify-content-md-center">
                        <div class="text-center col-md-auto"><button type="button" style="width: 100px">Cari</button></div>
                        <div class="text-center col-md-auto"><button type="button" style="width: 100px">Hapus</button></div>
                        <div class="text-center col-md-auto"><button type="button" style="width: 100px">Keluar</button></div>
                    </div>
                </div>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>

        <script>
            $(document).ready(function() {
                $('.dropdown-submenu a.test').on("click", function(e) {
                    $(this).next('ul').toggle();
                    e.stopPropagation();
                    e.preventDefault();
                });
            });

            $(document).ready(function() {
                $('#TypeTable').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });
        </script>
    </body>
@endsection
