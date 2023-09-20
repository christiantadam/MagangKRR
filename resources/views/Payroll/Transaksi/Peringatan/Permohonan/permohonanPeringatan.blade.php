@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Transaksi/Peringatan/Permohonan.js') }}"></script>





    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="width:1200px;">
                    <div class="card-header" style="">Maintenance Peringatan</div>




                    <div class="card-body" style="border: 1px solid black; margin: 10px;">
                        <div class="card-body">

                            <div class="row" style="margin-left:-120px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <label for="TglMulai" class="aligned-text">Tanggal:</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglMulai" name="TglMulai"
                                        value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required
                                        style="max-width: 200px;">


                                </div>

                            </div>

                            <div class="row" style="margin-left:-120px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Divisi:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <input class="form-control" type="text" id="Id_Div" readonly
                                        style="resize: none; height: 40px; max-width: 100px;">
                                    <input class="form-control" type="text" id="Nama_Div" readonly
                                        style="resize: none; height: 40px; max-width: 450px;">
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
                                                            <table id="table_Divisi" class="table table-bordered">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th scope="col">Id Divisi</th>
                                                                        <th scope="col">Nama Divisi</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    {{-- @foreach ($peringatanDivisi as $data)
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
                            <div class="row" style="margin-left:-120px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Kd Pegawai:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <input class="form-control" type="text" id="Id_Peg" readonly
                                        style="resize: none; height: 40px; max-width: 100px;">
                                    <input class="form-control" type="text" id="Nama_Peg" readonly
                                        style="resize: none; height: 40px; max-width: 450px;">
                                    <button type="button" class="btn" style="margin-left: 10px;" data-toggle="modal"
                                        id="pegawaiButton">...</button>
                                    <div class="modal fade" id="modalPegawai" role="dialog" arialabelledby="modalLabel"
                                        area-hidden="true" style="">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content" style="">
                                                <div class="modal-header" style="justify-content: center;">

                                                    <div class="row" style=";">
                                                        <div class="table-responsive" style="margin:30px;">
                                                            <table id="table_Peg" class="table table-bordered">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th scope="col">Id Pegawai</th>
                                                                        <th scope="col">Nama Pegawai</th>

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








                        </div>
                        <div class="data1" style="">
                            <div class="card-body-container" style="display: flex; flex-wrap: wrap; margin: 10px;">
                                <div class="card-body" style="flex: 0 0 50%; max-width: 50%;">

                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Tahun Akhir :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                            <input type="text" class="form-control" name="" id="Tahun_Akhir"
                                                placeholder="" disabled required>
                                        </div>
                                    </div>
                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Peringatan :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                            <input type="text" class="form-control" name=""
                                                id="Peringatan_Ke_Lama" placeholder=""  required>

                                        </div>
                                    </div>

                                </div>
                                <div class="card-body" style="flex: 0 0 50%; max-width: 50%;">

                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Bulan Akhir :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                            <input type="text" class="form-control" name="" id="Bulan_Akhir"
                                                placeholder="" required disabled>

                                        </div>
                                    </div>
                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Tgl Akhir Peringatan :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:180px;">
                                            <input class="form-control" type="date" id="TglPeringatanLama"
                                                name="TglPeringatanLama" required style="max-width: 200px;" disabled>


                                        </div>
                                    </div>

                                </div>



                            </div>






                        </div>


                        <div class="row" style="margin-left:;">
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <span class="aligned-text">Peringatan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <select class="form-control" id="Peringatan_ke" name="Peringatan_ke"
                                    style="resize: none;height: 40px; max-width:450px;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="SUB KERAS">SUB KERAS</option>
                                    <option value="KERAS">KERAS</option>
                                    <option value="PERNYATAAN">PERNYATAAN</option>
                                    <option value="TERAKHIR">TERAKHIR</option>
                                    <option value="SKORSING">SKORSING</option>
                                    {{-- @foreach ($peringatanDivisi as $data)
                                        <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                    @endforeach --}}
                                </select>

                            </div>
                        </div>
                        <div class="row" style="margin-left:;">
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <span class="aligned-text">Bulan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <select class="form-control" id="bulanPeringatan" name="bulanPeringatan"
                                    style="resize: none;height: 40px; max-width:450px;">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>

                            </div>
                        </div>

                        <div class="row" style="margin-left:;">
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <span class="aligned-text">Tahun :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                <input type="text" class="form-control" name="tahunPeringatan" id="tahunPeringatan"
                                    placeholder="" required>

                            </div>
                        </div>
                        <div class="row" style="margin-left:;">
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <span class="aligned-text">No. Surat :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                <input type="text" class="form-control" name="Nomor_Surat" id="Nomor_Surat"
                                    placeholder="" required>

                            </div>
                        </div>
                        <div class="row" style="margin-left:; ">
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <label for="TglMulai" class="aligned-text" style="min-width: fit-content">Tgl.
                                    Mulai:</label>
                            </div>
                            <div class="form-group col-md-4" style="">
                                <input class="form-control" type="date" id="TglMulai" name="TglMulai" required
                                    style="max-width: 200px;">
                                <span class="aligned-text" style="margin-left: 15px; min-width:fit-content;">Tgl. Akhir
                                    :</span>
                                <input class="form-control" type="date" id="TglSelesai" name="TglSelesai" required
                                    style="max-width: 200px;">

                            </div>


                        </div>
                        <div class="row" style="margin-left:;">
                            <div class="form-group col-md-2 d-flex justify-content-end">
                                <span class="aligned-text"> Uraian:</span>
                            </div>
                            <div class="form-group col-md-4" style="max-width:1000px">
                                <textarea class="input" name="Uraian" id="Uraian" cols="60" rows="3" placeholder="Uraian"
                                    style=""></textarea>
                            </div>

                        </div>



                    </div>





                    <div id="form-container"></div>
                    <div class="row" style="padding-top: 20px; margin:20px;">
                        <div class="col-6" style="text-align: left; ">
                            <button type="button" class="btn" style="margin-left: 10px;width:100px;"
                                id="isiButton">Isi</button>
                            <button type="button" class="btn" style="margin-left: 10px;width:100px;"
                                id="simpanButton" hidden>SIMPAN</button>
                            <button type="button" class="btn" style="margin-left: 10px;width:100px;"
                                id="batalButton" hidden>Batal</button>
                            <button type="button" class="btn" style="margin-left: 10px;width:100px;" id="koreksiButton">Koreksi</button>
                            <button type="button" class="btn" style="margin-left: 10px;width:100px;" id="hapusButton">Hapus</button>
                            <button type="button" class="btn" style="margin-left: 10px;width:100px;" id="keluarButton">Keluar</button>

                        </div>
                        <div class="col-6" style="text-align: right; ">


                        </div>
                    </div>
                </div>






            </div>








            <br>







        </div>
    </div>
@endsection
