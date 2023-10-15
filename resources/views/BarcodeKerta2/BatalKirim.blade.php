@extends('layouts.appABM')
@section('content')
    <script type="text/javascript" src="{{ asset('js/BarcodeKerta2/BatalKirim.js') }}"></script>

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
                            <th>Primer</th>
                            <th>Sekunder</th>
                            <th>Tertier</th>
                            <th>Tanggal</th>
                            <th>Divisi</th>
                            <th>Shift</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataKirim as $data)
                            <tr>
                                <td>{{ $data->NamaType }}</td>
                                <td>{{ $data->No_Barcode }}</td>
                                <td>{{ $data->NamaSubKelompok }}</td>
                                <td>{{ $data->NamaKelompok }}</td>
                                <td>{{ $data->Kode_barang }}</td>
                                <td>{{ $data->NoIndeks }}</td>
                                <td>{{ $data->Jml_Primer }}</td>
                                <td>{{ $data->Jml_Sekunder }}</td>
                                <td>{{ $data->Jml_Tritier }}</td>
                                <td>{{ $data->Tgl_Terima }}</td>
                                <td>{{ $data->IdDivisi }}</td>
                                <td>{{ $data->Shift }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                <div id="form-container"></div>

                <div class="row mt-3 mb-3">
                    <div class="col- row justify-content-md-center">
                        <div class="text-center col-md-auto"><button type="button" style="width: 100px">Cari</button></div>
                        <div class="text-center col-md-auto"><button type="button" style="width: 100px" id="btnProses"
                            onclick="prosesData()">Hapus</button>
                        </div>
                        <div class="text-center col-md-auto"><button type="button" style="width: 100px">Keluar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </body>
@endsection
