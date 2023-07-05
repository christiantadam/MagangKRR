@extends('layouts.appPayroll')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">PEKERJA</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div >
                            <span>Divisi</span>
                        </div>
                        <div>
                            <div class="permohonan-s-p-container21"> <select name="jenis_brg" id="jenis_brg"
                                    class="form-control">

                                    <option disabled selected value>-- Pilih Jenis Barang --</option>

                                </select>
                            </div>


                        </div>
                        <br>
                        <div >
                            <span>Pegawai</span>
                        </div>
                        <div>
                            <div class="permohonan-s-p-container22">
                                <select name="kategori_utama" id="kategori_utama" class="form-control">
                                    <option disabled selected value>-- Pilih Kategori Utama --</option>

                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">IdKeluarga</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Hubungan</th>
                                        <th scope="col">JnsKelamin</th>
                                        <th scope="col">KotaLahir</th>
                                        <th scope="col">TglLahir</th>
                                        <th scope="col">PISAT</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">NIK</th>
                                        <th scope="col">Id BPJS</th>
                                        <th scope="col">Klinik</th>
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
                        <div style="text-align: right; margin-top: 20px;">
                            <button type="button" class="btn btn-secondary">isi</button>
                            <button type="submit" class="btn btn-primary">Koreksi</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                </div>
                <br>

            </div>
        </div>
    </div>
@endsection
