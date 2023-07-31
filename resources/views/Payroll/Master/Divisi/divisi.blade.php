@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Master/Divisi.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">PEKERJA</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="row" style="margin-left:-220px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Divisi:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Div" readonly
                                    style="resize: none; height: 40px; max-width: 100px;">
                                <input class="form-control" type="text" id="Nama_Div" readonly
                                    style="resize: none; height: 40px; max-width: 450px;">
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                    style="resize: none; height: 40px; max-width: 250px;">
                                    <option value=""></option>
                                    @foreach ($divisi as $data)
                                        <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                    @endforeach
                                </select> --}}
                                <button type="button" class="btn" style="margin-left: 10px; " id="divisiButton"
                                    data-toggle="modal" data-target="#modalKdPeg">...</button>

                                <div class="modal fade" id="modalKdPeg" role="dialog" arialabelledby="modalLabel"
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
                        <div class="row" style="margin-left:-220px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Posisi:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Kd_Posisi" readonly
                                    style="resize: none; height: 40px; max-width: 100px;">
                                <input class="form-control" type="text" id="Nama_Posisi" readonly
                                    style="resize: none; height: 40px; max-width: 450px;">
                                <button type="button" class="btn" style="margin-left: 10px;" data-toggle="modal"
                                    data-target="#modalPeg">...</button>
                                <div class="modal fade" id="modalPeg" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true" style="">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content" style="">
                                            <div class="modal-header" style="justify-content: center;">

                                                <div class="row" style=";">
                                                    <div class="table-responsive" style="margin:30px;">
                                                        <table id="table_Peg_Lama" class="table table-bordered">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th scope="col">Nama Posisi</th>
                                                                    <th scope="col">Kode Posisi</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($dataPosisi as $data)
                                                                    <tr>

                                                                        <td>{{ $data->Nm_Posisi }}</td>
                                                                        <td>{{ $data->KD_Posisi }}</td>



                                                                    </tr>
                                                                @endforeach
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
                        <div class="row" style="margin-left:-220px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Manager:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Nama_Manager" readonly
                                    style="resize: none; height: 40px; max-width: 100px;">
                                <input class="form-control" type="text" id="KD_Manager" readonly
                                    style="resize: none; height: 40px; max-width: 450px;">
                                <button type="button" class="btn" style="margin-left: 10px;" data-toggle="modal"
                                    data-target="#modalManager">...</button>
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
                                                                    <th scope="col">Nama Manager</th>
                                                                    <th scope="col">Kd Manager</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($dataManager as $data)
                                                                    <tr>

                                                                        <td>{{ $data->nama_peg }}</td>
                                                                        <td>{{ $data->kd_Pegawai }}</td>



                                                                    </tr>
                                                                @endforeach
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


                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabelDivisi">
                                <thead>
                                    <tr>
                                        <th scope="col">Posisi</th>
                                        <th scope="col">Nama Divisi</th>
                                        <th scope="col">Id Div</th>
                                        <th scope="col">Manager</th>
                                        <th scope="col">Jenis(H/S/B/L)</th>
                                        <th scope="col">Status(K/T)</th>
                                        <th scope="col">JmlJam</th>
                                        <th scope="col">Aturan</th>
                                        <th scope="col">IdGrupdiv</th>

                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($dataDivisi as $data)
                                        <tr>

                                            <td>{{ $data->Nm_Posisi }}</td>
                                            <td>{{ $data->Nama_Div }}</td>
                                            <td>{{ $data->Id_Div }}</td>
                                            <td>{{ $data->Nama_Peg }}</td>
                                            <td>{{ $data->No_Kabag }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td>{{ $data->JmlJam }}</td>
                                            <td>{{ $data->Aturan }}</td>
                                            <td>{{ $data->Id_Group_Div }}</td>



                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <div style="text-align: right; margin-top: 20px;">
                            <button type="button" class="btn btn-secondary">isi</button>
                            <button type="submit" class="btn btn-primary">Koreksi</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                </div>
                <br>

            </div>
        </div>
    </div>
@endsection
