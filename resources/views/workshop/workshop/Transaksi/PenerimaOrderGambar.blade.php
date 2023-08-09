@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')
  <link href="{{ asset('css/Workshop/Transaksi/PenerimaGambar.css') }}" rel="stylesheet">
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
    Penerima Order Gambar
  </div>

  <div class="card-body">
    <form action="{{ url('PenerimaOrderGambar') }}" method="post" id="formPemerimaGambar">
        {{ csrf_field() }}
        <input type="hidden" name="_method" id="methodForm">
      <img src="{{ asset('images/Workshop.png') }}" alt="logo" class="workshop-logo">

      <div class="row">
        <div class="col-lg-6 row">

          <div class="col-lg-4">
            <span class="custom-alignment">Tgl. ACC Direktur:</span>
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
        <div class="col-lg-6">

          <div class="row d-flex justify-content-center">
            <div class="col-lg-4 content-center">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radio-terima-gambar" id="acc_order">
                <label class="form-check-label" for="radio-terima-gambar">
                  ACC Order
                </label>
              </div>
            </div>

            <div class="col-lg-4 content-center">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radio-terima-gambar" id="batal_acc">
                <label class="form-check-label" for="radio-terima-gambar">
                  Batal ACC
                </label>
              </div>
            </div>

            <div class="col-lg-4 content-center">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radio-terima-gambar" id="order_tolak">
                <label class="form-check-label" for="radio-terima-gambar">
                  Order Ditolak
                </label>
              </div>
            </div>
          </div>

          <div class="row d-flex justify-content-center mt-1">
            <div class="col-lg-4 content-center">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radio-terima-gambar" id="order_kerja">
                <label class="form-check-label" for="radio-terima-gambar">
                  Order Dikerjakan
                </label>
              </div>
            </div>

            <div class="col-lg-4 content-center">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radio-terima-gambar" id="order_selesai">
                <label class="form-check-label" for="radio-terima-gambar">
                  Order Selesai
                </label>
              </div>
            </div>

            <div class="col-lg-4 content-center">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radio-terima-gambar" id="order_batal">
                <label class="form-check-label" for="radio-terima-gambar">
                  Order Dibatalkan
                </label>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="table-responsive">
        <table class="table mt-3" style="width: max-content" id="tablepenerimagambar">
          <thead class="table-dark">
            <tr>
              <th>No. Order</th>
              <th>Tgl. Order</th>
              <th>Tgl. ACC Direktur</th>
              <th>Nama Barang</th>
              <th>NoGbrRev</th>
              <th>Jumlah</th>
              <th>Status Order</th>
              <th>Divisi</th>
              <th>Mesin</th>
              <th>Keterangan Order</th>
              <th>Peng-order</th>
            </tr>
          </thead>
        </table>
      </div>

      <div class="row mt-3">
        <div class="col-lg-6">
          <div class="keterangan keterangan-padding">
            <div class="row">
              <div class="col-lg-6">
                <span style="color: red;">xxxxx -></span>
                <span>Sudah diterima</span><br>

                <span style="color: blue;">xxxxx -></span>
                <span>Sedang dikerjakan</span><br>
              </div>

              <div class="col-lg-6">
                <span>xxxxx -> Belum Diterima</span><br>

                <span style="color: grey;">xxxxx -></span>
                <span>Ditolak</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-3">
          <div class="float-start">
            <button type="button" class="btn btn-light" id="refresh">Refresh</button>
            <button type="button" class="btn btn-info" id="pilihsemua">Pilih Semua</button>
          </div>

          <div class="float-end">
            <input type="hidden" name="semuacentang" id="semuacentang">
            <input type="hidden" name="radiobox" id="radiobox">
            <input type="hidden" name="KetTdkS" id="KetTdkS">
            <input type="hidden" name="iduser" id="iduser">
            <button type="button" class="btn btn-primary" style="width: 7.5em;" onclick="klikproses()"><b>PROSES</b></button>
            <button type="button" class="btn btn-warning">KOREKSI</button>

          </div>
        </div>
      </div>
    </form>
  </div>
  <script src="{{ asset('js/Andre-WorkShop/Workshop/Transaksi/PenerimaOrderGambar.js') }}"></script>
@endsection
