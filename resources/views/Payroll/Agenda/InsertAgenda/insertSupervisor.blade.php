@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid"  >
        <div class="row justify-content-center" style="width: 850px;">
            <div class="col-md-10 RDZMobilePaddingLR0" >

                <div class="card" style="margin:auto;" >
                    <div class="card-header">PEKERJA</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px;">
                        <div style="align-items: center" >
                            <div>
                                <label style="margin-right: 10px;">Tanggal</label>
                            </div>

                            <div style="display: flex; ">
                                <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                    value="{{ old('TglLapor', now()->format('Y-m-d')) }}" required>


                            </div>

                        </div>
                        <br>
                        <div class="card-body"
                            style="flex: 1; margin-right: 10px; border: 1px solid #000000; border-radius: 3px; text-align: middle;">
                            <div class="permohonan-s-p-container18" style="align-items: center;" id="div_detailSuratPesanan">
                                <div class="permohonan-s-p-container19" style="margin-right: 10px"> <span>Divisi</span>
                                </div>
                                <div class="permohonan-s-p-container20">
                                    <div class="permohonan-s-p-container21">
                                        <select name="kategori_utama" id="kategori_utama" class="form-control">
                                            <option disabled selected value></option>

                                        </select>

                                    </div>
                                </div>


                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Kode_Pegawai</th>
                                            <th scope="col">Nama_Pegawai</th>
                                            <th scope="col"></th>


                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <tr>

                                            {{-- <td>
                                                <a href="" title="Edit Employee">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                    </button>
                                                </a>
                                                <form method="POST" action="" accept-charset="UTF-8" style="display:inline">
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee" onclick='return confirm("Confirm delete?")'>
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                    </button>
                                                </form>
                                            </td> --}}

                                        </tr>
                                        {{-- @foreach ($employees as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->gender }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->address }}</td>
                                            <td>
                                                <a href="{{ route('employees.edit', $data->id) }}" title="Edit Employee">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                    </button>
                                                </a>
                                                <form method="POST" action="{{route('employees.destroy', $data->id)}}" accept-charset="UTF-8" style="display:inline">
                                                @csrf
                                                @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee" onclick='return confirm("Confirm delete?")'>
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach --}}
                                    </tbody>

                                </table>
                            </div>
                            <div style="flex: 1; margin-right: 10px; margin-top: 5px; align-items:center;">
                                <input type="checkbox">
                                <label for="staff">Pilih Semua</label>
                            </div>
                        </div>
                        <br>


                        <div style="display: flex; align-items: center; margin-left:20px; ">
                            <label style="margin-bottom: 5px; margin-right: 20px; margin-left: -15px;">Shift</label>
                            <select class="form-control" id="Shift" name="Shift"
                                style="resize: none;height: 40px; max-width:150px">
                                <option value="">PISAT1</option>
                                <option value="">PISAT2</option>
                            </select>

                        </div>

                        <div class="time-form" style="justify-content: left;">

                            <label for="masuk">Masuk:</label>
                            <input type="time" id="masuk" name="masuk">
                            <label for="pulang_istirahat">Pulang Istirahat:</label>
                            <input type="time" id="pulang_istirahat" name="pulang_istirahat">
                        </div>
                        <div class="time-form" style="justify-content: left;">

                            <label for="pulang">Pulang:</label>
                            <input type="time" id="pulang" name="pulang">
                            <label for="masuk_istirahat">Masuk Istirahat:</label>
                            <input type="time" id="masuk_istirahat" name="masuk_istirahat">
                        </div>





                    </div>


                    <div style="text-align: right; margin: 25px;">
                        <button type="button" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-dark">Keluar</button>
                    </div>
                </div>








                <br>







            </div>
        </div>

    </div>
    <br>

    </div>
    </div>
    </div>
@endsection
