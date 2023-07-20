@extends('layouts.appAdStar')
@section('content')

<h2>Form Daftar Palet</h2>

<div class="form-wrapper mt-4">
    <div class="form-container">
    <div class="card">
        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
        <div class="form berat_woven">
            <form action="#" method="post" role="form">
                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Kelompok Utama :</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Kel_Utm" id="kel_utm" placeholder="Kelompok Utama" required>
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
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Shift :</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="shift" id="shift" placeholder="shift" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <input type="checkbox" id="opsi2" name="opsi" value="opsi2">Repress
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Bal:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Bal" id="Bal" placeholder="Bal">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Lembar:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Lembar" id="Lembar" placeholder="Lembar">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Kg:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Kg" id="Kg" placeholder="Kg">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col- row justify-content-md-center">
                        <div class="text-center col-md-auto"><button type="submit">Cetak Barcode</button></div>
                        <div class="text-center col-md-auto"><button type="submit">ACC Barcode</button></div>
                        <div class="text-center col-md-auto"><button type="submit">Hapus</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection
