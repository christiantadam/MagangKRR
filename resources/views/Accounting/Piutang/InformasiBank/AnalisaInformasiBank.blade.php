@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Analisa Informasi Bank</div>
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="{{ url('FakturUangMuka') }}" id="formkoreksi">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" id="methodkoreksi">
                                <!-- Form fields go here -->
                                <div class="d-flex">
                                    <div class="col-md-1">
                                        <label for="tanggal" name="tanggal" style="margin-right: 10px;">Tanggal</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" id="tanggal" name="tanggal" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                       s/d
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" id="tanggal2" name="tanggal2" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="radio" name="radiogrup" value = 0 id="radiogrup">
                                        <label for="radiogrup">Belum Analisa</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="radio" name="radiogrup" value = 1 id="radiogrup">
                                        <label for="radiogrup">Sudah Analisa</label>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="submit" id="btnOk" name="btnOk" value="OK" class="btn btn-primary">
                                    </div>
                                </div>

                                <br><div>
                                    <div style="overflow-y: auto; max-height: 400px;">
                                        <table style="width: 120%; table-layout: fixed;" id="tabelAnalisa">
                                            <colgroup>
                                                <col style="width: 12%;">
                                                <col style="width: 14%;">
                                                <col style="width: 10%;">
                                                <col style="width: 12%;">
                                                <col style="width: 12%;">
                                                <col style="width: 12%;">
                                                <col style="width: 12%;">
                                                <col style="width: 12%;">
                                                <col style="width: 12%;">
                                                <col style="width: 12%;">
                                            </colgroup>
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Id. Referensi</th>
                                                    <th>Nama Bank</th>
                                                    <th>Mata Uang</th>
                                                    <th>Nilai</th>
                                                    <th>Keterangan</th>
                                                    <th>Nama Customer</th>
                                                    <th>Type</th>
                                                    <th>Id. Pelunasan</th>
                                                    <th>Tagihan (Y/N)</th>
                                                    <th>Jenis</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <input type="text" id="statusPenagihan" name="statusPenagihan" class="form-control" style="width: 100%">

                                <br>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="tanggalInput" style="margin-right: 10px;">Tanggal</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" id="tanggalInput" name="tanggalInput" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <p><div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="noReferensi" style="margin-right: 10px;">No. Referensi</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" id="noReferensi" name="noReferensi" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <p><div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="totalNilai" style="margin-right: 10px;">Total Nilai</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="totalNilai" name="totalNilai" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <p><div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="ketDariBank" style="margin-right: 10px;">Ket dari Bank</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="ketDariBank" name="ketDariBank" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <p><div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="namaCustomerSelect" style="margin-right: 10px;">Customer</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="namaCustomerSelect" id="namaCustomerSelect" class="form-control">

                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="idCustomer" name="idCustomer" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <p><div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="radiogrup2" style="margin-right: 10px;">Untuk Pembayaran</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" name="radiogrup2" value="T" id="radiogrup2">
                                        <label for="radiogrup2">Piutang</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" name="radiogrup2" value="K" id="radiogrup2">
                                        <label for="radiogrup2">Uang Muka (DP)</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="radio" name="radiogrup2" value="U" id="radiogrup2">
                                        <label for="radiogrup2">Uang Titipan</label>
                                    </div>
                                </div>
                                <p><br><div class="mb-3">
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="submit" id="btnProses" name="btnProses" value="Proses" class="btn btn-success" disabled>
                                        </div>
                                        <div class="col-2">
                                            <input type="submit" id="btnKeluar" name="btnKeluar" value="Keluar" class="btn btn-primary">
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
<script src="{{ asset('js/Piutang/InformasiBank/AnalisaInformasiBank.js') }}"></script>
@endsection
