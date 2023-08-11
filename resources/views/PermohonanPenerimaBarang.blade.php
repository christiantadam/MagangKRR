@extends('layouts.appABM')
@section('content')
    <script type="text/javascript" src="{{ asset('js/BarcodeKerta2/PermohonanPenerimaBarang.js') }}"></script>

    <body onload="Greeting()">

        <head>
            <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        </head>
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

            #hiddenTable {
                display: none;
            }
        </style>
        <div id="app">
            <div class="card-body-container">
                <div class="card-body" style="flex: 1; margin-right: -20px; margin-left: 75px;">
                    <!-- Konten Card Body Kiri -->
                    <div class="form-wrapper mt-4">
                        <div class="form-container">
                            <div class="card">
                                <div class="card-header">Penerima Barang</div>
                                <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                                    <div class="form berat_woven">
                                        <form action="#" method="post" role="form">
                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Divisi:</span>
                                                </div>
                                                <div class="form-group col-md-3 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="IdDivisi"
                                                        id="IdDivisi" placeholder="ID Divisi" readonly>
                                                </div>
                                                <div class="form-group col-md-7 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Divisi" id="Divisi"
                                                        placeholder="Divisi" readonly>
                                                    <div class="text-center col-md-auto"><button type="button"
                                                            onclick="openModal()" id="ButtonDivisi">...</button></div>
                                                    <div class="modal" id="myModal">
                                                        <div class="modal-content">
                                                            <span class="close-btn" onclick="closeModal()">&times;</span>
                                                            <h2>Table Divisi Pemberi</h2>
                                                            <p>Id Divisi & Divisi</p>
                                                            <table id="TablePenerimaDivisi">
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
                                                                </tbody>
                                                            </table>
                                                            <div class="text-center col-md-auto">
                                                                <button type="button"
                                                                    onclick="closeModal()">Process</button>
                                                            </div>
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
                                                        placeholder="ID Objek" readonly>
                                                </div>
                                                <div class="form-group col-md-7 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="Objek" id="Objek"
                                                        placeholder="Objek" readonly>
                                                    <div class="text-center col-md-auto"><button type="button"
                                                            onclick="openModal1()" id="ButtonObjek">...</button></div>
                                                    <div class="modal" id="myModal1">
                                                        <div class="modal-content">
                                                            <span class="close-btn" onclick="closeModal1()">&times;</span>
                                                            <h2>Table Objek</h2>
                                                            <p>Id Objek & Objek</p>
                                                            <table id="TablePenerimaObjek">
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
                                                                <button type="button"
                                                                    onclick="closeModal1()">Process</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Ketua Kelompok:</span>
                                                </div>
                                                <div class="form-group col-md-3 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="IdKelompokUtama" id="IdKelompokUtama"
                                                        placeholder="ID Kelompok Utama" readonly>
                                                </div>
                                                <div class="form-group col-md-7 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="ketua_Kelompok"
                                                        id="ketua_Kelompok" placeholder="Ketua Kelompok" readonly>
                                                    <div class="text-center col-md-auto"><button type="button"
                                                            onclick="openModal2()" id="ButtonKelut">...</button></div>
                                                    <div class="modal" id="myModal2">
                                                        <div class="modal-content">
                                                            <span class="close-btn" onclick="closeModal2()">&times;</span>
                                                            <h2>Table Ketua Kelompok</h2>
                                                            <p>Id Ketua Kelompok & Ketua Kelompok</p>
                                                            <table id="TablePenerimaKelut">
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID Ketua Kelompok</th>
                                                                        <th>Ketua Kelompok</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                            <div class="text-center col-md-auto">
                                                                <button type="button"
                                                                    onclick="closeModal2()">Process</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Tanggal:</span>
                                                </div>
                                                <div class="form-group col-md-3 mt-3 mt-md-0">
                                                    <input type="date" class="form-control" name="Jenis"
                                                        id="Jenis" placeholder="Jenis">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Kelompok:</span>
                                                </div>
                                                <div class="form-group col-md-3 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="IdKelompok"
                                                        id="IdKelompok" placeholder="ID Kelompok" readonly>
                                                </div>
                                                <div class="form-group col-md-7 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="NamaKelompok"
                                                        id="NamaKelompok" placeholder="Kelompok" readonly>
                                                    <div class="text-center col-md-auto"><button type="button"
                                                            onclick="openModal3()" id="ButtonKelompok">...</button></div>
                                                    <div class="modal" id="myModal3">
                                                        <div class="modal-content">
                                                            <span class="close-btn" onclick="closeModal3()">&times;</span>
                                                            <h2>Table Kelompok</h2>
                                                            <p>Id Kelompok & Kelompok</p>
                                                            <table id="TablePenerimaKelompok">
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID Kelompok</th>
                                                                        <th>Kelompok</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                            <div class="text-center col-md-auto">
                                                                <button type="button"
                                                                    onclick="closeModal3()">Process</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-2 d-flex justify-content-end">
                                                    <span class="aligned-text">Sub Kelompok:</span>
                                                </div>
                                                <div class="form-group col-md-3 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="IdSubKelompok"
                                                        id="IdSubKelompok" placeholder="ID Sub Kelompok" readonly>
                                                </div>
                                                <div class="form-group col-md-7 mt-3 mt-md-0">
                                                    <input type="text" class="form-control" name="NamaSubKelompok"
                                                        id="NamaSubKelompok" placeholder="Sub Kelompok" readonly>
                                                    <div class="text-center col-md-auto"><button type="button"
                                                            onclick="openModal4()" id="ButtonSubKelompok">...</button>
                                                    </div>
                                                    <div class="modal" id="myModal4">
                                                        <div class="modal-content">
                                                            <span class="close-btn" onclick="closeModal4()">&times;</span>
                                                            <h2>Table Sub Kelompok</h2>
                                                            <p>ID Sub Kelompok & Sub Kelompok</p>
                                                            <table id="TablePenerimaSubKelompok">
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID Sub Kelompok</th>
                                                                        <th>Sub Kelompok</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                            <div class="text-center col-md-auto">
                                                                <button type="button"
                                                                    onclick="closeModal4()">Process</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-wrapper mt-4">
                <div class="form-container" style="margin-left: 95px">
                    <div class="card">
                        <div class="card-header">Pemberi Barang</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                            <div class="form berat_woven">
                                <form action="#" method="post" role="form">
                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Divisi:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="IdDivisi2" id="IdDivisi2"
                                                placeholder="ID Divisi" readonly>
                                        </div>
                                        <div class="form-group col-md-7 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Divisi2" id="Divisi2"
                                                placeholder="Divisi" readonly>
                                            <div class="text-center col-md-auto"><button type="button"
                                                    onclick="openModal7()" id="ButtonDivisi">...</button></div>
                                            <div class="modal" id="myModal7">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal7()">&times;</span>
                                                    <h2>Table Divisi Penerima</h2>
                                                    <p>Id Divisi & Divisi</p>
                                                    <table id="TablePemberiDivisi">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Divisi</th>
                                                                <th>Divisi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($dataDivisi2 as $data)
                                                                <tr>
                                                                    <td>{{ $data->IdDivisi }}</td>
                                                                    <td>{{ $data->NamaDivisi }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal7()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Objek:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="IdObjek2" id="IdObjek2"
                                                placeholder="ID Objek" readonly>
                                        </div>
                                        <div class="form-group col-md-7 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Objek2" id="Objek2"
                                                placeholder="Objek" readonly>
                                            <div class="text-center col-md-auto"><button type="button"
                                                    onclick="openModal8()" id="ButtonObjek">...</button></div>
                                            <div class="modal" id="myModal8">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal8()">&times;</span>
                                                    <h2>Table Objek</h2>
                                                    <p>Id Objek & Objek</p>
                                                    <table id="TablePemberiObjek">
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
                                                        <button type="button" onclick="closeModal8()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Ketua Kelompok:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="IdKelompokUtama2" id="IdKelompokUtama2"
                                                placeholder="ID Ketua Kelompok" readonly>
                                        </div>
                                        <div class="form-group col-md-7 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="ketua_Kelompok2"
                                                id="ketua_Kelompok2" placeholder="Ketua Kelompok" readonly>
                                            <div class="text-center col-md-auto"><button type="button"
                                                    onclick="openModal9()" id="ButtonKelut">...</button></div>
                                            <div class="modal" id="myModal9">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal9()">&times;</span>
                                                    <h2>Table Ketua Kelompok</h2>
                                                    <p>Id Ketua Kelompok & Ketua Kelompok</p>
                                                    <table id="TablePemberiKelut">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Ketua Kelompok</th>
                                                                <th>Ketua Kelompok</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal9()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Kode Transaksi:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Transaksi" id="Transaksi"
                                                placeholder="Kode Transakski">
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Transaksi" id="Transaksi"
                                                placeholder="Kode Transakski">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Kelompok:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="IdKelompok2"
                                                id="IdKelompok2" placeholder="ID Kelompok" readonly>
                                        </div>
                                        <div class="form-group col-md-7 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Kelompok2" id="Kelompok2"
                                                placeholder="Kelompok" readonly>
                                            <div class="text-center col-md-auto"><button type="button"
                                                    onclick="openModal10()" id="ButtonKelut">...</button></div>
                                            <div class="modal" id="myModal10">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal10()">&times;</span>
                                                    <h2>Table Kelompok</h2>
                                                    <p>Id Kelompok & Kelompok</p>
                                                    <table id="TablePemberiKelompok">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Kelompok</th>
                                                                <th>Kelompok</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal10()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Sub Kelompok:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="IdSubKelompok2"
                                                id="IdSubKelompok2" placeholder="ID Sub Kelompok" readonly>
                                        </div>
                                        <div class="form-group col-md-7 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="SubKelompok2"
                                                id="SubKelompok2" placeholder="Sub Kelompok" readonly>
                                            <div class="text-center col-md-auto"><button type="button"
                                                    onclick="openModal11()" id="ButtonSubKelompok">...</button>
                                            </div>
                                            <div class="modal" id="myModal11">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal11()">&times;</span>
                                                    <h2>Table Sub Kelompok</h2>
                                                    <p>ID Sub Kelompok & Sub Kelompok</p>
                                                    <table id="TablePemberiSubKelompok">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Sub Kelompok</th>
                                                                <th>Sub Kelompok</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal11()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


        <div id="hiddenSection" class="form-wrapper mt-4" style="margin-left: 500px; display: none;">
            <div class="form-container">
                <div class="card">
                    <div class="card-header">Pemberi Barang2</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">

                        <div class="form berat_woven">
                            <form action="#" method="post" role="form">
                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Kode Barang:</span>
                                    </div>
                                    <div class="form-group col-md-3 mt-3 mt-md-0">
                                        <input type="text" class="form-control" name="Barang" id="Barang"
                                            placeholder="Barang">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Kode Type Barang:</span>
                                    </div>
                                    <div class="form-group col-md-7 mt-3 mt-md-0">
                                        <input type="text" class="form-control" name="typeBarang" id="typeBarang"
                                            placeholder="Kode Type Barang" readonly>
                                        <div class="text-center col-md-auto"><button type="button"
                                                onclick="openModal6()" id="ButtontypeBarang">...</button>
                                        </div>
                                        <div class="modal" id="myModal6">
                                            <div class="modal-content">
                                                <span class="close-btn" onclick="closeModal6()">&times;</span>
                                                <h2>Table Kode Type Barang</h2>
                                                <table id="TableTypeBarang">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Type</th>
                                                            <th>Id Type</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <td>Test 1</td>
                                                        <td>Test 1</td>
                                                    </tbody>
                                                </table>
                                                <div class="text-center col-md-auto">
                                                    <button type="button" onclick="closeModal6()">Process</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Nama Barang:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input type="text" class="form-control" name="NamaBarang" id="NamaBarang"
                                            placeholder="Nama Barang" readonly>
                                        <div class="text-center col-md-auto"><button type="button"
                                                onclick="openModal12()" id="ButtonNamaBarang">...</button>
                                        </div>
                                        <div class="modal" id="myModal12">
                                            <div class="modal-content">
                                                <span class="close-btn" onclick="closeModal12()">&times;</span>
                                                <h2>Table Kode Nama Barang</h2>
                                                <table id="TableNamaBarang">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Barang</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <td>Test 1</td>
                                                    </tbody>
                                                </table>
                                                <div class="text-center col-md-auto">
                                                    <button type="button" onclick="closeModal12()">Process</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Keterangan:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input type="text" class="form-control" name="Keterangan" id="Keterangan"
                                            placeholder="Keterangan">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Posisi:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input type="text" class="form-control" name="Posisi" id="Posisi"
                                            placeholder="Posisi">
                                    </div>
                                </div>
                                <div class="form-wrapper mt-4">
                                    <div class="form-container">
                                        <div class="card"
                                            style="margin-bottom: 30px; margin-left: 30px; margin-right: 30px;">
                                            <div class="card-header">Stok Akhir Barang</div>
                                            <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                                                <div class="form berat_woven">
                                                    <form action="#" method="post" role="form">
                                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                                            <span class="aligned-text">Jumlah Barang:</span>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                                <span class="aligned-text">Primer:</span>
                                                            </div>
                                                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                                                <input type="text" class="form-control" name="Primer"
                                                                    id="Primer" placeholder="Primer">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                                <span class="aligned-text">Sekunder:</span>
                                                            </div>
                                                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                                                <input type="text" class="form-control"
                                                                    name="Sekunder" id="Sekunder"
                                                                    placeholder="Sekunder">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                                <span class="aligned-text">Tritier:</span>
                                                            </div>
                                                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                                                <input class="form-control" name="Tritier" rows="Tritier"
                                                                    placeholder="Tritier">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-wrapper mt-4">
                                            <div class="form-container">
                                                <div class="card"
                                                    style="margin-bottom: 30px; margin-left: 30px; margin-right: 30px;">
                                                    <div class="card-header">Jumlah Yang Akan Dikeluarkan</div>
                                                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                                                        <div class="form berat_woven">
                                                            <form action="#" method="post" role="form">
                                                                <div
                                                                    class="form-group col-md-2 d-flex justify-content-end">
                                                                    <span class="aligned-text">Jumlah
                                                                        Barang:</span>
                                                                </div>
                                                                <div class="row">
                                                                    <div
                                                                        class="form-group col-md-2 d-flex justify-content-end">
                                                                        <span class="aligned-text">Primer:</span>
                                                                    </div>
                                                                    <div class="form-group col-md-6 mt-3 mt-md-0">
                                                                        <input type="text" class="form-control"
                                                                            name="Primer" id="Primer"
                                                                            placeholder="Primer">
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div
                                                                        class="form-group col-md-2 d-flex justify-content-end">
                                                                        <span class="aligned-text">Sekunder:</span>
                                                                    </div>
                                                                    <div class="form-group col-md-6 mt-3 mt-md-0">
                                                                        <input type="text" class="form-control"
                                                                            name="Sekunder" id="Sekunder"
                                                                            placeholder="Sekunder">
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div
                                                                        class="form-group col-md-2 d-flex justify-content-end">
                                                                        <span class="aligned-text">Tritier:</span>
                                                                    </div>
                                                                    <div class="form-group col-md-6 mt-3 mt-md-0">
                                                                        <input class="form-control" name="Tritier"
                                                                            rows="Tritier" placeholder="Tritier">
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
                </div>
            </div>
        </div>


        <div id="hiddenTable" class="form-wrapper mt-4" style="margin-left: 360px; width: 2000px;">
            <div class="form-container">
                <div class="card mt-auto" style="width: 1200px">
                    <div class="card-header">Type</div>
                    <table id="TableType">
                        <thead>
                            <th>Kode Trans</th>
                            <th>Nama Barang</th>
                            <th>Alasan Mutasi</th>
                            <th>Divisi Penerima</th>
                            <th>Objek Penerima</th>
                            <th>Kelut Penerima</th>
                            <th>Kelompok Penerima</th>
                            <th>Sub Kelompok Penerima</th>
                            <th>Pemohon</th>
                            <th>Tanggal Mohon</th>
                        </thead>
                        <tbody>
                            <!-- Isi konten tabel type di sini -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="form-wrapper mt-4" style="margin-left: 95px">
            <div class="form-container">
                <div class="card" style="margin-bottom: 30px; margin-left: 30px; margin-right: 30px;">
                    <div class="card-header">Dimutasi</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form berat_woven">
                            <form action="#" method="post" role="form">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Jumlah Barang:</span>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Primer:</span>
                                    </div>
                                    <div class="form-group col-md-6 mt-3 mt-md-0">
                                        <input type="text" class="form-control" name="Primer" id="Primer"
                                            placeholder="Primer">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Sekunder:</span>
                                    </div>
                                    <div class="form-group col-md-6 mt-3 mt-md-0">
                                        <input type="text" class="form-control" name="Sekunder" id="Sekunder"
                                            placeholder="Sekunder">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Tritier:</span>
                                    </div>
                                    <div class="form-group col-md-6 mt-3 mt-md-0">
                                        <input class="form-control" name="Tritier" rows="Tritier" placeholder="Tritier">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Alasan Mutasi:</span>
                                    </div>
                                    <div class="form-group col-md-6 mt-3 mt-md-0">
                                        <input class="form-control" name="Mutasi" rows="Mutasi" placeholder="Mutasi">
                                    </div>
                                </div>

                                <div class="form-wrapper mt-4">
                                    <div class="form-container">
                                        <div class="row mt-3 mb-3">
                                            <div class="col- row justify-content-md-center">
                                                <div class="text-center col-md-auto"><button style="width: 100px"
                                                        type="button" onclick="toggleHiddenTable()">Isi</button>
                                                </div>
                                                <div class="text-center col-md-auto"><button style="width: 100px"
                                                        type="button">Koreksi</button></div>
                                                <div class="text-center col-md-auto"><button style="width: 100px"
                                                        type="button">Hapus</button>
                                                </div>
                                                <div class="text-center col-md-auto"><button style="width: 100px"
                                                        type="button">Proses</button></div>
                                                <div class="text-center col-md-auto">
                                                    <button style="width: 100px" type="button"
                                                        id="keluarButton">Keluar</button>
                                                    <button style="width: 100px" class="d-none" type="button"
                                                        id="batalButton" onclick="toggleHiddenTable2()">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <main class="py-4">
                @yield('content')
            </main>
    </body>
@endsection
