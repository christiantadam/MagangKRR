@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')
  <div class="card-header">
    Maintenance Mesin
  </div>

  <div class="card-body">
    <form action="#">
      <div class="row">
        <div class="col-lg-2">
          <span class="custom-alignment">Divisi:</span>
        </div>

        <div class="col-lg-6">
          <select class="form-select" name="divisi" style="width: 36vh;
                height: 6vh;"
            id="divisi">
            <option disabled selected>Pilih Divisi</option>
            @foreach ($divisi as $d)
              <option value="{{ $d->IdDivisi }}">{{ $d->IdDivisi }} -- {{ $d->NamaDivisi }}</option>
            @endforeach
          </select>
          <input type="hidden" name="iddivisi" id="iddivisi">
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-lg-2">
          <span class="custom-alignment">Nama Mesin:</span>
        </div>

        <div class="col-lg-6">
          <select class="form-select" name="mesin" style="width: 36vh;
            height: 6vh;"
            id="mesin">
            <option disabled selected>Pilih Mesin</option>
          </select>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-lg-8">
          <div class="input-group d-flex justify-content-center">
            <button type="button" class="btn btn-success custom-btn"><u>I</u>SI</button>
            <button type="button" class="btn btn-warning custom-btn"><u>K</u>OREKSI</button>
            <button type="button" class="btn btn-danger custom-btn"><u>H</u>APUS</button>
            <button type="button" class="btn btn-primary custom-btn" disabled><u>P</u>ROSES</button>
            <button type="button" class="btn btn-secondary custom-btn"><u>K</u>ELUAR</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script src="{{ asset('js/Andre-WorkShop/Workshop/MaintenanceMesin.js') }}"></script>
@endsection
