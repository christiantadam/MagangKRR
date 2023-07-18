@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">FrmLemburPerManager</div>






                    <div class="card-body-container" style="margin-left:-220px;">
                        <br>
                        <div class="row" style="">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Karyawan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <div class="col">

                                    <div class="form-check form-check-inline seperate">
                                        <input class="form-check-input custom-radio ml-3" type="radio" name="unit"
                                            value="kg" checked>
                                        <label class="form-check-label rounded-circle custom-radio"
                                            for="kgRadio">Lembur Staff</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="margin-left:10px;">
                                        <input class="form-check-input custom-radio" type="radio" name="unit"
                                            value="yard">
                                        <label class="form-check-label rounded-circle custom-radio"
                                            for="yardRadio">Lembur Harian</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="margin-left:10px;">
                                        <input class="form-check-input custom-radio" type="radio" name="unit"
                                            value="yard">
                                        <label class="form-check-label rounded-circle custom-radio"
                                            for="yardRadio">Absensi Harian</label>
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
                                <button type="button" class="btn " style="margin-left:10px;">...</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                              <label for="TglMulai" class="aligned-text">Tanggal:</label>
                            </div>
                            <div class="form-group col-md-4">
                              <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="max-width: 200px;">

                              <button type="button" class="btn  " style="margin-left:10px;">Tampilkan</button>
                              <button type="button" class="btn btn-dark " style="margin-left:10px;">Keluar</button>
                            </div>


                        </div>










                    </div>

                    <div class="card" style=" margin:10px ">
                        <div class="card-header" style="">Pdf Viewer</div>
                        <br>
                        <br>
                        <br>
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
