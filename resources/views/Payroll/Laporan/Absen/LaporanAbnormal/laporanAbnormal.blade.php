@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">Form Absen Abnormal</div>






                    <div class="card-body-container" style="margin-left:-220px;">


                        <br>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                              <label for="TglMulai" class="aligned-text">Tanggal:</label>
                            </div>
                            <div class="form-group col-md-4">
                              <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="max-width: 200px;">

                              <button type="button" class="btn  " style="margin-left:10px;">Tampilkan</button>
                              <button type="button" class="btn btn-dark  " style="margin-left:10px;">Keluar</button>
                            </div>


                        </div>










                    </div>

                    <div class="row">
                        <div class="table-responsive" style="margin:30px; ">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>

                                        <th scope="col">Kode Pegawai</th>
                                        <th scope="col">Nama Pegawai</th>

                                        <th scope="col">Jumlah</th>



                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
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
