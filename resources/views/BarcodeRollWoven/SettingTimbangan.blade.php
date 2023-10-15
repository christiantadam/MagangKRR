@extends('layouts.appABM')
@section('content')
<script type="text/javascript" src="{{ asset('js/BarcodeRollWoven/SettingTimbangan.js') }}"></script>

    <body onload="Greeting()">
        <div id="app">


            <div class="form-wrapper mt-4">
                <div class="form-container">
                    <div class="card">
                        <div class="card-header">Setting Timbangan</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                            <div class="form berat_woven">
                                <form action="#" method="post" role="form">
                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Jenis Tibangan Yang Digunakan:</span>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="d-flex align-items-center" style="justify-content: center;">
                                                    <div class="form-check form-check-inline seperate">
                                                        <input class="form-check-input custom-radio" type="radio"
                                                            name="unit" value="kg" checked>
                                                        <label class="form-check-label rounded-circle custom-radio"
                                                            for="kgRadio">500Kg</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input custom-radio" type="radio"
                                                            name="unit" value="yard">
                                                        <label class="form-check-label rounded-circle custom-radio"
                                                            for="yardRadio">1000Kg</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col- row justify-content-md-center">
                                            <div class="text-center col-md-auto"><button type="button" id="simpanButton"
                                                    style="width: 100px">Simpan</button></div>
                                            <div class="text-center col-md-auto"><button type="button"
                                                    style="width: 100px">Keluar</button></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <main class="py-4">
                    @yield('content')
                </main>
            </div>

    </body>
@endsection
