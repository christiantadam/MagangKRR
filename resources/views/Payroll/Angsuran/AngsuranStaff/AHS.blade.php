@extends('layouts.appPayroll')
@section('content')
<div class="form-wrapper mt-4">
        <div class="form-container">
        <div class="card">
            <div class="card-header">Angsuran Hut Staff</div>
            <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <div class="form berat_woven">
                <form action="#" method="post" role="form">
                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Tanggal:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="date" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman" placeholder="Divisi Pengiriman" required>
                            <div class="text-center col-md-auto"><button type="submit">List Data</button></div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Divisi:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman" placeholder="Divisi Pengiriman" required>
                            <div class="text-center col-md-auto"><button type="submit">...</button></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Kode Pegawai:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Kode" id="Kode" placeholder="Kode Pegawai" required>
                            <div class="text-center col-md-auto"><button type="submit">...</button></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">No Bukti:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Bukti" id="Bukti" placeholder="Bukti" required>
                            <div class="text-center col-md-auto"><button type="submit">...</button></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Keterangan:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Keterangan" id="Keterangan" placeholder="Keterangan" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Sisa:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Sisa" id="Sisa" placeholder="Sisa" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Lunas:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Lunas" id="Lunas" placeholder="Lunas" required>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">No Angsuran:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Angsuran" id="Angsuran" placeholder="Angsuran" required>
                            <div class="text-center col-md-auto"><button type="submit">...</button></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Jml Angsuran:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Jml_angsuran" id="Jml_angsuran" placeholder="Jml Angsuran" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Pot Gaji Y/N:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Lunas" id="Lunas" placeholder="Lunas" required>
                        </div>
                    </div>

                    

                    <div class="row mt-3">
                        <div class="col- row justify-content-md-center">
                            <div class="text-center col-md-auto"><button type="submit">Isi</button></div>
                            <div class="text-center col-md-auto"><button type="submit">Koreksi</button></div>
                            <div class="text-center col-md-auto"><button type="submit">Hapus</button></div>
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