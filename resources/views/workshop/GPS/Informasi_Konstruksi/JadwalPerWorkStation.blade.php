@extends('layouts.WORKSHOP.GPS.appGPS')
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10 RDZMobilePaddingLR0">
        <div class="card">
          <div class="card-header">Jadwal Per WorkStation</div>
          <div class="card-body RDZOverflow RDZMobilePaddingLR0">
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
                      <label for="TypeMesin" class="form-label" style="padding-top: 10px">Type Mesin</label><br>
                      <select class="form-select" name="TypeMesin"
                        style="width: 36vh;
                              height: 5vh;">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>

                    <br>
                    <label for="tgl" class="form-label" style="padding-top: 10px">Tanggal</label>
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
                <div class="col-6 keterangan">
                    <div class="row">
                        <div class="col-6">
                            <p style="color:red">xxxxx -> : Emergency</p>
                            <p style="color:rgb(131, 20, 159)">xxxxx -> : Ditolak</p>
                            <p style="color:rgb(234, 121, 234)">xxxxx -> : Edit EstDate / diDelete</p>
                        </div>
                        <div class="col-6">
                            <p style="color:rgb(77, 240, 246)">xxxxx -> : Finish, sudah diproses</p>
                            <p style="color:rgb(2, 106, 4)">xxxxx -> : Finish, disetujui</p>
                            <p style="color:rgb(213, 163, 12)">xxxxx -> : Finish, tidak disetujui, dijadwal ulang</p>
                            <p style="color:rgb(53, 55, 198)">xxxxx -> : Finish Total</p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="table-responsive">
                  <table class="table" style="padding-top: 15px; width:max-content;">
                    <thead class="table-dark">
                      <tr>
                        <th>Nomor</th>
                        <th>No Order</th>
                        <th>Tanggal Start</th>
                        <th>Divisi</th>
                        <th>Nama Barang</th>
                        <th>Nama Bagian</th>
                        <th>Status Order</th>
                        <th>Est. Time</th>
                        <th>Hari ke-</th>
                        <th>Jadwal Proses Finish</th>
                        <th>Realtime</th>
                        <th>Keterangan</th>
                        <th>Tanggal disetujui</th>
                        <th>Keterangan tidak disetujui</th>
                        <th>Tanggal tidak disetujui</th>
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
                        <td>John</td>
                        <td>Doe</td>
                        <td>john@example.com</td>
                        <td>wdwadw</td>
                        <td>wdawdawd</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              <div class="mb-3">
                <input type="submit" name="refresh" value="Refresh" class="btn btn-primary">
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
