@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance BKK (Tunai) -- Create TT</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                    
                                <p><div class="row">
                                    <div class="col-md-2">
                                        <label for="id">Supplier</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                        <select name="supplierSelect" class="form-control" onchange="fillColumns()">
                                            <option value=""></option>
                                            <option value="Supplier 1">Supplier 1</option>
                                            <option value="Supplier 2">Supplier 2</option>
                                        </select>
                                    </div>
                                </div>

                                <p><div style="overflow-x: auto;">
                                    <table style="width: 100%; table-layout: fixed;">
                                        <colgroup>
                                        <col style="width: 10%;">
                                        <col style="width: 10%;">
                                        <col style="width: 10%;">
                                        <col style="width: 30%;">
                                        <col style="width: 10%;">
                                        <col style="width: 30%;">
                                        </colgroup>
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Divisi</th>
                                                <th>PO</th>
                                                <th>No. BTTB</th>
                                                <th>Nilai Tagih</th>
                                                <th>Kd. Barang</th>
                                                <th>Nama Barang</th>
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
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <p>
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="id">ID. Penagihan</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-8 d-flex justify-content-end">
                                            <label for="id" style="margin-left: 10px;">Mata Uang</label>
                                            <div class="col-md-2">
                                                <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="id">ID Inv. Supplier</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                        </div>
                                    </div>

                                    <hr style="height:2px;">
                                    <div class="row">
                                        <div class="col-2">
                                            <label for="id">NILAI PENGASIHAN</label>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <label for="id" style="margin-right: 5px;">Rp</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                </div>

                                <p><div class="card">
                                    <div class="col-md-2">
                                        <div class="row">
                                            <label for="id">Faktur Pajak</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="id">No. Faktur Pajak</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="id" style="margin-left: 80px;">No. Faktur Pajak</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-4 d-flex justify-content-end">
                                            <div class="col-md-4">
                                                <label for="id" style="margin-left: 80px;">Pajak</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                            </div>
                                            <div class="col-md-1">
                                                <label for="id">%</label>
                                            </div>
                                        </div>
                                    </div>
                                    <p><div style="overflow-x: auto;">
                                    <table style="width: 100%; table-layout: fixed;">
                                        <colgroup>
                                        <col style="width: 10%;">
                                        <col style="width: 20%;">
                                        <col style="width: 20%;">
                                        <col style="width: 10%;">
                                        <col style="width: 20%;">
                                        <col style="width: 20%;">
                                        </colgroup>
                                        <thead class="table-dark">
                                            <tr>
                                                <th>ID. Detail</th>
                                                <th>No. Faktur</th>
                                                <th>Nilai Faktur</th>
                                                <th>Pajak</th>
                                                <th>Sub. Total</th>
                                                <th>Kurs</th>
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
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>

                                <div class="mb-3">
                                    <input type="submit" name="proses" value="Proses" class="btn btn-primary" disabled>
                                    <input type="submit" name="keluar" value="Keluar" class="btn btn-primary">
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
