@extends('layouts.appPayroll')
@section('content')
<div class="form-wrapper mt-4">
        <div class="form-container">
        <div class="card">
            <div class="card-header">FrmLaporanPerDivisi</div>
            <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <div class="form berat_woven">
                <form action="#" method="post" role="form">
                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Manager:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Manager" id="Manager" placeholder="Manager" required>
                            <div class="text-center col-md-auto"><button type="submit">...</button></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Divisi:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Divisi" id="Divisi" placeholder="Divisi" required>
                            <div class="text-center col-md-auto"><button type="submit">...</button></div>
                            <div class="text-center col-md-auto"><button type="submit">Clear</button></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Periode:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="date" class="form-control" name="Periode" id="Periode" placeholder="Periode" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text mt-3">Jenis Tibangan Yang Digunakan:</span>
                        </div>
                        <div class="row mt-3">
                        <div class="col">
                            <div class="d-flex align-items-center" style="justify-content: center;">
                                <div class="form-check form-check-inline seperate">
                                    <input class="form-check-input custom-radio" type="radio" name="unit" value="kg" checked>
                                    <label class="form-check-label rounded-circle custom-radio" for="kgRadio">Daftar THR</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input custom-radio" type="radio" name="unit" value="yard">
                                    <label class="form-check-label rounded-circle custom-radio" for="yardRadio">Tanda Terima THR</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input custom-radio" type="radio" name="unit" value="yard">
                                    <label class="form-check-label rounded-circle custom-radio" for="yardRadio">Rekap THR</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input custom-radio" type="radio" name="unit" value="yard">
                                    <label class="form-check-label rounded-circle custom-radio" for="yardRadio">Slip THR</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input custom-radio" type="radio" name="unit" value="yard">
                                    <label class="form-check-label rounded-circle custom-radio" for="yardRadio">Daftar GoodWill</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input custom-radio" type="radio" name="unit" value="yard">
                                    <label class="form-check-label rounded-circle custom-radio" for="yardRadio">Rekap GoodWill</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col- row justify-content-md-center">
                            <div class="text-center col-md-auto"><button type="submit">Tampil</button></div>
                            <div class="text-center col-md-auto"><button type="submit">Keluar</button></div>
                        </div>
                    </div>

                    

                    <div class="form-container">
                        <div class="card mt-4">
                            <div class="card-header">Pdf Viewer</div>
                            <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                            <div class="form berat_woven">
                                <form action="#" method="post" role="form">
                                </div>
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