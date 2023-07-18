@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')

<div class="card-header">
    Maintenance Divisi
</div>

<div class="card-body">
    <form action="#">
        <div class="row">
            <div class="col-lg-2">
                <span class="custom-alignment">Kode Divisi:</span>
            </div>

            <div class="col-lg-4">
                <select class="form-select" name="KodeDivisi" style="width: 36vh;
                height: 6vh;" disabled id="kddivisi">
                  <option selected>Pilih Divisi</option>
                  @foreach ($divisi as $d)
                  <option value="{{ $d->NamaDivisi }}">{{ $d->IdDivisi }} -- {{ $d->NamaDivisi }}</option>
                  @endforeach
                </select>
                <input type="text" name="IdDivisi" class="form-control" id="IdDivisi" style="display: none">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-2">
                <span class="custom-alignment">Nama Divisi:</span>
            </div>

            <div class="col-lg-6">
                <input type="text" name="nama_divisi" class="form-control" id="NamaDivisi" readonly>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-8">
                <div class="input-group d-flex justify-content-center">
                    <button type="button" class="btn btn-success custom-btn" id="isi" onclick="Isidiklik()"><u>I</u>SI</button>
                    <button type="button" class="btn btn-warning custom-btn" id="koreksi" ><u>K</u>OREKSI</button>
                    <button type="button" class="btn btn-danger custom-btn" id="hapus" ><u>H</u>APUS</button>
                    <button type="button" class="btn btn-danger custom-btn" id="batal" style="display: none" onclick="bataldiklik()"><u>B</u>atal</button>
                    <button type="button" class="btn btn-primary custom-btn" id="proses" disabled><u>P</u>ROSES</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="{{ asset('js/Andre-WorkShop/Workshop/MaintenanceDivisi.js') }}"></script>

@endsection
