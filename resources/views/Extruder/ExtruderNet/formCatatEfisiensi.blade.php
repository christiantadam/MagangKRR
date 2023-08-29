@extends('layouts.appExtruder')
@section('content')
    <div id="tropodo_efisiensi" class="form" data-aos="fade-up">
        <div class="card mt-3">
            <div class="card-body">

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
                                <option value="{{ $d->IdMesin }}">{{ $d->IdMesin . ' | ' . $d->TypeMesin }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-2">
                        <span class="aligned-text">Shift:</span>
                    </div>

                    <div class="col-lg-3">
                        <select id="select_shift" class="form-select">
                            <option selected disabled>-- Pilih Shift --</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-2">
                        <span class="aligned-text">Awal Produksi:</span>
                    </div>

                    <div class="col-lg-2">
                        <input type="time" id="awal" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-2">
                        <span class="aligned-text">Akhir Produksi:</span>
                    </div>

                    <div class="col-lg-2">
                        <input type="time" id="akhir" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-2">
                        <span class="aligned-text">Kode Konversi:</span>
                    </div>

                    <div class="col-lg-7">
                        <select id="select_kode_konversi" class="form-select">
                            <option selected disabled>-- Pilih Kode Konversi --</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-2">
                        <span class="aligned-text">Screw Revolution:</span>
                    </div>

                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" id="screw_revolution" class="form-control">
                            <span class="input-group-text">Rpm</span>
                        </div>
                    </div>

                    <div class="col-lg-1"></div>

                    <div class="col-lg-2">
                        <span class="aligned-text">3 Roll Speed:</span>
                    </div>

                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" id="roll_speed" class="form-control">
                            <span class="input-group-text">m/min</span>
                        </div>
                    </div>
                </div>

                <div class="row mt-3 d-flex align-items-center">
                    <div class="col-lg-2">
                        <span class="aligned-text">Motor Current:</span>
                    </div>

                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" id="motor_current" class="form-control">
                            <span class="input-group-text">A</span>
                        </div>
                    </div>

                    <div class="col-lg-1"></div>

                    <div class="col-lg-2">
                        <span class="aligned-text">Stretching Ratio:</span>
                    </div>

                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" id="stretching_ratio" class="form-control">
                            <span class="input-group-text">times</span>
                        </div>
                    </div>
                </div>

                <div class="row mt-3 d-flex align-items-center">
                    <div class="col-lg-2">
                        <span class="aligned-text">Slitter Width:</span>
                    </div>

                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" id="slitter_width" class="form-control">
                            <span class="input-group-text">mm</span>
                        </div>
                    </div>

                    <div class="col-lg-1"></div>

                    <div class="col-lg-2">
                        <span class="aligned-text">Relax:</span>
                    </div>

                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" id="relax" class="form-control">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>

                <div class="row mt-3 d-flex align-items-center">
                    <div class="col-lg-2">
                        <span class="aligned-text">No. of Yam:</span>
                    </div>

                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" id="no_yam" class="form-control">
                            <span class="input-group-text">Pcs</span>
                        </div>
                    </div>

                    <div class="col-lg-1"></div>

                    <div class="col-lg-2">
                        <span class="aligned-text">Denier:</span>
                    </div>

                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" id="denier" class="form-control">
                            <span class="input-group-text">m</span>
                        </div>
                    </div>
                </div>

                <div class="row mt-3 d-flex align-items-center">
                    <div class="col-lg-2">
                        <span class="aligned-text">Water Gap:</span>
                    </div>

                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" id="water_gap" class="form-control">
                            <span class="input-group-text">mm</span>
                        </div>
                    </div>

                    <div class="col-lg-1"></div>

                    <div class="col-lg-2">
                        <span class="aligned-text">Denier Rata-rata:</span>
                    </div>

                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" id="roll" class="form-control">
                            <span class="input-group-text">m</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-5 text-center">
                <button type="submit" class="btn btn-outline-success">Isi</button>
                <button type="submit" class="btn btn-outline-warning">Koreksi</button>
                <button type="submit" class="btn btn-outline-danger">Hapus</button>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 text-center">
                <button type="submit" class="btn btn-outline-primary">Proses</button>
                <button type="button" class="btn btn-outline-secondary">Keluar</button>
            </div>
        </div>
    </div>
@endsection
