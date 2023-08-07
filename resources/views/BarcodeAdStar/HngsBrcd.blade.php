@extends('layouts.appBarcode')
@section('content')

<h2>Form Hanguskan Barcode</h2>

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
                        <input type="text" class="form-control" name="Divisi" id="Divsi" placeholder="Divisi" required>
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
                        <input type="text" class="form-control" name="Kelompok Utama" id="Divsi" placeholder="Kelompok Utama" required>
                        <div class="text-center col-md-auto"><button type="submit">...</button></div>
                    </div>
                </div>

                <div class="card">
                <div class="card-header">Type</div>
                <h6 class="mt-3">Beri tanda (v) pada barcode yang ingin dihanguskan</h6>
                        <table>
                            <tr>
                                <th>Type </th>
                                <th>No Barcode </th>
                                <th>Sub Kelompok </th>
                                <th>Kelompok </th>
                                <th>Kode Barang </th>
                                <th>No Indeks </th>
                                <th>Jumlah Primer </th>
                                <th>Jumlah Sekunder </th>
                                <th>Jumlah Tritier </th>
                                <th>Tanggal </th>
                                <th>User </th>
                                <th>IdType </th>
                                <th>IdTransaksi </th>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card mt-4">
                <div class="card-header">Type</div>
                <h6 class="mt-3">Daftar barcode yang akan dihanguskan</h6>
                        <table>
                            <tr>
                                <th>Type </th>
                                <th>Jumlah Primer </th>
                                <th>Jumlah Sekunder </th>
                                <th>Jumlah Tritier </th>
                                <th>IdType </th>
                                <th>Tanggal </th>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col- row justify-content-md-center">
                        <div class="text-center col-md-auto"><button type="submit">Cari</button></div>
                        <div class="text-center col-md-auto"><button type="submit">Proses</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection
