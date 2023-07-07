@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card">
                    <div class="card-header">Form Jam</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="border: 1px solid #000000; border-radius: 3px; margin-right:15px; margin-left:15px; margin-top:15px; margin-bottom;15px">
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: auto; margin-left:10 px; max-width: 550px;">
                            <div style=" width:250px;">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label style="margin-right: 10px;">Tanggal</label>
                                    <div style="display: flex; align-items: center;">
                                        <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                            value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>


                                    </div>

                                </div>
                            </div>
                            <br>
                            <div style="display: flex; flex-direction: column;">
                                <label style="margin-bottom: 5px;">Keterangan </label>
                                <div class="textbox-container">
                                    <input type="text" class="form-control" id="ketLembur" name="ketLembur">
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
                                <button type="button" class="btn btn-primary" style="margin-left:10px;">OK</button>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col"></th>

                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <tr>
                                            <td>2/18/2023</td>
                                            <td>ISRA M'IRAJ</td>
                                            <td>Tes</td>

                                        </tr>
                                        <tr>
                                            <td>2/18/2023</td>
                                            <td>ISRA M'IRAJ</td>
                                            <td>Tes</td>

                                        </tr>
                                        <tr>
                                            <td>2/18/2023</td>
                                            <td>ISRA M'IRAJ</td>
                                            <td>Tes</td>

                                        </tr>
                                        <tr>
                                            <td>2/18/2023</td>
                                            <td>ISRA M'IRAJ</td>
                                            <td>Tes</td>

                                        </tr>


                                    </tbody>

                                </table>
                            </div>

                            <br>

                        </div>
                    </div>

                    <div style="text-align: right; margin-top: 20px;">


                        <button type="button" class="btn btn-info">Isi</button>
                        <button type="button" class="btn btn-warning">Koreksi</button>
                        <button type="button" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-light">Proses</button>
                        <button type="button" class="btn btn-dark">Keluar</button>
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
