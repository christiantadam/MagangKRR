@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">FrmLaporanDivisiPeriode</div>






                    <div class="card-body-container" style="margin-left:-220px;">

<br>
                        <div class="row" style="">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Periode:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="max-width: 200px;">


                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                              <label for="TglMulai" class="aligned-text">Divisi:</label>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control" id="Shift" name="Shift"
                                style="resize: none;height: 40px; max-width:200px;">
                                <option value="">Divisi 1</option>
                                <option value="">Divisi 2</option>
                            </select>

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
