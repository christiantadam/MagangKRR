@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Update Detail BKM</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="bulanTahun" style="margin-right: 10px;">Bulan/Tahun</label>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="bulan" name="bulan" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="tahun" name="tahun" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="btnOK" name="isi" value="OK" class="btn">
                                    </div>
                                </div>

                                <br><div>
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
                                                <input type="radio" name="radiogrup1" value="radio_1" id="radio_1">
                                                <label for="radio_1">Detail Pelunasan</label>
                                            </div>
                                            <div style="overflow-x: auto; overflow-y: auto; max-height: 250px;">
                                                <table style="width: 180%; table-layout: fixed;">
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
                                                        <th>Id. Penagihan</th>
                                                        <th>Nilai Pelunasan</th>
                                                        <th>Pelunasan Rupiah</th>
                                                        <th>Kode Perkiraan</th>
                                                        <th>Customer</th>
                                                        <th>Id. Detail</th>
                                                        <th>Tgl. Penagihan</th>
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
                                                    <!-- Tambahkan baris lainnya jika diperlukan -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!--CARD 2-->
                                    <div class="card" style="width: 30%; overflow-y: auto; max-height: 250px;">
                                        <div class="card-body">
                                            <div class="col-md-6">
                                                <input type="radio" name="radiogrup1" value="radio_1" id="radio_1">
                                                <label for="radio_1">Detail Biaya</label>
                                            </div>
                                            <div style="overflow-x: auto;">
                                                <table style="width: 120%; table-layout: fixed;">
                                                    <colgroup>
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
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
                                                    <tr>
                                                        <td>Data 1</td>
                                                        <td>Data 2</td>
                                                        <td>Data 3</td>
                                                        <td>Data 4</td>
                                                    </tr>
                                                    <!-- Tambahkan baris lainnya jika diperlukan -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--CARD 3-->
                                    <div class="card" style="width: 30%; overflow-y: auto; max-height: 250px;">
                                        <div class="card-body">
                                            <div class="col-md-8">
                                                <input type="radio" name="radiogrup1" value="radio_1" id="radio_1">
                                                <label for="radio_1">Detail Kurang/Lebih</label>
                                            </div>
                                            <div style="overflow-x: auto;">
                                                <table style="width: 120%; table-layout: fixed;">
                                                    <colgroup>
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
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
                                <br><div class="mb-3">
                                    <div class="row">
                                        <div class="col-5">
                                            <input type="submit" id="btnProses" name="koreksidetail" value="Koreksi Detail" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-3">
                                            <input type="submit" id="btnProses" name="tampilbkm" value="Tampil BKM" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-4">
                                            <input type="submit" id="btnProses" name="tutup" value="TUTUP" class="btn btn-primary d-flex ml-auto" disabled>
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
<script src="{{ asset('js/Piutang/BKMCashAdvance/UpdateDetailBKM.js') }}"></script>
@endsection
