@extends('layouts.appPayroll')
@section('content')
<div class="form-wrapper mt-4">
        <div class="form-container">
        <div class="card">
            <div class="card-header">Angsuran Hut Staff</div>
            <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <div class="form berat_woven">
                <form action="#" method="post" role="form">
                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Tanggal:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="date" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman" placeholder="Divisi Pengiriman" required>
                            <div class="text-center col-md-auto"><button type="submit">List Data</button></div>

                        </div>
                    </div>

                    <div class="row" style="margin-left:-150px; ;">
                        <div class="form-group col-md-3 d-flex justify-content-end" s>
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
                    <div class="row" style="margin-left:-150px; ;">
                        <div class="form-group col-md-3 d-flex justify-content-end" s>
                            <span class="aligned-text">Pegawai:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input class="form-control" type="text" id="Kd_Pegawai" readonly
                                style="resize: none; height: 40px; max-width: 100px;">
                            <input class="form-control" type="text" id="Nama_Peg" readonly
                                style="resize: none; height: 40px; max-width: 450px;">
                            {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                style="resize: none; height: 40px; max-width: 250px;">
                                <option value=""></option>
                                @foreach ($divisi as $data)
                                    <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                @endforeach
                            </select> --}}
                            <button type="button" class="btn" style="margin-left: 10px; " id="divisiButton"
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
                                                                <th scope="col">Kd Pegawai</th>
                                                                <th scope="col">Nama Pegawai</th>

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

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">No Bukti:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Bukti" id="Bukti" placeholder="Bukti" required>
                            <div class="text-center col-md-auto"><button type="submit">...</button></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Keterangan:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Keterangan" id="Keterangan" placeholder="Keterangan" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Sisa:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Sisa" id="Sisa" placeholder="Sisa" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Lunas:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Lunas" id="Lunas" placeholder="Lunas" required>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">No Angsuran:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Angsuran" id="Angsuran" placeholder="Angsuran" required>
                            <div class="text-center col-md-auto"><button type="submit">...</button></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Jml Angsuran:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Jml_angsuran" id="Jml_angsuran" placeholder="Jml Angsuran" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Pot Gaji Y/N:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Lunas" id="Lunas" placeholder="Lunas" required>
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
                </form>
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
