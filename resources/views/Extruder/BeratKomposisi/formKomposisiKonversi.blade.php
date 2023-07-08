@extends('layouts.appExtruder')
@section('content')

<div id="komposisi_konversi" class="form" data-aos="fade-up">
    <form action="#" method="post">

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Kode Barang:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <input type="text" class="form-control" name="kode_barang" placeholder="Kode Barang" required>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Berat Standar:</span>
            </div>
            <div class="form-group col-md-4 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="number" class="form-control" name="berat_standar" placeholder="Berat Standar" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Type:</span>
            </div>
            <div class="form-group col-md-10 mt-3 mt-md-0">
                <textarea class="form-control" name="berat_type" rows="3" placeholder="Type" required></textarea>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">PP:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="pp_gram" placeholder="PP" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="pp_persen" placeholder="PP" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">PE:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="pe_gram" placeholder="PE" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="pe_persen" placeholder="PE" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">CaCO3:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="caco3_gram" placeholder="CaCO3" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="caco3_persen" placeholder="CaCO3" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Masterbatch:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="masterbatch_gram" placeholder="Masterbatch" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="masterbatch_persen" placeholder="Masterbatch"
                        required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">UV:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="UV_gram" placeholder="UV" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="UV_persen" placeholder="UV" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Anti Static:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="anti_static_gram" placeholder="Anti Static" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="anti_static_persen" placeholder="Anti Static"
                        required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Conductive / Kertas:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="kertas_gram" placeholder="Conductive / Kertas"
                        required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="kertas_persen" placeholder="Conductive / Kertas"
                        required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">LDPE:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="ldpe_gram" placeholder="LDPE" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="ldpe_persen" placeholder="LDPE" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">LLDPE:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="lldpe_gram" placeholder="LLDPE" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="lldpe_persen" placeholder="LLDPE" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">HDPE:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="hdpe_gram" placeholder="HDPE" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="hdpe_persen" placeholder="HDPE" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Total Komposisi:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="total_gram" placeholder="Total Komposisi" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Jumlah:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="total_persen" placeholder="Total Komposisi" required>
                    <span class="input-group-text">%</span>
                </div>
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