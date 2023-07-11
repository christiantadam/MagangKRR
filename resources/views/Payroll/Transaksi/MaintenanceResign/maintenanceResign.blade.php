@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="width:1000px;">
                    <div class="card-header" style="">Mutasi Harian</div>











                    <div class="card-body" style="border: 1px solid black; margin: 10px;">
                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <label for="TglMulai" class="aligned-text">Tanggal:</label>
                            </div>
                            <div class="form-group col-md-4">
                                <input class="form-control" type="date" id="TglMulai" name="TglMulai"
                                    value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required
                                    style="max-width: 200px;">
                                    <button type="button" class="btn btn-light" style="margin-left: 10px">List Data</button>

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

                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Masa Kerja :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman"
                                    placeholder="" required>

                            </div>
                        </div>
                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text"> Keterangan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:450px;">
                                <textarea class="input" name="keterangan" id="keterangan" cols="60" rows="3" placeholder="Keterangan"></textarea>

                            </div>
                        </div>





                    </div>






                    <div class="row" style="padding-top: 20px; margin:20px;">
                        <div class="col-6" style="text-align: left; ">
                            <button type="button" class="btn btn-primary" style="margin-left: 10px">Isi</button>
                            <button type="button" class="btn btn-info" style="margin-left: 10px">Koreksi</button>
                            <button type="button" class="btn btn-danger" style="margin-left: 10px">Hapus</button>
                            <button type="button" class="btn btn-dark" style="margin-left: 10px">Keluar</button>

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
