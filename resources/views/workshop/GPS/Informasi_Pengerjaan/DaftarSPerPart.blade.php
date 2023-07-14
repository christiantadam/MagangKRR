@extends('layouts.WORKSHOP.GPS.appGPS')
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10 RDZMobilePaddingLR0">
        <div class="card">
          <div class="card-header">Jadwal Per Order
          </div>
          <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            {{-- harus sama name nya dengan nama colom tabel yang di isi --}}
            <div class="row">
              <div class="col-6">
                <div class="mb-3">
                  <label for="NoOrder" class="form-label">Nomor Order</label>
                  <div class="row">
                    <div class="col-6">
                      <input type="text" class="form-control" name="NoOrder">
                    </div>
                    <div class="col-6">
                      <input type="radio" name="pilihan" value="harian">
                      <label for="harian">Harian</label>
                      <input type="radio" name="pilihan" value="Proyek">
                      <label for="Proyek">Proyek</label>
                    </div>
                  </div>
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
                      <p for="NoGambarRev" class="form-label">Nomor Gambar Rev</p>
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
                <div class="row">
                  <div class="col-6">
                    <p style="color:black">xxxxx -> : Baru</p>

                  </div>
                  <div class="col-6">
                    <p style="color:rgb(77, 240, 246)">xxxxx -> : Finish, sudah diproses</p>
                  </div>
                </div>
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
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Sub Kategori</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Harga Baru/Satuan</th>
                  <th>Total Harga Baru</th>
                  <th>Harga Stock/Satuan</th>
                  <th>Total Harga Stock</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
            <div class="row">
              <div class="col-3">
                <div class="mb-3">
                  <input type="submit" name="refresh" value="Refresh" class="btn btn-primary">

                </div>
              </div>
              <div class="col-9">
                <label for="Total">Total Harga S/Part Rp.</label>
                <input type="text">

                <label for="Total">Total Harga Baru Rp.</label>
                <input type="text">

                <label for="Total">Total Harga bekas Rp.</label>
                <input type="text">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
