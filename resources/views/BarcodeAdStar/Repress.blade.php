@extends('layouts.appBarcodeAdStar')
@section('content')

<link href="{{ asset('css/Barcode/Schedule.css') }}" rel="stylesheet">
<body onload="Greeting()">
    <div id="app">


    <div class="form-wrapper mt-4">
    <div class='form-container2'>
    <div class="card">
    <div class="card-header">FrmRepress</div>
            <div class="form-wrapper mt-4 ml-4 mr-4">
            <div class="form-container">
            <div class="card">
                        <div class="card-header">Process Awal</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form berat_woven">
                            <form action="#" method="post" role="form">
                                <div class="card">
                                    <div class="form-group">
                                        <img src="{{ asset('/images/KRR.png') }}" width="55" height="50" alt="KRR">
                                        <div class="text-center ml-5 mt-3">
                                            <a href="{{url('AdStarPermohonanPenerimaBarang')}}">
                                                <button type="button">Bon Barang</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="form-group">
                                        <img src="{{ asset('/images/KRR.png') }}" width="55" height="50" alt="KRR">
                                        <div class="text-center ml-5 mt-3">
                                            <a href="{{url('AdStarScanBarcode')}}">
                                                <button type="button">Scan Barcode</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="form-group">
                                        <img src="{{ asset('/images/KRR.png') }}" width="55" height="50" alt="KRR">
                                        <div class="text-center ml-5 mt-3">
                                            <a href="{{url('AdStarPilihJenisRepress')}}">
                                                <button type="button">Pilih Jenis Repress</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="form-wrapper mt-4 ml-4 mr-4">
            <div class="form-container">
            <div class="card">
                        <div class="card-header">Buat Barcode</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form berat_woven">
                            <form action="#" method="post" role="form">
                                <div class="card">
                                    <div class="form-group">
                                    <img src="{{ asset('/images/KRR.png') }}" width="55" height="50" alt="KRR">
                                    <div class="text-center ml-5 mt-3">
                                        <a href="{{url('AdStarBalJadiPalet')}}">
                                            <button type="button">Bal Jadi Palet</button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                                <div class="card">
                                    <div class="form-group">
                                    <img src="{{ asset('/images/KRR.png') }}" width="55" height="50" alt="KRR">
                                    <div class="text-center ml-5 mt-3">
                                        <a href="{{url('AdStarPaletJadiBal')}}">
                                            <button type="button">Palet Jadi Bal</button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                                <div class="card">
                                    <div class="form-group">
                                    <img src="{{ asset('/images/KRR.png') }}" width="55" height="50" alt="KRR">
                                    <div class="text-center ml-5 mt-3">
                                        <a href="{{url('AdStarKonversi')}}">
                                            <button type="button">Konversi</button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                                <div class="card">
                                    <div class="form-group">
                                    <img src="{{ asset('/images/KRR.png') }}" width="55" height="50" alt="KRR">
                                    <div class="text-center ml-5 mt-3">
                                        <a href="{{url('AdStarPrintUlang')}}">
                                            <button type="button">Print Ulang</button>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                <div class="row mt-3">
                    <div class="col- row justify-content-md-center">
                        <div class="text-center col-md-auto mb-3"><button type="submit">Keluar</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        $(document).ready(function() {
            $('.dropdown-submenu a.test').on("click", function(e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });
    </script>
</body>
<script src="{{ asset('js\Barcode.js\Repress.js')}}"></script>
@endsection
