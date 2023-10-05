@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Agenda/tambahAgenda.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="background-color:#FFE0C0; ">
                    <div class="card-header" style="background-color:#F7F7F7;">Tambah Agenda</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0"
                        style="flex: 1; margin-left: 10px; display: flex; justify-content: center; align-items: center;">
                        <div style="display: flex; align-items: center;">
                            <label for="TglLapor" style="margin-right: 10px;">Tanggal</label>
                            <input class="form-control" type="date" id="TglAgenda" name="TglAgenda" required
                                style="max-width: 200px;" value="{{ old('TglAgenda', now()->format('Y-m-d')) }}">
                        </div>
                    </div>




                    <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                        <div class="card-body" style="flex: 0 0 50%; max-width: 50%;">
                            <div style="flex: 1; margin-right: 10px; margin-top: 5px;">

                                <input type="radio" id="opsi1" name="opsiAgenda" value="Perorangan"
                                    style="vertical-align: middle;">
                                <label for="staff">Perorangan</label>

                            </div>
                            <div class="card-body" id="containerPerorangan"
                                style="flex: 1; margin-right: 10px; border: 1px solid #000000; border-radius: 3px; text-align: middle;"
                                hidden>

                                <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10;">
                                    <div class="row" style="margin-left:50px;">
                                        <div class="form-group col-md-1 d-flex justify-content-end">
                                            <span class="aligned-text">Divisi</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <select class="form-control" id="DivisiSelect" name="Divisi"
                                                style="resize: none;height: 40px; max-width:350px">
                                                <option value="">Pilih Divisi</option>
                                                @foreach ($dataDivisi as $option)
                                                    <option value="{{ $option->Id_Div }}">{{ $option->Id_Div }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left:50px;;">
                                        <div class="form-group col-md-1 d-flex justify-content-end">
                                            <span class="aligned-text">Kd&nbsp;pegawai</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input class="form-control" type="text" id="Kd_Peg" readonly
                                                style="resize: none; height: 40px; width: 307px;">

                                            {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                                            style="resize: none; height: 40px; max-width: 250px;">
                                                            <option value=""></option>
                                                            @foreach ($divisi as $data)
                                                                <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                                            @endforeach
                                                        </select> --}}
                                            <button type="button" class="btn" style="margin-left: 10px; "
                                                id="divisiButton" onclick="showModalPegawai()">...</button>
                                            <div class="modal fade" id="modalPegawai" role="dialog"
                                                arialabelledby="modalLabel" area-hidden="true" style="">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content" style="">
                                                        <div class="modal-header" style="justify-content: center;">

                                                            <div class="row" style=";">
                                                                <div class="table-responsive" style="margin:30px;">
                                                                    <table id="tabel_Pegawai" class="table table-bordered">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">Kd Pegawai</th>
                                                                                <th scope="col">Nama Pegawai</th>

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
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" id="tabel_Agenda">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Masuk</th>
                                                    <th scope="col">Pulang</th>
                                                    <th scope="col">awal_istirahat</th>
                                                    <th scope="col">akhir_istirahat</th>
                                                    <th scope="col">Keterangan</th>
                                                    <th scope="col">Id_Agenda</th>
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

                                    <div style="text-align: right; margin-top: 100px;">
                                        <button type="button" class="btn btn-primary">Pilih Semua</button>
                                        <button type="button" class="btn btn-info">Generate Perorangan</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div style="flex: 1; margin-right: 10px; margin-top: 5px;">
                                <input type="radio" id="opsi2" name="opsiAgenda" value="Divisi"
                                    style="vertical-align: middle;">
                                <label for="staff">Divisi</label>
                            </div>
                            <div class="card-body" id="containerDivisi"
                                style="flex: 1; margin-right: 10px; border: 1px solid #000000; border-radius: 3px;" hidden>
                                <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10;">

                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="tabel_Divisi">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Id Divisi</th>
                                                    <th scope="col">Nama Divisi</th>

                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                                @foreach ($dataDivisi as $data)
                                                    <tr>

                                                        <td>{{ $data->Id_Div }}</td>
                                                        <td>{{ $data->Nama_Div }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>

                                        </table>
                                    </div>

                                    <div style="text-align: right; margin-top: 100px;">
                                        <button type="button" class="btn btn-primary" id="buttonDivisiSelectAll">Pilih Semua</button>
                                        <button type="button" class="btn btn-info" id="buttonInsert">Insert Lembur</button>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>
                    <div id="form-container"></div>
                    <div class="card-container"
                        style="display: flex; flex-wrap: nowrap;border: 1px solid #000000; border-radius: 3px; background-color:#FFC080;">
                        <div class="card-body" style="flex: 1; margin-right: 10px;margin-left: 10px; ">
                            <div class="time-form">
                                <div>
                                    <label for="pulang">Masuk Lembur:</label>
                                    <input type="time" id="masukLembur" name="masukLembur">
                                </div>
                            </div>
                            <div class="time-form">
                                <div>
                                    <label for="pulang">Pulang Lembur:</label>
                                    <input type="time" id="pulangLembur" name="pulangLembur">
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 1; margin-right: 10px;margin-left: 10px; ">
                            <div class="card-body"
                                style="flex: 1; margin-right: 10px;margin-left: 10px; background-color:orange ">
                                <div class="time-form">
                                    <div>
                                        <label for="pulang">Awal Jam Istirahat Lembur:</label>

                                        <input type="time" id="AwalIstirahat" name="AwalIstirahat">
                                    </div>
                                </div>
                                <div class="time-form">
                                    <div>
                                        <label for="pulang">Akhir Jam Istirahat Lembur:</label>
                                        <input type="time" id="AkhirIstirahat" name="AkhirIstirahat">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 1; margin-right: 10px; margin-left: 10px; margin-top:50px;">
                            <div style="display: flex; flex-direction: column;">
                                <label style="margin-bottom: 5px;">Keterangan Lembur</label>
                                <div class="textbox-container">
                                    <input type="text" class="form-control" id="ketLembur" name="ketLembur">
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
