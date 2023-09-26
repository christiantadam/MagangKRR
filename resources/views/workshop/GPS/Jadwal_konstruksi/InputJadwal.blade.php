@extends('layouts.WORKSHOP.GPS.appGPS')
@section('content')
  <div class="container-fluid">
    @if (Session::has('success'))
      <div class="alert alert-success">
        {{ Session::get('success') }}
      </div>
    @elseif (Session::has('error'))
      <div class="alert alert-danger">
        {{ Session::get('error') }}
      </div>
    @endif
    <div class="row justify-content-center">
      <div class="col-md-10 RDZMobilePaddingLR0">
        <div class="card">
          <div class="card-header">Input Jadwal Produksi</div>
          <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <div class="row">
              <div class="col-6">
                <form action="" method="POST">
                  @csrf

                  {{-- harus sama name nya dengan nama colom tabel yang di isi --}}
                  <div class="mb-3">
                    <label for="NoOrder" class="form-label">Nomor Order</label>
                    <div class="row">
                        <div class="col">
                          <input type="text" class="form-control" name="NoOrder" id="NoOrder">
                        </div>
                        <div class="col" style="align-self: center;">
                          <span id="OdSts"></span>
                        </div>
                      </div>
                  </div>
                  <div class="mb-3">
                    <label for="divisi" class="form-label">Divisi</label>
                    <input type="text" class="form-control" name="divisi" id="divisi" readonly>
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-6">
                        <p for="Kode_Barang" class="form-label">Kode Barang</p>
                        <input type="text" class="form-control" name="Kode_Barang" id="Kode_Barang" readonly>
                      </div>
                      <div class="col-6">
                        <p for="NoGambarRev" class="form-label">Nomor Gambar Revisi</p>
                        <input type="text" class="form-control" name="NoGambarRev" id="NoGambarRev" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="NamaBarang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="NamaBarang" id="NamaBarang" readonly>
                  </div>
                  <div class="mb-3">
                    <label for="Mesin" class="form-label">Mesin</label>
                    <input type="text" class="form-control" name="Mesin" id="Mesin" readonly>
                  </div>
                  <div class="mb-3">
                    <label for="Pengorder" class="form-label">Pengorder</label>
                    <input type="text" class="form-control" name="Pengorder" id="Pengorder" readonly>
                  </div>
                  <div class="mb-3">
                    <label for="KetOrder" class="form-label">Keterangan Order</label>
                    <input type="text" class="form-control" name="KetOrder" id="KetOrder" readonly>
                  </div>

              </div>
              <div class="col-6">
                <div class="row">
                  <div class="col-6">
                    <label for="estStart" class="form-label" style="color: red">est. Start <span id="estStart" style="color: red"></span></label>
                  </div>
                  <div class="col-6">
                    <label for="estFinish" class="form-label" style="color: red">est. Finish <span id="estFinish" style="color: red"></span></label>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="NamaBagian" class="form-label">Nama Bagian</label><br>
                  <select class="custom-select" name="NamaBagian" style="width: 36vh;
                    height: 5vh;" id="NamaBagian" disabled>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="WorkStation" class="form-label">Work Station</label><br>
                  <select class="custom-select" name="WorkStation" style="width: 36vh;
                    height: 5vh;" id="WorkStation" disabled>
                    <option disabled selected>Pilih Work Station</option>
                    @foreach ($data as $d)
                      <option value="{{ $d->NoWrkSts }}">{{ $d->NoWrkSts }} -- {{ $d->NamaWorkStation }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="tglStart" class="form-label">Tanggal Start</label>
                  <input type="Date" class="form-control" name="tglStart" id="tglStart" disabled>
                </div>
                <div class="mb-3">
                  <label for="hariKe" class="form-label">Hari Ke</label>
                  <input type="number" class="form-control" name="hariKe" id="hariKe" disabled>
                </div>
                <div class="mb-3">
                  <label for="estWaktu" class="form-label">Estimasi Waktu</label>
                  <div class="row">
                    <div class="col-6">
                      <input type="number" class="form-control" name="jam" placeholder="jam" id="jam" disabled>
                    </div>
                    <div class="col-6">
                      <input type="number" class="form-control" name="menit" placeholder="menit" id="menit" disabled>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-danger" id="batal" type="button" disabled>Batal</button>
                    <button class="btn btn-primary" id="proses" type="button" disabled>Proses</button>
                </div>
                </form>
              </div>
            </div>



          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/Andre-WorkShop/GPS/JadwalKonstruksi/InputJadwal.js') }}"></script>
@endsection
