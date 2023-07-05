@extends('layouts.appPayroll')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">PROGRAM Maintenance Karyawan Harian</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <h5>

                            <div class="panel-body">
                                <form class="form" method="POST" enctype="multipart/form-data" action="{{ url('/Jurnal') }}" >
                                    {{ csrf_field() }}
                                <div class="modal-body">
                                    <label>Posisi</label>
                                    <select class="form-control" id="Posisi" name="Posisi" value="" required>
                                        <option value="">Opsi 1</option>
                                        <option value="">Opsi 1</option>
                                        <option value="">Opsi 1</option>
                                    </select>
                                    <br>
                                    <label>Divisi</label>
                                    <select class="form-control" id="Divisi" name="Divisi" value="" required>
                                        <option value="">Opsi 1</option>
                                        <option value="">Opsi 1</option>
                                        <option value="">Opsi 1</option>
                                    </select>
                                    <br>
                                    <label>Kd Pegawai</label>
                                    <select class="form-control" id="KDPegawai" name="KDPegawai" value="" required>
                                        <option value="">Opsi 1</option>
                                        <option value="">Opsi 1</option>
                                        <option value="">Opsi 1</option>
                                    </select>
                                    <br>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <div style="flex: 1; margin-right: 10px;">
                                            <label>No Induk</label>
                                            <textarea class="form-control" id="NoInduk" name="NoInduk" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                        <div style="flex: 1; margin-right: 10px;">
                                            <label>No Kartu</label>
                                            <textarea class="form-control" id="NoKartu" name="NoKartu" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                        <div style="flex: 1; margin-right: 10px;">
                                            <label>Shift</label>
                                            <select class="form-control" id="Shift" name="Shift" style="resize: none;height: 40px; value="" required>
                                                <option value="">Pagi</option>
                                                <option value="">Siang</option>
                                                <option value="">Malam</option>
                                            </select>
                                        </div>
                                    </div>


                                    <br style="clear: both;">
                                    <br>
                                    <label>Alamat</label>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <textarea class="form-control" id="Alamat" name="Alamat" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                    <br>
                                    <label>Kota</label>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <textarea class="form-control" id="Kota" name="Kota" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                    <br>
                                    <label>NIK</label>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                    <br>
                                    <label style="margin-right: 10px;">Tempat Tanggal Lahir</label>
                                    <div style="display: flex; align-items: center;">

                                        <textarea class="form-control" id="NoInduk" name="NoInduk" style="resize: none; height: 40px;" required></textarea>
                                        <input class="form-control" type="date" id="TglLapor" name="TglLapor" value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>
                                    </div>
                                    <br>
                                    <label>Agama</label>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <textarea class="form-control" id="Agama" name="Agama" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                    <br>
                                    <label>Pendidikan</label>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <textarea class="form-control" id="Pendidikan" name="Pendidikan" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                    <br>
                                    <label>No. Rek</label>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <textarea class="form-control" id="Norek" name="Norek" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                    <br>

                                    <div style="display: flex; align-items: center;">
                                        <label style="width: 100px;margin-right: 10px;">Tgl Masuk</label>
                                        <input class="form-control" type="date" id="TglMasuk" name="TglMasuk" value="" style="width: 300px;margin-right: 10px;" required>
                                        <label style="width: 150px;margin-right: 10px;">Tgl Masuk Awal</label>
                                        <input class="form-control" type="date" id="TglMasukAwal" name="TglMasukAwal" value="" style="width: 300px;margin-right: 10px;" required>
                                    </div>

                                    <br>
                                    <label>Tgl. Awal Kontrak</label>
                                    <input class="form-control" type="date" id="TglLapor" name="TglLapor" value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>
                                    <br>
                                    <label>Jabatan</label>
                                    <textarea class="form-control" id="NoInduk" name="NoInduk" style="resize: none; height: 40px;" required></textarea>
                                    <br>
                                    <label>No Koperasi</label>
                                    <textarea class="form-control" id="NoInduk" name="NoInduk" style="resize: none; height: 40px;" required></textarea>
                                    <br>
                                    <label>NPWP</label>
                                    <textarea class="form-control" id="NoInduk" name="NoInduk" style="resize: none; height: 40px;" required></textarea>
                                    <br>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <div style="flex: 1; margin-right: 10px;">
                                            <label>Tinggi Badan</label>
                                            <textarea class="form-control" id="NoInduk" name="NoInduk" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                        <div style="flex: 1; margin-right: 10px;">
                                            <label>Berat Badan</label>
                                            <textarea class="form-control" id="NoKartu" name="NoKartu" style="resize: none;height: 40px;" required></textarea>
                                        </div>

                                    </div>
                                    <br>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Jenis Kelamin (W/L)</label>
                                        <textarea class="form-control" id="NoKartu" name="NoKartu" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                    <br>
                                    <div style="display: flex; flex-wrap: nowrap;">
                                        <div style="flex: 1; margin-right: 10px;">
                                            <label>Kawin (Y/T)</label>
                                            <textarea class="form-control" id="NoInduk" name="NoInduk" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                        <div style="flex: 1; margin-right: 10px;">
                                            <label>Jumlah Tanggungan</label>
                                            <textarea class="form-control" id="NoKartu" name="NoKartu" style="resize: none;height: 40px;" required></textarea>
                                        </div>

                                    </div>
                                    <br>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>No Astek</label>
                                        <textarea class="form-control" id="NoKartu" name="NoKartu" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                    <br>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>No RBH</label>
                                        <textarea class="form-control" id="NoKartu" name="NoKartu" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                    <br>
                                    <label>Tgl. Masuk Kop</label>
                                    <input class="form-control" type="date" id="TglLapor" name="TglLapor" value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>
                                    <br>
                                    <label>Tgl. Akhir Kontrak</label>
                                    <input class="form-control" type="date" id="TglLapor" name="TglLapor" value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>
                                    <br>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Golongan</label>
                                        <textarea class="form-control" id="NoKartu" name="NoKartu" style="resize: none;height: 40px;" required></textarea>
                                    </div>




                                    {{-- <input type="radio" id="staff" name="pekerja" value="staff" checked>
                                    <label for="staff">Harian</label>

                                    <input type="radio" id="bukanStaff" name="pekerja" value="bukanStaff">
                                    <label for="bukanStaff">Staff</label> --}}


                                </div>

                            </form>
                        </div>


                        </h5>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Komponen Upah PerHari</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <h5>

                            <div class="panel-body">
                                <form class="form" method="POST" enctype="multipart/form-data" action="{{ url('/Jurnal') }}" >
                                    {{ csrf_field() }}
                                <div class="modal-body">


                                    <br>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>U. Pokok</label>
                                        <textarea class="form-control" id="NoKartu" name="NoKartu" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                    <br>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>U. Jenjang</label>
                                        <textarea class="form-control" id="NoKartu" name="NoKartu" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                    <br>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>Tunj. Jabatan</label>
                                        <textarea class="form-control" id="NoKartu" name="NoKartu" style="resize: none;height: 40px;" required></textarea>
                                    </div>
                                    <br>
                                    <div style="flex: 1; margin-right: 10px;">
                                        <label>U. Golongan</label>
                                        <textarea class="form-control" id="NoKartu" name="NoKartu" style="resize: none;height: 40px;" required></textarea>
                                    </div>

                                    {{-- <input type="radio" id="staff" name="pekerja" value="staff" checked>
                                    <label for="staff">Harian</label>

                                    <input type="radio" id="bukanStaff" name="pekerja" value="bukanStaff">
                                    <label for="bukanStaff">Staff</label> --}}


                                </div>

                            </form>
                        </div>


                        </h5>
                    </div>
                </div>
                <div style="text-align: right; margin-top: 20px;">


                    <button type="button" class="btn btn-info">Isi</button>
                    <button type="button" class="btn btn-warning">Koreksi</button>
                    <button type="button" class="btn btn-danger">Hapus</button>
                    <button type="button" class="btn btn-dark">Keluar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
