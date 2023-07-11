@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="width:1000px; ">
                    <div class="card-header" style="">Check Clock Masuk Keluar</div>









                        <br>
                        <div class="row" style="">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Jenis Karyawan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <div class="col">

                                    <div class="form-check form-check-inline seperate">
                                        <input class="form-check-input custom-radio ml-3" type="radio" name="unit"
                                            value="kg" checked>
                                        <label class="form-check-label rounded-circle custom-radio"
                                            for="kgRadio">Harian</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="margin-left:10px;">
                                        <input class="form-check-input custom-radio" type="radio" name="unit"
                                            value="yard">
                                        <label class="form-check-label rounded-circle custom-radio"
                                            for="yardRadio">Staff</label>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="row" style="">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Manager:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <select class="form-control" id="Shift" name="Shift"
                                    style="resize: none;height: 40px; max-width:250px;">
                                    <option value="">Manager 1</option>
                                    <option value="">Manager 2</option>
                                </select>

                            </div>
                        </div>
                        <div class="row" style="">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Divisi:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <select class="form-control" id="Shift" name="Shift"
                                    style="resize: none;height: 40px; max-width:250px;">
                                    <option value="">Divisi 1</option>
                                    <option value="">Divisi 2</option>
                                </select>

                            </div>
                        </div>
                        <div class="row" style="">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Pegawai:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <select class="form-control" id="Shift" name="Shift"
                                    style="resize: none;height: 40px; max-width:250px;">
                                    <option value="">Pegawai 1</option>
                                    <option value="">Pegawai 2</option>
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                              <label for="TglMulai" class="aligned-text">Tanggal:</label>
                            </div>
                            <div class="form-group col-md-4">
                              <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="max-width: 200px;">
                              <span class="aligned-text" style="margin-left: 15px;">s/d</span>
                              <input class="form-control" type="date" id="TglSelesai" name="TglSelesai" value="{{ old('TglSelesai', now()->format('Y-m-d')) }}" required style="max-width: 200px;">
                            </div>


                        </div>














                    <div class="card-body-container"
                        style="display: flex; flex-wrap: wrap; border: 1px solid black; margin: 10px;">
                        <div class="card-body" style="flex: 0 0 25%; max-width: 25%;">
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">

                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 0 0 25%; max-width: 25%;">
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">

                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 0 0 25%; max-width: 25%;">
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">

                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 0 0 25%; max-width: 25%;">
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">

                                </div>
                            </div>
                        </div>

                    </div>





                    <div class="row" style="padding-top: 20px; margin:20px;">
                        <div class="col-6" style="text-align: left; ">

                        </div>
                        <div class="col-6" style="text-align: right; ">
                            <button type="button" class="btn btn-primary" style="margin-left: 10px">Cetak</button>
                            <button type="button" class="btn btn-dark" style="margin-left: 10px">Keluar</button>
                        </div>
                    </div>
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
