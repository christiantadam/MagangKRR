@extends('layouts.appExtruder')
@section('content')

<div id="scan_gelondongan" class="form" data-aos="fade-up">
    <form>
        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="divisi">Divisi:</label>
                        <div class="input-group">
                            <input type="text" name="divisi1" id="divisi1" class="form-control">
                            <input type="text" name="divisi2" id="divisi2" class="form-control">
                            <button type="button" class="btn btn-outline-secondary">...</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4"></div>

            <div class="col-lg-2">
                <button type="button" class="btn btn-outline-secondary" disabled
                    style="height: 75px; margin-left: 25px;">0</button>
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

        <div class="mt-3 mb-5 float-end text-center">
            <button type="submit" class="btn btn-outline-success" style="margin-right: 10px;">Proses</button>
            <button type="button" class="btn btn-outline-danger" style="margin-right: 10px;">Batal Proses</button>
            <button type="button" class="btn btn-outline-secondary" style="margin-right: 10px;">Keluar</button>
        </div>
    </form>
</div>

@endsection