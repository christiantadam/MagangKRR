@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Agenda/agendaShift.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card">
                    <div class="card-header">Form Jam</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px">
                        <div style="display: flex; flex-wrap: nowrap; align-items: center;">
                            <div style="flex: 1; margin-right: 10px;">
                                <label style="margin-right: 10px;">Tanggal</label>
                                <div style="display: flex; align-items: center;">
                                    <input class="form-control" type="date" id="TglAwal" name="TglAwal"
                                        value="{{ old('TglAwal', now()->format('Y-m-d')) }}" required>


                                </div>

                            </div>
                            <div style="flex: 1; margin-right: 10px;">
                                <label style="margin-right: 10px;">S/D</label>
                                <div style="display: flex; align-items: center;">
                                    <input class="form-control" type="date" id="TglAkhir" name="TglAkhir"
                                        value="{{ old('TglAkhir', now()->format('Y-m-d')) }}" required>


                                </div>

                            </div>



                        </div>
                        <br>

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
                                            <span class="aligned-text">Kd&nbsp;Pegawai</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <select class="form-control" id="PegawaiSelect" name="PegawaiSelect"
                                                style="resize: none;height: 40px; max-width:350px">
                                                <option value="">Pilih Pegawai</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div style="text-align: center; margin-top: 100px;">

                                        <button type="button" class="btn" style="height: 50px;width: 100px;"
                                            id="generateButton">Generate</button>
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
                                        <button type="button" class="btn btn-primary" id="pilihSemua">Pilih Semua</button>
                                        <button type="button" class="btn btn-info" id="generateDivisi">Generate Divisi</button>
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
