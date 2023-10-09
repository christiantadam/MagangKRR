@extends('layouts.WORKSHOP.GPS.appGPS')
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10 RDZMobilePaddingLR0">
        <div class="card">
          <div class="card-header">Edit Jadwal Per Order</div>
          <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <form action="" method="POST">
              @csrf
              {{-- harus sama name nya dengan nama colom tabel yang di isi --}}
              <div class="row">
                <div class="col-6">
                  <div class="mb-3">
                    <label for="NoOrder" class="form-label">Nomor Order</label>
                    <div class="row">
                      <div class="col-8">
                        <input type="text" class="form-control" name="NoOrder" id="NoOrder">
                      </div>
                      <div class="col-4">
                        <span style="color: crimson" id="OdSts"></span>
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

                </div>
                <div class="col-6">
                  <div class="mb-3">
                    <label for="Mesin" class="form-label">Mesin</label>
                    <input type="text" class="form-control" name="Mesin" id="Mesin">
                  </div>
                  <div class="mb-3">
                    <label for="Pengorder" class="form-label">Pengorder</label>
                    <input type="text" class="form-control" name="Pengorder" id="Pengorder">
                  </div>
                  <div class="mb-3">
                    <label for="KetOrder" class="form-label">Keterangan Order</label>
                    <input type="text" class="form-control" name="KetOrder" id="KetOrder">
                  </div>
                  <div class="mb-3">
                    {{-- width: 110vh;
            height: 7vh; --}}
                    <label for="NamaBagian" class="form-label">Nama Bagian</label><br>
                    <select class="form-select" name="NamaBagian"
                      style="width: 36vh;
                        height: 5vh;">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>

              </div>
              <div class="col-12 keterangan">
                <p style="color:red">xxxxx -> : Emergency</p>
                <p style="color:#fa8599">xxxxx -> : Edit EstDate/ Didelete</p>
              </div>
              <table class="table" style="padding-top: 15px">
                <thead class="table-dark">
                  <tr>
                    <th>Nomor</th>
                    <th>Tanggal Start</th>
                    <th>WorkStation</th>
                    <th>Est. Time</th>
                    <th>Hari ke-</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                    <td>wdwadw</td>
                    <td>wdawdawd</td>
                    <td>wdawdawd</td>
                  </tr>
                </tbody>
              </table>
              <div class="mb-3">
                <p style="color: red">Cek nomor yang mau diedit posisinya, dan cek posisi barunya.</p>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="mb-3">
                    <input type="submit" name="refresh" value="Refresh" class="btn btn-primary">
                  </div>
                </div>
                <div class="col-6">
                  <div class="row">
                    <div class="col-6">
                      <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1"
                        checked>
                      <label class="form-check-label" for="radio1">Tukar Posisi</label><br>
                      <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                      <label class="form-check-label" for="radio2">Susun Posisi</label>
                    </div>
                    <div class="col-6">
                      <input type="submit" name="proses" value="Proses" class="btn btn-primary " disabled>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/Andre-WorkShop/GPS/JadwalKonstruksi/EditPerOrder.js') }}"></script>
@endsection
