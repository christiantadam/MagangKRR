@extends('layouts.WORKSHOP.GPS.appGPS')
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
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10 RDZMobilePaddingLR0">
        <div class="card">
          <div class="card-header">Estimasi Jadwal</div>
          <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <form id="FormEstimasiJadwal" action="{{ url('estimasiJadwal') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="_method" id="methodForm">
              <div class="row">
                <div class="col-6">
                  <div class="mb-3">
                    <label for="NoOrder" class="form-label">Nomor Order</label>
                    <div class="row">
                      <div class="col">
                        <input type="text" class="form-control" name="NoOrder" id="NoOrder">
                      </div>
                      <div class="col">
                        <span id="OdSts"></span>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="divisi" class="form-label">Divisi</label>
                    <input type="text" class="form-control" name="divisi" id="divisi">
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-6">
                        <p for="Kode_Barang" class="form-label">Kode Barang</p>
                        <input type="text" class="form-control" name="Kode_Barang" id="Kode_Barang">
                      </div>
                      <div class="col-6">
                        <p for="NoGambarRev" class="form-label">Nomor Gambar Revisi</p>
                        <input type="text" class="form-control" name="NoGambarRev" id="NoGambarRev">
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="NamaBarang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="NamaBarang" id="NamaBarang">
                  </div>
                  <div class="mb-3">
                    <label for="Mesin" class="form-label">Mesin</label>
                    <input type="text" class="form-control" name="Mesin" id="Mesin">
                  </div>
                </div>
                <div class="col-6">
                  <div class="mb-3">
                    <label for="Pengorder" class="form-label">Pengorder</label>
                    <input type="text" class="form-control" name="Pengorder" id="Pengorder">
                  </div>
                  <div class="mb-3">
                    <label for="KetOrder" class="form-label">Keterangan Order</label>
                    <input type="text" class="form-control" name="KetOrder" id="KetOrder">
                  </div>
                  <div class="mb-3">
                    <label for="TglStart" class="form-label">Tanggal Start</label>
                    <input type="Date" class="form-control" name="TglStart" id="TglStart">
                  </div>
                  <div class="mb-3">
                    <label for="TglFinish" class="form-label">Tanggal Finish</label>
                    <input type="Date" class="form-control" name="TglFinish" id="TglFinish">
                  </div>
            </form>

            <div class="mb-3">
              <button class="btn btn-primary" id="Isi" onclick="isi()" type="button">Isi</button>
              <button id="Koreksi" class="btn btn-warning" type="button">Koreksi</button>
              <button id="Hapus" class="btn btn-danger" type="button">Hapus</button>
              <button  type="button" id="Proses" class="btn btn-success" onclick="Prosesdiklik()">Proses</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>
  </div>
  <script src="{{ asset('js/Andre-WorkShop/GPS/JadwalKonstruksi/EstimasiJadwal.js') }}"></script>
@endsection
