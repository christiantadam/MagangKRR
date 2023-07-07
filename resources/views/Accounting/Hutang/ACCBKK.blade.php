@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">ACC Pengajuan BKK</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <p><div class="card">
                                    <table class="table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Pembayaran</th>
                                                <th>Penagihan</th>
                                                <th>Bank</th>
                                                <th>Rincian Pembayaran</th>
                                                <th>Nilai Bayar</th>
                                                <th>Jenis Bayar</th>
                                                <th>.......</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="checkbox" class="data-checkbox"> Data 1</td>
                                                <td>Data 2</td>
                                                <td>Data 3</td>
                                                <td>Data 4</td>
                                                <td>Data 5</td>
                                                <td>Data 6</td>
                                                <td>Data 7</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div>
                                    <p>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="id">ID.Pembayaran/Penagihan</label>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                    <p>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="id">Pembayaran</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-2" >
                                            <label for="id"></label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="id">Bank</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-1">
                                            <select name="nama_select" class="form-control">
                                                <option value="option1">Bank 1</option>
                                                <option value="option2">Bank 2</option>
                                                <option value="option3">Bank 3</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="id" style="padding-left: 50px">Jenis/Jumlah Pembayaran</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-1">
                                            <select name="nama_select" class="form-control">
                                                <option value="option1">Bank 1</option>
                                                <option value="option2">Bank 2</option>
                                                <option value="option3">Bank 3</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                
                                <hr style="height:2px;">
                                <b>PENAGIHAN</b>
                                <p><div class="row">
                                    <div class="col-md-2">
                                        <label for="id">Mata Uang</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="id">Nilai Penagihan</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="id" style="padding-left: 50px">Nilai Penagihan (RP)</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                </div>

                                <br><b>PEMBAYARAN</b>
                                <br><div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 50%;">
                                        <p><div style="display: flex;">
                                            <div class="col-md-4">
                                                <label for="id">Bank</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                            </div>
                                            <div class="col-md-1" style="vertical-align: middle;">
                                                <select name="supplierSelect" class="form-control" onchange="fillColumns()">
                                                    <option value=""></option>
                                                    <option value="Supplier 1">Supplier 1</option>
                                                    <option value="Supplier 2">Supplier 2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div style="display: flex;">
                                            <div class="col-md-4">
                                                <label for="id">Nilai Dibayarkan</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                        <div style="display: flex;">
                                            <div class="col-md-4">
                                                <label for="id">Nilai Kurs</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>

                                <!--CARD 2-->
                                    <div class="card" style="width: 50%;">
                                        <p><div style="display: flex;">
                                            <div class="col-md-5">
                                                <label for="id">Sudah dibayar:</label>
                                            </div>
                                        </div>
                                        <p><div style="display: flex;">
                                            <div class="col-md-5">
                                                <label for="id" class="clickable">Mata Uang</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                        <div style="display: flex;">
                                            <div class="col-md-5">
                                                <label for="id" class="clickable">Nilai SUDAH dibayar</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                        <div style="display: flex;">
                                            <div class="col-md-5">
                                                <label for="id" class="clickable">Nilai BELUM dibayar</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-11" style="padding-left: 15px">
                                            <input type="submit" name="isi" value="ISI" class="btn btn-primary">
                                        </div>
                                        <div class="col-1">
                                            <input type="submit" name="keluar" value="KELUAR" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <br>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
