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
                    <label for="NoOrder" class="form-label">nomor order</label>
                    <input type="text" class="form-control" name="NoOrder">
                  </div>
                  <div class="mb-3">
                    <label for="divisi" class="form-label">Divisi</label>
                    <input type="text" class="form-control" name="divisi">
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-6">
                        <p for="Kode_Barang" class="form-label">Kode Barang</p>
                        <input type="text" class="form-control" name="Kode_Barang">
                      </div>
                      <div class="col-6">
                        <p for="NoGambarRev" class="form-label">Nomor Gambar Revisi</p>
                        <input type="text" class="form-control" name="NoGambarRev">
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="NamaBarang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="NamaBarang">
                  </div>
                  <div class="mb-3">
                    <label for="Mesin" class="form-label">Mesin</label>
                    <input type="text" class="form-control" name="Mesin">
                  </div>
                  <div class="mb-3">
                    <label for="Pengorder" class="form-label">Pengorder</label>
                    <input type="text" class="form-control" name="Pengorder">
                  </div>
                  <div class="mb-3">
                    <label for="KetOrder" class="form-label">Keterangan Order</label>
                    <input type="text" class="form-control" name="KetOrder">
                  </div>
                </div>
                <div class="col-6 keterangan">
                  <p style="color:red">xxxxx -> : Emergency</p>
                  <p style="color:#fa8599">xxxxx -> : Edit EstDate/ Didelete</p>
                </div>
              </div>
              <div class="mb-3">
                {{-- width: 110vh;
    height: 7vh; --}}
                <label for="NamaBagian" class="form-label">Nama Bagian</label><br>
                <select class="form-select" name="NamaBagian" style="width: 36vh;
                height: 5vh;">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
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
              <div class="row">
                <div class="col-6">
                  <div class="mb-3">
                    <p style="color: red">Cek nomor yang mau diedit posisinya, dan cek posisi barunya.</p>
                  </div>
                  <div class="mb-3">
                    <input type="submit" name="refresh" value="Refresh" class="btn btn-primary">
                    <input type="submit" name="proses" value="Proses" class="btn btn-primary" disabled>
                  </div>
                </div>
                <div class="col-6">
                  {{-- masih blm pasti --}}
                  <form action="">
                    <div class="form-check">
                      <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1"
                        checked>
                      <label class="form-check-label" for="radio1">Tukar Posisi</label>
                    </div>
                    <div class="form-check">
                      <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                      <label class="form-check-label" for="radio2">Susun Posisi</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                  </form>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
