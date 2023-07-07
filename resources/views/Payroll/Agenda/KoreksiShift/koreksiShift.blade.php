@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card">
                    <div class="card-header">PEKERJA</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px">
                        <div class="permohonan-s-p-container18" id="div_detailSuratPesanan">
                            <div class="permohonan-s-p-container19"> <span>Divisi</span>
                            </div>
                            <div class="permohonan-s-p-container20">
                                <div class="permohonan-s-p-container21">
                                    <select name="kategori_utama" id="kategori_utama" class="form-control">
                                        <option disabled selected value></option>

                                    </select>

                                </div>
                            </div>


                        </div>
                        <br>
                        <div class="permohonan-s-p-container18" id="div_detailSuratPesanan">
                            <div class="permohonan-s-p-container19"> <span>Pegawai</span>
                            </div>
                            <div class="permohonan-s-p-container20">
                                <div class="permohonan-s-p-container21">
                                    <select name="kategori_utama" id="kategori_utama" class="form-control">
                                        <option disabled selected value></option>

                                    </select>

                                </div>
                            </div>


                        </div>
                        <br>

                        <div class="card-body"
                            style="flex: 1; margin-right: 10px; border: 1px solid #000000; border-radius: 3px; text-align: middle;">

                            <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                                <div class="card-body">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <div style="display: flex; align-items: center;">
                                            <label style="margin-right: 10px; margin-left: 15px">Tanggal</label>
                                            <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                                value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>
                                            <label style="margin-right: 10px; margin-left: 15px">S/D</label>
                                            <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                                value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>


                                        </div>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div style="flex: 1; margin-right: 10px;">

                                        <button type="button" class="btn">Lihat Data</button>

                                    </div>
                                </div>


                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Kd_Pegawai</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Jam_masuk</th>
                                            <th scope="col">Jam_keluar</th>
                                            <th scope="col">Jml_jam</th>
                                            <th scope="col">awal_jam_istirahat</th>
                                            <th scope="col">akhir_jam_istirahat</th>
                                            <th scope="col">keterangan_absensi</th>

                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <tr>

                                            {{-- <td>
                                                <a href="" title="Edit Employee">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                    </button>
                                                </a>
                                                <form method="POST" action="" accept-charset="UTF-8" style="display:inline">
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee" onclick='return confirm("Confirm delete?")'>
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                    </button>
                                                </form>
                                            </td> --}}

                                        </tr>
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
                        <div class="body-container">
                            <div class="card-body">
                                <div style="display: flex; align-items: center; margin-left:20px; ">
                                    <label style="margin-bottom: 5px; margin-right: 20px; margin-left: -15px;">Shift</label>
                                    <select class="form-control" id="Shift" name="Shift"
                                        style="resize: none;height: 40px; max-width:150px">
                                        <option value="">PISAT1</option>
                                        <option value="">PISAT2</option>
                                    </select>
                                    <label
                                        style="margin-bottom: 5px; margin-right: 5px; margin-left:20px;">Keterangan</label>
                                    <select class="form-control" id="Shift" name="Shift"
                                        style="resize: none;height: 40px; max-width:150px">
                                        <option value="">PISAT1</option>
                                        <option value="">PISAT2</option>
                                    </select>
                                </div>
                                <div class="time-form" style="justify-content: left;">

                                    <label for="masuk">Masuk:</label>
                                    <input type="time" id="masuk" name="masuk">
                                    <label for="pulang_istirahat">Pulang Istirahat:</label>
                                    <input type="time" id="pulang_istirahat" name="pulang_istirahat">
                                </div>
                                <br>
                                <div class="time-form" style="justify-content: left;">

                                    <label for="pulang">Pulang:</label>
                                    <input type="time" id="pulang" name="pulang">
                                    <label for="masuk_istirahat">Masuk Istirahat:</label>
                                    <input type="time" id="masuk_istirahat" name="masuk_istirahat">
                                </div>

                            </div>
                        </div>



                    </div>


                    <div style="text-align: right; margin: 25px;">
                        <button type="button" class="btn btn-primary">Proses</button>
                        <button type="button" class="btn btn-dark">Keluar</button>
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
