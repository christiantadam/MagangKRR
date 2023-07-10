@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center" style="">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="margin:auto;">
                    <div class="card-header">Transfer Absen</div>

                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px;">


                        <div class="permohonan-s-p-container18" id="div_detailSuratPesanan">
                            <div class="container19"> <span>Divisi</span>
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
                            <div class="container19"> Kode Pegawai
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
                            <div class="container19"> Divisi Baru
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
                            <div class="container19"> Kode Pegawai Baru
                            </div>
                            <div class="permohonan-s-p-container20">
                                <div class="permohonan-s-p-container21">
                                    <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>

                                </div>
                            </div>
                            <div class="container19"> Divisi Baru
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
                            <div class="container19"> Tgl Masuk
                            </div>
                            <div class="permohonan-s-p-container20">
                                <div class="permohonan-s-p-container21">


                                    <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                        value="{{ old('TglLapor', now()->format('Y-m-d')) }}"
                                        style="width: 150px; margin-right:20px;" required>




                                </div>
                            </div>







                        </div>
                        <br>
                        <div class="permohonan-s-p-container18" id="div_detailSuratPesanan">
                            <div class="container19"> Masa Kontrak
                            </div>
                            <div class="permohonan-s-p-container20">
                                <div class="permohonan-s-p-container21">


                                    <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                        value="{{ old('TglLapor', now()->format('Y-m-d')) }}"
                                        style="width: 150px; margin-right:20px;" required>




                                </div>
                            </div>
                            <div class="container19" style="margin-left:-250px"> s/d
                            </div>
                            <div class="permohonan-s-p-container20" style="margin-left:-100px;">
                                <div class="permohonan-s-p-container21">


                                    <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                        value="{{ old('TglLapor', now()->format('Y-m-d')) }}"
                                        style="width: 150px; margin-right:20px;" required>




                                </div>
                            </div>

                            <div style="height: 40px; border: 1px solid black; display: flex; align-items: center; margin-left:-155px;">
                                <div style="padding: 10px; display: flex; align-items: center;">
                                    <input type="radio" id="staff" name="pekerja" value="staff" checked style="vertical-align: middle;">
                                    <label for="staff" style="margin-left: 5px;">
                                        <span style="display: inline-block; vertical-align: middle;">1</span>
                                        <span style="display: inline-block; vertical-align: middle; margin-left: 5px;">Bulan</span>
                                    </label>
                                </div>

                                <div style="padding: 10px; display: flex; align-items: center;">
                                    <input type="radio" id="bukanStaff1" name="pekerja" value="bukanStaff" style="vertical-align: middle;">
                                    <label for="bukanStaff1" style="margin-left: 5px;">
                                        <span style="display: inline-block; vertical-align: middle;">3</span>
                                        <span style="display: inline-block; vertical-align: middle; margin-left: 5px;">Bulan</span>
                                    </label>
                                </div>

                                <div style="padding: 10px; display: flex; align-items: center;">
                                    <input type="radio" id="bukanStaff2" name="pekerja" value="bukanStaff" style="vertical-align: middle;">
                                    <label for="bukanStaff2" style="margin-left: 5px;">
                                        <span style="display: inline-block; vertical-align: middle;">6</span>
                                        <span style="display: inline-block; vertical-align: middle; margin-left: 5px;">Bulan</span>
                                    </label>
                                </div>
                                <div style="padding: 10px; display: flex; align-items: center;">
                                    <input type="radio" id="bukanStaff2" name="pekerja" value="bukanStaff" style="vertical-align: middle;">
                                    <label for="bukanStaff2" style="margin-left: 5px;">
                                        <span style="display: inline-block; vertical-align: middle;">9</span>
                                        <span style="display: inline-block; vertical-align: middle; margin-left: 5px;">Bulan</span>
                                    </label>
                                </div>
                                <div style="padding: 10px; display: flex; align-items: center;">
                                    <input type="radio" id="bukanStaff2" name="pekerja" value="bukanStaff" style="vertical-align: middle;">
                                    <label for="bukanStaff2" style="margin-left: 5px;">
                                        <span style="display: inline-block; vertical-align: middle;">12</span>
                                        <span style="display: inline-block; vertical-align: middle; margin-left: 5px;">Bulan</span>
                                    </label>
                                </div>
                                <div style="padding: 10px; display: flex; align-items: center;">
                                    <input type="radio" id="bukanStaff2" name="pekerja" value="bukanStaff" style="vertical-align: middle;">
                                    <label for="bukanStaff2" style="margin-left: 5px;">
                                        <span style="display: inline-block; vertical-align: middle;">2</span>
                                        <span style="display: inline-block; vertical-align: middle; margin-left: 5px;">Tahun</span>
                                    </label>
                                </div>

                                <!-- Tambahkan kode untuk radio button dan label berikutnya -->
                            </div>












                        </div>
                        <br>
                        <div class="permohonan-s-p-container18" id="div_detailSuratPesanan">
                            <div class="container19"> Tgl Keluar
                            </div>
                            <div class="permohonan-s-p-container20">
                                <div class="permohonan-s-p-container21">


                                    <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                        value="{{ old('TglLapor', now()->format('Y-m-d')) }}"
                                        style="width: 150px; margin-right:20px;" required>



                                        <div style="height: 40px; border: 1px solid black; display: flex; align-items: center; ">
                                            <div style="padding: 10px; display: flex; align-items: center;">
                                                <input type="radio" id="staff" name="pekerja" value="staff" checked style="vertical-align: middle;">
                                                <label for="staff" style="margin-left: 5px;">

                                                    <span style="display: inline-block; vertical-align: middle; margin-left: 5px;">Perpanjangan</span>
                                                </label>
                                            </div>

                                            <div style="padding: 10px; display: flex; align-items: center;">
                                                <input type="radio" id="bukanStaff1" name="pekerja" value="bukanStaff" style="vertical-align: middle;">
                                                <label for="bukanStaff1" style="margin-left: 5px;">

                                                    <span style="display: inline-block; vertical-align: middle; margin-left: 5px;">Resign 3 Tahun</span>
                                                </label>
                                            </div>



                                            <!-- Tambahkan kode untuk radio button dan label berikutnya -->
                                        </div>
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
