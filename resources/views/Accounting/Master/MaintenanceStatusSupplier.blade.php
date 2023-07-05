@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance Status Supplier</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->

                                <div>
                                    <table style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>id. Supp</th>
                                            <th>Nama Supplier</th>
                                            <th>Saldo</th>
                                            <th>Saldo Rp</th>
                                            <th>Jns Supp</th>
                                            <th>Jns Bayar</th>
                                        </tr>
                                    </thead>
                                    </table>
                                </div>

                                <p><div class="container fluid">
                                    <p><div class="row">
                                        <div class="col-md-2 ">
                                            <label for="id">ID/Nm.Supplier</label>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                        </div>
                                        <div>
                                            <select name="supplierSelect" class="form-control" onchange="fillColumns()">
                                                <option value=""></option>
                                                <option value="ID 1">ID1</option>
                                                <option value="ID 2">ID2</option>
                                            </select>
                                        </div>
                                    </div>

                                    <p><div class="row">
                                        <div class="col-md-2">
                                            <label for="id">Jenis Supplier</label>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="text" name="jenissupplier1" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="jenissupplier2" class="form-control" style="width: 100%">
                                        </div>
                                    </div>

                                    <p><div class="row">
                                        <div class="col-md-2">
                                            <label for="id">Jenis Bayar</label>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="text" name="jenisbayar" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-6">
                                            <h6>[H] -- Hutang</h6>
                                            <h6>[T] -- Tunai</h6>
                                            <h6>[A] -- Angkutan</h6>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-1">
                                            <input type="submit" name="isi" value="Isi" class="btn btn-primary">
                                        </div>
                                        <div class="col-1">
                                            <input type="submit" name="koreksi" value="Koreksi" class="btn btn-primary">
                                        </div>
                                        <div class="col-10">
                                            <input type="submit" name="keluar" value="Keluar" class="btn btn-primary d-flex ml-auto">
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
