@extends('layouts.appABM')
@section('content')
    <script type="text/javascript" src="{{ asset('js/BarcodeKerta2/CSJ.js') }}"></script>

    <body onload="Greeting()">
        <style>
            /* Gaya untuk modal */
            .modal {
                display: none;
                /* Sembunyikan modal secara default */
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.7);
                /* Latar belakang gelap transparan */
            }

            .modal-content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                padding: 20px;
                background-color: white;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                border-radius: 5px;
                width: 700px;
            }

            .close-btn {
                position: absolute;
                top: 10px;
                right: 10px;
                cursor: pointer;
            }

            .info {
                display: flex;
                justify-content: space-between;
                align-items: baseline;
            }

            .info span {
                flex: 1;
            }

            .container {
                display: flex;
                flex-direction: row;
                align-items: flex-start;
                /* Optional: Align items at the top */
            }

            .label {
                display: inline-block;
                width: 120px;
                /* Adjust the width as needed */
                text-align: right;
                /* Align text to the right of the label */
                margin-right: 10px;
                /* Add some spacing between labels */
            }
        </style>
        <div id="app">
            <div class="form-wrapper mt-4">
                <div class="form-container">
                    <div class="card" style="width: 1200px; margin-left: -90px">
                        <div class="card-header">Cetak Surat Jalan</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                            <div class="form berat_woven">
                                <form action="#" method="post" role="form">
                                    <div style="margin-left: 30px">
                                        <h2>Kepada:</h2>
                                        <span>PT.KERTA RAJASA RAYA</span> <br>
                                        <span>JL.RAYA TROPODO NO.1</span> <br>
                                        <span>WARU-SIDOARJO</span>
                                    </div>
                                    <div class="row" style="margin-top: -100px">
                                        <div class="form-group col-md-7 d-flex justify-content-end">
                                            <span class="aligned-text">No. Surat Jalan:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Surat_jalan" id="Surat_jalan"
                                                placeholder="Surat Jalan">
                                            <div class="text-center col-md-auto"><button type="button" id="SJ"
                                                    style="width: 100px" onclick="openModal()">SJ Baru</button>
                                            </div>
                                            <div class="modal" id="myModal">
                                                <div class="modal-content" style="width: 700px">
                                                    <span class="close-btn" onclick="closeModal()">&times;</span>
                                                    <div class="card" style="width: 650px">
                                                        <div class="card-header">Pilih Jenis Surat Jalan</div>
                                                        <div class="row">
                                                            <div class=" col-md-3 d-flex justify-content-end">
                                                                <span class="aligned-text mt-4 mb-3">Surat Jalan
                                                                    Untuk:</span>
                                                            </div>
                                                            <div class="form-group">
                                                                <select id="shift"
                                                                    style="width: 250px; margin-top: 20px">
                                                                    <option value="1">Woven Bag</option>
                                                                    <option value="2">Jumbo Bag</option>
                                                                    <option value="3">AD Star</option>
                                                                </select>

                                                                <div class="text-center col-md-auto mt-3"><button
                                                                        style="margin-right: -100px"
                                                                        type="button">Ok</button></div>
                                                                <div class="text-center col-md-auto mt-3"
                                                                    onclick="closeModal()"><button
                                                                        style="margin-right: -200px"
                                                                        type="button">Cancel</button></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="text-center col-md-auto"><button type="button" id="SJ"
                                                    style="width: 100px" onclick="openModal1()">Open</button>
                                            </div>
                                            <div class="modal" id="myModal1">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal1()">&times;</span>
                                                    <h2>Table SJ</h2>
                                                    <p>Nomor SJ & Tanggal kirim</p>
                                                    <table id="TableOpenSJ">
                                                        <thead>
                                                            <tr>
                                                                <th>No SJ</th>
                                                                <th>TGL Kirim</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <!-- Add more rows as needed -->
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="updateTanggal()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-md-7 d-flex justify-content-end">
                                    <span class="aligned-text">Tanggal:</span>
                                </div>
                                <div class="form-group col-md-3 mt-3 mt-md-0">
                                    <input type="date" class="form-control" name="tgl" id="tgl"
                                        placeholder="Tanggal" readonly>
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-md-7 d-flex justify-content-end">
                                    <span class="aligned-text">Truk No. Pol:</span>
                                </div>
                                <div class="form-group col-md-3 mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="Truk_pol" id="Truk_pol"
                                        placeholder="No. Pol">
                                </div>
                            </div>

                            <div class="card mt-auto">
                                <div class="card-header">Type</div>
                                <table id="TypeTable">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Nama Barang </th>
                                            <th>Kode Barang </th>
                                            <th>Ball </th>
                                            <th>Lembar</th>
                                            <th>KG </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <h5>Lembar 1 untuk : Penerima Barang <br>
                                Lembar 2 untuk : Adm. Pembelian <br>
                                Lembar 3 untuk : Gudang <br>
                                Lembar 4 untuk : Satpam <br>
                            </h5>
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col- row justify-content-md-center">
                                <div class="text-center col-md-auto">
                                    <button type="button" style="width: 150px" onclick="showCard()" id="Cetak">Cetak Surat
                                        Jalan</button>
                                </div>
                                <div class="text-center col-md-auto">
                                    <button type="button" style="width: 150px" onclick="hideCard()">Batal Cetak</button>
                                </div>
                                <div class="text-center col-md-auto"><button type="button"
                                        style="width: 150px">Keluar</button></div>
                            </div>
                        </div>
                        </form>
                    </div>

                    <div class="card mt-3" id="cardSection" style="display: none;">
                        <div class="card-header">Type</div>
                        <div class="card mt-3" style="width: 200px; margin-left: 100px;">
                            <h2>tes</h2>
                        </div>
                        <div class="info mt-3" style="display: flex; justify-content: space-between; align-items: flex-start; margin-left: 100px">
                            <div style="display: flex; flex-direction: column;">
                                <span class="label">Tanggal :</span>
                                <span class="label">No. Surat Jalan :</span>
                                <span class="label">Truk NoPol :</span>
                            </div>
                            <div style="display: flex; flex-direction: column; align-items: flex-start; margin-right: 200px">
                                <span class="label">Kepada:</span>
                                <span style="margin-left: 130px; margin-top: -22px">Albert1</span>
                                <span style="margin-left: 130px;">Albert2</span>
                                <span style="margin-left: 130px;">Albert3</span>
                            </div>
                        </div>

                        <table id="TableSJPrint" class="mt-4"
                            style="width: 958px; margin-left: 20px; margin-right: 20px">
                            <thead>
                                <tr>
                                    <th style="width: 100px; height: 40px" class="text-center">Kode</th>
                                    <th style="width: 400px" class="text-center">URAIAN</th>
                                    <th style="width: 100px" class="text-center">Primer</th>
                                    <th style="width: 100px" class="text-center">Sekunder</th>
                                    <th style="width: 100px" class="text-center">Tritier</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td style="height: 40px"> </td>
                                <td style="height: 40px"> </td>
                                <td style="height: 40px"> </td>
                                <td style="height: 40px"> </td>
                                <td style="height: 40px"> </td>
                            </tbody>
                        </table>
                        <div class="container">
                            <div class="mt-5">
                                <span>Lembar 1 untuk : Penerima Barang </span> <br>
                                <span>Lembar 2 untuk : Adm. Pembelian </span> <br>
                                <span>Lembar 3 untuk : Gudang </span> <br>
                                <span>Lembar 4 untuk : Satpam </span> <br>
                            </div>
                            <table class="mb-3" id="TableSJPrint" style="margin-top: 50px; margin-left: 100px;">
                                <thead>
                                    <tr>
                                        <th style="width: 160px; height: 40px" class="text-center">Gudang</th>
                                        <th style="width: 160px" class="text-center">Pengirm</th>
                                        <th style="width: 160px" class="text-center">Satpam</th>
                                        <th style="width: 160px" class="text-center">Tanda Terima</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td style="height: 60px"> </td>
                                    <td style="height: 60px"> </td>
                                    <td style="height: 60px"> </td>
                                    <td style="height: 60px"> </td>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        </div>
        <main class="py-4">
            @yield('content')
        </main>
        </div>
    </body>
@endsection
