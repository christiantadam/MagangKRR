@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance BKM No Penagihan</div>
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="{{ url('MaintenanceBKMPenagihan') }}" id="formkoreksi">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" id="methodkoreksi">
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="idBKM">Id. BKM</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" id="idBKM" name="idBKM" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="tanggalInput">Tanggal Input</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="date" id="tanggalInput" name="tanggalInput" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-2" style="color: blue">
                                            Wajib di-ENTER
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" name="radiogrup1" value="1" id="biaya">
                                            <label for="biaya">Biaya</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" name="radiogrup1" value="2" id="lainlain">
                                            <label for="lainlain">Lain-lain</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" name="radiogrup1" value="3" id="negoEkspor">
                                            <label for="negoEkspor">NEGO Ekspor</label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="namaCustomerSelect">Nama Customer</label>
                                        </div>
                                        <div class="col-md-5">
                                            <select name="namaCustomerSelect" id="namaCustomerSelect" class="form-control">

                                            </select>
                                        </div>
                                        {{-- sudah jadi --}}
                                        <input type="hidden" id="idCustomer" name="idCustomer" class="form-control" style="width: 100%">
                                        <input type="hidden" id="jenisCustomer" name="jenisCustomer" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="mataUang">Mata Uang</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" id="idMataUang" name="idMataUang" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-3">
                                            <select name="mataUangSelect" id="mataUangSelect" class="form-control">

                                            </select>
                                        </div>
                                        <div style="padding-left: 50px">
                                            <label for="kursRupiah">Kurs Rupiah</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="kursRupiah" name="kursRupiah" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="nilaiPelunasan">Nilai Pelunasan</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="number" id="nilaiPelunasan" name="nilaiPelunasan" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="namaBankSelect">Bank</label>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="namaBankSelect" id="namaBankSelect" class="form-control">

                                            </select>
                                        </div>
                                        {{-- sudah jadi --}}
                                        <input type="text" id="idBank" name="idBank" class="form-control" style="width: 100%">
                                        <input type="text" id="jenisBank" name="jenisBank" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="jenisPembayaranSelect">Jenis Pembayaran</label>
                                        </div>
                                        <div class="col-md-3">
                                            <select id="jenisPembayaranSelect" name="jenisPembayaranSelect" class="form-control">
                                            </select>
                                        </div>
                                        <input type="text" id="idJenisPembayaran" name="idJenisPembayaran" class="form-control" style="width: 100%">
                                        <button id="tambahBiaya" name="tambahBiaya">Tambah Biaya</button>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="kodePerkiraanSelect">Kode Perkiraan</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" id="idKodePerkiraan" name="idKodePerkiraan" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-3">
                                            <select name="kodePerkiraanSelect" id="kodePerkiraanSelect" class="form-control">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="noBukti">No. Bukti</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="noBukti" name="noBukti" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="uraian">Uraian</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="uraian" name="uraian" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-2" style="padding-left: 15px">
                                            <input type="submit" name="btnTambahData" id="btnTambahData" value="Tambah Data" class="btn btn-primary" disabled>
                                        </div>
                                        <div class="col-7" style="padding-left: 15px">
                                            <input type="submit" name="btnProses" id="btnProses" value="PROSES" class="btn btn-primary">
                                        </div>
                                        <div class="col-1" style="padding-left: 15px">
                                            <input type="submit" name="btnBatal" id="btnBatal" value="Batal" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-1" style="padding-left: 15px">
                                            <input type="submit" name="btnKoreksi" id="btnKoreksi" value="Koreksi" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-1">
                                            <input type="submit" name="btnHapus" id="btnHapus" value="Hapus" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 60%;">
                                        <div class="card-body">
                                            <b>Detail Data</b>
                                            <div style="overflow-x: auto;">
                                                <table style="width: 180%; table-layout: fixed;" id="tabelDetailData">
                                                    <colgroup>
                                                    <col style="width: 20%;">
                                                    <col style="width: 20%;">
                                                    <col style="width: 40%;">
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                    <tr>
                                                        <th>Id. Detail</th>
                                                        <th>Customer</th>
                                                        <th>Nilai Rincian</th>
                                                        <th>Jenis Pembayaran</th>
                                                        <th>Kode Perkiraan</th>
                                                        <th>Uraian</th>
                                                        <th>No. Bukti</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Data 1</td>
                                                        <td>Data 2</td>
                                                        <td>Data 3</td>
                                                        <td>Data 4</td>
                                                        <td>Data 5</td>
                                                        <td>Data 6</td>
                                                        <td>Data 7</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!--CARD 2-->
                                    <div class="card" style="width: 40%;">
                                        <div class="card-body">
                                            <b>Detail Biaya</b>
                                            <div style="overflow-x: auto;">
                                                <table style="width: 160%; table-layout: fixed;" id="tabelDetailBiaya">
                                                    <colgroup>
                                                    <col style="width: 40%;">
                                                    <col style="width: 40%;">
                                                    <col style="width: 40%;">
                                                    <col style="width: 40%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                    <tr>
                                                        <th>Keterangan</th>
                                                        <th>Biaya</th>
                                                        <th>Kode Perkiraan</th>
                                                        <th>Id. Detail</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Data 1</td>
                                                        <td>Data 2</td>
                                                        <td>Data 3</td>
                                                        <td>Data 4</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <b><label for="totalPelunasan">Total Pelunasan</label></b>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="totalPelunasan" name="totalPelunasan" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2" >
                                            <input type="submit" name="btnTampilBKM" id="btnTampilBKM" value="TAMPIL BKM" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="btnTutup" id="btnTutup" value="TUTUP" class="btn btn-primary d-flex ml-auto">
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
<script src="{{ asset('js/Piutang/BKMNoPenagihan.js') }}"></script>
@endsection
