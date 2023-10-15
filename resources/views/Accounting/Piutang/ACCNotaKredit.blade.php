@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">ACC Nota Kredit</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div style="overflow-y: auto; max-height: 400px;">
                                    <table style="width: 140%; table-layout: fixed;">
                                        <colgroup>
                                            <col style="width: 20%;">
                                            <col style="width: 20%;">
                                            <col style="width: 20%;">
                                            <col style="width: 20%;">
                                            <col style="width: 20%;">
                                            <col style="width: 20%;">
                                            <col style="width: 20%;">
                                        </colgroup>
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Jenis Nota</th>
                                                <th>Tanggal</th>
                                                <th>Customer</th>
                                                <th>Nota Kredit</th>
                                                <th>Nilai Tagihan</th>
                                                <th>Nilai Retur</th>
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
                                    <div class="col-8"></div>
                                        <div class="col-1">
                                            <input type="submit" id="btnProses" name="proses" value="Proses" class="btn btn-primary d-flex ml-auto" >
                                        </div>
                                        <div class="col-1">
                                            <input type="submit" id="btnKeluar" name="keluar" value="Keluar" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                    </div>
                                </div>
                                
                                <br>
                                <div style="overflow-y: auto; max-height: 400px;">
                                    <table style="width: 100%; table-layout: fixed;">
                                        <colgroup>
                                            <col style="width: 20%;">
                                            <col style="width: 10%;">
                                            <col style="width: 10%;">
                                            <col style="width: 20%;">
                                            <col style="width: 20%;">
                                            <col style="width: 20%;">
                                        </colgroup>
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Surat Jalan</th>
                                                <th>No. Retur</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Satuan</th>
                                                <th>Harga Baru</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                                <td>5</td>
                                                <td>6</td>
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
