@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance Bank</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div>
                                    <label for="id" class="col-md-2">Id. Bank </label>
                                    <input type="text" name="idbank">
                                </div>
                                <div>
                                    <div class="row">
                                        <label for="nama" class="col-md-2">Nama Bank </label>
                                        <select name="nama_select" class="form-control" style="width: 400px;">
                                            <option value="option1">Pilihan 1</option>
                                            <option value="option2">Pilihan 2</option>
                                            <option value="option3">Pilihan 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label for="id" class="col-md-2">Jenis Bank </label>
                                    <input type="radio" name="nama_radio" value="nilai_1" id="radio_1">
                                    <label for="radio_1">Interent</label>
                                    <input type="radio" name="nama_radio" value="nilai_2" id="radio_2">
                                    <label for="radio_2">Eksterent</label>
                                </div>
                                <div>
                                    <label for="id" class="col-md-2">Status Aktif </label>
                                    <input type="checkbox" name="status">
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
                                    <input type="text" name="norekening">
                                </div>
                                <div>
                                    <label for="id" class="col-md-2">Saldo Bank </label>
                                    <input type="text" name="saldobank">
                                </div>
                                <p>
                                <div>
                                    <label for="id" class="col-md-2">Alamat </label>
                                    <input type="text" name="alamat" style="width: 450px;">
                                </div>
                                <div>
                                    <label for="id" class="col-md-2">Kota </label>
                                    <input type="text" name="kota">
                                </div>
                                <div>
                                    <label for="id" class="col-md-2">Telp </label>
                                    <input type="text" name="telp">
                                </div>
                                <div>
                                    <label for="id" class="col-md-2">Person </label>
                                    <input type="text" name="person">
                                </div>
                                <div>
                                    <label for="id" class="col-md-2">HP </label>
                                    <input type="text" name="hp">
                                </div>

                                <div class="mb-3">
                                <input type="submit" name="isi" value="Isi" class="btn btn-primary">
                                <input type="submit" name="koreksi" value="Koreksi" class="btn btn-primary">
                                <input type="submit" name="hapus" value="Hapus" class="btn btn-primary">
                                <input type="submit" name="proses" value="Proses" class="btn btn-primary" disabled>
                                <input type="submit" name="keluar" value="Keluar" class="btn btn-primary">
                              </div>
                            </form>
                            <br>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
