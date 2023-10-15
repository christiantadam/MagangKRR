@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center" style="width: 850px;">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="margin:auto;">
                    <div class="card-header">Input CheckClock</div>

                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px;">
                        <div class="card-body-container" style="display: flex; flex-wrap: nowrap; ">
                            <div class="card-body">
                                <div style="align-items: center">
                                    <div>
                                        <label style="margin-right: 10px;">Tanggal</label>
                                    </div>

                                    <div style="display: flex; ">
                                        <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                            value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>


                                    </div>
                                    <br>
                                    <div>
                                        <label for="staff">Label 1</label>

                                    </div>
                                    <div>
                                        <label for="staff">Label 2</label>

                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <div style="text-align: left; margin: 25px; ">
                                    <button type="button" class="btn btn-primary"
                                        style="width: 100px; margin-top:5px;">Proses</button>

                                </div>
                            </div>

                        </div>










                    </div>



                </div>








                <br>







            </div>
        </div>

    </div>



@endsection
