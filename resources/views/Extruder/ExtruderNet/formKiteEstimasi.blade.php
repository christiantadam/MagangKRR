@extends('layouts.appExtruder')
@section('content')
    <div id="kite_estimasi" class="form" data-aos="fade-up">
        <form>
            <div class="card">
                <div class="card-header">Data KITE</div>

                <div class="card-body">

                    <div class="row mt-3" style="padding-left: 7.5vw;">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input type="radio" name="fasilitas" value="pembebasan" id="fasilitas_pembebasan">
                                <label for="fasilitas_pembebasan">
                                    Fasilitas Pembebasan
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input type="radio" name="fasilitas" value="pengembalian" id="fasilitas_pengembalian">
                                <label for="fasilitas_pengembalian">
                                    Fasilitas Pengembalian
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-2 aligned-text">Tanggal Start:</div>
                        <div class="col-lg-3">
                            <input type="date" name="tgl_start" id="tgl_start" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-2 aligned-text">Kode Barang:</div>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="text" name="kode_barang" id="kode_barang" class="form-control">
                                <button type="button" class="btn btn-outline-secondary">...</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-2 aligned-text">Nama Barang:</div>
                        <div class="col-lg-10">
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3 mb-3">

                        <div class="col-lg-5">

                            <div class="row mt-3">
                                <div class="col-lg-5 aligned-text">Bahan PP:</div>
                                <div class="col-lg-7" style="height: fit-content;">
                                    <input type="text" name="bahan_pp" id="bahan_pp" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-5 aligned-text">Benang:</div>
                                <div class="col-lg-7" style="height: fit-content;">
                                    <input type="text" name="benang" id="benang" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-5 aligned-text">Hasil:</div>
                                <div class="col-lg-7" style="height: fit-content;">
                                    <input type="text" name="hasil" id="hasil" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-5 aligned-text">Sisa:</div>
                                <div class="col-lg-7" style="height: fit-content;">
                                    <input type="text" name="sisa" id="sisa" class="form-control">
                                </div>
                            </div>

                            <div class="card mt-3">
                                <div class="card-header">Estimasi Bahan</div>

                                <div class="card-body">
                                    <div class="row mt-3">
                                        <div class="col-lg-4 aligned-text">Tanggal:</div>
                                        <div class="col-lg-8">
                                            <input type="date" name="tgl_start" id="tgl_start" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-lg-4 aligned-text">Bahan PP:</div>
                                        <div class="col-lg-8">
                                            <input type="text" name="bahan_pp" id="bahan_pp" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-lg-4 aligned-text">CaCO3:</div>
                                        <div class="col-lg-8">
                                            <input type="text" name="caco3" id="caco3" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-lg-4 aligned-text">Benang:</div>
                                        <div class="col-lg-8">
                                            <input type="text" name="benang" id="benang" class="form-control">
                                        </div>
                                    </div>

                                    <div class="text-center mt-3">
                                        <button type="submit">Proses</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-7">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">PP</th>
                                        <th scope="col">CaCO3</th>
                                        <th scope="col">Benang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>temp</td>
                                        <td>temp</td>
                                        <td>temp</td>
                                        <td>temp</td>
                                    </tr>
                                    <tr>
                                        <td>temp</td>
                                        <td>temp</td>
                                        <td>temp</td>
                                        <td>temp</td>
                                    </tr>
                                    <tr>
                                        <td>temp</td>
                                        <td>temp</td>
                                        <td>temp</td>
                                        <td>temp</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <div class="text-end mt-3">
                        <button type="button">Keluar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
