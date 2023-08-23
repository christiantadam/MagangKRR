@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">BKM Transitoris Bank</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 60%;">
                                        <div class="card" style>
                                            <b>BKK</b>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="tanggal" style="margin-right: 10px;">Tanggal</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="date" id="tanggal" name="tanggal" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-3">
                                                    Wajib di-ENTER
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="idBKK" style="margin-right: 10px;">Id. BKK</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="idBKK" name="idBKK" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="mataUangSelect" style="margin-right: 10px;">Mata Uang</label>
                                                </div>
                                                <div class="col-md-5">
                                                    <select name="mataUangSelect" id="mataUangSelect" class="form-control">
                                                        {{-- <option value="MataUang 1">MU1</option>
                                                        <option value="MataUang 2">MU2</option> --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="jumlahUang" style="margin-right: 10px;">Jumlah Uang</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="jumlahUang" name="jumlahUang" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="namaBankSelect" style="margin-right: 10px;">Bank</label>
                                                </div>
                                                <div class="col-md-5">
                                                    <select name="namaBankSelect" id="namaBankSelect" class="form-control">

                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <input type="submit" id="btnTambahBiaya" name="btnTambahBiaya" value="Tambah Biaya" class="btn btn-primary" disabled>
                                                </div>
                                            </div>
                                            <!----->
                                            <input type="text" id="idBankBKK" name="idBankBKK" class="form-control" style="width: 100%">
                                            <input type="text" id="jenisBank" name="jenisBank" class="form-control" style="width: 100%">
                                            <!---->

                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="jenisPembayaranSelect" style="margin-right: 10px;">Jenis Pembayaran</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="jenisPembayaranSelect" id="jenisPembayaranSelect" class="form-control">

                                                    </select>
                                                </div>
                                                <div class="col-3" style="padding-left: 70px">
                                                    <input type="submit" id="btnProses" name="koreksidetail" value="Detail BG/CEK/Transfer/DBT" class="btn btn-primary">
                                                </div>
                                            </div>
                                            <input type="text" id="idJenisPembayaran" name="idJenisPembayaran" class="form-control" style="width: 100%">
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="kodePerkiraan" style="margin-right: 10px;">Kode Perkiraan</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" id="idKodePerkiraan" name="idKodePerkiraan" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-5">
                                                    <select name="kodePerkiraanSelect" id="kodePerkiraanSelect" class="form-control">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="uraian" style="margin-right: 10px;">Uraian</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" id="uraian" name="uraian" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                        </div>

                                        <!--CARD 2-->
                                        {{-- <div class="card disabled" id="cardBKM"> --}}
                                        <div class="card " id="cardBKM">
                                            <b>BKM</b>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="tanggalBKM" style="margin-right: 10px;">Tanggal</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="date" id="tanggalBKM" name="tanggalBKM" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-3">
                                                    Wajib di-ENTER
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="idBKM" style="margin-right: 10px;">Id. BKM</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="idBKM" name="idBKM" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="mataUangBKMSelect" style="margin-right: 10px;">Mata Uang</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <select id="mataUangBKMSelect" name="mataUangBKMSelect" class="form-control">
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <label for="kurs" style="margin-right: 10px;">Kurs</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" id="kurs" name="kurs" class="form-control" style="width: 100%">
                                                </div>

                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="jumlahUangBKM" style="margin-right: 10px;">Jumlah Uang</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="jumlahUangBKM" name="jumlahUangBKM" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="namaBankBKMSelect" style="margin-right: 10px;">Bank</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <select id="namaBankBKMSelect" name="namaBankBKMSelect" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                            <!----->
                                            <input type="text" id="idBankBKM" name="idBankBKM" class="form-control" style="width: 100%">
                                            <input type="text" id="jenisBankBKM" name="jenisBankBKM" class="form-control" style="width: 100%">
                                            <!---->
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="jenisPembayaranBKMSelect" style="margin-right: 10px;">Jenis Pembayaran</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <select id="jenisPembayaranBKMSelect" name="jenisPembayaranBKMSelect" class="form-control">

                                                    </select>
                                                </div>
                                                <div class="col-3" style="padding-left: 70px">
                                                    <input type="submit" id="btnTambahBiayaBKM" name="btnTambahBiayaBKM" value="Tambah Biaya" class="btn btn-primary d-flex ml-auto">
                                                </div>
                                            </div>
                                            <input type="text" id="idJenisPembayaranBKM" name="idJenisPembayaranBKM" class="form-control" style="width: 100%">
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="kodePerkiraanBKMSelect" style="margin-right: 10px;">Kode Perkiraan</label>
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="number" id="idKodePerkiraanBKMSelect" name="idKodePerkiraanBKMSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                    <select id="kodePerkiraanBKMSelect" name="kodePerkiraanBKMSelect" class="form-control">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="uraianBKM" style="margin-right: 10px;">Uraian</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" id="uraianBKM" name="uraianBKM" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--CARD 2-->
                                    <div style="width: 40%;">
                                        <div >
                                            <div class="card-body">
                                                <b>Detail Biaya BKK</b>
                                                <div style="overflow-y: auto; max-height: 250px;">
                                                    <table style="width: 120%; table-layout: fixed;" id="tabelDetailBiayaBKK">
                                                        <colgroup>
                                                            <col style="width: 40%;">
                                                            <col style="width: 40%;">
                                                            <col style="width: 40%;">
                                                        </colgroup>
                                                        <thead class="table-dark">
                                                            <tr>
                                                                <th>Keterangan</th>
                                                                <th>Biaya</th>
                                                                <th>Kode Perkiraan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="submit" name="koreksibiaya" value="Koreksi Biaya" class="btn btn-primary">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="submit" name="hapusbiaya" value="Hapus Biaya" class="btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="card-body">
                                                <b>Detail BG/CEK/TRANSFER BKK</b>
                                                <div style="overflow-y: auto; max-height: 250px;">
                                                    <table style="width: 100%; table-layout: fixed;">
                                                        <colgroup>
                                                            <col style="width: 33%;">
                                                            <col style="width: 33%;">
                                                            <col style="width: 33%;">
                                                        </colgroup>
                                                        <thead class="table-dark">
                                                            <tr>
                                                                <th>Nomor</th>
                                                                <th>Jatuh Tempo</th>
                                                                <th>Status Cetak</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="submit" name="koreksinobg" value="Koreksi No BG" class="btn btn-primary">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="submit" name="hapusbg" value="Hapus BG" class="btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <b>Detail Biaya BKM</b>
                                                <div style="overflow-y: auto; max-height: 250px;">
                                                    <table style="width: 100%; table-layout: fixed;">
                                                        <colgroup>
                                                            <col style="width: 33%;">
                                                            <col style="width: 33%;">
                                                            <col style="width: 33%;">
                                                        </colgroup>
                                                        <thead class="table-dark">
                                                            <tr>
                                                                <th>Keterangan</th>
                                                                <th>Biaya</th>
                                                                <th>Kode Perkiraan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Data 1</td>
                                                                <td>Data 2</td>
                                                                <td>Data 3</td>
                                                            <tr>
                                                                <td>Data 1</td>
                                                                <td>Data 2</td>
                                                                <td>Data 3</td>
                                                            </tr>
                                                            <!-- Tambahkan baris lainnya jika diperlukan -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="submit" name="koreksibiaya" value="Koreksi Biaya" class="btn btn-primary">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="submit" name="hapusbiaya" value="Hapus Biaya" class="btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div >
                                    <div class="row">
                                        <div class="col-md-1">
                                            <input type="submit" name="proses" value="PROSES" class="btn btn-primary">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="koreksi" value="KOREKSI" class="btn btn-primary">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="batal" value="Batal" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="tampilbkm" value="TampilBKM" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="tampilbkk" value="TampilBKK" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="tutup" value="TUTUP" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!--MODAL TAMBAH BIAYA-->
                            <div class="modal fade" id="modalTambahBiaya" tabindex="-1" role="dialog"
                            aria-labelledby="pilihBankModal" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="pilihBankModal">Maintenance Biaya BKK Transitoris</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('BKMTransitorisBank') }}" id="formTambahBiaya"
                                            method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" id="methodTambahBiaya">
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="jumlahBiaya" style="margin-right: 10px;">Jumlah Biaya</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" id="jumlahBiaya" name="jumlahBiaya" class="form-control" style="width: 100%">
                                                </div>
                                                {{-- <input type="hidden" name="idcoba" id="idcoba" value="idcoba"> --}}
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="kodePerkiraanTambahBiayaSelect" style="margin-right: 10px;">Kode Perkiraan</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" id="idKodePerkiraanTambahBiaya" name="idKodePerkiraanKrgLbh" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-7">
                                                    <select name="kodePerkiraanTambahBiayaSelect" id="kodePerkiraanTambahBiayaSelect" class="form-control">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="keterangan" style="margin-right: 10px;">Keterangan</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" id="keterangan" name="keterangan"
                                                        class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-5">
                                                    <input type="submit" id="btnProsesTambahBiaya" name="btnProsesTambahBiaya" value="Proses" class="btn btn-primary">
                                                </div>
                                                <div class="col-3">
                                                </div>
                                                <div class="col-4">
                                                    <input type="submit" id="btnTutupModal" name="btnTutupModal"
                                                        value="Tutup" class="btn btn-primary">
                                                </div>
                                            </div>
                                            <input type="hidden" name="detpelunasan" id="detpelunasan" value="detkuranglebih">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('js/Piutang/BKMTransitorisBank.js') }}"></script>
@endsection
