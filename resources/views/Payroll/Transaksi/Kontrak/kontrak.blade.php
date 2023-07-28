@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/PegawaiDivisi.js') }}"></script>

    <div class="container-fluid">
        <div class="row justify-content-center" style="">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="margin:auto;">
                    <div class="card-header">Transfer Absen</div>

                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px;">


                        <div class="row" style="margin-left:-120px;">
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
                                    data-toggle="modal" data-target="#modalKdPeg">...</button>

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

                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Kode Pegawai:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Peg" readonly
                                    style="resize: none; height: 40px; max-width: 100px;">
                                <input class="form-control" type="text" id="Nama_Peg" readonly
                                    style="resize: none; height: 40px; max-width: 450px;">
                                <button type="button" class="btn" style="margin-left: 10px;" data-toggle="modal"
                                    data-target="#modalPeg">...</button>
                                <div class="modal fade" id="modalPeg" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true" style="">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content" style="">
                                            <div class="modal-header" style="justify-content: center;">

                                                <div class="row" style=";">
                                                    <div class="table-responsive" style="margin:30px;">
                                                        <table id="table_Peg" class="table table-bordered">
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
                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Divisi Baru:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Div_Baru" readonly
                                    style="resize: none; height: 40px; max-width: 100px;">
                                <input class="form-control" type="text" id="Nama_Div_Baru" readonly
                                    style="resize: none; height: 40px; max-width: 450px;">
                                {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                    style="resize: none; height: 40px; max-width: 250px;">
                                    <option value=""></option>
                                    @foreach ($divisi as $data)
                                        <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                    @endforeach
                                </select> --}}
                                <button type="button" class="btn" style="margin-left: 10px; " id="divisiButton"
                                    data-toggle="modal" data-target="#modalDivisiBaru">...</button>

                                <div class="modal fade" id="modalDivisiBaru" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true" style="">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content" style="">
                                            <div class="modal-header" style="justify-content: center;">

                                                <div class="row" style=";">
                                                    <div class="table-responsive" style="margin:30px;">
                                                        <table id="table_Divisi_Baru" class="table table-bordered">
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

                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Kode Pegawai Baru:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Peg_Baru"
                                    style="resize: none; height: 40px; max-width: 100px;">
                                <span class="aligned-text" style="margin-left:50px;">Shift:</span>
                                <input class="form-control" type="text" id="Shift" readonly
                                    style="resize: none; height: 40px; max-width: 100px;">
                                <input class="form-control" type="text" id="Jam" readonly
                                    style="resize: none; height: 40px; max-width: 257px;">

                                <button type="button" class="btn" style="margin-left: 10px; " id="divisiButton"
                                    data-toggle="modal" data-target="#modalShift">...</button>

                                <div class="modal fade" id="modalShift" role="dialog" arialabelledby="modalLabel"
                                    area-hidden="true" style="">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content" style="">
                                            <div class="modal-header" style="justify-content: center;">

                                                <div class="row" style=";">
                                                    <div class="table-responsive" style="margin:30px;">
                                                        <table id="table_Shift" class="table table-bordered">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th scope="col">Shift</th>
                                                                    <th scope="col">Jam</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($dataShift as $data)
                                                                    <tr>

                                                                        <td>{{ $data->Shift }}</td>
                                                                        <td>{{ $data->Jam }}</td>



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


                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Tgl Masuk :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">

                                <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                    value="{{ old('TglLapor', now()->format('Y-m-d')) }}" style="width: 150px;" required>
                            </div>


                        </div>

                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Masa Kontrak :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">

                                <input class="form-control" type="date" id="TglMulai" name="TglMulai"
                                    value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required
                                    style="max-width: 200px;">
                                <span class="aligned-text" style="margin-left: 15px;">s/d</span>
                                <input class="form-control" type="date" id="TglSelesai" name="TglSelesai"
                                    value="{{ old('TglSelesai', now()->format('Y-m-d')) }}" required
                                    style="max-width: 200px;">
                                <div
                                    style="height: 40px; border: 1px solid black; display: flex; align-items: center; margin-left:15px;">
                                    <div style="padding: 10px; display: flex; align-items: center;">
                                        <input type="radio" id="staff" name="pekerja" value="staff" checked
                                            style="vertical-align: middle;">
                                        <label for="staff" style="margin-left: 5px;">

                                            <span
                                                style="display: inline-block; vertical-align: middle; margin-left: 5px;">1
                                                Bulan</span>
                                        </label>
                                    </div>

                                    <div style="padding: 10px; display: flex; align-items: center;">
                                        <input type="radio" id="bukanStaff1" name="pekerja" value="bukanStaff"
                                            style="vertical-align: middle;">
                                        <label for="bukanStaff1" style="margin-left: 5px;">
                                            <span
                                                style="display: inline-block; vertical-align: middle; margin-left: 5px;">3
                                                Bulan</span>
                                        </label>
                                    </div>

                                    <div style="padding: 10px; display: flex; align-items: center;">
                                        <input type="radio" id="bukanStaff2" name="pekerja" value="bukanStaff"
                                            style="vertical-align: middle;">
                                        <label for="bukanStaff2" style="margin-left: 5px;">
                                            <span
                                                style="display: inline-block; vertical-align: middle; margin-left: 5px;">6
                                                Bulan</span>
                                        </label>
                                    </div>
                                    <div style="padding: 10px; display: flex; align-items: center;">
                                        <input type="radio" id="bukanStaff2" name="pekerja" value="bukanStaff"
                                            style="vertical-align: middle;">
                                        <label for="bukanStaff2" style="margin-left: 5px;">
                                            <span
                                                style="display: inline-block; vertical-align: middle; margin-left: 5px;">9
                                                Bulan</span>
                                        </label>
                                    </div>
                                    <div style="padding: 10px; display: flex; align-items: center;">
                                        <input type="radio" id="bukanStaff2" name="pekerja" value="bukanStaff"
                                            style="vertical-align: middle;">
                                        <label for="bukanStaff2" style="margin-left: 5px;">
                                            <span
                                                style="display: inline-block; vertical-align: middle; margin-left: 5px;">12
                                                Bulan</span>
                                        </label>
                                    </div>
                                    <div style="padding: 10px; display: flex; align-items: center;">
                                        <input type="radio" id="bukanStaff2" name="pekerja" value="bukanStaff"
                                            style="vertical-align: middle;">
                                        <label for="bukanStaff2" style="margin-left: 5px;">
                                            <span style="display: inline-block; vertical-align: middle;"></span>
                                            <span
                                                style="display: inline-block; vertical-align: middle; margin-left: 5px;">2
                                                Tahun</span>
                                        </label>
                                    </div>

                                    <!-- Tambahkan kode untuk radio button dan label berikutnya -->
                                </div>
                            </div>


                        </div>
                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Tgl Keluar :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">

                                <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                    value="{{ old('TglLapor', now()->format('Y-m-d')) }}"
                                    style="width: 150px; margin-right:20px;" required>



                                <div style="height: 40px; border: 1px solid black; display: flex; align-items: center; ">
                                    <div style="padding: 10px; display: flex; align-items: center;">
                                        <input type="radio" id="staff" name="opsiKeluar" value="staff" checked
                                            style="vertical-align: middle;">
                                        <label for="staff" style="margin-left: 5px;">

                                            <span
                                                style="display: inline-block; vertical-align: middle; margin-left: 5px;">Perpanjangan</span>
                                        </label>
                                    </div>

                                    <div style="padding: 10px; display: flex; align-items: center;">
                                        <input type="radio" id="bukanStaff1" name="opsiKeluar" value="bukanStaff"
                                            style="vertical-align: middle;">
                                        <label for="bukanStaff1" style="margin-left: 5px;">

                                            <span
                                                style="display: inline-block; vertical-align: middle; margin-left: 5px;">Resign
                                                3 Tahun</span>
                                        </label>
                                    </div>



                                    <!-- Tambahkan kode untuk radio button dan label berikutnya -->
                                </div>
                            </div>


                        </div>







                        <br>

                        <div style="text-align: right; margin: 20px;">

                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>

                </div>

                <br>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('selectAllCheckbox').addEventListener('change', function() {
            var checkboxes = document.querySelectorAll('#gridView input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = this.checked;
            }, this);
        });
    </script>
@endsection
