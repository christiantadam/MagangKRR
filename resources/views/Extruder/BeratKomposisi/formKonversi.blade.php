<div id="konversi_kg" class="form hidden" data-aos="fade-up">
    <form action="#">

        <div class="row mt-3">
            <div class="col">
                <div class="d-flex align-items-center" style="justify-content: center;">
                    <div class="form-check form-check-inline seperate">
                        <input class="form-check-input custom-radio" type="radio" name="unit" value="kg" checked>
                        <label class="form-check-label rounded-circle custom-radio" for="kgRadio">Kg</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="unit" value="yard">
                        <label class="form-check-label rounded-circle custom-radio" for="yardRadio">Yard</label>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <label for="kode_barang">Kode Barang:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="kode_barang" placeholder="Kode Barang">
                        <button class="btn btn-primary ml-2" type="submit">Proses</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Ket</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>123123</td>
                            <td>Kg</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>123123</td>
                            <td>Kg</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="col-md-2 btn btn-primary mt-3" type="submit" style="height: 100px;">Keluar</button>
        </div>

    </form>
</div>

<div id="komposisi_konversi" class="form hidden" data-aos="fade-up">
    <form action="#" method="post">

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Kode Barang:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <input type="text" class="form-control" name="kode_barang" placeholder="Kode Barang" required>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Berat Standar:</span>
            </div>
            <div class="form-group col-md-4 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="number" class="form-control" name="berat_standar" placeholder="Berat Standar" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Type:</span>
            </div>
            <div class="form-group col-md-10 mt-3 mt-md-0">
                <textarea class="form-control" name="berat_type" rows="3" placeholder="Type" required></textarea>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">PP:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="pp_gram" placeholder="PP" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="pp_persen" placeholder="PP" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">PE:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="pe_gram" placeholder="PE" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="pe_persen" placeholder="PE" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">CaCO3:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="caco3_gram" placeholder="CaCO3" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="caco3_persen" placeholder="CaCO3" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Masterbatch:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="masterbatch_gram" placeholder="Masterbatch" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="masterbatch_persen" placeholder="Masterbatch" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">UV:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="UV_gram" placeholder="UV" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="UV_persen" placeholder="UV" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Anti Static:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="anti_static_gram" placeholder="Anti Static" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="anti_static_persen" placeholder="Anti Static" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Conductive / Kertas:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="kertas_gram" placeholder="Conductive / Kertas" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="kertas_persen" placeholder="Conductive / Kertas" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">LDPE:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="ldpe_gram" placeholder="LDPE" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="ldpe_persen" placeholder="LDPE" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">LLDPE:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="lldpe_gram" placeholder="LLDPE" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="lldpe_persen" placeholder="LLDPE" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">HDPE:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="hdpe_gram" placeholder="HDPE" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text"></span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="hdpe_persen" placeholder="HDPE" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Total Komposisi:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="total_gram" placeholder="Total Komposisi" required>
                    <span class="input-group-text">Gram</span>
                </div>
            </div>
            <div class="form-group col-md-2 d-flex justify-content-end">
                <span class="aligned-text">Jumlah:</span>
            </div>
            <div class="form-group col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="total_persen" placeholder="Total Komposisi" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-9 row justify-content-md-center">
                <div class="text-center col-md-auto"><button type="submit">Koreksi</button></div>
                <div class="text-center col-md-auto"><button type="submit">Batal</button></div>
                <div class="text-center col-md-auto"><button type="submit">Proses</button></div>
            </div>

            <div class="text-center col-3"><button type="submit">Keluar</button></div>
        </div>

    </form>
</div>

<div id="konversi_barang" class="form hidden" data-aos="fade-up">
    <form action="#" method="post">
        <div class="row mt-3">
            <div class="form-group col-md-4">
                <label for="kode_barang">Kode Barang:</label>
                <input type="text" class="form-control" name="kode_barang" placeholder="Kode Barang" required>
            </div>
            <div class="form-group col-md-2">
                <label for="berat_standar">Berat Standar:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="berat_standar" placeholder="Berat Standar" required>
                    <span class="input-group-text">Kg</span>
                </div>
            </div>
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="tanggal_input">Tanggal Input:</label>
                <input type="date" class="form-control" name="tanggal_input" placeholder="Tanggal Input" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-5">
                <label for="no_konversi">No Konversi:</label>
                <input type="text" class="form-control" name="no_konversi" placeholder="Nomor Konversi" required>
            </div>
            <div class="form-group col-md-3"></div>
            <div class="form-group col-md-4">
                <label for="tanggal_loading_bc">Tanggal Loading BC:</label>
                <input type="date" class="form-control" name="tanggal_loading_bc" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-12">
                <label for="type">Type:</label>
                <textarea class="form-control" name="type" rows="3" placeholder="Type" required></textarea>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-group col-md-5">
                <label for="jenis_barang">Jenis Barang:</label>
                <input type="text" class="form-control" name="jenis_barang" placeholder="Jenis Barang" required>
            </div>
            <div class="form-group col-md-1"></div>
            <div class="form-group col-md-3">
                <label for="terkandung">Terkandung:</label>
                <div class="input-group">
                    <input type="number" class="form-control" name="terkandung" placeholder="Terkandung" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="waste">Waste:</label>
                <div class="input-group">
                    <input type="number" class="form-control" name="waste" placeholder="Waste" required>
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Komposisi Barang</h5>
                        <div class="row mt-3">
                            <div class="form-group col-md-4">
                                <label for="PP">PP:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="PP_kg" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="PP2"></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="PP_persen" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="koef_PP">Koef. PP:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="koef_PP" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-md-4">
                                <label for="PE">PE:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="PE_kg" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="PE2"></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="PE_persen" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="koef_PE">Koef. PE:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="koef_PE" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-md-4">
                                <label for="CaCO3">CaCO3:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="CaCO3_kg" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="CaCO32"></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="CaCO3_persen" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="koef_CaCO3">Koef. CaCO3:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="koef_CaCO3" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-md-4">
                                <label for="Masterbatch">Masterbatch:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="Masterbatch_kg" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Masterbatch2"></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="Masterbatch_persen" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="koef_Masterbatch">Koef. Masterbatch:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="koef_Masterbatch" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-md-4">
                                <label for="UV">UV:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="UV_kg" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="UV2"></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="UV_persen" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="koef_UV">Koef. UV:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="koef_UV" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-md-4">
                                <label for="Anti_Static">Anti Static:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="Anti_Static_kg" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Anti_Static2"></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="Anti_Static_persen" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="koef_Anti_Static">Koef. Anti Static:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="koef_Anti_Static" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-md-4">
                                <label for="Conductive_Kertas">Conductive / Kertas:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="Conductive_Kertas_kg" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Conductive_Kertas2"></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="Conductive_Kertas_persen" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="koef_Conductive_Kertas">Koef. Conductive / Kertas:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="koef_Conductive_Kertas" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-md-4">
                                <label for="pp">LDPE:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="LDPE_kg" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="LDPE2"></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="LDPE_persen" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="koef_LDPE">Koef. LDPE:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="koef_LDPE" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-md-4">
                                <label for="LLDPE">LLDPE:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="LLDPE_kg" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="LLDPE2"></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="LLDPE_persen" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="koef_LLDPE">Koef. LLDPE:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="koef_LLDPE" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-md-4">
                                <label for="LLDPE">HDPE:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="HDPE_kg" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="HDPE2"></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="HDPE_persen" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="koef_HDPE">Koef. HDPE:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="koef_HDPE" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-md-4">
                                <label for="Total">Total Komposisi:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="Total_kg" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Total2">Jumlah:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="Total_persen" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="koef_Total">Total Koefisien:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="koef_Total" required>
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="width: 100%; overflow-x: auto;">
            <table class="table mt-5" style="table-layout: fixed;">
                <colgroup>
                    <col style="width: 100px;">
                    <col style="width: 125px;">
                    <col style="width: 150px;">
                    <col style="width: 100px;">
                    <col style="width: 100px;">
                    <col style="width: 100px;">
                    <col style="width: 100px;">
                    <col style="width: 100px;">
                    <col style="width: 100px;">
                    <col style="width: 100px;">
                    <col style="width: 100px;">
                    <col style="width: 100px;">
                    <col style="width: 100px;">
                    <col style="width: 125px;">
                </colgroup>
                <thead>
                    <tr>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">No Konversi</th>
                        <th class="text-center">Berat Standar</th>
                        <th class="text-center">Koef. PP</th>
                        <th class="text-center">Koef. PP</th>
                        <th class="text-center">Koef. PP</th>
                        <th class="text-center">Koef. PP</th>
                        <th class="text-center">Koef. PP</th>
                        <th class="text-center">Koef. PP</th>
                        <th class="text-center">Koef. PP</th>
                        <th class="text-center">Koef. PP</th>
                        <th class="text-center">Koef. PP</th>
                        <th class="text-center">Koef. PP</th>
                        <th class="text-center">Tgl Loading</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">2023-07-01</td>
                        <td class="text-center">001</td>
                        <td class="text-center">10</td>
                        <td class="text-center">1.2</td>
                        <td class="text-center">1.3</td>
                        <td class="text-center">1.4</td>
                        <td class="text-center">1.5</td>
                        <td class="text-center">1.6</td>
                        <td class="text-center">1.7</td>
                        <td class="text-center">1.8</td>
                        <td class="text-center">1.9</td>
                        <td class="text-center">2.0</td>
                        <td class="text-center">2.1</td>
                        <td class="text-center">2023-07-02</td>
                    </tr>
                    <tr>
                        <td class="text-center">2023-07-02</td>
                        <td class="text-center">002</td>
                        <td class="text-center">12</td>
                        <td class="text-center">1.1</td>
                        <td class="text-center">1.2</td>
                        <td class="text-center">1.3</td>
                        <td class="text-center">1.4</td>
                        <td class="text-center">1.5</td>
                        <td class="text-center">1.6</td>
                        <td class="text-center">1.7</td>
                        <td class="text-center">1.8</td>
                        <td class="text-center">1.9</td>
                        <td class="text-center">2.0</td>
                        <td class="text-center">2023-07-03</td>
                    </tr>
                    <tr>
                        <td class="text-center">2023-07-03</td>
                        <td class="text-center">003</td>
                        <td class="text-center">8</td>
                        <td class="text-center">1.3</td>
                        <td class="text-center">1.4</td>
                        <td class="text-center">1.5</td>
                        <td class="text-center">1.6</td>
                        <td class="text-center">1.7</td>
                        <td class="text-center">1.8</td>
                        <td class="text-center">1.9</td>
                        <td class="text-center">2.0</td>
                        <td class="text-center">2.1</td>
                        <td class="text-center">2.2</td>
                        <td class="text-center">2023-07-04</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row mt-3">
            <div class="col" style="display: flex; justify-content: center;">
                <button type="submit" class="spacing-button">Isi</button>
                <button type="submit" class="spacing-button">Koreksi</button>
                <button type="submit" class="spacing-button">Hapus</button>
                <button type="submit" class="spacing-button seperate">Koreksi Tgl Loading</button>
                <button type="submit" class="spacing-button">Proses</button>
                <button type="submit" class="spacing-button">Print</button>
                <button type="submit" class="spacing-button">Keluar</button>
            </div>
        </div>

    </form>
</div>