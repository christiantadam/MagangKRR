@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">FrmPembayaran</div>

                    <div class="card-body-container" style="margin-left:-220px;">
                        <br>
                        <div class="row" style="margin-left:-80px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                              <label for="TglMulai" class="aligned-text">Periode:</label>
                            </div>
                            <div class="form-group col-md-4">
                              <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="max-width: 200px;">
                              <span class="aligned-text" style="margin-left: 15px;">s/d</span>
                              <input class="form-control" type="date" id="TglSelesai" name="TglSelesai" value="{{ old('TglSelesai', now()->format('Y-m-d')) }}" required style="max-width: 200px;">
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
