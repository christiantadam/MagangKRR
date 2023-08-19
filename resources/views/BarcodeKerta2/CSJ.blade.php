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
        </style>
        <div id="app">
            <div class="form-wrapper mt-4">
                <div class="form-container">
                    <div class="card" style="width: 1200px; margin-left: -90px">
                        <div class="card-header">Cek Surat Jalan</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                            <div class="form berat_woven">
                                <form action="#" method="post" role="form">
                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">No. Surat Jalan:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Surat_jalan" id="Surat_jalan"
                                                placeholder="Surat Jalan">
                                            <div class="text-center col-md-auto"><button type="button" id="SJ"
                                                    onclick="openModal()">SJ Baru</button>
                                            </div>
                                            <div class="modal" id="myModal">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal()">&times;</span>
                                                    <div class="card">
                                                        <div class="row">
                                                            <div class=" col-md-3 d-flex justify-content-end">
                                                                <span class="aligned-text mt-4 mb-3">Surat Jalan
                                                                    Untuk:</span>
                                                            </div>
                                                            <div class="form-group mt-4 ">
                                                                <select id="shift">
                                                                    <option value="1">Satu</option>
                                                                    <option value="2">Dua</option>
                                                                    <option value="3">Tiga</option>
                                                                    <option value="4">Empat</option>
                                                                    <option value="5">Lima</option>
                                                                </select>
                                                            </div>
                                                            <div class="text-center col-md-auto mt-3"
                                                                style="margin-top: 15px; margin-left:250px"><button
                                                                    type="button">Ok</button></div>
                                                            <div class="text-center col-md-auto mt-3" style="margin-top: 15px"
                                                                onclick="closeModal()"><button
                                                                    type="button">Cancel</button></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="text-center col-md-auto"><button type="button">Open</button></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Tanggal:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="date" class="form-control" name="tgl" id="tgl"
                                                placeholder="Tanggal">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Truk No. Pol:</span>
                                        </div>
                                        <div class="form-group col-md-7 mt-3 mt-md-0">
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

                            <div class="row mt-3">
                                <div class="col- row justify-content-md-center">
                                    <div class="text-center col-md-auto"><button type="button" style="width: 150px">Cek Surat Jalan</button>
                                    </div>
                                    <div class="text-center col-md-auto"><button type="button" style="width: 150px">Batal Cetak</button></div>
                                    <div class="text-center col-md-auto"><button type="button" style="width: 150px">Keluar</button></div>
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
    </body>
@endsection
