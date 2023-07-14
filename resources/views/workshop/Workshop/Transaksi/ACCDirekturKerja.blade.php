@extends('layouts.WORKSHOP.GPS.appGPS')
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10 RDZMobilePaddingLR0">
        <div class="card">
          <div class="card-header">ACC Directur</div>
          <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            {{-- harus sama name nya dengan nama colom tabel yang di isi --}}
            <label for="tgl" class="form-label">Tanggal</label>
            <div class="row">
              <div class="col-6">
                <div class="row">
                  <div class="col-3">
                    <input type="Date" class="form-control" name="tgl">
                  </div>
                  <p style="padding-top: 8px">s/d</p>
                  <div class="col-3">
                    <input type="Date" class="form-control" name="tgl">
                  </div>
                  <div class="col-3">
                    <a href="" class="btn btn-primary">OK</a>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <input type="radio" name="pilihan" value="ACC">
                <label for="ACC">ACC</label>
                <input type="radio" name="pilihan" value="BatalACC">
                <label for="batal">Batal ACC</label>
                <input type="radio" name="pilihan" value="TdkSetuju">
                <label for="Tidak">Tidak Disetujui</label>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table " style="padding-top: 15px; width:max-content;">
                <thead class="table-dark">
                  <tr>
                    <th>Nomor Order</th>
                    <th>Tanggal Order</th>
                    <th>Nama Barang</th>
                    <th>Kode Barang</th>
                    <th>Jumlah</th>
                    <th>Status Order</th>
                    <th>Divisi</th>
                    <th>Mesin</th>
                    <th>Keterangan Order</th>
                    <th>PengOrder</th>
                    <th>Ket. Ditolak</th>
                    <th>Ket. Ditunda</th>
                    <th>Ket. Tidak Disetujui</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>

            <div class="mb-3">
              <button class="btn btn-success">Refresh</button>
              <button class="btn btn-success">Pilih Semua</button>

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
                <button class="btn btn-primary"><u>P</u>roses</button><br>
                <button class="btn btn-danger"><u>K</u>eluar</button>
              </div>
              <div class="col-4">
                <div class="saldo">
                  <div class="row" style="padding-left: 4vh">
                    <div class="col-3">
                      <label for="Primer">Saldo Primer</label>
                    </div>
                    <div class="col-6">
                      <input type="text">
                    </div>
                  </div>
                  <div class="row" style="padding-left: 4vh">
                    <div class="col-3">
                      <label for="Sekunder">Saldo Sekunder</label>
                    </div>
                    <div class="col-6">
                      <input type="text">
                    </div>
                  </div>
                  <div class="row" style="padding-left: 4vh">
                    <div class="col-3">
                      <label for="Tertier">Saldo Tertier</label>
                    </div>
                    <div class="col-6">
                      <input type="text">
                    </div>
                  </div><br>
                </div>
              </div>
            </div>



          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
