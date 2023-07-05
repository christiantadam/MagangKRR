@extends('layouts.WORKSHOP.GPS.appGPS')
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10 RDZMobilePaddingLR0">
        <div class="card">
          <div class="card-header" style="font-weight: bold">Input Jadwal Produksi</div>
          <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <div class="row">
              <div class="col-6">
                <form action="" method="POST">
                  @csrf
                  {{-- harus sama name nya dengan nama colom tabel yang di isi --}}
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
              <div class="col-6">
                <div class="row">
                  <div class="col-6">
                    <label for="estStart" class="form-label">est. Start</label>
                  </div>
                  <div class="col-6">
                    <label for="estFinish" class="form-label">est. Finish</label>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="NamaBagian" class="form-label">Nama Bagian</label><br>
                  <select class="form-select" name="NamaBagian" style="width: 36vh;
                    height: 5vh;">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="WorkStation" class="form-label">Work Station</label><br>
                  <select class="form-select" name="WorkStation" style="width: 36vh;
                    height: 5vh;">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="tglStart" class="form-label">Tanggal Start</label>
                  <input type="Date" class="form-control" name="tglStart">
                </div>
                <div class="mb-3">
                  <label for="hariKe" class="form-label">Hari Ke</label>
                  <input type="number" class="form-control" name="hariKe">
                </div>
                <div class="mb-3">
                  <label for="estWaktu" class="form-label">Estimasi Waktu</label>
                  <div class="row">
                    <div class="col-6">
                      <input type="number" class="form-control" name="jam" placeholder="jam">
                    </div>
                    <div class="col-6">
                      <input type="number" class="form-control" name="menit" placeholder="menit">
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <input type="submit" name="batal" value="Batal" class="btn btn-primary">
                  <input type="submit" name="proses" value="Proses" class="btn btn-primary" disabled>
                </div>
                </form>
              </div>
            </div>



          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
