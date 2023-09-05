@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance BKM-BKK Pengembalian K.E.</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 100%;">
                                        <b>BKM</b>
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
                                                <label for="idBKM" style="margin-right: 10px;">Id. BKM</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" id="idBKM" name="idBKM" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="namaCustomer" style="margin-right: 10px;">Nama Customer</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="namaCustomerSelect" name="namaCustomerSelect" class="form-control">

                                                </select>
                                            </div>

                                            <div class="col-md-2">
                                                <input type="number" id="idCustomer" name="idCustomer" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="mataUang" style="margin-right: 10px;">Mata Uang</label>
                                            </div>
                                            <div class="col-md-4">
                                                <select id="mataUangBKMSelect" name="mataUangBKMSelect" class="form-control">

                                                </select>
                                            </div>

                                            <div class="col-md-2">
                                                <input type="number" id="idMataUangBKM" name="idMataUangBKM" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="jumlahUangBKM" style="margin-right: 10px;">Jumlah Uang</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="number" id="jumlahUangBKM" name="jumlahUangBKM" class="form-control" style="width: 100%">
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
                                                <label for="bank" style="margin-right: 10px;">Bank</label>
                                            </div>
                                            <div class="col-md-4">
                                                <select id="namaBankBKMSelect" name="namaBankBKMSelect" class="form-control">

                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" id="idBankBKM" name="idBankBKM" class="form-control" style="width: 100%">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" id="jenisBankBKM" name="jenisBankBKM" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="jenisPembayaran" style="margin-right: 10px;">Jenis Pembayaran</label>
                                            </div>
                                            <div class="col-md-3">
                                                <select id="jenisPembayaranBKMSelect" name="jenisPembayaranBKMSelect" class="form-control">
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" id="idJenisPembayaranBKM" name="idJenisPembayaranBKM" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="kodePerkiraan" style="margin-right: 10px;">Kode Perkiraan</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" id="idKodePerkiraanBKM" name="idKodePerkiraanBKM" class="form-control" style="width: 100%">
                                            </div>
                                            <div class="col-md-5">
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


                                        <!--CARD 2-->
                                        <div class="card" style>
                                            <b>BKK</b>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="idBKK" style="margin-right: 10px;">Id. BKK</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="idBKK" name="idBKK" class="form-control" style="width: 100%" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="mataUangBKK" style="margin-right: 10px;">Mata Uang</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" id="mataUangBKK" name="mataUangBKK" class="form-control" style="width: 100%" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="jumlahUangBKK" style="margin-right: 10px;">Jumlah Uang</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="jumlahUangBKK" name="jumlahUangBKK" class="form-control" style="width: 100%" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="bank" style="margin-right: 10px;">Bank</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="namaBankBKK" name="namaBankBKK" class="form-control" style="width: 100%" readonly>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" id="idBankBKK" name="idBankBKM" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" id="jenisBankBKK" name="jenisBankBKM" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="jenisPembayaranBKK" style="margin-right: 10px;">Jenis Pembayaran</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" id="jenisPembayaranBKK" name="jenisPembayaranBKK" class="form-control" style="width: 100%" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="kodePerkiraan" style="margin-right: 10px;">Kode Perkiraan</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" id="idKodePerkiraanBKK" name="idKodePerkiraanBKK" class="form-control" style="width: 100%" readonly>
                                                </div>
                                                <div class="col-md-5">
                                                    <select id="kodePerkiraanBKKSelect" name="kodePerkiraanBKKSelect" class="form-control" readonly>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="uraianBKK" style="margin-right: 10px;">Uraian</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" id="uraianBKK" name="uraianBKK" class="form-control" style="width: 100%" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div >
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="submit" id="btnProses" name="btnProses" value="PROSES" class="btn btn-primary">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" id="btnBatal" name="btnBatal" value="Batal" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" name="tampilbkm" value="TampilBKM" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" name="tampilbkk" value="TampilBKK" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" name="tutup" value="TUTUP" class="btn btn-primary d-flex ml-auto">
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
<script src="{{ asset('js/Piutang/BKMPengembalianKE.js') }}"></script>
@endsection
