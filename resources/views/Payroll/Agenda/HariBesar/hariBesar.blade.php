@extends('layouts.appPayroll')
@section('content')
<script type="text/javascript" src="{{ asset('js/Agenda/hariBesar.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card">
                    <div class="card-header">Hari Libur & Besar</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="border: 1px solid #000000; border-radius: 3px; margin-right:15px; margin-left:15px; margin-top:15px; margin-bottom;15px">
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: auto; margin-left:10 px; max-width: 550px;">
                            <div style=" width:250px;">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label style="margin-right: 10px;">Tanggal</label>
                                    <div style="display: flex; align-items: center;">
                                        <input class="form-control" type="date" id="TglBesar" name="TglBesar"
                                             disabled>


                                    </div>

                                </div>
                            </div>
                            <br>
                            <div style="display: flex; flex-direction: column;">
                                <label style="margin-bottom: 5px;">Keterangan </label>
                                <div class="textbox-container">
                                    <input type="text" class="form-control" id="ketLibur" name="ketLibur" readonly>
                                </div>
                            </div>
                            <br>

                        </div>
                    </div>
                    <br>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="border: 1px solid #000000; border-radius: 3px; margin-right:15px; margin-left:15px; margin-top:15px; margin-bottom;15px">
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: auto; margin-left:10 px; ">

                            <div style="display: flex; flex-direction: row; align-items: center;">
                                <label style="margin-right: 10px;">Tahun</label>
                                <div class="textbox-container">
                                    <input type="text" class="form-control" id="Tahun" name="Tahun">
                                </div>
                                <button type="button" class="btn btn-primary" style="margin-left:10px;" id="tampilLibur" >OK</button>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabelLibur">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Keterangan</th>


                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">



                                    </tbody>

                                </table>
                            </div>

                            <br>

                        </div>
                    </div>
                    <div id="form-container"></div>
                    <div style="text-align: right; margin: 10px;">


                        <button type="button" class="btn btn-info" style="width: 75px" id="buttonIsi">Isi</button>
                        <button type="button" class="btn btn-warning" style="width: 75px" id="buttonKoreksi">Koreksi</button>
                        <button type="button" class="btn btn-danger" style="width: 75px" id="buttonHapus">Hapus</button>
                        <button type="button" class="btn btn-light" style="width: 75px" id="buttonProses" disabled>Proses</button>
                        <button type="button" class="btn btn-dark" style="width: 75px" id="buttonBatal" disabled>Batal</button>
                    </div>








                    <br>







                </div>
            </div>

        </div>
        <br>

    </div>
    </div>
    </div>
@endsection
