@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')
  <div class="card-header">
    Maintenance Order Gambar
  </div>

  <div class="card-body">
    <img src="{{ asset('images/Workshop.png') }}" alt="logo" class="workshop-logo">

    <div class="row">
      <div class="col-lg-6">

        <div class="row">
          <div class="col-lg-3">
            <span class="custom-alignment">Tgl. Order:</span>
          </div>

          <div class="col-lg-9">
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
          <div class="col-lg-3">
            <span class="custom-alignment">Divisi:</span>
          </div>

          <div class="col-lg-9">
            <select class="form-select" name="KodeDivisi" style="width: 36vh;
                        height: 6vh;"
              id="kddivisi">
              <option disabled selected>Pilih Divisi</option>
              @foreach ($divisi as $d)
                <option value="{{ $d->IdDivisi }}">{{ $d->IdDivisi }} -- {{ $d->NamaDivisi }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="table-responsive" style="margin-top: 5vh">
          <table class="table mt-3" style="width: max-content;" id="tableklik">
            <thead class="table-dark">
              <tr>
                <th>No. Order</th>
                <th>Tgl. Order</th>
                <th>Nama Barang</th>
                <th>Status Order</th>
                <th>No_Gbr_Revisi</th>
                <th>Mesin</th>
                <th>Kd. Brg</th>
              </tr>
            </thead>
            <tbody id="datatable" style="width: max-content">

            </tbody>
          </table>
        </div>

      </div>
      <div class="col-lg-6">
        <div class="div" style="text-align: -webkit-center; ">
            <span id="status" style="text-align: -webkit-center;"></span>
        </div>
        <form action="" id="formMaintenanceOrderGambar">
          {{ csrf_field() }}

          <div class="row">
            <div class="col-lg-5">
              <span class="custom-alignment">No. Order:</span>
            </div>

            <div class="col-lg-5">
              <input type="text" name="no_order" class="form-control" id="no_order">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-5">
              <span class="custom-alignment">No. Gambar Rev:</span>
            </div>

            <div class="col-lg-5">
              <input type="text" name="no_gambar_rev" class="form-control" id="no_gambar_rev">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-5">
              <span class="custom-alignment">Jumlah:</span>
            </div>

            <div class="col-lg-5">
              <div class="input-group">
                <input type="number" name="jmlh1" class="form-control" value="1" id="jmlh1">
                <input type="text" name="jmlh2" class="form-control" style="width: 7.5vw;" id="jmlh2">
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-5">
              <span class="custom-alignment">Keterangan Order:</span>
            </div>

            <div class="col-lg-7">
              <input type="text" name="keterangan_order" class="form-control" id="keterangan_order">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-5">
              <span class="custom-alignment">Peng-Order:</span>
            </div>

            <div class="col-lg-6">
              <input type="text" name="pengorder" class="form-control" id="pengorder">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-5">
              <span class="custom-alignment">ACC Manager:</span>
            </div>

            <div class="col-lg-6">
              <input type="text" name="acc_manager" class="form-control" id="acc_manager">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-5">
              <span class="custom-alignment">Manager:</span>
            </div>

            <div class="col-lg-6">
              <input type="text" name="manager" class="form-control" id="manager">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-5">
              <span class="custom-alignment">ACC Direktur:</span>
            </div>

            <div class="col-lg-6">
              <input type="text" name="acc_direktur" class="form-control" id="acc_direktur">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-5">
              <span class="custom-alignment">Tgl. tdk disetujui Manager:</span>
            </div>

            <div class="col-lg-6">
              <input type="date" name="tgl_manager" class="form-control" id="tgl_manager">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-5">
              <span class="custom-alignment">Ket. tdk disetujui Manager:</span>
            </div>

            <div class="col-lg-6">
              <input type="text" name="ket_manager" class="form-control" id="ket_manager">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-5">
              <span class="custom-alignment">Tgl. tdk disetujui Direktur:</span>
            </div>

            <div class="col-lg-6">
              <input type="date" name="tgl_direktur" class="form-control" id="tgl_direktur">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-5">
              <span class="custom-alignment">Ket. tdk disetujui Direktur:</span>
            </div>

            <div class="col-lg-6">
              <input type="text" name="ket_direktur" class="form-control" id="ket_direktur">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-5">
              <span class="custom-alignment">Tgl. Ditolak Div. Teknik:</span>
            </div>

            <div class="col-lg-6">
              <input type="date" name="tgl_teknik" class="form-control" id="tgl_teknik">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-5">
              <span class="custom-alignment">Ket. Ditolak Div. Teknik:</span>
            </div>

            <div class="col-lg-6">
              <input type="text" name="ket_teknik" class="form-control" id="ket_teknik">
            </div>
          </div>

          <div class="row mt-3 d-flex justify-content-center">
            <div class="col-lg-8 content-center">
              <div class="input-group">
                <button type="button" class="btn btn-success custom-btn">ISI</button>
                <button type="button" class="btn btn-warning custom-btn">KOREKSI</button>
                <button type="button" class="btn btn-danger custom-btn">HAPUS</button>
              </div>
            </div>
{{--
            <div class="col-lg-2 content-center">
              <button type="button" class="btn btn-secondary custom-btn">KELUAR</button>
            </div> --}}
          </div>

          <div class="keterangan keterangan-padding mt-3">
            <div class="row">
              <div class="col-lg-6">
                <span style="color: red;">xxxxx -></span>
                <span> : ACC Direktur</span><br>

                <span style="color: green;">xxxxx -></span>
                <span> : Ditolak Div. Teknik</span><br>

                <span style="color: brown;">xxxxx -></span>
                <span> : Tdk disetujui Manager</span><br>
              </div>

              <div class="col-lg-6">
                <span style="color: blue;">xxxxx -></span>
                <span> : ACC Direktur</span><br>

                <span style="color: grey;">xxxxx -></span>
                <span> : Tdk disetujui Direktur</span>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/Andre-WorkShop/Workshop/Transaksi/MaintenanceOrderGambar.js') }}"></script>
@endsection
