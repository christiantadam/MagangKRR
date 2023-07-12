@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance BKM-BKK Pengembalian K.E.</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="card-container" style="display: flex;">
                                    <div class="card" style="width: 100%;">
                                        <b>BKM</b>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="tanggal" style="margin-right: 10px;">Tanggal</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="date" id="tanggal" class="form-control" style="width: 100%">
                                            </div>
                                            <div class="col-md-3">
                                                Wajib di-ENTER
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="idBKM" style="margin-right: 10px;">Id. BKM</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" id="idBKM" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="namaCustomer" style="margin-right: 10px;">Nama Customer</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" id="namaCustomer" name="namaCustomerSelect" class="form-control" style="width: 100%">
                                            </div>
                                            <div class="col-md-1">
                                                <select name="namaCustomerSelect" class="form-control" onchange="fillColumns()">
                                                    <option value="MataUang 1">MU1</option>
                                                    <option value="MataUang 2">MU2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="mataUang" style="margin-right: 10px;">Mata Uang</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" id="mataUang" name="muSelect" class="form-control" style="width: 100%">
                                            </div>
                                            <div class="col-md-1">
                                                <select name="muSelect" class="form-control" onchange="fillColumns()">
                                                    <option value="MataUang 1">MU1</option>
                                                    <option value="MataUang 2">MU2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="jumlahUang" style="margin-right: 10px;">Jumlah Uang</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="number" id="jumlahUang" class="form-control" style="width: 100%">
                                            </div>
                                            <div class="col-md-1">
                                                    <label for="kurs" style="margin-right: 10px;">Kurs</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" id="kurs" class="form-control" style="width: 100%">
                                                </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="bank" style="margin-right: 10px;">Bank</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" id="bank" name="bankSelect" class="form-control" style="width: 100%">
                                            </div>
                                            <div class="col-md-1">
                                                <select name="bankSelect" class="form-control" onchange="fillColumns()">
                                                    <option value=""></option>
                                                    <option value="Bank 1">Bank1</option>
                                                    <option value="Bank 2">Bank2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="jenisPembayaran" style="margin-right: 10px;">Jenis Pembayaran</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" id="jenisPembayaran" name="jenisPembayaranSelect" class="form-control" style="width: 100%">
                                            </div>
                                            <div class="col-md-1">
                                                <select name="jenisPembayaranSelect" class="form-control" onchange="fillColumns()">
                                                    <option value=""></option>
                                                    <option value="Jenis 1">Jenis1</option>
                                                    <option value="Jenis 2">Jenis2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="kodePerkiraan" style="margin-right: 10px;">Kode Perkiraan</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" id="kodePerkiraan" name="kodePerkiraanSelect" class="form-control" style="width: 100%">
                                            </div>
                                            <div class="col-md-5">
                                                <input type="number" id="kodePerkiraan" name="kodePerkiraanSelect" class="form-control" style="width: 100%">
                                            </div>
                                            <div class="col-md-1">
                                                <select name="kodePerkiraanSelect" class="form-control" onchange="fillColumns()">
                                                    <option value=""></option>
                                                    <option value="Kd 1">Kode1</option>
                                                    <option value="Kd 2">Kode2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="uraian" style="margin-right: 10px;">Uraian</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" id="uraian" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                        

                                        <!--CARD 2-->
                                        <div class="card" style>
                                            <b>BKK</b>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="idBKK" style="margin-right: 10px;">Id. BKK</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="idBKK" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="mataUang" style="margin-right: 10px;">Mata Uang</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" id="mataUang" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="jumlahUang" style="margin-right: 10px;">Jumlah Uang</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="jumlahUang" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="bank" style="margin-right: 10px;">Bank</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="bank" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="jenisPembayaran" style="margin-right: 10px;">Jenis Pembayaran</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="number" id="jenisPembayaran" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="kodePerkiraan" style="margin-right: 10px;">Kode Perkiraan</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" id="kodePerkiraan" name="kodePerkiraanSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="number" id="kodePerkiraan" name="kodePerkiraanSelect" class="form-control" style="width: 100%">
                                                </div>
                                                <div class="col-md-1">
                                                    <select name="kodePerkiraanSelect" class="form-control" onchange="fillColumns()">
                                                        <option value="Kode 1">Kd1</option>
                                                        <option value="Kode 2">Kd2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label for="uraian" style="margin-right: 10px;">Uraian</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" id="uraian" class="form-control" style="width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div >
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="submit" name="proses" value="PROSES" class="btn btn-primary">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" name="batal" value="Batal" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" name="tampilbkm" value="TampilBKM" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" name="tampilbkk" value="TampilBKK" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" name="tutup" value="TUTUP" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
