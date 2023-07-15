@extends('layouts.appABM')
@section('content')
<body onload="Greeting()">
    <div id="app">

    <div class="form-wrapper mt-4">
    <div class='form-container2'>
    <div class="card">
    <div class="card-header">Mutasi Satu Divisi</div>
            <div class="form-wrapper mt-4">
            <div class="form-container">
            <div class="card">
                        <div class="card-header">Buat Barcode</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form berat_woven">
                            <form action="#" method="post" role="form">
                                <div class="card">
                                    <div class="form-group">
                                    <img src="{{ asset('/images/KRR.png') }}" width="55" height="50" alt="KRR">
                                        <span class="ml-5">Scan Barcode</span>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="form-group">
                                    <img src="{{ asset('/images/KRR.png') }}" width="55" height="50" alt="KRR">
                                        <span class="ml-5">Permohonan</span>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="form-group">
                                    <img src="{{ asset('/images/KRR.png') }}" width="55" height="50" alt="KRR">
                                        <span class="ml-5">ACC</span>
                                    </div>
                                </div>
                            </form>
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
@endsection
