@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">PROGRAM Maintenance Karyawan Harian</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <h5>

                            <div class="panel-body">
                                <form class="form" method="POST" enctype="multipart/form-data"
                                    action="{{ url('/Jurnal') }}">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <label>Nama Klinik</label>
                                        <select class="form-control" id="Posisi" name="Posisi" value="" required>
                                            <option value="">Opsi 1</option>
                                            <option value="">Opsi 1</option>
                                            <option value="">Opsi 1</option>
                                        </select>
                                        <br>
                                        <div style="flex: 1; margin-right: 10px;">
                                            <label>Alamat</label>
                                            <textarea class="form-control" id="NoInduk" name="NoInduk" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                        <br>
                                        <div style="flex: 1; margin-right: 10px;">
                                            <label>Kota</label>
                                            <textarea class="form-control" id="NoKartu" name="NoKartu" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                        <br>
                                        <div style="flex: 1; margin-right: 10px;">
                                            <label>No. Telepon</label>
                                            <textarea class="form-control" id="NoKartu" name="NoKartu" style="resize: none;height: 40px;" required></textarea>
                                        </div>
                                        <br>

                                    </div>


                            </div>

                            </form>
                            <div style="text-align: right; margin-top: 20px;">


                                <button type="button" class="btn btn-info">Isi</button>
                                <button type="button" class="btn btn-warning">Koreksi</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                                <button type="button" class="btn btn-light">Batal</button>
                                <button type="button" class="btn btn-dark">Keluar</button>
                            </div>
                    </div>


                    </h5>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
