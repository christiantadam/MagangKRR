@extends('layouts.appAdStar')
@section('content')

<h2>Form Batal Kirim Gudang</h2>

<div class="form-wrapper mt-4">
    <div class="form-container">
    <div class="card">
        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
        <div class="form berat_woven">
            <form action="#" method="post" role="form">
                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Divisi:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Divisi" id="Divisi" placeholder="Divisi" required>
                        <div class="text-center col-md-auto"><button type="submit">...</button></div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Objek:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Objek" id="Objek" placeholder="Objek" required>
                        <div class="text-center col-md-auto"><button type="submit">...</button></div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Kelompok Utama:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Kelompok_Utama" id="Kelompok_Utama" placeholder="Kelompok Utama" required>
                        <div class="text-center col-md-auto"><button type="submit">...</button></div>
                    </div>
                </div>

                <div class="card mt-4">
                <h5 class="mt-3">Rekap Barcode Yang Dikirim</h5>
                        <table>
                            <tr>
                                <th>Tanggal </th>
                                <th>Type </th>
                                <th>Shift </th>
                                <th>Primer </th>
                                <th>Sekunder </th>
                                <th>Tertier </th>
                                <th>IdType</th>
                                <th>-</th>
                            </tr>
                        </table>
                    </div>
                </div>




                <div class="row mt-3">
                    <div class="col- row justify-content-md-center">
                        <div class="text-center col-md-auto"><button type="submit">Cari</button></div>
                        <div class="text-center col-md-auto"><button type="submit">Hapus</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection
