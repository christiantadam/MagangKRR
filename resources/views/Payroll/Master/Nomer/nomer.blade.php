@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Master/nomer.js') }}"></script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card">
                    <div class="card-header">PEKERJA</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px">
                        <div class="row" style="margin-left:;">
                            <div class="form-group col-md-1 d-flex justify-content-end">
                                <span class="aligned-text">Divisi:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Div" readonly
                                    style="resize: none; height: 40px; max-width: 200px;">
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
                                <button type="button" class="btn" style="margin-left: 30px; " id="listDataButton">List
                                    Data</button>

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
                        <br>
                        <div class="table-responsive">
                            <table id="table_ListPegawai" class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">JNSPEG</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIK</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Kota</th>
                                        <th scope="col">TGL MASUK AWAL</th>
                                        <th scope="col">TGL MASUK</th>
                                        <th scope="col">KARTU</th>
                                        <th scope="col">INDUK</th>
                                        <th scope="col">RBH</th>
                                        <th scope="col">ASTEK</th>
                                        <th scope="col">KOPERASI</th>
                                        <th scope="col">TGL KOPERASI</th>
                                        <th scope="col">NPWP</th>
                                        <th scope="col">No. Rek</th>
                                        <th scope="col">No. BPJS</th>
                                        <th scope="col">Penanggung</th>
                                        <th scope="col">NM_IBU_KANDUNG</th>
                                        <th scope="col">IdKlinik</th>
                                        <th scope="col">Klinik</th>
                                        <th scope="col">JABATAN</th>
                                        <th scope="col">NO PENSIUN</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">NO. TELEPON</th>
                                        <th scope="col">VAKSIN</th>
                                        <th scope="col">TEMPAT_LAHIR</th>
                                        <th scope="col">TGL_LAHIR</th>
                                        <th scope="col">KARTU_MAKAN</th>
                                        <th scope="col">Rek.BCA</th>
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
                    <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                        <div class="card-body" style="flex: 1; margin-right: 10px;">
                            <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px">


                                <div style="display: flex; flex-wrap: nowrap;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Kd Pegawai</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <input class="form-control" type="text" id="KdPeg" readonly
                                                style="resize: none; height: 40px; max-width: 100px;">
                                            <input class="form-control" type="text" id="NomorKartu" readonly
                                                style="resize: none; height: 40px; max-width: 100px; margin-right:-16px;">
                                            <input class="form-control ml-3" type="text" id="NamaPeg" readonly
                                                style="resize: none; height: 40px; max-width: 900px; ">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div style="display: flex; flex-wrap: nowrap;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Alamat</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="Alamat" name="" style="resize: none;height: 40px;" required></textarea>
                                            <textarea class="form-control" id="Kota" name="" style="resize: none;height: 40px;max-width:120px;"
                                                required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div style="display: flex; flex-wrap: nowrap; align-items: center;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="margin-right: 10px;">Tempat, Tanggal Lahir</label>
                                        <div style="display: flex; align-items: center;">
                                            <textarea class="form-control" id="TempatLahir" name="TempatLahir" style="resize: none; height: 40px;" required></textarea>
                                            <input class="form-control" type="date" id="TglLahir" name="TglLahir"
                                                required>

                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div style="display: flex; flex-wrap: nowrap; align-items: center;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="margin-right: 10px;">Tgl Masuk</label>
                                        <div style="display: flex; align-items: center;">
                                            <input class="form-control" type="date" id="TglMasuk" name="TglLapor"
                                                value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>


                                        </div>

                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="margin-right: 10px;">Tgl Masuk Awal</label>
                                        <div style="display: flex; align-items: center;">
                                            <input class="form-control" type="date" id="TglMasukAwal" name="TglLapor"
                                                value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>


                                        </div>

                                    </div>



                                </div>
                                <br>
                                <div style="display: flex; flex-wrap: nowrap; align-items: center;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">Jabatan</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="Jabatan" name="" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Jenis Pegawai</label>
                                        <select class="form-control" id="JnsPegs" name="JnsPeg"
                                            style="resize: none;height: 40px;" required>
                                            <option value="0">0 (Staff)</option>
                                            <option value="1">1 (Harian)</option>
                                            <option value="2">2 (Borongan)</option>
                                            <option value="3">3 (Harian Lepas)</option>
                                        </select>
                                    </div>



                                </div>
                                <br>
                                <div style="display: flex; flex-wrap: nowrap; align-items: center;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">No. Induk</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NomorInduk" name="" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">Kartu Makan</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="Kartu" name="" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div style="display: flex; flex-wrap: nowrap; align-items: center;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">NIK</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NIK" name="" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">NPWP</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NPWP" name="" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>



                                </div>
                                <br>
                                <div style="display: flex; flex-wrap: nowrap; align-items: center;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">No. Rek</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NomorRekening" name="" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">No. Rek BCA</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NomorRekeningBCA" name="" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>



                                </div>
                                <br>
                                <div style="display: flex; flex-wrap: nowrap; align-items: center;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">No. Koperasi</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NomorKoperasi" name="" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="margin-right: 10px;">Tgl Koperasi</label>
                                        <div style="display: flex; align-items: center;">
                                            <input class="form-control" type="date" id="TglKoperasi"
                                                name="TglKoperasi" required>

                                        </div>
                                    </div>



                                </div>





                                <div class="permohonan-s-p-container20">

                                </div>

                            </div>
                        </div>
                        <div class="card-body" style="flex: 1; margin-left: 10px;">
                            <div class="card-body RDZOverflow RDZMobilePaddingLR0">

                                <div style="flex: 1; margin-right: 10px;">
                                    <label style="display: inline-block; margin-right: 5px;">No. RBH</label>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <textarea class="form-control" id="NomorRBH" name="" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                </div>
                                <br>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label style="display: inline-block; margin-right: 5px;">No. Astek</label>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <textarea class="form-control" id="NomorAstek" name="" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                </div>
                                <br>
                                <div style="display: flex; flex-wrap: nowrap; align-items: center;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">No. BPJS</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NomorBPJS" name="" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px; margin-top: 40px;">
                                        <input type="checkbox" id="checkBPJS">
                                        <label for="staff">Penanggung BPJS</label>
                                    </div>
                                </div>
                                <br>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label style="display: inline-block; margin-right: 5px;">Nama Ibu Kandung</label>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <textarea class="form-control" id="NamaIbu" name="" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                </div>
                                <br>


                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Klinik</label>
                                    <div class="form-group  mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="IdKlinik" readonly
                                            style="resize: none; height: 40px; max-width: 100px;">
                                        <input class="form-control ml-3" type="text" id="NamaKlinik" readonly
                                            style="resize: none; height: 40px; max-width: 900px;">
                                        {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                            style="resize: none; height: 40px; max-width: 250px;">
                                            <option value=""></option>
                                            @foreach ($divisi as $data)
                                                <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                            @endforeach
                                        </select> --}}
                                        <button type="button" class="btn" style="margin-left: 10px; "
                                            id="divisiButton" data-toggle="modal" data-target="#modalKlinik">...</button>

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
                                                                            <th scope="col">Kode Klinik</th>
                                                                            <th scope="col">Nama Klinik</th>

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
                                    <br>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">No Pensiun</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NomorPensiun" name="" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">Email</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="email" name="" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">No Telepon</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NomorTelepon" name="" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">Vaksin Covid 19</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <div style="padding: 10px">
                                                <input type="radio" id="vaksin1" name="vaksin" value="0"
                                                    style="vertical-align: middle;">
                                                <label for="staff"
                                                    style="display: inline-block; margin-right: 5px;">Belum</label>
                                            </div>

                                            <div style="padding: 10px">
                                                <input type="radio" id="vaksin2" name="vaksin" value="1"
                                                    style="vertical-align: middle;">
                                                <label for="bukanStaff"
                                                    style="display: inline-block; margin-right: 5px;">Tahap 1</label>
                                            </div>

                                            <div style="padding: 10px">
                                                <input type="radio" id="vaksin3" name="vaksin" value="2"
                                                    style="vertical-align: middle;">
                                                <label for="bukanStaff"
                                                    style="display: inline-block; margin-right: 5px;">Tahap 2</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div id="form-container"></div>
                                    <div style="text-align: right; margin-top: 20px;">
                                        <button type="button" class="btn " id="TambahButton">SIMPAN</button>
                                        <button type="button" class="btn " id="KeluarButton">KELUAR</button>
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
