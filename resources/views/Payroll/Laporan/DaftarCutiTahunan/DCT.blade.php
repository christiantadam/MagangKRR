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
                            <span class="aligned-text">Tahun:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Tahun" id="Tahun" placeholder="Tahun" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Divisi:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Divisi" id="Divisi" placeholder="Divisi" required>
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
