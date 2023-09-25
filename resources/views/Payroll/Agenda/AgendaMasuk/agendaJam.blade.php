@extends('layouts.appPayroll')
@section('content')
<script type="text/javascript" src="{{ asset('js/Agenda/agendaJam.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card">
                    <div class="card-header">Form Jam</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px">
                        <div style="display: flex; flex-wrap: nowrap; align-items: center;">
                            <div style="flex: 1; margin-right: 10px;">
                                <label style="margin-right: 10px;">Tanggal</label>
                                <div style="display: flex; align-items: center;">
                                    <input class="form-control" type="date" id="TglAwal" name="TglAwal"
                                        value="{{ old('TglAwal', now()->format('Y-m-d')) }}" required>


                                </div>

                            </div>
                            <div style="flex: 1; margin-right: 10px;">
                                <label style="margin-right: 10px;">S/D</label>
                                <div style="display: flex; align-items: center;">
                                    <input class="form-control" type="date" id="TglAkhir" name="TglAkhir"
                                        value="{{ old('TglAkhir', now()->format('Y-m-d')) }}" required>


                                </div>

                            </div>



                        </div>
                        <br>

                    </div>
                    <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                        <div class="card-body"
                            style="flex: 1; margin-right: 10px; border: 1px solid #000000; border-radius: 3px; text-align: middle;">
                            <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10;">
                                <div style="flex: 1; margin-right: 10px; margin-top: 5px;">
                                    <input type="checkbox">
                                    <label for="staff">Perorangan</label>
                                </div>
                                <br>
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
                                <div class="row" style="margin-left:50px;">
                                    <div class="form-group col-md-1 d-flex justify-content-end">
                                        <span class="aligned-text">Kd&nbsp;Pegawai</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <select class="form-control" id="PegawaiSelect" name="PegawaiSelect"
                                            style="resize: none;height: 40px; max-width:350px">
                                            <option value="">Pilih Pegawai</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id Karyawan</th>
                                                <th scope="col">Nama Karyawan</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            <tr>

                                                {{-- <td>
                                                    <a href="" title="Edit Employee">
                                                        <button class="btn btn-primary btn-sm">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                        </button>
                                                    </a>
                                                    <form method="POST" action="" accept-charset="UTF-8" style="display:inline">
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee" onclick='return confirm("Confirm delete?")'>
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                        </button>
                                                    </form>
                                                </td> --}}

                                            </tr>
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

                                <div style="text-align: center; margin-top: 100px;">

                                    <button type="button" class="btn" style="height: 50px;width: 100px;" id="generateButton">Generate</button>
                                </div>

                            </div>
                        </div>
                        <div class="card-body"
                            style="flex: 1; margin-right: 10px; border: 1px solid #000000; border-radius: 3px;">
                            <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10;">
                                <div style="flex: 1; margin-right: 10px; margin-top: 5px;">
                                    <input type="checkbox">
                                    <label for="staff">Divisi</label>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id Divisi</th>
                                                <th scope="col">Nama Divisi</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            <tr>

                                                {{-- <td>
                                                    <a href="" title="Edit Employee">
                                                        <button class="btn btn-primary btn-sm">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                        </button>
                                                    </a>
                                                    <form method="POST" action="" accept-charset="UTF-8" style="display:inline">
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee" onclick='return confirm("Confirm delete?")'>
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                        </button>
                                                    </form>
                                                </td> --}}

                                            </tr>
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
                                <div id="form-container"></div>
                                <div style="text-align: right; margin-top: 100px;">
                                    <button type="button" class="btn btn-primary">Pilih Semua</button>
                                    <button type="button" class="btn btn-info">Generate Divisi</button>
                                </div>














                            </div>
                        </div>
                    </div>
                    <div class="time-form">

                        <label for="masuk">Masuk:</label>
                        <input type="time" id="masuk" name="masuk">
                        <label for="pulang_istirahat">Pulang Istirahat:</label>
                        <input type="time" id="pulang_istirahat" name="pulang_istirahat">
                    </div>
                    <br>
                    <div class="time-form">

                        <label for="pulang">Pulang:</label>
                        <input type="time" id="pulang" name="pulang">
                        <label for="masuk_istirahat">Masuk Istirahat:</label>
                        <input type="time" id="masuk_istirahat" name="masuk_istirahat">
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
