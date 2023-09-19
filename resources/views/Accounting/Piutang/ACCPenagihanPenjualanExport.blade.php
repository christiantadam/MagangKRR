@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">ACC Penagihan Surat Jalan</div>
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="{{ url('ACCPenagihanPenjualanExport') }}" id="formkoreksi">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" id="methodkoreksi">
                                <!-- Form fields go here -->
                                <div style="overflow-y: auto; max-height: 400px;">
                                    <table style="width: 175%; table-layout: fixed;" id="tabelPenagihanPenjualanEx">
                                        <colgroup>
                                            <col style="width: 25%;">
                                            <col style="width: 15%;">
                                            <col style="width: 30%;">
                                            <col style="width: 15%;">
                                            <col style="width: 20%;">
                                            <col style="width: 20%;">
                                            <col style="width: 15%;">
                                            <col style="width: 15%;">
                                            <col style="width: 20%;">
                                        </colgroup>
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Id. Penagihan</th>
                                                <th>Customer</th>
                                                <th>PO</th>
                                                <th>Nilai Tagihan</th>
                                                <th>Mata Uang</th>
                                                <th>Id. Customer</th>
                                                <th>Id. Mata Uang</th>
                                                <th>Kurs</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-2">
                                    <input type="hidden" id="idPenagihan" name="idPenagihan" class="form-control" style="width: 100%">
                                </div>
                                <div class="col-md-2">
                                    <input type="hidden" id="id_Penagihan" name="id_Penagihan" class="form-control" style="width: 100%">
                                </div>
                                <div class="col-md-2">
                                    <input type="hidden" id="idCustomer" name="idCustomer" class="form-control" style="width: 100%">
                                </div>
                                <div class="col-md-2">
                                    <input type="hidden" id="idMataUang" name="idMataUang" class="form-control" style="width: 100%">
                                </div>
                                <div class="col-md-2">
                                    <input type="hidden" id="debet" name="debet" class="form-control" style="width: 100%">
                                </div>
                                <div class="col-md-2">
                                    <input type="hidden" id="kurs" name="kurs" class="form-control" style="width: 100%">
                                </div>

                                <br>
                                <div>
                                    <div class="row">
                                    <div class="col-8"></div>
                                        <div class="col-2">
                                            <div>
                                                <input class="form-check-input" type="checkbox" id="checkbox2" value="option1">
                                            </div>
                                            <div style="white-space: nowrap;">
                                                ACC Semua
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <input type="submit" id="btnProses" name="proses" value="Proses" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-1">
                                            <input type="submit" id="btnKeluar" name="keluar" value="Keluar" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div style="overflow-y: auto; max-height: 400px;">
                                    <table style="width: 60%; table-layout: fixed;margin-left:0" id="tabelDetailPenjualanEx">
                                        <colgroup>
                                            <col style="width: 30%;">
                                            <col style="width: 30%;">
                                        </colgroup>
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Surat Jalan</th>
                                                <th>Tanggal Terima Barang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
<script src="{{ asset('js/Piutang/ACCPenagihanPenjualanExport.js') }}"></script>
@endsection
