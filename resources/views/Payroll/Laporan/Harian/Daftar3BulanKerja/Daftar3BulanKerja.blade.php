@extends('layouts.appPayroll')
@section('content')
<div class="form-wrapper mt-4">
        <div class="form-container">
        <div class="card">
            <div class="card-header">FrmLaporanPerPegawai</div>
            <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <div class="form berat_woven">
                <form action="#" method="post" role="form">
                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Tanggal:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="date" class="form-control" name="Tanggal" id="Tanggal" placeholder="Tanggal" required>
                            <div class="text-center col-md-auto"><button type="submit">OK</button></div>
                        </div>
                    </div>

                        <div class="card mt-auto">
                            <div class="card-header">Type</div>
                                    <table>
                                        <tr>
                                            <th>No </th>
                                            <th>Divisi </th>
                                            <th>Kode Pehawai </th>
                                            <th>Nama Pegawai </th>
                                            <th>Tgl Masuk</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        <div class="row mt-3">
                            <div class="col- row justify-content-md-center">
                                <div class="text-center col-md-auto"><button type="submit">Cetak</button></div>
                                <div class="text-center col-md-auto"><button type="submit">Keluar</button></div>
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
