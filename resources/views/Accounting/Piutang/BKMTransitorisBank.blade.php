@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance Kurs BKK</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 60%;">
                                        <div class="card" style>
                                            <b>BKK</b>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="id" style="margin-right: 10px;">Tanggal</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="date" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-3">
                                                    Wajib di-ENTER
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="id" style="margin-right: 10px;">Id. BKK</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="id" style="margin-right: 10px;">Mata Uang</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                    <select name="supplierSelect" class="form-control" onchange="fillColumns()">
                                                        <option value=""></option>
                                                        <option value="MataUang 1">MU1</option>
                                                        <option value="MataUang 2">MU2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="id" style="margin-right: 10px;">Jumlah Uang</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="id" style="margin-right: 10px;">Bank</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                    <select name="supplierSelect" class="form-control" onchange="fillColumns()">
                                                        <option value=""></option>
                                                        <option value="Bank 1">Bank1</option>
                                                        <option value="Bank 2">Bank2</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <input type="submit" id="btnProses" name="koreksidetail" value="Koreksi Detail" class="btn btn-primary d-flex ml-auto">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="id" style="margin-right: 10px;">Jenis Pembayaran</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                    <select name="supplierSelect" class="form-control" onchange="fillColumns()">
                                                        <option value=""></option>
                                                        <option value="Jenis 1">Jenis1</option>
                                                        <option value="Jenis 2">Jenis2</option>
                                                    </select>
                                                </div>
                                                <div class="col-3" style="padding-left: 70px">
                                                    <input type="submit" id="btnProses" name="koreksidetail" value="Detail BG/CEK/Transfer/DBT" class="btn btn-primary d-flex ml-auto">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="id" style="margin-right: 10px;">Kode Perkiraan</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                    <select name="supplierSelect" class="form-control" onchange="fillColumns()">
                                                        <option value=""></option>
                                                        <option value="Kd 1">Kode1</option>
                                                        <option value="Kd 2">Kode2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="id" style="margin-right: 10px;">Uraian</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                        </div>

                                        <!--CARD 2-->
                                        <div class="card" style>
                                            <b>BKM</b>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="id" style="margin-right: 10px;">Tanggal</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="date" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-3">
                                                    Wajib di-ENTER
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="id" style="margin-right: 10px;">Id. BKM</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="id" style="margin-right: 10px;">Mata Uang</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                    <select name="supplierSelect" class="form-control" onchange="fillColumns()">
                                                        <option value=""></option>
                                                        <option value="MataUang 1">MU1</option>
                                                        <option value="MataUang 2">Mu2</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <label for="id" style="margin-right: 10px;">Kurs</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>

                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="id" style="margin-right: 10px;">Jumlah Uang</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="id" style="margin-right: 10px;">Bank</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                    <select name="supplierSelect" class="form-control" onchange="fillColumns()">
                                                        <option value=""></option>
                                                        <option value="Bank 1">Bank1</option>
                                                        <option value="Bank 2">Bank2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="id" style="margin-right: 10px;">Jenis Pembayaran</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                    <select name="supplierSelect" class="form-control" onchange="fillColumns()">
                                                        <option value=""></option>
                                                        <option value="JP 1">Jenis1</option>
                                                        <option value="JP 2">Jenis2</option>
                                                    </select>
                                                </div>
                                                <div class="col-3" style="padding-left: 70px">
                                                    <input type="submit" id="btnProses" name="koreksidetail" value="Tambah Biaya" class="btn btn-primary d-flex ml-auto">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="id" style="margin-right: 10px;">Kode Perkiraan</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                    <select name="supplierSelect" class="form-control" onchange="fillColumns()">
                                                        <option value=""></option>
                                                        <option value="Kode 1">Kd1</option>
                                                        <option value="Kode 2">Kd2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="id" style="margin-right: 10px;">Uraian</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--CARD 2-->
                                    <div style="width: 40%;">
                                        <div >
                                            <div class="card-body">
                                                <b>Detail Biaya BKK</b>
                                                <div style="overflow-y: auto; max-height: 250px;">
                                                    <table style="width: 100%; table-layout: fixed;">
                                                        <colgroup>
                                                            <col style="width: 33%;">
                                                            <col style="width: 33%;">
                                                            <col style="width: 33%;">
                                                        </colgroup>
                                                        <thead class="table-dark">
                                                            <tr>
                                                                <th>Keterangan</th>
                                                                <th>Biaya</th>
                                                                <th>Kode Perkiraan</th>
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
                                                            <!-- Tambahkan baris lainnya jika diperlukan -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <input type="submit" name="koreksibiaya" value="Koreksi Biaya" class="btn btn-primary">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="submit" name="hapusbiaya" value="Hapus Biaya" class="btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="card-body">
                                                <b>Detail BG/CEK/TRANSFER BKK</b>
                                                <div style="overflow-y: auto; max-height: 250px;">
                                                    <table style="width: 100%; table-layout: fixed;">
                                                        <colgroup>
                                                            <col style="width: 33%;">
                                                            <col style="width: 33%;">
                                                            <col style="width: 33%;">
                                                        </colgroup>
                                                        <thead class="table-dark">
                                                            <tr>
                                                                <th>Nomor</th>
                                                                <th>Jatuh Tempo</th>
                                                                <th>Status Cetak</th>
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
                                                            <!-- Tambahkan baris lainnya jika diperlukan -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <input type="submit" name="koreksinobg" value="Koreksi No BG" class="btn btn-primary">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="submit" name="hapusbg" value="Hapus BG" class="btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <b>Detail Biaya BKM</b>
                                                <div style="overflow-y: auto; max-height: 250px;">
                                                    <table style="width: 100%; table-layout: fixed;">
                                                        <colgroup>
                                                            <col style="width: 33%;">
                                                            <col style="width: 33%;">
                                                            <col style="width: 33%;">
                                                        </colgroup>
                                                        <thead class="table-dark">
                                                            <tr>
                                                                <th>Keterangan</th>
                                                                <th>Biaya</th>
                                                                <th>Kode Perkiraan</th>
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
                                                            <!-- Tambahkan baris lainnya jika diperlukan -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <input type="submit" name="koreksibiaya" value="Koreksi Biaya" class="btn btn-primary">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="submit" name="hapusbiaya" value="Hapus Biaya" class="btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div >
                                    <div class="row">
                                        <div class="col-md-1">
                                            <input type="submit" name="proses" value="PROSES" class="btn btn-primary">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="koreksi" value="KOREKSI" class="btn btn-primary">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="batal" value="Batal" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="tampilbkm" value="TampilBKM" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="tampilbkk" value="TampilBKK" class="btn btn-primary d-flex ml-auto">
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
