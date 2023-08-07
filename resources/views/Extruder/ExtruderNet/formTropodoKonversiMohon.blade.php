@extends('layouts.appExtruder')
@section('content')
    <div id="tropodo_konversi_mohon" class="form" data-aos="fade-up">
        <div class="form-group row mt-3">
            <div class="col-lg-2"><span class="aligned-text">Nomor: </span></div>
            <div class="col-lg-8">
                <select id="select_nomor" class="form-select">
                    <option selected disabled>-- Pilih Nomor --</option>
                    <option value="loading" style="display: none" disabled>Loading...</option>
                    @foreach ($formData['listKonversi'] as $d)
                        <option value="{{ $d->IdKonversi }}">{{ $d->IdKonversi . ' | ' . $d->NamaKomposisi }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mt-3 master">
            <div class="col-lg-4">
                <label for="no_order">No. Order:</label>
                <select id="select_order" class="form-select" disabled>
                    <option selected disabled>-- Pilih Nomor Order --</option>
                    <option value="loading" style="display: none" disabled>Loading...</option>
                </select>
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-2">
                <label for="lot">Lot:</label>
                <input type="text" id="lot" class="form-control" disabled>
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-4">
                <label for="tanggal">Tanggal:</label>
                <input type="date" id="tanggal" class="form-control unclickable">
            </div>
        </div>

        <div class="row mt-3 master">
            <div class="col-lg-4">
                <label for="spek">Spek:</label>
                <select id="select_spek" class="form-select" disabled>
                    <option selected disabled>-- Pilih Spek --</option>
                    <option value="loading" style="display: none" disabled>Loading...</option>
                </select>
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-2">
                <label for="ukuran">Ukuran:</label>
                <input type="number" id="ukuran" class="form-control" placeholder="0" disabled>
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-4">
                <label for="shift">Shift:</label>
                <div class="input-group">
                    <input type="text" id="shift" class="form-control" style="max-width: 50px;" disabled>
                    <input type="time" id="shift_awal" class="form-control unclickable">
                    <span class="input-group-text">s/d</span>
                    <input type="time" id="shift_akhir" class="form-control unclickable">
                </div>
            </div>
        </div>

        <div class="row mt-3 master">
            <div class="col-lg-4">
                <label for="mesin">Mesin:</label>
                <select id="select_mesin" class="form-select" disabled>
                    <option selected disabled>-- Pilih Mesin --</option>
                    <option value="loading" style="display: none" disabled>Loading...</option>
                </select>
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-2">
                <label for="denier">Denier:</label>
                <input type="number" id="denier" class="form-control" placeholder="0" disabled>
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-2">
                <label for="waktu_mulai">Mulai:</label>
                <input type="time" id="waktu_mulai" class="form-control unclickable">
            </div>
        </div>

        <div class="row mt-3 master">
            <div class="col-lg-4">
                <label for="komposisi">Komposisi:</label>
                <select id="select_komposisi" class="form-select" disabled>
                    <option selected disabled>-- Pilih Komposisi --</option>
                    <option value="loading" style="display: none" disabled>Loading...</option>
                </select>
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-2">
                <label for="warna">Warna:</label>
                <input type="text" id="warna" class="form-control" disabled>
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-2">
                <label for="waktu_selesai">Selesai:</label>
                <input type="time" id="waktu_selesai" class="form-control unclickable">
            </div>

            <div class="col-lg-2">
                <label for="temp"></label>
                <input type="text" id="no_urut" class="form-control hidden" placeholder="Nomor Urut">
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <table id="table_konversi" class="hover cell-border mt-3">
                    <thead>
                        <tr>
                            <th>Nama Type</th>
                            <th>Qty. Primer</th>
                            <th>Sat. Primer</th>
                            <th>Qty. Sekunder</th>
                            <th>Sat. Sekunder</th>
                            <th>Qty. Tersier</th>
                            <th>Sat. Tersier</th>
                            <th>Presentase</th>
                            <th>Jenis</th>
                            <th>Sub-kelompok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @php $col_length = 10; @endphp
                            <td colspan="{{ $col_length }}" class="text-center">
                                <h1 class="mt-3">Tabel masih kosong...</h1>
                            </td>
                            @for ($i = 0; $i < $col_length - 1; $i++)
                                <td class="hidden"></td>
                            @endfor
                        </tr>
                    </tbody>
                </table>

                <div class="row mt-3">

                    <div class="col-lg-6">
                        <div class="mt-2">
                            <table id="table_komposisi" class="hover cell-border">
                                <thead>
                                    <tr>
                                        <th>Jenis</th>
                                        <th>Nama Type</th>
                                        <th>Sub-kelompok</th>
                                        <th>Id Subkel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $col_length = 4; @endphp
                                    <td colspan="{{ $col_length }}">
                                        <h1 class="mt-3" style="margin-left: 100px">Tabel masih kosong...</h1>
                                    </td>
                                    @for ($i = 0; $i < $col_length - 1; $i++)
                                        <td class="hidden"></td>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="item_produksi">Item Produksi:</label>
                                <div class="input-group">
                                    <input type="text" id="item_produksi1" class="form-control" disabled>
                                    <input type="text" id="item_produksi2" class="form-control"
                                        style="width: 12.5vw;" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <label for="stok_primer">Stok Primer:</label>
                                <input type="text" id="stok_primer" class="form-control" disabled>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5">
                                <label for="primer">Primer:</label>
                                <input type="number" id="primer" class="form-control" placeholder="0" disabled>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <label for="stok_sekunder">Stok Sekunder:</label>
                                <input type="text" id="stok_sekunder" class="form-control" disabled>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5">
                                <label for="sekunder">Sekunder:</label>
                                <input type="number" id="sekunder" class="form-control" placeholder="0" disabled>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <label for="stok_tritier">Stok Tritier:</label>
                                <input type="text" id="stok_tritier" class="form-control" disabled>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5">
                                <label for="tritier">Tritier:</label>
                                <input type="number" id="tritier" class="form-control" placeholder="0" disabled>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-3">
                                <input type="text" id="jenis" class="form-control" placeholder="Jenis" disabled>
                            </div>

                            <div class="col-lg-9">
                                <div class="float-end">
                                    <button type="button" id="btn_tambah_item" class="btn btn-outline-success"
                                        disabled>Tambah
                                        Item</button>
                                    <button type="button" id="btn_koreksi_dalam" class="btn btn-outline-warning"
                                        disabled>Koreksi</button>
                                    <button type="button" id="btn_hapus_dalam" class="btn btn-outline-danger"
                                        disabled>Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-5 text-center">
                <button type="button" id="btn_konversi_baru" class="btn btn-outline-success">Konversi Baru</button>
                <button type="button" id="btn_koreksi_luar" class="btn btn-outline-warning">Koreksi</button>
                <button type="button" id="btn_hapus_luar" class="btn btn-outline-danger">Hapus</button>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 text-center">
                <button type="button" id="btn_proses" class="btn btn-outline-primary" disabled>Proses</button>
                <button type="button" id="btn_keluar" class="btn btn-outline-secondary">Keluar</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/Extruder/TransaksiTropodo/tropodoKonversiMohon.js') }}"></script>
@endsection
