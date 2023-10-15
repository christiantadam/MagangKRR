@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <h1 style="text-align: center">HOME</h1>
                <div class="acs-grid-container">
                     <div class="acs-card" onclick="OpenNewTab('{{ url('ABM') }}');">
                            <h2 class="acs-txt-card">ABM</h2>
                            <img src="{{ asset('/images/ABM.png') }}" alt="" class="acs-img-card">
                        </div>
                        <div class="acs-card" onclick="OpenNewTab('{{ url('Accounting') }}');">
                            <h2 class="acs-txt-card">ACCOUNTING</h2>
                            <img src="{{ asset('/images/Accounting.png') }}" alt="" class="acs-img-card">
                        </div>
                        <div class="acs-card" onclick="OpenNewTab('{{ url('AdStar') }}');">
                            <h2 class="acs-txt-card">AD STAR</h2>
                            <img src="{{ asset('/images/AdStar.png') }}" alt="" class="acs-img-card">
                        </div>
                        <div class="acs-card" onclick="OpenNewTab('{{ url('Extruder') }}');">
                            <h2 class="acs-txt-card">EXTRUDER</h2>
                            <img src="{{ asset('/images/Extruder.png') }}" alt="" class="acs-img-card">
                        </div>
                        <div class="acs-card" onclick="OpenNewTab('{{ url('Payroll') }}');">
                            <h2 class="acs-txt-card">PAYROLL</h2>
                            <img src="{{ asset('/images/Payroll.png') }}" alt="" class="acs-img-card">
                        </div>
                        <div class="acs-card" onclick="OpenNewTab('{{ url('Workshop') }}');">
                            <h2 class="acs-txt-card">WORKSHOP</h2>
                            <img src="{{ asset('/images/Workshop.png') }}" alt="" class="acs-img-card">
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
