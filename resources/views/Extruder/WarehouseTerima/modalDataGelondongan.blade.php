<div class="modal fade" id="form_data_gelondongan" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Lihat Data Gelondongan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <h1 id="loading_lbl">
                    <center>Memuat data...</center>
                </h1>

                <div class="row mb-3">
                    <div class="col-lg-3">
                        <span class="aligned-text" style="margin-top: 10px">Tanggal:</span>
                    </div>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <input type="date" name="" id="mdl_tanggal" class="form-control">
                            <button type="button" id="btn_refresh" class="btn btn-outline-secondary">Refresh</button>
                        </div>
                    </div>
                </div>

                <input type="hidden" id="hid_divisi">

                <table id="mdl_table" class="hover cell-border">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Type</th>
                            <th>Kode Barang</th>
                            <th>No. Indeks</th>
                            <th>Bagian</th>
                            <th>Mesin</th>
                            <th>Primer</th>
                            <th>Sekunder</th>
                            <th>Tritier</th>
                            <th>Divisi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" id="mdl_cancel" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                <button type="button" id="mdl_confirm" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('js\Extruder\WarehouseTerima\scanGelondongan.js') }}"></script>
