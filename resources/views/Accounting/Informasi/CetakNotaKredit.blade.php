@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Cek Nota Kredit</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="d-flex">
                                    <div class="col-md-4">
                                        <label for="tglProduksi">Tanggal</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" id="tglProduksi" class="form-control" style="width: 100%">
                                    </div>
                                </div>  
                                <div class="d-flex">
                                    <div class="col-md-4">
                                        <label for="customer">Customer</label>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="customerSelect" class="form-control" onchange="fillColumns()">
                                            <option value="NoPenagihan 1">No1</option>
                                            <option value="NoPenagihan 2">No2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-4">
                                        <label for="idPenagihan">Nota Kredit</label>
                                    </div>
                                    <div class="col-md-5">
                                    <input type="text" id="idPenagihan" class="form-control" style="width: 100%">
                                    </div>
                                </div>

                                <br><div class="mb-3">
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="submit" id="btnCetak" name="cetak" value="Cetak" class="btn btn-primary">
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