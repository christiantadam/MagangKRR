@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maint Penagihan Surat Jalan Ekspor</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div>
                                    <div class="d-flex">
                                        <div class="col-md-3">
                                            <label for="tanggal" style="margin-right: 10px;">Tanggal</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="date" id="tanggal" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-md-3">
                                            <label for="namaCustomer" style="margin-right: 10px;">Nama Customer</label>
                                        </div>
                                        <div class="col-md-7">
                                            <select name="userPenagihSelect" id="userPenagih" class="form-control" onchange="fillColumns()">
                                                <option value="UserPenagih 1">User1</option>
                                                <option value="UserPenagih 2">User2</option>
                                            </select>
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
                                            <label for="suratJalan" style="margin-right: 10px;">Surat Jalan</label>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="suratJalanSelect" class="form-control" onchange="fillColumns()">
                                                <option value="SuratJalan 1">SJ1</option>
                                                <option value="SuratJalan 2">SJ2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-md-3">
                                            <label for="mataUang" style="margin-right: 10px;">Mata Uang</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" id="mataUang" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-md-3">
                                            <label for="nilaiKurs" style="margin-right: 10px;">Nilai Kurs</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" id="nilaiKurs" name="bankSelect" class="form-control" style="width: 100%">
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-md-3">
                                            <label for="dokumen" style="margin-right: 10px;">Dokumen</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" id="dokumen" class="form-control" style="width: 100%">
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
                                        <div class="col-md-2">
                                            <input type="submit" name="lihatItem" value="Lihat Item" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" name="hapusItem" value="Hapus Item" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                    </div>
                                </div>

                                <!--CARD 2-->
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
                                                    <th>Nilai FOB</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Data 1</td>
                                                    <td>Data 2</td>
                                                    <td>Data 3</td>
                                                    <td>Data 4</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="noPEB" style="margin-right: 10px;">No. PEB</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="noPEB" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="tanggalPEB" style="margin-right: 10px;">Tanggal PEB</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" id="tanggalPEB" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="noBL" style="margin-right: 10px;">No. BL</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="noBL" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="tanggalBL" style="margin-right: 10px;">Tanggal BL</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" id="tanggalBL" class="form-control" style="width: 100%">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <label for="nilaiDitagihkan" style="margin-right: 10px;">Nilai yang Ditagihkan</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" id="nilaiDitagihkan" class="form-control" style="width: 100%">
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
                                        <div class="col-md-1">
                                            <input type="submit" name="koreksi" value="Koreksi" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="submit" name="hapus" value="Hapus" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-md-1">
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
