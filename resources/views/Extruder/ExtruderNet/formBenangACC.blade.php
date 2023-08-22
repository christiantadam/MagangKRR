@extends('layouts.appExtruder')
@section('content')
    <input type="hidden" id="hiddenKu">

    <div id="tropodo_benang_acc" class="form" data-aos="fade-up">
        <div class="row mt-3">
            <div class="col-lg-2">
                <span class="aligned-text" style="margin-top: 10px">Tanggal:</span>
            </div>

            <div class="col-lg-5">
                <div class="input-group">
                    <input type="date" id="tanggal_awal" class="form-control">
                    <span class="input-group-text">s/d</span>
                    <input type="date" id="tanggal_akhir" class="form-control">
                    <button type="button" id="btn_ok" class="btn btn-outline-primary">OK</button>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-3">
                <table id="table_konversi" class="hover cell-border">
                    <thead>
                        <tr>
                            <th>Id Konversi</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <h1 class="text-center mt-3">Tabel masih kosong...</h1>
                            </td>
                            <td class="hidden"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-9">
                <table id="table_detail" class="hover cell-border">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Id Konversi</th>
                            <th>Uraian</th>
                            <th>Nama Type</th>
                            <th>Qty. Primer</th>
                            <th>Qty. Sekunder</th>
                            <th>Qty. Tritier</th>
                            <th>Objek</th>
                            <th>Kel. Ut.</th>
                            <th>Kelompok</th>
                            <th>Sub-kel.</th>
                            <th>Id Sub-kel.</th>
                            <th>Id Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $tableWidth = 13; @endphp
                        <td colspan="{{ $tableWidth }}" style="padding-left: 150px">
                            <h1 class="mt-3">Tabel masih kosong...</h1>
                        </td>
                        @for ($i = 0; $i < $tableWidth - 1; $i++)
                            <td class="hidden"></td>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-3 mb-5 float-end text-center">
            <button type="button" id="btn_proses" class="btn btn-outline-success">Proses</button>
            <button type="button" id="btn_keluar" class="btn btn-outline-danger">Keluar</button>
        </div>
    </div>

    <script src="{{ asset('js/Extruder/ExtruderNet/benangACC.js') }}"></script>
@endsection
