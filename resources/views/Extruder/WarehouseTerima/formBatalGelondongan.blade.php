@extends('layouts.appExtruder')
@section('content')
    <div id="nama_form" class="form" data-aos="fade-up">
        <form>
            <div class="row mt-3">

                <div class="col-lg-2">
                    <span class="aligned-text">Divisi:</span>
                </div>

                <div class="col-lg-8">
                    <div class="input-group">
                        <input type="text" name="divisi1" id="divisi1" class="form-control">
                        <input type="text" name="divisi2" id="divisi2" class="form-control" style="width: 22.5vw;">
                        <button type="button" class="btn btn-outline-secondary">...</button>
                    </div>
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
        </form>
    </div>
@endsection
