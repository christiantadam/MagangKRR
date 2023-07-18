@extends('layouts.appPayroll')
@section('content')
    <div class="form-wrapper mt-4">
        <div style="width: 80%;">
            <div class="card">
                <div class="card-header">FrmPembayaranStaff</div>
                <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                    <div class="form berat_woven">
                        <form action="#" method="post" role="form">
                            <div style="display:flex;gap:3%">
                                <div style="display: flex; flex-direction: column;gap:5px;white-space:nowrap">
                                    <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                        <input type="radio" id="pot_sptsk" name="pekerja" value="pot_sptsk" checked>Pot
                                        SPTSK
                                    </div>

                                    <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                        <input type="radio" id="gaji_seluruh_karyawan" name="pekerja"
                                            value="gaji_seluruh_karyawan">Gaji Seluruh Karyawan
                                    </div>

                                    <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                        <input type="radio" id="pot_gaji_seluruh_karyawan" name="pekerja"
                                            value="pot_gaji_seluruh_karyawan">Pot Gaji Seluruh Karyawan
                                    </div>

                                    <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                        <input type="radio" id="pot_gaji_seluruh_karyawan" name="pekerja"
                                            value="pot_gaji_seluruh_karyawan">Daftar Gaji Kurang Dari 0
                                    </div>

                                    <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                        <input type="radio" id="pot_gaji_seluruh_karyawan" name="pekerja"
                                            value="pot_gaji_seluruh_karyawan">Rekap Absensi Staff
                                    </div>

                                    <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                        <input type="radio" id="pot_gaji_seluruh_karyawan" name="pekerja"
                                            value="pot_gaji_seluruh_karyawan">Daftar Simpan Pinjam Koprasi
                                    </div>

                                    <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                        <input type="radio" id="pot_gaji_seluruh_karyawan" name="pekerja"
                                            value="pot_gaji_seluruh_karyawan">Pembayaran Angsuran Koprasi
                                    </div>

                                    <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                        <input type="radio" id="pot_gaji_seluruh_karyawan" name="pekerja"
                                            value="pot_gaji_seluruh_karyawan">Pot Koprasi (Toko)
                                    </div>

                                    <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                        <input type="radio" id="pot_gaji_seluruh_karyawan" name="pekerja"
                                            value="pot_gaji_seluruh_karyawan">Angsuran Seragam
                                    </div>

                                    <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                        <input type="radio" id="pot_gaji_seluruh_karyawan" name="pekerja"
                                            value="pot_gaji_seluruh_karyawan">Pot Incra Yang Ditahan
                                    </div>
                                    <div>
                                        <div>
                                            <span class="aligned-text">Periode:</span>
                                        </div>
                                        <div style="display:flex;flex-direction: column;gap: 5px">
                                            <input type="text" class="form-control" name="Periode" id="Periode"
                                                placeholder="Periode" required>
                                            <div style="display:flex;flex-direction: row;gap: 5px;align-self: center">
                                                <button type="submit">Preview</button>
                                                <button type="submit">Quit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" style="width: 100%">
                                    <div class="card-header">Pdf Viewer</div>
                                    <h1>tes</h1>
                                </div>
                            </div>


                        </form>
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
@endsection
