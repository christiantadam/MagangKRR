@extends('layouts.appPayroll')
@section('content')
<script type="text/javascript" src="{{ asset('js/Transaksi/Mutasi/historiMutasi.js') }}"></script>
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
                                <input class="form-control" type="text" id="Id_Divisi"
                                    style="resize: none; height: 40px; width: 100px;" disabled>
                                <input class="form-control ml-3" type="text" id="Nama_Divisi"
                                    style="resize: none; height: 40px; width: 263px;" disabled>
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
                                                                    <th scope="col">Nama Divisi</th>
                                                                    <th scope="col">Id Divisi</th>

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
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Kode Pegawai:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Pegawai"
                                    style="resize: none; height: 40px; width: 100px;" disabled>
                                <input class="form-control ml-3" type="text" id="Nama_Pegawai"
                                    style="resize: none; height: 40px; width: 263px;" disabled>
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
                                                                    <th scope="col">Nama Pegawai</th>
                                                                    <th scope="col">Id Pegawai</th>

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
                                <button type="button" class="btn btn-light" style="margin-left:10px;" id="tampilButton">Tampilkan</button>
                                <button type="button" class="btn btn-light" style="margin-left:10px;">Keluar</button>
                            </div>
                        </div>





                    </div>





                    <div class="row">
                        <div class="table-responsive" style="margin:30px; ">
                            <table id="tabel_Data" class="table table-bordered">
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
