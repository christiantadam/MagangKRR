@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance Penagihan Surat Jalan</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="card" style="display: flex;">
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
                                            <label for="nomorSP" style="margin-right: 10px;">Mata Uang</label>
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
                                        <div class="col-md-2">
                                            <label for="syaratPembayaran" style="margin-right: 10px;">Syarat Pembayaran</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" id="syaratPembayaran" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-1">
                                            Hari
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
                                        <div class="col-md-2">
                                            <select name="jenisPajakSelect" i="jenisPajak" class="form-control" onchange="fillColumns()">
                                                <option value=""></option>
                                                <option value="Jenis 1">Jenis1</option>
                                                <option value="Jenis 2">Jenis2</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <label for="PPN" style="margin-right: 10px;">PPN%</label>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="number" id="PPN" name="bankSelect" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="jenisPajak" style="margin-right: 10px;">No. Penagihan UM</label>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="jenisPajakSelect" i="jenisPajak" class="form-control" onchange="fillColumns()">
                                                <option value=""></option>
                                                <option value="Jenis 1">Jenis1</option>
                                                <option value="Jenis 2">Jenis2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!--CARD 2-->
                                <div class="card">
                                <br><div>
                                    <div style="overflow-y: auto; max-height: 400px;">
                                        <table style="width: 100%; table-layout: fixed;">
                                            <colgroup>
                                                <col style="width: 25%;">
                                                <col style="width: 25%;">
                                                <col style="width: 25%;">
                                                <col style="width: 25%;">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Surat Jalan</th>
                                                    <th>Tanggal</th>
                                                    <th>Nilai Penagihan</th>
                                                    <th>Surat Pesanan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Data 1</td>
                                                    <td>Data 2</td>
                                                    <td>Data 3</td>
                                                    <td>Data 4</td>
                                                </tr>
                                                <!-- Tambahkan baris lainnya jika diperlukan -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-10">
                                        <input type="submit" name="lihatItem" value="Lihat Item" class="btn d-flex ml-auto">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" name="hapustItem" value="Hapus Item" class="btn d-flex ml-auto">
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="suratJalan" style="margin-right: 10px;">Surat Jalan</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="suratJalanSelect" id="suratJalan" class="form-control" onchange="fillColumns()">
                                            <option value=""></option>
                                            <option value="Surat 1">surat1</option>
                                            <option value="Surat 2">surat2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="dokumen" style="margin-right: 10px;">Dokumen</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="dokumenSelect" id="dokumen" class="form-control" onchange="fillColumns()">
                                            <option value=""></option>
                                            <option value="Dokumen 1">Dok1</option>
                                            <option value="Dokumen 2">Dok2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="noBC24" style="margin-right: 10px;">No. BC 2.4</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="noBC24" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="tanggalBC24" style="margin-right: 10px;">Tanggal BC 2.4</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" id="tanggalBC24" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="nilaiPenagihan" style="margin-right: 10px;">Nilai Penagihan</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" id="nilaiPenagihan" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="nilaiUangMuka" style="margin-right: 10px;">Nilai Uang Muka</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="nilaiUangMuka" class="form-control" style="width: 100%">
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
