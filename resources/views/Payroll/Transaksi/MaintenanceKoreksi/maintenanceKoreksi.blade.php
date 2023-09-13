@extends('layouts.appPayroll')
@section('content')
<script type="text/javascript" src="{{ asset('js/Transaksi/maintenanceKoreksi.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">Maintenance Koreksi</div>
                    <div class="card-body" style="">
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <div class="col">

                                <div class="form-check form-check-inline seperate">
                                    <input class="form-check-input custom-radio ml-3" type="radio" name="unit"
                                     id="radio1"    checked>
                                    <label class="form-check-label rounded-circle custom-radio"
                                        for="kgRadio">Harian</label>
                                </div>
                                <div class="form-check form-check-inline" style="margin-left:25px;">
                                    <input class="form-check-input custom-radio" type="radio" name="unit"
                                       id="radio2">
                                    <label class="form-check-label rounded-circle custom-radio"
                                        for="yardRadio">Staff</label>
                                </div>

                            </div>
                        </div>






                    </div>










                    <div class="card-body" style="border:1px solid black; margin:10px;">
                        <div class="row">
                            <div class="form-group col-md-1 d-flex justify-content-end">
                                <label for="TglKoreksi" class="aligned-text">Tanggal:</label>
                            </div>
                            <div class="form-group col-md-4">
                                <input class="form-control" type="date" id="TglKoreksi" name="TglKoreksi"
                                     required
                                    style="max-width: 200px;" disabled>


                            </div>

                        </div>
                        <div class="row" style="">
                            <div class="form-group col-md-1 d-flex justify-content-end">
                                <span class="aligned-text">Divisi:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Divisi" readonly
                                    style="resize: none; height: 40px; width: 150px;" disabled>
                                <input class="form-control ml-3" type="text" id="Nama_Divisi" readonly
                                    style="resize: none; height: 40px; width: 313px;" disabled>
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                        style="resize: none; height: 40px; max-width: 250px;">
                                        <option value=""></option>
                                        @foreach ($divisi as $data)
                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                        @endforeach
                                    </select> --}}
                                <button type="button" class="btn" style="margin-left: 10px; "
                                    id="divisiButton" disabled>...</button>


                                <div class="modal fade" id="modalDivisi" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true" style="">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content" style="">
                                            <div class="modal-header" style="justify-content: center;">

                                                <div class="row" style=";">
                                                    <div class="table-responsive" style="margin:30px;">
                                                        <table id="tabel_Divisi" class="table table-bordered">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th scope="col">Id Divisi</th>
                                                                    <th scope="col">Nama Divisi</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                {{-- @foreach ($dataDivisi as $data)
                                                                        <tr>

                                                                            <td>{{ $data->kd_Pegawai }}</td>
                                                                            <td>{{ $data->nama_peg }}</td>
                                                                        </tr>
                                                                    @endforeach --}}

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="">
                            <div class="form-group col-md-1 d-flex justify-content-end">
                                <span class="aligned-text">Kd Pegawai:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Pegawai" readonly
                                    style="resize: none; height: 40px; width: 150px;"disabled>
                                <input class="form-control ml-3" type="text" id="Nama_Pegawai" readonly
                                    style="resize: none; height: 40px; width: 313px;"disabled>
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                        style="resize: none; height: 40px; max-width: 250px;">
                                        <option value=""></option>
                                        @foreach ($divisi as $data)
                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                        @endforeach
                                    </select> --}}
                                <button type="button" class="btn" style="margin-left: 10px; "
                                    id="pegawaiButton" disabled>...</button>


                                <div class="modal fade" id="modalPegawai" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true" style="">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content" style="">
                                            <div class="modal-header" style="justify-content: center;">

                                                <div class="row" style=";">
                                                    <div class="table-responsive" style="margin:30px;">
                                                        <table id="tabel_Pegawai" class="table table-bordered">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th scope="col">Id Pegawai</th>
                                                                    <th scope="col">Nama Pegawai</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                {{-- @foreach ($dataPegawai as $data)
                                                                        <tr>

                                                                            <td>{{ $data->kd_Pegawai }}</td>
                                                                            <td>{{ $data->nama_peg }}</td>
                                                                        </tr>
                                                                    @endforeach --}}

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-1 d-flex justify-content-end">
                                <span class="aligned-text">Nilai :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:150px;">
                                <input type="number" class="form-control" name="Nilai"
                                    id="Nilai" placeholder="" required disabled>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-1 d-flex justify-content-end">
                                <span class="aligned-text"> Keterangan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:450px;">
                                <textarea class="input" name="keterangan" id="keterangan" cols="60" rows="3" placeholder="Keterangan" disabled></textarea>

                            </div>
                        </div>




                    </div>



                    <div id="form-container"></div>
                    <div class="row" style="padding-top: 20px; margin:20px;">
                        <div class="col-6" style="text-align: left; ">
                            <button type="button" class="btn " style="margin-left: 10px;width:80px;" id="isiButton">Isi</button>
                            <button type="button" class="btn " style="margin-left: 10px;width:80px;" id="koreksiButton">Koreksi</button>
                            <button type="button" class="btn " style="margin-left: 10px;width:80px;" id="simpanButton" hidden>SIMPAN</button>
                            <button type="button" class="btn " style="margin-left: 10px;width:80px;" id="batalButton" hidden>BATAL</button>

                        </div>
                        <div class="col-6" style="text-align: right; ">
                            <button type="button" class="btn " style="margin-left: 10px;width:80px;" id="keluarButton">Keluar</button>

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
