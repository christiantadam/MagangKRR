@extends('layouts.appAdStar')
@section('content')

<h2>Form Copy Tabel </h2>

<div class="body">
    <div class="card">
        <div class="input-container">
            <div class=radio>
            <label for="customer">Product Name:</label>
            <input type="radio" id="pilihan1" name="pilihan" value="pilihan1">StarPark
            {{-- <label for="pilihan1">StarPark</label><br> --}}
            <input type="radio" id="pilihan2" name="pilihan" value="pilihan2">AdStar
            {{-- <label for="pilihan2">AdStar</label><br> --}}
            </div>
        </div>
    </div>
</div>

@endsection
