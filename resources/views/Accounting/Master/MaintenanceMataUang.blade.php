@extends('layouts.appAccounting')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Maintenance MataUang</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form-container col-md-12">
                            <form method="POST" action="">
                                @csrf
                                <!-- Form fields go here -->
                                <div>
                                    <label for="nama" class="col-md-4">Id Mata Uang </label>
                                    <select name="nama_select" class="form-control" style="width: 400px;">
                                        <option value="option1">Pilihan 1</option>
                                        <option value="option2">Pilihan 2</option>
                                        <option value="option3">Pilihan 3</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="id" class="col-md-4">Nama Mata Uang </label>
                                    <input type="text" name="namamatauang">
                                </div>
                                <div>
                                    <label for="id" class="col-md-4">Symbol </label>
                                    <input type="text" name="symbol">
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
