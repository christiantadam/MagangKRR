@extends('layouts.WORKSHOP.Workshop.appWorkshop')
@section('content')

<div class="card-header">
    Cetak Surat Order Proyek
</div>

<div class="card-body">
    <div class="row">
        <div class="col-lg-3">
            <span class="custom-alignment">Tgl. Order:</span>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-5">
                    <input type="Date" class="form-control" name="tgl_awal">
                </div>
                <div class="col-lg-2 d-flex justify-content-center">
                    <span style="margin-top: 5px;">s/d</span>
                </div>
                <div class="col-lg-5">
                    <input type="Date" class="form-control" name="tgl_akhir">
                </div>
            </div>
        </div>
    </div>

    <table class="table mt-3">
        <thead class="table-dark">
            <tr>
                <th>title1</th>
                <th>title2</th>
                <th>title3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>data1</td>
                <td>data2</td>
                <td>data3</td>
            </tr>
            <tr>
                <td>data1</td>
                <td>data2</td>
                <td>data3</td>
            </tr>
            <tr>
                <td>data1</td>
                <td>data2</td>
                <td>data3</td>
            </tr>
        </tbody>
    </table>

    <div class="row">
        <div class="col-lg-6">
            <div class="float-start">
                <button type="button" class="btn btn-info custom-btn">Refresh</button>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="float-end">
                <button type="button" class="btn btn-dark custom-btn"><u>C</u>ETAK</button>
            </div>
        </div>
    </div>
</div>

@endsection