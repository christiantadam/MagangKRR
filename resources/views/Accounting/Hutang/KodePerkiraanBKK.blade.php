@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance Kode Perkiraan BKK</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 60%;">
                                        <div class="card-body">
                                            <div style="overflow-y: auto; max-height: 400px;">
                                                <table style="width: 100%; table-layout: fixed;">
                                                    <colgroup>
                                                        <col style="width: 20%;">
                                                        <col style="width: 15%;">
                                                        <col style="width: 25%;">
                                                        <col style="width: 15%;">
                                                        <col style="width: 25%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th>Id. BKK</th>
                                                            <th>Bank</th>
                                                            <th>Jns.Bayar</th>
                                                            <th>Mata Uang</th>
                                                            <th>Nilai Pembayaran</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Data 1</td>
                                                            <td>Data 2</td>
                                                            <td>Data 3</td>
                                                            <td>Data 2</td>
                                                            <td>Data 3</td>
                                                        <tr>
                                                            <td>Data 1</td>
                                                            <td>Data 2</td>
                                                            <td>Data 3</td>
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
                                    <div style="width: 40%;">
                                        <div class="card-body">
                                            <div class="col">
                                                <div class="d-flex">
                                                    <div class="col-md-6">
                                                        <input type="radio" name="radiogrup1" value="radio_1" id="radio_1">
                                                        <label for="radio_1">Kas Kecil</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="radio" name="radiogrup1" value="radio_1" id="radio_2">
                                                        <label for="radio_2">Kas Besar</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="d-flex">
                                                    <div class="col-md-1">
                                                        <label for="bulan">Bulan</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" id="bulan" class="form-control" style="width: 100%">
                                                    </div>
                                                    <div class="col-md-1" style="padding-right: 25px">
                                                        <label for="tahun">Tahun</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" id="tahun" class="form-control" style="width: 100%">
                                                    </div>
                                                    <div class="col-md-3" >
                                                        <button class="btn btn-block">OK</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                Koreksi Kode Perkiraan
                                                <p><div class="col-md-6">
                                                    <label for="rincianPembayaran">Rincian Pembayaran</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" id="rincianPembayaran" class="form-control" style="width: 100%">
                                                </div>
                                                <p><div class="col-md-6">
                                                    <label for="nilaiRincian">Nilai Rincian</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" id="nilaiRincian" class="form-control" style="width: 100%">
                                                </div>
                                                <p><div class="col-md-6">
                                                    <label for="kodePerkiraan">Kode Perkiraan</label>
                                                </div>
                                                <div class="row" style="padding-left: 15px">
                                                    <div class="col-md-3">
                                                        <input type="text" id="kodePerkiraan" name="kode_select" class="form-control" style="width: 100%">
                                                    </div>
                                                    <div class="col-md-6">
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
                                        </div>
                                    </div>
                                </div>
                                <div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 60%;">
                                        <div class="card-body">
                                            <div style="overflow-y: auto; height: 200px;">
                                                <table style="width: 100%; table-layout: fixed;">
                                                    <colgroup>
                                                        <col style="width: 25%;">
                                                        <col style="width: 25%;">
                                                        <col style="width: 25%;">
                                                    </colgroup>
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th>Rincian Bayar</th>
                                                            <th>Nilai Rincian</th>
                                                            <th>Kd. Perkiraan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Data 1</td>
                                                            <td>Data 2</td>
                                                            <td>Data 3</td>
                                                        <tr>
                                                            <td>Data 1</td>
                                                            <td>Data 2</td>
                                                            <td>Data 3</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-container" style="display: flex;">
                                        <div style="width: 40%;">
                                            <p><div style="padding-left: 450px">
                                                <input type="submit" name="proses" value="PROSES" class="btn btn-primary" disabled>
                                            </div>
                                            <div style="padding-left: 450px">
                                                <input type="submit" name="keluar" value="KELUAR" class="btn btn-primary d-flex ml-auto">
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
