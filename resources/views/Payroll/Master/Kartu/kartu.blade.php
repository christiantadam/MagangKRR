@extends('layouts.appPayroll')
@section('content')
<title style="font-size: 20px">@yield('title', 'FrmLaporanPerPegawai')</title>
    <script type="text/javascript" src="{{ asset('js/Master/kartu.js') }}"></script>

    <script>
        function printDiv() {
            var divContents = document.getElementById("printSection").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = divContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0 no-print">

                <div class="card">
                    <div class="card-header">FrmLaporanPerPegawai</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px">
                        <div class="row" style="margin-left:;">
                            <div class="form-group col-md-1 d-flex justify-content-end">
                                <span class="aligned-text">Divisi:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Div" readonly
                                    style="resize: none; height: 40px; max-width: 200px;">
                                <input class="form-control ml-3" type="text" id="Nama_Div" readonly
                                    style="resize: none; height: 40px; max-width: 700px;">
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



                        <div class="row" style="margin-left:;">
                            <div class="form-group col-md-1 d-flex justify-content-end">
                                <span class="aligned-text form" style="">Pegawai:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Pegawai" readonly
                                    style="resize: none; height: 40px; max-width: 200px;">
                                <input class="form-control ml-3" type="text" id="Nama_Pegawai" readonly
                                    style="resize: none; height: 40px; max-width: 700px;">
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                        style="resize: none; height: 40px; max-width: 250px;">
                                        <option value=""></option>
                                        @foreach ($divisi as $data)
                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                        @endforeach
                                    </select> --}}
                                <button type="button" class="btn" style="margin-left: 10px; " id="pegawaiButton"
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
                        </div>



                    </div>
                    <br>

                    <div style="text-align: right; margin-top: 20px;">
                        <button type="button" class="btn btn-primary" onclick={window.print()}>Print</button>
                        <button type="button" class="btn btn-dark">Keluar</button>
                    </div>
                </div>









                <br>







            </div>
            <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px">
                <div class="printme" id="printSection">
                    <div class="custom-container">
                        <div class="custom-header">PT. KERTA RAJASA RAYA</div>
                        <div>JALAN RAYA TROPODO NO. 1</div>
                        <div>WARU - SIDOARJO</div>
                        <div>Telp. (031) 8669595 - 8669966</div>
                        <div class="custom-divider"></div>
                        <div class="custom-header">KARTU PEGAWAI</div>
                        <div class="custom-divider"></div>
                        <div class="custom-info">
                            <div class="justify-content-end" id="Kd_Pegawai">KODE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                Kd_Pegawai
                            </div>
                            <div class="justify-content-end" id="No_Kartu">NOMOR&nbsp;: No_Kartu</div>
                            <div class="justify-content-end" id="Nama_Divisi">DEPT.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                Nama_Div
                            </div>
                            <div class="justify-content-end" id="Nama_Peg">NAMA&nbsp;&nbsp;&nbsp;&nbsp;: Nama_Peg</div>
                        </div>
                    </div>

                    <div class="custom-container">
                        <div class="custom-divider"></div>
                        <div class="custom-header">Perhatian</div>
                        <div class="custom-divider"></div>
                        <div class="custom-info">
                            <ol>
                                <li>KARTU INI BERLAKU SEBAGAI KARTU TANDA PENGENAL</li>
                                <li>KARTU INI DIGUNAKAN UNTUK MENCATAT WAKTU</li>
                                <li>DILARANG MEMAKAI KARTU ORANG LAIN</li>
                                <li>JIKA HILANG DIKENAKAN DENDA</li>
                                <li>JIKA MENEMUKAN KARTU INI MOHON DIKEMBALIKAN</li>
                                <li>GUNAKAN KARTU INI SELAMA BERTUGAS</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br>

    </div>
    </div>
    </div>
@endsection
