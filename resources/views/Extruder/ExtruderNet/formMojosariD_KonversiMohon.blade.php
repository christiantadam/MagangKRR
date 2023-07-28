@extends('layouts.appExtruder')
@section('content')

<div id="tropodo_konversi_mohon" class="form" data-aos="fade-up">
    <form>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="nomor">Nomor:</label>
                <div class="input-group">
                    <input type="text" name="nomor" id="nomor" class="form-control">
                    <button type="button" class="btn btn-outline-secondary">...</button>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-4">
                <label for="no_order">No. Order:</label>
                <div class="input-group">
                    <input type="text" name="no_order1" id="no_order1" class="form-control">
                    <input type="text" name="no_order2" id="no_order2" class="form-control" style="width: 12.5vw;">
                    <button type="button" class="btn btn-outline-secondary">...</button>
                </div>
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-2">
                <label for="lot">Lot:</label>
                <input type="text" name="lot" id="lot" class="form-control">
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-4">
                <label for="tanggal">Tanggal:</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-4">
                <label for="spek">Spek:</label>
                <div class="input-group">
                    <input type="text" name="spek" id="spek" class="form-control">
                    <button type="button" class="btn btn-outline-secondary">...</button>
                </div>
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-2">
                <label for="ukuran">Ukuran:</label>
                <input type="number" name="ukuran" id="ukuran" class="form-control" value="0">
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-4">
                <label for="tanggal">Shift:</label>
                <div class="input-group">
                    <input type="text" name="shift" id="shift" class="form-control" style="max-width: 50px;">
                    <input type="time" name="shift_awal" id="shift_awal" class="form-control">
                    <span class="input-group-text">s/d</span>
                    <input type="time" name="shift_akhir" id="shift_akhir" class="form-control">
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-4">
                <label for="mesin">Mesin:</label>
                <div class="input-group">
                    <input type="text" name="mesin1" id="mesin1" class="form-control">
                    <input type="text" name="mesin2" id="mesin2" class="form-control" style="width: 12.5vw;">
                    <button type="button" class="btn btn-outline-secondary">...</button>
                </div>
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-2">
                <label for="denier">Denier:</label>
                <input type="number" name="denier" id="denier" class="form-control" value="0">
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-2">
                <label for="waktu_mulai">Mulai:</label>
                <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-4">
                <label for="komposisi">Komposisi:</label>
                <div class="input-group">
                    <input type="text" name="komposisi1" id="komposisi1" class="form-control">
                    <input type="text" name="komposisi2" id="komposisi2" class="form-control" style="width: 12.5vw;">
                    <button type="button" class="btn btn-outline-secondary">...</button>
                </div>
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-2">
                <label for="warna">Warna:</label>
                <input type="text" name="warna" id="warna" class="form-control">
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-2">
                <label for="waktu_selesai">Selesai:</label>
                <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control">
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <div style="width: 100%; overflow-x: auto;">
                    <table class="table table-hover" style="table-layout: fixed;">
                        <colgroup>
                            <col style="width: 300px;">
                            <col style="width: 125px;">
                            <col style="width: 125px;">
                            <col style="width: 125px;">
                            <col style="width: 125px;">
                            <col style="width: 125px;">
                            <col style="width: 125px;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>Nama Type</th>
                                <th class="text-center">Qty Primer</th>
                                <th class="text-center">Sat Primer</th>
                                <th class="text-center">Qty Sekunder</th>
                                <th class="text-center">Sat Sekunder</th>
                                <th class="text-center">Qty Tertier</th>
                                <th class="text-center">Sat Tertier</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Data 1</td>
                                <td class="text-center">10</td>
                                <td class="text-center">kg</td>
                                <td class="text-center">5</td>
                                <td class="text-center">kg</td>
                                <td class="text-center">3</td>
                                <td class="text-center">kg</td>
                            </tr>
                            <tr>
                                <td>Data 2</td>
                                <td class="text-center">8</td>
                                <td class="text-center">kg</td>
                                <td class="text-center">4</td>
                                <td class="text-center">kg</td>
                                <td class="text-center">2</td>
                                <td class="text-center">kg</td>
                            </tr>
                            <tr>
                                <td>Data 3</td>
                                <td class="text-center">15</td>
                                <td class="text-center">kg</td>
                                <td class="text-center">6</td>
                                <td class="text-center">kg</td>
                                <td class="text-center">1</td>
                                <td class="text-center">kg</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row mt-3">

                    <div class="col-lg-6">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>title1</th>
                                    <th>title2</th>
                                    <th>title3</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>data1</td>
                                    <td>data2</td>
                                    <td>data3</td>
                                </tr>
                                <tr>
                                    <td>data1</td>
                                    <td>data2</td>
                                    <td>data3</td>
                                </tr>
                                <tr>
                                    <td>data1</td>
                                    <td>data2</td>
                                    <td>data3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="item_produksi">Item Produksi:</label>
                                <div class="input-group">
                                    <input type="text" name="item_produksi1" id="item_produksi1" class="form-control">
                                    <input type="text" name="item_produksi2" id="item_produksi2" class="form-control" style="width: 12.5vw;">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <label for="stok_primer">Stok Primer:</label>
                                <input type="text" name="stok_primer" id="stok_primer" class="form-control">
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5">
                                <label for="primer">Primer:</label>
                                <input type="number" name="primer" id="primer" class="form-control" value="0">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <label for="stok_sekunder">Stok Sekunder:</label>
                                <input type="text" name="stok_sekunder" id="stok_sekunder" class="form-control">
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5">
                                <label for="sekunder">Sekunder:</label>
                                <input type="number" name="sekunder" id="sekunder" class="form-control" value="0">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <label for="stok_tritier">Stok Tritier:</label>
                                <input type="text" name="stok_tritier" id="stok_tritier" class="form-control">
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5">
                                <label for="tritier">Tritier:</label>
                                <input type="number" name="tritier" id="tritier" class="form-control" value="0">
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-3">
                                <input type="text" name="temp" id="temp" class="form-control">
                            </div>

                            <div class="col-lg-9">
                                <div class="float-end">
                                    <button type="button" class="btn btn-outline-success">Tambah Item</button>
                                    <button type="button" class="btn btn-outline-warning">Koreksi</button>
                                    <button type="button" class="btn btn-outline-danger">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-5 text-center">
                <button type="submit" class="btn btn-outline-success">Konversi Baru</button>
                <button type="submit" class="btn btn-outline-warning">Koreksi</button>
                <button type="submit" class="btn btn-outline-danger">Hapus</button>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 text-center">
                <button type="submit" class="btn btn-outline-primary">Proses</button>
                <button type="button" class="btn btn-outline-secondary">Keluar</button>
            </div>
        </div>
    </form>
</div>

@endsection