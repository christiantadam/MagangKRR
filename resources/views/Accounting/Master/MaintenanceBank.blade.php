@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance Bank</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div>
                                    <label for="idBank" class="col-md-2">Id. Bank</label>
                                    <input type="text" id="idBank">
                                </div>
                                <div>
                                    <div class="row">
                                        <label for="namaBank" class="col-md-2">Nama Bank</label>
                                        <select name="namaBankselect" class="form-control" style="width: 400px;" id="namaBankselect">
                                            <option disabled selected>-- Pilih Bank --</option>
                                            @foreach ($maintenanceBank as $mb)
                                            <option value="{{ $mb->Id_Bank }}">{{ $mb->Nama_Bank }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" style="display: none;" id="isiNamaBank">
                                    </div>
                                </div>
                                <div>
                                    <label for="id" class="col-md-2">Jenis Bank </label>
                                    <input type="radio" name="jenisBankSelect" value="I" id="interent">
                                    <label for="interent">Interent</label>
                                    <input type="radio" name="jenisBankSelect" value="E" id="eksterent">
                                    <label for="eksterent">Eksterent</label>
                                </div>
                                <div>
                                    <label for="id" class="col-md-2">Status Aktif </label>
                                    <input type="checkbox" name="status" id="statusAktif">
                                    <label for="checkbox">Aktif</label>
                                </div>
                                <div>
                                    <div class="row">
                                        <label for="id" class="col-md-2">Kode Perkiraan </label>
                                        <select name="nama_select" class="form-control" style="width: 400px;">
                                            <option value="option1">Pilihan 1</option>
                                            <option value="option2">Pilihan 2</option>
                                            <option value="option3">Pilihan 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label for="id" class="col-md-2">No Rekening </label>
                                    <input type="text" name="norekening" id="noRekening" value="">
                                </div>
                                <div>
                                    <label for="saldoBank" class="col-md-2">Saldo Bank </label>
                                    <input type="text" name="saldoBank" id="saldoBank" value="">
                                </div>
                                <p>
                                <div>
                                    <label for="alamat" class="col-md-2">Alamat </label>
                                    <input type="text" name="alamat" id="alamat" value="" style="width: 450px;">
                                </div>
                                <div>
                                    <label for="kota" class="col-md-2">Kota </label>
                                    <input type="text" name="kota" id="kota" value="">
                                </div>
                                <div>
                                    <label for="id" class="col-md-2">Telp </label>
                                    <input type="text" name="telp" id="telp" value="">
                                </div>
                                <div>
                                    <label for="id" class="col-md-2">Person </label>
                                    <input type="text" name="person" id="person" value="">
                                </div>
                                <div>
                                    <label for="id" class="col-md-2">HP </label>
                                    <input type="text" name="hp" id="hp" value="">
                                </div>

                                <div class="mb-3">
                                    <input type="submit" name="isi" id="btnIsi" value="Isi" class="btn btn-primary" onclick="clickIsi()">
                                    <input type="submit" name="koreksi" id="btnKoreksi" value="Koreksi" class="btn btn-primary">
                                    <input type="submit" name="hapus"  id="btnHapus" value="Hapus" class="btn btn-primary">
                                    <input type="submit" name="proses" id="btnProses" value="Proses" class="btn btn-primary" disabled>
                                    <input type="submit" name="keluar" id="btnKeluar" value="Keluar" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="{{ asset('js/Master/MaintenanceBank.js') }}"></script>
@endsection



