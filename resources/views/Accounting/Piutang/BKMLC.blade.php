@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance BKM-BKK LC</div>
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
                                        <input type="text" for="bulanTahun" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" for="bulanTahun" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="btnProses" name="isi" value="OK" class="btn">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="pilihBank" name="isi" value="Pilih Bank" class="btn">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="btnGroupBKM" name="isi" value="Group BKM" class="btn">
                                    </div>
                                </div>

                                <br><div>
                                    Data Pelunasan
                                    <div style="overflow-y: auto; max-height: 400px;">
                                        <table style="width: 110%; table-layout: fixed;">
                                            <colgroup>
                                                <col style="width: 15%;">
                                                <col style="width: 10%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 10%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                            </colgroup>
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Tgl Pelunasan</th>
                                                    <th>Id. Pelunasan</th>
                                                    <th>Id. Bank</th>
                                                    <th>Jenis Pembayaran</th>
                                                    <th>Mata Uang</th>
                                                    <th>Total Pelunasan</th>
                                                    <th>No. Bukti</th>
                                                    <th>Tgl. Pembuatan</th>
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
                                                    <td>Data 8</td>
                                                </tr>
                                                <!-- Tambahkan baris lainnya jika diperlukan -->
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
                                                <table style="width: 160%; table-layout: fixed;">
                                                    <colgroup>
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
                                                    <col style="width: 30%;">
                                                    <col style="width: 30%;">
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
                                                    <col style="width: 30%;">
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
                                            <div class="col-md-7">
                                                <input type="radio" name="radiogrup1" value="radio_1" id="radio_1">
                                                <label for="radio_1">Detail Kurang/Lebih</label>
                                            </div>
                                            <div style="overflow-x: auto;">
                                                <table style="width: 120%; table-layout: fixed;">
                                                    <colgroup>
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
                                                    <col style="width: 30%;">
                                                    <col style="width: 25%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                    <tr>
                                                        <th>Keterangan</th>
                                                        <th>Jumlah</th>
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
                                            <input type="submit" id="btnTampilbkm" value="Tampil BKM" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-3">
                                            <input type="submit" id="btnTampilBKK" value="Tampil BKK" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-4">
                                            <input type="submit" id="btnTutup" value="TUTUP" class="btn btn-primary d-flex ml-auto" disabled>
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
@endsection
