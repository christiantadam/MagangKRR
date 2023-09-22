@extends('layouts.appPayroll')
@section('content')
<script type="text/javascript" src="{{ asset('js/Transaksi/EstimasiGaji.js') }}"></script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="width:800px;">
                    <div class="card-header" style="">Form Estimasi Gaji</div>










                    <div class="card-body" style="border: 1px solid black; margin: 10px;">
                        <div class="card-body" >
                            <div class="row" style="margin-left:-80px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                  <label for="TglMulai" class="aligned-text">Periode:</label>
                                </div>
                                <div class="form-group col-md-4">
                                  <input class="form-control" type="date" id="TglMulai" name="TglMulai" required style="max-width: 200px;">
                                  <span class="aligned-text" style="margin-left: 15px;">s/d</span>
                                  <input class="form-control" type="date" id="TglSelesai" name="TglSelesai" required style="max-width: 200px;">

                                </div>


                            </div>
                            <div class="row" style="margin-left:20px;">
                                <div class="form-check form-check-inline seperate">
                                    <input class="form-check-input custom-radio ml-3" type="radio" name="unit" value="kg" id="OptAwal">
                                    <label class="form-check-label rounded-circle custom-radio" for="kgRadio">Rabu Pertama dari bulan yang aktif</label>
                                </div>
                            </div>
                            <br>
                            <div class="row" style="margin-left:20px;">
                                <div class="form-check form-check-inline seperate">
                                    <input class="form-check-input custom-radio ml-3" type="radio" name="unit" value="kg" id="OptAkhir">
                                    <label class="form-check-label rounded-circle custom-radio" for="kgRadio">Rabu terakhir dari bulan yang aktif</label>
                                </div>
                            </div>
                            <br>
                            <div class="row" style=" ">
                                <div class="col-6" style="text-align: left; ">
                                    <button type="button" class="btn btn-primary" style="margin-left: 10px;width:100px;" id="resetButton">Reset</button>

                                </div>
                                <div class="col-6" style="text-align: right; ">


                                </div>
                            </div>











                        </div>

                    </div>





                    <div id="form-container"></div>
                    <div class="row" style="margin-bottom:10px; ">
                        <div class="col-6" style="text-align: left; ">
                            <button type="button" class="btn btn-primary" style="margin-left: 10px;width:100px;" id="prosesButton">Proses</button>

                            <button type="button" class="btn btn-dark" style="margin-left: 10px;width:100px;" id="keluarButton">Keluar</button>

                        </div>
                        <div class="col-6" style="text-align: left; ">


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
