@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')
@section('title', 'Status Order Proyek')
  <link href="{{ asset('css/Workshop/Transaksi/PenerimaGambar.css') }}" rel="stylesheet">
  <div class="card-header">
    Status Order Proyek
  </div>

  <div class="card-body">
    <img src="{{ asset('images/Workshop.png') }}" alt="logo" class="workshop-logo">

    <div class="row">
      <div class="col-lg-7">

        <div class="row">
          <div class="col-lg-4">
            <span class="custom-alignment">Tgl. Order:</span>
          </div>

          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-5">
                <input type="Date" class="form-control" name="tgl_awal" id="tgl_awal">
              </div>
              <div class="col-lg-2 d-flex justify-content-center">
                <span style="margin-top: 5px;">s/d</span>
              </div>
              <div class="col-lg-5">
                <input type="Date" class="form-control" name="tgl_akhir" id="tgl_akhir">
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-4">
            <span class="custom-alignment">Divisi:</span>
          </div>

          <div class="col-lg-8">
            <select class="form-select" name="KodeDivisi" style="width: 36vh;
            height: 6vh;" id="kddivisi">
              <option disabled selected>Pilih Divisi</option>
              @foreach ($divisi as $d)
                <option value="{{ $d->IdDivisi }}">{{ $d->IdDivisi }} -- {{ $d->NamaDivisi }}</option>
              @endforeach
            </select>
          </div>
        </div>

      </div>

      <div class="col-lg-5">

        <div class="keterangan keterangan-padding mt-3">
          <div class="row">
            <div class="col-lg-6">
              <span style="color: blue;">xxxxx -></span>
              <span>Sudah Selesai</span>
            </div>

            <div class="col-lg-6">
              <span>xxxxx -></span>
              <span>Belum Selesai</span>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="table-responsive">
      <table class="table mt-3" id="TableStatusOrderProyek">
        <thead class="table-dark" style="white-space: nowrap">
          <tr>
            <th>No.Order</th>
            <th>Tanggal Order</th>
            <th>Nama Proyek</th>
            <th>JmlOrder</th>
            <th>Mesin</th>
            <th>Status Order</th>
            <th>Keterangan Order</th>
            <th>PengOrder</th>
            <th>ACC Bpk. Peter</th>
            <th>Tanggal Finish</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>

    <div class="mt-3">
      <div class="float-start" style="margin-left: 12.5px;">
        <button type="button" class="btn btn-light custom-btn" style="width: 12.5em;" id="refresh">Refresh</button>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/Andre-WorkShop/Workshop/Proyek/StatusOrderProyek.js') }}"></script>
@endsection
