@extends('layouts.appExtruder')
@section('content')
    <div id="tropodo_daya" class="form" data-aos="fade-up">
        <div class="card mt-3">
            <div id="card_daya" class="card-body">
                <div class="row">
                    <div class="col-lg-2">
                        <span class="aligned-text">Tanggal:</span>
                    </div>

                    <div class="col-lg-3">
                        <input type="date" id="tanggal" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-2">
                        <span class="aligned-text">Mesin:</span>
                    </div>

                    <div class="col-lg-7">
                        <select id="select_mesin" class="form-select">
                            <option selected disabled>-- Pilih Mesin --</option>
                            @foreach ($formData['listMesin'] as $d)
                                <option value="{{ $d->IdMesin }}">{{ $d->TypeMesin }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-6">

                        <div class="row">
                            <div class="col-lg-4">
                                <span class="aligned-text">Jam Produksi:</span>
                            </div>
                            <div class="col-lg-6">
                                <input type="time" id="jam_produksi" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <span class="aligned-text">Counter:</span>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" id="counter" class="form-control">
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3">
                        <input type="text" id="teks_id" class="form-control" style="margin-top: 1.75em;">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-2">
                        <span class="aligned-text">Faktor Kali:</span>
                    </div>

                    <div class="col-lg-3">
                        <input type="text" id="faktor" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 d-flex align-items-center justify-content-end">
                        <span class="aligned-text">Data Bulan/Tahun:</span>
                    </div>

                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" id="data_tgl" class="form-control">
                            <button type="button" id="btn_ok" class="btn btn-outline-primary">OK</button>
                        </div>
                    </div>
                </div>

                <table id="table_daya" class="hover cell-border">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Id Mesin</th>
                            <th>Jam Produksi</th>
                            <th>Counter</th>
                            <th>Faktor Kali</th>
                            <th>Id User</th>
                            <th>Id KwaH</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $tableWidth = 8; @endphp
                        <td colspan="{{ $tableWidth }}" style="padding-left: 250px">
                            <h1 class="mt-3">Tabel masih kosong...</h1>
                        </td>
                        @for ($i = 0; $i < $tableWidth - 1; $i++)
                            <td class="hidden"></td>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-5 text-center">
                <button type="button" class="btn btn-outline-success">Isi</button>
                <button type="button" class="btn btn-outline-warning">Koreksi</button>
                <button type="button" class="btn btn-outline-danger">Hapus</button>
            </div>

            <div class="col-md-2"></div>

            <div class="col-md-5 text-center">
                <button type="button" class="btn btn-outline-primary">Proses</button>
                <button type="button" class="btn btn-outline-secondary">Keluar</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/Extruder/ExtruderNet/catatDaya.js') }}"></script>
@endsection
