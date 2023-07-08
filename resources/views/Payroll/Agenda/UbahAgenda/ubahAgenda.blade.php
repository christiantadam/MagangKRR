@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">Ubah Agenda</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left: 10px; display: flex; justify-content: center; align-items: center;">
                        <div style="display: flex; align-items: center;">
                            <label for="TglLapor" style="margin-right: 10px;">Tanggal</label>
                            <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required style="max-width: 200px;">
                        </div>
                    </div>




                    <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                        <div class="card-body">
                            <div style="flex: 1; margin-right: 10px; margin-top: 5px;">
                                <input type="checkbox">
                                <label for="staff">Perorangan</label>
                            </div>
                            <div class="card-body"
                            style="flex: 1; margin-right: 10px; border: 1px solid #000000; border-radius: 3px; text-align: middle;">

                            <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10;">

                                <br>
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

                                <div style="text-align: right; margin-top: 100px;">
                                    <button type="button" class="btn btn-primary">Pilih Semua</button>
                                    <button type="button" class="btn btn-info">Generate Perorangan</button>
                                </div>

                            </div>
                        </div>

                        </div>
                        <div class="card-body">
                            <div style="flex: 1; margin-right: 10px; margin-top: 5px;">
                                <input type="checkbox">
                                <label for="staff">Divisi</label>
                            </div>
                            <div class="card-body"
                            style="flex: 1; margin-right: 10px; border: 1px solid #000000; border-radius: 3px;">
                            <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10;">

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
                                <div style="text-align: right; margin-top: 100px;">
                                    <button type="button" class="btn btn-primary">Pilih Semua</button>
                                    <button type="button" class="btn btn-info">Update</button>
                                </div>

                            </div>
                        </div>

                        </div>


                    </div>
                    <div style="display: flex; align-items: center; margin-left:35px; ">
                        <label style="margin-bottom: 5px; margin-right: 5px;">Jabatan</label>
                        <select class="form-control" id="Shift" name="Shift"
                        style="resize: none;height: 40px; max-width:150px">
                            <option value="">PISAT1</option>
                            <option value="">PISAT2</option>
                        </select>
                    </div>
                    <div class="card-container"
                        style="display: flex; flex-wrap: nowrap; ">
                        <div class="card-body" style="flex: 1; margin-right: 10px;margin-left: 10px; ">

                            <div class="time-form" style="display: flex; flex-direction: row; justify-content: left;">
                                <label for="masukLembur">Masuk Kerja :</label>
                                <div>
                                    <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                        value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required style="max-width: 200px; margin-left: 5px;">
                                </div>
                                <div>

                                    <input class="form-control" type="time" id="masukLembur" name="masukLembur" style="margin-left: 5px;">
                                </div>
                            </div>
                            <div class="time-form" style="display: flex; flex-direction: row; justify-content: left;">
                                <label for="masukLembur">Pulang Kerja :</label>
                                <div>
                                    <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                        value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required style="max-width: 200px; margin-right: 5px">
                                </div>
                                <div>

                                    <input class="form-control" type="time" id="masukLembur" name="masukLembur">
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 1; margin-right: 10px;margin-left: 10px; ">

                            <div class="time-form" style="display: flex; flex-direction: row; justify-content: left;">
                                <label for="masukLembur">Mulai Istirahat :</label>
                                <div>
                                    <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                        value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required style="max-width: 200px;margin-left:12px;">
                                </div>
                                <div>

                                    <input class="form-control" type="time" id="masukLembur" name="masukLembur" style="margin-left:12px">
                                </div>
                            </div>
                            <div class="time-form" style="display: flex; flex-direction: row; justify-content: left;">
                                <label for="masukLembur">Selesai Istirahat :</label>
                                <div>
                                    <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                        value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required style="max-width: 200px; margin-right:12px;">
                                </div>
                                <div>

                                    <input class="form-control" type="time" id="masukLembur" name="masukLembur">
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 1; margin-right: 10px; margin-left: 10px; margin-top:50px;">
                            <div style="display: flex; flex-direction: column;">
                                <label style="margin-bottom: 5px;">Keterangan Absensi</label>
                                <select class="form-control" id="Shift" name="Shift"
                                    style="resize: none;height: 40px; max-width:150px">
                                    <option value="">Masuk</option>
                                    <option value="">Sakit</option>
                                    <option value="">Ijin</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div style="text-align: right; margin-top: 100px; margin-right:50px;">
                        <button type="button" class="btn btn-danger" style="width: 150px">Keluar</button>

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
