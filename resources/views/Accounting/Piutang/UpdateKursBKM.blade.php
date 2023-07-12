@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance Update Kurs BKM $$</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div class="d-flex">
                                    <div class="col-md-2">
                                        <label for="bulanTahun" style="margin-right: 10px;">Bulan dan Tahun</label>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="bulanTahun" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="bulanTahun" class="form-control" style="width: 100%">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" id="btnProses" name="isi" value="OK" class="btn">
                                    </div>
                                </div>

                                <br><div>
                                    Data Pelunasan
                                    <div style="overflow-y: auto; max-height: 400px;">
                                        <table style="width: 120%; table-layout: fixed;">
                                            <colgroup>
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 15%;">
                                                <col style="width: 20%;">
                                                <col style="width: 15%;">
                                                <col style="width: 20%;">
                                                <col style="width: 20%;">
                                            </colgroup>
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Tgl Input</th>
                                                    <th>Id. BKM</th>
                                                    <th>Id. Bank</th>
                                                    <th>Total Pelunasan</th>
                                                    <th>Rincian Pelunasan</th>
                                                    <th>Kode Perkiraan</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Data 1</td>
                                                    <td>Data 2</td>
                                                    <td>Data 3</td>
                                                    <td>Data 4</td>
                                                    <td>Data 5</td>
                                                    <td>Data 6</td>
                                                    <td>Data 7</td>
                                                </tr>
                                                <!-- Tambahkan baris lainnya jika diperlukan -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br><div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2">
                                            <label for="kursRupiah" style="margin-right: 10px;">Kurs Rupiah</label>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="number" id="kursRupiah" class="form-control" style="width: 100%">
                                        </div>
                                        <div class="col-2">
                                            <input type="submit" id="btnProses" name="proses" value="PROSES" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-3">
                                            <input type="submit" id="btnPilihbkm" name="pilihbkm" value="Pilih BKM" class="btn btn-primary d-flex ml-auto">
                                        </div>
                                        <div class="col-2">
                                            <input type="submit" id="btnTutup" name="tutup" value="TUTUP" class="btn btn-primary d-flex ml-auto">
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
