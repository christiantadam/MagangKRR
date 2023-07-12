@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="width:1200px;">
                    <div class="card-header" style="">Maintenance Kenaikan Upah Harian</div>










                    <div class="card-body" style="border: 1px solid black; margin: 10px;">
                        <div class="card-body" >
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
                        <div class="card-body-container"
                        style="display: flex; flex-wrap: wrap; margin: 10px;">
                        <div class="card-body" style="flex: 0 0 50%; max-width: 50%;">
                            <div class="row" style="">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text"></span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                    <span class="aligned-text" style="font-size: 1.2rem">Baru </span>

                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">U. Jabatan :</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                    <input type="text" class="form-control" name="Divisi_pengiriman"
                                        id="Divsi_pengiriman" placeholder="" required>

                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">U. Golongan:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                    <input type="text" class="form-control" name="Divisi_pengiriman"
                                        id="Divsi_pengiriman" placeholder="" required>

                                </div>
                            </div>

                        </div>
                        <div class="card-body" style="flex: 0 0 50%; max-width: 50%;">
                            <div class="row" style="">

                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                    <span class="aligned-text" style="font-size: 1.2rem">Lama </span>

                                </div>
                            </div>
                            <div class="row" style="">

                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                    <input type="text" class="form-control" name="Divisi_pengiriman"
                                        id="Divsi_pengiriman" placeholder="" required>

                                </div>
                            </div>
                            <div class="row" style="">

                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                    <input type="text" class="form-control" name="Divisi_pengiriman"
                                        id="Divsi_pengiriman" placeholder="" required>

                                </div>
                            </div>

                        </div>



                    </div>
                    </div>






                    <div class="row" style="padding-top: 20px; margin:20px;">
                        <div class="col-6" style="text-align: left; ">
                            <button type="button" class="btn btn-primary" style="margin-left: 10px;width:100px;">Isi</button>
                            <button type="button" class="btn btn-info" style="margin-left: 10px;width:100px; ">List Data</button>

                            <button type="button" class="btn btn-dark" style="margin-left: 10px;width:100px;">Keluar</button>

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
