@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">BKM-BKK Pembulatan</div>
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
                                                <table style="width: 100%; table-layout: fixed;">
                                                    <colgroup>
                                                    <col style="width: 33%;">
                                                    <col style="width: 33%;">
                                                    <col style="width: 33%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                    <tr>
                                                        <th>No. BKM</th>
                                                        <th>Tgl. BKM</th>
                                                        <th>Nilai Pelunasan</th>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Data 1</td>
                                                        <td>Data 2</td>
                                                        <td>Data 3</td>
                                                    </tr>
                                                    <!-- Tambahkan baris lainnya jika diperlukan -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!--CARD 2-->
                                    <div class="card" style="width: 60%; overflow-y: auto; max-height: 250px;">
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
                                                    <col style="width: 20%;">
                                                    <col style="width: 25%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th>Customer</th>
                                                            <th>No. Bukti</th>
                                                            <th>Invoice</th>
                                                            <th>Mata Uang</th>
                                                            <th>Nilai Rincian</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Data 1</td>
                                                            <td>Data 2</td>
                                                            <td>Data 3</td>
                                                            <td>Data 4</td>
                                                            <td>Data 5</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 60%;">
                                        <div class="card-body">
                                            <b>BKK</b>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="tanggal">Tanggal</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="date" id="tanggal" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="idBKK">Id. BKK</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="idBKK" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="jumlahUang">Jumlah Uang</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="jumlahUang" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="kodePerkiraan">Kode Perkiraan</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" id="kodePerkiraan" name="kode_select" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-5">
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
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="idBKK">Uraian</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="uraian" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!--CARD 2-->
                                    <div style="width: 40%;">
                                        <div class="card-body">
                                            <div style="display: flex; justify-content: center;">
                                                <input type="submit" name="pilihbkm" value="Pilih BKM" class="btn btn-primary">
                                            </div>
                                            <br>
                                            <div class="row" style="display: flex; justify-content: center;">
                                                <div>
                                                    <button type="submit" name="proses" class="btn btn-primary">PROSES</button>
                                                </div>
                                                <div style="display: flex; justify-content: center;">
                                                    <input type="submit" name="batal" value="Batal" class="btn btn-primary">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row" style="display: flex; justify-content: center;">
                                                <div >
                                                    <button type="submit" name="tampilbkk" class="btn btn-primary">Tampil BKK</button>
                                                </div>
                                                <div >
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
@endsection
