@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Transaksi/maintenancePelatihan.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">Maintenance Pelatihan</div>







                    <div class="card-body" style="">
                        <div class="row" style="">
                            <div class="form-group col-md-1 d-flex justify-content-end">
                                <span class="aligned-text">Divisi Baru:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Divisi" readonly
                                    style="resize: none; height: 40px; width: 150px;">
                                <input class="form-control ml-3" type="text" id="Nama_Divisi" readonly
                                    style="resize: none; height: 40px; width: 313px;">
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                        style="resize: none; height: 40px; max-width: 250px;">
                                        <option value=""></option>
                                        @foreach ($divisi as $data)
                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                        @endforeach
                                    </select> --}}
                                <button type="button" class="btn" style="margin-left: 10px; "
                                    id="divisiButton">...</button>


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

                                                                {{-- @foreach ($dataDivisi as $data)
                                                                        <tr>

                                                                            <td>{{ $data->kd_Pegawai }}</td>
                                                                            <td>{{ $data->nama_peg }}</td>
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
                        <div class="row" style="">
                            <div class="form-group col-md-1 d-flex justify-content-end">
                                <span class="aligned-text">Kd Pegawai:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Pegawai" readonly
                                    style="resize: none; height: 40px; width: 150px;">
                                <input class="form-control ml-3" type="text" id="Nama_Pegawai" readonly
                                    style="resize: none; height: 40px; width: 313px;">
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                        style="resize: none; height: 40px; max-width: 250px;">
                                        <option value=""></option>
                                        @foreach ($divisi as $data)
                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                        @endforeach
                                    </select> --}}
                                <button type="button" class="btn" style="margin-left: 10px; "
                                    id="pegawaiButton">...</button>


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
                                                                    <th scope="col">Id Pegawai</th>
                                                                    <th scope="col">Nama Pegawai</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                {{-- @foreach ($dataPegawai as $data)
                                                                        <tr>

                                                                            <td>{{ $data->kd_Pegawai }}</td>
                                                                            <td>{{ $data->nama_peg }}</td>
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
                            <table class="table table-bordered" id="tabel_Pelatihan">
                                <thead>
                                    <tr>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Nama Lembaga</th>
                                        <th scope="col">Tempat</th>
                                        <th scope="col">Topik</th>
                                        <th scope="col">Lama</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Id</th>
                                        <th scope="col">User</th>



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




                    <div class="card-body" style="border:1px solid black; margin:10px;">
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <label for="TglPelatihan" class="aligned-text">Tanggal:</label>
                            </div>
                            <div class="form-group col-md-4">
                                <input class="form-control" type="date" id="TglPelatihan" name="TglPelatihan"
                                    required style="max-width: 200px;">
                                <input type="text" class="form-control" name="Id_Pelatihan" id="Id_Pelatihan"
                                    placeholder="" style="max-width:40px;margin-left:15px;" required>

                            </div>

                        </div>
                        <div class="row" style="">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Jenis Pelatihan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <select class="form-control" id="JenisPelatihan" name="JenisPelatihan"
                                    style="resize: none;height: 40px; max-width:450px;">
                                    <option value="KURSUS">KURSUS</option>
                                    <option value="SEMINAR">SEMINAR</option>
                                    <option value="TRAINING">TRAINING</option>
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Lembaga Pelatihan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:350px;">
                                <input type="text" class="form-control" name="Lembaga_Pelatihan"
                                    id="Lembaga_Pelatihan" placeholder="" required>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Tempat Pelatihan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:350px;">
                                <input type="text" class="form-control" name="tempat_Pelatihan"
                                    id="tempat_Pelatihan" placeholder="" required>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Topik Pelatihan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:350px;">
                                <input type="text" class="form-control" name="topik_Pelatihan"
                                    id="topik_Pelatihan" placeholder="" required>

                            </div>
                        </div>
                        <div class="row" style="">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Lama Pelatihan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="number" class="form-control" name="Lama_Pelatihan" id="Lama_Pelatihan"
                                    placeholder="0" required style="width:100px;" pattern="[0-9]*">
                                <select class="form-control" id="waktu" name="waktu"
                                    style="resize: none;height: 40px; max-width:75px;">
                                    <option value="Jam">Jam</option>
                                    <option value="Hari">Hari</option>
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Nilai Dalam Angka:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:350px;">
                                <input type="text" class="form-control" name="Nilai"
                                    id="Nilai" placeholder="" required>

                            </div>
                        </div>


                    </div>



                    <div id="form-container"></div>
                    <div class="row" style="padding-top: 20px; margin:20px;">
                        <div class="col-6" style="text-align: left; ">
                            <button type="button" class="btn" style="margin-left: 10px;width:80px;"
                                id="isiButton">Isi</button>
                            <button type="button" class="btn" style="margin-left: 10px;width:80px;"
                                id="koreksiButton">Koreksi</button>
                            <button type="button" class="btn" style="margin-left: 10px;width:80px;"
                                id="simpanButton" hidden>SIMPAN</button>
                            <button type="button" class="btn" style="margin-left: 10px;width:80px;" id="batalButton"
                                hidden>BATAL</button>
                            <button type="button" class="btn" style="margin-left: 10px;width:80px;"
                                id="hapusButton">Hapus</button>
                            {{-- <button type="button" class="btn btn-dark" style="margin-left: 10px">Keluar</button> --}}
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
