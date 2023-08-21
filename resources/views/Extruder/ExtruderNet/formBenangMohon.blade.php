@extends('layouts.appExtruder')
@section('content')
    <div id="form_benang_mohon" class="form" data-aos="fade-up">
        <input type="hidden" id="form_rk_return">
        {{-- <button id="btn_tes" data-bs-toggle="modal" data-bs-target="#form_rincian_konversi">Rincian Konversi</button> --}}

        <div class="row mt-3">
            <div class="col-lg-7"></div>

            <div class="col-lg-3">
                <span class="aligned-text">Tanggal Mohon:</span>
            </div>

            <div class="col-lg-2">
                <input type="date" id="tanggal_mohon" class="form-control">
            </div>
        </div>

        <div class="row mt-3 border-bottom"></div>

        <div class="row mt-3">
            <div class="col-lg-2">
                <span class="aligned-text">Tanggal:</span>
            </div>
            <div class="col-lg-3">
                <input type="date" id="tanggal" class="form-control unclickable">
            </div>

            <div class="col-lg-2">
                <span class="aligned-text">Mesin:</span>
            </div>

            <div class="col-lg-4">
                <select id="select_mesin" class="form-select" disabled>
                    <option selected disabled>-- Pilih Mesin --</option>
                    <option value="loading" style="display: none" disabled>Memuat data...</option>
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-2">
                <span class="aligned-text">Nomor:</span>
            </div>

            <div class="col-lg-3">
                <select id="select_nomor" class="form-select">
                    <option selected disabled>-- Pilih Nomor --</option>
                    <option value="loading" style="display: none" disabled>Memuat data...</option>
                    @foreach ($formData['listNomor'] as $d)
                        <option value="{{ $d->IdKonversiNG }}">{{ $d->MesinShift }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-2">
                <span class="aligned-text">No. Konversi:</span>
            </div>

            <div class="col-lg-4">
                <select id="select_nomor_konversi" class="form-select" disabled>
                    <option selected disabled>-- Pilih Nomor Konversi --</option>
                    <option value="loading" style="display: none" disabled>Memuat data...</option>
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-2">
                <span class="aligned-text">Shift:</span>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <input type="text" id="shift" class="form-control" style="max-width: 50px;" disabled>
                    <input type="time" id="shift_awal" class="form-control">
                    <span class="input-group-text">s/d</span>
                    <input type="time" id="shift_akhir" class="form-control">
                </div>
            </div>

            <div class="col-lg-2">
                <span class="aligned-text">Type:</span>
            </div>
            <div class="col-lg-4">
                <select id="select_type" class="form-select" disabled>
                    <option selected disabled>-- Pilih Type --</option>
                    <option value="loading" style="display: none" disabled>Memuat data...</option>
                </select>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">Asal Konversi</div>

            <div class="card-body">
                <table id="table_asal" class="hover cell-border">
                    <thead>
                        <tr>
                            <th>Id Type</th>
                            <th>Nama Type</th>
                            <th>Jumlah Primer</th>
                            <th>Jumlah Sekunder</th>
                            <th>Jumlah Tritier</th>
                            <th>Nama Objek</th>
                            <th>Nama Kel. Utama</th>
                            <th>Nama Kelompok</th>
                            <th>Nama Sub-kelompok</th>
                            <th>Id Objek</th>
                            <th>Id Kel. Ut.</th>
                            <th>Id Kelompok</th>
                            <th>Id Sub-kel.</th>
                            <th>Id Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @php $tableWidth = 14; @endphp
                            <td colspan="{{ $tableWidth }}" style="padding-left: 100px">
                                <h1 class="mt-3">Tabel masih kosong...</h1>
                            </td>
                            @for ($i = 0; $i < $tableWidth - 1; $i++)
                                <td class="hidden"></td>
                            @endfor
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">Tujuan Konversi</div>

            <div class="card-body">
                <table id="table_tujuan" class="hover cell-border">
                    <thead>
                        <tr>
                            <th>Id Type</th>
                            <th>Nama Type</th>
                            <th>Jumlah Primer</th>
                            <th>Jumlah Sekunder</th>
                            <th>Jumlah Tritier</th>
                            <th>Nama Objek</th>
                            <th>Nama Kel. Utama</th>
                            <th>Nama Kelompok</th>
                            <th>Nama Sub-kelompok</th>
                            <th>Id Objek</th>
                            <th>Id Kel. Ut.</th>
                            <th>Id Kelompok</th>
                            <th>Id Sub-kel.</th>
                            <th>Id Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="{{ $tableWidth }}" style="padding-left: 100px">
                                <h1 class="mt-3">Tabel masih kosong...</h1>
                            </td>
                            @for ($i = 0; $i < $tableWidth - 1; $i++)
                                <td class="hidden"></td>
                            @endfor
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-5 text-center">
                <button type="button" id="btn_isi" class="btn btn-outline-success">Isi</button>
                <button type="button" id="btn_koreksi" class="btn btn-outline-warning">Koreksi</button>
                <button type="button" id="btn_hapus" class="btn btn-outline-danger">Hapus</button>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 text-center">
                <button type="button" id="btn_proses" class="btn btn-outline-primary">Proses</button>
                <button type="button" id="btn_keluar" class="btn btn-outline-secondary">Keluar</button>
            </div>
        </div>
    </div>

    @include('Extruder.ExtruderNet.modalRincianKonversi')

    <script src="{{ asset('js/Extruder/ExtruderNet/benangMohon.js') }}"></script>
@endsection
