@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Create BKM Cash Advance</div>
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="{{ url('CreateBKM') }}" id="formkoreksi">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" id="methodkoreksi">
                                <!-- Form fields go here -->
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="bulanTahun" style="margin-right: 10px;">Bulan/Tahun</label>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="bulan" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="tahun" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="btnOK" name="btnOK" value="OK" class="btn">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="btnInputTanggalBKM" name="btnInputTanggalBKM" value="Input Tanggal BKM" class="btn">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="btnGroupBKM" name="ibtnGroupBKMsi" value="Group BKM" class="btn">
                                    </div>
                                </div>

                                <br><div>
                                    Data Pelunasan
                                    <div style="overflow-y: auto; max-height: 400px;">
                                        <table style="width: 160%; table-layout: fixed;" id="tabelDataPelunasan">
                                            <colgroup>
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 20%;">
                                                <col style="width: 15%;">
                                                <col style="width: 20%;">
                                                <col style="width: 20%;">
                                                <col style="width: 20%;">
                                                <col style="width: 20%;">
                                            </colgroup>
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Tgl Pelunasan</th>
                                                    <th>Id. Pelunasan</th>
                                                    <th>Id. Bank</th>
                                                    <th>Jenis Pembayaran</th>
                                                    <th>Mata Uang</th>
                                                    <th>Total Pelunasan</th>
                                                    <th>No. Bukti</th>
                                                    <th>Tgl. Input</th>
                                                    <th>Kode Perkiraan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- <tr>
                                                    <td>Data 1</td>
                                                    <td>Data 2</td>
                                                    <td>Data 3</td>
                                                    <td>Data 4</td>
                                                    <td>Data 1</td>
                                                    <td>Data 2</td>
                                                    <td>Data 3</td>
                                                    <td>Data 4</td>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br><div class="mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="submit" id="btnProses" name="tampilbkm" value="Tampil BKM" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-6">
                                            <input type="submit" id="btnProses" name="tutup" value="TUTUP" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                    </div>
                                </div>

                                <!--MODAL-->
                                <div class="modal fade" id="pilihInputTanggal" tabindex="-1" role="dialog"
                                aria-labelledby="pilihBankModal" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="pilihBankModal">Maintenance Pilih Bank BKM
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('MaintenanceBKMPenagihan') }}" id="modalInputTanggal" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" id="methodInputTanggal">
                                            <div class="modal-body">
                                                <div class="d-flex">
                                                    <div class="col-md-3">
                                                        <label for="idPelunasan" style="margin-right: 10px;">Id.
                                                            Pelunasan</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" id="idPelunasan" name="idPelunasan"
                                                            class="form-control" style="width: 100%">
                                                    </div>
                                                    <input type="hidden" name="idcoba" id="idcoba" value="idcoba">
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-md-3">
                                                        <label for="tanggalInput" style="margin-right: 10px;">Tanggal
                                                            Input</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="date" id="tanggalInput" class="form-control"
                                                            style="width: 100%">
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-md-3">
                                                        <label for="jenisBayar" style="margin-right: 10px;">Jenis
                                                            Bayar</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" id="jenisBayar" class="form-control"
                                                            style="width: 100%">
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-md-3">
                                                        <label for="bankSelect"
                                                            style="margin-right: 10px;">Bank</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" id="idBank" name="idBank"
                                                            class="form-control" style="width: 100%">
                                                    </div>
                                                    <div class="col-md-7">
                                                        <select name="namaBankSelect" id="namaBankSelect"
                                                            class="form-control">

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-md-3">
                                                        <label for="mataUang" style="margin-right: 10px;">Mata
                                                            Uang</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" id="mataUang" name="mataUang"
                                                            class="form-control" style="width: 100%">
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-md-3">
                                                        <label for="nilaiPelunasan" style="margin-right: 10px;">Nilai
                                                            Pelunasan</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" id="nilaiPelunasan"
                                                            name="nilaiPelunasan" class="form-control"
                                                            style="width: 100%">
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-md-3">
                                                        <label for="noBukti" style="margin-right: 10px;">No.
                                                            Bukti</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" id="noBukti" namee="noBukti"
                                                            class="form-control" style="width: 100%">
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-md-3">
                                                        <label for="kodePerkiraan" style="margin-right: 10px;">Kode Perkiraan</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" id="idKodePerkiraan" name="idKodePerkiraan"
                                                            class="form-control" style="width: 100%">
                                                    </div>
                                                    <div class="col-md-7">
                                                        <select name="kodePerkiraanSelect" id="kodePerkiraanSelect" class="form-control">

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <input type="submit" id="btnProses" name="btnProses" value="Proses" class="btn btn-primary">
                                                    </div>
                                                    <div class="col-3">
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="submit" id="btnTutupModal" name="btnTutupModal" value="Tutup" class="btn btn-primary">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="detpelunasan" id="detpelunasan"
                                                    value="datpelunasan">
                                            </div>
                                        </form>
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
<script src="{{ asset('js/Piutang/BKMCashAdvance/CreateBKM.js') }}"></script>
@endsection
