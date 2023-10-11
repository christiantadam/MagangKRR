@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Transaksi/KoreksiAbsen.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center" style="">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="margin:auto;">
                    <div class="card-header">Koreksi Absen</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px;">
                        <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                            <div class="card-body" style="flex: 0 0 35%; max-width: 35%; margin-right: 10px;">
                                <div class="row" style="padding-left:60px;">
                                    <div class="form-group col-md-1 d-flex justify-content-end">
                                        <span class="aligned-text">Divisi:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="Id_Div" readonly
                                            style="resize: none; height: 40px; width:90px;">
                                        <input class="form-control ml-3" type="text" id="Nama_Div" readonly
                                            style="resize: none; height: 40px; max-width: 500px;">
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
                                                                <table id="table_Divisi" class="table table-bordered">
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
                                <div class="row" style="padding-left:60px;">
                                    <div class="form-group col-md-1 d-flex justify-content-end">
                                        <span class="aligned-text">Kode&nbsp;Pegawai:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="Id_Peg" readonly
                                            style="resize: none; height: 40px; width:90px;">
                                        <input class="form-control ml-3" type="text" id="Nama_Peg" readonly
                                            style="resize: none; height: 40px; max-width: 500px;">
                                        {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                            style="resize: none; height: 40px; max-width: 250px;">
                                            <option value=""></option>
                                            @foreach ($divisi as $data)
                                                <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                            @endforeach
                                        </select> --}}
                                        <button type="button" class="btn" style="margin-left: 10px; " id="divisiButton"
                                            onclick="showModalPegawai()">...</button>


                                        <div class="modal fade" id="modalPegawai" role="dialog" arialabelledby="modalLabel"
                                            area-hidden="true" style="">
                                            <div class="modal-dialog " role="document">
                                                <div class="modal-content" style="">
                                                    <div class="modal-header" style="justify-content: center;">

                                                        <div class="row" style=";">
                                                            <div class="table-responsive" style="margin:30px;">
                                                                <table id="table_Pegawai" class="table table-bordered">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th scope="col">Kd Pegawai</th>
                                                                            <th scope="col">Nama Pegawai</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        {{-- @foreach ($dataDivisi as $data)
                                                                            <tr>

                                                                                <td>{{ $data->Id_Div }}</td>
                                                                                <td>{{ $data->Nama_Div }}</td>
                                                                            </tr>
                                                                        @endforeach --}}
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

                            </div>
                            <div class="card-body" style="flex: 0 0 35%; max-width: 35%; margin-right: 10px;">
                                <div class="row">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <label for="TglMulai" class="aligned-text">Tanggal:</label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input class="form-control" type="date" id="TglMulai" name="TglMulai"
                                            value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required
                                            style="max-width: 200px;">
                                        <span class="aligned-text" style="margin-left: 15px;">s/d</span>
                                        <input class="form-control" type="date" id="TglSelesai" name="TglSelesai"
                                            value="{{ old('TglSelesai', now()->format('Y-m-d')) }}" required
                                            style="max-width: 200px;">
                                        <button type="button" class="btn  " id="buttonTampil"
                                            style="margin-left:10px;">Tampilkan</button>
                                    </div>


                                </div>
                                {{-- <div class="row">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                    </div>
                                    <div class="form-group col-md-4 d-flex justify-content-end">
                                        <button type="button" class="btn">Tampilkan</button>
                                    </div>
                                </div> --}}
                            </div>


                        </div>


                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table_Koreksi">
                                <thead>
                                    <tr>
                                        <th scope="col">KdPegawai</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Masuk</th>
                                        <th scope="col">Keluar</th>
                                        <th scope="col">Datang</th>
                                        <th scope="col">Pulang</th>
                                        <th scope="col">Ket</th>
                                        <th scope="col">KetLembur</th>
                                        <th scope="col">Lambat</th>
                                        <th scope="col">Tinggal</th>
                                        <th scope="col">Lebih</th>
                                        <th scope="col">Lbr 1</th>
                                        <th scope="col">Lbr 2</th>
                                        <th scope="col">Lbr 3</th>
                                        <th scope="col">Lbr 4</th>
                                        <th scope="col">JmlJam</th>
                                        <th scope="col">id_agenda</th>
                                        <th scope="col">Istirahat</th>


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
                        <div style="flex: 1; margin-right: 10px; margin-top: 5px; align-items:center;">
                            <input type="checkbox">
                            <label for="staff">Centang Semua</label>
                        </div>
                        <div class="card-container" style="display: flex; flex-wrap: nowrap; ">
                            <div>
                                <div class="card-body"
                                    style="flex: 1; margin-right: 10px;margin-left: 10px;border:1px solid black; " id="koreksiSection" >

                                    <div class="row" style="margin-left:-120px;">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Tanggal :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">

                                            <input class="form-control" type="date" id="TglMasukKoreksi" name="TglMasukKoreksi"
                                                value="{{ old('TglLapor', now()->format('Y-m-d')) }}"
                                                style="width: 150px;" disabled>
                                        </div>


                                    </div>
                                    <div class="row" style="margin-left:-120px;">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Keterangan :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">

                                            <select class="form-control" id="KeteranganKoreksi" name="KeteranganKoreksiName"
                                                style="resize: none;height: 35px; max-width:150px;"disabled>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="H">H</option>
                                                <option value="I">I</option>
                                                <option value="K">K</option>
                                                <option value="L">L</option>
                                                <option value="M">M</option>
                                                <option value="P">P</option>
                                                <option value="S">S</option>
                                                <option value="X">X</option>
                                                <option value="N">N</option>
                                            </select>
                                        </div>


                                    </div>
                                    <div class="row" style="margin-left:-120px;">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Alasan Lembur :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">

                                            <input class="form-control" type="text" id="AlasanLemburKoreksi" disabled
                                                style="resize: none; height: 40px; max-width: 550px;">
                                        </div>


                                    </div>


                                    <div class="row" style="margin-left:-120px;">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Klinik:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input class="form-control" type="text" id="Id_Klinik" readonly
                                                style="resize: none; height: 40px; width: 100px;">
                                            <input class="form-control ml-3" type="text" id="Nama_Klinik" readonly
                                                style="resize: none; height: 40px; width: 313px;">
                                            {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                                style="resize: none; height: 40px; max-width: 250px;">
                                                <option value=""></option>
                                                @foreach ($divisi as $data)
                                                    <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                                @endforeach
                                            </select> --}}
                                            <button type="button" class="btn" style="margin-left: 10px; "
                                                id="klinikButton" onclick="showModalKlinik()" disabled>...</button>

                                            <div class="modal fade" id="modalKlinik" role="dialog"
                                                arialabelledby="modalLabel" area-hidden="true" style="">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content" style="">
                                                        <div class="modal-header" style="justify-content: center;">

                                                            <div class="row" style=";">
                                                                <div class="table-responsive" style="margin:30px;">
                                                                    <table id="table_Klinik" class="table table-bordered">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">Id Klinik</th>
                                                                                <th scope="col">Nama Klinik</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            {{-- @foreach ($dataKlinik as $data)
                                                                                <tr>

                                                                                    <td>{{ $data->kd_klinik }}</td>
                                                                                    <td>{{ $data->nama_klinik }}</td>
                                                                                </tr>
                                                                            @endforeach --}}
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


                                    <div class="card-body"
                                        style="flex: 1; margin-right: 10px;margin-left: 10px;border:1px solid black; ">
                                        <div class="row" style="">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Jumlah&nbsp;Jam&nbsp;:</span>
                                            </div>
                                            <div class="form-group col-md-9 mt-3 mt-md-0">

                                                <input class="form-control" type="text" id="jmlJamKoreksi"
                                                    style="resize: none; height: 40px; max-width: 150px;" disabled>
                                            </div>


                                        </div>
                                        <div class="card-container" style="display: flex; margin-left:110px;">
                                            <div class="card-body" style="flex: 1;">
                                                <div class="row" style="">
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Terlambat&nbsp;:</span>
                                                    </div>
                                                    <div class="form-group col-md-9 mt-3 mt-md-0">

                                                        <input class="form-control" type="text" id="jamTerlambatKoreksi"
                                                            style="resize: none; height: 40px; max-width: 150px;" disabled>
                                                    </div>


                                                </div>
                                                <div class="row" style="">
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Tinggal&nbsp;:</span>
                                                    </div>
                                                    <div class="form-group col-md-9 mt-3 mt-md-0">

                                                        <input class="form-control" type="text" id="jamTinggalKoreksi"
                                                            style="resize: none; height: 40px; max-width: 150px;" disabled>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="card-body" style="flex: 1;">
                                                <div class="row" style="">
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Lembur&nbsp;1.5&nbsp;:</span>
                                                    </div>
                                                    <div class="form-group col-md-9 mt-3 mt-md-0">

                                                        <input class="form-control" type="text" id="jamLemburKoreksi"
                                                            style="resize: none; height: 40px; max-width: 150px;" disabled>
                                                    </div>


                                                </div>
                                                <div class="row" style="">
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Lembur&nbsp;2&nbsp;:</span>
                                                    </div>
                                                    <div class="form-group col-md-9 mt-3 mt-md-0">

                                                        <input class="form-control" type="text" id="jamLemburKoreksi2"
                                                            style="resize: none; height: 40px; max-width: 150px;" disabled>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="card-body" style="flex: 1;">
                                                <div class="row" style="">
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Lembur&nbsp;3&nbsp;:</span>
                                                    </div>
                                                    <div class="form-group col-md-9 mt-3 mt-md-0">

                                                        <input class="form-control" type="text" id="jamLemburKoreksi3"
                                                            style="resize: none; height: 40px; max-width: 150px;" disabled>
                                                    </div>


                                                </div>
                                                <div class="row" style="">
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Lembur&nbsp;4&nbsp;:</span>
                                                    </div>
                                                    <div class="form-group col-md-9 mt-3 mt-md-0">

                                                        <input class="form-control" type="text" id="jamLemburKoreksi4"
                                                            style="resize: none; height: 40px; max-width: 150px;" disabled>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div class="card-body"
                                    style="flex: 1; margin-right: 10px;margin-left: 10px;border:1px solid black; "id="tambahSection" hidden >

                                    <div class="row" style="margin-left:-120px;">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Tanggal :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">

                                            <input class="form-control" type="date" id="TglMasuk" name="TglMasuk"
                                                value="{{ old('TglLapor', now()->format('Y-m-d')) }}"
                                                style="width: 150px;" >
                                        </div>


                                    </div>
                                    <div class="row" style="margin-left:-120px;">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Keterangan :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">

                                            <select class="form-control" id="KeteranganIsi" name="KeteranganIsi"
                                                style="resize: none;height: 35px; max-width:150px;" >
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="H">H</option>
                                                <option value="I">I</option>
                                                <option value="K">K</option>
                                                <option value="L">L</option>
                                                <option value="M">M</option>
                                                <option value="P">P</option>
                                                <option value="S">S</option>
                                                <option value="X">X</option>
                                            </select>
                                        </div>


                                    </div>
                                    <div class="row" style="margin-left:-120px;">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Alasan Lembur :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">

                                            <input class="form-control" type="text" id="AlasanLembur" disabled
                                                style="resize: none; height: 40px; max-width: 550px;">
                                        </div>


                                    </div>


                                    <div class="row" style="margin-left:-120px;">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Shift:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input class="form-control" type="text" id="Id_Shift" readonly
                                                style="resize: none; height: 40px; width: 100px;">

                                            {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                                style="resize: none; height: 40px; max-width: 250px;">
                                                <option value=""></option>
                                                @foreach ($divisi as $data)
                                                    <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                                @endforeach
                                            </select> --}}
                                            <button type="button" class="btn" style="margin-left: 10px; "
                                                id="klinikButton" onclick="showModalShift()" >...</button>

                                            <div class="modal fade" id="modalShift" role="dialog"
                                                arialabelledby="modalLabel" area-hidden="true" style="">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content" style="">
                                                        <div class="modal-header" style="justify-content: center;">

                                                            <div class="row" style=";">
                                                                <div class="table-responsive" style="margin:30px;">
                                                                    <table id="table_Shift" class="table table-bordered">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">Id Shift</th>
                                                                                <th scope="col">Jam</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            @foreach ($dataShift as $data)
                                                                                <tr>

                                                                                    <td>{{ $data->Shift }}</td>
                                                                                    <td>{{ $data->Jam }}</td>
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


                                    <div class="card-body"
                                        style="flex: 1; margin-right: 10px;margin-left: 10px;border:1px solid black; " >

                                        <div class="card-container" style="display: flex; margin-left:110px;">
                                            <div class="card-body" style="flex: 1;">
                                                <div class="row" style="">
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Masuk&nbsp;:</span>
                                                    </div>
                                                    <div class="form-group col-md-9 mt-3 mt-md-0">

                                                        <input type="time" id="Masuk" name="Masuk" disabled>
                                                    </div>


                                                </div>
                                                <div class="row" style="">
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Keluar&nbsp;:</span>
                                                    </div>
                                                    <div class="form-group col-md-9 mt-3 mt-md-0">

                                                        <input type="time" id="Keluar" name="Keluar" disabled>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="card-body" style="flex: 1;">
                                                <div class="row" style="">
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Istirahat&nbsp;Awal&nbsp;:</span>
                                                    </div>
                                                    <div class="form-group col-md-9 mt-3 mt-md-0">

                                                        <input type="time" id="IstirahatAwal" name="IstirahatAwal" disabled>
                                                    </div>


                                                </div>
                                                <div class="row" style="">
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Istirahat&nbsp;Akhir&nbsp;:</span>
                                                    </div>
                                                    <div class="form-group col-md-9 mt-3 mt-md-0">

                                                        <input type="time" id="IstirahatAkhir" name="IstirahatAkhir" disabled>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="card-body" style="flex: 1;">
                                                <div class="row" style="">
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Datang&nbsp;:</span>
                                                    </div>
                                                    <div class="form-group col-md-9 mt-3 mt-md-0">

                                                        <input type="time" id="Datang" name="Datang" disabled>
                                                    </div>


                                                </div>
                                                <div class="row" style="">
                                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                                        <span class="aligned-text">Pulang&nbsp;:</span>
                                                    </div>
                                                    <div class="form-group col-md-9 mt-3 mt-md-0">

                                                        <input type="time" id="Pulang" name="Pulang" disabled>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div class="row" style="padding-top: 20px;">
                                    <div class="col-6" style="text-align: left; ">
                                        <button type="button" class="btn" style="margin-left: 10px"
                                            id="tambahButton">Tambah</button>
                                        <button type="button" class="btn" style="margin-left: 10px"
                                            id="koreksiButton">Koreksi</button>
                                        <button type="button" class="btn " style="margin-left: 10px"
                                            id="hapusButton">Hapus</button>
                                    </div>
                                    <div class="col-6" style="text-align: right; ">
                                        <button type="button" class="btn " style="margin-left: 50px"
                                            id="prosesButton">Proses</button>
                                        <button type="button" class="btn " style="margin-left: 10px"
                                            id="batalButton">Batal</button>
                                    </div>
                                </div>

                            </div>
                            {{-- <div style="text-align: left; margin: 25px;">
                            <button type="button" class="btn btn-info" style="margin-left: 10px">Tambah</button>
                            <button type="button" class="btn btn-primary" style="margin-left: 10px">Koreksi</button>
                            <button type="button" class="btn btn-danger" style="margin-left: 10px">Hapus</button>
                        </div>
                        <div style="text-align: right; margin: 25px;">
                            <button type="button" class="btn btn-primary" style="margin-left: 50px">Proses</button>
                            <button type="button" class="btn btn-dark" style="margin-left: 10px">Keluar</button>


                        </div> --}}


                            <div class="card-body" style="flex: 1; margin-right: 10px;margin-left: 10px; ">

                                <div class="keterangan2" style="margin: 20px;">
                                    <div class="card-container" style="display: flex; flex-wrap: nowrap; ">
                                        <div class="card-body RDZOverflow RDZMobilePaddingLR0"
                                            style="flex: auto; margin-left: 10px; ">
                                            <div style=" flex-wrap: wrap; width:150px;">
                                                <div style="display: flex; ">
                                                    <span style="margin-right: 10px;">A : Alpha</span>
                                                </div>
                                                <div style="display: flex; align-items: center;">
                                                    <span style="margin-right: 10px;">B : Hari Besar/ Libur</span>
                                                </div>
                                                <div style="display: flex; align-items: center;">
                                                    <span style="margin-right: 10px;">C : Cuti</span>
                                                </div>
                                                <div style="display: flex; align-items: center;">
                                                    <span style="margin-right: 10px;">D : Dispensasi</span>
                                                </div>
                                                <div style="display: flex; align-items: center;">
                                                    <span style="margin-right: 10px;">H : Hamil</span>
                                                </div>
                                                <div style="display: flex; align-items: center;">
                                                    <span style="margin-right: 10px;">K : Skorsing</span>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: auto;  ">
                                            <div style=" flex-wrap: wrap;">
                                                <div style="display: flex; ">
                                                    <span style="margin-right: 10px;">L : Lembur</span>
                                                </div>
                                                <div style="display: flex; align-items: center;">
                                                    <span style="margin-right: 10px;">M : Masuk</span>
                                                </div>
                                                <div style="display: flex; align-items: center;">
                                                    <span style="margin-right: 10px;">N/Z/J : Tanpa Status(mohon
                                                        dikoreksi)</span>
                                                </div>
                                                <div style="display: flex; align-items: center;">
                                                    <span style="margin-right: 10px;">P : Peringatan</span>
                                                </div>
                                                <div style="display: flex; align-items: center;">
                                                    <span style="margin-right: 10px;">S : Sakit</span>
                                                </div>
                                                <div style="display: flex; align-items: center;">
                                                    <span style="margin-right: 10px;">X : Tidak dibayar</span>
                                                </div>



                                            </div>

                                        </div>
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
