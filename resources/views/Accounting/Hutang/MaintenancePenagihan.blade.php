@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Penagihan Tanda</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->

                                <div class="container fluid">
                                    <div class="row">
                                        
                                        <div class="col-md-2 ">
                                            <label for="id">ID Penagihan</label>
                                        </div>
                                        <div class="col-md-2 ">
                                            <select name="nama_select" class="form-control" style="width: 400px;">
                                                <option value="option1">Pilihan 1</option>
                                                <option value="option2">Pilihan 2</option>
                                                <option value="option3">Pilihan 3</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 d-flex ml-auto">
                                            <label for="id" >Tanggal </label>
                                            <input type="date" name="jenissupplier1" class="form-control" style="width: 100%"></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="container fluid">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="id">Jenis Supplier</label>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="nama_select" class="form-control" style="width: 400px;">
                                                <option value="option1">Pilihan 1</option>
                                                <option value="option2">Pilihan 2</option>
                                                <option value="option3">Pilihan 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="container fluid">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="id">ID Penagihan Supplier</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="jenisbayar" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                </div>

                                <!--CARD-->
                                <p><div class="container fluid">
                                    <div class="card">
                                        <p><div class="row">
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="id" style="padding-left: 15px">Mata Uang</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="matauang" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="id" style="padding-left: 15px">Tagihan</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="number" name="tagihan" class="form-control">
                                                        <input type="submit" name="dirupiahkan" value="DIRUPIAHKAN" class="btn btn-primary" style="width: 100%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="id">Pembulatan</label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="number" name="pembulatan" class="form-control">
                                                        <input type="submit" name="dirupiahkan" value="DIRUPIAHKAN" class="btn btn-primary"><p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <input type="checkbox" name="status">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <label for="id">Free of Charge</label>
                                                        <input type="submit" name="keterangan" value="Keterangan" class="btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

                                    <p>
                                    <div class="radio-container">
                                        <div>
                                            <input type="radio" name="radiogrup" value="radio_1" id="radio_1">
                                            <label for="radio_1">Detail PO</label>
                                        </div>
                                        <button>Tampilkan Surat Jalan</button>
                                        <div>
                                            <input type="radio" name="radiogrup" value="radio_2" id="radio_2">
                                            <label for="radio_2">Detail Faktur Pajak</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="radiogrup" value="radio_3" id="radio_3">
                                            <label for="radio_3">PIB</label>
                                        </div>
                                    </div>

                                    <!--TABEL-->
                                    <p>
                                    <div class="table-container">
                                        <div class="table-col">
                                            <table style="width: 80%;" class="table-dark">
                                                <thead>
                                                    <tr>
                                                        <th>ID Div</th>
                                                        <th>SPPB</th>
                                                        <th>Nilai</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="table-col">
                                            <table style="width: 105%" class="table-dark">
                                                <thead>
                                                    <tr>
                                                        <th>ID Detail</th>
                                                        <th>NOMOR FAKTUR</th>
                                                        <th>Nilai MURNI</th>
                                                        <th>PAJAK</th>
                                                        <th>Nilai Pajak</th>
                                                        <th>KURS</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>

                                    <div>
                                        <p>
                                        <div style="display: inline-block; vertical-align: middle; padding-right: 180px">
                                            <h6 style="margin: 0;">TOTAL Detail Penagihan</h6>
                                        </div>
                                        <div class="numeric-column" id="numeric-column">
                                            <!-- Angka akan ditambahkan secara dinamis menggunakan JavaScript -->
                                        </div>

                                        <div style="display: inline-block; vertical-align: middle; padding-left: 110px">
                                            <h6 style="margin: 0;">TOTAL Detail Faktur Pajak</h6>
                                        </div>
                                        <div class="numeric-column" id="numeric-column">
                                            <!-- Angka akan ditambahkan secara dinamis menggunakan JavaScript -->
                                        </div>
                                    </div>

                                    <p>
                                    <div class="row">
                                        <div class="col-2">
                                            <input type="submit" name="isi" value="ISI Detail" class="btn btn-primary" disabled>
                                        </div>
                                        <div class="col-2">
                                            <input type="submit" name="koreksi" value="KOREKSI Detail" class="btn btn-primary" disabled>
                                        </div>
                                        <div class="col-1">
                                            <input type="submit" name="isi" value="HAPUS Detail" class="btn btn-primary" disabled>
                                        </div>
                                    </div>

                                    <hr style="height:2px;">
                                    <div class="row">
                                        <div style="padding-left: 15px">
                                            <input type="submit" name="isi" value="ISI" class="btn btn-primary">
                                        </div>
                                        <div class="col-1">
                                            <input type="submit" name="koreksi" value="KOREKSI" class="btn btn-primary">
                                        </div>
                                        <div class="col-1">
                                            <input type="submit" name="isi" value="PRINT" class="btn btn-primary" disabled>
                                        </div>
                                        <div class="col-9">
                                            <input type="submit" name="keluar" value="KELUAR" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
