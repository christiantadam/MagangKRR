@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Angsuran/hutang.js') }}"></script>
    <div class="form-wrapper mt-4">
        <div class="form-container">
            <div class="card">
                <div class="card-header">Maintenance Hutang Perusahaan</div>
                <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                    <div class="form berat_woven">

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Tanggal:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="date" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman"
                                    placeholder="Divisi Pengiriman">
                                <div class="text-center col-md-auto"><button id="buttonListHutang"
                                        onclick=showModalHutang()>List Hutang</button></div>
                                <div class="modal fade" id="modalHutang" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true" style="">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content" style="">
                                            <div class="modal-header" style="justify-content: center;">

                                                <div class="row" style=";">
                                                    <div class="table-responsive" style="margin:30px;">
                                                        <table id="tabel_Hutang" class="table table-bordered">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th scope="col">Nama</th>
                                                                    <th scope="col">No Bukti</th>

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
                                        onclick=showModalDivisi()>...</button></div>
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
                                <span class="aligned-text">Kode Pegawai:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Kd_Pegawai" disabled
                                    style="resize: none;  width: 150px;">
                                <input type="text" class="form-control" name="Kode" id="Nama_Pegawai"
                                    placeholder="Nama Pegawai" disabled>
                                <div class="text-center col-md-auto"><button type="" id="button_Pegawai"
                                        onclick=showModalPegawai()>...</button></div>
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
                                    placeholder="Bukti">
                                <div class="text-center col-md-auto"><button type="submit">...</button></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Jumlah:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="Jumlah" id="Jumlah"
                                    placeholder="Jumlah">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Sisa:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="Sisa" id="Sisa"
                                    placeholder="Sisa">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Keterangan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="Keterangan" id="Keterangan"
                                    placeholder="Keterangan">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Lunas:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="text" class="form-control" name="Lunas" id="Lunas"
                                    placeholder="Lunas">
                            </div>
                        </div>



                        <div class="row mt-3">
                            <div class="col- row justify-content-md-center">
                                <div class="text-center col-md-auto"><button type="submit">Isi</button></div>
                                <div class="text-center col-md-auto"><button type="submit">Koreksi</button></div>
                                <div class="text-center col-md-auto"><button type="submit">Hapus</button></div>
                                <div class="text-center col-md-auto"><button type="submit">Keluar</button></div>
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
