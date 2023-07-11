@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">TRANSFER DATA KOPERASI KARYAWAN PERPANJANGAN KONTRAK</div>

                    <div class="card-body" style=" margin:10px;">
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <u><strong>Data Koperasi Lama</strong></u>
                            </div>
                        </div>
                        <div class="row" style="">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Id Div:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <select class="form-control" id="Shift" name="Shift"
                                    style="resize: none;height: 40px; max-width:450px;">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>

                            </div>
                        </div>
                        <div class="row" style="">
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
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Nama :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:450px;">
                                <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman"
                                    placeholder="" required>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text"> No Koperasi:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:450px;">
                                <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman"
                                    placeholder="" required>

                            </div>
                        </div>




                    </div>


                    <div class="card-body" style=" margin:10px;">
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <u><strong>Data Koperasi Baru</strong></u>
                            </div>
                        </div>
                        <div class="row" style="">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Id Div:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <select class="form-control" id="Shift" name="Shift"
                                    style="resize: none;height: 40px; max-width:450px;">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>

                            </div>
                        </div>
                        <div class="row" style="">
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
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Nama :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:450px;">
                                <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman"
                                    placeholder="" required>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text"> No Koperasi:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:450px;">
                                <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman"
                                    placeholder="" required>

                            </div>
                        </div>




                    </div>




                    <div class="row" style="padding-top: 20px; margin:20px;">
                        <div class="col-6" style="text-align: left; ">
                            <button type="button" class="btn btn-primary" style="margin-left: 10px">Isi</button>
                            <button type="button" class="btn btn-info" style="margin-left: 10px">Koreksi</button>


                        </div>
                        <div class="col-6" style="text-align: right; ">
                            <button type="button" class="btn btn-dark" style="margin-left: 10px">Keluar</button>

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
