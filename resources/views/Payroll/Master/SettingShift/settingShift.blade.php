@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">PEKERJA</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <h5>
                            <div class="panel-body">
                                <form class="form" method="POST" enctype="multipart/form-data"
                                    action="{{ url('/Jurnal') }}">
                                    {{ csrf_field() }}

                                    <div class="modal-body">

                                        <br>
                                        <div style="flex: 1; margin-right: 10px;">
                                            <label>Divisi</label>
                                            <select class="form-control" id="Shift" name="Shift"
                                                style="resize: none;height: 40px; value="" required>
                                                <option value="">Divisi 1</option>
                                                <option value="">Divisi 1</option>
                                                <option value="">Divisi 1</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div style="flex: 1; margin-right: 10px;">
                                            <label>Kode Pegawai</label>
                                            <select class="form-control" id="Shift" name="Shift"
                                                style="resize: none;height: 40px; value="" required>
                                                <option value="">Divisi 1</option>
                                                <option value="">Divisi 1</option>
                                                <option value="">Divisi 1</option>
                                            </select>
                                        </div>
                                        <br>
                                        <label>Shift Lama</label>
                                        <div style="flex: 1; margin-right: 10px;">

                                            <div style="display: flex; flex-wrap: nowrap;">
                                                <textarea class="form-control" id="NIK" name="NIK" style="resize: none;height: 40px;" required></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div style="flex: 1; margin-right: 10px;">
                                            <label>Shift Baru</label>
                                            <select class="form-control" id="Shift" name="Shift"
                                                style="resize: none;height: 40px; value="" required>
                                                <option value="">Divisi 1</option>
                                                <option value="">Divisi 1</option>
                                                <option value="">Divisi 1</option>
                                            </select>
                                        </div>
                                        <br>



                                        <div style="text-align: right; margin-top: 20px;">

                                            <button type="submit" class="btn btn-primary">Proses</button>
                                            <button type="button" class="btn btn-secondary">Keluar</button>
                                        </div>



                                    </div>
                                </form>

                            </div>


                        </h5>
                    </div>
                </div>
                <br>

            </div>
        </div>
    </div>
@endsection
