@extends('layouts.appPayroll')
@section('content')
<script type="text/javascript" src="{{ asset('js/Transaksi/Skorsing/Permohonan.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="width:1200px;">
                    <div class="card-header" style="">Maintenance Skorsing</div>










                    <div class="card-body" style="border: 1px solid black; margin: 10px;">
                        <div class="card-body" >

                            <div class="row" style="">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Divisi:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <input class="form-control" type="text" id="Id_Divisi" readonly
                                        style="resize: none; height: 40px; width: 100px;" disabled>
                                    <input class="form-control ml-3" type="text" id="Nama_Divisi" readonly
                                        style="resize: none; height: 40px; width: 263px;" disabled>
                                    {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                            style="resize: none; height: 40px; max-width: 250px;">
                                            <option value=""></option>
                                            @foreach ($divisi as $data)
                                                <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                            @endforeach
                                        </select> --}}
                                    <button type="button" class="btn" style="margin-left: 10px; "
                                        id="divisiButton">...</button>


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
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Kd Pegawai:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <input class="form-control" type="text" id="Id_Pegawai" readonly
                                        style="resize: none; height: 40px; width: 100px;"disabled>
                                    <input class="form-control ml-3" type="text" id="Nama_Pegawai" readonly
                                        style="resize: none; height: 40px; width: 263px;"disabled>
                                    {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                            style="resize: none; height: 40px; max-width: 250px;">
                                            <option value=""></option>
                                            @foreach ($divisi as $data)
                                                <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                            @endforeach
                                        </select> --}}
                                    <button type="button" class="btn" style="margin-left: 10px; "
                                        id="pegawaiButton">...</button>


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
                            <div class="row" style="margin-left:;">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Kode Skors:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:180px;">
                                    <input type="text" class="form-control" name=""
                                        id="kode_Skors" placeholder="" required>

                                </div>
                            </div>
                            <div class="row" style="margin-left:;">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text"> Keterangan:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:450px;">
                                    <textarea class="input" name="keterangan" id="keterangan" cols="60" rows="3" placeholder="Keterangan"></textarea>

                                </div>
                            </div>
                            <div class="row" style="margin-left:;">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                  <label for="TglMulai" class="aligned-text">Tanggal:</label>
                                </div>
                                <div class="form-group col-md-4">
                                  <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="max-width: 200px;">
                                  <span class="aligned-text" style="margin-left: 15px;">s/d</span>
                                  <input class="form-control" type="date" id="TglSelesai" name="TglSelesai" value="{{ old('TglSelesai', now()->format('Y-m-d')) }}" required style="max-width: 200px;">

                                </div>


                            </div>







                        </div>

                    </div>





                    <div id="form-container"></div>
                    <div class="row" style="padding-top: 20px; margin:20px;">
                        <div class="col-6" style="text-align: left; ">
                            <button type="button" class="btn btn-primary" style="margin-left: 10px;width:100px;" id="isiButton">Isi</button>
                            <button type="button" class="btn btn-primary" style="margin-left: 10px;width:100px;" id="simpanButton" hidden>Simpan</button>
                            <button type="button" class="btn btn-dark" style="margin-left: 10px;width:100px;" id="batalButton" disabled>Batal</button>

                        </div>
                        <div class="col-6" style="text-align: right; ">


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
