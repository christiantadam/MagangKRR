@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')

<div class="card-header">
    <!-- Judul form -->
</div>

<div class="card-body">
    <img src="{{ asset('images/Workshop.png') }}" alt="logo" class="workshop-logo">

    <!-- Isi form -->
</div>

@endsection

<!-- TEMPLATE TABLE -->
<table class="table table-hover mt-3">
    <thead>
        <tr>
            <th scope="col">title1</th>
            <th scope="col">title2</th>
            <th scope="col">title3</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>temp</td>
            <td>temp</td>
            <td>temp</td>
        </tr>
        <tr>
            <td>temp</td>
            <td>temp</td>
            <td>temp</td>
        </tr>
        <tr>
            <td>temp</td>
            <td>temp</td>
            <td>temp</td>
        </tr>
    </tbody>
</table>

<!-- TEMPLATE RADIO BUTTONS -->
<div class="row d-flex justify-content-center">
    <div class="col-lg-3 content-center">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="radio-acc-manager-gambar" id="acc">
            <label class="form-check-label" for="radio-acc-manager-gambar">
                ACC
            </label>
        </div>
    </div>

    <div class="col-lg-3 content-center">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="radio-acc-manager-gambar" id="batal_acc">
            <label class="form-check-label" for="radio-acc-manager-gambar">
                Batal ACC
            </label>
        </div>
    </div>

    <div class="col-lg-4 content-center">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="radio-acc-manager-gambar" id="tdk_setuju">
            <label class="form-check-label" for="radio-acc-manager-gambar">
                Tdk disetujui
            </label>
        </div>
    </div>
</div>

<!-- TEMPLATE KETERANGAN -->
<div class="card card-keterangan mt-3" style="background: lightyellow;">
    <div class="card-header">Keterangan</div>

    <div class="card-body row">
        <div class="col-lg-6">
            <span style="color: red;">xxxxx -></span>
            <span>ACC Direktur</span><br>

            <span style="color: green;">xxxxx -></span>
            <span>Ditolak Div. Teknik</span><br>

            <span style="color: brown;">xxxxx -></span>
            <span>Tdk disetujui Manager</span><br>
        </div>

        <div class="col-lg-6">
            <span style="color: blue;">xxxxx -></span>
            <span>Sudah di-ACC</span><br>

            <span style="color: grey;">xxxxx -></span>
            <span>Tdk disetujui Direktur</span>
        </div>
    </div>
</div>