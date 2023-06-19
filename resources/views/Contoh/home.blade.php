@extends('layouts.appContoh')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Home</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <h5>
                            PROGRAM CONTOH
                            <br>
                            <img src="{{ asset('/images/cat-jump.gif') }}" alt="" class="acs-img-card">
                            <br>
                            @php
                                echo $data
                            @endphp
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
