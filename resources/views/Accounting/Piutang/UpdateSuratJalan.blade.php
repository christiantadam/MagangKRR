@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Update Surat Jalan untuk Nota Tunai</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div style="overflow-y: auto; max-height: 400px;">
                                    <table style="width: 100%; table-layout: fixed;">
                                        <colgroup>
                                            <col style="width: 15%;">
                                            <col style="width: 15%;">
                                            <col style="width: 20%;">
                                            <col style="width: 25%;">
                                            <col style="width: 20%;">
                                            <col style="width: 20%;">
                                        </colgroup>
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Id. Penagihan</th>
                                                <th>Id. Pengiriman</th>
                                                <th>Tgl. Jual</th>
                                                <th>Customer</th>
                                                <th>Nilai Jual</th>
                                                <th>Mata Uang</th>
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
                                            <!-- Tambahkan baris lainnya jika diperlukan -->
                                        </tbody>
                                    </table>
                                </div>

                                <p>
                                <div class="mb-3">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
