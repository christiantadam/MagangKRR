@extends('layouts.appPayroll')
@section('content')
<title style="font-size: 20px">@yield('title', 'Setting Divisi Harian')</title>
    <script type="text/javascript" src="{{ asset('js/Master/settingHarian.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Setting Divisi Harian</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">


                        <div class="card-body-container" style="display: flex; flex-wrap: wrap; margin: 10px;">
                            <div class="card-body" style="flex: 0 0 50%; max-width: 50%; margin-left:45px;">
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-1 d-flex justify-content-end">
                                        <span class="aligned-text">Divisi:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="Id_Div" readonly
                                            style="resize: none; height: 40px; width: 307px;">
                                        <input class="form-control ml-3" type="text" id="Nama_Div" readonly
                                            style="resize: none; height: 40px; width: 930px;">
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
                                                                <table id="table_Divisi" class="table table-bordered">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th scope="col">Id Divisi</th>
                                                                            <th scope="col">Nama Divisi</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($dataDivisi as $data)
                                                                            <tr>

                                                                                <td>{{ $data->Id_Div }}</td>
                                                                                <td>{{ $data->Nama_Div }}</td>
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
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-1 d-flex justify-content-end">
                                        <span class="aligned-text">Manager:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="Id_Manager" readonly
                                            style="resize: none; height: 40px; width: 307px;">
                                        <input class="form-control ml-3" type="text" id="Nama_Manager" readonly
                                            style="resize: none; height: 40px; width: 930px;">
                                        {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                                        style="resize: none; height: 40px; max-width: 250px;">
                                                        <option value=""></option>
                                                        @foreach ($divisi as $data)
                                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                                        @endforeach
                                                    </select> --}}
                                        <button type="button" class="btn" style="margin-left: 10px; " id="divisiButton"
                                            onclick="showModalManager()">...</button>

                                        <div class="modal fade" id="modalManager" role="dialog" arialabelledby="modalLabel"
                                            area-hidden="true" style="">
                                            <div class="modal-dialog " role="document">
                                                <div class="modal-content" style="">
                                                    <div class="modal-header" style="justify-content: center;">

                                                        <div class="row" style=";">
                                                            <div class="table-responsive" style="margin:30px;">
                                                                <table id="table_Manager" class="table table-bordered">
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
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-1 d-flex justify-content-end">
                                        <span class="aligned-text">Supervisor:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="Id_Supervisor" readonly
                                            style="resize: none; height: 40px; width: 307px;">
                                        <input class="form-control ml-3" type="text" id="Nama_Supervisor" readonly
                                            style="resize: none; height: 40px; width: 930px;">
                                        {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                                        style="resize: none; height: 40px; max-width: 250px;">
                                                        <option value=""></option>
                                                        @foreach ($divisi as $data)
                                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                                        @endforeach
                                                    </select> --}}
                                        <button type="button" class="btn" style="margin-left: 10px; "
                                            id="supervisorButton" onclick="showModalSupervisor()">...</button>

                                        <div class="modal fade" id="modalSupervisor" role="dialog"
                                            arialabelledby="modalLabel" area-hidden="true" style="">
                                            <div class="modal-dialog " role="document">
                                                <div class="modal-content" style="">
                                                    <div class="modal-header" style="justify-content: center;">

                                                        <div class="row" style=";">
                                                            <div class="table-responsive" style="margin:30px;">
                                                                <table id="table_Supervisor" class="table table-bordered">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th scope="col">Id Supervisor</th>
                                                                            <th scope="col">Nama Supervisor</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($dataSupervisor as $data)
                                                                            <tr>

                                                                                <td>{{ $data->Kode }}</td>
                                                                                <td>{{ $data->Nama }}</td>
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
                            </div>
                            <div class="card-body" style="flex: 0 0 50%; max-width: 50%;margin-left:-45px;">
                                <div class="row" style="height:56px">

                                </div>
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-1 d-flex justify-content-end">

                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="Id_Manager_Lama" readonly
                                            style="resize: none; height: 40px; width: 307px;">
                                        <input class="form-control ml-3" type="text" id="Nama_Manager_Lama" readonly
                                            style="resize: none; height: 40px; width: 930px;">
                                        {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                                        style="resize: none; height: 40px; max-width: 250px;">
                                                        <option value=""></option>
                                                        @foreach ($divisi as $data)
                                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                                        @endforeach
                                                    </select> --}}



                                    </div>
                                </div>
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-1 d-flex justify-content-end">

                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="Id_Supervisor_Lama" readonly
                                            style="resize: none; height: 40px; width: 307px;">
                                        <input class="form-control ml-3" type="text" id="Nama_Supervisor_Lama" readonly
                                            style="resize: none; height: 40px; width: 930px;">
                                        {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                                        style="resize: none; height: 40px; max-width: 250px;">
                                                        <option value=""></option>
                                                        @foreach ($divisi as $data)
                                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                                        @endforeach
                                                    </select> --}}



                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>




                    <div id="form-container"></div>
                    <div style="text-align: right; margin-top: 20px;">
                        <button type="submit" class="btn btn-primary" id="Simpan">Simpan</button>
                        <button type="button" class="btn btn-secondary" id="Keluar">Keluar</button>
                    </div>

                </div>
            </div>
            <br>

        </div>
    </div>
    </div>
@endsection
