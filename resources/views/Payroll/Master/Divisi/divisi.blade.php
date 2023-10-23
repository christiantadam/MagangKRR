@extends('layouts.appPayroll')
@section('content')
<title style="font-size: 20px">@yield('title', 'Maintenance Divisi')</title>
    <style>
        /* Gaya untuk highlight row yang dipilih */
        tr.selected {
            background-color: #6feb75;
            /* Warna highlight */
            /* Atur gaya lainnya sesuai keinginan */
        }
    </style>
    <div class="table-responsive">
        <!-- Isi tabel seperti sebelumnya -->
    </div>

    <style>
        /* Gaya untuk highlight row yang dipilih */
        tr.selected {
            background-color: #ffff99;
            /* Warna highlight */
            /* Atur gaya lainnya sesuai keinginan */
        }
    </style>


    <script type="text/javascript" src="{{ asset('js/Master/Divisi.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance Divisi</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="border: solid black 1px">
                        <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                            <div class="card-body" style="flex: 0 0 15%;">
                                <div class="row" style="margin-left: 50px;">
                                    <button type="button" class="btn" id="isiButton" style="width: 200px;">Isi</button>
                                    <div id="form-container"></div>
                                    <button type="button" class="btn d-none" id="simpanButton"
                                        style="width: 200px;">Simpan</button>
                                    <button type="button" class="btn d-none" id="simpanKoreksiButton"
                                        style="width: 200px;">Simpan</button>
                                </div>
                                <div class="row" style="margin-left: 50px; margin-top: 20px;">
                                    <button type="button" class="btn" id="koreksiButton"
                                        style="width: 200px;">Koreksi</button>
                                    <button type="button" class="btn d-none" id="batalButton"
                                        style="width: 200px;">Batal</button>
                                    <button type="button" class="btn d-none" id="batalKoreksiButton"
                                        style="width: 200px;">Batal</button>
                                </div>
                                <div class="row" style="margin-left: 50px; margin-top: 20px;">
                                    <button type="button" class="btn" id="deleteButton"
                                        style="width: 200px;">Hapus</button>
                                </div>
                            </div>

                            <div class="card-body " style="flex: 1; ">
                                <div class="row" style="margin-left:;">
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
                                        <button type="button" class="btn" style="margin-left: 10px; " id="divisiButton"
                                            onclick="showModalDivisi()" disabled>...</button>

                                        <div class="modal fade" id="modalKdPeg" role="dialog" arialabelledby="modalLabel"
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
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Posisi:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="Kd_Posisi" readonly
                                            style="resize: none; height: 40px; max-width: 100px;">
                                        <input class="form-control" type="text" id="Nama_Posisi" readonly
                                            style="resize: none; height: 40px; max-width: 450px;">
                                        <button type="button" class="btn" id="posisiButton"
                                            style="margin-left: 10px;" onclick="showModalPegawai()">...</button>
                                        <div class="modal fade" id="modalPeg" role="dialog"
                                            arialabelledby="modalLabel" area-hidden="true" style="">
                                            <div class="modal-dialog " role="document">
                                                <div class="modal-content" style="">
                                                    <div class="modal-header" style="justify-content: center;">

                                                        <div class="row" style=";">
                                                            <div class="table-responsive" style="margin:30px;">
                                                                <table id="table_Peg_Lama" class="table table-bordered">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th scope="col">Nama Posisi</th>
                                                                            <th scope="col">Kode Posisi</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($dataPosisi as $data)
                                                                            <tr>

                                                                                <td>{{ $data->Nm_Posisi }}</td>
                                                                                <td>{{ $data->KD_Posisi }}</td>



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
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Manager:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="KD_Manager" readonly
                                            style="resize: none; height: 40px; max-width: 100px;">
                                        <input class="form-control" type="text" id="Nama_Manager" readonly
                                            style="resize: none; height: 40px; max-width: 450px;">
                                        <button type="button" class="btn" id="managerButton"
                                            style="margin-left: 10px;" onclick="showModalManager()"
                                            disabled>...</button>
                                        <div class="modal fade" id="modalManager" role="dialog"
                                            arialabelledby="modalLabel" area-hidden="true" style="">
                                            <div class="modal-dialog " role="document">
                                                <div class="modal-content" style="">
                                                    <div class="modal-header" style="justify-content: center;">

                                                        <div class="row" style=";">
                                                            <div class="table-responsive" style="margin:30px;">
                                                                <table id="table_Manager" class="table table-bordered">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th scope="col">Nama Manager</th>
                                                                            <th scope="col">Kd Manager</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($dataManager as $data)
                                                                            <tr>

                                                                                <td>{{ $data->nama_peg }}</td>
                                                                                <td>{{ $data->kd_Pegawai }}</td>



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
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Jenis:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="id_jenis" readonly
                                            style="resize: none; height: 40px; max-width: 100px;">
                                        <select class="form-control" id="opsiJenis" name="Jenis"
                                            style="resize: none;height: 40px; max-width:450px;" disabled>
                                            <option value="" disabled selected>-- Pilih Jenis --</option>
                                            <option value="S">S-STAFF</option>
                                            <option value="H">H-HARIAN</option>
                                            <option value="B">B-BORONGAN</option>
                                            <option value="L">L-HARIAN LEPAS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Status:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="Id_Status" readonly
                                            style="resize: none; height: 40px; max-width: 100px;">
                                        <select class="form-control" id="opsiStatus" name="Status"
                                            style="resize: none;height: 40px; max-width:450px;" disabled>
                                            <option value="" disabled selected>-- Pilih Status --</option>
                                            <option value="K">K-KONTRAK</option>
                                            <option value="T">T-TETAP</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Jml Jam Sabtu:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="Jml_Jam"
                                            style="resize: none; height: 40px; max-width: 100px;" disabled>


                                    </div>
                                </div>
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Aturan:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">

                                        <select class="form-control" id="opsiAturan" name="Status"
                                            style="resize: none;height: 40px; max-width:550px;" disabled>
                                            <option value="" disabled selected>-- Pilih Aturan --</option>
                                            <option value="1">1-Aturan 1</option>
                                            <option value="2">2-Aturan 2</option>
                                            <option value="3">3-Aturan 3</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Grup Divisi:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="grup_Divisi"
                                            style="resize: none; height: 40px; max-width: 100px;" disabled>


                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabelDivisi">
                                <thead>
                                    <tr>
                                        <th scope="col">Posisi</th>
                                        <th scope="col">IdPosisi</th>
                                        <th scope="col">Nama Divisi</th>
                                        <th scope="col">Id Div</th>
                                        <th scope="col">Manager</th>
                                        <th scope="col">Jenis(H/S/B/L)</th>
                                        <th scope="col">Status(K/T)</th>
                                        <th scope="col">JmlJam</th>
                                        <th scope="col">Aturan</th>
                                        <th scope="col">IdGrupdiv</th>
                                        <th scope="col">KDManager</th>


                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($dataDivisi as $index => $data)
                                        <tr value="{{ $index }}">
                                            <td>{{ $data->Nm_Posisi }}</td>
                                            <td>{{ $data->DivPosisi }}</td>
                                            <td>{{ $data->Nama_Div }}</td>
                                            <td>{{ $data->Id_Div }}</td>
                                            <td>{{ $data->Nama_Peg }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td>{{ $data->KStatus }}</td>
                                            <td>{{ $data->JmlJam }}</td>
                                            <td>{{ $data->Aturan }}</td>
                                            <td>{{ $data->Id_Group_Div }}</td>
                                            <td>{{ $data->No_Kabag }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <br>

            </div>
        </div>
    </div>
@endsection
