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
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">JNSPEG</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIK</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Kota</th>
                                        <th scope="col">TGL MASUK AWAL</th>
                                        <th scope="col">KARTU</th>
                                        <th scope="col">INDUK</th>
                                        <th scope="col">RBH</th>
                                        <th scope="col">ASTEK</th>
                                        <th scope="col">KOPERASI</th>
                                        <th scope="col">TGL KOPERASI</th>
                                        <th scope="col">NPWP</th>
                                        <th scope="col">No. Rek</th>
                                        <th scope="col">No. BPJS</th>
                                        <th scope="col">Penanggung</th>
                                        <th scope="col">NM_IBU_KANDUNG</th>
                                        <th scope="col">Klinik</th>
                                        <th scope="col">JABATAN</th>
                                        <th scope="col">NO PENSIUN</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">NO. TELEPON</th>
                                        <th scope="col">VAKSIN</th>
                                        <th scope="col">TEMPAT_LAHIR</th>
                                        <th scope="col">TGL_LAHIR</th>
                                        <th scope="col">KARTU_MAKAN</th>
                                        <th scope="col">Rek.BCA</th>
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
                    <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                        <div class="card-body" style="flex: 1; margin-right: 10px;">
                            <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px">


                                <div style="display: flex; flex-wrap: nowrap;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Kd Pegawai</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div style="display: flex; flex-wrap: nowrap;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Alamat</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div style="display: flex; flex-wrap: nowrap; align-items: center;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="margin-right: 10px;">Tempat, Tanggal Lahir</label>
                                        <div style="display: flex; align-items: center;">
                                            <textarea class="form-control" id="NoInduk" name="NoInduk" style="resize: none; height: 40px;" required></textarea>
                                            <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                                value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>

                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div style="display: flex; flex-wrap: nowrap; align-items: center;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="margin-right: 10px;">Tgl Masuk</label>
                                        <div style="display: flex; align-items: center;">
                                            <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                                value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>


                                        </div>

                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="margin-right: 10px;">Tgl Masuk Awal</label>
                                        <div style="display: flex; align-items: center;">
                                            <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                                value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>


                                        </div>

                                    </div>



                                </div>
                                <br>
                                <div style="display: flex; flex-wrap: nowrap; align-items: center;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">Jabatan</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Jenis Pegawai</label>
                                        <select class="form-control" id="Shift" name="Shift"
                                            style="resize: none;height: 40px; value="" required>
                                            <option value="">PISAT1</option>
                                            <option value="">PISAT2</option>
                                        </select>
                                    </div>



                                </div>
                                <br>
                                <div style="display: flex; flex-wrap: nowrap; align-items: center;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">No. Induk</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">Kartu Makan</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div style="display: flex; flex-wrap: nowrap; align-items: center;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">NIK</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">NPWP</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>



                                </div>
                                <br>
                                <div style="display: flex; flex-wrap: nowrap; align-items: center;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">No. Rek</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">No. Rek BCA</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>



                                </div>
                                <br>
                                <div style="display: flex; flex-wrap: nowrap; align-items: center;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">No. Koperasi</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="margin-right: 10px;">Tgl Koperasi</label>
                                        <div style="display: flex; align-items: center;">
                                            <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                                value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>

                                        </div>
                                    </div>



                                </div>





                                <div class="permohonan-s-p-container20">

                                </div>

                            </div>
                        </div>
                        <div class="card-body" style="flex: 1; margin-left: 10px;">
                            <div class="card-body RDZOverflow RDZMobilePaddingLR0">

                                <div style="flex: 1; margin-right: 10px;">
                                    <label style="display: inline-block; margin-right: 5px;">No. RBH</label>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                </div>
                                <br>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label style="display: inline-block; margin-right: 5px;">No. Astek</label>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                </div>
                                <br>
                                <div style="display: flex; flex-wrap: nowrap; align-items: center;">
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="display: inline-block; margin-right: 5px;">No. BPJS</label>
                                        <div style="display: flex; flex-wrap: nowrap;">
                                            <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px; margin-top: 40px;">
                                        <input type="checkbox">
                                        <label for="staff">Penanggung BPJS</label>
                                    </div>
                                </div>
                                <br>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label style="display: inline-block; margin-right: 5px;">Nama Ibu Kandung</label>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                </div>
                                <br>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label>Klinik</label>
                                    <select class="form-control" id="Shift" name="Shift"
                                        style="resize: none;height: 40px; value="" required>
                                        <option value="">PISAT1</option>
                                        <option value="">PISAT2</option>
                                    </select>
                                </div>
                                <br>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label style="display: inline-block; margin-right: 5px;">No Pensiun</label>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                </div>
                                <br>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label style="display: inline-block; margin-right: 5px;">Email</label>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                </div>
                                <br>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label style="display: inline-block; margin-right: 5px;">No Telepon</label>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                </div>
                                <br>
                                <div style="flex: 1; margin-right: 10px;">
                                    <label style="display: inline-block; margin-right: 5px;">Vaksin Covid 19</label>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <div style="padding: 10px">
                                            <input type="radio" id="staff" name="pekerja" value="staff" checked
                                                style="vertical-align: middle;">
                                            <label for="staff"
                                                style="display: inline-block; margin-right: 5px;">Belum</label>
                                        </div>

                                        <div style="padding: 10px">
                                            <input type="radio" id="bukanStaff" name="pekerja" value="bukanStaff"
                                                style="vertical-align: middle;">
                                            <label for="bukanStaff"
                                                style="display: inline-block; margin-right: 5px;">Tahap 1</label>
                                        </div>

                                        <div style="padding: 10px">
                                            <input type="radio" id="bukanStaff" name="pekerja" value="bukanStaff"
                                                style="vertical-align: middle;">
                                            <label for="bukanStaff"
                                                style="display: inline-block; margin-right: 5px;">Tahap 2</label>
                                        </div>

                                    </div>
                                </div>
                                <div style="text-align: right; margin-top: 20px;">
                                    <button type="button" class="btn btn-primary">Tambah</button>
                                    <button type="button" class="btn btn-dark">Keluar</button>
                                </div>



                            </div>
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
