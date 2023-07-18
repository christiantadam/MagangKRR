@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">FrmLemburPerManager</div>






                    <div class="card-body-container" style="">
                        <br>
                        <div class="row" style="">

                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <div class="col">

                                    <div class="form-check form-check-inline seperate">
                                        <input class="form-check-input custom-radio ml-3" type="radio" name="unit"
                                            value="kg" checked>
                                        <label class="form-check-label rounded-circle custom-radio"
                                            for="kgRadio">Hut Perusahaan</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="margin-left:10px;">
                                        <input class="form-check-input custom-radio" type="radio" name="unit"
                                            value="yard">
                                        <label class="form-check-label rounded-circle custom-radio"
                                            for="yardRadio">Simpan Pinjam Koperasi</label>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-left:-220px;">
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
                        <div class="row" style="margin-left:-220px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Pegawai:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <select class="form-control" id="Shift" name="Shift"
                                    style="resize: none;height: 40px; max-width:250px;">
                                    <option value="">Pegawai 1</option>
                                    <option value="">Pegawai 2</option>
                                </select>
                                <button type="button" class="btn " style="margin-left:10px;">...</button>
                            </div>
                        </div>
                        <div class="row" style="margin-left:-220px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                              <label for="TglMulai" class="aligned-text">No Bukti:</label>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control" id="Shift" name="Shift"
                                style="resize: none;height: 40px; max-width:250px;">
                                <option value="">  </option>
                                <option value=""> </option>
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
