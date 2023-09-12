@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Agenda/koreksiShift.js') }}"></script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card">
                    <div class="card-header">Koreksi Shift</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px">
                        <div class="row" style="margin-left:-150px; ;">
                            <div class="form-group col-md-3 d-flex justify-content-end" s>
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
                        <br>
                        <div class="row" style="margin-left:-150px; ;">
                            <div class="form-group col-md-3 d-flex justify-content-end" s>
                                <span class="aligned-text">Pegawai:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Kd_Pegawai" readonly
                                    style="resize: none; height: 40px; max-width: 100px;">
                                <input class="form-control" type="text" id="Nama_Peg" readonly
                                    style="resize: none; height: 40px; max-width: 450px;">
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                    style="resize: none; height: 40px; max-width: 250px;">
                                    <option value=""></option>
                                    @foreach ($divisi as $data)
                                        <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                    @endforeach
                                </select> --}}
                                <button type="button" class="btn" style="margin-left: 10px; " id="divisiButton"
                                    onclick="showModalPegawai()">...</button>

                                <div class="modal fade" id="modalPegawai" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true" style="">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content" style="">
                                            <div class="modal-header" style="justify-content: center;">

                                                <div class="row" style=";">
                                                    <div class="table-responsive" style="margin:30px;">
                                                        <table id="table_Pegawai" class="table table-bordered">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th scope="col">Kd Pegawai</th>
                                                                    <th scope="col">Nama Pegawai</th>

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
                        <br>

                        <div class="card-body"
                            style="flex: 1; margin-right: 10px; border: 1px solid #000000; border-radius: 3px; text-align: middle;">

                            <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                                <div class="card-body">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <div style="display: flex; align-items: center;">
                                            <label style="margin-right: 10px; margin-left: 15px">Tanggal</label>
                                            <input class="form-control" type="date" id="tanggal1" name="tanggal1"
                                                value="2022-12-25" required>
                                            <label style="margin-right: 10px; margin-left: 15px">S/D</label>
                                            <input class="form-control" type="date" id="tanggal2" name="tanggal2"
                                                value="2022-12-25" required>


                                        </div>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div style="flex: 1; margin-right: 10px;">

                                        <button type="button" class="btn" id="lihatData">Lihat Data</button>

                                    </div>
                                </div>


                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="table_Shift">
                                    <thead>
                                        <tr>
                                            <th scope="col">Kd_Pegawai</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Jam_masuk</th>
                                            <th scope="col">Jam_keluar</th>
                                            <th scope="col">Jml_jam</th>
                                            <th scope="col">awal_jam_istirahat</th>
                                            <th scope="col">akhir_jam_istirahat</th>
                                            <th scope="col">keterangan_absensi</th>

                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">

                                        {{-- @foreach ($employees as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->gender }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->address }}</td>
                                            <td>
                                                <a href="{{ route('employees.edit', $data->id) }}" title="Edit Employee">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                    </button>
                                                </a>
                                                <form method="POST" action="{{route('employees.destroy', $data->id)}}" accept-charset="UTF-8" style="display:inline">
                                                @csrf
                                                @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee" onclick='return confirm("Confirm delete?")'>
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach --}}
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div style="flex: 1; margin-right: 10px; margin-top: 5px; align-items:center;">
                            <input type="checkbox" id="selectAll">
                            <label for="pegawaiSelectAll">Pilih Semua</label>
                        </div>
                        <div class="body-container">
                            <div class="card-body">
                                <div style="display: flex; align-items: center; margin-left:20px; ">
                                    <div class="row" style="margin-left:20px;">
                                        <div class="form-group col-md-1 d-flex justify-content-end">
                                            <span class="aligned-text">Shift:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input class="form-control" type="text" id="Id_Shift_Baru" readonly
                                                style="resize: none; height: 40px; width: 200px;">
                                            {{-- <input class="form-control ml-3" type="text" id="Jam" readonly
                                                style="resize: none; height: 40px; width: 713px;"> --}}
                                            {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                                style="resize: none; height: 40px; max-width: 250px;">
                                                <option value=""></option>
                                                @foreach ($divisi as $data)
                                                    <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                                @endforeach
                                            </select> --}}
                                            <button type="button" class="btn" style="margin-left: 10px; "
                                                id="shiftButton" onclick="showModalShift()">...</button>

                                            <div class="modal fade" id="modalShift" role="dialog"
                                                arialabelledby="modalLabel" area-hidden="true" style="">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content" style="">
                                                        <div class="modal-header" style="justify-content: center;">

                                                            <div class="row" style=";">
                                                                <div class="table-responsive" style="margin:30px;">
                                                                    <table id="table_ShiftNew" class="table table-bordered">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">Id Shift</th>
                                                                                <th scope="col">Jam</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            @foreach ($dataShift as $data)
                                                                                <tr>

                                                                                    <td>{{ $data->Shift }}</td>
                                                                                    <td>{{ $data->Jam }}</td>
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
                                    <div class="row" style="margin-left:50px;">
                                        <div class="form-group col-md-1 d-flex justify-content-end">
                                            <span class="aligned-text">Keterangan:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <select class="form-control" id="Shift" name="Shift"
                                                style="resize: none;height: 40px; max-width:150px">
                                                <option value="B">B</option>
                                                <option value="L">L</option>
                                                <option value="M">M</option>
                                                <option value="X">X</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>
                                <div class="time-form" style="justify-content: left;">

                                    <label for="masuk">Masuk:</label>
                                    <input type="time" id="masuk" name="masuk">
                                    <label for="pulang_istirahat">Istirahat Awal:</label>
                                    <input type="time" id="Istirahat_Awal" name="Istirahat_Awal">
                                </div>
                                <br>
                                <div class="time-form" style="justify-content: left;">

                                    <label for="pulang">Pulang:</label>
                                    <input type="time" id="pulang" name="pulang">
                                    <label for="masuk_istirahat">Istirahat Akhir:</label>
                                    <input type="time" id="Istirahat_Akhir" name="Istirahat_Akhir">
                                </div>

                            </div>
                        </div>



                    </div>

                    <div id="form-container"></div>
                    <div style="text-align: right; margin: 25px;">
                        <button type="button" class="btn btn-primary" id="saveButton">Proses</button>
                        <button type="button" class="btn btn-dark">Keluar</button>
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