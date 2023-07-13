@extends('layouts.appExtruder')
@section('content')

<div id="scan_gelondongan" class="form" data-aos="fade-up">
    <form>
        <div class="row mt-3">
            <div class="col-lg-6">

                <div class="row">
                    <div class="col-lg-12">
                        <label for="divisi">Divisi</label>
                        <div class="input-group">
                            <input type="text" name="divisi1" id="divisi1" class="form-control">
                            <input type="text" name="divisi2" id="divisi2" class="form-control">
                            <button type="button" class="btn btn-outline-secondary">...</button>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-6">
                        <label for="no_barcode">No. Barcode</label>
                        <input type="text" name="no_barcode" id="no_barcode" class="form-control">
                    </div>

                    <div class="col-lg-4">
                        <span style="display: flex; margin-top: 25px;">Tekan Enter</span>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <button type="button" class="btn btn-outline-warning" style="height: -webkit-fill-available; margin-left: 25px;">Lihat<br>Data</button>
                <button type="button" class="btn btn-outline-success" style="height: -webkit-fill-available; margin-left: 25px;">Proses</button>
                <button type="button" class="btn btn-outline-danger" style="height: -webkit-fill-available; margin-left: 25px;">Keluar</button>
                <input type="number" name="temp" id="temp" value="0" style="height: -webkit-fill-available; margin-left: 25px;">
            </div>
        </div>

        <div class="mt-4">
            <span>Rekap Barcode yang diterima</span>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">temp</th>
                        <th scope="col">temp</th>
                        <th scope="col">temp</th>
                        <th scope="col">temp</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>temp</td>
                        <td>temp</td>
                        <td>temp</td>
                        <td>temp</td>
                    </tr>
                    <tr>
                        <td>temp</td>
                        <td>temp</td>
                        <td>temp</td>
                        <td>temp</td>
                    </tr>
                    <tr>
                        <td>temp</td>
                        <td>temp</td>
                        <td>temp</td>
                        <td>temp</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <span>Daftar Barcode yang diterima gudang</span>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">temp</th>
                        <th scope="col">temp</th>
                        <th scope="col">temp</th>
                        <th scope="col">temp</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>temp</td>
                        <td>temp</td>
                        <td>temp</td>
                        <td>temp</td>
                    </tr>
                    <tr>
                        <td>temp</td>
                        <td>temp</td>
                        <td>temp</td>
                        <td>temp</td>
                    </tr>
                    <tr>
                        <td>temp</td>
                        <td>temp</td>
                        <td>temp</td>
                        <td>temp</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>

@endsection