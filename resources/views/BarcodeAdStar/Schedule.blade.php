@extends('layouts.appBarcode')
@section('content')


<h2>Schedule</h2>

<div class="body">
    <div class="card">
        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
        <div class="form berat_woven">
            <form action="#" method="post" role="form">
                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Divisi:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Divisi" id="Divsi" placeholder="Divisi" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Kelut:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Kelut" id="Kelut" placeholder="Kelut" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Kelompok:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Kelompok" id="Kelompok" placeholder="Kelompok" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Sub Kelompok:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Sub_kelompok" id="Sub_kelompok" placeholder="Sub Kelompok" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3 d-flex justify-content-end">
                        <span class="aligned-text">Type:</span>
                    </div>
                    <div class="form-group col-md-9 mt-3 mt-md-0">
                        <input type="text" class="form-control" name="Type" id="Type" placeholder="Type" required>
                    </div>
                </div>


                <div class="card">
                <div class="card-header">Type</div>
                        <table>
                            <tr>
                                <th>Divisi </th>
                                <th>Kelut </th>
                                <th>Kelompok </th>
                                <th>Sub Kelompok </th>
                                <th>Type </th>
                            </tr>
                        </table>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col- row justify-content-md-center">
                        <div class="text-center col-md-auto"><button type="submit">Pilih Semua</button></div>
                        <div class="text-center col-md-auto"><button type="submit">Hapus</button></div>
                        <div class="text-center col-md-auto"><button type="submit">Keluar</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
