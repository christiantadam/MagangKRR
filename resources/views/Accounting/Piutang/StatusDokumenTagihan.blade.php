@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance Status Faktur/Nota</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="customer" style="margin-right: 10px;">Customer</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="customerSelect" id="customer" class="form-control" onchange="fillColumns()">
                                            <option value=""></option>
                                            <option value="Customer">cust1</option>
                                            <option value="Customer 2">cust2</option>
                                        </select>
                                    </div>
                                </div>
                                <br><div>
                                    <div style="overflow-y: auto; max-height: 400px;">
                                        <table style="width: 120%; table-layout: fixed;">
                                            <colgroup>
                                                <col style="width: 25%;">
                                                <col style="width: 25%;">
                                                <col style="width: 20%;">
                                                <col style="width: 25%;">
                                                <col style="width: 25%;">
                                            </colgroup>
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Id. Referensi</th>
                                                    <th>Nama Bank</th>
                                                    <th>Mata Uang</th>
                                                    <th>Nilai</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Data 1</td>
                                                    <td>Data 2</td>
                                                    <td>Data 3</td>
                                                    <td>Data 4</td>
                                                    <td>Data 5</td>
                                                </tr>
                                                <!-- Tambahkan baris lainnya jika diperlukan -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <br>
                                
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="statusLama" style="margin-right: 10px;">No. Penagihan</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" id="statusLama" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="statusBaru" style="margin-right: 10px;">Status Lama</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="statusBaru" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Status Baru</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="muSelect" class="form-control" onchange="fillColumns()">
                                            <option value=""></option>
                                            <option value="MataUang">MU1</option>
                                            <option value="MataUang 2">Mu2</option>
                                        </select>
                                    </div>
                                </div>
                                <br><div class="mb-3">
                                    <div class="row">
                                        <div class="col-2">
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
