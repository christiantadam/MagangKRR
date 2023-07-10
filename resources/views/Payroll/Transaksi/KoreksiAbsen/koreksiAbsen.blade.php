@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid"  >
        <div class="row justify-content-center" style="">
            <div class="col-md-10 RDZMobilePaddingLR0" >

                <div class="card" style="margin:auto;" >
                    <div class="card-header">Insert Agenda Pegawai Baru</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px;">
                        <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                            <div class="card-body" style="flex: 1; margin-right: 10px;">
                                <div class="permohonan-s-p-container18" id="div_detailSuratPesanan">
                                    <div class="permohonan-s-p-container19"> <span>Divisi</span>
                                    </div>
                                    <div class="permohonan-s-p-container20" >
                                        <div class="permohonan-s-p-container21">
                                            <select name="kategori_utama" id="kategori_utama" class="form-control" style="width:300px;">
                                                <option disabled selected value></option>

                                            </select>

                                        </div>
                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="margin-right: 10px;">Tanggal</label>
                                        <div style="display: flex; align-items: center;">
                                            <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                                value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>


                                        </div>

                                    </div>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label style="margin-right: 10px;">S/D</label>
                                        <div style="display: flex; align-items: center;">
                                            <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                                value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>


                                        </div>

                                    </div>


                                </div>
                                <div class="permohonan-s-p-container18" id="div_detailSuratPesanan">
                                    <div class="permohonan-s-p-container19"> <span>Kode Pegawai</span>
                                    </div>
                                    <div class="permohonan-s-p-container20">
                                        <div class="permohonan-s-p-container21">
                                            <select name="kategori_utama" id="kategori_utama" class="form-control" style="width:300px;">
                                                <option disabled selected value></option>

                                            </select>

                                        </div>
                                    </div>
                                    <br>

                                </div>

                            </div>


                        </div>
                        <div style="text-align: right; ">
                            <button type="button" class="btn btn-primary">Tampilkan</button>

                        </div>

                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Centang</th>
                                        <th scope="col">KdPegawai</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Masuk</th>
                                        <th scope="col">Keluar</th>
                                        <th scope="col">Datang</th>
                                        <th scope="col">Pulang</th>
                                        <th scope="col">Ket</th>
                                        <th scope="col">KetLembur</th>
                                        <th scope="col">Lam..</th>
                                        <th scope="col">Tinggal</th>
                                        <th scope="col">Lebih</th>
                                        <th scope="col">Lbr 1</th>
                                        <th scope="col">Lbr 2</th>
                                        <th scope="col">Lbr 3</th>
                                        <th scope="col">Lbr 4</th>
                                        <th scope="col">JmlJam</th>
                                        <th scope="col">Istirahat</th>


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
                        <div style="flex: 1; margin-right: 10px; margin-top: 5px; align-items:center;">
                            <input type="checkbox">
                            <label for="staff">Centang Semua</label>
                        </div>
                        <div class="card-container"
                        style="display: flex; flex-wrap: nowrap; ">
                        <div>
                        <div class="card-body" style="flex: 1; margin-right: 10px;margin-left: 10px;border:1px solid black; ">

                            <div class="time-form" style="display: flex; flex-direction: row; justify-content: left;">
                                <label for="masukLembur">Tanggal</label>
                                <div style="margin-left:51px">
                                    <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                        value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required style="max-width: 200px; margin-left: 5px;">
                                </div>

                            </div>
                            <div style="display: flex; flex-direction: row; justify-content: left;">
                                <label style="margin-bottom: 5px;">Keterangan</label>
                                <select class="form-control" id="Shift" name="Shift"
                                    style="resize: none;height: 35px; max-width:150px;margin-left:43px;">
                                    <option value="">Masuk</option>
                                    <option value="">Sakit</option>
                                    <option value="">Ijin</option>
                                </select>
                            </div>
                            <div style="display: flex; flex-direction: row; justify-content: left;margin-top:10px;">

                                <label style="margin-bottom: 5px;">Alasan Lembur</label>
                                <div style="display: flex; flex-wrap: nowrap;">
                                    <textarea class="" id="NIK" name="NIK" style="resize: none;height: 35px; margin-left:20px;" required></textarea>
                                </div>

                            </div>
                            <div style="display: flex; flex-direction: row; justify-content: left;margin-top:10px;">
                                <label style="margin-bottom: 5px;">Klinik</label>
                                <select class="form-control" id="Shift" name="Shift"
                                    style="resize: none;height: 35px; max-width:150px;margin-left:81px;">
                                    <option value="">Masuk</option>
                                    <option value="">Sakit</option>
                                    <option value="">Ijin</option>
                                </select>
                            </div>
                            <div class="time-form" style="display: flex; flex-direction: row; justify-content: left;">
                                <label for="masukLembur">Pulang Kerja :</label>
                                <div>
                                    <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                        value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required style="max-width: 200px; margin-right: 5px">
                                </div>
                                <div>

                                    <input class="form-control" type="time" id="masukLembur" name="masukLembur">
                                </div>
                            </div>

                            <div class="card-body" style="flex: 1; margin-right: 10px;margin-left: 10px;border:1px solid black; ">
                                <div style="display: flex; flex-direction: row; justify-content: left;margin-top:10px;">

                                    <label style="margin-bottom: 5px;">Alasan Lembur</label>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <textarea class="" id="NIK" name="NIK" style="resize: none;height: 35px; margin-left:20px;" required></textarea>
                                    </div>

                                </div>
                                <div class="card-container" style="display: flex; flex-wrap: nowrap;">
                                    <div class="card-body" style="flex: 1;">
                                        <div style="display: flex; flex-direction: row; justify-content: flex-start; align-items: center; margin-top: 10px;">
                                            <label style="margin-bottom: 5px; margin-right: 10px;">Terlambat</label>
                                            <div style="display: flex; flex-wrap: nowrap;">
                                                <textarea class="" id="NIK" name="NIK" style="resize: none; height: 35px; margin-left: 20px;" required></textarea>
                                            </div>
                                        </div>
                                        <div style="display: flex; flex-direction: row; justify-content: flex-start; align-items: center; margin-top: 10px;">
                                            <label style="margin-bottom: 5px; margin-right: 10px;">Tinggal</label>
                                            <div style="display: flex; flex-wrap: nowrap;">
                                                <textarea class="" id="NIK" name="NIK" style="resize: none; height: 35px; margin-left: 35px;" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body" style="flex: 1;">
                                        <div style="display: flex; flex-direction: row; justify-content: flex-start; align-items: center; margin-top: 10px;">
                                            <label style="margin-bottom: 5px; margin-right: 10px;">Lembur_1.5</label>
                                            <div style="display: flex; flex-wrap: nowrap;">
                                                <textarea class="" id="NIK" name="NIK" style="resize: none; height: 35px; margin-left: 20px;" required></textarea>
                                            </div>
                                        </div>
                                        <div style="display: flex; flex-direction: row; justify-content: flex-start; align-items: center; margin-top: 10px;">
                                            <label style="margin-bottom: 5px; margin-right: 10px;">Lembur_2</label>
                                            <div style="display: flex; flex-wrap: nowrap;">
                                                <textarea class="" id="NIK" name="NIK" style="resize: none; height: 35px; margin-left: 32px;" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body" style="flex: 1;">
                                        <div style="display: flex; flex-direction: row; justify-content: flex-start; align-items: center; margin-top: 10px;">
                                            <label style="margin-bottom: 5px; margin-right: 10px;">Lembur_3</label>
                                            <div style="display: flex; flex-wrap: nowrap;">
                                                <textarea class="" id="NIK" name="NIK" style="resize: none; height: 35px; margin-left: 20px;" required></textarea>
                                            </div>
                                        </div>
                                        <div style="display: flex; flex-direction: row; justify-content: flex-start; align-items: center; margin-top: 10px;">
                                            <label style="margin-bottom: 5px; margin-right: 10px;">Lembur_4</label>
                                            <div style="display: flex; flex-wrap: nowrap;">
                                                <textarea class="" id="NIK" name="NIK" style="resize: none; height: 35px; margin-left: 20px;" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div class="row" style="padding-top: 20px;">
                            <div class="col-6" style="text-align: left; ">
                                <button type="button" class="btn btn-info" style="margin-left: 10px">Tambah</button>
                                <button type="button" class="btn btn-primary" style="margin-left: 10px">Koreksi</button>
                                <button type="button" class="btn btn-danger" style="margin-left: 10px">Hapus</button>
                            </div>
                            <div class="col-6" style="text-align: right; ">
                                <button type="button" class="btn btn-primary" style="margin-left: 50px">Proses</button>
                                <button type="button" class="btn btn-dark" style="margin-left: 10px">Keluar</button>
                            </div>
                        </div>

                        </div>
                        {{-- <div style="text-align: left; margin: 25px;">
                            <button type="button" class="btn btn-info" style="margin-left: 10px">Tambah</button>
                            <button type="button" class="btn btn-primary" style="margin-left: 10px">Koreksi</button>
                            <button type="button" class="btn btn-danger" style="margin-left: 10px">Hapus</button>
                        </div>
                        <div style="text-align: right; margin: 25px;">
                            <button type="button" class="btn btn-primary" style="margin-left: 50px">Proses</button>
                            <button type="button" class="btn btn-dark" style="margin-left: 10px">Keluar</button>


                        </div> --}}


                        <div class="card-body" style="flex: 1; margin-right: 10px;margin-left: 10px; ">

                            <div class="keterangan2" style="margin: 20px;">
                                <div class="card-container"
                        style="display: flex; flex-wrap: nowrap; ">
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: auto; margin-left: 10px; ">
                            <div style=" flex-wrap: wrap;">
                                <div style="display: flex; ">
                                        <span style="margin-right: 10px;">A : Alpha</span>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <span style="margin-right: 10px;">B : Hari Besar/ Libur</span>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <span style="margin-right: 10px;">C : Cuti</span>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <span style="margin-right: 10px;">D : Dispensasi</span>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <span style="margin-right: 10px;">H : Hamil</span>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <span style="margin-right: 10px;">K : Skorsing</span>
                                    </div>



                            </div>

                        </div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: auto; margin-left: 10px; ">
                            <div style=" flex-wrap: wrap;">
                                <div style="display: flex; ">
                                        <span style="margin-right: 10px;">L : Lembur</span>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <span style="margin-right: 10px;">M : Masuk</span>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <span style="margin-right: 10px;">N/Z/J : Tanpa Status(mohon dikoreksi)</span>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <span style="margin-right: 10px;">P : Peringatan</span>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <span style="margin-right: 10px;">S : Sakit</span>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <span style="margin-right: 10px;">X : Tidak dibayar</span>
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







            </div>
        </div>

    </div>
    <br>

    </div>
    </div>
    </div>
@endsection
