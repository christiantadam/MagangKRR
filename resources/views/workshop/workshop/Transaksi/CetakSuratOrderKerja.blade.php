@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')
  <div class="card-header">
    Cetak Surat Order Kerja
  </div>

  <div class="card-body">
    <div class="row">
      <div class="col-lg-3">
        <span class="custom-alignment">Tgl. Order:</span>
      </div>
      <div class="col-lg-6">
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
      <table class="table mt-3" id="tableCetakOrderKerja">
        <thead class="table-dark">
          <tr>
            <th>No.Order</th>
            <th>Tgl. Order</th>
            <th>Nama Barang</th>
            <th>Kd.Brg</th>
            <th>JmlOrder</th>
            <th>Status Order</th>
            <th>Divisi</th>
            <th>Keterangan Order</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="float-start">
          <button type="button" class="btn btn-info custom-btn" id="refresh">Refresh</button>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="float-end">
          <button type="button" class="btn btn-dark custom-btn" onclick="cetak()"><u>C</u>ETAK</button>
        </div>
      </div>
    </div>
  </div>
  <form action="{{ url('CetakSuratOrderKerja') }}" method="post" id="formCetakOrderKerja">
    {{ csrf_field() }}
    <input type="hidden" name="_method" id="methodForm">
    <input type="hidden" name="noOd" id="noOd">
  </form>
  <div id="print" >
    <div class="container">
      <div class="divtable">
        <div class="row" style="border: solid 1px; place-items: center; border-bottom:0">
          <div class="col-6">
            <h5 style="font-weight: bolder; margin-top:8px;">P.T. KERTA RAJASA RAYA</h5>
          </div>
          <div class="col-6" >
            <span style="font-weight: bold">Kode Barang : </span>
            <span id="KodeBarangPrint">123231</span>
          </div>
        </div>
        <div class="row" style="place-items: center; border:solid 1px; border-bottom:0">
            <div class="col-6" style="border-right: solid 1px">
                <span style="font-weight: bold">DIVISI</span>
                <span id="NamaDivisiPrint" style="font-weight: bold">Teknik</span>
            </div>
            <div class="col-6">
                <span style="font-weight: bold">Nomer :</span>
                <span id="NomorPrint">23131</span>
            </div>
        </div>
        <div class="row" style="place-items: center; border:solid 1px; border-bottom:0">
            <div class="col-6" style="border-right: solid 1px">
                <span style="font-weight: bold">Jl. Raya Tropodo No. 1</span>
            </div>
            <div class="col-6">
                <span style="font-weight: bold">Tanggal Pesan :</span>
                <span id="TglPesanPrint">8/31/2023</span>
            </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/Andre-WorkShop/Workshop/Transaksi/CetakOrderKerja.js') }}"></script>
@endsection
