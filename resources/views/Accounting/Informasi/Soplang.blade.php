@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Informasi Piutang Penjualan</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="d-flex">
                                    <div class="col-md-4">
                                        <label for="tglAkhirLaporan">Tgl Akhir Laporan</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" id="tglAkhirLaporan" class="form-control" style="width: 100%">
                                    </div>
                                </div>

                                <br><div class="mb-3">
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="submit" id="btnKeluar" name="keluar" value="Keluar" class="btn btn-primary">
                                        </div>
                                        <div class="col-2">
                                            <input type="submit" id="btnProses" name="proses" value="Proses" class="btn btn-primary">
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
