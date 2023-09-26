@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance Pelunasan Tagihan (Cash Advance)</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="tanggalInput" style="margin-right: 10px;">Tanggal Input</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" id="tanggalInput" name="tanggalInput" class="form-control" style="width: 100%" readonly>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="namaCustomerSelect" style="margin-right: 10px;">Nama Customer</label>
                                    </div>
                                    <div class="col-md-7">
                                        <select id="namaCustomerSelect" name="namaCustomerSelect" class="form-control" readonly>

                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="idCustomer" name="idCustomer" class="form-control" style="width: 100%" readonly>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="namaCustomer" name="namaCustomer" class="form-control" style="width: 100%" readonly>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="noPelunasanSelect" style="margin-right: 10px;">No. Pelunasan</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select id="noPelunasanSelect" name="noPelunasanSelect" class="form-control" readonly>

                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="noPelunasan" name="noPelunasan" class="form-control" style="width: 100%" readonly>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="informasiBankSelect" style="margin-right: 10px;">Informasi Bank</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select id="informasiBankSelect" name="informasiBankSelect" class="form-control" readonly>

                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="nilaiMasukKas" style="margin-right: 10px;">Nilai Masuk Kas</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="number" id="nilaiMasukKas" name="nilaiMasukKas" class="form-control" style="width: 100%" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" id="nilaiPelunasan" name="nilaiPelunasan" class="form-control" style="width: 100%" readonly>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="idBKM" style="margin-right: 10px;">No. BKM</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" id="idBKM" name="idBKM" class="form-control" style="width: 100%" readonly>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="jenisPembayaranSelect" style="margin-right: 10px;">Jenis Pembayaran</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select id="jenisPembayaranSelect" name="jenisPembayaranSelect" class="form-control" readonly>

                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" id="idJenisPembayaran" name="idJenisPembayaran" class="form-control" style="width: 100%" readonly>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="mataUangSelect" style="margin-right: 10px;">Mata Uang</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select id="mataUangSelect" name="mataUangSelect" class="form-control" readonly>

                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="number" id="idMataUang" name="idMataUang" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="sisaPelunasan" style="margin-right: 10px;">Sisa Pelunasan</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="number" id="sisaPelunasan" name="sisaPelunasan" class="form-control" style="width: 100%" readonly>
                                    </div>
                                </div>

                                <br><div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="submit" id="btnAddItem" name="btnAddItem" value="Add Item" class="btn btn-primary">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" id="btnEditItem" name="btnEditItem" value="Edit Item" class="btn btn-primary">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" id="btnDeleteItem" name="btnDeleteItem" value="Delete Item" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>

                                <br><div>
                                    <div style="overflow-y: auto; overflow-x: auto; max-height: 400px;">
                                        <table style="width: 155%; table-layout: fixed;" id="tabelPelunasanPenjualan">
                                            <colgroup>
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 20%;">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Id. Penagihan</th>
                                                    <th>Nilai Pelunasan</th>
                                                    <th>Biaya</th>
                                                    <th>Lunas</th>
                                                    <th>Id. Detail Pelunasan</th>
                                                    <th>Pelunasan Rupiah</th>
                                                    <th>Pelunasan Currency</th>
                                                    <th>Kurang Lebih</th>
                                                    <th>Perkiraan</th>
                                                    <th>ID_Tagihan_Pembulatan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="totalPemakaian" style="margin-right: 10px;">Total Pemakaian</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="totalPemakaian" name="totalPemakaian" class="form-control" style="width: 100%" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="kurangLebih" style="margin-right: 10px;">Kurang/Lebih</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="kurangLebih" name="kurangLebih" class="form-control" style="width: 100%" readonly>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="totalBiaya" style="margin-right: 10px;">Total Biaya</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="totalBiaya" name="totalBiaya" class="form-control" style="width: 100%" readonly>
                                    </div>
                                </div>

                                <br><div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="submit" id="btnIsi" name="btnIsi" value="Isi" class="btn btn-primary">
                                            <input type="submit" id="btnSimpan" name="btnSimpan" value="Simpan" class="btn btn-primary" style="display: none">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" id="btnKeluar" name="btnKeluar" value="Keluar" class="btn btn-primary">
                                            <input type="submit" id="btnBatal" name="btnBatal" value="Batal" class="btn btn-primary" style="display: none">
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
<script src="{{ asset('js/Piutang/PelunasanPenjualanCashAdvance.js') }}"></script>
@endsection
