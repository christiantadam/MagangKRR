@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')
  <link href="{{ asset('css/Workshop/Transaksi/PenerimaGambar.css') }}" rel="stylesheet">
  @if (Session::has('success'))
    <div class="alert alert-success">
      {{ Session::get('success') }}
    </div>
  @elseif (Session::has('error'))
    <div class="alert alert-danger">
      {{ Session::get('error') }}
    </div>
  @endif
  <div class="card-header">
    Penerima Order Kerja
  </div>

  <div class="card-body">
    <form action="{{ url('PenerimaOrderKerja') }}" method="post" id="formPemerimaOrderKerja">
      {{ csrf_field() }}
      <input type="hidden" name="_method" id="methodForm">
      <img src="{{ asset('images/Workshop.png') }}" alt="logo" class="workshop-logo">

      <div class="row">
        <div class="col-lg-6 row">
          <label for="tgl_acc_direktur" style="margin: 10px 0px 0px 10px;">Tgl. ACC Direktur:</label>
          <div class="col-lg-5">
            <input type="Date" class="form-control" name="tgl_awal" id="tgl_awal">
          </div>
          <div class="col-lg-2 d-flex justify-content-center">
            <span style="margin-top: 5px;">s/d</span>
          </div>
          <div class="col-lg-5">
            <input type="Date" class="form-control" name="tgl_akhir" id="tgl_akhir">
          </div>
        </div>

        <div class="col-lg-6">

          <div class="row d-flex justify-content-center">
            <div class="col-lg-4">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radio-terima-kerja" id="acc_order">
                <label class="form-check-label" for="radio-terima-kerja">
                  ACC Order
                </label>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radio-terima-kerja" id="batal_acc">
                <label class="form-check-label" for="radio-terima-kerja">
                  Batal ACC
                </label>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radio-terima-kerja" id="tunda">
                <label class="form-check-label" for="radio-terima-kerja">
                  Ditunda
                </label>
              </div>
            </div>
          </div>

          <div class="row d-flex justify-content-center mt-1">
            <div class="col-lg-4">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radio-terima-kerja" id="order_kerja">
                <label class="form-check-label" for="radio-terima-kerja">
                  Order Dikerjakan
                </label>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radio-terima-kerja" id="order_selesai">
                <label class="form-check-label" for="radio-terima-kerja">
                  Order Selesai
                </label>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radio-terima-kerja" id="order_batal">
                <label class="form-check-label" for="radio-terima-kerja">
                  Order Dibatalkan
                </label>
              </div>
            </div>
          </div>

          <div class="row d-flex justify-content-center mt-1">
            <div class="col-lg-4">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radio-terima-kerja" id="order_tolak">
                <label class="form-check-label" for="radio-terima-kerja">
                  Order Ditolak
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table mt-3" style="width: max-content" id="tablePenerimaOrderKerja">
          <thead class="table-dark">
            <tr>
              <th>No. Order</th>
              <th>Tgl. Order</th>
              <th>Tgl. ACC Direktur</th>
              <th>Nama Barang</th>
              <th>Kd.Barang</th>
              <th>No.Gambar</th>
              <th>Jumlah</th>
              <th>Status Order</th>
              <th>Divisi</th>
              <th>Mesin</th>
              <th>Keterangan Order</th>
              <th>PengOrder</th>
              <th>UserOd</th>
            </tr>
          </thead>
        </table>
      </div>

      <div class="row mt-3">
        <div class="col-lg-5">
          <div class="row">
            <div class="col-lg-12">
              <button type="button" class="btn btn-light" id="refresh">Refresh</button>
              <button type="button" class="btn btn-info" id="pilihsemua">Pilih Semua</button>
            </div>
          </div>

          <div class="row mt-4">
            <div class="keterangan keterangan-padding">
              <div class="row">
                <div class="col-lg-6">
                  <span style="color: red;">xxxxx -></span>
                  <span>Sudah diterima</span><br>

                  <span style="color: blue;">xxxxx -></span>
                  <span>Sedang dikerjakan</span><br>
                </div>

                <div class="col-lg-6">
                  <span>xxxxx -> Belum Diterima</span><br>

                  <span style="color: grey;">xxxxx -></span>
                  <span>Ditolak</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="row mt-5">
            <div class="col-lg-6">
              <button type="button" class="btn btn-primary w-100" onclick="klikproses()" id="btnproses"><b>PROSES</b></button>
            </div>
            <div class="col-lg-6">
              <button type="button" class="btn btn-warning w-100">KOREKSI</button>
            </div>
          </div>
        </div>

        <div>
          <input type="hidden" name="iduser" id="iduser">
          <input type="hidden" name="radiobox" id="radiobox">
          <input type="hidden" name="semuacentang" id="semuacentang">
          <input type="hidden" name="KetTdkS" id="KetTdkS">
        </div>



        <div class="col-lg-4">
          <div class="saldo saldo-padding mt-3">
            <div class="row">
              <div class="col-lg-5">
                <span class="custom-alignment">Saldo Primer:</span>
              </div>
              <div class="col-lg-7">
                <input type="text" name="saldo_primer" class="form-control">
              </div>
            </div>

            <div class="row mt-1">
              <div class="col-lg-5">
                <span class="custom-alignment">Saldo Sekunder:</span>
              </div>
              <div class="col-lg-7">
                <input type="text" name="saldo_sekunder" class="form-control">
              </div>
            </div>

            <div class="row mt-1">
              <div class="col-lg-5">
                <span class="custom-alignment">Saldo Tritier:</span>
              </div>
              <div class="col-lg-7">
                <input type="text" name="saldo_tritier" class="form-control">
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="modal fade" id="modaltunda" tabindex="-1" role="dialog" aria-labelledby="modaltundaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modaltundaLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/Andre-WorkShop/Workshop/Transaksi/PenerimaOrderKerja.js') }}"></script>
@endsection
