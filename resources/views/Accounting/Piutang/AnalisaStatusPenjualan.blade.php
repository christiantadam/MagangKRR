@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Analisa Status Pelunasan Tagihan Penjualan</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="d-flex">
                                    <div class="col-md-1">
                                        <label for="tanggal" name="tanggal" style="margin-right: 10px;">Tanggal</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" id="tanggal1" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                       s/d
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="submit" id="btnOk" name="ok" value="OK" class="btn btn-primary">
                                    </div>
                                </div>

                                <br><div>
                                    <div style="overflow-y: auto; max-height: 400px;">
                                        <table style="width: 110%; table-layout: fixed;">
                                            <colgroup>
                                                <col style="width: 12%;">
                                                <col style="width: 16%;">
                                                <col style="width: 10%;">
                                                <col style="width: 12%;">
                                                <col style="width: 12%;">
                                                <col style="width: 12%;">
                                                <col style="width: 12%;">
                                                <col style="width: 12%;">
                                                <col style="width: 12%;">
                                            </colgroup>
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Tgl. Pelunasan</th>
                                                    <th>Customer</th>
                                                    <th>No. Faktur</th>
                                                    <th>Pembayaran</th>
                                                    <th>Pelunasan</th>
                                                    <th>NIlai Tagihan</th>
                                                    <th>Total Bayar</th>
                                                    <th>Lunas</th>
                                                    <th>BKM</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Data 1</td>
                                                    <td>Data 2</td>
                                                    <td>Data 3</td>
                                                    <td>Data 4</td>
                                                    <td>Data 5</td>
                                                    <td>Data 1</td>
                                                    <td>Data 2</td>
                                                    <td>Data 3</td>
                                                    <td>Data 4</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <br>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="tanggal3" style="margin-right: 10px;">No. Faktur</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" id="tanggal3" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="noReferensi" style="margin-right: 10px;">Total Penagihan</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" id="noReferensi" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="totalNilai" style="margin-right: 10px;">Total Pembayaran</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" id="totalNilai" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="ketDariBank" style="margin-right: 10px;">Nota Kredit</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" id="ketDariBank" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="customer" style="margin-right: 10px;">Sisa Tagihan</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" id="ketDariBank" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="id" style="margin-right: 10px;">Lunas (Y/N)</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" id="ketDariBank" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <br><div class="mb-3">
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="submit" id="btnProses" name="proses" value="Proses" class="btn btn-primary" disabled>
                                        </div>
                                        <div class="col-2">
                                            <input type="submit" id="btnKeluar" name="keluar" value="Keluar" class="btn btn-primary">
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
