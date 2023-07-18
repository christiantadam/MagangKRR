@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance Pengajuan BKK Nota Kredit</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <br><div>
                                    <b>Data Nota Kredit untuk Create BKK</b>
                                    <div style="overflow-y: auto; max-height: 400px;">
                                        <table style="width: 100%; table-layout: fixed;">
                                            <colgroup>
                                                <col style="width: 10%;">
                                                <col style="width: 20%;">
                                                <col style="width: 20%;">
                                                <col style="width: 20%;">
                                                <col style="width: 10%;">
                                                <col style="width: 10%;">
                                                <col style="width: 10%;">
                                            </colgroup>
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Id. Nota Kredit</th>
                                                    <th>Id. Penagihan</th>
                                                    <th>Customer</th>
                                                    <th>Mata Uang</th>
                                                    <th>Jml Uang</th>
                                                    <th>Jenis Bayar</th>
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
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <br>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="noPenagihan" style="margin-right: 10px;">No. Penagihan</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="noPenagihan" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="noPenagihan" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="customer" style="margin-right: 10px;">Customer</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" id="customer" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="mataUang" style="margin-right: 10px;">Mata Uang</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" id="mataUang" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="jumlahUang" style="margin-right: 10px;">Jumlah Uang</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" id="jumlahUang" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="jenisBayar" style="margin-right: 10px;">Jenis Bayar</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="jenisBayarSelect" class="form-control" onchange="fillColumns()">
                                            <option value="JenisBayar 1">Jenis1</option>
                                            <option value="JenisBayar 2">Jenis2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="bank" style="margin-right: 10px;">Bank</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="bankSelect" class="form-control" onchange="fillColumns()">
                                            <option value="NoPenagihan 1">No1</option>
                                            <option value="NoPenagihan 2">No2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="rincianBKK" style="margin-right: 10px;">Rincian BKK</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" id="rincianBKK" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <br><div>
                                    <div class="row">
                                        <div class="col-md-8 d-flex ml-auto">
                                            <input type="submit" name="isi" value="ISI" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="koreksi" value="KOREKSI" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="hapus" value="HAPUS" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="proses" value="PROSES" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-1 ">
                                            <input type="submit" name="keluar" value="KELUAR" class="btn btn-primary d-flex ml-auto">
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
