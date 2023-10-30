@extends('layouts.WORKSHOP.GPS.appGPS')
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10 RDZMobilePaddingLR0">
        <div class="card">
          <div class="card-header">Edit Estimasi Waktu</div>
          <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <form action="" method="POST">
              @csrf
              {{-- harus sama name nya dengan nama colom tabel yang di isi --}}
              <div class="row">
                <div class="col-6">
                  {{-- width: 110vh;
                        height: 7vh; --}}
                  <label for="WorkStation" class="form-label">Work Station</label><br>
                  <select class="custom-select" name="WorkStation" style="width: 36vh;
                  height: 5vh;"
                    id="WorkStation">
                    <option disabled selected>Pilih Work Station</option>
                    @foreach ($data as $d)
                      <option value="{{ $d->NoWrkSts }}">{{ $d->NoWrkSts }} -- {{ $d->NamaWorkStation }}</option>
                    @endforeach
                  </select>
                  <br>
                  <label for="tgl" class="form-label" style="padding-top: 10px">Tanggal</label>
                  <div class="row">
                    <div class="col-6">
                      <input type="Date" class="form-control" name="tgl" id="tgl">
                    </div>
                    <div class="col-6">
                      <button type="button" class="btn btn-primary" id="btnok" disabled>OK</button>
                    </div>
                  </div>


                </div>
                <div class="col-6 keterangan">
                  <p style="color:red">xxxxx -> : Emergency</p>
                </div>
              </div>
              <div class="table-responsive" style="padding-top: 20px">
                <table class="table" id="TableEditEstimasiWaktu">
                  <thead class="table-dark">
                    <tr>
                      <th>Nomor</th>
                      <th>No Order</th>
                      <th>Tanggal Start</th>
                      <th>Divisi</th>
                      <th>Nama Barang</th>
                      <th>Nama Bagian</th>
                      <th>Est. Time</th>
                      <th>Hari ke-</th>
                      <th>Id Bagian</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <div class="mb-3">
                <label for="estimasi">Estimasi Time</label>
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-6">
                        <input type="number" class="form-control" name="jam" placeholder="jam" id="jam">
                      </div>
                      <div class="col-6">
                        <input type="number" class="form-control" name="menit" placeholder="menit" id="menit">
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                <button type="button" class="btn btn-primary" id="btnEdit">Edit</button>
                <button type="button" class="btn btn-primary" id="btnBatal">Batal</button>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <button type="button" class="btn btn-light" id="refresh">Refresh</button>
                <input type="submit" name="proses" value="Proses" class="btn btn-primary" disabled>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/Andre-WorkShop/GPS/JadwalKonstruksi/EditEstimasiWaktu.js') }}"></script>
@endsection
