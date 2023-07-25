@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance Bank</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="{{ url('MaintenanceBank') }}" id="formkoreksi">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" id="methodkoreksi">
                                <!-- Form fields go here -->
                                <div>
                                    <label for="idBank" class="col-md-2">Id. Bank</label>
                                    <input type="text" id="idBank" name="idBank">
                                </div>
                                <div>
                                    <div class="d-flex">
                                        <label for="namaBank" class="col-md-2">Nama Bank</label>
                                        <select name="namaBankselect" class="form-control" style="width: 400px;" id="namaBankselect">
                                            <option disabled selected>-- Pilih Bank --</option>
                                            @foreach ($maintenanceBank as $mb)
                                            <option value="{{ $mb->Id_Bank }}">{{ $mb->Nama_Bank }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="hidden" name="namaBank" id="namaBank"> --}}
                                        <input type="text" name="isiNamaBank" style="display: none;" id="isiNamaBank" >
                                    </div>
                                </div>
                                <div>
                                    <label for="jenisBankSelect" class="col-md-2">Jenis Bank </label>
                                    <input type="radio" name="jenisBankSelect" value="I" id="jenisBankSelect">
                                    <label for="jenisBankSelect">Interent</label>
                                    <input type="radio" name="jenisBankSelect" value="E" id="jenisBankSelect">
                                    <label for="jenisBankSelect">Eksterent</label>
                                </div>
                                <div>
                                    <label for="statusAktif" class="col-md-2">Status Aktif</label>
                                    <input type="checkbox" name="statusAktif" id="statusAktif" >
                                    <label for="checkbox">Aktif</label>
                                </div>
                                <div>
                                    <div class="d-flex">
                                        <label for="kodePerkiraanSelect" class="col-md-2">Kode Perkiraan </label>
                                        <input type="text" id="kodePerkiraan" name="kodePerkiraan">
                                        <input type="text" id="ketKodePerkiraan" name="ketKodePerkiraan">
                                        <select name="kodePerkiraanSelect" id="kodePerkiraanSelect" class="form-control" style="width: 100px;">
                                            <option disabled selected>-- Pilih KdPerkiraan --</option>
                                            @foreach ($maintenanceBank as $kp)
                                            <option value="{{ $kp->KodePerkiraan }}">{{ $kp->KodePerkiraan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label for="noRekening" class="col-md-2">No Rekening </label>
                                    <input type="text" name="norekening" id="noRekening">
                                </div>
                                <div>
                                    <label for="saldoBank" class="col-md-2">Saldo Bank </label>
                                    <input type="text" name="saldoBank" id="saldoBank">
                                </div>
                                <p>
                                <div>
                                    <label for="alamat" class="col-md-2">Alamat </label>
                                    <input type="text" name="alamat" id="alamat" style="width: 450px;">
                                </div>
                                <div>
                                    <label for="kota" class="col-md-2">Kota </label>
                                    <input type="text" name="kota" id="kota">
                                </div>
                                <div>
                                    <label for="telp" class="col-md-2">Telp </label>
                                    <input type="text" name="telp" id="telp">
                                </div>
                                <div>
                                    <label for="person" class="col-md-2">Person </label>
                                    <input type="text" name="person" id="person">
                                </div>
                                <div>
                                    <label for="hp" class="col-md-2">HP </label>
                                    <input type="hp" name="hp" id="hp">
                                </div>

                                <div class="row">
                                    <input type="submit" name="isi" id="btnIsi" value="Isi" class="btn btn-primary" onclick="clickIsi()">
                                    <input type="submit" name="koreksi" id="btnKoreksi" value="Koreksi" class="btn btn-primary" onclick="clickKoreksi()">
                                    <input type="submit" name="hapus"  id="btnHapus" value="Hapus" class="btn btn-primary">
                                    <input type="submit" name="proses" id="btnProses" value="Proses" class="btn btn-primary" disabled>
                                    <input type="submit" name="keluar" id="btnKeluar" value="Keluar" class="btn btn-primary">
                                    <input type="submit" name="batal" id="btnBatal" value="Batal" class="btn btn-primary" style="display: none" onclick="clickBatal()">
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



