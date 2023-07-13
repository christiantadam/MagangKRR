@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')

<div class="card-header">
    Maintenance Drafter
</div>

<div class="card-body">
    <form action="#">
        <div class="row">
            <div class="col-lg-2">
                <span class="custom-alignment">User Drafter:</span>
            </div>

            <div class="col-lg-4">
                <div class="input-group">
                    <input type="text" name="user_drafter" class="form-control">
                    <button type="button" class="btn btn-outline-secondary">...</button>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-2">
                <span class="custom-alignment">Nama:</span>
            </div>

            <div class="col-lg-6">
                <input type="text" name="nama" class="form-control">
            </div>
        </div>

        <div class="input-group mt-3">
            <button type="button" class="btn btn-success custom-btn-group"><u>I</u>SI</button>
            <button type="button" class="btn btn-warning custom-btn-group"><u>K</u>OREKSI</button>
            <button type="button" class="btn btn-danger custom-btn-group"><u>H</u>APUS</button>
            <button type="button" class="btn btn-primary custom-btn-group" disabled><u>P</u>ROSES</button>
            <button type="button" class="btn btn-secondary custom-btn-group"><u>K</u>ELUAR</button>
        </div>
    </form>
</div>

@endsection