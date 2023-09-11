@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Transaksi/lembur.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">Form Koreksi Lembur</div>






                    <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                        <div class="card-body">
                            <div class="row" style="">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Divisi:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <input class="form-control" type="text" id="Id_Divisi" readonly
                                        style="resize: none; height: 40px; width: 200px;">
                                    <input class="form-control ml-3" type="text" id="Nama_Divisi" readonly
                                        style="resize: none; height: 40px; width: 513px;">
                                    {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                        style="resize: none; height: 40px; max-width: 250px;">
                                        <option value=""></option>
                                        @foreach ($divisi as $data)
                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                        @endforeach
                                    </select> --}}
                                    <button type="button" class="btn" style="margin-left: 10px; " id="divisiButton"
                                        onclick="showModalDivisi()">...</button>

                                    <div class="modal fade" id="modalDivisi" role="dialog" arialabelledby="modalLabel"
                                        area-hidden="true" style="">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content" style="">
                                                <div class="modal-header" style="justify-content: center;">

                                                    <div class="row" style=";">
                                                        <div class="table-responsive" style="margin:30px;">
                                                            <table id="tabel_Divisi" class="table table-bordered">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th scope="col">Id Divisi</th>
                                                                        <th scope="col">Nama Divisi</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($dataDivisi as $data)
                                                                        <tr>

                                                                            <td>{{ $data->Id_Div }}</td>
                                                                            <td>{{ $data->Nama_Div }}</td>
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
                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <label for="TglMulai" class="aligned-text">Tanggal:</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglLembur" name="TglMulai"
                                        value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required
                                        style="max-width: 200px;">
                                    <button type="button" class="btn btn-info" style="margin-left:10px;" id="tampilButton">Tampilkan</button>
                                </div>

                            </div>




                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="form-check form-check-inline seperate">
                                    <input class="form-check-input custom-radio ml-3" type="radio" name="unit"
                                        value="0" id="radio1" checked>
                                    <label class="form-check-label rounded-circle custom-radio" for="radio1">Semua
                                        Lembur</label>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-check form-check-inline seperate">
                                    <input class="form-check-input custom-radio ml-3" type="radio" name="unit"
                                        value="1" id="radio2" checked>
                                    <label class="form-check-label rounded-circle custom-radio" for="radio2">Lembur >
                                        1</label>
                                </div>
                            </div>



                        </div>


                    </div>

                    <div class="row">
                        <div class="table-responsive" style="margin:30px; ">
                            <table class="table table-bordered" id="table_Pegawai">
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
                                        <th scope="col">IdActual</th>


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
                        style="display: flex; flex-wrap: nowrap; border:1px solid black; margin:10px;">
                        <div class="card-body" style="width:30%;">
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Kode Pegawai:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:150px;">
                                    <input type="text" class="form-control" name=""
                                        id="Kd_Peg" placeholder="" required>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Nama:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:500px;">
                                    <input type="text" class="form-control" name=""
                                        id="Nama_Peg" placeholder="" required>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Alasan Lembur:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:500px;">
                                    <input type="text" class="form-control" name=""
                                        id="Alasan_Lembur" placeholder="" required>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Jumlah Jam:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:85px;">
                                    <input type="text" class="form-control" name="" id="Jml_Jam" placeholder="" required disabled>
                                </div>
                            </div>



                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Lembur 1.5</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:125px;">
                                    <input type="text" class="form-control" name="" id="Lembur_15x" placeholder="" required>
                                </div>
                            </div>

                            <!-- Input Lembur 2 -->
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Lembur 2</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:125px;">
                                    <input type="text" class="form-control" name="" id="Lembur_2x" placeholder="" required>
                                </div>
                            </div>

                            <!-- Input Lembur 3 -->
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Lembur 3</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:125px;">
                                    <input type="text" class="form-control" name="" id="Lembur_3x" placeholder="" required>
                                </div>
                            </div>

                            <!-- Input Lembur 4 -->
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Lembur 4</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:125px;">
                                    <input type="text" class="form-control" name="" id="Lembur_4x" placeholder="" required>
                                </div>
                            </div>



                        </div>


                    </div>
                    <div id="form-container"></div>
                    <div class="row" style="padding-top: 20px; margin:20px;">
                        <div class="col-6" style="text-align: left; ">
                            <button type="button" class="btn " style="" id="koreksiButton">Koreksi</button>
                            <button type="button" class="btn " style="margin-left: 10px" id="hapusButton">Hapus</button>
                        </div>
                        <div class="col-6" style="text-align: right; ">
                            <button type="button" class="btn " style="margin-left: 10px" id="prosesButton" disabled>Proses</button>
                            <button type="button" class="btn " style="margin-left: 10px" id="batalButton"disabled>Batal</button>
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
