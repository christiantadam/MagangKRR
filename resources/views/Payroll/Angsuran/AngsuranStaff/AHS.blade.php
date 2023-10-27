@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Angsuran/angsuranHutangStaff.js') }}"></script>
    <div class="form-wrapper mt-4">
        <div class="form-container">
            <div class="card">
                <div class="card-header">Angsuran Hut Staff</div>
                <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                    <div class="form berat_woven">

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Tanggal:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="date" class="form-control" name="Divisi_pengiriman" id="Tanggal_Angsuran"
                                    value="{{ date('Y-m-d') }}" disabled>
                                <div class="text-center col-md-auto"><button id="buttonListData" onclick=showModalData()
                                        disabled>List Data</button></div>
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

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Divisi:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Kd_Divisi" disabled
                                    style="resize: none;  width: 150px;">
                                <input type="text" class="form-control" name="Divisi_pengiriman" id="Nama_Divisi"
                                    placeholder="Nama Divisi" disabled>
                                <div class="text-center col-md-auto"><button type="" id="buttonDivisi"
                                        onclick=showModalDivisi() disabled>...</button></div>
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
                                                                    <th scope="col">Nama</th>
                                                                    <th scope="col">Id Divisi</th>

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
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Pegawai:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Kd_Pegawai" disabled
                                    style="resize: none;  width: 150px;">
                                <input type="text" class="form-control" name="Kode" id="Nama_Pegawai"
                                    placeholder="Nama Pegawai" disabled>
                                <div class="text-center col-md-auto"><button type="" id="button_Pegawai"
                                        onclick=showModalPegawai() disabled>...</button></div>
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
                                                                    <th scope="col">Nama</th>
                                                                    <th scope="col">Id Pegawai</th>

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

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">No Bukti:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="Bukti" id="Bukti"
                                    placeholder="Bukti" disabled>
                                <div class="text-center col-md-auto"><button type="" id="buttonBukti"
                                        onclick=showModalBukti() disabled>...</button></div>
                                <div class="modal fade" id="modalBukti" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true" style="">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content" style="">
                                            <div class="modal-header" style="justify-content: center;">

                                                <div class="row" style=";">
                                                    <div class="table-responsive" style="margin:30px;">
                                                        <table id="tabel_Bukti" class="table table-bordered">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th scope="col">Nomor Hutang</th>
                                                                    <th scope="col">Nomor Bukti</th>

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

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Keterangan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="Keterangan" id="Keterangan"
                                    placeholder="Keterangan" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Sisa:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="Sisa" id="Sisa"
                                    placeholder="Sisa" disabled>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">No Angsuran:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="Angsuran" id="Angsuran"
                                    placeholder="Angsuran" disabled>
                                <div class="text-center col-md-auto"><button type="" disabled>...</button></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Jml Angsuran:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="Jml_angsuran" id="Jml_angsuran"
                                    placeholder="Jml Angsuran" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Pot Gaji Y/N:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="potongGaji" id="potongGaji"
                                    placeholder="Lunas" disabled>
                            </div>
                        </div>



                        <div class="row mt-3">
                            <div style="text-align: right; margin-top: 20px; margin-left: 20px;">

                                <button type="button" class="btn" style="width: 100px" id="simpanButton"
                                    hidden>SIMPAN</button></button>
                                <button type="button" class="btn" style="width: 100px" id="batalButton"
                                    hidden>BATAL</button></button>
                                <button type="button" class="btn" style="width: 100px"
                                    id="isiButton">ISI</button></button>
                                <button type="button" class="btn" style="width: 100px"
                                    id="koreksiButton">KOREKSI</button></button>
                                <button type="button" class="btn" style="width: 100px"
                                    id="hapusButton">HAPUS</button></button>
                                <button type="button" class="btn" style="width: 100px"
                                    id="keluarButton">KELUAR</button></button>

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
