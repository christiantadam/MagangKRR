@extends('layouts.WORKSHOP.GPS.appGPS')
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10 RDZMobilePaddingLR0">
        <div class="card">
          <div class="card-header" style="font-weight: bold">Maintenance Bagian Gambar</div>
          <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <div class="row">
                <div class="col-6">
                    <form action="" method="POST">
                        @csrf
                        {{-- harus sama name nya dengan nama colom tabel yang di isi --}}
                        <div class="mb-3">
                          <label for="NoOrder" class="form-label">Nomor Order</label>
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
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="Pengorder" class="form-label">Pengorder</label>
                        <input type="text" class="form-control" name="Pengorder">
                      </div>
                      <div class="mb-3">
                        <label for="KetOrder" class="form-label">Keterangan Order</label>
                        <input type="text" class="form-control" name="KetOrder">
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
                        <input type="submit" name="isi" value="Isi" class="btn btn-primary">
                        <input type="submit" name="koreksi" value="Koreksi" class="btn btn-warning">
                        <input type="submit" name="hapus" value="Hapus" class="btn btn-danger">
                        <input type="submit" name="proses" value="Proses" class="btn btn-success">
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
