@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">ACC Penagihan Surat Jalan</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div style="overflow-y: auto; overflow-x: auto; max-height: 400px;">
                                    <table style="width: 125%; table-layout: fixed;">
                                        <colgroup>
                                            <col style="width: 15%;">
                                            <col style="width: 15%;">
                                            <col style="width: 30%;">
                                            <col style="width: 15%;">
                                            <col style="width: 20%;">
                                            <col style="width: 10%;">
                                            <col style="width: 20%;">
                                        </colgroup>
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Id. Penagihan</th>
                                                <th>Customer</th>
                                                <th>PO</th>
                                                <th>Nilai Tagihan</th>
                                                <th>Mata Uang</th>
                                                <th>...</th>
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
                                        </tbody>
                                    </table>
                                </div>
                                
                                <br>
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="idPenagihan">Id. Penagihan</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="idPenagihan" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-7">
                                            <input type="submit" id="btnProses" name="proses" value="Proses" class="btn btn-primary d-flex ml-auto" disabled>
                                        </div>
                                        <div class="col-1">
                                            <input type="submit" id="btnKeluar" name="keluar" value="Keluar" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="fakturPajak">Faktur Pajak</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="fakturPajak" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-8 d-flex justify-content-end">
                                            Sebelum Di Acc, Mohon diteliti Kembali
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div style="overflow-y: auto; max-height: 400px;">
                                    <table style="width: 60%; table-layout: fixed;">
                                        <colgroup>
                                            <col style="width: 30%;">
                                            <col style="width: 30%;">
                                        </colgroup>
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Surat Jalan</th>
                                                <th>Tanggal Terima Barang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Data 1</td>
                                                <td>Data 2</td>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
