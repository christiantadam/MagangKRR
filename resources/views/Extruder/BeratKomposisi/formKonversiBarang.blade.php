@extends('layouts.appExtruder')
@section('content')
    <div id="konversi_barang" class="form" data-aos="fade-up">
        <form action="#" method="post">
            <div class="row mt-3">
                <div class="form-group col-md-4">
                    <label for="kode_barang">Kode Barang:</label>
                    <input type="text" class="form-control" name="kode_barang" placeholder="Kode Barang" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="berat_standar">Berat Standar:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="berat_standar" placeholder="Berat Standar"
                            required>
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
                                        <input type="number" class="form-control" name="Conductive_Kertas_persen"
                                            required>
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="koef_Conductive_Kertas">Koef. Conductive / Kertas:</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="koef_Conductive_Kertas"
                                            required>
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

            <div class="table-responsive mt-5">
                <table class="table table-hover" style="width: max-content">
                    <thead>
                        <tr>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">No. Konversi</th>
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
                            <th class="text-center">Tgl. Loading</th>
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
                    <button type="submit" class="spacing-button seperate">Koreksi Tgl. Loading</button>
                    <button type="submit" class="spacing-button">Proses</button>
                    <button type="submit" class="spacing-button">Print</button>
                    <button type="submit" class="spacing-button">Keluar</button>
                </div>
            </div>

        </form>
    </div>
@endsection
