@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card">
                    <div class="card-header">PEKERJA</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px">
                        <div class="permohonan-s-p-container18" id="div_detailSuratPesanan">
                            <div class="permohonan-s-p-container19"> <span>Divisi</span>
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
                        <div class="permohonan-s-p-container18" id="div_detailSuratPesanan">
                            <div class="permohonan-s-p-container19"> <span>Pegawai</span>
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
                                        <th scope="col">Kode</th>
                                        <th scope="col">JNSPEG</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIK</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Kota</th>
                                        <th scope="col">TGL MASUK AWAL</th>
                                        <th scope="col">KARTU</th>
                                        <th scope="col">INDUK</th>
                                        <th scope="col">RBH</th>
                                        <th scope="col">ASTEK</th>
                                        <th scope="col">KOPERASI</th>
                                        <th scope="col">TGL KOPERASI</th>
                                        <th scope="col">NPWP</th>
                                        <th scope="col">No. Rek</th>
                                        <th scope="col">No. BPJS</th>
                                        <th scope="col">Penanggung</th>
                                        <th scope="col">NM_IBU_KANDUNG</th>
                                        <th scope="col">Klinik</th>
                                        <th scope="col">JABATAN</th>
                                        <th scope="col">NO PENSIUN</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">NO. TELEPON</th>
                                        <th scope="col">VAKSIN</th>
                                        <th scope="col">TEMPAT_LAHIR</th>
                                        <th scope="col">TGL_LAHIR</th>
                                        <th scope="col">KARTU_MAKAN</th>
                                        <th scope="col">Rek.BCA</th>
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
                            <button type="button" class="btn btn-primary">Tampil</button>
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
