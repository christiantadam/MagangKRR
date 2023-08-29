@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')
  <link href="{{ asset('css/Workshop/Transaksi/ACCDirekturGambar.css') }}" rel="stylesheet">
  @if (Session::has('success'))
    <div class="alert alert-success">
      {{ Session::get('success') }}
    </div>
  @elseif (Session::has('error'))
    <div class="alert alert-danger">
      {{ Session::get('error') }}
    </div>
  @endif
  <div class="card-header">ACC Directur</div>
  <div class="card-body RDZOverflow RDZMobilePaddingLR0">
    {{-- harus sama name nya dengan nama colom tabel yang di isi --}}
    <label for="tgl" class="form-label">Tanggal</label>
    <div class="row">
      <div class="col-6">
        <div class="row">
          <div class="col-3">
            <input type="Date" class="form-control" name="tgl" id="tgl_awal">
          </div>
          <div class="col-1">
            <p style="padding-top: 8px">s/d</p>
          </div>
          <div class="col-3">
            <input type="Date" class="form-control" name="tgl" id="tgl_akhir">
          </div>
          <div class="col-3">
            <button href="" class="btn btn-primary" id="OkACCDirekturKerja">OK</button>
          </div>
        </div>
      </div>
      <div class="col-6">
        <input type="radio" name="pilihan" value="ACC" checked>
        <label for="ACC">ACC</label>
        <input type="radio" name="pilihan" value="BatalACC">
        <label for="batal">Batal ACC</label>
        <input type="radio" name="pilihan" value="TdkSetuju">
        <label for="Tidak">Tidak Disetujui</label>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table " style="padding-top: 15px; width:max-content;" id="tableACCDirekturKerja">
        <thead class="table-dark">
          <tr>
            <th>No. Order</th>
            <th>Tgl. Order</th>
            <th>Nama Barang</th>
            <th>Kd. Barang</th>
            <th>Jumlah</th>
            <th>Status Order</th>
            <th>Divisi</th>
            <th>Mesin</th>
            <th>Keterangan Order</th>
            <th>Peng-order</th>
            <th>Ket. Ditolak</th>
            <th>Ket. Ditunda</th>
            <th>Ket. Tdk Disetujui</th>
          </tr>
        </thead>
      </table>
    </div>

    <div class="mb-3">
      <button class="btn btn-success" id="refresh">Refresh</button>
      <button class="btn btn-success" id="pilihsemua">Pilih Semua</button>

    </div>
    <div class="row">
      <div class="col-6 keterangan">
        <div class="row">
          <div class="col-lg-6">
            <span style="color: red;">xxxxx -></span>
            <span>:Sudah diACC</span><br>

            <span style="color: green;">xxxxx -></span>
            <span>Ditolak Div. Teknik</span><br>

          </div>

          <div class="col-lg-6">
            <span style="color: grey;">xxxxx -></span>
            <span>Tdk disetujui Direktur</span><br>

            <span style="color: magenta;">xxxxx -></span>
            <span>Ditunda Div. Teknik</span><br>
          </div>
        </div>
      </div>
      <div class="col-2">
        <button class="btn btn-primary"><u>P</u>roses</button>
      </div>
      <div class="col-4">
        <div class="saldo">
          <div class="row" style="padding-left: 4vh">
            <div class="col-3">
              <label for="Primer">Saldo Primer</label>
            </div>
            <div class="col-6">
              <input type="text" id="primer">
            </div>
          </div>
          <div class="row" style="padding-left: 4vh">
            <div class="col-3">
              <label for="Sekunder">Saldo Sekunder</label>
            </div>
            <div class="col-6">
              <input type="text" id="sekunder">
            </div>
          </div>
          <div class="row" style="padding-left: 4vh">
            <div class="col-3">
              <label for="Tertier">Saldo Tertier</label>
            </div>
            <div class="col-6">
              <input type="text" id="tertier">
            </div>
          </div><br>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/Andre-WorkShop/Workshop/Transaksi/ACCDirekturKerja.js') }}"></script>
@endsection
