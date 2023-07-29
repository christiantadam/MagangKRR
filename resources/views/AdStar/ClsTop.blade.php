@extends('layouts.appAdStar')
@section('content')
    <h2>Close Top </h2>

    <div class="body">
        <link href="{{ asset('css/AdStar/ClsTop.css') }}" rel="stylesheet">
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
                        <label for="size">Top Patch :</label>
                        <input type="text" id="customer" required>
                    </div>
                </div>
                <div class="input-container">
                    <div class=radio>
                        <label for="size">Back :</label>
                        <input type="text" id="customer" required>
                        <label for="size">Bottom Patch :</label>
                        <input type="text" id="customer" required>
                    </div>
                </div>
            </div>
            <div class="card3">
                <div class="acs-div-gambar-input">
                    <img src="{{ asset('images/Gbr1a.png') }}" class="acs-gambar">
                    <input type="text" name="W_inputBB" id="W_inputBB" class="input W_inputBB" placeholder="BB">
                    <input type="text" name="W_inputBC" id="W_inputBC" class="input W_inputBC" placeholder="BC">
                    <input type="text" name="W_inputW" id="W_inputW" class="input W_inputW" placeholder="W">
                    <input type="text" name="W_inputH" id="W_inputH" class="input W_inputH" placeholder="H">
                    <input type="text" name="W_inputFA" id="W_inputfA" class="input W_inputFA" placeholder="Front Area">
                    <input type="text" name="W_inputVS" id="W_inputVS" class="input W_inputVS" placeholder="VS">
                    <input type="text" name="W_inputVL" id="W_inputVL" class="input W_inputVL" placeholder="VL">
                </div>
                <div class="input-container">
                    <div class=radio>
                        <u>PERFOMANCE STANDARD</u>
                    </div>
                </div>
                <div class="input-container">
                    <div class=radio>
                        <label for="size">Air Permeability :</label>
                        <input type="text" id="customer" required>
                        <label for="size">Nm3h</label>
                    </div>
                </div>
                <div class="input-container">
                    <div class=radio>
                        <label for="size">Tinggi Bag(berdiri) :</label>
                        <input type="text" id="customer" required>
                        <label for="size">cm</label>
                    </div>
                </div>
                <div class="button-container">
                    <button class="add">Calculate</button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="table-container">
                <table>
                  <thead>
                    <tr>
                        <th rowspan="2">Dimension</th>
                        <th rowspan="2">Standard(cm)</th>
                        <th rowspan="2">Tolerance</th>
                        <th colspan="6">Material</th>
                        <th rowspan="2">Cloth Weight (gr)</th>
                        <th rowspan="2">Lamination Weight (gr)</th>
                        <th rowspan="2">Cloth + Kertas + Lami (gr)</th>
                    </tr>
                    <tr>
                        <th> Size (cm)</th>
                        <th> Mesh</th>
                        <th colspan="4">Yarn Type</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td> W. Width</td>
                        <td> 0 </td>
                        <td> ±0.7</td>
                        <td rowspan="2">
                            <input type="text" id="customer" required>
                            <label for="size">X</label>
                            <input type="text" id="customer" required>
                        </td>
                        <td rowspan="2">
                            <input type="text" id="customer" required>
                            <label for="size">X</label>
                            <input type="text" id="customer" required>
                        </td>
                        <td>Wa</td>
                        <td>0</td>
                        <td>0</td>
                        <td>-</td>
                        <td rowspan="2">0</td>
                        <td rowspan="2">0</td>
                        <td rowspan="2">0</td>
                    </tr>
                    <tr>
                        <td> H. Height</td>
                        <td> 0 </td>
                        <td> ±1</td>
                        <td>We</td>
                        <td>0</td>
                        <td>0</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td> TW Top Cover Width</td>
                        <td> 0 </td>
                        <td> ±0.5</td>
                        <td rowspan="2">
                            <input type="text" id="customer" required>
                            <label for="size">X</label>
                            <input type="text" id="customer" required>
                        </td>
                        <td rowspan="2">
                            <input type="text" id="customer" required>
                            <label for="size">X</label>
                            <input type="text" id="customer" required>
                        </td>
                        <td>Wa</td>
                        <td>0</td>
                        <td>0</td>
                        <td>-</td>
                        <td rowspan="2">0</td>
                        <td rowspan="2">0</td>
                        <td rowspan="2">0</td>
                    </tr>
                    <tr>
                        <td> TL Top Cover Length</td>
                        <td> 0 </td>
                        <td> ±1</td>
                        <td>We</td>
                        <td>0</td>
                        <td>0</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td> BW. Bottom Patch Width</td>
                        <td> 0 </td>
                        <td> ±0.5</td>
                        <td rowspan="2">
                            <input type="text" id="customer" required>
                            <label for="size">X</label>
                            <input type="text" id="customer" required>
                        </td>
                        <td rowspan="2">
                            <input type="text" id="customer" required>
                            <label for="size">X</label>
                            <input type="text" id="customer" required>
                        </td>
                        <td>Wa</td>
                        <td>0</td>
                        <td>0</td>
                        <td>-</td>
                        <td rowspan="2">0</td>
                        <td rowspan="2">0</td>
                        <td rowspan="2">0</td>
                    </tr>
                    <tr>
                        <td> BL. Bottom Patch Length</td>
                        <td> 0 </td>
                        <td> ±1</td>
                        <td>We</td>
                        <td>0</td>
                        <td>0</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td> VS. Valve Seal</td>
                        <td> 0 </td>
                        <td> ±0.5</td>
                        <td rowspan="2">
                            <input type="text" id="customer" required>
                            <label for="size">X</label>
                            <input type="text" id="customer" required>
                        </td>
                        <td rowspan="2">
                            <input type="text" id="customer" required>
                            <label for="size">X</label>
                            <input type="text" id="customer" required>
                        </td>
                        <td>Wa</td>
                        <td>0</td>
                        <td>0</td>
                        <td>-</td>
                        <td rowspan="2">0</td>
                        <td rowspan="2">0</td>
                        <td rowspan="2">0</td>
                    </tr>
                    <tr>
                        <td> VL. Valve Length</td>
                        <td> 0 </td>
                        <td> ±0.5</td>
                        <td>We</td>
                        <td>0</td>
                        <td>0</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Kertas</td>
                        <td>---</td>
                        <td>---</td>
                        <td>
                            <input type="text" id="customer" required>
                            <label for="size">X</label>
                            <input type="text" id="customer" required>
                        </td>
                        <td>---</td>
                        <td colspan="4">---</td>
                        <td>---</td>
                        <td>---</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>BB. Block Bottom</td>
                        <td>0</td>
                        <td>±0.5</td>
                        <td>---</td>
                        <td>---</td>
                        <td colspan="4">---</td>
                        <th>Total Clotch</th>
                        <th>Total Lami</th>
                        <th>Total (gr)</th>
                    </tr>
                    <tr>
                        <td>BC. Block Cover</td>
                        <td>0</td>
                        <td>±0.5</td>
                        <td>---</td>
                        <td>---</td>
                        <td colspan="4">---</td>
                        <td rowspan="3">0</td>
                        <td rowspan="3">0</td>
                        <td rowspan="3">0</td>
                    </tr>
                    <tr>
                        <td>TO. Top Fabric Overlap</td>
                        <td>1</td>
                        <td>±0.2</td>
                        <td>---</td>
                        <td>---</td>
                        <td colspan="4">---</td>
                    </tr>
                    <tr>
                        <td>BO. Bottom Fabric Overlap</td>
                        <td>1</td>
                        <td>±0.2</td>
                        <td>---</td>
                        <td>---</td>
                        <td colspan="4">---</td>
                    </tr>

                  </tbody>
                </table>
              </div>
        </div>

    </div>
@endsection
