@extends('layouts.appPayroll')
@section('content')
<script type="text/javascript" src="{{ asset('js/MaintenanceIjin/FormIjinKaryawan.js') }}"></script>
    <div class="form-wrapper mt-4">
        <div class="form-container">
            <div class="card">
                <div class="card-header">Form Ijin Karyawan</div>
                <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                    <div class="form berat_woven">

                            <div class="row">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Nama Pegawai:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="Divisi_pengiriman"
                                        id="Nama_Pegawai" placeholder="" >
                                    <div class="text-center col-md-auto"><button>Tampil</button></div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">Data </div>
                                <div class="row" style=";">
                                    <div class="table-responsive" style="margin:30px;">
                                        <table id="table_Pegawai" class="table table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Nama_Div</th>
                                                    <th scope="col">Kd_Pegawai</th>
                                                    <th scope="col">Nama_Peg</th>
                                                    <th scope="col">Jenis_Peg</th>
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

                    <div class="row mt-3">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Nomor Kartu:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Nomor_kartu" id="Nomor_kartu"
                                placeholder="Nomor Kartu" required>
                                <div class="text-center col-md-auto"><button id="buttonTampilKartu">Tampil Kode Pegawai</button></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Nama / ID Divisi:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Nama_divisi" id="Nama_divisi"
                                placeholder="" required>
                            <h1>&nbsp;/&nbsp; </h1>
                            <input type="text" class="form-control" name="Nama_divisi" id="Id_Divisi"
                                placeholder="" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Nama / Kode Pegawai:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Nama_pegawai_kartu" id="Nama_pegawai_kartu"
                                placeholder="" required>
                                <h1>&nbsp;/&nbsp; </h1>
                                <input type="text" class="form-control" name="Kode_pegawai_kartu" id="Kode_pegawai_kartu"
                                placeholder="" required>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Divisi:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Divisi" id="Divisi" placeholder="Divisi"
                                required>
                        </div>
                    </div>

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
                            <input type="Date" class="form-control" name="Ijin" id="TanggalIjin" placeholder="Ijin"
                                required>
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
                                        <input class="form-check-input custom-radio ml-3" type="radio" name="cekKembali"
                                            value="" id="kembali" checked>
                                        <label class="form-check-label rounded-circle custom-radio"
                                            for="">Kembali</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input custom-radio" type="radio" name="cekKembali"
                                            value="" id="tidakKembali">
                                        <label class="form-check-label rounded-circle custom-radio" for="">Tidak
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
                            <input type="Time" class="form-control" name="Ijin" id="IjinKeluar" placeholder="Ijin"
                                required >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Jam Kembali:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="Time" class="form-control" name="Ijin" id="IjinKembali" placeholder="Ijin"
                                required>
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
                                        <input class="form-check-input custom-radio ml-3" type="radio" name="cekDinas"
                                            value="" id="Dinas" checked>
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

                    <div class="row form-group ml-1">
                        <div class="input-container ml-4">
                            <label for="grup-pelaksana-dropdown">Kategori Permohonan:</label>
                            <select id="grup-pelaksana-dropdown" class="ml-4" required>
                                <option value="1">Dinas</option>
                                <option value="2">-</option>
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

                    <div class="row mt-3">
                        <div class="col- row justify-content-md-center">
                            <div class="text-center col-md-auto"><button type="" id="prosesButton">Proses</button></div>
                            <div class="text-center col-md-auto"><button type="" id="batalButton">Batal</button></div>
                            <div class="text-center col-md-auto"><button type="" id="keluarButton">Keluar</button></div>
                        </div>
                    </div>
                </div>
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
