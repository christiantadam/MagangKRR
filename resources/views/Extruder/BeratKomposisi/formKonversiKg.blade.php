@extends('layouts.appExtruder')
@section('content')

<div id="konversi_kg" class="form" data-aos="fade-up">
    <form action="#">

        <div class="row mt-3">
            <div class="col">
                <div class="d-flex align-items-center" style="justify-content: center;">
                    <div class="form-check form-check-inline seperate">
                        <input class="form-check-input custom-radio" type="radio" name="unit" value="kg" checked>
                        <label class="form-check-label rounded-circle custom-radio" for="kgRadio">Kg</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="unit" value="yard">
                        <label class="form-check-label rounded-circle custom-radio" for="yardRadio">Yard</label>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <label for="kode_barang">Kode Barang:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="kode_barang" placeholder="Kode Barang">
                        <button class="btn btn-primary ml-2" type="submit">Proses</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Ket</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>123123</td>
                            <td>Kg</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>123123</td>
                            <td>Kg</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="col-md-2 btn btn-primary mt-3" type="submit" style="height: 100px;">Keluar</button>
        </div>

    </form>
</div>

@endsection