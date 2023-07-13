@extends('layouts.appExtruder')
@section('content')

<div id="nama_form" class="form" data-aos="fade-up">
    <form>
        <div class="float-end">
            <button type="button" class="btn btn-outline-danger">KELUAR</button>
        </div>

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

        <div class="float-end">
            <button type="button" class="btn bg-transparent" style="color: white;" disabled>KELUAR</button>
        </div>

        <div class="row mt-3">

            <div class="col-lg-2">
                <span class="aligned-text">Objek:</span>
            </div>

            <div class="col-lg-8">
                <div class="input-group">
                    <input type="text" name="objek1" id="objek1" class="form-control">
                    <input type="text" name="objek2" id="objek2" class="form-control" style="width: 22.5vw;">
                    <button type="button" class="btn btn-outline-secondary">...</button>
                </div>
            </div>
        </div>

        <div class="mt-3"></div>

        <span><b>STOK SAAT INI</b></span>

        <table class="table table-hover mt-3">
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
    </form>
</div>

@endsection