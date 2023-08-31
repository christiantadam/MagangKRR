@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Transaksi/absenSimpang.js') }}"></script>
    <div class="container-fluid no-print">
        <div class="row justify-content-center" style="width: 1250px;">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="margin:auto;">
                    <div class="card-header">Transfer Absen</div>

                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px;">
                        <div style="align-items: center">
                            <div style="display: flex; align-items:center;">
                                <label style="margin-right: 10px;">Tanggal</label>
                                <input class="form-control" type="date" id="TglSimpang" name="TglSimpang"

                                    style="width: 150px; margin-right:20px;" required>
                                <button id="tampilButton" style="width: 75x; margin-right:20px;">Tampilkan</button>
                                <button id="cetakButton" style="width: 75px; margin-right:20px;"
                                    onclick={window.print()}>Cetak</button>
                                <br>

                            </div>


                        </div>


                        <br>
                        <div id="gridViewContainer" style="max-height: 300px; overflow-y: scroll;">
                            <table id="tabelSimpang">
                                <thead>
                                    <tr>

                                        <th style="border: 1px solid #ddd; padding: 8px;">Kd_Pegawai</th>
                                        <th style="border: 1px solid #ddd; padding: 8px;">Nama_Pegawai</th>
                                        <th style="border: 1px solid #ddd; padding: 8px;">Ket_Absensi</th>
                                        <th style="border: 1px solid #ddd; padding: 8px;">Jam_Masuk</th>
                                        <th style="border: 1px solid #ddd; padding: 8px;">Jam_Keluar</th>
                                        <th style="border: 1px solid #ddd; padding: 8px;">Jml_Jam</th>
                                        <th style="border: 1px solid #ddd; padding: 8px;">Datang</th>
                                        <th style="border: 1px solid #ddd; padding: 8px;">Pulang</th>
                                        <th style="border: 1px solid #ddd; padding: 8px;">TotalJam</th>
                                        <th style="border: 1px solid #ddd; padding: 8px;">Ket_Masuk</th>
                                        <th style="border: 1px solid #ddd; padding: 8px;">IdAgenda</th>
                                        <!-- Add more column headers as needed -->
                                    </tr>


                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <br>
                        <div id="form-container"></div>
                        <div style="flex: 1; margin-right: 10px; margin-top: 5px; align-items:center;">
                            <input type="checkbox" id="selectAll">
                            <label for="staff">Pilih Semua</label>
                        </div>
                        <div style="text-align: left; margin: 20px;">
                            <button type="button" class="btn btn-danger" id="buttonHapus">Hapus</button>
                            <button type="button" class="btn btn-dark" id="saveButton">Keluar</button>
                        </div>
                    </div>

                </div>


                <br>
            </div>
        </div>
    </div>
    <div class="printme" id="printSection">
        <div class="header" >
            <h4 style="text-align: center;">ABSEN SIMPANG</h4>
            <div class="date" id="TglCetak">Tanggal: </div>
        </div>
        <table id="tabelCetak">
            <thead>
                <tr>

                    <th style="border: 1px solid #ddd; padding: 8px;">Kd_Pegawai</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Nama_Peg</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Ket</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Jam_Masuk</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Jam_Keluar</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Jml_Jam</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Datang</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Pulang</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Ket_Masuk</th>
                    <!-- Add more column headers as needed -->
                </tr>


            </thead>
            <tbody>

            </tbody>
        </table>



    </div>
@endsection
