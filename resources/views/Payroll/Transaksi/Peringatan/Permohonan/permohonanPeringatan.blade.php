@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="width:1200px;">
                    <div class="card-header" style="">Maintenance Peringatan</div>










                    <div class="card-body" style="border: 1px solid black; margin: 10px;">
                        <div class="card-body">
                            <div class="row" style="margin-left:-120px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <label for="TglMulai" class="aligned-text">Tanggal:</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglMulai" name="TglMulai"
                                        value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required
                                        style="max-width: 200px;">


                                </div>

                            </div>

                            <div class="row" style="margin-left:-120px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Divisi:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <select class="form-control" id="Shift" name="Shift"
                                        style="resize: none;height: 40px; max-width:450px;">
                                        <option value="">1</option>
                                        <option value="">2</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row" style="margin-left:-120px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Kd Pegawai:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <select class="form-control" id="Shift" name="Shift"
                                        style="resize: none;height: 40px; max-width:450px;">
                                        <option value="">1</option>
                                        <option value="">2</option>
                                    </select>

                                </div>
                            </div>








                        </div>
                        <div class="data1" style="">
                            <div class="card-body-container" style="display: flex; flex-wrap: wrap; margin: 10px;">
                                <div class="card-body" style="flex: 0 0 50%; max-width: 50%;">

                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Tahun Akhir :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                            <input type="text" class="form-control" name="Divisi_pengiriman"
                                                id="Divsi_pengiriman" placeholder="" required>

                                        </div>
                                    </div>
                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Peringatan :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                            <input type="text" class="form-control" name="Divisi_pengiriman"
                                                id="Divsi_pengiriman" placeholder="" required>

                                        </div>
                                    </div>

                                </div>
                                <div class="card-body" style="flex: 0 0 50%; max-width: 50%;">

                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Bulan Akhir :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                            <input type="text" class="form-control" name="Divisi_pengiriman"
                                                id="Divsi_pengiriman" placeholder="" required>

                                        </div>
                                    </div>
                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Tgl Akhir Peringatan :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:180px;">
                                            <input class="form-control" type="date" id="TglMulai" name="TglMulai"
                                                value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required
                                                style="max-width: 200px;">


                                        </div>
                                    </div>

                                </div>



                            </div>






                        </div>


                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Peringatan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <select class="form-control" id="Shift" name="Shift"
                                    style="resize: none;height: 40px; max-width:450px;">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>

                            </div>
                        </div>
                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Bulan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <select class="form-control" id="Shift" name="Shift"
                                    style="resize: none;height: 40px; max-width:450px;">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>

                            </div>
                        </div>

                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Tahun :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman"
                                    placeholder="" required>

                            </div>
                        </div>
                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">No. Surat :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman"
                                    placeholder="" required>

                            </div>
                        </div>
                        <div class="row" style="margin-left:-120px; ">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <label for="TglMulai" class="aligned-text" style="min-width: fit-content">Tgl. Mulai:</label>
                            </div>
                            <div class="form-group col-md-4" style="">
                                <input class="form-control" type="date" id="TglMulai" name="TglMulai"
                                    value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required
                                    style="max-width: 200px;">
                                <span class="aligned-text" style="margin-left: 15px; min-width:fit-content;">Tgl. Akhir :</span>
                                <input class="form-control" type="date" id="TglSelesai" name="TglSelesai"
                                    value="{{ old('TglSelesai', now()->format('Y-m-d')) }}" required
                                    style="max-width: 200px;">

                            </div>


                        </div>
                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text"> Keterangan:</span>
                            </div>
                            <div class="form-group col-md-4" style="max-width:1000px">
                                <textarea class="input" name="keterangan" id="keterangan" cols="60" rows="3" placeholder="Keterangan" style=""></textarea>
                            </div>

                        </div>



                    </div>






                    <div class="row" style="padding-top: 20px; margin:20px;">
                        <div class="col-6" style="text-align: left; ">
                            <button type="button" class="btn btn-primary"
                                style="margin-left: 10px;width:100px;">Isi</button>
                                <button type="button" class="btn btn-secondary"
                                style="margin-left: 10px;width:100px;">Koreksi</button>
                                <button type="button" class="btn btn-danger"
                                style="margin-left: 10px;width:100px;">Hapus</button>
                            <button type="button" class="btn btn-dark"
                                style="margin-left: 10px;width:100px;">Keluar</button>

                        </div>
                        <div class="col-6" style="text-align: right; ">


                        </div>
                    </div>
                </div>






            </div>








            <br>







        </div>
    </div>

    </div>
    <br>

    </div>
    </div>
    </div>
@endsection
