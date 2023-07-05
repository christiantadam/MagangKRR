@extends('layouts.appPayroll')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">PEKERJA</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <h5>
                            <div class="panel-body">
                                <form class="form" method="POST" enctype="multipart/form-data" action="{{ url('/Jurnal') }}" >
                                    {{ csrf_field() }}

                                        <div class="modal-body">

                                            <br>
                                            <div style="display: flex; flex-wrap: nowrap;">
                                                <div style="flex: 1; margin-right: 10px;">
                                                    <label>Divisi</label>
                                                    <select class="form-control" id="Shift" name="Shift" style="resize: none;height: 40px; value="" required>
                                                        <option value="">Divisi 1</option>
                                                        <option value="">Divisi 1</option>
                                                        <option value="">Divisi 1</option>
                                                    </select>
                                                </div>
                                                <div style="flex: 1; margin-right: 10px;">
                                                    <label>PISAT</label>
                                                    <select class="form-control" id="Shift" name="Shift" style="resize: none;height: 40px; value="" required>
                                                        <option value="">Opsi 1</option>
                                                        <option value="">Opsi 2</option>
                                                        <option value="">Opsi 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div style="display: flex; flex-wrap: nowrap;">
                                                <div style="flex: 1; margin-right: 10px;">
                                                    <label>Karyawan</label>
                                                    <select class="form-control" id="Shift" name="Shift" style="resize: none;height: 40px; value="" required>
                                                        <option value="">Nama1</option>
                                                        <option value="">Nama2</option>
                                                        <option value="">Nama3</option>
                                                    </select>
                                                </div>
                                                <div style="flex: 1; margin-right: 10px;">
                                                    <label>Status Kawin</label>
                                                    <select class="form-control" id="Shift" name="Shift" style="resize: none;height: 40px; value="" required>
                                                        <option value="">Menikah</option>
                                                        <option value="">Belum Menikah</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <label>No. KK</label>
                                            <div style="display: flex; flex-wrap: nowrap;">
                                                <div style="flex: 1; margin-right: 10px;">

                                                    <div style="display: flex; flex-wrap: nowrap;">
                                                        <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                                    </div>
                                                </div>
                                                <div style="flex: 1; margin-right: 10px;">
                                                    <input type="radio" id="pbpjs" name="bpjs" value="bpjs" checked>
                                                    <label for="staff">Penanggung BPJS</label>
                                                </div>
                                            </div>
                                            <div style="text-align: right; margin-top: 20px;">
                                                <button type="button" class="btn btn-secondary">Clear</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>



                                        </div>
                                </form>

                            </div>


                        </h5>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">KELUARGA</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <h5>
                            <div class="panel-body">
                                <form class="form" method="POST" enctype="multipart/form-data" action="{{ url('/Jurnal') }}" >
                                    {{ csrf_field() }}

                                        <div class="modal-body">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">IdKeluarga</th>
                                                            <th scope="col">Nama</th>
                                                            <th scope="col">Hubungan</th>
                                                            <th scope="col">JnsKelamin</th>
                                                            <th scope="col">KotaLahir</th>
                                                            <th scope="col">TglLahir</th>
                                                            <th scope="col">PISAT</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">NIK</th>
                                                            <th scope="col">Id BPJS</th>
                                                            <th scope="col">Klinik</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-group-divider">
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Axell</td>
                                                            <td>L</td>
                                                            <td>axelltama@gmail.com</td>
                                                            <td>Jl. Rungkut Harapn</td>
                                                            <td>Jl. Rungkut Harapn</td>
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
                                                            <td>Jl. Rungkut Harapn</td>
                                                            <td>Jl. Rungkut Harapn</td>
                                                            <td>Jl. Rungkut Harapn</td>
                                                            <td>Jl. Rungkut Harapn</td>
                                                            <td>Jl. Rungkut Harapn</td>
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
                                            <div style="flex: 1; margin-right: 10px;">
                                                <label>Nama</label>
                                                <textarea class="form-control" id="NoKartu" name="NoKartu" style="resize: none;height: 40px;" required></textarea>
                                            </div>
                                            <br>

                                            <div style="display: flex; flex-wrap: nowrap;">
                                                <div style="flex: 1; margin-right: 10px;">
                                                    <label>Hubungan</label>
                                                    <div style="display: flex; flex-wrap: nowrap;">
                                                        <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                                    </div>
                                                </div>

                                                <div style="flex: 1; margin-right: 10px;">
                                                    <label style="display: inline-block; margin-right: 5px;">Jenis Kelamin</label>
                                                    <div style="display: flex; flex-wrap: nowrap;">
                                                        <div style="padding: 10px">
                                                            <input type="radio" id="staff" name="pekerja" value="staff" checked style="vertical-align: middle;">
                                                            <label for="staff" style="display: inline-block; margin-right: 5px;">Laki-laki (L)</label>
                                                        </div>

                                                        <div style="padding: 10px">
                                                            <input type="radio" id="bukanStaff" name="pekerja" value="bukanStaff" style="vertical-align: middle;">
                                                            <label for="bukanStaff" style="display: inline-block; margin-right: 5px;">Perempuan (P)</label>
                                                        </div>

                                                    </div>
                                                </div>




                                            </div>
                                            <br>
                                                <label style="margin-right: 10px;">Tanggal, Kota Lahir</label>
                                                <div style="display: flex; align-items: center;">
                                                    <input class="form-control" type="date" id="TglLapor" name="TglLapor" value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>
                                                    <textarea class="form-control" id="NoInduk" name="NoInduk" style="resize: none; height: 40px;" required></textarea>

                                                </div>
                                            <br>
                                            <div style="flex: 1; margin-right: 10px;">
                                                <label>PISAT</label>
                                                <select class="form-control" id="Shift" name="Shift" style="resize: none;height: 40px; value="" required>
                                                    <option value="">PISAT1</option>
                                                    <option value="">PISAT2</option>
                                                </select>
                                            </div>
                                            <br>
                                            <div style="flex: 1; margin-right: 10px;">
                                                <label>Status Kawin</label>
                                                <select class="form-control" id="Shift" name="Shift" style="resize: none;height: 40px; value="" required>
                                                    <option value="">Menikah</option>
                                                    <option value="">Belum Menikah</option>
                                                </select>
                                            </div>
                                            <br>
                                            <label>NIK</label>
                                            <div style="display: flex; flex-wrap: nowrap;">

                                                <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                            </div>
                                            <br>
                                            <label>Id BPJS</label>
                                            <div style="display: flex; flex-wrap: nowrap;">

                                                <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                            </div>
                                            <br>
                                            <div style="flex: 1; margin-right: 10px;">
                                                <label>Klinik</label>
                                                <select class="form-control" id="Shift" name="Shift" style="resize: none;height: 40px; value="" required>
                                                    <option value="">Klinik 1</option>
                                                    <option value="">Klinik 2</option>
                                                </select>
                                            </div>
                                            <br>
                                            <div style="text-align: right; margin-top: 20px;">
                                                <button type="button" class="btn btn-secondary">Clear</button>
                                                <button type="button" class="btn btn-info">Tambah</button>
                                                <button type="button" class="btn btn-warning">Koreksi</button>
                                                <button type="button" class="btn btn-danger">Hapus</button>
                                                <button type="button" class="btn btn-dark">Keluar</button>
                                            </div>





                                        </div>
                                </form>

                            </div>


                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
