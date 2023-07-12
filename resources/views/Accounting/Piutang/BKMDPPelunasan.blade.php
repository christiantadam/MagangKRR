@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance BKM-BKK DP</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="customer" style="margin-right: 10px;">Customer</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" for="customer" name="customer_select" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                        <select name="customer_select" class="form-control">
                                            <option value="option1">Cust1</option>
                                            <option value="option2">Cust2</option>
                                            <option value="option3">Cust3</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="btnProses" name="isi" value="OK" class="btn">
                                    </div>
                                </div>

                                <br>
                                <div>
                                    <b>Data Pelunasan</b>
                                    <div style="overflow-y: auto; max-height: 400px;">
                                        <table style="width: 110%; table-layout: fixed;">
                                            <colgroup>
                                                <col style="width: 10%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 10%;">
                                                <col style="width: 10%;">
                                                <col style="width: 20%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                            </colgroup>
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Tgl Input</th>
                                                    <th>Id. BKM</th>
                                                    <th>Tgl. Pelunasan</th>
                                                    <th>Id. Pelunasan</th>
                                                    <th>Id. Bank</th>
                                                    <th>Jenis Pembayaran Pelunasan</th>
                                                    <th>Mata Uang</th>
                                                    <th>Total Pelunasan</th>
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
                                <div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 60%;">
                                        <div class="card" style>
                                            <b>BKK</b>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="tanggal" style="margin-right: 10px;">Tanggal</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="date" id="tanggal" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="idBKK" style="margin-right: 10px;">Id. BKK</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="idBKK" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="mataUang" style="margin-right: 10px;">Mata Uang</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" id="mataUang" name="muSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                    <select name="muSelect" class="form-control" onchange="fillColumns()">
                                                        <option value="MataUang 1">MU1</option>
                                                        <option value="MataUang 2">MU2</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="mataUang" style="margin-right: 10px;">Kurs Rupiah</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" id="mataUang" name="muSelect" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="jumlahUang" style="margin-right: 10px;">Jumlah Uang</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="jumlahUang" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="bank" style="margin-right: 10px;">Bank</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="bank" name="bankSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                    <select name="bankSelect" class="form-control" onchange="fillColumns()">
                                                        <option value=""></option>
                                                        <option value="Bank 1">Bank1</option>
                                                        <option value="Bank 2">Bank2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="kodePerkiraan" style="margin-right: 10px;">Kode Perkiraan</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" id="kodePerkiraan" name="kodePerkiraanSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="number" id="kodePerkiraan" name="kodePerkiraanSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                    <select name="kodePerkiraanSelect" class="form-control" onchange="fillColumns()">
                                                        <option value=""></option>
                                                        <option value="Kd 1">Kode1</option>
                                                        <option value="Kd 2">Kode2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="uraian" style="margin-right: 10px;">Uraian</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" id="uraian" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                        </div>

                                        <!--CARD 2-->
                                        <div class="card" style>
                                            <b>BKM</b>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="idBKM" style="margin-right: 10px;">Id. BKM</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="idBKM" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="jumlahUang" style="margin-right: 10px;">Jumlah Uang</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="jumlahUang" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="bank" style="margin-right: 10px;">Bank</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="bank" name="bankSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                    <select name="bankSelect" class="form-control" onchange="fillColumns()">
                                                        <option value=""></option>
                                                        <option value="Bank 1">Bank1</option>
                                                        <option value="Bank 2">Bank2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="kodePerkiraan" style="margin-right: 10px;">Kode Perkiraan</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" id="kodePerkiraan" name="kodePerkiraanSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="number" id="kodePerkiraan" name="kodePerkiraanSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                    <select name="kodePerkiraanSelect" class="form-control" onchange="fillColumns()">
                                                        <option value="Kode 1">Kd1</option>
                                                        <option value="Kode 2">Kd2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="uraian" style="margin-right: 10px;">Uraian</label>
                                                </div>
                                                <div class="col-md-7">
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
                                                <div style="margin-right: 10px;">
                                                    <button type="submit" name="proses" class="btn btn-primary">PROSES</button>
                                                </div>
                                                <div>
                                                    <input type="submit" name="batal" value="Batal" class="btn btn-primary">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row" style="display: flex; justify-content: center;">
                                                <div style="margin-right: 10px;">
                                                    <button type="submit" name="tampilbkk" class="btn btn-primary">Tampil BKK</button>
                                                </div>
                                                <div>
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
