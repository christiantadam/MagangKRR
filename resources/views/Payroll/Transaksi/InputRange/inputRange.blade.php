@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Transaksi/inputRange.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">Form Range Absen</div>
                    <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">

                        <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left: 10px;  ">


                        </div>
                    </div>





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
                                        style="resize: none; height: 40px; width: 713px;">
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
                            <div class="row" style="">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Kode&nbsp;Pegawai:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <input class="form-control" type="text" id="Id_Pegawai" readonly
                                        style="resize: none; height: 40px; width: 200px;">
                                    <input class="form-control ml-3" type="text" id="Nama_Pegawai" readonly
                                        style="resize: none; height: 40px; width: 713px;">
                                    {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                        style="resize: none; height: 40px; max-width: 250px;">
                                        <option value=""></option>
                                        @foreach ($divisi as $data)
                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                        @endforeach
                                    </select> --}}
                                    <button type="button" class="btn" style="margin-left: 10px; " id="pegawaiButton"
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
                                                                        <th scope="col">Id Pegawai</th>
                                                                        <th scope="col">Nama Pegawai</th>

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
                                style="flex: 1; margin-right: 10px; border: 1px solid #000000; border-radius: 3px; ">

                                <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="margin-left:-105px; ">



                                    <br>
                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
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

                                        </div>


                                    </div>


                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Keterangan:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <select class="form-control" id="Keterangan" name="Keterangan"
                                                style="resize: none;height: 40px; max-width:150px;" onchange="toggleButton()">
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="H">H</option>
                                                <option value="I">I</option>
                                                <option value="K">K</option>
                                                <option value="M">M</option>
                                                <option value="P">P</option>
                                                <option value="S">S</option>
                                                <option value="X">X</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Alasan:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Alasan" id="Alasan"
                                                placeholder="" required>

                                        </div>
                                    </div>
                                    <div class="row" style="">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Klinik:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input class="form-control" type="text" id="Id_Klinik" readonly
                                                style="resize: none; height: 40px; width: 200px;">
                                            <input class="form-control ml-3" type="text" id="Nama_Klinik" readonly
                                                style="resize: none; height: 40px; width: 713px;">
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

                                                                            @foreach ($dataKlinik as $data)
                                                                                <tr>

                                                                                    <td>{{ $data->kd_klinik }}</td>
                                                                                    <td>{{ $data->nama_klinik }}</td>
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






                                </div>
                            </div>
                            <div id="form-container"></div>
                            <div class="row" style="padding-top: 20px;">
                                <div class="col-6" style="text-align: left; ">
                                    <button type="button" class="btn " style="" id="tambahButton">Tambah</button>
                                    <button type="button" class="btn" id="hapusButton"
                                        style="margin-left: 10px">Hapus</button>
                                </div>
                                <div class="col-6" style="text-align: right; ">
                                    <button type="button" class="btn "
                                        style="margin-left: 10px" id="prosesButton" disabled>Proses</button>
                                    <button type="button" class="btn " style="margin-left: 10px" id="batalButton" disabled>Batal</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="keterangan2" style="margin: 20px;">
                                <div class="card-container" style="display: flex; flex-wrap: nowrap; ">

                                    <div class="card-body RDZOverflow RDZMobilePaddingLR0"
                                        style="flex: auto; margin-left: 10px; ">
                                        <div style=" flex-wrap: wrap; width:150px;">
                                            <div style="display: flex; ">
                                                <span style="margin-right: 10px;">A : Alpha</span>
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
                                                <span style="margin-right: 10px;">I : Ijin</span>
                                            </div>
                                            <div style="display: flex; align-items: center;">
                                                <span style="margin-right: 10px;">K : Skorsing</span>
                                            </div>
                                            <div style="display: flex; align-items: center;">
                                                <span style="margin-right: 10px;">S : Sakit</span>
                                            </div>
                                            <div style="display: flex; align-items: center;">
                                                <span style="margin-right: 10px;">X : Tidak Dibayar</span>
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
