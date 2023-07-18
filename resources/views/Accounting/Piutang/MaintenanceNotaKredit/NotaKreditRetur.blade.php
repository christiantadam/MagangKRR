@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Nota Kredit / Retur</div>
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
                                    <div class="col-md-7">
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
                                        <label for="suratJalan" style="margin-right: 10px;">Surat Jalan</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="suratJalanSelect" class="form-control" onchange="fillColumns()">
                                            <option value="NoPenagihan 1">No1</option>
                                            <option value="NoPenagihan 2">No2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="namaBarang" style="margin-right: 10px;">Nama Barang</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" id="namaBarang" value="" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="noPenagihan" style="margin-right: 10px;">No. Penagihan</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="number" id="noPenagihan" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="amataUang" style="margin-right: 10px;">Mata Uang</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="amataUang" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="nilaiKurs" style="margin-right: 10px;">Nilai Kurs</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="nilaiKurs" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="jumlahRetur" style="margin-right: 10px;">Jumlah Retur</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" id="nilaiKurs" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="jumlahRetur" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                        <label for="harga" style="margin-right: 10px;">Harga</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="harga" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1 form-check">
                                        =
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="harga" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="statusPelunasan" style="margin-right: 10px;">Status Pelunasan</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="statusPelunasan" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-1">
                                        <label for="discount" style="margin-right: 10px;">Discount</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" id="discount" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="grandTotalRetur" style="margin-right: 10px;">Grand Total Retur</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" id="grandTotalRetur" class="form-control" style="width: 100%">
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
                                            <input type="submit" name="tambahItem" value="Tambah Item" class="btn btn-primary">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="hapusItem" value="Hapus Item" class="btn btn-primary">
                                        </div>
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
                                                    <th>Customer</th>
                                                    <th>Surat Jalan</th>
                                                    <th>Nama Barang</th>
                                                    <th>No. Penagihan</th>
                                                    <th>Totak retur</th>
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
