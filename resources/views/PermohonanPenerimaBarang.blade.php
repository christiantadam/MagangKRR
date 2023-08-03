@extends('layouts.appABM')
@section('content')

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
                                                            <h2>Table Divisi</h2>
                                                            <p>Id Divisi & Divisi</p>
                                                            <table id="TableDivisi">
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID Divisi</th>
                                                                        <th>Divisi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
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
                                                    <input type="text" class="form-control" name="IdKelut" id="IdKelut"
                                                        placeholder="ID Ketua Kelompok" readonly>
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
                                                            <table id="TableKelut">
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
                                                    <input type="text" class="form-control" name="Kelompok"
                                                        id="Kelompok" placeholder="Kelompok" readonly>
                                                    <div class="text-center col-md-auto"><button type="button"
                                                            onclick="openModal3()" id="ButtonKelompok">...</button></div>
                                                    <div class="modal" id="myModal3">
                                                        <div class="modal-content">
                                                            <span class="close-btn" onclick="closeModal3()">&times;</span>
                                                            <h2>Table Kelompok</h2>
                                                            <p>Id Kelompok & Kelompok</p>
                                                            <table id="TableKelompok">
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
                                                    <input type="text" class="form-control" name="SubKelompok"
                                                        id="SubKelompok" placeholder="Sub Kelompok" readonly>
                                                    <div class="text-center col-md-auto"><button type="button"
                                                            onclick="openModal4()" id="ButtonSubKelompok">...</button>
                                                    </div>
                                                    <div class="modal" id="myModal4">
                                                        <div class="modal-content">
                                                            <span class="close-btn" onclick="closeModal4()">&times;</span>
                                                            <h2>Table Sub Kelompok</h2>
                                                            <p>ID Sub Kelompok & Sub Kelompok</p>
                                                            <table id="TableSubKelompok">
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
                                            <input type="text" class="form-control" name="IdDivisi" id="IdDivisi"
                                                placeholder="ID Divisi" readonly>
                                        </div>
                                        <div class="form-group col-md-7 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Divisi" id="Divisi"
                                                placeholder="Divisi" readonly>
                                            <div class="text-center col-md-auto"><button type="button"
                                                    onclick="openModal()" id="ButtonDivisi">...</button></div>
                                            <div class="modal" id="myModal">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal()">&times;</span>
                                                    <h2>Table Divisi</h2>
                                                    <p>Id Divisi & Divisi</p>
                                                    <table id="TableDivisi">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Divisi</th>
                                                                <th>Divisi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal()">Process</button>
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
                                                        <button type="button" onclick="closeModal1()">Process</button>
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
                                            <input type="text" class="form-control" name="IdKelut" id="IdKelut"
                                                placeholder="ID Ketua Kelompok" readonly>
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
                                                    <table id="TableKelut">
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
                                                        <button type="button" onclick="closeModal2()">Process</button>
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
                                            <input type="text" class="form-control" name="IdTransaksi"
                                                id="IdTransaksi" placeholder="ID Kode Transaksi" readonly>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="kode_Transaksi"
                                                id="kode_Transaksi" placeholder="Kode Transaksi" readonly>
                                            <div class="text-center col-md-auto"><button type="button"
                                                    onclick="openModal5()" id="ButtonTransaksi">...</button></div>
                                            <div class="modal" id="myModal5">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal5()">&times;</span>
                                                    <h2>Table Kode Transaksik</h2>
                                                    <p>Id Kode Transaksik & Kode Transaksik</p>
                                                    <table id="TableTransaksi">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Kode Transaksi</th>
                                                                <th>Kode Transaksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center col-md-auto">
                                                        <button type="button" onclick="closeModal5()">Process</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Kelompok:</span>
                                        </div>
                                        <div class="form-group col-md-3 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="IdKelut" id="IdKelut"
                                                placeholder="ID Kelompok" readonly>
                                        </div>
                                        <div class="form-group col-md-7 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Kelompok" id="Kelompok"
                                                placeholder="Kelompok" readonly>
                                            <div class="text-center col-md-auto"><button type="button"
                                                    onclick="openModal3()" id="ButtonKelut">...</button></div>
                                            <div class="modal" id="myModal3">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal3()">&times;</span>
                                                    <h2>Table Kelompok</h2>
                                                    <p>Id Kelompok & Kelompok</p>
                                                    <table id="TableKelut">
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
                                                        <button type="button" onclick="closeModal3()">Process</button>
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
                                            <input type="text" class="form-control" name="SubKelompok"
                                                id="SubKelompok" placeholder="Sub Kelompok" readonly>
                                            <div class="text-center col-md-auto"><button type="button"
                                                    onclick="openModal4()" id="ButtonSubKelompok">...</button>
                                            </div>
                                            <div class="modal" id="myModal4">
                                                <div class="modal-content">
                                                    <span class="close-btn" onclick="closeModal4()">&times;</span>
                                                    <h2>Table Sub Kelompok</h2>
                                                    <p>ID Sub Kelompok & Sub Kelompok</p>
                                                    <table id="TableSubKelompok">
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
                                                        <button type="button" onclick="closeModal4()">Process</button>
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
                                        <input type="text" class="form-control" name="typeBarang"
                                            id="typeBarang" placeholder="Kode Type Barang" readonly>
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
                                                            <th>Kode Type Barang</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
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
                                        <input type="text" class="form-control" name="NamaBarang"
                                            id="NamaBarang" placeholder="Nama Barang" readonly>
                                        <div class="text-center col-md-auto"><button type="button"
                                                onclick="openModal7()" id="ButtonNamaBarang">...</button>
                                        </div>
                                        <div class="modal" id="myModal7">
                                            <div class="modal-content">
                                                <span class="close-btn" onclick="closeModal7()">&times;</span>
                                                <h2>Table Kode Nama Barang</h2>
                                                <table id="TableNamaBarang">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Barang</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
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
                                                <div class="text-center col-md-auto" onclick="toggleHiddenTable()">
                                                    <button type="Button">Isi</button>
                                                </div>
                                                <div class="text-center col-md-auto"><button
                                                        type="button">Koreksi</button></div>
                                                <div class="text-center col-md-auto"><button type="button">Hapus</button>
                                                </div>
                                                <div class="text-center col-md-auto"><button
                                                        type="button">Proses</button></div>
                                                <div class="text-center col-md-auto"><button
                                                        type="button">Keluar</button></div>
                                            </div>
                                        </div>
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
        </div>
        <main class="py-4">
            @yield('content')
        </main>

        <script>
            $(document).ready(function() {
                $('.dropdown-submenu a.test').on("click", function(e) {
                    $(this).next('ul').toggle();
                    e.stopPropagation();
                    e.preventDefault();
                });
            });

            $(document).ready(function() {
                $('#TableType').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });

            var ButtonDivisi = document.getElementById('ButtonDivisi')

            ButtonDivisi.addEventListener("click", function(event) {
                event.preventDefault();
            });

            var ButtonObjek = document.getElementById('ButtonObjek')

            ButtonObjek.addEventListener("click", function(event) {
                event.preventDefault();
            });

            var ButtonKelut = document.getElementById('ButtonKelut')

            ButtonKelut.addEventListener("click", function(event) {
                event.preventDefault();
            });

            var ButtonKelompok = document.getElementById('ButtonKelompok')

            ButtonKelompok.addEventListener("click", function(event) {
                event.preventDefault();
            });

            var ButtonSubKelompok = document.getElementById('ButtonSubKelompok')

            ButtonSubKelompok.addEventListener("click", function(event) {
                event.preventDefault();
            });

            var ButtonTransaksi = document.getElementById('ButtonTransaksi')

            ButtonTransaksi.addEventListener("click", function(event) {
                event.preventDefault();
            });

            var ButtonNamaBarang = document.getElementById('ButtonNamaBarang')

            ButtonNamaBarang.addEventListener("click", function(event) {
                event.preventDefault();
            });

            function openModal() {
                var modal = document.getElementById('myModal');
                modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
            }

            function closeModal() {
                var modal = document.getElementById('myModal');
                modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
            }

            function openModal1() {
                var modal = document.getElementById('myModal1');
                modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
            }

            function closeModal1() {
                var modal = document.getElementById('myModal1');
                modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
            }

            function openModal2() {
                var modal = document.getElementById('myModal2');
                modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
            }

            function closeModal2() {
                var modal = document.getElementById('myModal2');
                modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
            }

            function openModal3() {
                var modal = document.getElementById('myModal3');
                modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
            }

            function closeModal3() {
                var modal = document.getElementById('myModal3');
                modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
            }

            function openModal4() {
                var modal = document.getElementById('myModal4');
                modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
            }

            function closeModal4() {
                var modal = document.getElementById('myModal4');
                modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
            }

            function openModal5() {
                var modal = document.getElementById('myModal5');
                modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
            }

            function closeModal5() {
                var modal = document.getElementById('myModal5');
                modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
            }

            function openModal6() {
                var modal = document.getElementById('myModal6');
                modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
            }

            function closeModal6() {
                var modal = document.getElementById('myModal6');
                modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
            }



            document.addEventListener("DOMContentLoaded", function() {
                var hiddenTable = document.getElementById('hiddenTable');
                hiddenTable.style.display = 'block'; // Tampilkan tabel type saat halaman pertama kali dibuka

                var hiddenSection = document.getElementById('hiddenSection');
                hiddenSection.style.display = 'none'; // Sembunyikan pemberi barang2 saat halaman pertama kali dibuka
            });

            function toggleHiddenTable() {
                var hiddenTable = document.getElementById('hiddenTable');
                var hiddenSection = document.getElementById('hiddenSection');

                if (hiddenTable.style.display === 'none') {
                    hiddenTable.style.display = 'block'; // Tampilkan tabel type saat tombol "Isi" ditekan
                    hiddenSection.style.display = 'none'; // Sembunyikan pemberi barang2 saat tombol "Isi" ditekan
                } else {
                    hiddenTable.style.display = 'none'; // Sembunyikan tabel type saat tombol "Isi" ditekan lagi
                    hiddenSection.style.display = 'block'; // Tampilkan pemberi barang2 saat tombol "Isi" ditekan lagi
                }
            }

            $(document).ready(function() {
                $('#TableDivisi').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });

            $(document).ready(function() {
                $('#TableObjek').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });

            $(document).ready(function() {
                $('#TableKelut').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });

            $(document).ready(function() {
                $('#TableKelompok').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });
            $(document).ready(function() {
                $('#TableSubKelompok').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });

            $(document).ready(function() {
                $('#TableTransaksi').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });

            $(document).ready(function() {
                $('#TableTypeBarang').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });

            $(document).ready(function() {
                $('#TableNamaBarang').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });
        </script>
    </body>
@endsection
