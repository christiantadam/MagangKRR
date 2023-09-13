@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Nota Penjualan Tunai</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->

                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="namaCustomer" style="margin-right: 10px;">Nama Customer</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="namaCustomerSelect" id="namaCustomerSelect" class="form-control" readonly>

                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="tanggalInput" style="margin-right: 10px;">Tanggal Input</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" id="tanggalInput" name="tanggalInput" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <input class="form-check-input" type="checkbox" id="potongUM" name="potongUM" value="option1">
                                        </div>
                                        <div style="white-space: nowrap;">
                                            Potong Uang Muka
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="noPenagihan" style="margin-right: 10px;">No. Penagihan</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select id="noPenagihanSelect" name="noPenagihanSelect" class="form-control">

                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="jenisCustomer" style="margin-right: 10px;">Jenis Customer</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="jenisCustomer" name="jenisCustomer" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="alamat" style="margin-right: 10px;">Alamat</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" id="alamat" name="alamat" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="nomorSPSelect" style="margin-right: 10px;">Nomor SP</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="nomorSPSelect" id="nomorSPSelect" class="form-control">

                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="nomorPO" style="margin-right: 10px;">Nomor PO</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="nomorPO" name="nomorPO" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="mataUangSelect" style="margin-right: 10px;">Mata Uang</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="mataUangSelect" id="mataUangSelect" class="form-control" onchange="fillColumns()">

                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="nilaiKurs" style="margin-right: 10px;">Nilai Kurs</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="nilaiKurs" name="nilaiKurs" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="penagihanPajak" style="margin-right: 10px;">Penagihan Pajak</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" id="penagihanPajak" name="penagihanPajak" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="syaratPembayaran" style="margin-right: 10px;">Syarat Pembayaran</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="syaratPembayaran" name="syaratPembayaran" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                        Hari
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="userPenagihSelect" style="margin-right: 10px;">User Penagih</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="userPenagihSelect" id="userPenagihSelect" class="form-control" onchange="fillColumns()">

                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="dokumen" style="margin-right: 10px;">Dokumen</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="dokumenSelect" id="dokumenSelect" class="form-control" onchange="fillColumns()">

                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="jenisPajakSelect" style="margin-right: 10px;">Jenis Pajak</label>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="jenisPajakSelect" id="jenisPajakSelect" class="form-control" onchange="fillColumns()">

                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="PPN" style="margin-right: 10px;">PPN%</label>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="number" id="Ppn" name="Ppn" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="noPenagihanUM" style="margin-right: 10px;">No. Penagihan UM</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="noPenagihanUM" id="noPenagihanUM" class="form-control" onchange="fillColumns()">

                                        </select>
                                    </div>
                                </div>


                                <!--CARD 2-->
                                <br><div>
                                    <div style="overflow-y: auto; max-height: 400px;">
                                        <table style="width: 60%; table-layout: fixed;">
                                            <colgroup>
                                                <col style="width: 30%;">
                                                <col style="width: 30%;">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Surat Pesanan</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Data 1</td>
                                                    <td>Data 2</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="nilaiSP" style="margin-right: 10px;">Nilai SP (Blm Pajak)</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" id="nilaiSP" name="nilaiSP" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="nilaiUM" style="margin-right: 10px;">Nilai UM (Blm Pajak)</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" id="nilaiUM" name="nilaiUM" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                        <label for="discount" style="margin-right: 10px;">Discount</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" id="discount" name="discount" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="nilaiSdhBayar" style="margin-right: 10px;">Nilai Sdh Bayar (Blm Pajak)</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="nilaiSdhBayar" name="" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="totalPenagihan" style="margin-right: 10px;">Total Penagihan (Dengan PPN)</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="totalPenagihan" name="totalPenagihan" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="terbilang" style="margin-right: 10px;">Terbilang</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="terbilang" name="terbilang" class="form-control" style="width: 100%">
                                    </div>
                                </div>

                                <br><div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <input type="submit" id="btnIsi" name="btnIsi" value="Isi" class="btn btn-primary">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" id="btnKoreksi" name="btnKoreksi" value="Koreksi" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" id="btnHapus" name="btnHapus" value="Hapus" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" id="btnKeluar" name="btnKeluar" value="Keluar" class="btn btn-primary d-flex ml-auto">
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
<script src="{{ asset('js/Piutang/NotaPenjualanTunai.js') }}"></script>
@endsection
