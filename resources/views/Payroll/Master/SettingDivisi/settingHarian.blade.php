@extends('layouts.appPayroll')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">PEKERJA</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="permohonan-s-p-container18" id="div_detailSuratPesanan">
                            <div class="permohonan-s-p-container19"> <span>Divisi</span> <span>Manager</span>
                                <span>Supervisor</span>
                            </div>
                            <div class="permohonan-s-p-container20">
                                <div class="permohonan-s-p-container21"> <select name="jenis_brg" id="jenis_brg"
                                        class="form-control">
                                        <option disabled selected value>---Pilih Divisi---</option>

                                    </select>
                                </div>
                                <div class="permohonan-s-p-container21">
                                    <select name="kategori_utama" id="kategori_utama" class="form-control">
                                        <option disabled selected value>---Pilih Manager---</option>

                                    </select>
                                    <select name="kategori_utama" id="kategori_utama" class="form-control">
                                        <option disabled selected value></option>

                                    </select>

                                </div>
                                <div class="permohonan-s-p-container21">
                                    <select name="kategori_utama" id="kategori_utama" class="form-control">
                                        <option disabled selected value>---Pilih Supervisor</option>

                                    </select>
                                    <select name="kategori_utama" id="kategori_utama" class="form-control">
                                        <option disabled selected value></option>

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div style="text-align: right; margin-top: 20px;">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary">Keluar</button>
                        </div>

                    </div>
                </div>
                <br>

            </div>
        </div>
    </div>
@endsection
