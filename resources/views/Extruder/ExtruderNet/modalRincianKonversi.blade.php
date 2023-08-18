<div class="modal fade" id="form_rincian_konversi" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Rincian Konversi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="card">
                    <div class="card-header">Asal Konversi</div>

                    <div class="card-body" style="background: ghostwhite">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="kelompok_utama">Kelompok Utama:</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="id_kelompok_utama" class="form-control col-3"
                                        style="width: 30%;">
                                    <input type="text" id="nama_kelompok_utama" class="form-control col-7"
                                        style="width: 70%;">
                                </div>

                                <label for="kelompok_utama">Kelompok:</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="id_kelompok" class="form-control col-3"
                                        style="width: 30%;">
                                    <input type="text" id="nama_kelompok" class="form-control col-7"
                                        style="width: 70%;">
                                </div>

                                <label for="kelompok_utama">Sub-kelompok:</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="id_sub_kelompok" class="form-control col-3"
                                        style="width: 30%;">
                                    <input type="text" id="nama_sub_kelompok" class="form-control col-7"
                                        style="width: 70%;">
                                </div>

                                <label for="kelompok_utama">Type:</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="id_type" class="form-control col-3" style="width: 30%">
                                    <input type="text" id="nama_type" class="form-control col-7" style="width: 70%">
                                </div>
                            </div>

                            <div class="col-lg-8 d-flex align-items-center">
                                <div class="card">
                                    <div class="card-header">Saldo Akhir</div>

                                    <div class="card-body" style="padding: 35px var(--bs-card-spacer-x)">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <span class="aligned-text col-3"
                                                        style="width: 30%; font-size: initial;">Primer:</span>
                                                    <div class="input-group col-7" style="width: 65%">
                                                        <input type="number" id="saldo_primer_asal"
                                                            class="form-control" placeholder="0" disabled>
                                                        <span class="input-group-text">NULL</span>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <span class="aligned-text col-3"
                                                        style="width: 30%; font-size: initial;">Sekunder:</span>
                                                    <div class="input-group col-7" style="width: 65%">
                                                        <input type="number" id="saldo_sekunder_asal"
                                                            class="form-control" placeholder="0" disabled>
                                                        <span class="input-group-text">NULL</span>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <span class="aligned-text col-3"
                                                        style="width: 30%; font-size: initial;">Tritier:</span>
                                                    <div class="input-group col-7" style="width: 65%">
                                                        <input type="number" id="saldo_tritier_asal"
                                                            class="form-control" placeholder="0" disabled>
                                                        <span class="input-group-text">NULL</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <span class="aligned-text col-3"
                                                        style="width: 30%; font-size: initial;">Primer:</span>
                                                    <div class="input-group col-7" style="width: 65%">
                                                        <input type="number" id="primer_asal" class="form-control"
                                                            placeholder="0">
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <span class="aligned-text col-3"
                                                        style="width: 30%; font-size: initial;">Sekunder:</span>
                                                    <div class="input-group col-7" style="width: 65%">
                                                        <input type="number" id="sekunder_asal" class="form-control"
                                                            placeholder="0">
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <span class="aligned-text col-3"
                                                        style="width: 30%; font-size: initial;">Tritier:</span>
                                                    <div class="input-group col-7" style="width: 65%">
                                                        <input type="number" id="tritier_asal" class="form-control"
                                                            placeholder="0">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">Tujuan Konversi</div>

                    <div class="card-body" style="background: ghostwhite">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="kelompok_utama">Kelompok Utama:</label>
                                <select id="select_kelompok_utama_rk" class="form-select mb-3">
                                    <option disabled selected>-- Pilih Kelompok Utama --</option>
                                    <option value="loading" style="display: none" disabled>Memuat data...</option>
                                </select>

                                <label for="kelompok_utama">Kelompok:</label>
                                <select id="select_kelompok_rk" class="form-select mb-3">
                                    <option disabled selected>-- Pilih Kelompok --</option>
                                    <option value="loading" style="display: none" disabled>Memuat data...</option>
                                </select>

                                <label for="kelompok_utama">Sub-kelompok:</label>
                                <select id="select_sub_kelompok_rk" class="form-select mb-3">
                                    <option disabled selected>-- Pilih Sub-kelompok --</option>
                                    <option value="loading" style="display: none" disabled>Memuat data...</option>
                                </select>

                                <label for="kelompok_utama">Type:</label>
                                <select id="select_type_rk" class="form-select mb-3">
                                    <option disabled selected>-- Pilih Type --</option>
                                    <option value="loading" style="display: none" disabled>Memuat data...</option>
                                </select>
                            </div>

                            <div class="col-lg-8 d-flex align-items-center">
                                <div class="card">
                                    <div class="card-header">Saldo Akhir</div>

                                    <div class="card-body" style="padding: 35px var(--bs-card-spacer-x)">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <span class="aligned-text col-3"
                                                        style="width: 30%; font-size: initial;">Primer:</span>
                                                    <div class="input-group col-7" style="width: 65%">
                                                        <input type="number" id="saldo_primer_tujuan"
                                                            class="form-control" placeholder="0" disabled>
                                                        <span class="input-group-text">NULL</span>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <span class="aligned-text col-3"
                                                        style="width: 30%; font-size: initial;">Sekunder:</span>
                                                    <div class="input-group col-7" style="width: 65%">
                                                        <input type="number" id="saldo_sekunder_tujuan"
                                                            class="form-control" placeholder="0" disabled>
                                                        <span class="input-group-text">NULL</span>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <span class="aligned-text col-3"
                                                        style="width: 30%; font-size: initial;">Tritier:</span>
                                                    <div class="input-group col-7" style="width: 65%">
                                                        <input type="number" id="saldo_tritier_tujuan"
                                                            class="form-control" placeholder="0" disabled>
                                                        <span class="input-group-text">NULL</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <span class="aligned-text col-3"
                                                        style="width: 30%; font-size: initial;">Primer:</span>
                                                    <div class="input-group col-7" style="width: 65%">
                                                        <input type="number" id="primer_tujuan" class="form-control"
                                                            placeholder="0">
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <span class="aligned-text col-3"
                                                        style="width: 30%; font-size: initial;">Sekunder:</span>
                                                    <div class="input-group col-7" style="width: 65%">
                                                        <input type="number" id="sekunder_tujuan"
                                                            class="form-control" placeholder="0">
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <span class="aligned-text col-3"
                                                        style="width: 30%; font-size: initial;">Tritier:</span>
                                                    <div class="input-group col-7" style="width: 65%">
                                                        <input type="number" id="tritier_tujuan"
                                                            class="form-control" placeholder="0">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" id="rk_cancel" class="btn btn-secondary"
                    data-bs-dismiss="modal">CANCEL</button>
                <button type="button" id="rk_confirm" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('js/Extruder/ExtruderNet/rincianKonversi.js') }}"></script>
