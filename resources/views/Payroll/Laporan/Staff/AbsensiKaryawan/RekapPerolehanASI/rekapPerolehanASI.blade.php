@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">Daftar Perolehan ASI - Staff Dalam 1 Periode</div>





                    <div class="card-body-container"
                        style="display: flex; flex-wrap: wrap; margin-left:55px;  ">
                        <div class="card-body" style="flex: 0 0 20%; max-width: 20%; ; margin-top:23px;">
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <label for="TglMulai" class="aligned-text" style="font-size:0.7rem;font-weight:bold;"></label>
                                  </div>
                                  <div class="form-group col-md-4 justify-content-end" >
                                    <label for="TglMulai" class="aligned-text" style=""> </label>
                                  </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <label for="TglMulai" class="aligned-text" style="font-size:0.7rem;font-weight:bold;">Tanggal_Awal:</label>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="width: 200px;">
                                  </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <label for="TglMulai" class="aligned-text" style="font-size:0.7rem;font-weight:bold;" >Tanggal_Akhir:</label>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="width: 200px;">
                                  </div>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 0 0 20%; max-width: 20%; ">
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <label for="TglMulai" class="aligned-text" style="font-size:0.7rem;font-weight:bold;"></label>
                                  </div>
                                  <div class="form-group col-md-4 justify-content-end" style="justify-content: center;" >
                                    <label for="TglMulai" class="" style="font-weight:bold;">Periode I</label>
                                  </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <label for="TglMulai" class="aligned-text" style="font-size:0.7rem;font-weight:bold;">Tanggal_A:</label>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="width: 200px;">
                                  </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <label for="TglMulai" class="aligned-text" style="font-size:0.7rem;font-weight:bold;" >Tanggal_B:</label>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="width: 200px;">
                                  </div>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 0 0 20%; max-width: 20%;  ">
                            <div class="row">

                                  <div class="form-group col-md-4 justify-content-end" style="justify-content: center;" >
                                    <label for="TglMulai" class="" style="font-weight:bold;">Periode II</label>
                                  </div>
                            </div>
                            <div class="row">

                                  <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="width: 200px;">
                                  </div>
                            </div>
                            <div class="row">

                                  <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="width: 200px;">
                                  </div>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 0 0 20%; max-width: 20%; margin-left:-80px;  ">
                            <div class="row">

                                  <div class="form-group col-md-4 justify-content-end" style="justify-content: center;" >
                                    <label for="TglMulai" class="" style="font-weight:bold;">Periode III</label>
                                  </div>
                            </div>
                            <div class="row">

                                  <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="width: 200px;">
                                  </div>
                            </div>
                            <div class="row">

                                  <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="width: 200px;">
                                  </div>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 0 0 20%; max-width: 20%;margin-left:-80px;  ">
                            <div class="row">

                                  <div class="form-group col-md-4 justify-content-end" style="justify-content: center;" >
                                    <label for="TglMulai" class="" style="font-weight:bold;">Periode IV</label>
                                  </div>
                            </div>
                            <div class="row">

                                  <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="width: 200px;">
                                  </div>
                            </div>
                            <div class="row">

                                  <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="width: 200px;">
                                  </div>
                            </div>
                        </div>

                    </div>
                    <div class="row" style="margin-bottom:10px; margin-left:50px; ">
                        <div class="col-6" style="text-align: left; ">
                            <button type="button" class="btn " style="margin-left: 10px;width:100px;">Hitung</button>



                        </div>
                        <div class="col-6" style="text-align: left; ">
                            <button type="button" class="btn " style="margin-left: 10px;width:100px;">Proses</button>
                            <button type="button" class="btn " style="margin-left: 10px;width:100px;">Tampil</button>

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
