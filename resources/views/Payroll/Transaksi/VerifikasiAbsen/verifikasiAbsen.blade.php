@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center" style="width: 850px;">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="margin:auto;">
                    <div class="card-header">FrmAbsen</div>

                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px;">


                        <div style="align-items: center">
                            <div style="display: flex; align-items:center;">
                                <label style="margin-right: 10px;">Tanggal</label>
                                <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                    value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>


                            </div>


                        </div>
                        <br>

                        <div style="align-items: center">
                            <div style="display: flex; align-items:center;">
                                <label style="margin-right: 10px;">Karyawan</label>
                                <div style="padding: 10px">
                                    <input type="radio" id="staff" name="pekerja" value="staff" checked
                                        style="vertical-align: middle;">
                                    <label for="staff"
                                        style="display: inline-block; margin-right: 5px;">Harian</label>
                                </div>

                                <div style="padding: 10px">
                                    <input type="radio" id="bukanStaff" name="pekerja" value="bukanStaff"
                                        style="vertical-align: middle;">
                                    <label for="bukanStaff"
                                        style="display: inline-block; margin-right: 5px;">Staff</label>
                                </div>

                                <div style="padding: 10px">
                                    <input type="radio" id="bukanStaff" name="pekerja" value="bukanStaff"
                                        style="vertical-align: middle;">
                                    <label for="bukanStaff"
                                        style="display: inline-block; margin-right: 5px;">Borongan/HL</label>
                                </div>


                            </div>


                        </div>
                        <div style="text-align: center; margin: 20px;">
                            <button type="button" class="btn btn-primary" style="margin-right:20px;width:100px;">Proses</button>
                            <button type="button" class="btn btn-info" style="margin-right:20px; width:100px;">Cetak</button>
                            <button type="button" class="btn btn-dark" style="margin-right:20px; width:100px;">Keluar</button>
                        </div>










                    </div>



                </div>








                <br>







            </div>
        </div>

    </div>
@endsection
