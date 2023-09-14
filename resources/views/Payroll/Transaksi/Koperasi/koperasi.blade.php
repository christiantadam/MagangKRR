@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Transaksi/koperasi.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">TRANSFER DATA KOPERASI KARYAWAN PERPANJANGAN KONTRAK</div>

                    <div class="card-body" style=" margin:10px;">
                        <div class="row">
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <u><strong>Data&nbsp;Koperasi&nbsp;Lama</strong></u>
                            </div>
                        </div>
                        <div class="row" style="">
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <span class="aligned-text">Id Div:</span>
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
                                <button type="button" class="btn" style="margin-left: 10px; " id="divisiButton"
                                    >...</button>


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
                                <button type="button" class="btn" style="margin-left: 10px; " id="pegawaiButton"
                                    >...</button>


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
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <span class="aligned-text">Nama :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:450px;">
                                <input type="text" class="form-control" name="Nama_PegawaiLama" id="Nama_PegawaiLama"
                                    placeholder="" required>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <span class="aligned-text"> No Koperasi:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:450px;">
                                <input type="text" class="form-control" name="NomorKoperasiLama"
                                    id="NomorKoperasiLama" placeholder="" required>

                            </div>
                        </div>




                    </div>


                    <div class="card-body" style=" margin:10px;">
                        <div class="row">
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <u><strong>Data&nbsp;Koperasi&nbsp;Baru</strong></u>
                            </div>
                        </div>
                        <div class="row" style="">
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <span class="aligned-text">Id Div:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_DivisiBaru" readonly
                                    style="resize: none; height: 40px; width: 100px;" disabled>
                                <input class="form-control ml-3" type="text" id="Nama_DivisiBaru" readonly
                                    style="resize: none; height: 40px; width: 263px;" disabled>
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                        style="resize: none; height: 40px; max-width: 250px;">
                                        <option value=""></option>
                                        @foreach ($divisi as $data)
                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                        @endforeach
                                    </select> --}}
                                <button type="button" class="btn" style="margin-left: 10px; " id="divisiButtonBaru"
                                    >...</button>


                                <div class="modal fade" id="modalDivisiBaru" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true" style="">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content" style="">
                                            <div class="modal-header" style="justify-content: center;">

                                                <div class="row" style=";">
                                                    <div class="table-responsive" style="margin:30px;">
                                                        <table id="tabel_DivisiBaru" class="table table-bordered">
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
                                <input class="form-control" type="text" id="Id_PegawaiBaru" readonly
                                    style="resize: none; height: 40px; width: 100px;"disabled>
                                <input class="form-control ml-3" type="text" id="Nama_PegawaiBaru" readonly
                                    style="resize: none; height: 40px; width: 263px;"disabled>
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                        style="resize: none; height: 40px; max-width: 250px;">
                                        <option value=""></option>
                                        @foreach ($divisi as $data)
                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                        @endforeach
                                    </select> --}}
                                <button type="button" class="btn" style="margin-left: 10px; " id="pegawaiButtonBaru"
                                    >...</button>


                                <div class="modal fade" id="modalPegawaiBaru" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true" style="">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content" style="">
                                            <div class="modal-header" style="justify-content: center;">

                                                <div class="row" style=";">
                                                    <div class="table-responsive" style="margin:30px;">
                                                        <table id="tabel_PegawaiBaru" class="table table-bordered">
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
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <span class="aligned-text">Nama :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:450px;">
                                <input type="text" class="form-control" name="Nama_PegawaiBaru2"
                                    id="Nama_PegawaiBaru2" placeholder="" required>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <span class="aligned-text"> No Koperasi:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:450px;">
                                <input type="text" class="form-control" name="NomorKoperasiBaru"
                                    id="NomorKoperasiBaru" placeholder="" required>

                            </div>
                        </div>




                    </div>



                    <div id="form-container"></div>
                    <div class="row" style="padding-top: 20px; margin:20px;">
                        <div class="col-6" style="text-align: left; ">



                        </div>
                        <div class="col-6" style="text-align: right; ">
                            <button type="button" class="btn " style="margin-left: 10px" id="prosesButton">Proses</button>
                            <button type="button" class="btn " style="margin-left: 10px">Keluar</button>

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
