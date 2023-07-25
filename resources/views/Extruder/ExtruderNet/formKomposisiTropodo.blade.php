@extends('layouts.appExtruder')
@section('content')
    <div id="komposisi_tropodo" class="form" data-aos="fade-up">
        {{-- style="scale: 0.65; transform-origin: top;" --}}
        <form>

            <div class="row mt-3">
                <div class="col-md-3">
                    <span class="aligned-text">Id Komposisi:</span>
                </div>
                <div class="col-md-6 form-group">
                    <select class="form-select" name="select_id_komposisi" id="select_id_komposisi" disabled>
                        <option selected disabled>-- Pilih Id Komposisi --</option>
                        @foreach ($formData['listIdKomposisi'] as $d)
                            <option value="{{ $d->IdKomposisi }}">{{ $d->NamaKomposisi }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <span class="aligned-text">Mesin:</span>
                </div>
                <div class="col-md-6 form-group">
                    <select class="form-select" name="select_mesin" id="select_mesin" disabled>
                        <option selected disabled>-- Pilih Mesin --</option>
                        @foreach ($formData['listMesin'] as $d)
                            <option value="{{ $d->IdMesin }}">{{ $d->TypeMesin }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-hover" style="width: max-content">
                            <thead>
                                <tr>
                                    <th class="text-center">Jenis</th>
                                    <th class="text-center" style="width: 100px">Id Type</th>
                                    <th style="width: 500px">Nama Type</th>
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
                                    <td class="text-center">temp</td>
                                    <td class="text-center">temp</td>
                                    <td>temp</td>
                                    <td class="text-center">temp</td>
                                    <td class="text-center">temp</td>
                                    <td class="text-center">temp</td>
                                    <td class="text-center">temp</td>
                                    <td class="text-center">temp</td>
                                    <td class="text-center">temp</td>
                                </tr>
                                <tr>
                                    <td class="text-center">temp</td>
                                    <td class="text-center">temp</td>
                                    <td>temp</td>
                                    <td class="text-center">temp</td>
                                    <td class="text-center">temp</td>
                                    <td class="text-center">temp</td>
                                    <td class="text-center">temp</td>
                                    <td class="text-center">temp</td>
                                    <td class="text-center">temp</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="select_objek">Objek</label>
                            <select name="select_objek" id="select_objek" class="form-select" disabled>
                                <option selected disabled>-- Pilih Objek --</option>
                                <option value="loading" style="display: none" disabled>Loading...</option>
                                @foreach ($formData['listObjek'] as $d)
                                    <option value="{{ $d->IdObjek }}">{{ $d->NamaObjek }}</option>
                                @endforeach
                                <option value="temp">haloDunia</option>
                            </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="objek">Primer</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="primer1" value="0">
                                <input type="text" class="form-control" name="primer2">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="select_kelompok_utama">Kelompok Utama</label>
                            <select name="select_kelompok_utama" id="select_kelompok_utama" class="form-select" disabled>
                                <option selected disabled>-- Pilih Kelompok Utama --</option>
                                <option value="loading" style="display: none" disabled>Loading...</option>
                                <option value="temp">haloDunia</option>
                            </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="objek">Sekunder</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="sekunder1" value="0">
                                <input type="text" class="form-control" name="sekunder2">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="select_kelompok">Kelompok</label>
                            <select name="select_kelompok" id="select_kelompok" class="form-select" disabled>
                                <option selected disabled>-- Pilih Kelompok --</option>
                                <option value="loading" style="display: none" disabled>Loading...</option>
                                <option value="temp">haloDunia</option>
                            </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="objek">Tertier</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="tertier1" value="0">
                                <input type="text" class="form-control" name="tertier2">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="select_sub_kelompok">Sub-kelompok</label>
                            <select name="select_sub_kelompok" id="select_sub_kelompok" class="form-select" disabled>
                                <option selected disabled>-- Pilih Sub-kelompok --</option>
                                <option value="loading" style="display: none" disabled>Loading...</option>
                                <option value="temp">haloDunia</option>
                            </select>
                        </div>

                        <div class="col-md-2 form-group">
                            <label for="objek">Presentase</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="presentase" value="0">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7 form-group">
                            <label for="select_type">Type</label>
                            <select name="select_type" id="select_type" class="form-select" disabled>
                                <option selected disabled>-- Pilih Type --</option>
                                <option value="loading" style="display: none" disabled>Loading...</option>
                                <option value="temp">haloDunia</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row mt-2">
                                <div class="col-md-6">BB: Bahan Baku</div>
                                <div class="col-md-6">HP: Hasil Produksi</div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">BP: Bahan Pembantu</div>
                                <div class="col-md-6">AF: Afalan</div>
                            </div>
                        </div>

                        <div class="col-md-1"></div>

                        <div class="col-md-5">
                            <div class="row mt-3 d-flex justify-content-center">
                                <div class="col-lg-3 text-center">
                                    <button type="submit" style="height: -webkit-fill-available;" disabled>Tambah
                                        Bahan</button>
                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-3 text-center">
                                    <button type="submit" style="height: -webkit-fill-available;"
                                        disabled>Koreksi</button>
                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-3 text-center">
                                    <button type="submit" style="height: -webkit-fill-available;" disabled>Hapus</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 text-center">
                    <button type="submit">Komposisi Baru</button>
                    <button type="submit">Koreksi</button>
                    <button type="submit">Hapus</button>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4 text-center">
                    <button type="submit" disabled>Proses</button>
                    <button type="submit">Keluar</button>
                </div>
            </div>

        </form>
    </div>

    <script src="{{ asset('js/Extruder/komposisiTropodo.js') }}"></script>
@endsection
