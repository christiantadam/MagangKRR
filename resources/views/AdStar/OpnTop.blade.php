@extends('layouts.appAdStar')
@section('content')
    <h2>Open Top </h2>

    <div class="body">
        <link href="{{ asset('css/AdStar/OpnTop.css') }}" rel="stylesheet">
        <div class="card">
            <div class="card2">
                <div class="input-container">
                    <div class=radio>
                        <label for="customer">Product Name:</label>
                        <input type="radio" id="pilihan1" name="pilihan" value="pilihan1">StarPark
                        {{-- <label for="pilihan1">StarPark</label><br> --}}
                        <input type="radio" id="pilihan2" name="pilihan" value="pilihan2">AdStar
                        {{-- <label for="pilihan2">AdStar</label><br> --}}
                        <label for="customer">Id :</label>
                        <input type="text" id="customer" required placeholder="id">
                    </div>
                </div>
                <div class="input-container">
                    <div class=radio>
                        <label for="customer">Design For:</label>
                        <input type="text" id="customer" required>
                        <input type="text" id="input1" placeholder="">
                        <button type="button">...</button>
                    </div>
                </div>
                <div class="input-container">
                    <div class=radio>
                        <label for="nama-barang">Product Type:</label>
                        <input type="text" id="nama-barang" required>
                        <label for="nama-barang">-</label>
                        <input type="text" id="input2">
                        <button type="button">List Type</button>
                    </div>
                </div>
                <div class="input-container">
                    <div class=radio>
                        <label for="tgl-finish">Dated:</label>
                        <input type="date" id="mmm" required>
                    </div>
                </div>
                <div class="input-container">
                    <div class=radio>
                        <label for="nama-barang">Designed by:</label>
                        <input type="text" id="nama-barang" required>
                    </div>
                </div>
                <div class="input-container">
                    <div class=radio>
                        <u>SPESIFICATION</u>
                    </div>
                </div>
                <div class="input-container">
                    <div class=radio>
                        <label for="size">Size :</label>
                        <input type="text" id="customer" required>X
                        <input type="text" id="input1" placeholder="">+
                        <input type="text" id="input1" placeholder="">cm
                    </div>
                </div>
                <div class="input-container">
                    <div class=radio>
                        <label for="size">Mesh :</label>
                        <input type="text" id="customer" required>X
                        <input type="text" id="input1" placeholder="">
                    </div>
                </div>
                <div class="input-container">
                    <div class=radio>
                        <label for="size">Yarn Width :</label>
                        <input type="text" id="customer" required>
                        <label for="size"> Denier :</label>
                        <input type="text" id="input1" placeholder="">
                    </div>
                </div>
                <div class="input-container">
                    <div class=radio>
                        <label for="size">Colour :</label>
                        <input type="text" id="customer" required>
                        <label for="size"> Lamination :</label>
                        <input type="text" id="input1" placeholder="">um
                    </div>
                </div>
                <div class="input-container">
                    <div class=radio>
                        <label for="size">Kertas :</label>
                        <input type="text" id="customer" required>GSM
                    </div>
                </div>
                <div class="input-container">
                    <div class=radio>
                        <u>Printing</u>
                    </div>
                </div>
                <div class="input-container">
                    <div class=radio>
                        <label for="size">Front :</label>
                        <input type="text" id="customer" required>
                    </div>
                </div>
                <div class="input-container">
                    <div class=radio>
                        <label for="size">Back :</label>
                        <input type="text" id="customer" required>
                    </div>
                </div>
                <div class="input-container">
                    <div class=radio>
                        <label for="size">Top Patch :</label>
                        <input type="text" id="customer" required>
                    </div>
                </div>
                <div class="input-container">
                    <div class=radio>
                        <label for="size">Bottom Patch :</label>
                        <input type="text" id="customer" required>
                    </div>
                </div>
            </div>
            <div class="card3">
                <div class="acs-div-gambar-input">
                    <img src="{{ asset('images/Gbr3.png') }}" class="acs-gambar">
                    <input type="text" name="W_inputBB" id="W_inputBB" class="input W_inputBB" placeholder="BB">
                    <input type="text" name="W_inputW" id="W_inputW" class="input W_inputW" placeholder="W">
                    <input type="text" name="W_inputH" id="W_inputH" class="input W_inputH" placeholder="H">
                    <input type="text" name="W_inputFA" id="W_inputfA" class="input W_inputFA" placeholder="Front Area">
                </div>
            </div>
        </div>
    </div>
@endsection
