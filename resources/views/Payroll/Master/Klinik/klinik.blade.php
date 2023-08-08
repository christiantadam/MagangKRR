@extends('layouts.appPayroll')
@section('content')
<script type="text/javascript" src="{{ asset('js/Master/klinik.js') }}"></script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">PROGRAM Maintenance Karyawan Harian</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <h5>

                            <div class="panel-body">
                                <form class="form" method="POST" enctype="multipart/form-data"
                                    action="{{ url('/Jurnal') }}">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <label>Nama Klinik</label>
                                        <div class="row" style="width: 2000px">
                                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                                <input class="form-control" type="text" id="Kode_Klinik" readonly
                                                    style="resize: none; height: 40px; width: 200px;">
                                                <input class="form-control ml-3" type="text" id="Nama_Klinik" readonly
                                                    style="resize: none; height: 40px; width: 100%;">
                                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                                    style="resize: none; height: 40px; max-width: 250px;">
                                                    <option value=""></option>
                                                    @foreach ($divisi as $data)
                                                        <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                                    @endforeach
                                                </select> --}}
                                                <button type="button" class="btn" style="margin-left: 10px; "
                                                    id="divisiButton" data-toggle="modal"
                                                    data-target="#modalKlinik">...</button>

                                                <div class="modal fade" id="modalKlinik" role="dialog"
                                                    arialabelledby="modalLabel" area-hidden="true" style="">
                                                    <div class="modal-dialog " role="document">
                                                        <div class="modal-content" style="">
                                                            <div class="modal-header" style="justify-content: center;">

                                                                <div class="row" style=";">
                                                                    <div class="table-responsive" style="margin:30px;">
                                                                        <table id="table_Klinik"
                                                                            class="table table-bordered">
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
                                        </div>
                                        <br>
                                        <div style="flex: 1; margin-right: 10px; width: 1425px">
                                            <label>Alamat</label>
                                            <textarea class="form-control" id="NoInduk" name="NoInduk" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                        <br>
                                        <div style="flex: 1; margin-right: 10px; width: 1000px">
                                            <label>Kota</label>
                                            <textarea class="form-control" id="NoKartu" name="NoKartu" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                        <br>
                                        <div style="flex: 1; margin-right: 10px; width: 1000px">
                                            <label>No. Telepon</label>
                                            <textarea class="form-control" id="NoKartu" name="NoKartu" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                        <br>

                                    </div>


                            </div>

                            </form>
                            <div style="text-align: right; margin-top: 20px;">


                                <button type="button" class="btn btn-info" style="width: 100px">Isi</button>
                                <button type="button" class="btn btn-warning" style="width: 100px">Koreksi</button>
                                <button type="button" class="btn btn-danger" style="width: 100px">Hapus</button>
                                <button type="button" class="btn btn-light" style="width: 100px">Batal</button>
                                <button type="button" class="btn btn-dark" style="width: 100px">Keluar</button>
                            </div>
                    </div>


                    </h5>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
