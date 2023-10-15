@extends('layouts.appPayroll')
@section('content')

        <div class="form-wrapper mt-4">
        <div class="form-container">
        <div class="card">
            <div class="card-header">Form Ijin Karyawan</div>
            <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <div class="form berat_woven">
                <form action="#" method="post" role="form">
                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Nama Pegawai:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Divisi_pengiriman" id="Divsi_pengiriman" placeholder="Divisi Pengiriman" required>
                            <div class="text-center col-md-auto"><button type="submit">Tampil</button></div>
                        </div>
                    </div>

                    <div class="card">
                    <div class="card-header">Hasil Print</div>
                        <h1>Tes</h1> 
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Nomor Kartu:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Nomor_kartu" id="Nomor_kartu" placeholder="Nomor Kartu" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Nama / ID Divisi:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Nama_divisi" id="Nama_divisi" placeholder="Nama / ID Divisi" required> <h1> / </h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Nama / Kode Pegawai:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Kode_pegawai" id="Kode_pegawai" placeholder="Nama / Kode Pegawai" required> <h1> /</h1>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Divisi:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Divisi" id="Divisi" placeholder="Divisi" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Kode Pegawai:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Kode_pegawai" id="Kode_pegawai" placeholder="Nama / Kode Pegawai" required>
                            <input type="text" class="form-control mt-r-l" name="Kode_pegawai" id="Kode_pegawai" placeholder="Nama / Kode Pegawai" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Tanggal Ijin:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="Date" class="form-control" name="Ijin" id="Ijin" placeholder="Ijin" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Keterangan:</span>
                        </div>
                        <div class="row">
                        <div class="col">
                            <div class="d-flex align-items-center" style="justify-content: center;">
                                <div class="form-check form-check-inline seperate">
                                    <input class="form-check-input custom-radio ml-3" type="radio" name="unit" value="kg" checked>
                                    <label class="form-check-label rounded-circle custom-radio" for="kgRadio">Kembali</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input custom-radio" type="radio" name="unit" value="yard">
                                    <label class="form-check-label rounded-circle custom-radio" for="yardRadio">Tidak Kembali</label>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div> 
                

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Jam Ijin Keluar:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="Time" class="form-control" name="Ijin" id="Ijin" placeholder="Ijin" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Jam Kembali:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="Time" class="form-control" name="Ijin" id="Ijin" placeholder="Ijin" required>
                        </div>
                    </div>  

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Keperluan:</span>
                        </div>
                        <div class="row">
                        <div class="col">
                            <div class="d-flex align-items-center" style="justify-content: center;">
                                <div class="form-check form-check-inline seperate">
                                    <input class="form-check-input custom-radio ml-3" type="radio" name="unit" value="kg" checked>
                                    <label class="form-check-label rounded-circle custom-radio" for="kgRadio">Dinas</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input custom-radio" type="radio" name="unit" value="yard">
                                    <label class="form-check-label rounded-circle custom-radio" for="yardRadio">Non Dinas</label>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div> 

                <div class="row form-group ml-1">
                    <div class="input-container ml-4">
                        <label for="grup-pelaksana-dropdown">Kategori Permohonan:</label>
                        <select id="grup-pelaksana-dropdown" class="ml-4" required>
                            <option value="1">Dinas</option>
                            <option value="2">-</option>
                        </select>
                    </div>
                </div>  

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Uraian Permohonan:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Uraian" id="Uraian" placeholder="Uraian" required>
                        </div>
                    </div>  

                    <div class="row">
                        <div class="form-group col-md-3 d-flex justify-content-end">
                            <span class="aligned-text">Yang Menyetujui:</span>
                        </div>
                        <div class="form-group col-md-9 mt-3 mt-md-0">
                            <input type="text" class="form-control" name="Menyetujui" id="Menyetujui" placeholder="Menyetujui" required>
                        </div>
                    </div>  

                    <div class="row mt-3">
                        <div class="col- row justify-content-md-center">
                            <div class="text-center col-md-auto"><button type="submit">Proses</button></div>
                            <div class="text-center col-md-auto"><button type="submit">Batal</button></div>
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
