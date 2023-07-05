@extends('layouts.WORKSHOP.GPS.appGPS')
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10 RDZMobilePaddingLR0">
        <div class="card">
          <div class="card-header">Edit Per Mesin</div>
          <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <form action="" method="POST">
              @csrf
              {{-- harus sama name nya dengan nama colom tabel yang di isi --}}
              <div class="row">
                <div class="col-6">
                  {{-- width: 110vh;
                        height: 7vh; --}}

                    <label for="NamaMesin" class="form-label">Nama Mesin</label><br>
                    <select class="form-select" name="NamaMesin"
                      style="width: 36vh;
                            height: 5vh;">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select><br>
                    <label for="TypeMesin" class="form-label">Type Mesin</label><br>
                    <select class="form-select" name="TypeMesin"
                      style="width: 36vh;
                            height: 5vh;">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>

                  <br>
                  <label for="tgl" class="form-label">Tanggal</label>
                  <div class="row">
                    <div class="col-6">
                      <input type="Date" class="form-control" name="tgl">
                    </div>
                    <div class="col-6">
                      <a href="" class="btn btn-primary">OK</a>
                    </div>
                  </div>


                </div>
                <div class="col-6 keterangan">
                  <p style="color:red">xxxxx -> : Emergency</p>
                  <p style="color:#fa8599">xxxxx -> : Edit EstDate/ Didelete</p>
                </div>
              </div>
              <table class="table" style="padding-top: 15px">
                <thead class="table-dark">
                  <tr>
                    <th>Nomor</th>
                    <th>No Order</th>
                    <th>Tanggal Start</th>
                    <th>Barang</th>
                    <th>Kode Barang</th>
                    <th>Est. Time</th>
                    <th>Divisi</th>
                    <th>Jumlah Order</th>
                    <th>Bagian</th>
                    <th>Jumlah dikerjakan</th>
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
                    <td>wdawd</td>
                    <td>wadawdaw</td>
                    <td>wdawdawd</td>
                    <td>wdawd</td>
                  </tr>
                </tbody>
              </table>
              <div class="mb-3">
                <p style="color: red">Cek nomor kerja yang mau diedit posisinya, dan cek posisi barunya</p>
              </div>
              <div class="mb-3">
                <input type="submit" name="refresh" value="Refresh" class="btn btn-primary">
                <input type="submit" name="proses" value="Proses" class="btn btn-primary" disabled>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
