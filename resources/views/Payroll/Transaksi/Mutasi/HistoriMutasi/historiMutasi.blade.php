@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">Histori Mutasi</div>







                        <div class="card-body" style="margin-left:-250px;">
                            <div class="row" style="">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Divisi:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <select class="form-control" id="Shift" name="Shift"
                                    style="resize: none;height: 40px; max-width:250px;">
                                    <option value="">PISAT1</option>
                                    <option value="">PISAT2</option>
                                </select>
                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Kode Pegawai:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <select class="form-control" id="Shift" name="Shift"
                                    style="resize: none;height: 40px; max-width:250px;">
                                    <option value="">kd1</option>
                                    <option value="">kd2</option>
                                </select>
                                <button type="button" class="btn btn-light" style="margin-left:10px;">Tampilkan</button>
                                <button type="button" class="btn btn-light" style="margin-left:10px;">Keluar</button>
                                </div>
                            </div>





                        </div>





                    <div class="row">
                        <div class="table-responsive" style="margin:30px; ">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode Lama</th>
                                        <th scope="col">Divisi Lama</th>
                                        <th scope="col">Kode Baru</th>
                                        <th scope="col">Divisi Baru</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">No Surat</th>




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
