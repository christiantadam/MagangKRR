@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">BKM BKK Nota Kredit</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div>
                                    <b>Data Nota Kredit</b>
                                    <div style="overflow-y: auto; max-height: 400px; overflow-x: auto">
                                        <table style="width: 160%; table-layout: fixed;" id="tabelNotaKredit">
                                            <colgroup>
                                                <col style="width: 25%;">
                                                <col style="width: 25%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 20%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                            </colgroup>
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Customer</th>
                                                    <th>Tgl. Nota Kredit</th>
                                                    <th>No. Nota Kredit</th>
                                                    <th>No. Penagihan</th>
                                                    <th>Jenis Nota Kredit</th>
                                                    <th>Jumlah Uang</th>
                                                    <th>Mata Uang</th>
                                                    <th>Id. Mata Uang</th>
                                                    <th>Id. Customer</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 60%;">
                                        <div class="card" style>
                                            <b>BKM</b>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="tanggal" style="margin-right: 10px;">Tanggal</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="date" id="tanggal" name="tanggal" class="form-control" style="width: 100%">
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
                                                <div class="col-md-4">
                                                    <select id="mataUangBKMSelect" name="mataUangBKMSelect" class="form-control">

                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="kursRupiah" style="margin-right: 10px;">Kurs Rupiah</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" id="kursRupiah" name="kursRupiah" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <input type="text" name="idMataUangBKM" id="idMataUangBKM" class="form-control" style="width: 100%">
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
                                                <div class="col-md-5">
                                                    <select id="namaBankBKMSelect" name="namaBankBKMSelect" class="form-control">

                                                    </select>
                                                </div>
                                                <!--HIDDEN INPUT-->
                                                <div class="col-md-4">
                                                    <input type="text" id="idBankBKM" name="idBankBKM" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="jenisBankBKM" name="jenisBankBKM" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="kodePerkiraan" style="margin-right: 10px;">Kode Perkiraan</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" id="idKodePerkiraanBKM" name="idKodePerkiraanBKM" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-5">
                                                    <select id="kodePerkiraanSelectBKM" name="kodePerkiraanSelectBKM" class="form-control">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="uraian" style="margin-right: 10px;">Uraian</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" id="uraianBKM" name="uraianBKM" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                        </div>

                                        <!--CARD 2-->
                                        <div class="card" style>
                                            <b>BKK</b>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="idBKK" style="margin-right: 10px;">Id. BKK</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="idBKK" name="idBKK" class="form-control" style="width: 100%" disabled>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="jumlahUangBKK" style="margin-right: 10px;">Jumlah Uang</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="jumlahUangBKK" name="jumlahUangBKK" class="form-control" style="width: 100%" disabled>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="namaBankBKKSelect" style="margin-right: 10px;">Bank</label>
                                                </div>
                                                <div class="col-md-5">
                                                    <select id="namaBankBKKSelect" name="namaBankBKKSelect" class="form-control" disabled>

                                                    </select>
                                                </div>
                                                <input type="text" id="idBankBKK" name="idBankBKK" class="form-control" style="width: 100%">
                                                <input type="text" id="jenisBankBKK" name="jenisBankBKK" class="form-control" style="width: 100%">
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="kodePerkiraan" style="margin-right: 10px;">Kode Perkiraan</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" id="idKodePerkiraanBKK" name="idKodePerkiraanBKK" class="form-control" style="width: 100%" disabled>
                                                </div>
                                                <div class="col-md-1">
                                                    <select id="kodePerkiraanBKKSelect" name="kodePerkiraanBKKSelect" class="form-control" disabled>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="uraianBKK" style="margin-right: 10px;">Uraian</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" id="uraianBKK" name="uraianBKK" class="form-control" style="width: 100%" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--CARD 3 KANAN-->
                                    <div style="width: 40%;">
                                        <div class="card-body">
                                            <div style="display: flex; justify-content: center;">
                                                <input type="submit" id="btnPilihNotaKredit" name="btnPilihNotaKredit" value="Pilih Nota Kredit" class="btn btn-primary d-flex ml-auto">
                                            </div>
                                            <div class="row" style="display: flex; justify-content: center; margin-top: 150px">
                                                <div style="margin-right: 10px;">
                                                    <button type="submit" name="proses" class="btn btn-primary">PROSES</button>
                                                </div>
                                                <div style="margin-right: 10px;">
                                                    <input type="submit" name="koreksi" value="Koreksi" class="btn btn-primary">
                                                </div>
                                                <div>
                                                    <input type="submit" name="batal" value="Batal" class="btn btn-primary">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row" style="display: flex; justify-content: center;">
                                                <div style="margin-right: 10px;">
                                                    <button type="submit" name="tampilbkm" class="btn btn-primary">Tampil BKM</button>
                                                </div>
                                                <div style="margin-right: 10px;">
                                                    <button type="submit" name="tampilbkk" class="btn btn-primary">Tampil BKK</button>
                                                </div>
                                                <div>
                                                    <input type="submit" name="tutup" value="TUTUP" class="btn btn-primary">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('js/Piutang/BKMBKKNotaKredit.js') }}"></script>
@endsection
