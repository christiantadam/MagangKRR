@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/MaintenanceIjin/FormKoreksiIjinKaryawan.js') }}"></script>
    <div class="form-wrapper mt-4">
        <div class="form-container">
            <div class="card" style="width:1700px;margin-left:-300px;">
                <div class="card-header">Form Koreksi Ijin Karyawan</div>
                <div class="card-body-container" style="display: flex; flex-wrap : wrap;">
                    <div class="card-body" style="flex: 0 0 50%; max-width: 50%;">
                        <div class="form berat_woven">
                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Tanggal Ijin:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <input type="date" class="form-control" name="tanggal_Ijin" id="tanggal_Ijin"
                                        style="width:200px;" required>
                                </div>
                            </div>

                            <div class="row" >
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
                                    <span class="aligned-text">Kode Pegawai:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <input class="form-control" type="text" id="Id_Peg" readonly
                                        style="resize: none; height: 40px; max-width: 100px;">
                                    <input class="form-control" type="text" id="Nama_Peg" readonly
                                        style="resize: none; height: 40px; max-width: 450px;">
                                    <button type="button" class="btn" style="margin-left: 10px;" id="pegawaiButton"
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

                            <div class="row mt-3">
                                <div class="col- row justify-content-md-center">
                                    <div class="text-center col-md-auto"><button type=""
                                            id="buttonTampilData">Tampilkan
                                            Data</button>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-header">Data </div>
                                <div class="row" style=";">
                                    <div class="table-responsive" style="margin:30px;">
                                        <table id="table_Ijin" class="table table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Kd_Pegawai</th>
                                                    <th scope="col">Nama_Peg</th>
                                                    <th scope="col">Jns_Keluar</th>
                                                    <th scope="col">Kembali</th>
                                                    <th scope="col">Keluar</th>
                                                    <th scope="col">Pulang</th>
                                                    <th scope="col">Jenis_Alasan</th>
                                                    <th scope="col">Keterangan</th>
                                                    <th scope="col">Menyetujui</th>
                                                    <th scope="col">Timeinput</th>
                                                    <th scope="col">Timeupdate</th>
                                                    <th scope="col">User_id</th>
                                                    <th scope="col">Id_Div</th>

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
                        <br>

                        <div id="form-container"></div>

                    </div>
                    <div class="card-body" style="flex: 0 0 50%; max-width: 50%;">
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Kode Pegawai:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="Kode_pegawai" id="Kode_pegawai"
                                    placeholder="Kode Pegawai" required>
                                <input type="text" class="form-control mt-r-l" name="Nama_pegawai" id="Nama_pegawai"
                                    placeholder="Nama Pegawai" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Tanggal Ijin:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="Date" class="form-control" name="Ijin" id="TanggalIjin"
                                    placeholder="Ijin" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Keterangan:</span>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex align-items-center" style="justify-content: center;">
                                        <div class="form-check form-check-inline seperate">
                                            <input class="form-check-input custom-radio ml-3" type="radio"
                                                name="cekKembali" value="" id="kembali" checked>
                                            <label class="form-check-label rounded-circle custom-radio"
                                                for="">Kembali</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input custom-radio" type="radio" name="cekKembali"
                                                value="" id="tidakKembali">
                                            <label class="form-check-label rounded-circle custom-radio"
                                                for="">Tidak
                                                Kembali</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Jam Ijin Keluar:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="Time" class="form-control" name="Ijin" id="IjinKeluar"
                                    placeholder="Ijin" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Jam Kembali:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="Time" class="form-control" name="Ijin" id="IjinKembali"
                                    placeholder="Ijin" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Keperluan:</span>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex align-items-center" style="justify-content: center;">
                                        <div class="form-check form-check-inline seperate">
                                            <input class="form-check-input custom-radio ml-3" type="radio"
                                                name="cekDinas" value="" id="Dinas" checked>
                                            <label class="form-check-label rounded-circle custom-radio"
                                                for="">Dinas</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input custom-radio" type="radio" name="cekDinas"
                                                value="" id="nonDinas">
                                            <label class="form-check-label rounded-circle custom-radio" for="">Non
                                                Dinas</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Kategori Permohonan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <select id="kategoriPermohonan" class="" required>
                                    <option value="1">Dinas</option>
                                    <option value="2">Pribadi</option>
                                    <option value="3">Kep Keluarga</option>
                                    <option value="4">Sakit</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Uraian Permohonan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="Uraian" id="Uraian"
                                    placeholder="Uraian" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Yang Menyetujui:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="Menyetujui" id="Menyetujui"
                                    placeholder="Menyetujui" required>
                            </div>
                        </div>
                        <div id="form-container"></div>

                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col- row justify-content-md-center">
                        <div class="text-center col-md-auto"><button type="">Koreksi</button></div>
                        <div class="text-center col-md-auto"><button type="">Batal</button></div>
                        <div class="text-center col-md-auto"><button type="">Keluar</button></div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <main class="py-4">
        @yield('content')
    </main>
    </div>
    <script>
        $(document).ready(function() {
            $('.dropdown-submenu a.test').on("click", function(e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });
    </script>
    </body>
@endsection
