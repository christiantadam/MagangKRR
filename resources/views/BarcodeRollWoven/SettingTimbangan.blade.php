@extends('layouts.appABM')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <body onload="Greeting()">
        <div id="app">
            <div class="form-wrapper mt-4">
                <div class="form-container">
                    <div class="card">
                        <div class="card-header">Setting Timbangan</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                            <div class="form berat_woven">
                                <form method="post" role="form">
                                    @csrf <!-- Tambahkan token CSRF di dalam formulir -->
                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Jenis Tibangan Yang Digunakan:</span>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="d-flex align-items-center" style="justify-content: center;">
                                                    <div class="form-check form-check-inline separate">
                                                        <input class="form-check-input custom-radio" type="radio"
                                                            id="rd500" name="unit" value="kg" checked>
                                                        <label class="form-check-label rounded-circle"
                                                            for="rd500">500Kg</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input custom-radio" type="radio"
                                                            id="rd1000" name="unit" value="yard">
                                                        <label class="form-check-label rounded-circle"
                                                            for="rd1000">1000Kg</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col- row justify-content-md-center">
                                            <button type="button" id="btnSimpan" style="width: 100px">Simpan</button>
                                            <div class="text-center col-md-auto">
                                                <button type="button" id="btnKeluar" style="width: 100px">Keluar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/BarcodeRollWoven/SettingTimbangan.js') }}"></script>
@endsection
