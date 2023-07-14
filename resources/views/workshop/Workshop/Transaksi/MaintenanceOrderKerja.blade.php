@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')
  <div class="card-header">
    Maintenance Order Kerja
  </div>
  <div class="card-body">
    <div class="mb-3">
      <label for="Tanggal">Tanggal</label>
    </div>
    <div class="mb-3">
      <input type="Date">
      <label for="sd">s/d</label>
      <input type="Date">
    </div>
    <div class="mb-3">
      <label for="divisi">Divisi</label>
      <select class="form-select" name="NamaMesin" style="width: 36vh;
                height: 6vh;">
        <option selected="">Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="table-responsive">
          <table class="table table-hover mt-3" style="width: max-content">
            <thead>
              <tr>
                <th>Nomor Order</th>
                <th>Tanggal Order</th>
                <th>Nama Barang</th>
                <th>Status Order</th>
                <th>Nomor Gambar</th>
                <th>Mesin</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>temp</td>
                <td>temp</td>
                <td>temp</td>
                <td>temp</td>
                <td>temp</td>
                <td>temp</td>
              </tr>
              <tr>
                <td>temp</td>
                <td>temp</td>
                <td>temp</td>
                <td>temp</td>
                <td>temp</td>
                <td>temp</td>
              </tr>
              <tr>
                <td>temp</td>
                <td>temp</td>
                <td>temp</td>
                <td>temp</td>
                <td>temp</td>
                <td>temp</td>
              </tr>
            </tbody>
          </table>

        </div>
        <div class="mb-3">
            <button class="btn btn-success">Refresh</button>
        </div>
      </div>
      <div class="col-lg-6">

        <div class="row">
          <div class="col-lg-5">
            <span class="custom-alignment">No. Order:</span>
          </div>

          <div class="col-lg-5">
            <input type="text" name="no_order" class="form-control">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-5">
            <span class="custom-alignment">Kode Barang:</span>
          </div>

          <div class="col-lg-5">
            <input type="text" name="Kode_Barang" class="form-control">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-5">
            <span class="custom-alignment">Nomor Gambar:</span>
          </div>

          <div class="col-lg-5">
            <input type="text" name="Nomor_Gambar" class="form-control">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-5">
            <span class="custom-alignment">Jumlah:</span>
          </div>

          <div class="col-lg-5">
            <div class="input-group">
              <input type="number" name="jmlh1" class="form-control" value="1">
              <input type="text" name="jmlh2" class="form-control" style="width: 7.5vw;">
            </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-5">
            <span class="custom-alignment">Keterangan Order:</span>
          </div>

          <div class="col-lg-7">
            <input type="text" name="keterangan_order" class="form-control">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-5">
            <span class="custom-alignment">Peng-Order:</span>
          </div>

          <div class="col-lg-6">
            <input type="text" name="pengorder" class="form-control">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-5">
            <span class="custom-alignment">ACC Manager:</span>
          </div>

          <div class="col-lg-6">
            <input type="text" name="acc_manager" class="form-control">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-5">
            <span class="custom-alignment">Manager:</span>
          </div>

          <div class="col-lg-6">
            <input type="text" name="manager" class="form-control">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-5">
            <span class="custom-alignment">ACC Direktur:</span>
          </div>

          <div class="col-lg-6">
            <input type="text" name="acc_direktur" class="form-control">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-5">
            <span class="custom-alignment">Tgl. tdk disetujui Manager:</span>
          </div>

          <div class="col-lg-6">
            <input type="date" name="tgl_manager" class="form-control">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-5">
            <span class="custom-alignment">Ket. tdk disetujui Manager:</span>
          </div>

          <div class="col-lg-6">
            <input type="text" name="ket_manager" class="form-control">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-5">
            <span class="custom-alignment">Tgl. tdk disetujui Direktur:</span>
          </div>

          <div class="col-lg-6">
            <input type="date" name="tgl_direktur" class="form-control">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-5">
            <span class="custom-alignment">Ket. tdk disetujui Direktur:</span>
          </div>

          <div class="col-lg-6">
            <input type="text" name="ket_direktur" class="form-control">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-5">
            <span class="custom-alignment">Tgl. Ditolak Div. Teknik:</span>
          </div>

          <div class="col-lg-6">
            <input type="date" name="tgl_teknik" class="form-control">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-5">
            <span class="custom-alignment">Ket. Ditolak Div. Teknik:</span>
          </div>

          <div class="col-lg-6">
            <input type="text" name="ket_teknik" class="form-control">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-5">
            <span class="custom-alignment">Ket. Ditunda Div. Teknik:</span>
          </div>

          <div class="col-lg-6">
            <input type="text" name="tunda_teknik" class="form-control">
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

          <div class="col-lg-2 content-center">
            <button type="button" class="btn btn-secondary custom-btn">KELUAR</button>
          </div>
        </div>
        <br>
        <div class="keterangan">
            <div class="row">
                <div class="col-lg-6">
                  <span style="color: red;">xxxxx -></span>
                  <span>ACC Direktur</span><br>

                  <span style="color: magenta;">xxxxx -></span>
                  <span>Ditunda Div. Teknik</span><br>

                  <span style="color: green;">xxxxx -></span>
                  <span>Ditolak Div. Teknik</span><br>

                </div>

                <div class="col-lg-6">
                  <span style="color: blue;">xxxxx -></span>
                  <span>ACC Direktur</span><br>

                  <span style="color: grey;">xxxxx -></span>
                  <span>Tdk disetujui Direktur</span><br>

                  <span style="color: brown;">xxxxx -></span>
                  <span>Tdk disetujui Manager</span><br>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>
@endsection
