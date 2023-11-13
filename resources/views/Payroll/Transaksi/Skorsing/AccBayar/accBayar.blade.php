@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Transaksi/Skorsing/AccBayar.js') }}"></script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">Acc Pembayaran Skorsing</div>






                    <div class="card-body-container"
                        style="display: flex; flex-wrap: nowrap;border: 1px solid black;margin:10px;">
                        <div class="card-body">
                            <div class="row" style="">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">User Acc:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="Divisi_pengiriman"
                                        id="Divsi_pengiriman" placeholder="" required style="max-width:170px;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <label for="TglMulai" class="aligned-text">Tanggal:</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglMulai" name="TglMulai"
                                        value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required
                                        style="max-width: 200px;">
                                    <button type="button" class="btn btn-info" style="margin-left:10px;"
                                        id="okButton">OK</button>
                                </div>

                            </div>




                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="form-check form-check-inline seperate">
                                    <input class="form-check-input custom-radio ml-3" type="radio" name="unit"
                                        value="kg" checked>
                                    <label class="form-check-label rounded-circle custom-radio"
                                        for="kgRadio">Dibayar</label>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-check form-check-inline seperate">
                                    <input class="form-check-input custom-radio ml-3" type="radio" name="unit"
                                        value="kg" checked>
                                    <label class="form-check-label rounded-circle custom-radio" for="kgRadio">Tidak
                                        Dibayar</label>
                                </div>
                            </div>



                        </div>


                    </div>


                    <div class="card-body" style="border: 1px solid black; margin: 10px;">
                        <div class="card-body">


                            <div class="row" style="margin-left:-120px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Kode Pegawai:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <input class="form-control" type="text" id="Kd_Pegawai" disabled
                                        style="resize: none;  width: 100px;">
                                    <input type="text" class="form-control" name="Kode" id="Nama_Pegawai"
                                        placeholder="Nama Pegawai" style="width:300px;" disabled>
                                    <div class="text-center col-md-auto"><button type="" id="button_Pegawai"
                                            onclick=showModalPegawai() >...</button></div>
                                    <div class="modal fade" id="modalPegawai" role="dialog" arialabelledby="modalLabel"
                                        area-hidden="true" style="">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content" style="">
                                                <div class="modal-header" style="justify-content: center;">

                                                    <div class="row" style=";">
                                                        <div class="table-responsive" style="margin:30px;">
                                                            <table id="tabel_Pegawai" class="table table-bordered">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th scope="col">Nama</th>
                                                                        <th scope="col">Id Pegawai</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>




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
                            <div class="row" style="margin-left:-120px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Total Bayar:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:180px;">
                                    <input type="text" class="form-control" name="Divisi_pengiriman"
                                        id="Divsi_pengiriman" placeholder="" required>

                                </div>
                            </div>

                            <div class="row" style="margin-left:-120px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <label for="TglMulai" class="aligned-text">Tgl Skorsing:</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglMulai" name="TglMulai"
                                        value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required
                                        style="max-width: 200px;">
                                    <span class="aligned-text" style="margin-left: 15px;">s.d</span>
                                    <input class="form-control" type="date" id="TglSelesai" name="TglSelesai"
                                        value="{{ old('TglSelesai', now()->format('Y-m-d')) }}" required
                                        style="max-width: 200px;">

                                </div>


                            </div>
                            <div class="row" style="margin-left:-120px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <label for="TglMulai" class="aligned-text">Tgl Yang Terbayar:</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglMulai" name="TglMulai"
                                        value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required
                                        style="max-width: 200px;">
                                    <span class="aligned-text" style="margin-left: 15px;">s.d</span>
                                    <input class="form-control" type="date" id="TglSelesai" name="TglSelesai"
                                        value="{{ old('TglSelesai', now()->format('Y-m-d')) }}" required
                                        style="max-width: 200px;">

                                </div>


                            </div>
                            <div class="table-responsive" style=" ">
                                <table class="table table-bordered" id="table_Skors">
                                    <thead>
                                        <tr>
                                            <th scope="col">Divisi</th>
                                            <th scope="col">Kd Peg</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Awal Skorsing</th>
                                            <th scope="col">Akhir Skorsing</th>
                                            <th scope="col">Total Terbayar</th>




                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        {{-- <tr> --}}

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

                                        {{-- </tr> --}}
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







                    <div class="row" style="padding-top: 20px; margin:20px;">
                        <div class="col-6" style="text-align: left; ">

                        </div>
                        <div class="col-6" style="text-align: right; ">
                            <button type="button" class="btn btn-primary" style="margin-left: 10px" id="prosesButton"
                                disabled>Proses</button>
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
