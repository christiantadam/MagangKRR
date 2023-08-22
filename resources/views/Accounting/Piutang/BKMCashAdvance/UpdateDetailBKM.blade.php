@extends('layouts.appAccounting')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Update Detail BKM</div>
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="{{ url('UpdateDetailBKM') }}" id="formkoreksi">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" id="methodkoreksi">
                                <!-- Form fields go here -->
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="bulanTahun" style="margin-right: 10px;">Bulan/Tahun</label>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="bulan" name="bulan" class="form-control"
                                            style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="tahun" name="tahun" class="form-control"
                                            style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="btnOK" name="isi" value="OK" class="btn">
                                    </div>
                                    <!--Kedua button dibawah tidak digunakan, karena di vb nya, diset visible = false-->
                                    <div class="col-md-2">
                                        <input type="submit" id="btnPilihBank" name="btnPilihBank" value="Pilih Bank"
                                            class="btn" style="display: none;">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="btnGroupBKM" name="btnGroupBKM" value="Group BKM"
                                            class="btn" style="display: none;">
                                    </div>
                                </div>

                                <br>
                                <div>
                                    Data Pelunasan
                                    <div style="overflow-y: auto; max-height: 400px;">
                                        <table style="width: 160%; table-layout: fixed;" id="tabelDataPelunasan">
                                            <colgroup>
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 20%;">
                                                <col style="width: 15%;">
                                                <col style="width: 20%;">
                                                <col style="width: 20%;">
                                                <col style="width: 20%;">
                                                <col style="width: 20%;">
                                            </colgroup>
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Tgl Input</th>
                                                    <th>Id. BKM</th>
                                                    <th>Tgl. Pelunasan</th>
                                                    <th>Id. Pelunasan</th>
                                                    <th>Id. Bank</th>
                                                    <th>Jenis Pembayaran</th>
                                                    <th>Mata Uang</th>
                                                    <th>Total Pelunasan</th>
                                                    <th>No. Bukti</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!--CARD 1-->
                                <br>
                                <div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 40%;">
                                        <div class="card-body">
                                            <div class="col-md-6">
                                                <input type="radio" name="radiogrupDetail" value="1" id="radio_1">
                                                <label for="radio_1">Detail Pelunasan</label>
                                            </div>
                                            <div style="overflow-x: auto; overflow-y: auto; max-height: 250px;">
                                                <table style="width: 230%; table-layout: fixed;" id="tabelDetailPelunasan">
                                                    <colgroup>
                                                        <col style="width: 20%;">
                                                        <col style="width: 30%;">
                                                        <col style="width: 40%;">
                                                        <col style="width: 30%;">
                                                        <col style="width: 30%;">
                                                        <col style="width: 25%;">
                                                        <col style="width: 35%;">
                                                        <col style="width: 20%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th>Id. Penagihan</th>
                                                            <th>Nilai Pelunasan</th>
                                                            <th>Pelunasan Rupiah</th>
                                                            <th>Kode Perkiraan</th>
                                                            <th>Customer</th>
                                                            <th>Id. Detail</th>
                                                            <th>Tgl. Penagihan</th>
                                                            <th>Id. Pelunasan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!--CARD 2-->
                                    <div class="card" style="width: 30%; overflow-y: auto; max-height: 250px;">
                                        <div class="card-body">
                                            <div class="col-md-6">
                                                <input type="radio" name="radiogrupDetail" value="2" id="radio_2">
                                                <label for="radio_2">Detail Biaya</label>
                                            </div>
                                            <div style="overflow-x: auto;">
                                                <table style="width: 120%; table-layout: fixed;" id="tabelDetailBiaya">
                                                    <colgroup>
                                                        <col style="width: 30%;">
                                                        <col style="width: 30%;">
                                                        <col style="width: 30%;">
                                                        <col style="width: 30%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th>Keterangan</th>
                                                            <th>Jumlah Biaya</th>
                                                            <th>Kode Perkiraan</th>
                                                            <th>Id. Detail</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--CARD 3-->
                                    <div class="card" style="width: 30%; overflow-y: auto; max-height: 250px;">
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <input type="radio" name="radiogrupDetail" value="3"
                                                    id="radio_3">
                                                <label for="radio_3">Detail Kurang/Lebih</label>
                                            </div>
                                            <div style="overflow-x: auto;">
                                                <table style="width: 115%; table-layout: fixed;" id="tabelDetailKurangLebih">
                                                    <colgroup>
                                                        <col style="width: 30%;">
                                                        <col style="width: 35%;">
                                                        <col style="width: 25%;">
                                                        <col style="width: 25%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th>Keterangan</th>
                                                            <th>Jumlah Biaya</th>
                                                            <th>Kode Perkiraan</th>
                                                            <th>Id. Detail</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-5">
                                            <input type="submit" id="btnKoreksiDetail" name="btnKoreksiDetail"
                                                value="Koreksi Detail" class="btn btn-primary d-flex ml-auto"
                                                onclick="validateTabel()">
                                        </div>
                                        <div class="col-3">
                                            <input type="submit" id="btnTampilBKM" name="btnTampilBKM"
                                                value="Tampil BKM" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-4">
                                            <input type="submit" id="btnTutup" name="btnTutup" value="TUTUP"
                                                class="btn btn-primary d-flex ml-auto" disabled>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!--MODAL MAINTENANCE DETAIL PELUNASAN-->
                            <div class="modal fade" id="modalDetailPelunasan" tabindex="-1" role="dialog"
                                aria-labelledby="modalDetailPelunasan" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Maintenance Pilih Bank BKM</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post" id="formdetpelunasan" action="{{ url('UpdateDetailBKM') }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" id="methoddetail">
                                            <div class="modal-body">
                                                <div class="d-flex">
                                                    <div class="col-md-3">
                                                        <label for="idPenagihan" style="margin-right: 10px;">Id.
                                                            Penagihan</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" id="idPenagihan" name="idPenagihan"
                                                            class="form-control" style="width: 100%">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="iddetail" style="margin-right: 10px;">Id.
                                                            Pelunasan</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" id="idPelunasan" name="idPelunasan"
                                                            class="form-control" style="width: 100%">
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-md-3">
                                                        <label for="namaCustomer" style="margin-right: 10px;">Nama
                                                            Customer</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" id="namaCustomer" name="namaCustomer"
                                                            class="form-control" style="width: 100%">
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-md-3">
                                                        <label for="nilaiPelunasan" style="margin-right: 10px;">Nilai
                                                            Pelunasan</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" id="nilaiPelunasanDetail"
                                                            name="nilaiPelunasanDetail" class="form-control"
                                                            style="width: 100%">
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-md-3">
                                                        <label for="pelunasanRupiah" style="margin-right: 10px;">Pelunasan
                                                            Rupiah</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" id="pelunasanRupiah" name="pelunasanRupiah"
                                                            class="form-control" style="width: 100%">
                                                    </div>
                                                    <input type="hidden" id="TDet" name="TDet"
                                                        class="form-control" style="width: 100%">
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-md-3">
                                                        <label for="kodePerkiraan" style="margin-right: 10px;">Kode
                                                            Perkiraan</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" id="idKodePerkiraan" name="idKodePerkiraan"
                                                            class="form-control" style="width: 100%">
                                                    </div>
                                                    <div class="col-md-7">
                                                        <select name="kodePerkiraanSelect" id="kodePerkiraanSelect" class="form-control">

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <input type="submit" id="btnProsesDetail" name="btnProsesDetail"
                                                            value="Proses" class="btn btn-primary">
                                                    </div>
                                                    <div class="col-3">
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="submit" id="btnTutupModal" name="btnTutupModal"
                                                            value="Tutup" class="btn btn-primary">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="detpelunasan" id="detpelunasan" value="detpelunasan">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!--MODAL DETAIL KURANG/LEBIH-->
                            <div class="modal fade" id="modalDetailKurangLebih" tabindex="-1" role="dialog"
                            aria-labelledby="pilihBankModal" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="pilihBankModal">Maintenance Kurang/Lebih BKM</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('UpdateDetailBKM') }}" id="formDetailKurangLebih"
                                            method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" id="methodkuranglebih">
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="jumlahUang" style="margin-right: 10px;">Jumlah Uang</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" id="jumlahUang" name="jumlahUang"
                                                        class="form-control" style="width: 100%">
                                                </div>
                                                <input type="hidden" name="idcoba" id="idcoba" value="idcoba">
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="kodePerkiraan" style="margin-right: 10px;">Kode
                                                        Perkiraan</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" id="idKodePerkiraanKrgLbh"
                                                        name="idKodePerkiraanKrgLbh" class="form-control"
                                                        style="width: 100%">
                                                </div>
                                                <div class="col-md-7">
                                                    <select name="kodePerkiraanKrgLbhSelect" id="kodePerkiraanKrgLbhSelect" class="form-control">

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
                                                    <input type="submit" id="btnProsesKurangLebih"
                                                        name="btnProsesKurangLebih" value="Proses" class="btn btn-primary">
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


                            <!--MODAL DETAIL BIAYA-->
                            <div class="modal fade" id="modalDetailBiaya" tabindex="-1" role="dialog"
                                aria-labelledby="pilihBankModal" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="pilihBankModal">Maintenance Kurang/Lebih BKM</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('UpdateDetailBKM') }}" id="formDetailBiaya"
                                            method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" id="methodbiaya">
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="jumlahBiaya" style="margin-right: 10px;">Jumlah Biaya</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" id="jumlahBiaya" name="jumlahBiaya"
                                                        class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="idDetailBiaya" style="margin-right: 10px;">Id. Detail</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" id="idDetailBiaya" name="idDetailBiaya"class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="kodePerkiraan" style="margin-right: 10px;">Kode
                                                        Perkiraan</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" id="idKodePerkiraanBiaya"
                                                        name="idKodePerkiraanBiaya" class="form-control"
                                                        style="width: 100%">
                                                </div>
                                                <div class="col-md-7">
                                                    <select name="kodePerkiraanBiayaSelect" id="kodePerkiraanBiayaSelect" class="form-control">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="keterangan" style="margin-right: 10px;">Keterangan</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" id="keteranganBiaya" name="keteranganBiaya"
                                                        class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-5">
                                                    <input type="submit" id="btnProsesBiaya"
                                                        name="btnProsesBiaya" value="Proses" class="btn btn-primary">
                                                </div>
                                                <div class="col-3">
                                                </div>
                                                <div class="col-4">
                                                    <input type="submit" id="btnTutupModal" name="btnTutupModal"
                                                        value="Tutup" class="btn btn-primary">
                                                </div>
                                            </div>
                                            <input type="hidden" name="detpelunasan" id="detpelunasan" value="detbiaya">
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!--FORM TAMPIL BKM-->
                            <div class="modal fade" id="modalTampilBKM" tabindex="-1" role="dialog"
                                aria-labelledby="pilihBankModal" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Cetak BKM Cash Advance</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('MaintenanceBKMPenagihan') }}" id="formTampilBKM" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" id="methodTampilBKM">
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="tanggalInputTampil" style="margin-right: 10px;">Tanggal Input</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="date" id="tanggalInputTampil" name="tanggalInputTampil" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                S/D
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="date" id="tanggalInputTampil2" name="tanggalInputTampil2" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-3">
                                                    <button id="btnOkTampil" name="btnOkTampil">OK</button>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="idBKM" style="margin-right: 10px;">Id. BKM</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" id="idBKM" name="idBKM" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-3">
                                                    <button id="btnCETAK" name="btnCETAK">CETAK</button>
                                                </div>
                                            </div>
                                            <div style="overflow-x: auto; overflow-y: auto; max-height: 250px;">
                                                <table style="width: 120%; table-layout: fixed;"id="tabelTampilBKM">
                                                    <colgroup>
                                                        <col style="width: 30%;">
                                                        <col style="width: 30%;">
                                                        <col style="width: 30%;">
                                                        <col style="width: 30%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th>Tgl. Input</th>
                                                            <th>Id. BKM</th>
                                                            <th>Nilai Pelunasan</th>
                                                            <th>Terjemahan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <input type="hidden" name="detpelunasan" id="detpelunasan" value="dettampilbkm">
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('js/Piutang/BKMCashAdvance/UpdateDetailBKM.js') }}"></script>
@endsection
