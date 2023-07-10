@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Batal BKK</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">BKK</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-3" style="d-flex ml-auto">
                                        Nilai BKK Tidak bisa diubah
                                    </div>
                                </div>
                                <br><div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Nilai</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                </div>

                                <br><div>
                                    <div style="overflow-y: auto; max-height: 400px;">
                                        <table style="width: 120%; table-layout: fixed;">
                                            <colgroup>
                                                <col style="width: 15%;">
                                                <col style="width: 50%;">
                                                <col style="width: 20%;">
                                                <col style="width: 15%;">
                                            </colgroup>
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Id. Detail</th>
                                                    <th>Rincian</th>
                                                    <th>Nilai Rincian</th>
                                                    <th>Kd. Perkiraan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Data 1</td>
                                                    <td>Data 2</td>
                                                    <td>Data 3</td>
                                                    <td>Data 4</td>
                                                <tr>
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

                                <br>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Id. Detail</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Id. Bayar</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                        <label for="id" style="margin-right: 10px;">Total</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Rincian</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Nilai Rincian</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Kode Perkiraan</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                        <select name="supplierSelect" class="form-control" onchange="fillColumns()">
                                            <option value=""></option>
                                            <option value="Supplier 1">Kd1</option>
                                            <option value="Supplier 2">Kd2</option>
                                        </select>
                                    </div>
                                </div>
                                <br><div class="mb-3">
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="submit" id="btnProses" name="isi" value="Isi" class="btn btn-primary">
                                        </div>
                                        <div class="col-2">
                                            <input type="submit" id="btnProses" name="koreksi" value="Koreksi" class="btn btn-primary">
                                        </div>
                                        <div class="col-2">
                                            <input type="submit" id="btnProses" name="proses" value="Proses" class="btn btn-primary" disabled>
                                        </div>
                                        <div class="col-7">
                                            <input type="submit" id="btnKeluar" name="keluar" value="Keluar" class="btn btn-primary d-flex ml-auto">
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
