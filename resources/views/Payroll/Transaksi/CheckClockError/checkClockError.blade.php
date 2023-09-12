@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Transaksi/checkClockError.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">Check Clock Error</div>






                    <div class="card-body-container" style="margin-left:-40px;">


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
                        <div class="row">
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <label for="TglMulai" class="aligned-text">Tanggal:</label>
                            </div>
                            <div class="form-group col-md-4">
                                <input class="form-control" type="date" id="TglCheck" name="TglCheck"
                                     required
                                    style="max-width: 200px;">

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
                                    <button type="button" class="btn" style="margin-left: 10px; " id="okButton"
                                    >OK</button>

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








                    </div>

                    <div class="row">
                        <div class="table-responsive" style="margin:30px; ">
                            <table class="table table-bordered" id="tabel_Pegawai">
                                <thead>
                                    <tr>
                                        <th scope="col">Divisi</th>
                                        <th scope="col">Kode Pegawai</th>
                                        <th scope="col">Nama Pegawai</th>
                                        <th scope="col">Jam</th>
                                        <th scope="col">No Check Clock</th>
                                        <th scope="col">Error</th>



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



                    <div class="card-body-container"
                        style="display: flex; flex-wrap: wrap; border: 1px solid black; margin: 10px;">
                        <div class="card-body" style="flex: 0 0 25%; max-width: 25%;">
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">
                                    <span class="aligned-text">Error Code</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 0 0 25%; max-width: 25%;">
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">
                                    <span class="aligned-text">1 - User</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">
                                    <span class="aligned-text">4 - Exit Keypad</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">
                                    <span class="aligned-text">6 - Access</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 0 0 25%; max-width: 25%;">
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">
                                    <span class="aligned-text">8 - User</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">
                                    <span class="aligned-text">9 - Command Mode</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">
                                    <span class="aligned-text">10 - Leave Command</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 0 0 25%; max-width: 25%;">
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">
                                    <span class="aligned-text">15 - Supervisor Override</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-beginning">
                                    <span class="aligned-text">18 - Request For Exit</span>
                                </div>
                            </div>
                        </div>

                    </div>





                    <div class="row" style="padding-top: 20px; margin:20px;">
                        <div class="col-6" style="text-align: left; ">

                        </div>
                        <div class="col-6" style="text-align: right; ">

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
