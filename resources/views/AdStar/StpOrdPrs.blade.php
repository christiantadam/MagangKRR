@extends('layouts.appAdStar')
@section('content')

<h2>Stop Order Press</h2>

<div class="body">
    <div class="card">
        {{-- <h3 class="card-title">Sales</h3> --}}
        <div class="input-container">
            <label>No. Order Kerja:</label>
            <input type="text" name="noOrderKerja" placeholder="No. Order Kerja">
            <button class="btn btn-primary" type="button">...</button>
            <input type="text" name="inputNoOrderKerja" placeholder="Input No. Order Kerja">
        </div>
        <div class="input-container">
            <label>No Pesanan:</label>
            <input type="text" name="noPesanan" placeholder="No Pesanan">
            <label>Surat Pesanan:</label>
            <input type="text" name="suratPesanan" placeholder="Surat Pesanan">
        </div>
        <div class="input-container">
            <label>Qty Order:</label>
            <input type="text" name="qtyOrder" placeholder="Qty Order">
            <label>Lbr</label>
        </div>
        <div class="input-container">
            <label>Hasil Order:</label>
            <input type="text" name="hasilOrder" placeholder="Hasil Order">
            <label>Lbr</label>
        </div>
        <div class="input-container">
            <label for="rncn-kerja">Rencana Kerja:</label>
            <input type="date" id="rncn-kerja" required>
        </div>
        <div class="input-container">
            <label for="rncn-finish">Rencarna Finish:</label>
            <input type="date" id="rncn-finish" required>
        </div>
        <div class="input-container">
            <label for="tgl-finish">Tgl Finish:</label>
            <input type="date" id="tgl-finish" required>
        </div>
    </div>

    <div class="button-container">
        <button class="ord">Stop Order</button>
        <button class="ord">Unstop Order</button>
    </div>

    <div class="scrollable-container">
        <!-- Add content here -->
    </div>
</div>

@endsection
