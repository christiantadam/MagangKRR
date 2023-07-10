@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Create BKM Cash Advance</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Bulan/Tahun</label>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="btnProses" name="isi" value="OK" class="btn">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="btnProses" name="isi" value="Pilih Bank" class="btn">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="btnProses" name="isi" value="Group BKM" class="btn">
                                    </div>
                                </div>

                                <br><div>
                                    Data Pelunasan
                                    <div style="overflow-y: auto; max-height: 400px;">
                                        <table style="width: 140%; table-layout: fixed;">
                                            <colgroup>
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 20%;">
                                                <col style="width: 15%;">
                                                <col style="width: 20%;">
                                                <col style="width: 20%;">
                                                <col style="width: 20%;">
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
                                                    <th>Tgl Pembuatan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Data 1</td>
                                                    <td>Data 2</td>
                                                    <td>Data 3</td>
                                                    <td>Data 4</td>
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
                                <br><div class="mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="submit" id="btnProses" name="tampilbkm" value="Tampil BKM" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-6">
                                            <input type="submit" id="btnProses" name="tutup" value="TUTUP" class="btn btn-primary d-flex ml-auto">
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
