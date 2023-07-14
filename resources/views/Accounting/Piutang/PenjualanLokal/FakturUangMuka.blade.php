@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">FAKTUR UANG MUKA</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="card" style="display: flex;">
                                    <div  style="width: 100%;">
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="tanggal" style="margin-right: 10px;">Tanggal</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="date" id="tanggal" class="form-control" style="width: 100%">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" id="abc" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="namaCustomer" style="margin-right: 10px;">Nama Customer</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="namaCustomer" class="form-control" style="width: 100%">
                                            </div>
                                            <div class="col-md-3">
                                                <button id="btnLihatSemuaCustomer">Lihat Semua Customer</button>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="noPenagihan" style="margin-right: 10px;">No. Penagihan</label>
                                            </div>
                                            <div class="col-md-5">
                                                <select name="noPenagihanSelect" class="form-control" onchange="fillColumns()">
                                                    <option value="NoPenagihan 1">No1</option>
                                                    <option value="NoPenagihan 2">No2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="jenisCustomer" style="margin-right: 10px;">Jenis Customer</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="jenisCustomer" name="muSelect" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="alamat" style="margin-right: 10px;">Alamat</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" id="alamat" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="nomorSP" style="margin-right: 10px;">Nomor SP</label>
                                            </div>
                                            <div class="col-md-3">
                                                <select name="bankSelect" id="nomorSP" class="form-control" onchange="fillColumns()">
                                                    <option value=""></option>
                                                    <option value="No SP 1">Nomor SP 1</option>
                                                    <option value="No SP 2">Nomor SP 2</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="nomorPO" style="margin-right: 10px;">Nomor PO</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="nomorPO" name="bankSelect" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="nomorSP" style="margin-right: 10px;">Nomor SP </label>
                                            </div>
                                            <div class="col-md-3">
                                                <select name="bankSelect" id="nomorSP" class="form-control" onchange="fillColumns()">
                                                    <option value=""></option>
                                                    <option value="No PO 1">no1</option>
                                                    <option value="No PO 2">no2</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="nilaiKurs" style="margin-right: 10px;">Nilai Kurs</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="nilaiKurs" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="penagihanPajak" style="margin-right: 10px;">Penagihan Pajak</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="date" id="penagihanPajak" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="userPenagih" style="margin-right: 10px;">User Penagih</label>
                                            </div>
                                            <div class="col-md-5">
                                                <select name="userPenagihSelect" id="userPenagih" class="form-control" onchange="fillColumns()">
                                                    <option value="UserPenagih 1">User1</option>
                                                    <option value="UserPenagih 2">User2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="jenisPajak" style="margin-right: 10px;">Jenis Pajak</label>
                                            </div>
                                            <div class="col-md-3">
                                                <select name="jenisPajakSelect" i="jenisPajak" class="form-control" onchange="fillColumns()">
                                                    <option value=""></option>
                                                    <option value="Jenis 1">Jenis1</option>
                                                    <option value="Jenis 2">Jenis2</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <label for="PPN" style="margin-right: 10px;">PPN%</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" id="PPN" name="bankSelect" class="form-control" style="width: 100%">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <label for="dokumen" style="margin-right: 10px;">Dokumen</label>
                                            </div>
                                            <div class="col-md-3">
                                                <select name="kodePerkiraanSelect" id="dokumen" class="form-control" onchange="fillColumns()">
                                                    <option value=""></option>
                                                    <option value="Kd 1">Dok1</option>
                                                    <option value="Kd 2">Dok2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--CARD 2-->
                                <br>
                                <div class="card">
                                    <div class="d-flex">
                                        <div class="col-md-3">
                                            <label for="uangMasuk" style="margin-right: 10px;">Uang Masuk</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" id="uangMasuk" name="bankSelect" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-2">
                                           Enter
                                        </div>
                                        <div class="col-md-1">
                                            <label for="total" style="margin-right: 10px;">Total</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" id="total" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-md-3">
                                            <label for="nilaiSblmPPN" style="margin-right: 10px;">Nilai Sblm PPN</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" id="nilaiSblmPPN" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-md-3">
                                            <label for="nilaiPpn" style="margin-right: 10px;">Nilai Ppn</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" id="nilaiPpn" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-md-3">
                                            <label for="terbilang" style="margin-right: 10px;">Terbilang</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="number" id="terbilang" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                
                                <br><div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <input type="submit" name="isi" value="Isi" class="btn btn-primary">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" name="koreksi" value="Koreksi" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" name="hapus" value="Hapus" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" name="keluar" value="Keluar" class="btn btn-primary d-flex ml-auto">
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
