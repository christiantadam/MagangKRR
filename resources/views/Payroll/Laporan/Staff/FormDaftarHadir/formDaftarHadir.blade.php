@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Laporan/Staff/FormDaftarHadir.js') }}"></script>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
        }

        .left {
            text-align: left;
        }

        .right {
            text-align: right;
        }

        .names {
            margin-top: 20px;
        }

        .names p {
            margin: 0;
            /* Menghilangkan margin default dari paragraf */
        }
    </style>
    <div class="container-fluid no-print">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">FrmLaporan</div>

                    <div class="card" style="margin:10px;">
                        <div class="card-header" style=""> </div>
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-start">
                                <button type="button" class="btn  " style="margin:10px;">Main Report</button>
                                <button type="button" class="btn  " style="margin:10px;" onclick="{window.print()}">Cetak</button>
                            </div>
                            <div class="form-group col-md-4">

                            </div>


                        </div>
                        <div class="" id="printSection" style="border: 1px solid black;">
                            <div class="header">
                                <h4 style="">DAFTAR HADIR STAFF</h4>
                                <div class="date" id="TglCetak">Tanggal: </div>
                                <br>
                                <div class="" id="Divisi">&nbsp;&nbsp;Bagian : </div>
                            </div>
                            <br>
                            <table id="tabel_Hadir">
                                <thead>
                                    <tr>

                                        <th style="border: 1px solid #ddd; padding: 8px;">NO.</th>
                                        <th style="border: 1px solid #ddd; padding: 8px;">KODE</th>
                                        <th style="border: 1px solid #ddd; padding: 8px;">NAMA PEGAWAI</th>
                                        <th style="border: 1px solid #ddd; padding: 8px;">JABATAN</th>
                                        <th style="border: 1px solid #ddd; padding: 8px;">MASUK</th>
                                        <th style="border: 1px solid #ddd; padding: 8px;">PULANG</th>
                                        <th style="border: 1px solid #ddd; padding: 8px;">KETERANGAN</th>

                                        <!-- Add more column headers as needed -->
                                    </tr>


                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <br>
                            <div class="printme" style="display: block;"><strong>
                                    <div class="" id="Keterangan">
                                        &nbsp;&nbsp;Keterangan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanda
                                        tangan satpam </div>
                                </strong>
                                <br>
                                <br>
                                <div class="" id="Keterangan">
                                    &nbsp;&nbsp;Masuk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;orang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
                                </div>
                                <br>
                                <br>
                                <div class="" id="Keterangan">
                                    &nbsp;&nbsp;Pulang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;orang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
                                </div>
                                <br>
                                <br>
                                <div class="" id="Keterangan">
                                    &nbsp;&nbsp;Tidak
                                    kembali&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;orang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="container">
                                <div class="left">
                                    <p>Mengetahui</p>
                                </div>
                                <div class="right">
                                    <p>Penanggung Jawab</p>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="container">
                                <div class="left" style="margin-left: -15px;">
                                    <p>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manager&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
                                </div>
                                <div class="right">
                                    <p>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala
                                        Shift&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) </p>
                                </div>
                            </div>

                        </div>


                    </div>









                </div>
            </div>


        </div>






    </div>
    <div class="" id="printSection" style="">
        <div class="header">
            <h4 style="">DAFTAR HADIR STAFF</h4>
            <div class="date" id="TglCetak">Tanggal: </div>
            <br>
            <div class="" id="Divisi">&nbsp;&nbsp;Bagian : </div>
        </div>
        <br>
        <table id="tabel_Hadir2">
            <thead>
                <tr>

                    <th style="border: 1px solid #ddd; padding: 8px;">NO.</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">KODE</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">NAMA PEGAWAI</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">JABATAN</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">MASUK</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">PULANG</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">KETERANGAN</th>

                    <!-- Add more column headers as needed -->
                </tr>


            </thead>
            <tbody>

            </tbody>
        </table>
        <br>
        <div class="printme" style=""><strong>
                <div class="" id="Keterangan">
                    &nbsp;&nbsp;Keterangan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanda
                    tangan satpam </div>
            </strong>
            <br>
            <br>
            <div class="" id="Keterangan">
                &nbsp;&nbsp;Masuk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;orang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
            </div>
            <br>
            <br>
            <div class="" id="Keterangan">
                &nbsp;&nbsp;Pulang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;orang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
            </div>
            <br>
            <br>
            <div class="" id="Keterangan">
                &nbsp;&nbsp;Tidak
                kembali&nbsp;&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;orang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
            </div>
        </div>
        <br>
        <br>
        <div class="container">
            <div class="left">
                <p>Mengetahui</p>
            </div>
            <div class="right">
                <p>Penanggung Jawab</p>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="left" style="margin-left: -15px;">
                <p>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manager&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
            </div>
            <div class="right">
                <p>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala
                    Shift&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) </p>
            </div>
        </div>

    </div>
@endsection
