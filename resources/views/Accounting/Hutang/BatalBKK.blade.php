@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Batal BKK</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="d-flex">
                                    <div class="col-md-6">
                                        <input type="radio" name="radiogrup1" value="radio_1" id="radio_1">
                                        <label for="radio_1" style="margin-right: 10px;">Kas Kecil</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="radio" name="radiogrup1" value="radio_2" id="radio_2">
                                        <label for="radio_2" style="margin-right: 10px;">Kas Besar</label>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Bulan/Tahun</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <br><div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">BKK</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <hr style="height:2px;">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Status Penagihan</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Mata Uang</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Nilai BKK</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <br><div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Status Pelunasan</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Status BATAL</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <hr style="height:2px;">
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="id" style="margin-right: 10px;">Alasan</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="supplierSelect" class="form-control" style="width: 100%">
                                    </div>
                                </div>

                                <br><div class="mb-3">
                                    <div class="row">
                                        <div class="col-2">
                                            <input type="submit" id="btnProses" name="proses" value="PROSES" class="btn btn-primary" disabled>
                                        </div>
                                        <div class="col-10">
                                            <input type="submit" id="btnKeluar" name="keluar" value="KELUAR" class="btn btn-primary d-flex ml-auto">
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
