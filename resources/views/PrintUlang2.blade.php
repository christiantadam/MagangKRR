@extends('layouts.appABM')
@section('content')
    <script type="text/javascript" src="{{ asset('js/BarcodeRollWoven/PrintUlang2.js') }}"></script>

    <body onload="Greeting()">
        <div id="app">
            <div class="form-wrapper mt-4">
                <div class="form-container">
                    <div class="card">
                        <div class="card-header">Print Ulang</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                            <div class="form berat_woven">
                                <form action="#" method="post" role="form">
                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Pilih Shift:</span>
                                        </div>
                                        <div class="form-group ml-3">
                                            <select id="shift" style="width: 100px">
                                                <option value="1">Satu</option>
                                                <option value="2">Dua</option>
                                                <option value="3">Tiga</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">No Barcode:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Barcode" id="Barcode"
                                                placeholder="Barcode">
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="row mt-3">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Item Number:</span>
                                            </div>
                                            <div class="form-group col-md-4 mt-3 mt-md-0">
                                                <input type="text" class="form-control" name="Item" id="Item"
                                                    placeholder="Item" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Kode Barang:</span>
                                            </div>
                                            <div class="form-group col-md-4 mt-3 mt-md-0">
                                                <input type="text" class="form-control" name="Kode" id="Kode"
                                                    placeholder="Kode" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Nama Type:</span>
                                            </div>
                                            <div class="form-group col-md-8 mt-3 mt-md-0">
                                                <input type="text" class="form-control" name="nama_type" id="nama_type"
                                                    placeholder="Nama Type" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Sekunder:</span>
                                            </div>
                                            <div class="form-group col-md-3 mt-3 mt-md-0">
                                                <input type="text" class="form-control" name="Sekunder" id="Sekunder"
                                                    placeholder="Sekunder">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Tritier:</span>
                                            </div>
                                            <div class="form-group col-md-3 mt-3 mt-md-0">
                                                <input type="text" class="form-control" name="Tritier" id="Tritier"
                                                    placeholder="Tritier">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mt-3">
                                        <div class="col- row justify-content-md-center">
                                            <div class="text-center col-md-auto"><button id="timbangButton" type="button"
                                                    style="width: 120px; height: 50px" disabled>Timbang</button>
                                            </div>
                                            <div class="text-center col-md-auto"><button id="printUlangBtn" type="button"
                                                    style="width: 120px; height: 50px" disabled>Print Ulang</button>
                                            </div>
                                            <div class="text-center col-md-auto"><button id="scanBarcodeBtn" type="button"
                                                    style="width: 120px; height: 50px" onclick="openModal()" disabled>Scan
                                                    Barcode</button></div>
                                            <div class="modal" id="myModal">
                                                <div class="modal-content" style="width: 1350px">
                                                    <span class="close-btn" onclick="closeModal()">&times;</span>
                                                    <h2>Scan Barcode</h2>
                                                    <p>Scan</p>

                                                    <div class="row">
                                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                                            <span class="aligned-text">Item Number /&nbsp;Kode
                                                                Barang:</span>
                                                        </div>
                                                        <div class="form-group col-md-7 mt-3 mt-md-0 ml-3">
                                                            <input type="text" class="form-control" id="barcode"
                                                                placeholder="Barcode">
                                                        </div>
                                                        <div class="text-center col-md-auto"><button class="btn-danger" type="button" onclick="closeModal()"
                                                            style="width: 120px; height: 35px" >Keluar</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center col-md-auto"><button class="btn-danger"
                                                    type="button" style="width: 120px; height: 50px">Keluar</button>
                                            </div>
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
