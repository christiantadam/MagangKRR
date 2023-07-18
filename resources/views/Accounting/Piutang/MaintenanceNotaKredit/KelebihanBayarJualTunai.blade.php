@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Kelebihan Bayar untuk Penjualan Tunai</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="tanggalInput" style="margin-right: 10px;">Tanggal Input</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" id="tanggalInput" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="namaCustomer" style="margin-right: 10px;">Nama Customer</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="namaCustomerSelect" class="form-control" onchange="fillColumns()">
                                            <option value="NoPenagihan 1">No1</option>
                                            <option value="NoPenagihan 2">No2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="noNotaKredit" style="margin-right: 10px;">No. Nota Kredit</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="noNotaKreditSelect" class="form-control" onchange="fillColumns()">
                                            <option value="NoPenagihan 1">No1</option>
                                            <option value="NoPenagihan 2">No2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="noPenagihan" style="margin-right: 10px;">No. Penagihan</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="noPenagihanSelect" class="form-control" onchange="fillColumns()">
                                            <option value="NoPenagihan 1">No1</option>
                                            <option value="NoPenagihan 2">No2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="namaBarang" style="margin-right: 10px;">Mata Uang</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" id="namaBarang" value="" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="namaBarang" style="margin-right: 10px;">Status Pelunasan</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="namaBarang" value="" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                               
                                <br><div>
                                    <div style="overflow-y: auto; overflow-x: auto; max-height: 400px;">
                                        <table style="width: 100%; table-layout: fixed;">
                                            <colgroup>
                                                <col style="width: 20%;">
                                                <col style="width: 20%;">
                                                <col style="width: 20%;">
                                                <col style="width: 20%;">
                                                <col style="width: 20%;">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Nama Brg</th>
                                                    <th>Kode Brg</th>
                                                    <th>Selisih</th>
                                                    <th>Harga Satuan</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Data 1</td>
                                                    <td>Data 2</td>
                                                    <td>Data 1</td>
                                                    <td>Data 2</td>
                                                    <td>Data 1</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="totalFree" style="margin-right: 10px;">Grand Total</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="totalFree" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="terbilang" style="margin-right: 10px;">Terbilang</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="terbilang" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                
                                <br><div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <input type="submit" name="isi" value="Isi" class="btn btn-primary">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="koreksi" value="Koreksi" class="btn btn-primary">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="hapus" value="Hapus" class="btn btn-primary">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="keluar" value="Keluar" class="btn btn-primary">
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
