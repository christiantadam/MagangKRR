@extends('layouts.appContoh')
@section('content')
    <div class="container-fluid">
        <link href="{{ asset('css/Contoh/contoh.css') }}" rel="stylesheet">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">PROGRAM CONTOH</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="acs-div-container">
                            <div class="acs-div-container1">
                                <div class="acs-div-filter3">
                                    <label for="uraian">Product Name</label>
                                    <div>
                                        <input type="radio" name="option_product" id="optStar">

                                    </div>
                                    <input type="radio" name="option_product" id="optStar">
                                    <input type="radio" name="option_product" id="optStar">
                                </div>
                                <div class="acs-div-filter3">
                                    <label for="uraian">Uraian</label>
                                    <input type="text" name="uraian" id="uraian" placeholder="Uraian" class="input">
                                </div>
                            </div>
                            <div class="acs-div-container2">
                                gambar
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
