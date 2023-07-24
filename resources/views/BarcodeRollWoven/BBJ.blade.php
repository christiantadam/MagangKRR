@extends('layouts.appABM')
@section('content')
<body onload="Greeting()">
    <div id="app">


        <div class="form-wrapper mt-4">
        <div class="form-container">
        <div class="card">
            <div class="card-header">Barcode Barang Jadi</div>
            <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <div class="form berat_woven">
                <form action="#" method="post" role="form">
                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Masukan No Barcode :</span>
                        </div>
                        <div class="form-group col-md-7 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Barcode" id="Barcode" placeholder="Barcode" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">No Roll:</span>
                        </div>
                        <div class="form-group col-md-5 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Roll" id="Roll" placeholder="Roll" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Afalan:</span>
                        </div>
                        <div class="form-group col-md-5 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Afalan" id="Afalan" placeholder="Afalan" >
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col- row justify-content-md-center">
                            <div class="text-center col-md-auto"><button type="submit">Print</button></div>
                            <div class="text-center col-md-auto"><button type="submit">Keluar</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <h6 class="text-center mb-3">Lakukan Print Ulang Jika Barcode Rusak !!!</h6>
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


