@extends('layouts.appPayroll')
@section('content')
<script type="text/javascript" src="{{ asset('js/Angsuran/angsuranHutangHarian.js') }}"></script>
    <div class="form-wrapper mt-4">
        <div class="form-container">
            <div class="card">
                <div class="card-header">Angsuran Hut Staff</div>
                <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                    <div class="form berat_woven">

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Tanggal:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="date" class="form-control" name="Divisi_pengiriman" id="tanggal_Hutang"
                                 value="" required>

                                <div class="text-center col-md-auto"><button type="" id="buttonListData">List Data</button></div>
                            </div>
                        </div>

                        <div class="form-container">
                            <div class="card">
                                <div class="card-header">Table</div>
                                <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                                    <div class="form berat_woven">
                                        <form action="#" method="post" role="form">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Nama Divisi</th>
                                                        <th scope="col">KdPegawai</th>
                                                        <th scope="col">Nama Pegawai</th>
                                                        <th scope="col">No Hutang</th>
                                                        <th scope="col">Sisa Hutang Sblm</th>
                                                        <th scope="col">Nilai</th>
                                                        <th scope="col">Sisa Sekarang</th>
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
                                </div>
                            </div>





                            <div class="row mt-3">
                                <div class="col- row justify-content-md-center">
                                    <div class="text-center col-md-auto"><button type="submit">Update</button></div>
                                    <div class="text-center col-md-auto"><button type="submit">Process</button></div>
                                    <div class="text-center col-md-auto"><button type="submit">Quit</button></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <script>
            $(document).ready(function() {
                $('.dropdown-submenu a.test').on("click", function(e) {
                    $(this).next('ul').toggle();
                    e.stopPropagation();
                    e.preventDefault();
                });
            });
        </script>
        </body>
    @endsection
