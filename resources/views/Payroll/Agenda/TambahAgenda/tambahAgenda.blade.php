@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="background-color:#FFE0C0; ">
                    <div class="card-header" style="background-color:#F7F7F7;">Tambah Agenda</div>
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
                                    <button type="button" class="btn btn-info">Insert Lembur</button>
                                </div>

                            </div>
                        </div>

                        </div>


                    </div>

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
                            <div class="card-body" style="flex: 1; margin-right: 10px;margin-left: 10px; background-color:orange ">
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
