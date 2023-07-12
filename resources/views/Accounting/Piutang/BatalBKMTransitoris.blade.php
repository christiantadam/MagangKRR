@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-5 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">BATAL BKM</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="radio" name="radiogrup1" value="radio_1" id="kasBesar">
                                            <label for="kasBesar">Kas Besar</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="radio" name="radiogrup1" value="radio_2" id="kasKecil">
                                            <label for="kasKecil">Kas Kecil</label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="bulanTahun">Bulan/Tahun</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="bulanTahun" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="bkm">BKM</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="bankSelect" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-1">
                                            <select name="bank_select" class="form-control">
                                                <option value="option1">BKM1</option>
                                                <option value="option2">BKM2</option>
                                                <option value="option3">BKM3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr style="height:2px;">
                                <div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="statusPenagihan">Status Penagihan</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" id="statusPenagihan" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="mataUang">Mata Uang</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" id="mataUang" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="nilaiBKM">Nilai BKM</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" id="nilaiBKM" class="form-control" style="width: 100%">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-10" style="padding-left: 15px">
                                            <input type="submit" name="proses" value="PROSES" class="btn btn-primary" disabled>
                                        </div>
                                        <div class="col-1">
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
