@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance Informasi Bank untuk Uang Masuk</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Tanggal</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="submit" id="btnOk" name="ok" value="OK" class="btn btn-primary">
                                    </div>
                                </div>

                                <br><div>
                                    <div style="overflow-y: auto; max-height: 400px;">
                                        <table style="width: 120%; table-layout: fixed;">
                                            <colgroup>
                                                <col style="width: 25%;">
                                                <col style="width: 25%;">
                                                <col style="width: 20%;">
                                                <col style="width: 25%;">
                                                <col style="width: 25%;">
                                            </colgroup>
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Id. Referensi</th>
                                                    <th>Nama Bank</th>
                                                    <th>Mata Uang</th>
                                                    <th>Nilai</th>
                                                    <th>Keterangan</th>
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
                                                <!-- Tambahkan baris lainnya jika diperlukan -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <br>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Nama Bank</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="bankSelect" class="form-control" onchange="fillColumns()">
                                            <option value=""></option>
                                            <option value="Bank 1">Bank1</option>
                                            <option value="Bank 2">Bank2</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-2">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Mata Uang</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="muSelect" class="form-control" onchange="fillColumns()">
                                            <option value=""></option>
                                            <option value="MataUang">MU1</option>
                                            <option value="MataUang 2">Mu2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Total Nilai</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Keterangan</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-2"></div>
                                        <div class="col-md-6">
                                            <input type="radio" name="radiogrup1" value="radio_1" id="radio_1">
                                            <label for="radio_2">Transfer</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" name="radiogrup1" value="radio_1" id="radio_2">
                                            <label for="radio_2">Hasil Kliring</label>
                                        </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Jenis Pembayaran</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="muSelect" class="form-control" onchange="fillColumns()">
                                            <option value=""></option>
                                            <option value="MataUang">MU1</option>
                                            <option value="MataUang 2">Mu2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">No. Bukti</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <br><div class="mb-3">
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="submit" id="btnProses" name="isi" value="Isi" class="btn btn-primary">
                                        </div>
                                        <div class="col-2">
                                            <input type="submit" id="btnProses" name="koreksi" value="Koreksi" class="btn btn-primary">
                                        </div>
                                        <div class="col-2">
                                            <input type="submit" id="btnProses" name="hapus" value="Hapus" class="btn btn-primary">
                                        </div>
                                        <div class="col-7">
                                            <input type="submit" id="btnKeluar" name="keluar" value="Keluar" class="btn btn-primary d-flex ml-auto">
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
