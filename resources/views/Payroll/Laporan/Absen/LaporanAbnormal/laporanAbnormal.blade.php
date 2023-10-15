@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Laporan/LaporanAbnormal.js') }}"></script>
    <div class="container-fluid no-print">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0" style="width:1050px;">

                <div class="card" style=" ">
                    <div class="card-header" style="">Form Absen Abnormal</div>






                    <div class="card-body-container" style="margin-left:-220px;">


                        <br>

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <label for="TglAbnormal" class="aligned-text">Tanggal:</label>
                            </div>
                            <div class="form-group col-md-4">
                                <input class="form-control" type="date" id="TglAbnormal" name="TglAbnormal"
                                    value="" required style="max-width: 200px;">

                                <button type="button" class="btn  " style="margin-left:10px;"
                                    id="tampilButton">Tampilkan</button>
                                <button type="button" class="btn btn-dark  " style="margin-left:10px;"
                                    onclick={window.print()}>Cetak</button>
                            </div>


                        </div>










                    </div>

                    <div class="row">
                        <div class="table-responsive" style="margin:30px; ">
                            <table class="table table-bordered" id="tabel_Abnormal">
                                <thead>
                                    <tr>

                                        <th scope="col">Kd_Pegawai</th>
                                        <th scope="col">Nama_Peg</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Jam_Masuk</th>
                                        <th scope="col">Jam_Keluar</th>
                                        <th scope="col">Terlambat</th>
                                        <th scope="col">Tinggal</th>
                                        <th scope="col">Ket</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">

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
                    </div>










                </div>
            </div>


        </div>






    </div>
    <div class="printme" id="printSection">
        <div class="header">
            <h4 style="text-align: center;">ABSEN ABNORMAL</h4>
            <div class="date" id="TglCetak">Tanggal: </div>
        </div>
        <table id="tabelCetak">
            <thead>
                <tr>

                    <th scope="col">Kd_Pegawai</th>
                    <th scope="col">Nama_Peg</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Jam_Masuk</th>
                    <th scope="col">Jam_Keluar</th>
                    <th scope="col">Terlambat</th>
                    <th scope="col">Tinggal</th>
                    <th scope="col">Ket</th>
                    <!-- Add more column headers as needed -->
                </tr>


            </thead>
            <tbody>

            </tbody>
        </table>



    </div>
@endsection
