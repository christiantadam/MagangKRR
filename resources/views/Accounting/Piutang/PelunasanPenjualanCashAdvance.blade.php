@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance Pelunasan Tagihan (Cash Advance)</div>
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
                                        <label for="noPenagihan" style="margin-right: 10px;">Nama Customer</label>
                                    </div>
                                    <div class="col-md-7">
                                        <select name="noPenagihanSelect" class="form-control" onchange="fillColumns()">
                                            <option value="NoPenagihan 1">No1</option>
                                            <option value="NoPenagihan 2">No2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="noPelunasan" style="margin-right: 10px;">No. Pelunasan</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="noPelunasanSelect" class="form-control" onchange="fillColumns()">
                                            <option value="NoPenagihan 1">No1</option>
                                            <option value="NoPenagihan 2">No2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="informasiBank" style="margin-right: 10px;">Informasi Bank</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="informasiBankSelect" class="form-control" onchange="fillColumns()">
                                            <option value="NoPenagihan 1">No1</option>
                                            <option value="NoPenagihan 2">No2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="nilaiMasukKas" style="margin-right: 10px;">Nilai Masuk Kas</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="number" id="nilaiMasukKas" value="" class="form-control" style="width: 100%" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" id="abc" class="form-control" style="width: 100%" readonly>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="noBKM" style="margin-right: 10px;">No. BKM</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="number" id="noBKM" class="form-control" style="width: 100%" readonly>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="jenisPembayaran" style="margin-right: 10px;">Jenis Pembayaran</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="jenisPembayaranSelect" class="form-control" onchange="fillColumns()">
                                            <option value="NoPenagihan 1">No1</option>
                                            <option value="NoPenagihan 2">No2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="mataUang" style="margin-right: 10px;">Mata Uang</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="mataUangSelect" class="form-control" onchange="fillColumns()">
                                            <option value="NoPenagihan 1">No1</option>
                                            <option value="NoPenagihan 2">No2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="sisaPelunasan" style="margin-right: 10px;">Sisa Pelunasan</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="number" id="nilaiSdhBayar" class="form-control" style="width: 100%">
                                    </div>
                                </div>

                                <br><div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <input type="submit" name="addItem" value="Add Item" class="btn btn-primary">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="editItem" value="Edit Item" class="btn btn-primary">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" name="deleteItem" value="Delete Item" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>

                                <br><div>
                                    <div style="overflow-y: auto; overflow-x: auto; max-height: 400px;">
                                        <table style="width: 155%; table-layout: fixed;">
                                            <colgroup>
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 20%;">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Id. Penagihan</th>
                                                    <th>Nilai Pelunasan</th>
                                                    <th>Biaya</th>
                                                    <th>Lunas</th>
                                                    <th>Id. Detail Pelunasan</th>
                                                    <th>Pelunasan Rupiah</th>
                                                    <th>Pelunasan Currency</th>
                                                    <th>Kurang Lebih</th>
                                                    <th>Perkiraan</th>
                                                    <th>ID_Tagihan_Pembulatan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Data 1</td>
                                                    <td>Data 2</td>
                                                    <td>Data 1</td>
                                                    <td>Data 2</td>
                                                    <td>Data 1</td>
                                                    <td>Data 2</td>
                                                    <td>Data 1</td>
                                                    <td>Data 2</td>
                                                    <td>Data 1</td>
                                                    <td>Data 2</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="totalPemakaian" style="margin-right: 10px;">Total Pemakaian</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="totalPemakaian" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="kurangLebih" style="margin-right: 10px;">Kurang/Lebih</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="kurangLebih" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="totalBiaya" style="margin-right: 10px;">Total Biaya</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="totalBiaya" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                
                                <br><div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <input type="submit" name="isi" value="Isi" class="btn btn-primary">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" name="keluar" value="Keluar" class="btn btn-primary d-flex ml-auto">
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
