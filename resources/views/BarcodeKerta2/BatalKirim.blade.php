@extends('layouts.appABM')
@section('content')
<body onload="Greeting()">
    <div id="app">
        <div class="card mt-auto">
            <div class="card-header">Type</div>
            <table>
                <tr>
                    <th>Type </th>
                    <th>No Barcode </th>
                    <th>Sub Kelompok </th>
                    <th>Kelompok </th>
                    <th>Kode Barang</th>
                    <th>Noln.. </th>
                    <th>Primal</th>
                    <th>Sekunder</th>
                    <th>Tertier</th>
                    <th>Tanggal</th>
                    <th>Divisi</th>
                    <th>Shift</th>
                    <th>-</th>
                </tr>
            </table>
            <div class="row mt-3 mb-3">
                <div class="col- row justify-content-md-center">
                    <div class="text-center col-md-auto"><button type="submit">Pilih Semua</button></div>
                    <div class="text-center col-md-auto"><button type="submit">Hapus</button></div>
                    <div class="text-center col-md-auto"><button type="submit">Keluar</button></div>
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
    </script>
</body>


@endsection
