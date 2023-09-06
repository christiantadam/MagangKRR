@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Master/klinik.js') }}"></script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">PROGRAM Maintenance Karyawan Harian</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="row" style="">
                            <div class="form-group col-md-1 d-flex justify-content-end">
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
                                <button type="button" class="btn" style="margin-left: 10px; " id="klinikButton"
                                    onclick="showModalKlinik()" disabled>...</button>

                                <div class="modal fade" id="modalKlinik" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true" style="">
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
                        <div class="row" style="">
                            <div class="form-group col-md-1 d-flex justify-content-end">
                                <span class="aligned-text">Alamat:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="AlamatKlinik" readonly
                                    style="resize: none; height: 40px; width: 929px;">

                            </div>
                        </div>
                        <div class="row" style="">
                            <div class="form-group col-md-1 d-flex justify-content-end">
                                <span class="aligned-text">Kota:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="KotaKlinik" readonly
                                    style="resize: none; height: 40px; width: 529px;">

                            </div>
                        </div>
                        <div class="row" style="">
                            <div class="form-group col-md-1 d-flex justify-content-end">
                                <span class="aligned-text">No. Telepon:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="NomorTelepon" readonly
                                    style="resize: none; height: 40px; width: 529px;">

                            </div>
                        </div>



                    </div>


                </div>

                <div id="form-container"></div>
                <div style="text-align: right; margin-top: 20px;">


                    <button type="button" class="btn" style="width: 100px" id="isiButton">Isi</button>
                    <button type="button" class="btn" style="width: 100px" id="simpanIsiButton" hidden>Simpan</button>
                    <button type="button" class="btn" style="width: 100px" id="simpanKoreksiButton" hidden>Simpan</button>
                    <button type="button" class="btn" style="width: 100px" id="simpanHapusButton" hidden>Simpan</button>
                    <button type="button" class="btn" style="width: 100px" id="clearButton" hidden>Clear</button>
                    <button type="button" class="btn" style="width: 100px" id="koreksiButton">Koreksi</button>
                    <button type="button" class="btn" style="width: 100px" id="hapusButton">Hapus</button>
                    <button type="button" class="btn" style="width: 100px" id="batalButton" disabled>Batal</button>
                    <button type="button" class="btn" style="width: 100px" id="keluarButton">Keluar</button>
                </div>
            </div>


            </h5>
        </div>

    </div>
@endsection
