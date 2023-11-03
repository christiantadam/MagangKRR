@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Transaksi/Mutasi/mutasiStaff.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="width:1000px;">
                    <div class="card-header" style="">Mutasi Harian</div>
                    <div class="card-body" style="">
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <div class="col">

                                <div class="form-check form-check-inline seperate">
                                    <input class="form-check-input custom-radio ml-3" type="radio" name="unit"
                                        value="kg" checked>
                                    <label class="form-check-label rounded-circle custom-radio"
                                        for="kgRadio">Harian</label>
                                </div>
                                <div class="form-check form-check-inline" style="margin-left:25px;">
                                    <input class="form-check-input custom-radio" type="radio" name="unit"
                                        value="yard">
                                    <label class="form-check-label rounded-circle custom-radio"
                                        for="yardRadio">Staff</label>
                                </div>

                            </div>
                        </div>






                    </div>










                    <div class="mutasi1" style="">
                        <div class="row" style="">
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <label for="TglMulai" class="aligned-text">Tanggal:</label>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="date" id="TglMutasi" name="TglMutasi"
                                    value="{{ old('TglMutasi', now()->format('Y-m-d')) }}" disabled
                                    style="max-width: 200px;">
                                <button type="button" class="btn btn-light" style="margin-left: 10px" id="buttonListData"
                                    onclick=showModalData() disabled>List Data</button>
                                <div class="modal fade" id="modalData" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true" style="">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content" style="">
                                            <div class="modal-header" style="justify-content: center;">

                                                <div class="row" style=";">
                                                    <div class="table-responsive" style="margin:30px;">
                                                        <table id="tabel_Data" class="table table-bordered">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th scope="col">Nama</th>
                                                                    <th scope="col">Kd Peg</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>



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
                                <span class="aligned-text">Kd Pegawai:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Pegawai"
                                    style="resize: none; height: 40px; width: 100px;"disabled>
                                <input class="form-control ml-3" type="text" id="Nama_Pegawai"
                                    style="resize: none; height: 40px; width: 263px;"disabled>
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                        style="resize: none; height: 40px; max-width: 250px;">
                                        <option value=""></option>
                                        @foreach ($divisi as $data)
                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                        @endforeach
                                    </select> --}}

                            </div>
                        </div>
                        <div class="row" style="">
                            <div class="form-group col-md-2 d-flex justify-content-end">
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

                            </div>
                        </div>


                        <div class="row" style="">
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <span class="aligned-text">Jabatan :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="jabatan_Lama"
                                    id="jabatan_Lama" placeholder="" style="width:480px;" required>

                            </div>
                        </div>





                    </div>

                    <div class="mutasi2" style="">

                        <div class="row" style="">
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <span class="aligned-text">Divisi:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Divisi_Baru"
                                    style="resize: none; height: 40px; width: 100px;" disabled>
                                <input class="form-control ml-3" type="text" id="Nama_Divisi_Baru"
                                    style="resize: none; height: 40px; width: 263px;" disabled>
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                        style="resize: none; height: 40px; max-width: 250px;">
                                        <option value=""></option>
                                        @foreach ($divisi as $data)
                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                        @endforeach
                                    </select> --}}
                                <button type="button" class="btn" style="margin-left: 10px; "
                                    id="divisiBaruButton">...</button>


                                <div class="modal fade" id="modalDivisiBaru" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true" style="">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content" style="">
                                            <div class="modal-header" style="justify-content: center;">

                                                <div class="row" style=";">
                                                    <div class="table-responsive" style="margin:30px;">
                                                        <table id="tabel_DivisiBaru" class="table table-bordered">
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
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <span class="aligned-text">Manager:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Manager"
                                    style="resize: none; height: 40px; width: 100px;"disabled>
                                <input class="form-control ml-3" type="text" id="Nama_Manager"
                                    style="resize: none; height: 40px; width: 263px;"disabled>
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                        style="resize: none; height: 40px; max-width: 250px;">
                                        <option value=""></option>
                                        @foreach ($divisi as $data)
                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                        @endforeach
                                    </select> --}}
                                <button type="button" class="btn" style="margin-left: 10px; "
                                    id="managerButton">...</button>


                                <div class="modal fade" id="modalManager" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true" style="">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content" style="">
                                            <div class="modal-header" style="justify-content: center;">

                                                <div class="row" style=";">
                                                    <div class="table-responsive" style="margin:30px;">
                                                        <table id="tabel_Manager" class="table table-bordered">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th scope="col">Nama Pegawai</th>
                                                                    <th scope="col">Id Pegawai</th>

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
                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Kd Pegawai :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:240px;">
                                <input type="text" class="form-control" name="Kd_Pegawai_Baru"
                                    id="Kd_Pegawai_Baru" placeholder="" disabled>

                            </div>
                        </div>

                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Jabatan :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                <input type="text" class="form-control" name="jabatan_Baru"
                                    id="jabatan_Baru" placeholder="" required>

                            </div>
                        </div>
                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Prioritas :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                <input type="text" class="form-control" name="Prioritas"
                                    id="Prioritas" placeholder="" required>

                            </div>
                        </div>
                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">No Surat :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                <input type="text" class="form-control" name="nomor_surat"
                                    id="nomor_surat" placeholder="" required>

                            </div>
                        </div>
                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Alasan Mutasi :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                <input type="text" class="form-control" name="alasan_mutasi"
                                    id="alasan_mutasi" placeholder="" required>

                            </div>
                        </div>





                    </div>




                    <div class="row" style=" margin:20px;">
                        <div class="col-6" style="text-align: left; ">
                            <button type="button" class="" style="margin-left: 10px;width:80px;" id="simpanButton" hidden>SIMPAN</button>
                            <button type="button" class="" style="margin-left: 10px;width:80px;" id="batalButton" hidden>BATAL</button>
                            <button type="button" class="" style="margin-left: 10px;width:80px;" id="isiButton">ISI</button>
                            <button type="button" class="" style="margin-left: 10px;width:80px;" id="koreksiButton">KOREKSI</button>
                            <button type="button" class="" style="margin-left: 10px;width:80px;" id="hapusButton">HAPUS</button>
                            <button type="button" class="" style="margin-left: 10px;width:80px;" id="keluarButton">KELUAR</button>

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
