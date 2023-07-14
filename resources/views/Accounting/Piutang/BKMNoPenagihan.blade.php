@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance BKM No Penagihan</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="idBKM">Id. BKM</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" id="idBKM" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-2">
                                            Wajib di-ENTER
                                        </div>
                                        <div class="col-md-1">
                                            <input type="radio" name="radiogrup1" value="radio_1" id="radio_1">
                                            <label for="radio_1">Biaya</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" name="radiogrup1" value="radio_1" id="radio_2">
                                            <label for="radio_2">Lain-lain</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" name="radiogrup1" value="radio_1" id="radio_3">
                                            <label for="radio_3">NEGO Ekspor</label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="tanggalInput">Tanggal Input</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="date" id="tanggalInput" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="namaCustomer">Nama Customer</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" id="namaCustomer" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="mataUang">Mata Uang</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" id="mataUang" name="muselect" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-1">
                                            <select name="muselect" class="form-control">
                                                <option value="option1">MU1</option>
                                                <option value="option2">MU2</option>
                                                <option value="option3">MU3</option>
                                            </select>
                                        </div>
                                        <div style="padding-left: 50px">
                                            <label for="kursRupiah">Kurs Rupiah</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="kursRupiah" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="nilaiPelunasan">Nilai Pelunasan</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="number" id="nilaiPelunasan" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="jenisPembayaran">Jenis Pembayaran</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" id="jenisPembayaran" name="jenis_select" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-1">
                                            <select name="jenis_select" class="form-control">
                                                <option value="option1">Jenis1</option>
                                                <option value="option2">Jenis2</option>
                                                <option value="option3">Jenis3</option>
                                            </select>
                                        </div>
                                        <button id="tambahBiaya">Tambah Biaya</button>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="kodePerkiraan">Kode Perkiraan</label>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="text" id="kodePerkiraan" name="kode_select" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" id="kodePerkiraan" name="kode_select" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-1">
                                            <select name="kode_select" class="form-control">
                                                <option value="option1">Kd1</option>
                                                <option value="option2">Kd2</option>
                                                <option value="option3">Kd3</option>
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
                                            <input type="text" id="noBukti" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="uraian">Uraian</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="uraian" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-2" style="padding-left: 15px">
                                            <input type="submit" name="tambahdata" value="Tambah Data" class="btn btn-primary" disabled>
                                        </div>
                                        <div class="col-7" style="padding-left: 15px">
                                            <input type="submit" name="proses" value="PROSES" class="btn btn-primary">
                                        </div>
                                        <div class="col-1" style="padding-left: 15px">
                                            <input type="submit" name="batal" value="Batal" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-1" style="padding-left: 15px">
                                            <input type="submit" name="koreksi" value="Koreksi" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-1">
                                            <input type="submit" name="hapus" value="Hapus" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 60%;">
                                        <div class="card-body">
                                            <b>Detail Data</b>
                                            <div style="overflow-x: auto;">
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
                                                    <!-- Tambahkan baris lainnya jika diperlukan -->
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
                                                <table style="width: 150%; table-layout: fixed;">
                                                    <colgroup>
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
                                                    <col style="width: 25%;">
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
                                                    <!-- Tambahkan baris lainnya jika diperlukan -->
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
                                            <input type="number" id="totalPelunasan" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2" >
                                            <input type="submit" name="tampilbkm" value="TAMPIL BKM" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-1">
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
@endsection
