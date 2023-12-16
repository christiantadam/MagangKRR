@extends('layouts.appPayroll')
@section('content')
<title style="font-size: 20px">@yield('title', 'Maintenance Keluarga Karyawan')</title>
    <script>
        $("#tabel_Divisi").DataTable({
            order: [
                [0, "asc"]
            ],
        });
    </script>

    <script type="text/javascript" src="{{ asset('js/Master/keluarga.js') }}"></script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="width:1200px;">
                    <div class="card-header" style="">Maintenance Keluarga Karyawan</div>




                    <div class="card-body" style="">
                        <div class="PEKERJA" style="">
                            <div class="card-body-container" style="display: flex; flex-wrap: wrap; margin: 10px;">
                                <div class="card-body" style="flex: 0 0 50%; max-width: 50%;">
                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <input type="radio" id="opsiKerja1" name="opsiKerja" value="Harian" checked
                                                style="vertical-align: middle;">&nbsp;Harian
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input type="radio" id="opsiKerja2" name="opsiKerja" value="Staff"
                                                style="vertical-align: middle;">&nbsp;Staff
                                        </div>
                                    </div>
                                    <div class="row" style="">
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
                                                id="divisiButton" onclick="showModalDivisi()">...</button>

                                            <div class="modal fade" id="modalDivPeg" role="dialog"
                                                arialabelledby="modalLabel" area-hidden="true" style="">
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
                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text"> Karyawan:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input class="form-control" type="text" id="Id_Peg" readonly
                                                style="resize: none; height: 40px; max-width: 100px;">
                                            <input class="form-control" type="text" id="Nama_Peg" readonly
                                                style="resize: none; height: 40px; max-width: 450px;">
                                            <button type="button" class="btn" style="margin-left: 10px;"
                                                id="karyawanButton" onclick="showModalKaryawan()">...</button>
                                            <div class="modal fade" id="modalKaryawan" role="dialog"
                                                arialabelledby="modalLabel" area-hidden="true" style="">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content" style="">
                                                        <div class="modal-header" style="justify-content: center;">

                                                            <div class="row" style=";">
                                                                <div class="table-responsive" style="margin:30px;">
                                                                    <table id="tabel_Karyawan"
                                                                        class="table table-bordered">
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
                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">No. KK :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                            <input type="text" class="form-control" name="KK" id="NomorKK"
                                                placeholder="" required>

                                        </div>
                                    </div>
                                </div>

                                <div class="card-body" style="flex: 0 0 50%; max-width: 50%;">
                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <br>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">PISAT:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input class="form-control" type="text" id="Kd_PISAT" readonly
                                                style="resize: none; height: 40px; max-width: 100px;">
                                            <input class="form-control" type="text" id="PISAT" readonly
                                                style="resize: none; height: 40px; max-width: 450px;">
                                            {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                                style="resize: none; height: 40px; max-width: 250px;">
                                                <option value=""></option>
                                                @foreach ($divisi as $data)
                                                    <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                                @endforeach
                                            </select> --}}
                                            <button type="button" class="btn" style="margin-left: 10px; "
                                                id="modalPisatButton" onclick="showModalPisat()">...</button>

                                            <div class="modal fade" id="modalPisat" role="dialog"
                                                arialabelledby="modalLabel" area-hidden="true" style="">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content" style="">
                                                        <div class="modal-header" style="justify-content: center;">

                                                            <div class="row" style=";">
                                                                <div class="table-responsive" style="margin:30px;">
                                                                    <table id="tabel_PISAT" class="table table-bordered">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">Kode PISAT</th>
                                                                                <th scope="col">PISAT</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($dataPISAT as $data)
                                                                                <tr>

                                                                                    <td>{{ $data->KdPisat }}</td>
                                                                                    <td>{{ $data->Pisat }}</td>



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
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text"> Status Kawin:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input class="form-control" type="text" id="Kd_Kawin" readonly
                                                style="resize: none; height: 40px; max-width: 100px;">
                                            <input class="form-control" type="text" id="Kawin" readonly
                                                style="resize: none; height: 40px; max-width: 450px;">
                                            <button type="button" class="btn" style="margin-left: 10px;"
                                                onclick=showModalKawin()>...</button>
                                            <div class="modal fade" id="modalKawin" role="dialog"
                                                arialabelledby="modalLabel" area-hidden="true" style="">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content" style="">
                                                        <div class="modal-header" style="justify-content: center;">

                                                            <div class="row" style=";">
                                                                <div class="table-responsive" style="margin:30px;">
                                                                    <table id="tabel_Kawin" class="table table-bordered">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">Kd Status</th>
                                                                                <th scope="col">Status</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($dataKawin as $data)
                                                                                <tr>

                                                                                    <td>{{ $data->KdStatus }}</td>
                                                                                    <td>{{ $data->Status }}</td>



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
                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">


                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input type="checkbox" id="checkBPJS">&nbsp;Penanggung BPJS
                                        </div>
                                    </div>

                                </div>
                                <div id="form-container"></div>
                                <div class="col-6" style="text-align: left;">

                                </div>
                                <div class="col-6" style="text-align: right;">
                                    <button type="button" class="btn" style="margin-left: 10px; width:100px;"
                                        id="ClearPekerja">Clear</button>
                                    <button type="button" class="btn " style="margin-left: 10px; width:100px;"
                                        id="SimpanPekerja">Simpan</button>
                                </div>




                            </div>






                        </div>
                        <div class="KELUARGA" style="">
                            <div class="row" style=";">
                                <div class="table-responsive" style="margin:30px;">
                                    <table id="tabel_Keluarga" class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">IdKeluarga</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">IdHubungan</th>
                                                <th scope="col">Hubungan</th>
                                                <th scope="col">JnsKelamin</th>
                                                <th scope="col">KotaLahir</th>
                                                <th scope="col">TglLahir</th>
                                                <th scope="col">KdPisat</th>
                                                <th scope="col">Pisat</th>
                                                <th scope="col">IdKawin</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">NIK</th>
                                                <th scope="col">Id BPJS</th>
                                                <th scope="col">IdKlinik</th>
                                                <th scope="col">Klinik</th>

                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-body-container" style="display: flex; flex-wrap: wrap; margin: 10px;">
                                <div class="card-body" style="flex: 0 0 80%; max-width: 80%;">

                                    <div class="row" style="margin-left:-120px;">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Nama:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input class="form-control" type="text" id="Id_Keluarga" readonly
                                                style="resize: none; height: 40px; max-width: 100px;">
                                            <input class="form-control" type="text" id="Nama_Keluarga"
                                                style="resize: none; height: 40px; max-width: 450px;">

                                            {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                                style="resize: none; height: 40px; max-width: 250px;">
                                                <option value=""></option>
                                                @foreach ($divisi as $data)
                                                    <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                                @endforeach
                                            </select> --}}


                                        </div>
                                    </div>


                                    <div class="row" style="margin-left: -120px;">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Hubungan:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input class="form-control" type="text" id="Id_Hub_Keluarga" readonly
                                                style="resize: none; height: 40px; max-width: 50px;">
                                            <input class="form-control" type="text" id="Status_Hub_Keluarga" readonly
                                                style="resize: none; height: 40px; max-width: 150px;">
                                            <button type="button" class="btn" style="margin-left: 10px;"
                                                onclick=showModalHubungan()>...</button>
                                            <span class="aligned-text" style="margin-left:30px;">&nbsp;Kelamin:</span>
                                            <input type="radio" id="opsiKelamin1" name="opsiKelamin" value="P"
                                                 style="vertical-align: middle;">&nbsp;Perempuan (P)&nbsp;
                                            <input type="radio" id="opsiKelamin2" name="opsiKelamin" value="L"
                                                 style="vertical-align: middle;">&nbsp;Laki-laki (L)
                                            <div class="modal fade" id="modalHubungan" role="dialog"
                                                arialabelledby="modalLabel" area-hidden="true" style="">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content" style="">
                                                        <div class="modal-header" style="justify-content: center;">

                                                            <div class="row" style=";">
                                                                <div class="table-responsive" style="margin:30px;">
                                                                    <table id="tabel_Hubungan"
                                                                        class="table table-bordered">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">Kd Status</th>
                                                                                <th scope="col">Status</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($dataHubungan as $data)
                                                                                <tr>

                                                                                    <td>{{ $data->KdStatus }}</td>
                                                                                    <td>{{ $data->Status }}</td>



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

                                            {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                                        style="resize: none; height: 40px; max-width: 250px;">
                                                        <option value=""></option>
                                                        @foreach ($divisi as $data)
                                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                                        @endforeach
                                                    </select> --}}


                                        </div>
                                    </div>

                                    <div class="row" style="margin-left: -120px;">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Tanggal, Kota Lahir:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input class="form-control" type="date" id="TglLahir" name="TglLahir"
                                                value="{{ old('TglLahir', now()->format('Y-m-d')) }}"
                                                style="width: 150px;" required>
                                            <input class="form-control" type="text" id="Kota_Lahir"
                                                style="resize: none; height: 40px; max-width: 400px;">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left: -120px;">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">PISAT:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input class="form-control" type="text" id="Id_Pisat_Kel" readonly
                                                style="resize: none; height: 40px; max-width: 50px;">
                                            <input class="form-control" type="text" id="Nama_Pisat_Kel" readonly
                                                style="resize: none; height: 40px; max-width: 150px;">
                                            <button type="button" class="btn" style="margin-left: 10px;"
                                                onclick=showModalPisat2()>...</button>
                                            <div class="modal fade" id="modalPisat2" role="dialog"
                                                arialabelledby="modalLabel" area-hidden="true" style="">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content" style="">
                                                        <div class="modal-header" style="justify-content: center;">

                                                            <div class="row" style=";">
                                                                <div class="table-responsive" style="margin:30px;">
                                                                    <table id="tabel_Pisat2"
                                                                        class="table table-bordered">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">Kd Status</th>
                                                                                <th scope="col">Status</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($dataPISAT as $data)
                                                                                <tr>

                                                                                    <td>{{ $data->KdPisat }}</td>
                                                                                    <td>{{ $data->Pisat }}</td>



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
                                    <div class="row" style="margin-left: -120px;">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Status Kawin:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input class="form-control" type="text" id="Id_Status_Kawin_Kel" readonly
                                                style="resize: none; height: 40px; max-width: 50px;">
                                            <input class="form-control" type="text" id="Status_Kawin_Kel" readonly
                                                style="resize: none; height: 40px; max-width: 150px;">
                                            <button type="button" class="btn" style="margin-left: 10px;"
                                                onclick=showModalKawin2()>...</button>
                                            <div class="modal fade" id="modalKawin2" role="dialog"
                                                arialabelledby="modalLabel" area-hidden="true" style="">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content" style="">
                                                        <div class="modal-header" style="justify-content: center;">

                                                            <div class="row" style=";">
                                                                <div class="table-responsive" style="margin:30px;">
                                                                    <table id="tabel_Kawin2"
                                                                        class="table table-bordered">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">Kd Status</th>
                                                                                <th scope="col">Status</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($dataKawin as $data)
                                                                                <tr>

                                                                                    <td>{{ $data->KdStatus }}</td>
                                                                                    <td>{{ $data->Status }}</td>



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
                                    <div class="row" style="margin-left: -120px;">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text"> NIK:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">

                                            <input class="form-control" type="text" id="NIK_Kel"
                                                style="resize: none; height: 40px; max-width: 550px;">

                                        </div>
                                    </div>




                                    <div class="row" style="margin-left: -120px;">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text"> Id BPJS:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">

                                            <input class="form-control" type="text" id="BPJS_Kel"
                                                style="resize: none; height: 40px; max-width: 550px;">

                                        </div>
                                    </div>

                                    <div class="row" style="margin-left: -120px;">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Klinik:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input class="form-control" type="text" id="Id_Klinik_Kel" readonly
                                                style="resize: none; height: 40px; max-width: 100px;">
                                            <input class="form-control" type="text" id="Nama_Klinik_Kel" readonly
                                                style="resize: none; height: 40px; max-width: 405px;">
                                            <button type="button" class="btn" style="margin-left: 10px;"
                                                data-toggle="modal" data-target="#modalKlinik">...</button>
                                            <div class="modal fade" id="modalKlinik" role="dialog"
                                                arialabelledby="modalLabel" area-hidden="true" style="">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content" style="">
                                                        <div class="modal-header" style="justify-content: center;">

                                                            <div class="row" style=";">
                                                                <div class="table-responsive" style="margin:30px;">
                                                                    <table id="tabel_Klinik"
                                                                        class="table table-bordered">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">Kd Status</th>
                                                                                <th scope="col">Status</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($dataKlinik as $data)
                                                                                <tr>

                                                                                    <td>{{ $data->kd_klinik }}</td>
                                                                                    <td>{{ $data->nama_klinik }}</td>



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

                                <div class="card-body" style="flex: 0 0 20%; max-width: 20%;">
                                    <div class="row" style="margin-left: 50px;">
                                        <button type="button" class="btn" id="clearButtonKel"
                                            style="width: 200px;">CLEAR</button>
                                        <div id="form-container"></div>

                                    </div>
                                    <div class="row" style="margin-left: 50px; margin-top: 20px;">
                                        <br>

                                    </div>
                                    <div class="row" style="margin-left: 50px; margin-top: 20px;">
                                        <br>

                                    </div>
                                    <div class="row" style="margin-left: 50px; margin-top: 20px;">
                                        <br>

                                    </div>
                                    <div class="row" style="margin-left: 50px; margin-top: 20px;">
                                        <br>

                                    </div>
                                    <div class="row" style="margin-left: 50px; margin-top: 20px;">
                                        <button type="button" class="btn" id="tambahButtonKel"
                                            style="width: 200px;">TAMBAH</button>
                                            <button type="button" class="btn" id="simpanTambahKel"
                                            style="width: 200px;" hidden>SIMPAN</button>
                                            <button type="button" class="btn" id="simpanKoreksiKel"
                                            style="width: 200px;" hidden>SIMPAN</button>

                                    </div>
                                    <div class="row" style="margin-left: 50px; margin-top: 20px;">
                                        <button type="button" class="btn" id="koreksiButtonKel"
                                            style="width: 200px;">KOREKSI</button>
                                            <button type="button" class="btn" id="batalTambahKel"
                                            style="width: 200px;" hidden>BATAL</button>
                                            <button type="button" class="btn" id="batalKoreksiKel"
                                            style="width: 200px;" hidden>BATAL</button>

                                    </div>
                                    <div class="row" style="margin-left: 50px; margin-top: 20px;">
                                        <button type="button" class="btn" id="hapusButtonKel"
                                            style="width: 200px;">HAPUS</button>

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
@endsection
