@extends('layouts.appABM')
@section('content')
    <title style="font-size: 20px">@yield('title', 'Laporan Serah Terima')</title>
    <script type="text/javascript" src="{{ asset('js/LST.js') }}"></script>
    <style>
        @page {
            size: A4;
            /* Specify the page size */
            margin: 1cm;
            /* Specify the page margins */
        }

        .page-number:before {
            content: counter(page);
            text-align: center;
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
        }

        .hidden {
            display: none;
        }
    </style>

    <body onload="Greeting()">
        <div id="app">
            <div class="form-wrapper mt-4">
                <div class="form-container">
                    <div class="card">
                        <div class="card-header">Laporan Serah Terima</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                            <div class="form berat_woven">
                                <form action="#" method="post" role="form">
                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Divisi Pengiriman:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="IdDivisi_pengiriman"
                                                id="IdDivisi_pengiriman" placeholder="Divisi Pengiriman">
                                        </div>
                                        <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Divisi_pengiriman"
                                                id="Divisi_pengiriman" placeholder="Divisi Pengiriman">
                                        </div>
                                        <div class="text-center col-md-auto"><button type="button" onclick="openModal()"
                                                id="ButtonDivisi">...</button></div>
                                        <div class="modal" id="myModal">
                                            <div class="modal-content">
                                                <span class="close-btn" onclick="closeModal1()">&times;</span>
                                                <h2>Table Divisi Pengiriman</h2>
                                                <p>Id Divisi Pengiriman & Divisi Pengiriman</p>
                                                <table id="TableDivisiPengiriman">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Divisi</th>
                                                            <th>Divisi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($dataDivisi as $data)
                                                            <tr>
                                                                <td>{{ $data->IdDivisi }}</td>
                                                                <td>{{ $data->NamaDivisi }}</td>
                                                            </tr>
                                                        @endforeach

                                                        <!-- Add more rows as needed -->
                                                    </tbody>
                                                </table>
                                                <div class="text-center col-md-auto">
                                                    <button type="button" onclick="closeModal1()">Process</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Divisi Penerima:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="IdDivisi_penerima"
                                                id="IdDivisi_penerima" placeholder="Divisi Penerima">
                                        </div>
                                        <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Divisi_penerima"
                                                id="Divisi_penerima" placeholder="Divisi Penerima">
                                        </div>
                                        <div class="text-center col-md-auto"><button type="button" onclick="openModal1()"
                                                id="ButtonDivisi">...</button></div>
                                        <div class="modal" id="myModal1">
                                            <div class="modal-content">
                                                <span class="close-btn" onclick="closeModal()">&times;</span>
                                                <h2>Table Divisi Pengiriman</h2>
                                                <p>Id Divisi Pengiriman & Divisi Pengiriman</p>
                                                <table id="TableDivisiPenerima">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Divisi</th>
                                                            <th>Divisi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($dataDivisiDiminta as $data)
                                                            <tr>
                                                                <td>{{ $data->IdDivisi }}</td>
                                                                <td>{{ $data->NamaDivisi }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="text-center col-md-auto">
                                                    <button type="button" onclick="closeModal()">Process</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Objek:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="IdObjek" id="IdObjek"
                                                placeholder="Objek">
                                        </div>
                                        <div class="form-group col-md-6 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Objek" id="Objek"
                                                placeholder="Objek">
                                        </div>
                                        <div class="text-center col-md-auto"><button type="button" onclick="openModal2()"
                                                id="ButtonObjek">...</button></div>
                                        <div class="modal" id="myModal2">
                                            <div class="modal-content">
                                                <span class="close-btn" onclick="closeModal2()">&times;</span>
                                                <h2>Table Objek</h2>
                                                <p>Id Objek & Objek</p>
                                                <table id="TableObjek">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Objek</th>
                                                            <th>Objek</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                                <div class="text-center col-md-auto">
                                                    <button type="button" onclick="closeModal2()">Process</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Tanggal Kirim:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="date" class="form-control" name="Tanggal" id="Tanggal"
                                                placeholder="Tanggal" required>
                                        </div>
                                        <div class="form-group col-md-1 d-flex justify-content-end">
                                            <span class="aligned-text">Shift:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <select class="form-control" name="Shift" id="Shift" required>
                                                <option value="Pagi">1</option>
                                                <option value="Sore">2</option>
                                                <option value="Malam">3</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col- row justify-content-md-center">
                                    <div class="text-center col-md-auto"><button type="button" id="btnPrint"
                                            style="width: 100px">Print</button></div>
                                    <div class="text-center col-md-auto"><button type="button" class="btn-danger"
                                            style="width: 100px">Keluar</button></div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>



                    <div class="card hidden mt-5" id="ABM">

                        <table id="TableABM">
                            <span>PT.Kerta Rajasa Raya</span>
                            <span>Woven Bag - Jumbo Bag Industrial</span>
                            <h3 class="text-center">BUKTI PENGIRIMAN BARANG</h3>
                            <h3 class="text-center">WOVEN BAG - GUDANG</h3>
                            <h5 id="tanggalCetak">Tanggal Cetak: </h5>
                            <h5 id="tanggalKirim">Tanggal Kirim: </h5>
                            <thead>
                                <tr>
                                    <th style="width: 120px">Nama Pengirim</th>
                                    <th style="width: 380px">Nama Type</th>
                                    <th style="width: 100px">Bal/Palet</th>
                                    <th style="width: 100px">Lembar</th>
                                    <th style="width: 100px">KG</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <table class="mt-5" id="TableTandaTangan">
                            <thead>
                                <tr style="height: 40px">
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 100px">
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="page-number"></div> --}}

                    <div class="card hidden mt-5" id="ADS">

                        <table id="TableADS">
                            <span>PT.Kerta Rajasa Raya</span>
                            <span>Woven Bag - Jumbo Bag Industrial</span>
                            <h3 class="text-center">BUKTI PENGIRIMAN BARANG</h3>
                            <h3 class="text-center">ADSTAR - GUDANG</h3>
                            <h5 id="tanggalCetak">Tanggal Cetak: </h5>
                            <h5 id="tanggalKirim">Tanggal Kirim: </h5>
                            <thead>
                                <tr>
                                    <th style="width: 120px">Nama Pengirim</th>
                                    <th style="width: 380px">Nama Type</th>
                                    <th style="width: 100px">Bal/Palet</th>
                                    <th style="width: 100px">Lembar</th>
                                    <th style="width: 100px">KG</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <table class="mt-5" id="TableTandaTangan">
                            <thead>
                                <tr style="height: 40px">
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 100px">
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card hidden mt-5" id="ADSMOJO">

                        <table id="TableADSMOJO">
                            <span>PT.Kerta Rajasa Raya</span>
                            <span>Woven Bag - Jumbo Bag Industrial</span>
                            <h3 class="text-center">BUKTI PENGIRIMAN BARANG</h3>
                            <h3 class="text-center">MOJOSARI ADSTAR - GUDANG</h3>
                            <h5 id="tanggalCetak">Tanggal Cetak: </h5>
                            <h5 id="tanggalKirim">Tanggal Kirim: </h5>
                            <thead>
                                <tr>
                                    <th style="width: 120px">Nama Pengirim</th>
                                    <th style="width: 380px">Nama Type</th>
                                    <th style="width: 100px">Bal/Palet</th>
                                    <th style="width: 100px">Lembar</th>
                                    <th style="width: 100px">KG</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <table class="mt-5" id="TableTandaTangan">
                            <thead>
                                <tr style="height: 40px">
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 100px">
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card hidden mt-5" id="JBB">

                        <table id="TableJBB">
                            <span>PT.Kerta Rajasa Raya</span>
                            <span>Woven Bag - Jumbo Bag Industrial</span>
                            <h3 class="text-center">BUKTI PENGIRIMAN BARANG</h3>
                            <h3 class="text-center">JUMBO BAG - GUDANG</h3>
                            <div style="display: flex; justify-content: space-between;">
                                <h5 id="tanggalCetak">Tanggal Cetak: </h5>
                                <h5 id="tanggalKirim">Tanggal Kirim: </h5>
                            </div>
                            <thead>
                                <tr>
                                    <th style="width: 120px">Nama Pengirim</th>
                                    <th style="width: 380px">Nama Type</th>
                                    <th style="width: 100px">Bal/Palet</th>
                                    <th style="width: 100px">Lembar</th>
                                    <th style="width: 100px">KG</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <table class="mt-5" id="TableTandaTangan">
                            <thead>
                                <tr style="height: 40px">
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 100px">
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card hidden mt-5" id="JBM">

                        <table id="TableJBM">
                            <span>PT.Kerta Rajasa Raya</span>
                            <span>Woven Bag - Jumbo Bag Industrial</span>
                            <h3 class="text-center">BUKTI PENGIRIMAN BARANG</h3>
                            <h3 class="text-center">JUMBO BAG MOJOSARI - GUDANG</h3>
                            <h5 id="tanggalCetak">Tanggal Cetak: </h5>
                            <h5 id="tanggalKirim">Tanggal Kirim: </h5>
                            <thead>
                                <tr>
                                    <th style="width: 120px">Nama Pengirim</th>
                                    <th style="width: 380px">Nama Type</th>
                                    <th style="width: 100px">Bal/Palet</th>
                                    <th style="width: 100px">Lembar</th>
                                    <th style="width: 100px">KG</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <table class="mt-5" id="TableTandaTangan">
                            <thead>
                                <tr style="height: 40px">
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 100px">
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card hidden mt-5" id="JBM2">

                        <table id="TableJBM2">
                            <span>PT.Kerta Rajasa Raya</span>
                            <span>Woven Bag - Jumbo Bag Industrial</span>
                            <h3 class="text-center">BUKTI PENGIRIMAN BARANG</h3>
                            <h3 class="text-center">JUMBO BAG MOJOSARI - GUDANG</h3>
                            <h5 id="tanggalCetak">Tanggal Cetak: </h5>
                            <h5 id="tanggalKirim">Tanggal Kirim: </h5>
                            <thead>
                                <tr>
                                    <th style="width: 120px">Nama Pengirim</th>
                                    <th style="width: 380px">Nama Type</th>
                                    <th style="width: 100px">Bal/Palet</th>
                                    <th style="width: 100px">Lembar</th>
                                    <th style="width: 100px">KG</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <table class="mt-5" id="TableTandaTangan">
                            <thead>
                                <tr style="height: 40px">
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 100px">
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card hidden mt-5" id="JBR">

                        <table id="TableJBR">
                            <span>PT.Kerta Rajasa Raya</span>
                            <span>Woven Bag - Jumbo Bag Industrial</span>
                            <h3 class="text-center">BUKTI PENGIRIMAN BARANG</h3>
                            <h3 class="text-center">JUMBO BERBEK - GUDANG</h3>
                            <h5 id="tanggalCetak">Tanggal Cetak: </h5>
                            <h5 id="tanggalKirim">Tanggal Kirim: </h5>
                            <thead>
                                <tr>
                                    <th style="width: 120px">Nama Pengirim</th>
                                    <th style="width: 380px">Nama Type</th>
                                    <th style="width: 100px">Bal/Palet</th>
                                    <th style="width: 100px">Lembar</th>
                                    <th style="width: 100px">KG</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <table class="mt-5" id="TableTandaTangan">
                            <thead>
                                <tr style="height: 40px">
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 100px">
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card hidden mt-5" id="LMT">

                        <table id="TableLMT">
                            <span>PT.Kerta Rajasa Raya</span>
                            <span>Woven Bag - Jumbo Bag Industrial</span>
                            <h3 class="text-center">BUKTI PENGIRIMAN BARANG</h3>
                            <h3 class="text-center">LAMINATING - GUDANG</h3>
                            <h5 id="tanggalCetak">Tanggal Cetak: </h5>
                            <h5 id="tanggalKirim">Tanggal Kirim: </h5>
                            <thead>
                                <tr>
                                    <th style="width: 120px">Nama Pengirim</th>
                                    <th style="width: 380px">Nama Type</th>
                                    <th style="width: 100px">No Roll</th>
                                    <th style="width: 100px">Roll</th>
                                    <th style="width: 100px">Meter Net</th>
                                    <th style="width: 100px">KG</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <table class="mt-5" id="TableTandaTangan">
                            <thead>
                                <tr style="height: 40px">
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 100px">
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card hidden mt-5" id="LMT2">

                        <table id="TableLMT2">
                            <span>PT.Kerta Rajasa Raya</span>
                            <span>Woven Bag - Jumbo Bag Industrial</span>
                            <h3 class="text-center">BUKTI PENGIRIMAN BARANG</h3>
                            <h3 class="text-center">LAMINATING - @div</h3>
                            <h5 id="tanggalCetak">Tanggal Cetak: </h5>
                            <h5 id="tanggalKirim">Tanggal Kirim: </h5>
                            <thead>
                                <tr>
                                    <th style="width: 120px">Nama Pengirim</th>
                                    <th style="width: 380px">Nama Type</th>
                                    <th style="width: 100px">Bal/Palet</th>
                                    <th style="width: 100px">Lembar</th>
                                    <th style="width: 100px">KG</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <table class="mt-5" id="TableTandaTangan">
                            <thead>
                                <tr style="height: 40px">
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 100px">
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card hidden mt-5" id="CIR">

                        <table id="TableCIR">
                            <span>PT.Kerta Rajasa Raya</span>
                            <span>Woven Bag - Jumbo Bag Industrial</span>
                            <h3 class="text-center">BUKTI PENGIRIMAN BARANG</h3>
                            <h3 class="text-center">CIRCULAR LOOM - DIVISI</h3>
                            <h5 id="tanggalCetak">Tanggal Cetak: </h5>
                            <h5 id="tanggalKirim">Tanggal Kirim: </h5>
                            <thead>
                                <tr>
                                    <th style="width: 120px">Nama Pengirim</th>
                                    <th style="width: 100px">Mesin</th>
                                    <th style="width: 380px">Nama Type</th>
                                    <th style="width: 100px">Roll</th>
                                    <th style="width: 100px">Meter</th>
                                    <th style="width: 100px">KG</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <table class="mt-5" id="TableTandaTangan">
                            <thead>
                                <tr style="height: 40px">
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 100px">
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card hidden mt-5" id="CIR1">

                        <table id="TableCIR1">
                            <span>PT.Kerta Rajasa Raya</span>
                            <span>Woven Bag - Jumbo Bag Industrial</span>
                            <h3 class="text-center">BUKTI PENGIRIMAN BARANG</h3>
                            <h3 class="text-center">CIRCULAR LOOM - DIVISI</h3>
                            <h5 id="tanggalCetak">Tanggal Cetak: </h5>
                            <h5 id="tanggalKirim">Tanggal Kirim: </h5>
                            <thead>
                                <tr>
                                    <th style="width: 120px">Nama Pengirim</th>
                                    <th style="width: 100px">Mesin</th>
                                    <th style="width: 380px">Nama Type</th>
                                    <th style="width: 100px">No Roll</th>
                                    <th style="width: 100px">Roll</th>
                                    <th style="width: 100px">Meter</th>
                                    <th style="width: 100px">KG</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <table class="mt-5" id="TableTandaTangan">
                            <thead>
                                <tr style="height: 40px">
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 100px">
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card hidden mt-5" id="CLM">

                        <table id="TableCLM">
                            <span>PT.Kerta Rajasa Raya</span>
                            <span>Woven Bag - Jumbo Bag Industrial</span>
                            <h3 class="text-center">BUKTI PENGIRIMAN BARANG</h3>
                            <h3 class="text-center">CIRCULAR LOOM MOJOSARI - DIVISI</h3>
                            <h5 id="tanggalCetak">Tanggal Cetak: </h5>
                            <h5 id="tanggalKirim">Tanggal Kirim: </h5>
                            <thead>
                                <tr>
                                    <th style="width: 120px">Nama Pengirim</th>
                                    <th style="width: 100px">Mesin</th>
                                    <th style="width: 380px">Nama Type</th>
                                    <th style="width: 100px">Roll</th>
                                    <th style="width: 100px">Meter</th>
                                    <th style="width: 100px">KG</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <table class="mt-5" id="TableTandaTangan">
                            <thead>
                                <tr style="height: 40px">
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 100px">
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card hidden mt-5" id="CLM1">

                        <table id="TableCLM1">
                            <span>PT.Kerta Rajasa Raya</span>
                            <span>Woven Bag - Jumbo Bag Industrial</span>
                            <h3 class="text-center">BUKTI PENGIRIMAN BARANG</h3>
                            <h3 class="text-center">CIRCULAR LOOM MOJOSARI - DIVISI</h3>
                            <h5 id="tanggalCetak">Tanggal Cetak: </h5>
                            <h5 id="tanggalKirim">Tanggal Kirim: </h5>
                            <thead>
                                <tr>
                                    <th style="width: 120px">Nama Pengirim</th>
                                    <th style="width: 100px">Mesin</th>
                                    <th style="width: 380px">Nama Type</th>
                                    <th style="width: 100px">No Roll</th>
                                    <th style="width: 100px">Roll</th>
                                    <th style="width: 100px">Meter</th>
                                    <th style="width: 100px">KG</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <table class="mt-5" id="TableTandaTangan">
                            <thead>
                                <tr style="height: 40px">
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 100px">
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card hidden mt-5" id="MCL">

                        <table id="TableMCL">
                            <span>PT.Kerta Rajasa Raya</span>
                            <span>Woven Bag - Jumbo Bag Industrial</span>
                            <h3 class="text-center">BUKTI PENGIRIMAN BARANG</h3>
                            <h3 class="text-center">MOJOSARI CIRCULAR LOOM - DIVISI</h3>
                            <h5 id="tanggalCetak">Tanggal Cetak: </h5>
                            <h5 id="tanggalKirim">Tanggal Kirim: </h5>
                            <thead>
                                <tr>
                                    <th style="width: 120px">Nama Pengirim</th>
                                    <th style="width: 100px">Mesin</th>
                                    <th style="width: 380px">Nama Type</th>
                                    <th style="width: 100px">Roll</th>
                                    <th style="width: 100px">Meter</th>
                                    <th style="width: 100px">KG</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <table class="mt-5" id="TableTandaTangan">
                            <thead>
                                <tr style="height: 40px">
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 100px">
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card hidden mt-5" id="MCL1">

                        <table id="TableMCL1">
                            <span>PT.Kerta Rajasa Raya</span>
                            <span>Woven Bag - Jumbo Bag Industrial</span>
                            <h3 class="text-center">BUKTI PENGIRIMAN BARANG</h3>
                            <h3 class="text-center"> MOJOSARICIRCULAR LOOM - DIVISI</h3>
                            <h5 id="tanggalCetak">Tanggal Cetak: </h5>
                            <h5 id="tanggalKirim">Tanggal Kirim: </h5>
                            <thead>
                                <tr>
                                    <th style="width: 120px">Nama Pengirim</th>
                                    <th style="width: 100px">Mesin</th>
                                    <th style="width: 380px">Nama Type</th>
                                    <th style="width: 100px">No Roll</th>
                                    <th style="width: 100px">Roll</th>
                                    <th style="width: 100px">Meter</th>
                                    <th style="width: 100px">KG</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <table class="mt-5" id="TableTandaTangan">
                            <thead>
                                <tr style="height: 40px">
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 100px">
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
@endsection
