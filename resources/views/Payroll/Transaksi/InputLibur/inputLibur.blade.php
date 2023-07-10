@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">Ubah Agenda</div>
                    <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0"
                            style="flex: 1; margin-left: 10px; display: flex; ">
                            <div style="display: flex; align-items: center;">
                                <label for="TglLapor" style="margin-right: 10px;">Tanggal</label>
                                <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                    value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required
                                    style="max-width: 200px;">
                                <label for="TglLapor" style="margin-right: 10px;padding-left:10px">s/d</label>
                                <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                    value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required
                                    style="max-width: 200px;">
                            </div>
                        </div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left: 10px;  ">
                            <div style="flex: 1; margin-right: 10px; margin-top: 5px;">
                                <input type="checkbox">
                                <label for="staff">Centang untuk koreksi absen M di hari libur</label>
                            </div>
                            <div class="card-body-container"
                                style="display: flex; align-items:center;place-content: center; ">
                                <div class="time-form">
                                    <div>
                                        <label for="pulang">Masuk :</label>
                                        <input type="time" id="masukLembur" name="masukLembur">
                                    </div>
                                </div>
                                <div class="time-form">
                                    <div>
                                        <label for="pulang">Keluar :</label>
                                        <input type="time" id="masukLembur" name="masukLembur">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>





                    <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                        <div class="card-body">
                            <div style="flex: 1; margin-right: 10px; margin-top: 5px;">
                                <input type="checkbox">
                                <label for="staff">Perorangan</label>
                            </div>
                            <div class="card-body"
                                style="flex: 1; margin-right: 10px; border: 1px solid #000000; border-radius: 3px; text-align: middle;">

                                <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10;">

                                    <br>

                                    <div style="display: flex; align-items: center; margin-left:35px; ">
                                        <label style="margin-bottom: 5px; margin-right: 5px;">Divisi</label>
                                        <select class="form-control" id="Shift" name="Shift"
                                            style="resize: none;height: 40px; max-width:150px;margin-left:55px;">
                                            <option value="">PISAT1</option>
                                            <option value="">PISAT2</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div style="display: flex; align-items: center; margin-left:35px; ">
                                        <label style="margin-bottom: 5px; margin-right: 5px;">Kd Pegawai</label>
                                        <select class="form-control" id="Shift" name="Shift"
                                            style="resize: none;height: 40px; max-width:150px;margin-left:15px;">
                                            <option value="">PISAT1</option>
                                            <option value="">PISAT2</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div style="display: flex; flex-direction: row; justify-content: left;margin-top:10px;">


                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="" id="NIK" name="NIK" style="resize: none;height: 35px; margin-left:20px; width:400px;"
                                                required></textarea>
                                        </div>

                                    </div>


                                    <div style="text-align: right; margin-top: 100px; align-items:center;">
                                        <button type="button" class="btn btn-primary">Proses</button>

                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div style="flex: 1; margin-right: 10px; margin-top: 5px;">
                                <input type="checkbox">
                                <label for="staff">Perdivisi</label>
                            </div>
                            <div class="card-body"
                                style="flex: 1; margin-right: 10px; border: 1px solid #000000; border-radius: 3px; text-align: middle;">

                                <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10;">

                                    <br>

                                    <div style="display: flex; align-items: center; margin-left:35px; ">
                                        <label style="margin-bottom: 5px; margin-right: 5px;">Divisi</label>
                                        <select class="form-control" id="Shift" name="Shift"
                                            style="resize: none;height: 40px; max-width:150px;margin-left:55px;">
                                            <option value="">PISAT1</option>
                                            <option value="">PISAT2</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div style="display: flex; align-items: center; margin-left:35px; ">
                                        <label style="margin-bottom: 5px; margin-right: 5px;">Kd Pegawai</label>
                                        <select class="form-control" id="Shift" name="Shift"
                                            style="resize: none;height: 40px; max-width:150px;margin-left:15px;">
                                            <option value="">PISAT1</option>
                                            <option value="">PISAT2</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div
                                        style="display: flex; flex-direction: row; justify-content: left;margin-top:10px;">


                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="" id="NIK" name="NIK"
                                                style="resize: none;height: 35px; margin-left:20px; width:400px;" required></textarea>
                                        </div>

                                    </div>


                                    <div style="text-align: right; margin-top: 100px; align-items:center;">
                                        <button type="button" class="btn btn-primary">Proses</button>

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
