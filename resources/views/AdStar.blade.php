@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <h1 style="text-align: center">HOME</h1>
                <div class="acs-grid-container">
                        <div class="acs-card" onclick="OpenNewTab('{{ url('AdStarAdStarHome') }}');">
                            <h2 class="acs-txt-card">AD STAR</h2>
                            <img src="{{ asset('/images/AdStar.png') }}" alt="" class="acs-img-card">
                        </div>
                        <div class="acs-card" onclick="OpenNewTab('{{ url('AdStarBarcode') }}');">
                            <h2 class="acs-txt-card">JumboBag</h2>
                            <img src="{{ asset('/images/AdStar.png') }}" alt="" class="acs-img-card">
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
