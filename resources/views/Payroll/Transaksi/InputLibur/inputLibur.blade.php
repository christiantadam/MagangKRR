@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Transaksi/inputLibur.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">Ubah Agenda</div>
                    <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0"
                            style="flex: 1; margin-left: 10px; display: flex; ">
                            <div style="display: flex; align-items: center;">
                                <label for="TglLapor" style="margin-right: 10px;">Tanggal</label>
                                <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                    value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required
                                    style="max-width: 200px;">
                                <label for="TglLapor" style="margin-right: 10px;padding-left:10px">s/d</label>
                                <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                    value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required
                                    style="max-width: 200px;">
                            </div>
                        </div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left: 10px;  ">
                            <div style="flex: 1; margin-right: 10px; margin-top: 5px;">
                                <input type="checkbox">
                                <label for="staff">Centang untuk koreksi absen M di hari libur</label>
                            </div>
                            <div class="card-body-container" style="display: flex; ">
                                <div class="time-form">
                                    <div>
                                        <label for="pulang">Masuk :</label>
                                        <input type="time" id="masukLembur" name="masukLembur">
                                    </div>
                                </div>
                                <div class="time-form">
                                    <div>
                                        <label for="pulang">Keluar :</label>
                                        <input type="time" id="masukLembur" name="masukLembur">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>





                    <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                        <div class="card-body" style="flex: 1; margin-right: 10px;  text-align: middle;">
                            <div style="flex: 1; margin-right: 10px; margin-top: 5px;">
                                <input type="radio" id="opsi1" name="opsi">
                                <label for="staff">Perorangan</label>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 1; margin-right: 10px;  text-align: middle;">
                            <div style="flex: 1; margin-right: 10px; margin-top: 5px;">
                                <input type="radio" id="opsi2" name="opsi">
                                <label for="staff">Divisi</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                        <div class="card-body" style="flex: 1; margin-right: 10px;">
                            <div class="card-body"
                                style="flex: 1; margin-right: 10px; border: 1px solid #000000; border-radius: 3px; text-align: middle;"
                                id="peroranganSection" hidden>
                                <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10;">

                                    <br>
                                    <div class="row" style="margin-left:50px;">
                                        <div class="form-group col-md-1 d-flex justify-content-end">
                                            <span class="aligned-text">Divisi</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <select class="form-control" id="DivisiSelect" name="Divisi"
                                                style="resize: none;height: 40px; max-width:350px">
                                                <option value="">Pilih Divisi</option>
                                                @foreach ($dataDivisi as $option)
                                                    <option value="{{ $option->Id_Div }}">{{ $option->Id_Div }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left:50px;">
                                        <div class="form-group col-md-1 d-flex justify-content-end">
                                            <span class="aligned-text">Kd&nbsp;Pegawai:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input class="form-control" type="text" id="Id_Pegawai"
                                                style="resize: none; height: 40px; width: 100px;" disabled>
                                            <input class="form-control ml-3" type="text" id="Nama_Pegawai"
                                                style="resize: none; height: 40px; width: 263px;" disabled>
                                            <button type="button" class="btn" style="margin-left: 10px; "
                                                id="pegawaiButton">...</button>
                                            <div class="modal fade" id="modalPegawai" role="dialog"
                                                arialabelledby="modalLabel" area-hidden="true" style="">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content" style="">
                                                        <div class="modal-header" style="justify-content: center;">

                                                            <div class="row" style=";">
                                                                <div class="table-responsive" style="margin:30px;">
                                                                    <table id="tabel_Pegawai"
                                                                        class="table table-bordered">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">Nama Pegawai</th>
                                                                                <th scope="col">Id Pegawai</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            {{-- @foreach ($dataDivisi as $data)
                                                                                        <tr>

                                                                                            <td>{{ $data->kd_Pegawai }}</td>
                                                                                            <td>{{ $data->nama_peg }}</td>
                                                                                        </tr>
                                                                                    @endforeach --}}

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="text-align: center; margin-top: 100px;">

                                        <button type="button" class="btn" style="height: 50px;width: 100px;"
                                            id="prosesButton">PROSES</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="flex: 1; margin-right: 10px;">
                            <div class="card-body"
                                style="flex: 1; margin-right: 10px; border: 1px solid #000000; border-radius: 3px;"
                                id="divisiSection">
                                <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10;">

                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" id="tabel_Divisi">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id Divisi</th>
                                                    <th scope="col">Nama Divisi</th>

                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">

                                                @foreach ($dataDivisi as $data)
                                                    <tr>
                                                        <td>{{ $data->Id_Div }}</td>
                                                        <td>{{ $data->Nama_Div }}</td>

                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                    <div id="form-container"></div>
                                    <div style="text-align: right; margin-top: 100px;">
                                        <button type="button" class="btn btn-primary" id="pilihSemua">Pilih
                                            Semua</button>
                                        <button type="button" class="btn btn-info" id="prosesDivisi">PROSES</button>
                                    </div>














                                </div>
                            </div>
                        </div>


                    </div>


                </div>



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
