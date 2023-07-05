@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Batal Penagihan</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->

                                <div class="container fluid">
                                    <p><div class="row">
                                            <div class="col-md-4">
                                                <label for="id">BULAN / TAHUN</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" name="bulan" class="form-control" style="width: 100%">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" name="tahun" class="form-control" style="width: 100%">
                                            </div>
                                    </div>
                                </div>
                                
                                <div class="container fluid">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="id">ID Penagihan</label>
                                        </div>
                                        <div class="col-md-2">
                                            <select name="nama_select" class="form-control" style="width: 200px;">
                                                <option value="option1">Pilihan 1</option>
                                                <option value="option2">Pilihan 2</option>
                                                <option value="option3">Pilihan 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr style="height:2px;">
                                <div class="container fluid">
                                    <p><div class="row">
                                        <div class="col-md-4">
                                            <label for="id">Supplier</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="symbol1" class="form-control" style="width: 400px">
                                        </div>
                                    </div>
                                </div>

                                <div class="container fluid">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="id">Mata Uang</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="matauang" name="symbol1" class="form-control" style="width: 200px">
                                        </div>
                                    </div>
                                </div>

                                <div class="container fluid">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="id">Nilai Tagihan</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="idtagihan" name="symbol1" class="form-control" style="width: 200px">
                                        </div>
                                    </div>
                                </div>

                                <div class="container fluid">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="id">Status Penagihan</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="statuspenagihan" name="symbol1" class="form-control" style="width: 400px">
                                        </div>
                                    </div>
                                </div>

                                <hr style="height:2px;">
                                <div class="container fluid">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="id">Alasan</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="number" name="symbol1" class="form-control" style="width: 700px">
                                        </div>
                                    </div>
                                </div>

                                <p>
                                <div class="mb-3">
                                    <input type="submit" name="proses" value="Proses" class="btn btn-primary" disabled>
                                    <input type="submit" name="keluar" value="Keluar" class="btn btn-primary">
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
