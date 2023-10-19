@extends('layouts.appPayroll')
@section('content')
<title style="font-size: 20px">@yield('title', 'Maintenance Karyawan Harian')</title>
    <script type="text/javascript" src="{{ asset('js/Master/karyawanHarian.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card" style="width:1344px;">
                    <div class="card-header">Maintenance Karyawan Harian</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">

                        <div class="row" style="margin-left:-250px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Posisi:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">

                                <input class="form-control" type="text" id="Kd_Posisi" disabled
                                    style="resize: none; height: 40px; max-width: 100px;">
                                <input class="form-control" type="text" id="Nama_Posisi" disabled
                                    style="resize: none; height: 40px; max-width: 450px;">
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                    style="resize: none; height: 40px; max-width: 250px;">
                                    <option value=""></option>
                                    @foreach ($divisi as $data)
                                        <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                    @endforeach
                                </select> --}}
                                <button type="button" class="btn" style="margin-left: 10px; " id="posisiButton"
                                    onclick="showModalPosisi()" disabled>...</button>

                                <div class="modal fade" id="modalPosisi" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true" style="">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content" style="">
                                            <div class="modal-header" style="justify-content: center;">
                                                <div class="row" style=";">
                                                    <div class="table-responsive" style="margin:30px;">
                                                        <table id="tabel_Posisi" class="table table-bordered">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th scope="col">Kd Posisi</th>
                                                                    <th scope="col">Nama Posisi</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($dataPosisi as $data)
                                                                    <tr>

                                                                        <td>{{ $data->KD_Posisi }}</td>
                                                                        <td>{{ $data->Nm_Posisi }}</td>



                                                                    </tr>
                                                                @endforeach

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
                        <div class="row" style="margin-left:-250px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Divisi:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">

                                <input class="form-control" type="text" id="Id_Div" disabled
                                    style="resize: none; height: 40px; max-width: 100px;">
                                <input class="form-control" type="text" id="Nama_Div" disabled
                                    style="resize: none; height: 40px; max-width: 450px;">
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                    style="resize: none; height: 40px; max-width: 250px;">
                                    <option value=""></option>
                                    @foreach ($divisi as $data)
                                        <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                    @endforeach
                                </select> --}}
                                <button type="button" class="btn" style="margin-left: 10px; " id="divisiButton"
                                    onclick="showModalDivisi()" disabled>...</button>

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
                        <div class="row" style="margin-left:-250px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Kd Pegawai:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">

                                <input class="form-control" type="text" id="Id_Peg" disabled
                                    style="resize: none; height: 40px; max-width: 100px;">
                                <input class="form-control" type="text" id="Nama_Peg" disabled
                                    style="resize: none; height: 40px; max-width: 450px;">
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                    style="resize: none; height: 40px; max-width: 250px;">
                                    <option value=""></option>
                                    @foreach ($divisi as $data)
                                        <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                    @endforeach
                                </select> --}}
                                <button type="button" class="btn" style="margin-left: 10px; " id="pegawaiButton"
                                    onclick="showModalPegawai()" disabled>...</button>

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
                                                                    <th scope="col">Kd Pegawai</th>
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
                        <div class="card-body-container"
                            style="display: flex; flex-wrap: wrap;margin-top:-20px;margin-bottom:-20px; margin-left:27px; ">
                            <div class="card-body" style="flex: 0 0 30%; max-width: 30%;">
                                <div class="row" style="margin-left:7px;">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">No.Induk:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                        <input type="text" class="form-control" name="induk" id="NomorInduk"
                                            placeholder="" disabled>

                                    </div>
                                </div>
                            </div>
                            <div class="card-body" style="flex: 0 0 25%; max-width: 25%;margin-left:25px;">
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">No.Kartu:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                        <input type="text" class="form-control" name="Kartu" id="NomorKartu"
                                            placeholder="" disabled>

                                    </div>
                                </div>
                            </div>
                            <div class="card-body" style="flex: 0 0 45%; max-width: 45%;margin-left:-25px;">
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Shift:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">

                                        <input class="form-control" type="text" id="Id_Shift" readonly
                                            style="resize: none; height: 40px; max-width: 100px;">
                                        <input class="form-control" type="text" id="Jam" readonly
                                            style="resize: none; height: 40px; max-width: 450px;">
                                        {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                            style="resize: none; height: 40px; max-width: 250px;">
                                            <option value=""></option>
                                            @foreach ($divisi as $data)
                                                <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                            @endforeach
                                        </select> --}}
                                        <button type="button" class="btn" style="margin-left: 10px; "
                                            id="divisiButton" onclick="showModalShift()">...</button>

                                        <div class="modal fade" id="modalShift" role="dialog"
                                            arialabelledby="modalLabel" area-hidden="true" style="">
                                            <div class="modal-dialog " role="document">
                                                <div class="modal-content" style="">
                                                    <div class="modal-header" style="justify-content: center;">

                                                        <div class="row" style=";">
                                                            <div class="table-responsive" style="margin:30px;">
                                                                <table id="tabel_Shift" class="table table-bordered">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th scope="col">Id Divisi</th>
                                                                            <th scope="col">Nama Divisi</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($dataShift as $data)
                                                                            <tr>

                                                                                <td>{{ $data->Shift }}</td>
                                                                                <td>{{ $data->Jam }}</td>



                                                                            </tr>
                                                                        @endforeach

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
                        <div class="row" style="margin-left:-250px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Alamat:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="">
                                <input type="text" class="form-control" name="Alamat" id="Alamat" placeholder=""
                                    disabled>

                            </div>
                        </div>
                        <div class="card-body-container"
                            style="display: flex; flex-wrap: wrap;margin-top:-20px;margin-bottom:-20px; ">
                            <div class="card-body" style="flex: 0 0 50%; max-width: 50%;margin-left:-25px;">
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Kota:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                        <input type="text" class="form-control" name="kota" id="namaKota"
                                            placeholder="" disabled>

                                    </div>
                                </div>
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">NIK:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                        <input type="text" class="form-control" name="NIK" id="NIK"
                                            placeholder="" disabled>

                                    </div>
                                </div>
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Tmp. Tgl Lahir:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                        <input type="text" class="form-control" name="tempat" id="tempatLahir"
                                            placeholder="" disabled>
                                        <input class="form-control" type="date" id="TglLahir" name="TglLahir"
                                            style="width: 150px;" disabled>
                                    </div>
                                </div>
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Agama:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                        <input type="text" class="form-control" name="Agama" id="Agama"
                                            placeholder="" disabled>

                                    </div>
                                </div>
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Pendidikan:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                        <input type="text" class="form-control" name="Pendidikan" id="Pendidikan"
                                            placeholder="" disabled>

                                    </div>
                                </div>
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">No. Rek:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                        <input type="text" class="form-control" name="Rek" id="NomorRek"
                                            placeholder="" disabled>

                                    </div>
                                </div>
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Tgl Masuk:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="">
                                        <input class="form-control" type="date" id="TglMasuk" name="TglMasuk"
                                            style="width: 150px;" disabled>
                                        <span class="aligned-text" style="margin-left: 13px;">Tgl Masuk Awal:</span>
                                        <input class="form-control" type="date" id="TglMasukAwal" name="TglMasukAwal"
                                            style="width: 150px;margin-left:20px;" disabled>
                                    </div>
                                </div>
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Tgl Awal Kontrak:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="">
                                        <input class="form-control" type="date" id="TglAwalKontrak" name="TglLahir"
                                            style="" disabled>

                                    </div>
                                </div>
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Jabatan</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                        <input type="text" class="form-control" name="Jabatan" id="Jabatan"
                                            placeholder="" disabled>

                                    </div>
                                </div>
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">No. Koperasi:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                        <input type="text" class="form-control" name="Koperasi" id="NomorKop"
                                            placeholder="" disabled>

                                    </div>
                                </div>
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">N P W P:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                        <input type="text" class="form-control" name="NPWP" id="NPWP"
                                            placeholder="" disabled>

                                    </div>
                                </div>
                            </div>
                            <div class="card-body" style="flex: 0 0 50%; max-width: 50%;">
                                <div class="row" style="height:54px">

                                </div>
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Tinggi Badan:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="width:480px;">
                                        <input type="text" class="form-control" name="badan" id="TinggiBadan"
                                            placeholder="" style="width:125px;" disabled>
                                        <span class="aligned-text" style="margin-left: 45px">Berat Badan:</span>
                                        <input type="text" class="form-control" name="badan" id="BeratBadan"
                                            placeholder="" style="width:125px;margin-left: 20px;" disabled>
                                    </div>
                                </div>
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Jns Kelamin [W/L]:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="width:480px;">
                                        <input type="text" class="form-control" name="kelamin" id="JenisKelamin"
                                            placeholder="" style="width:125px;" disabled>

                                    </div>
                                </div>
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Kawin [Y/T]:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="width:480px;">
                                        <input type="text" class="form-control" name="kawin" id="StatusKawin"
                                            placeholder="" style="width:125px;" disabled>
                                        <span class="aligned-text" style="margin-left: 20px">Jml Tanggungan:</span>
                                        <input type="text" class="form-control" name="tanggungan" id="JmlTanggungan"
                                            placeholder="" style="width:125px;margin-left: 20px;" disabled>
                                    </div>
                                </div>
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">No Astek:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                        <input type="text" class="form-control" name="astek" id="NomorAstek"
                                            placeholder="" disabled>

                                    </div>
                                </div>
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">No RBH:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                        <input type="text" class="form-control" name="RBH" id="NomorRBH"
                                            placeholder="" disabled>

                                    </div>
                                </div>
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Tgl Masuk Kop:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="">
                                        <input class="form-control" type="date" id="TglMasukKop" name="Koperasi"
                                            style="" disabled>

                                    </div>
                                </div>
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Tgl Akhir Kontrak:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="">
                                        <input class="form-control" type="date" id="TglAkhirKontrak" name="Kontrak"
                                            style="" disabled>

                                    </div>
                                </div>
                                <div class="row" style="">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Golongan:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                        <input type="text" class="form-control" name="golongan" id="Golongan"
                                            placeholder="" disabled>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="UPAH" style="max-width: 70%;">
                            <div class="card-body-container" style="display: flex; flex-wrap: wrap; margin: 10px;">
                                <div class="card-body" style="flex: 0 0 50%; max-width: 50%;">
                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">U. Pokok:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                            <input type="text" class="form-control" name="upah" id="upahPokok"
                                                placeholder="" disabled>

                                        </div>
                                    </div>
                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">U. Jenjang:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                            <input type="text" class="form-control" name="upah" id="upahJenjang"
                                                placeholder="" disabled>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="flex: 0 0 50%; max-width: 50%;">
                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Tunj.&nbsp;Jabatan:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                            <input type="text" class="form-control" name="upah"
                                                id="TunjanganJabatan" placeholder="" disabled>

                                        </div>
                                    </div>
                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">U.&nbsp;Golongan:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                            <input type="text" class="form-control" name="upah" id="upahGolongan"
                                                placeholder="" disabled>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="form-container"></div>
                    <div style="text-align: left; margin: 20px;">


                        <button type="button" class="btn " style="width:75px;" id="isiButton">Isi</button>
                        <button type="button" class="btn " style="width:75px;" id="SimpanIsiButton"
                            hidden>SIMPAN</button>
                        <button type="button" class="btn " style="width:75px;" id="SimpanKoreksiButton"
                            hidden>SIMPAN</button>
                        <button type="button" class="btn " style="width:75px;" id="KoreksiButton">Koreksi</button>
                        <button type="button" class="btn " style="width:75px;" id="BatalIsiButton"
                            hidden>BATAL</button>
                        <button type="button" class="btn " style="width:75px;" id="BatalKoreksiButton"
                            hidden>BATAL</button>
                        <button type="button" class="btn " style="width:75px;" id="HapusButton">Hapus</button>
                        <button type="button" class="btn " style="width:75px;" id="keluarButton">Keluar</button>
                    </div>
                </div>
                <br>


            </div>
        </div>
    </div>
@endsection
