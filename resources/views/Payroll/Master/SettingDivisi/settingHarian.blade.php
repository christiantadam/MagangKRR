@extends('layouts.appPayroll')
@section('content')
<script type="text/javascript" src="{{ asset('js/Master/settingHarian.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">PEKERJA</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="permohonan-s-p-container18" id="div_detailSuratPesanan">
                            <div class="permohonan-s-p-container20">
                                <div class="permohonan-s-p-container21">
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
                                            <button type="button" class="btn" style="margin-left: 10px; "
                                                id="divisiButton" data-toggle="modal" data-target="#modalKdPeg">...</button>

                                            <div class="modal fade" id="modalKdPeg" role="dialog"
                                                arialabelledby="modalLabel" area-hidden="true" style="">
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
                                                                            {{-- @foreach ($dataDivisi as $data)
                                                                                <tr>

                                                                                    <td>{{ $data->Id_Div }}</td>
                                                                                    <td>{{ $data->Nama_Div }}</td>
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
                                </div>
                                <div class="permohonan-s-p-container21">
                                    <div class="row" style="margin-left: -50px;">
                                        <div class="form-group col-md-1 d-flex justify-content-end">
                                            <span class="aligned-text">Manager:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input class="form-control" type="text" id="Id_Manager" readonly
                                                style="resize: none; height: 40px; width: 200px;">
                                            <input class="form-control ml-3" type="text" id="Nama_Manager" readonly
                                                style="resize: none; height: 40px; width: 713px;">
                                            {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                                style="resize: none; height: 40px; max-width: 250px;">
                                                <option value=""></option>
                                                @foreach ($divisi as $data)
                                                    <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                                @endforeach
                                            </select> --}}
                                            <button type="button" class="btn" style="margin-left: 10px; "
                                                id="divisiButton" data-toggle="modal" data-target="#modalManager">...</button>

                                            <input class="form-control" type="text" id="Id_Manager" readonly
                                                style="resize: none; height: 40px; width: 200px; margin-left: 100px">
                                            <input class="form-control ml-3" type="text" id="Nama_Manager" readonly
                                                style="resize: none; height: 40px; width: 513px;">

                                            <div class="modal fade" id="modalManager" role="dialog"
                                                arialabelledby="modalLabel" area-hidden="true" style="">
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
                                                                            {{-- @foreach ($dataDivisi as $data)
                                                                                <tr>

                                                                                    <td>{{ $data->Id_Div }}</td>
                                                                                    <td>{{ $data->Nama_Div }}</td>
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
                                </div>

                                <div class="row" style="margin-left: -48px;">
                                    <div class="form-group col-md-1 d-flex justify-content-end">
                                        <span class="aligned-text">Supervisor:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="Id_Superior" readonly
                                            style="resize: none; height: 40px; width: 200px;">
                                        <input class="form-control ml-3" type="text" id="Nama_Superior" readonly
                                            style="resize: none; height: 40px; width: 710px;">
                                        {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                                style="resize: none; height: 40px; max-width: 250px;">
                                                <option value=""></option>
                                                @foreach ($divisi as $data)
                                                    <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                                @endforeach
                                            </select> --}}
                                        <button type="button" class="btn" style="margin-left: 10px; "
                                            id="divisiButton" data-toggle="modal" data-target="#modalSuperior">...</button>

                                        <input class="form-control" type="text" id="Id_Superior" readonly
                                            style="resize: none; height: 40px; width: 200px; margin-left: 100px">
                                        <input class="form-control ml-3" type="text" id="Nama_Superior" readonly
                                            style="resize: none; height: 40px; width: 515px;">

                                        <div class="modal fade" id="modalSuperior" role="dialog"
                                            arialabelledby="modalLabel" area-hidden="true" style="">
                                            <div class="modal-dialog " role="document">
                                                <div class="modal-content" style="">
                                                    <div class="modal-header" style="justify-content: center;">

                                                        <div class="row" style=";">
                                                            <div class="table-responsive" style="margin:30px;">
                                                                <table id="table_Divisi" class="table table-bordered">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th scope="col">Id Superior</th>
                                                                            <th scope="col">Nama Superior</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        {{-- @foreach ($dataDivisi as $data)
                                                                                <tr>

                                                                                    <td>{{ $data->Id_Div }}</td>
                                                                                    <td>{{ $data->Nama_Div }}</td>
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
                            </div>
                        </div>


                        <div style="text-align: right; margin-top: 20px;">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary">Keluar</button>
                        </div>

                    </div>
                </div>
                <br>

            </div>
        </div>
    </div>
@endsection
