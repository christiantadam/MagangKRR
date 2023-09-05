@extends('layouts.appAccounting')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">BKM BKK Nota Kredit</div>
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="{{ url('BKMBKKNotaKredit') }}" id="formkoreksi">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" id="methodkoreksi">
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
                                    <input type="text" id="idCustomer" name="idCustomer" class="form-control" style="width: 100%">
                                    <input type="text" id="idPenagihan" name="idPenagihan" class="form-control" style="width: 100%">
                                    <input type="text" id="noNotaKredit" name="noNotaKredit" class="form-control" style="width: 100%">
                                    <input type="text" id="jumlah" name="jumlah" class="form-control" style="width: 100%">
                                </div>
                                <div class="card-container" style="display: flex;">
                                    <div style="width: 60%;">
                                        <div class="card" style>
                                            <b>BKM</b>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="tanggal" style="margin-right: 10px;">Tanggal</label>
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="date" id="tanggal" name="tanggal" class="form-control"
                                                        style="width: 100%" readonly>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" id="bulan" name="bulan" class="form-control"
                                                        style="width: 100%">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" id="tahun" name="tahun" class="form-control"
                                                        style="width: 100%">
                                                </div>
                                            </div>
                                            <input type="text" name="idPembayaran" id="idPembayaran">
                                            <input type="text" name="idPelunasan" id="idPelunasan">
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="idBKM" style="margin-right: 10px;">Id. BKM</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="idBKM" name="idBKM" class="form-control"
                                                        style="width: 100%" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" id="id_bkm" name="id_bkm" class="form-control"
                                                        style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="mataUangBKMSelect" style="margin-right: 10px;">Mata
                                                        Uang</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <select id="mataUangBKMSelect" name="mataUangBKMSelect" class="form-control" readonly>

                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="kursRupiah" style="margin-right: 10px;">Kurs Rupiah</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" id="kursRupiah" name="kursRupiah" class="form-control" style="width: 100%" readonly>
                                                </div>
                                            </div>
                                            <input type="text" name="idMataUangBKM" id="idMataUangBKM"
                                                class="form-control" style="width: 100%">
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="jumlahUangBKM" style="margin-right: 10px;">Jumlah Uang</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="jumlahUangBKM" name="jumlahUangBKM" class="form-control" style="width: 100%" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="namaBankBKMSelect" style="margin-right: 10px;">Bank</label>
                                                </div>
                                                <div class="col-md-5">
                                                    <select id="namaBankBKMSelect" name="namaBankBKMSelect"  class="form-control" readonly>

                                                    </select>
                                                </div>
                                                <!--HIDDEN INPUT-->
                                                <div class="col-md-4">
                                                    <input type="text" id="idBankBKM" name="idBankBKM"
                                                        class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" id="jenisBankBKM" name="jenisBankBKM"
                                                        class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="kodePerkiraan" style="margin-right: 10px;">Kode
                                                        Perkiraan</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" id="idKodePerkiraanBKM" name="idKodePerkiraanBKM" class="form-control" style="width: 100%" readonly>
                                                </div>
                                                <div class="col-md-5">
                                                    <select id="kodePerkiraanSelectBKM" name="kodePerkiraanSelectBKM" class="form-control" readonly>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="uraian" style="margin-right: 10px;">Uraian</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" id="uraianBKM" name="uraianBKM" class="form-control" style="width: 100%" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <!--CARD 2-->
                                        <div class="card">
                                            <b>BKK</b>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="idBKK" style="margin-right: 10px;">Id. BKK</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="idBKK" name="idBKK" class="form-control" style="width: 100%" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" id="id_bkk" name="id_bkk" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="jumlahUangBKK" style="margin-right: 10px;">Jumlah
                                                        Uang</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="jumlahUangBKK" name="jumlahUangBKK"
                                                        class="form-control" style="width: 100%" readonly>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="namaBankBKKSelect"
                                                        style="margin-right: 10px;">Bank</label>
                                                </div>
                                                <div class="col-md-5">
                                                    <select id="namaBankBKKSelect" name="namaBankBKKSelect" class="form-control" readonly>

                                                    </select>
                                                </div>
                                                <input type="text" id="idBankBKK" name="idBankBKK"
                                                    class="form-control" style="width: 100%">
                                                <input type="text" id="jenisBankBKK" name="jenisBankBKK"
                                                    class="form-control" style="width: 100%">
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="kodePerkiraan" style="margin-right: 10px;">Kode  Perkiraan</label>
                                                </div>
                                                <div class="col-md-3">
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

                                    <!--CARD 3 KANAN-->
                                    <div style="width: 40%;">
                                        <div class="card-body">
                                            <div style="display: flex; justify-content: center;">
                                                <input type="submit" id="btnPilihNotaKredit" name="btnPilihNotaKredit" value="Pilih Nota Kredit" class="btn btn-primary d-flex ml-auto">
                                            </div>
                                            <div class="row"
                                                style="display: flex; justify-content: center; margin-top: 150px">
                                                <div style="margin-right: 10px;">
                                                    <button type="submit" id="btnProses" name="btnProses"
                                                        class="btn btn-primary">PROSES</button>
                                                </div>
                                                <div style="margin-right: 10px;">
                                                    <input type="submit" id="btnKoreksi" name="btnKoreksi" value="Koreksi" class="btn btn-primary">
                                                </div>
                                                <div>
                                                    <input type="submit" id="btnBatal" name="btnBatal" value="Batal" class="btn btn-primary">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row" style="display: flex; justify-content: center;">
                                                <div style="margin-right: 10px;">
                                                    <button type="submit" id="btnTampilBKM" name="btnTampilBKM"
                                                        class="btn btn-primary">Tampil BKM</button>
                                                </div>
                                                <div style="margin-right: 10px;">
                                                    <button type="submit" id="btnTampilBKK" name="btnTampilBKK"
                                                        class="btn btn-primary">Tampil BKK</button>
                                                </div>
                                                <div>
                                                    <input type="submit" name="tutup" value="TUTUP"
                                                        class="btn btn-primary">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" id="nilaiUang" name="nilaiUang" class="form-control" style="width: 100%">
                                <input type="text" id="konversi" name="konversi" class="form-control" style="width: 100%">
                                <input type="text" id="konversi1" name="konversi1" class="form-control" style="width: 100%">
                                <input type="text" id="nilai" name="nilai" class="form-control" style="width: 100%">
                                <input type="text" id="nilai1" name="nilai1" class="form-control" style="width: 100%">
                            </form>

                            <!--MODAL TAMPIL BKM-->
                            <div class="modal fade" id="modalTampilBKM" tabindex="-1" role="dialog"
                                aria-labelledby="pilihBankModal" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content" style="padding: 25px;">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Cetak BKM Nota Kredit</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('BKMBKKNotaKredit') }}" id="formTampilBKM" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" id="methodTampilBKM">
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="tanggalInputTampilBKM" style="margin-right: 10px;">Tanggal
                                                        Input</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="date" id="tanggalTampilBKM"
                                                        name="tanggalTampilBKM" class="form-control"
                                                        style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                    S/D
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="date" id="tanggalTampilBKM2"
                                                        name="tanggalTampilBKM2" class="form-control"
                                                        style="width: 100%">
                                                </div>
                                                <div class="col-md-3">
                                                    <button id="btnOkTampilBKM" name="btnOkTampilBKM">OK</button>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="idBKMTampil" style="margin-right: 10px;">Id. BKM</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="idBKMTampil" name="idBKMTampil" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-3">
                                                    <button id="btnCetakBKM" name="btnCetakBKM">CETAK</button>
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
                                            <input type="hidden" name="cetak" id="cetak" value="cetakBKM">
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!--MODAL TAMPIL BKK-->
                            <div class="modal fade" id="modalTampilBKK" tabindex="-1" role="dialog"
                                aria-labelledby="pilihBankModal" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content" style="padding: 25px;">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Cetak BKK Nota Kredit</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('BKMBKKNotaKredit') }}" id="formTampilBKK" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" id="methodTampilBKK">
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="tanggalInputTampilBKM" style="margin-right: 10px;">Tanggal
                                                        Input</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="date" id="tanggalTampilBKK" name="tanggalTampilBKK" class="form-control"
                                                        style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                    S/D
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="date" id="tanggalTampilBKK2"
                                                        name="tanggalTampilBKK2" class="form-control"
                                                        style="width: 100%">
                                                </div>
                                                <div class="col-md-3">
                                                    <button id="btnOkTampilBKK" name="btnOkTampilBKK">OK</button>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="idBKKTampil" style="margin-right: 10px;">Id. BKK</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="idBKKTampil" name="idBKKTampil"
                                                        class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-3">
                                                    <button id="btnCetakBKK" name="btnCetakBKK">CETAK</button>
                                                </div>
                                            </div>
                                            <div style="overflow-x: auto; overflow-y: auto; max-height: 250px;">
                                                <table style="width: 120%; table-layout: fixed;"id="tabelTampilBKK">
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
                                            <input type="hidden" name="cetak" id="cetak" value="cetakBKK">
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
<script src="{{ asset('js/Piutang/BKMBKKNotaKredit.js') }}"></script>
@endsection
