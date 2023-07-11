@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">Form Koreksi Lembur</div>






                    <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                        <div class="card-body">
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
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                  <label for="TglMulai" class="aligned-text">Tanggal:</label>
                                </div>
                                <div class="form-group col-md-4">
                                  <input class="form-control" type="date" id="TglMulai" name="TglMulai" value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required style="max-width: 200px;">
                                  <button type="button" class="btn btn-info" style="margin-left:10px;">Tampilkan</button>
                                </div>

                            </div>




                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="form-check form-check-inline seperate">
                                    <input class="form-check-input custom-radio ml-3" type="radio" name="unit" value="kg" checked>
                                    <label class="form-check-label rounded-circle custom-radio" for="kgRadio">Semua Lembur</label>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-check form-check-inline seperate">
                                    <input class="form-check-input custom-radio ml-3" type="radio" name="unit" value="kg" checked>
                                    <label class="form-check-label rounded-circle custom-radio" for="kgRadio">Lembur > 1</label>
                                </div>
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
                                        <th scope="col">Lbr 1</th>
                                        <th scope="col">Lbr 2</th>
                                        <th scope="col">Lbr 3</th>
                                        <th scope="col">Lbr 4</th>
                                        <th scope="col">KetLembur</th>
                                        <th scope="col">JmlJam</th>



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



                    <div class="card-body-container" style="display: flex; flex-wrap: nowrap; border:1px solid black; margin:10px;">
                        <div class="card-body" style="width:30%;">
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Kode Pegawai:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:150px;">
                                    <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman" placeholder="" required>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Nama:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:500px;">
                                    <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman" placeholder="" required>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Alasan Lembur:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:500px;">
                                    <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman" placeholder="" required>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Jumlah Jam:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:85px;">
                                    <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman" placeholder="" required>

                                </div>
                            </div>



                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Lembur 1.5</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:125px;">
                                    <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman" placeholder="" required>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Lembur 2</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:125px;">
                                    <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman" placeholder="" required>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Lembur 3</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:125px;">
                                    <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman" placeholder="" required>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Lembur 4</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:125px;">
                                    <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman" placeholder="" required>

                                </div>
                            </div>



                        </div>


                    </div>
                    <div class="row" style="padding-top: 20px; margin:20px;">
                        <div class="col-6" style="text-align: left; ">
                            <button type="button" class="btn btn-info" style="">Koreksi</button>
                            <button type="button" class="btn btn-danger" style="margin-left: 10px">Hapus</button>
                        </div>
                        <div class="col-6" style="text-align: right; ">
                            <button type="button" class="btn btn-primary" style="margin-left: 10px">Proses</button>
                            <button type="button" class="btn btn-dark" style="margin-left: 10px">Keluar</button>
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
