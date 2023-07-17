@extends('layouts.appExtruder')
@section('content')
    <div id="komposisi_mojosari" class="form" data-aos="fade-up">
        <form>

            <div class="row mt-3">
                <div class="col-md-7 row">
                    <div class="row mt-3">
                        <div class="col-md-8 form-group">
                            <label for="id_komposisi">Id Komposisi:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="id_komposisi1">
                                <input type="text" class="form-control" name="id_komposisi2" style="width: 12.5em;">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6 form-group">
                            <label for="id_komposisi">Mesin:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="mesin1">
                                <input type="text" class="form-control" name="mesin2" style="width: 6.5em;">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 form-group">
                            <label for="id_komposisi">Hasil Produksi:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="hp1">
                                <input type="text" class="form-control" name="hp2" style="width: 20em;">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 form-group">
                            <label for="id_komposisi">Hasil Produksi NG:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="hpng1">
                                <input type="text" class="form-control" name="hpng2" style="width: 20em;">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 form-group">
                            <label for="id_komposisi">Afalan:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="afalan1">
                                <input type="text" class="form-control" name="afalan2" style="width: 20em;">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 d-flex align-items-end row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-outline-secondary">Tambah Afalan</button>
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Nama Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>001</td>
                                    <td>Type A</td>
                                </tr>
                                <tr>
                                    <td>002</td>
                                    <td>Type B</td>
                                </tr>
                                <tr>
                                    <td>003</td>
                                    <td>Type C</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-body">
                    <div style="width: 100%; overflow-x: auto;">
                        <table class="table" style="table-layout: fixed;">
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
                        <div class="col-md-7 form-group">
                            <label for="objek">Objek:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="objek1">
                                <input type="text" class="form-control" name="objek2" style="width: 22.5em;">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="objek">Primer:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="primer1" value="0">
                                <input type="text" class="form-control" name="primer2">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="objek">Kelompok Utama:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="utama1">
                                <input type="text" class="form-control" name="utama2" style="width: 22.5em;">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="objek">Sekunder:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="sekunder1" value="0">
                                <input type="text" class="form-control" name="sekunder2">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="objek">Kelompok:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="kelompok1">
                                <input type="text" class="form-control" name="kelompok2" style="width: 22.5em;">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="objek">Tertier:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="tertier1" value="0">
                                <input type="text" class="form-control" name="tertier2">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="objek">Kelompok:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="kelompok1">
                                <input type="text" class="form-control" name="kelompok2" style="width: 22.5em;">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="objek">Tertier:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="tertier1" value="0">
                                <input type="text" class="form-control" name="tertier2">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="objek">SubKelompok:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="subkelompok1">
                                <input type="text" class="form-control" name="subkelompok2" style="width: 22.5em;">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
                        </div>

                        <div class="col-md-2 form-group">
                            <label for="objek">Presentase:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="presentase" value="0">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="objek">Type:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="type1">
                                <input type="text" class="form-control" name="type2" style="width: 22.5em;">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="objek">Kode Barang:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="kode_barang">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7" style="padding-left: 25px;">
                            BB: Bahan Baku<br>
                            BP: Bahan Pembantu
                        </div>

                        <div class="col-md-2 form-group">
                            <label for="objek">Cadangan:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="cadangan" value="0">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 d-flex justify-content-center">
                            <button type="submit" style="margin-right: 2em;">Tambah<br>Cadangan</button>
                            <button type="submit" style="margin-right: 2em;">Tambah<br>Bahan</button>
                            <button type="submit" style="margin-right: 2em;">Koreksi</button>
                            <button type="submit">Hapus</button>
                        </div>
                    </div>

                </div>
            </div>

        </form>
    </div>
@endsection
