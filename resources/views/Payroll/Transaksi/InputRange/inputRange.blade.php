@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">Form Range Absen</div>
                    <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">

                        <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left: 10px;  ">


                        </div>
                    </div>





                    <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                        <div class="card-body">
                            <div class="row" style="margin-left:-40px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Divisi:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <select class="form-control" id="Shift" name="Shift"
                                    style="resize: none;height: 40px; max-width:250px;">
                                    <option value="">PISAT1</option>
                                    <option value="">PISAT2</option>
                                </select>
                                </div>
                            </div>
                            <div class="row" style="margin-left:-40px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Kode Pegawai:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <select class="form-control" id="Shift" name="Shift"
                                    style="resize: none;height: 40px; max-width:250px;">
                                    <option value="">PISAT1</option>
                                    <option value="">PISAT2</option>
                                </select>
                                </div>
                            </div>

                            <div class="card-body"
                                style="flex: 1; margin-right: 10px; border: 1px solid #000000; border-radius: 3px; ">

                                <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="margin-left:-25px; ">



                                    <br>
                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                          <label for="TglMulai" class="aligned-text">Tanggal:</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                          <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="max-width: 200px;">
                                        </div>
                                        <div class="form-group col-md-1 d-flex justify-content-center">
                                          <span class="aligned-text">s/d</span>
                                        </div>
                                        <div class="form-group col-md-4">
                                          <input class="form-control" type="date" id="TglSelesai" name="TglSelesai" value="{{ old('TglSelesai', now()->format('Y-m-d')) }}" required style="max-width: 200px;">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Keterangan:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <select class="form-control" id="Shift" name="Shift"
                                            style="resize: none;height: 40px; max-width:150px;">
                                            <option value="">PISAT1</option>
                                            <option value="">PISAT2</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Alasan:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman" placeholder="" required>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Klinik:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <select class="form-control" id="Shift" name="Shift"
                                            style="resize: none;height: 40px; max-width:350px;">
                                            <option value="">PISAT1</option>
                                            <option value="">PISAT2</option>
                                        </select>
                                        </div>
                                    </div>






                                </div>
                            </div>
                            <div class="row" style="padding-top: 20px;">
                                <div class="col-6" style="text-align: left; ">
                                    <button type="button" class="btn btn-info" style="">Tambah</button>
                                    <button type="button" class="btn btn-danger" style="margin-left: 10px">Hapus</button>
                                </div>
                                <div class="col-6" style="text-align: right; ">
                                    <button type="button" class="btn btn-primary" style="margin-left: 10px">Proses</button>
                                    <button type="button" class="btn btn-dark" style="margin-left: 10px">Keluar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="keterangan2" style="margin: 20px;">
                                <div class="card-container"
                        style="display: flex; flex-wrap: nowrap; ">

                                <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: auto; margin-left: 10px; ">
                                    <div style=" flex-wrap: wrap; width:150px;">
                                        <div style="display: flex; ">
                                                <span style="margin-right: 10px;">A : Alpha</span>
                                            </div>
                                            <div style="display: flex; align-items: center;">
                                                <span style="margin-right: 10px;">C : Cuti</span>
                                            </div>
                                            <div style="display: flex; align-items: center;">
                                                <span style="margin-right: 10px;">D : Dispensasi</span>
                                            </div>
                                            <div style="display: flex; align-items: center;">
                                                <span style="margin-right: 10px;">H : Hamil</span>
                                            </div>
                                            <div style="display: flex; align-items: center;">
                                                <span style="margin-right: 10px;">I : Ijin</span>
                                            </div>
                                            <div style="display: flex; align-items: center;">
                                                <span style="margin-right: 10px;">K : Skorsing</span>
                                            </div>
                                            <div style="display: flex; align-items: center;">
                                                <span style="margin-right: 10px;">S : Sakit</span>
                                            </div>
                                            <div style="display: flex; align-items: center;">
                                                <span style="margin-right: 10px;">X : Tidak Dibayar</span>
                                            </div>

                                    </div>

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
