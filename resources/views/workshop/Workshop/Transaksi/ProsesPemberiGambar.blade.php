@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')
  @if (Session::has('success'))
    <div class="alert alert-success">
      {{ Session::get('success') }}
    </div>
  @elseif (Session::has('error'))
    <div class="alert alert-danger">
      {{ Session::get('error') }}
    </div>
  @endif
  <div class="card-header">
    Proses Pemberi Gambar
  </div>

  <div class="card-body">
    <img src="{{ asset('images/Workshop.png') }}" alt="logo" class="workshop-logo">

    <div class="row">
      <div class="col-lg-2">
        <span class="custom-alignment">Tgl. Order:</span>
      </div>

      <div class="col-lg-5">
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

    <div class="table-responsive">
      <table class="table mt-3" style="width: max-content" id="tableProsesPembeli">
        <thead class="table-dark">
          <tr>
            <th>No. Order</th>
            <th>Tgl. Order</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Divisi</th>
            <th>Status Order</th>
            <th>Keterangan Order</th>
            <th>Peng-order</th>
            <th>No. Gambar</th>
            <th>Nm. Brg</th>
          </tr>
        </thead>
      </table>
    </div>


    <div class="mt-3">
      <form action="{{ url('ProsesPembeliGambar') }}" method="post" id="formproses">
        {{ csrf_field() }}
        <input type="hidden" name="_method" id="methodForm">
        <input type="hidden" name="nogam" id="nogam">
        <input type="hidden" name="idorder" id="idorder">
        <input type="hidden" name="gambar" id="gambar">
        <div class="float-start" style="margin-left: 12.5px;">
          <button type="button" class="btn btn-primary" style="width: 12.5em;"
            onclick="klikproses()"><b>PROSES</b></button>
          <button type="button" class="btn btn-light custom-btn" id="refresh">Refresh</button>
        </div>
      </form>

      <div class="float-end" style="margin-right: 12.5px;">
        <button type="button" class="btn btn-dark custom-btn" style="margin-right: 18vh">CETAK</button>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/Andre-WorkShop/Workshop/Transaksi/ProsesPembeliGambar.js') }}"></script>
@endsection
