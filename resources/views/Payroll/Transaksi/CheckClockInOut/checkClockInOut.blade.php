@extends('layouts.appPayroll')
@section('content')
<script type="text/javascript" src="{{ asset('js/Transaksi/checkClockInOut.js') }}"></script>
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="width:1000px; ">
                    <div class="card-header" style="">Check Clock Masuk Keluar</div>









                        <br>
                        <div class="row" style="">
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <span class="aligned-text">Jenis Karyawan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <div class="col">

                                    <div class="form-check form-check-inline seperate">
                                        <input class="form-check-input custom-radio ml-3" type="radio" name="unit"
                                            id="radio1" checked>
                                        <label class="form-check-label rounded-circle custom-radio"
                                            for="kgRadio">Harian</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="margin-left:10px;">
                                        <input class="form-check-input custom-radio" type="radio" name="unit"
                                            id="radio2">
                                        <label class="form-check-label rounded-circle custom-radio"
                                            for="yardRadio">Staff</label>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="row" style="">
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <span class="aligned-text">Manager:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Manager" readonly
                                    style="resize: none; height: 40px; width: 150px;">
                                <input class="form-control ml-3" type="text" id="Nama_Manager" readonly
                                    style="resize: none; height: 40px; width: 313px;">
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                    style="resize: none; height: 40px; max-width: 250px;">
                                    <option value=""></option>
                                    @foreach ($divisi as $data)
                                        <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                    @endforeach
                                </select> --}}
                                <button type="button" class="btn" style="margin-left: 10px; " id="managerButton"
                                    onclick="showModalManager()">...</button>


                                <div class="modal fade" id="modalManager" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true" style="">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content" style="">
                                            <div class="modal-header" style="justify-content: center;">

                                                <div class="row" style=";">
                                                    <div class="table-responsive" style="margin:30px;">
                                                        <table id="tabel_Manager" class="table table-bordered">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th scope="col">Id Manager</th>
                                                                    <th scope="col">Nama Manager</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($dataManager as $data)
                                                                    <tr>

                                                                        <td>{{ $data->kd_Pegawai }}</td>
                                                                        <td>{{ $data->nama_peg }}</td>
                                                                    </tr>
                                                                @endforeach
                                                                {{-- @foreach ($peringatan as $item)
                                                                    <tr>
                                                                        <td><input type="checkbox" style="margin-right:5px;"
                                                                                data-id="{{ $item->kd_pegawai }}_{{ $item->peringatan_ke }}_{{ $item->bulan }}_{{ $item->tahun }}">{{ $item->peringatan_ke }}
                                                                                data-id="{{ $item->kd_pegawai }}_{{ $item->peringatan_ke }}_{{ $item->TglBerlaku }}">{{ $item->peringatan_ke }}
                                                                        </td>
                                                                        <td>{{ $item->Nama_Div }}</td>
                                                                        <td>{{ $item->kd_pegawai }}</td>
                                                                        <td>{{ $item->Nama_Peg }}</td>
                                                                        <td>{{ $item->TglBerlaku ?? 'Null' }}</td>
                                                                        <td>{{ $item->TglAkhir ?? 'Null' }}</td>
                                                                        <td>{{ $item->uraian }}</td>
                                                                        <td>{{ $item->bulan }}</td>
                                                                        <td>{{ $item->tahun }}</td>
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
                                <span class="aligned-text">Divisi:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Divisi" readonly
                                    style="resize: none; height: 40px; width: 150px;">
                                <input class="form-control ml-3" type="text" id="Nama_Divisi" readonly
                                    style="resize: none; height: 40px; width: 313px;">
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                    style="resize: none; height: 40px; max-width: 250px;">
                                    <option value=""></option>
                                    @foreach ($divisi as $data)
                                        <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                    @endforeach
                                </select> --}}
                                <button type="button" class="btn" style="margin-left: 10px; " id="divisiButton"
                                    onclick="showModalDivisi()">...</button>


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

                                                                {{-- @foreach ($dataManager as $data)
                                                                    <tr>

                                                                        <td>{{ $data->kd_Pegawai }}</td>
                                                                        <td>{{ $data->nama_peg }}</td>
                                                                    </tr>
                                                                @endforeach --}}
                                                                {{-- @foreach ($peringatan as $item)
                                                                    <tr>
                                                                        <td><input type="checkbox" style="margin-right:5px;"
                                                                                data-id="{{ $item->kd_pegawai }}_{{ $item->peringatan_ke }}_{{ $item->bulan }}_{{ $item->tahun }}">{{ $item->peringatan_ke }}
                                                                                data-id="{{ $item->kd_pegawai }}_{{ $item->peringatan_ke }}_{{ $item->TglBerlaku }}">{{ $item->peringatan_ke }}
                                                                        </td>
                                                                        <td>{{ $item->Nama_Div }}</td>
                                                                        <td>{{ $item->kd_pegawai }}</td>
                                                                        <td>{{ $item->Nama_Peg }}</td>
                                                                        <td>{{ $item->TglBerlaku ?? 'Null' }}</td>
                                                                        <td>{{ $item->TglAkhir ?? 'Null' }}</td>
                                                                        <td>{{ $item->uraian }}</td>
                                                                        <td>{{ $item->bulan }}</td>
                                                                        <td>{{ $item->tahun }}</td>
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
                                <span class="aligned-text">Pegawai:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Pegawai" readonly
                                    style="resize: none; height: 40px; width: 150px;">
                                <input class="form-control ml-3" type="text" id="Nama_Pegawai" readonly
                                    style="resize: none; height: 40px; width: 313px;">
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                    style="resize: none; height: 40px; max-width: 250px;">
                                    <option value=""></option>
                                    @foreach ($divisi as $data)
                                        <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                    @endforeach
                                </select> --}}
                                <button type="button" class="btn" style="margin-left: 10px; " id="managerButton"
                                    onclick="showModalPegawai()">...</button>


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

                                                                {{-- @foreach ($dataManager as $data)
                                                                    <tr>

                                                                        <td>{{ $data->kd_Pegawai }}</td>
                                                                        <td>{{ $data->nama_peg }}</td>
                                                                    </tr>
                                                                @endforeach --}}
                                                                {{-- @foreach ($peringatan as $item)
                                                                    <tr>
                                                                        <td><input type="checkbox" style="margin-right:5px;"
                                                                                data-id="{{ $item->kd_pegawai }}_{{ $item->peringatan_ke }}_{{ $item->bulan }}_{{ $item->tahun }}">{{ $item->peringatan_ke }}
                                                                                data-id="{{ $item->kd_pegawai }}_{{ $item->peringatan_ke }}_{{ $item->TglBerlaku }}">{{ $item->peringatan_ke }}
                                                                        </td>
                                                                        <td>{{ $item->Nama_Div }}</td>
                                                                        <td>{{ $item->kd_pegawai }}</td>
                                                                        <td>{{ $item->Nama_Peg }}</td>
                                                                        <td>{{ $item->TglBerlaku ?? 'Null' }}</td>
                                                                        <td>{{ $item->TglAkhir ?? 'Null' }}</td>
                                                                        <td>{{ $item->uraian }}</td>
                                                                        <td>{{ $item->bulan }}</td>
                                                                        <td>{{ $item->tahun }}</td>
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
                              <label for="TglMulai" class="aligned-text">Tanggal:</label>
                            </div>
                            <div class="form-group col-md-4">
                              <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="max-width: 200px;">
                              <span class="aligned-text" style="margin-left: 15px;">s/d</span>
                              <input class="form-control" type="date" id="TglSelesai" name="TglSelesai" value="{{ old('TglSelesai', now()->format('Y-m-d')) }}" required style="max-width: 200px;">
                            </div>


                        </div>














                    <div class="card-body-container"
                        style="display: flex; flex-wrap: wrap; border: 1px solid black; margin: 10px;">
                        <div class="card-body" style="flex: 0 0 25%; max-width: 25%;">
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">

                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 0 0 25%; max-width: 25%;">
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">

                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 0 0 25%; max-width: 25%;">
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">

                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 0 0 25%; max-width: 25%;">
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">

                                </div>
                            </div>
                        </div>

                    </div>





                    <div class="row" style="padding-top: 20px; margin:20px;">
                        <div class="col-6" style="text-align: left; ">

                        </div>
                        <div class="col-6" style="text-align: right; ">
                            <button type="button" class="btn btn-primary" style="margin-left: 10px">Cetak</button>
                            <button type="button" class="btn btn-dark" style="margin-left: 10px">Keluar</button>
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
