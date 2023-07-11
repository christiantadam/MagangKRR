@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">Maintenance Pelatihan</div>







                        <div class="card-body" style="margin-left:-250px;">
                            <div class="row" style="">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Divisi Baru:</span>
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
                                    <span class="aligned-text">Kd Pegawai:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <select class="form-control" id="Shift" name="Shift"
                                    style="resize: none;height: 40px; max-width:250px;">
                                    <option value="">kd1</option>
                                    <option value="">kd2</option>
                                </select>
                                </div>
                            </div>





                        </div>





                    <div class="row">
                        <div class="table-responsive" style="margin:30px; ">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Nama Lembaga</th>
                                        <th scope="col">Tempat</th>
                                        <th scope="col">Topik</th>
                                        <th scope="col">Lama</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Id</th>
                                        <th scope="col">User</th>



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




                        <div class="card-body" style="border:1px solid black; margin:10px;">
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <label for="TglMulai" class="aligned-text">Tanggal:</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglMulai" name="TglMulai"
                                        value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required
                                        style="max-width: 200px;">
                                        <button type="button" class="btn btn-light" style="margin-left:10px;">...</button>

                                </div>

                            </div>
                            <div class="row" style="">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Jenis Pelatihan:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <select class="form-control" id="Shift" name="Shift"
                                        style="resize: none;height: 40px; max-width:450px;">
                                        <option value="">Jenis Pelatihan 1</option>
                                        <option value="">Jenis Pelatihan 2</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Lembaga Pelatihan:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:350px;">
                                    <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman" placeholder="" required>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Tempat Pelatihan:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:350px;">
                                    <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman" placeholder="" required>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Topik Pelatihan:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:350px;">
                                    <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman" placeholder="" required>

                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Lama Pelatihan:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman" placeholder="" required style="width:100px;">
                                    <select class="form-control" id="Shift" name="Shift"
                                        style="resize: none;height: 40px; max-width:75px;">
                                        <option value="">Jam</option>
                                        <option value="">Hari</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Nilai Dalam Angka:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:350px;">
                                    <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman" placeholder="" required>

                                </div>
                            </div>


                        </div>




                    <div class="row" style="padding-top: 20px; margin:20px;">
                        <div class="col-6" style="text-align: left; ">
                            <button type="button" class="btn btn-primary" style="margin-left: 10px">Isi</button>
                            <button type="button" class="btn btn-info" style="margin-left: 10px">Koreksi</button>
                            <button type="button" class="btn btn-danger" style="margin-left: 10px">Hapus</button>
                            <button type="button" class="btn btn-dark" style="margin-left: 10px">Keluar</button>
                        </div>
                        <div class="col-6" style="text-align: right; ">


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
