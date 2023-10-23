@extends('layouts.appExtruder')

@section('title')
    Batal Kirim Barcode Kerta 2
@endsection

@section('content')
    <div id="nama_form" class="form" data-aos="fade-up">
        <div class="row mt-3">
            <div class="col-lg-2">
                <span class="aligned-text">Divisi:</span>
            </div>

            <div class="col-lg-8">
                <select id="select_divisi" class="form-select">
                    <option disabled selected>-- Pilih Divisi --</option>
                    @foreach ($formData['listDivisi'] as $d)
                        <option value="{{ $d->IdDivisi }}">{{ $d->IdDivisi . ' | ' . $d->NamaDivisi }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-2">
                <span class="aligned-text">Objek:</span>
            </div>

            <div class="col-lg-8">
                <select id="select_divisi" class="form-select">
                    <option disabled selected>-- Pilih Objek --</option>
                    {{-- @foreach ($formData['listDivisi'] as $d)
                        <option value="{{ $d->IdDivisi }}">{{ $d->IdDivisi . ' | ' . $d->NamaDivisi }}</option>
                    @endforeach --}}
                </select>
            </div>
        </div>

        <div class="mt-3"></div>

        <span>Beri tanda centang (√) pada bercode yang batal dikirim ke gudang</span>

        <div class="table-responsive">
            <table class="table table-hover" style="width: max-content">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Type</th>
                        <th>No. Barcode</th>
                        <th>Sub-Kelompok</th>
                        <th>Kelompok</th>
                        <th>Kode Barang</th>
                        <th>No. Indeks</th>
                        <th>Primer</th>
                        <th>Sekunder</th>
                        <th>Tritier</th>
                        <th>Tanggal</th>
                        <th>Divisi</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="mt-3 mb-5 float-end text-center">
            <button type="submit" class="btn btn-outline-warning" style="margin-right: 10px;">Cari</button>
            <button type="button" class="btn btn-outline-danger" style="margin-right: 10px;">Hapus</button>
            <button type="button" class="btn btn-outline-secondary" style="margin-right: 10px;">Tutup</button>
        </div>
    </div>
@endsection
