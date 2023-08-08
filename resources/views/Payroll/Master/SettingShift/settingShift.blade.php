@extends('layouts.appPayroll')
@section('content')
<script type="text/javascript" src="{{ asset('js/Master/settingShift.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">PEKERJA</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <h5>
                            <div class="panel-body">
                                <form class="form" method="POST" enctype="multipart/form-data"
                                    action="{{ url('/Jurnal') }}">
                                    {{ csrf_field() }}

                                    <div class="modal-body">

                                        <br>
                                        <div style="flex: 1; margin-right: 10px;">
                                            <label>Divisi</label>
                                            <div class="row">
                                                <div class="form-group mt-3 mt-md-0">
                                                    <input class="form-control ml-3" type="text" id="Id_Div" readonly
                                                        style="resize: none; height: 40px; width: 200px;">
                                                    <input class="form-control ml-3" type="text" id="Nama_Div" readonly
                                                        style="resize: none; height: 40px; width: 1200px;">
                                                    {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                                        style="resize: none; height: 40px; max-width: 250px;">
                                                        <option value=""></option>
                                                        @foreach ($divisi as $data)
                                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                                        @endforeach
                                                    </select> --}}
                                                    <button type="button" class="btn" style="margin-left: 10px; "
                                                        id="divisiButton" data-toggle="modal"
                                                        data-target="#modalKdPeg">...</button>

                                                    <div class="modal fade" id="modalKdPeg" role="dialog"
                                                        arialabelledby="modalLabel" area-hidden="true" style="">
                                                        <div class="modal-dialog " role="document">
                                                            <div class="modal-content" style="">
                                                                <div class="modal-header" style="justify-content: center;">

                                                                    <div class="row" style=";">
                                                                        <div class="table-responsive" style="margin:30px;">
                                                                            <table id="table_Divisi"
                                                                                class="table table-bordered">
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
                                            <br>
                                            <div style="flex: 1; margin-right: 10px;">
                                                <label>Kode Pegawai</label>
                                                <div class="row" style="margin-left:;">
                                                    <div class="form-group ml-3 mt-3 mt-md-0">
                                                        <input class="form-control" type="text" id="Kode_Pegawai"
                                                            readonly style="resize: none; height: 40px; width: 200px;">
                                                        <input class="form-control ml-3" type="text" id="Nama_Pegawai"
                                                            readonly style="resize: none; height: 40px; width: 1200px;">
                                                        {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                                            style="resize: none; height: 40px; max-width: 250px;">
                                                            <option value=""></option>
                                                            @foreach ($divisi as $data)
                                                                <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                        <button type="button" class="btn" style="margin-left: 10px; "
                                                            id="divisiButton" data-toggle="modal"
                                                            data-target="#modalPegawai">...</button>

                                                        <div class="modal fade" id="modalPegawai" role="dialog"
                                                            arialabelledby="modalLabel" area-hidden="true" style="">
                                                            <div class="modal-dialog " role="document">
                                                                <div class="modal-content" style="">
                                                                    <div class="modal-header"
                                                                        style="justify-content: center;">

                                                                        <div class="row" style=";">
                                                                            <div class="table-responsive"
                                                                                style="margin:30px;">
                                                                                <table id="table_Pegawai"
                                                                                    class="table table-bordered">
                                                                                    <thead class="thead-dark">
                                                                                        <tr>
                                                                                            <th scope="col">Kode Pegawai
                                                                                            </th>
                                                                                            <th scope="col">Nama Pegawai
                                                                                            </th>

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

                                                <br>
                                                <label>Shift Lama</label>
                                                <div style="flex: 1; width: 1415px">

                                                    <div style="display: flex; flex-wrap: nowrap;">
                                                        <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                                    </div>
                                                </div>
                                                <br>

                                                <div style="flex: 1; margin-right: 10px;">
                                                    <label>Shift Baru</label>
                                                    <div class="row" style="margin-left:;">
                                                        <div class="form-group ml-3 mt-3 mt-md-0">
                                                            <input class="form-control" type="text" id="Id_Shift"
                                                                readonly
                                                                style="resize: none; height: 40px; width: 200px;">
                                                            <input class="form-control ml-3" type="text"
                                                                id="Nama_Shift" readonly
                                                                style="resize: none; height: 40px; width: 1200px;">
                                                            {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                                                style="resize: none; height: 40px; max-width: 250px;">
                                                                <option value=""></option>
                                                                @foreach ($divisi as $data)
                                                                    <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                                                @endforeach
                                                            </select> --}}
                                                            <button type="button" class="btn"
                                                                style="margin-left: 10px; " id="divisiButton"
                                                                data-toggle="modal" data-target="#modalShift">...</button>

                                                            <div class="modal fade" id="modalShift" role="dialog"
                                                                arialabelledby="modalLabel" area-hidden="true"
                                                                style="">
                                                                <div class="modal-dialog " role="document">
                                                                    <div class="modal-content" style="">
                                                                        <div class="modal-header"
                                                                            style="justify-content: center;">

                                                                            <div class="row" style=";">
                                                                                <div class="table-responsive"
                                                                                    style="margin:30px;">
                                                                                    <table id="table_Shift"
                                                                                        class="table table-bordered">
                                                                                        <thead class="thead-dark">
                                                                                            <tr>
                                                                                                <th scope="col">Shift</th>
                                                                                                <th scope="col">Jam</th>

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
                                                    <br>



                                                    <div style="text-align: right; margin-top: 20px;">

                                                        <button type="submit" class="btn btn-primary">Proses</button>
                                                        <button type="button" class="btn btn-secondary">Keluar</button>
                                                    </div>



                                                </div>
                                </form>

                            </div>


                        </h5>
                    </div>
                </div>
                <br>

            </div>
        </div>
    </div>
@endsection
