@extends('layouts.appPayroll')

@section('content')
<script type="text/javascript" src="{{ asset('js/Agenda/gantiShift1.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div id="form-container"></div>
                <div class="card" id="firstCard">
                    <div class="card-header">Form Ganti Shift</div>
                    <div style="text-align: left; margin-top: 20px; margin-left:15px">
                        <button type="button" class="btn btn-info" onclick="toggleCardAutomatic()">Automatic</button>
                        <button type="button" class="btn btn-light" onclick="toggleCardSimpang()">Simpang Shift</button>
                        <button type="button" class="btn btn-light" onclick="toggleCardTes()">Tes</button>

                    </div>
                    <br>
                    <div style="flex: 1; margin-right: 10px;">

                        <div style="display: flex; align-items: center;">
                            <label style="margin-right: 10px; margin-left: 15px">Tanggal</label>
                            <input class="form-control" type="date" id="TglAwal" name="Tgl"
                                required>
                            <label style="margin-right: 10px; margin-left: 15px">S/D</label>
                            <input class="form-control" type="date" id="TglAkhir" name="Tgl"
                                 required>


                        </div>

                    </div>
                    <div>
                        <div style="padding: 15px;margin-left: 15px;">
                            <input type="radio" id="cekSemua" name="opsiBagian" value=""
                                style="vertical-align: middle;" checked>
                            <label for="staff" style="display: inline-block; margin-right: 5px;">Semua Bagian</label>
                        </div>
                        <div style="padding: 15px; margin-left: 15px;">
                            <input type="radio" id="cekPilih" name="opsiBagian" value=""
                                style="vertical-align: middle;">
                            <label for="staff" style="display: inline-block; margin-right: 5px;">Pilih Bagian</label>
                        </div>
                    </div>



                    <div class="keterangan" style="margin:20px;">
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0"
                            style="flex: auto; margin-left: 10px; max-width: 550px;">
                            <div style="display: flex; flex-direction: column;">
                                <label style="margin-bottom: 5px;">Divisi</label>
                                <select class="form-control" id="divisi" name="divisi"
                                    style="resize: none;height: 40px; max-width:150px" disabled>
                                    <option value="" >--PILIH DIVISI--</option>
                                    @foreach ($dataDivisi as $data)
                                        <option value="{{ $data->Nama_Div }}">{{ $data->Id_Div }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div style="display: flex; flex-direction: column;">
                                <label style="margin-bottom: 5px;">Nama</label>
                                <div class="textbox-container">
                                    <input type="text" class="form-control" id="namaDivisi" name="namaDivisi" disabled>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>

                    <div style="text-align: right; margin-top: 20px;">
                        <button type="button" class="btn btn-light" style="margin-right:20px;" id="prosesButton">Proses</button>

                    </div>
                    <br>
                </div>
                <div class="card" id="secondCard" style="display: none;">
                    <div class="card-header">Form Ganti Shift</div>
                    <div style="text-align: left; margin-top: 20px; margin-left:15px">
                        <button type="button" class="btn btn-light" onclick="toggleCardAutomatic()">Automatic</button>
                        <button type="button" class="btn btn-info" onclick="toggleCardSimpang()">Simpang Shift</button>
                        <button type="button" class="btn btn-light" onclick="toggleCardTes()">Tes</button>
                    </div>
                    <br>
                    <div style="flex: 1; margin-right: 10px;">

                        <div style="display: flex; align-items: center;">
                            <label style="margin-right: 10px; margin-left: 15px">Tanggal</label>
                            <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>
                            <label style="margin-right: 10px; margin-left: 15px">S/D</label>
                            <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>


                        </div>

                    </div>

                    <div style="display: flex; margin:20px;width:250px">
                        <label style="margin-bottom: 5px; margin-right:18px">No</label>
                        <div class="textbox-container" style="margin-left: 20px">
                            <input type="text" class="form-control" id="ketLembur" name="ketLembur">
                        </div>
                        <button type="button" class="btn btn-light">...</button>
                    </div>

                    <div style="display: flex; margin:20px;">
                        <label style="margin-bottom: 5px; margin-right:18px">Nama</label>
                        <div class="textbox-container" style="width:450px">
                            <input type="text" class="form-control" id="ketLembur" name="ketLembur">
                        </div>

                    </div>



                    <br>
                </div>
                <div class="card" id="thirdCard" style="display: none;">
                    <div class="card-header">Form Ganti Shift</div>
                    <div style="text-align: left; margin-top: 20px; margin-left:15px">
                        <button type="button" class="btn btn-light" onclick="toggleCardAutomatic()">Automatic</button>
                        <button type="button" class="btn btn-light" onclick="toggleCardSimpang()">Simpang Shift</button>
                        <button type="button" class="btn btn-info" onclick="toggleCardTes()">Tes</button>
                    </div>
                    <br>
                    <div style="flex: 1; margin-right: 10px;">

                        <div style="display: flex; align-items: center;">
                            <label style="margin-right: 10px; margin-left: 15px">Tanggal</label>
                            <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>
                            <label style="margin-right: 10px; margin-left: 15px">S/D</label>
                            <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>


                        </div>

                    </div>

                    <div style="display: flex; margin:20px;width:250px">
                        <label style="margin-bottom: 5px; margin-right:18px">No</label>
                        <div class="textbox-container" style="margin-left: 20px">
                            <input type="text" class="form-control" id="ketLembur" name="ketLembur">
                        </div>
                        <button type="button" class="btn btn-light">...</button>
                    </div>

                    <div style="display: flex; margin:20px;">
                        <label style="margin-bottom: 5px; margin-right:18px">Nama</label>
                        <div class="textbox-container" style="width:450px">
                            <input type="text" class="form-control" id="ketLembur" name="ketLembur">
                        </div>

                    </div>



                    <br>
                </div>
            </div>
        </div>
        <br>
    </div>


    <script>
        function toggleCardAutomatic() {
            var firstCard = document.getElementById('firstCard');
            var secondCard = document.getElementById('secondCard');
            var thirdCard = document.getElementById('thirdCard');
            firstCard.style.display = 'block';
            secondCard.style.display = 'none';
            thirdCard.style.display = 'none';
        }

        function toggleCardSimpang() {
            var firstCard = document.getElementById('firstCard');
            var secondCard = document.getElementById('secondCard');
            var thirdCard = document.getElementById('thirdCard');
            firstCard.style.display = 'none';
            secondCard.style.display = 'block';
            thirdCard.style.display = 'none';
        }

        function toggleCardTes() {
            var firstCard = document.getElementById('firstCard');
            var secondCard = document.getElementById('secondCard');
            var secondCard = document.getElementById('secondCard');
            firstCard.style.display = 'none';
            secondCard.style.display = 'none';
            thirdCard.style.display = 'block';
        }
    </script>
@endsection
