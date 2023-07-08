@extends('layouts.appExtruder')
@section('content')

<div id="update_persen" class="form" data-aos="fade-up">
    <form action="#" method="post" role="form">

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Kode Barang:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="text" class="form-control" name="kode_barang" placeholder="Kode Barang" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Nama Barang:</span>
            </div>
            <div class="form-group col-md-10 mt-3 mt-md-0">
                <textarea class="form-control" name="nama_barang" rows="3" placeholder="Nama Barang" required></textarea>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Persen Atas:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="number" class="form-control" name="persen_atas" placeholder="Persen Atas" required>
            </div>
            <div class="form-group col-md-4 d-flex">
                <span class="aligned-text" style="color: red;"><i>Persen atas harus positif</i></span>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Persen Bawah:</span>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="number" class="form-control" name="persen_bawah" placeholder="Berat Lain" required>
            </div>
            <div class="form-group col-md-4 d-flex">
                <span class="aligned-text" style="color: red;"><i>Persen bawah harus negatif</i></span>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Alasan:</span>
            </div>
            <div class="form-group col-md-10 mt-3 mt-md-0">
                <textarea class="form-control" name="alasan" rows="3" placeholder="Alasan" required></textarea>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-9 row justify-content-md-center">
                <div class="text-center col-md-auto"><button type="submit">Koreksi</button></div>
                <div class="text-center col-md-auto"><button type="submit">Batal</button></div>
                <div class="text-center col-md-auto"><button type="submit">Proses</button></div>
            </div>

            <div class="text-center col-3"><button type="submit">Keluar</button></div>
        </div>

    </form>
</div>

@endsection