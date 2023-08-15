@extends('layouts.appPayroll')
@section('content')
    <script>
        $(document).ready(function() {
            $('#table_Divisi').DataTable({
                order: [
                    [0, 'asc']
                ],
            });



            // Function to remove the backdrop
            function removeBackdrop() {
                $('.modal-backdrop').remove();
            }

            // Function to show the modal
            function showModalDivisi() {
                $('#modalKdPeg').addClass('show');
                $('#modalKdPeg').css('display', 'block');
                $('body').addClass('modal-open');
            }

            // Function to hide the modal
            function hideModalDivisi() {
                $('#modalKdPeg').removeClass('show');
                $('#modalKdPeg').css('display', 'none');
                $('body').removeClass('modal-open');
                removeBackdrop();
            }

            function showModalPegawai() {
                $('#modalPeg').addClass('show');
                $('#modalPeg').css('display', 'block');
                $('body').addClass('modal-open');
            }

            // Function to hide the modal
            function hideModalPegawai() {
                $('#modalPeg').removeClass('show');
                $('#modalPeg').css('display', 'none');
                $('body').removeClass('modal-open');
                removeBackdrop();
            }

            // Attach click event to DataTable rows
            $('#table_Divisi tbody').on('click', 'tr', function() {
                // Get the data from the clicked row
                var rowData = $('#table_Divisi').DataTable().row(this).data();
                // Populate the input fields with the data
                $('#Id_Div').val(rowData[0]);
                $('#Nama_Div').val(rowData[1]);
                fetch("/getPegawai/" + rowData[0])
                    .then(response => {

                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json(); // Assuming the response is in JSON format
                    })
                    .then(data => {

                        // Handle the data retrieved from the server (data should be an object or an array)

                        // Clear the existing table rows
                        $('#table_Peg').DataTable().clear().draw();

                        // Loop through the data and create table rows
                        data.forEach(item => {
                            var row = [item.kd_pegawai, item.nama_peg];
                            $('#table_Peg').DataTable().row.add(row);
                        });

                        // Redraw the table to show the changes
                        $('#table_Peg').DataTable().draw();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                // var idDivValue = rowData[0];
                // submitFormWithIdDiv(idDivValue);
                // Hide the modal immediately after populating the data
                hideModalDivisi();
            });
            $('#table_Peg').DataTable({
                order: [
                    [0, 'asc']
                ]
            });

            // Attach click event to table rows
            $('#table_Peg tbody').on('click', 'tr', function() {
                // Get the data from the clicked row
                console.log($('#table_Peg').DataTable().row(this));
                var rowData = $('#table_Peg').DataTable().row(this).data();
                console.log(rowData);
                // Populate the input fields with the data
                $('#Id_Peg').val(rowData[0]);
                $('#Nama_Peg').val(rowData[1]);

                // Hide the modal immediately after populating the data
                hideModalPegawai();
            });

            // Attach click event to the button to show the modal
            $('#divisiButton').on('click', function() {
                showModalDivisi();
            });

            // Attach hidden event to the modal
            $('#modalKdPeg').on('hidden.bs.modal', function() {
                removeBackdrop();
            });

        });
    </script>




    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="width:1200px;">
                    <div class="card-header" style="">Maintenance Peringatan</div>




                    <div class="card-body" style="border: 1px solid black; margin: 10px;">
                        <div class="card-body">

                            <div class="row" style="margin-left:-120px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <label for="TglMulai" class="aligned-text">Tanggal:</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglMulai" name="TglMulai"
                                        value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required
                                        style="max-width: 200px;">


                                </div>

                            </div>

                            <div class="row" style="margin-left:-120px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Divisi:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <input class="form-control" type="text" id="Id_Div" readonly
                                        style="resize: none; height: 40px; max-width: 100px;">
                                    <input class="form-control" type="text" id="Nama_Div" readonly
                                        style="resize: none; height: 40px; max-width: 450px;">
                                    {{-- <select class="form-control" id="Nama_Div" readonly name="Nama_Div"
                                        style="resize: none; height: 40px; max-width: 250px;">
                                        <option value=""></option>
                                        @foreach ($divisi as $data)
                                            <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                        @endforeach
                                    </select> --}}
                                    <button type="button" class="btn" style="margin-left: 10px; " id="divisiButton"
                                        data-toggle="modal" data-target="#modalKdPeg">...</button>

                                    <div class="modal fade" id="modalKdPeg" role="dialog" arialabelledby="modalLabel"
                                        area-hidden="true" style="">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content" style="">
                                                <div class="modal-header" style="justify-content: center;">

                                                    <div class="row" style=";">
                                                        <div class="table-responsive" style="margin:30px;">
                                                            <table id="table_Divisi" class="table table-bordered">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th scope="col">Id Divisi</th>
                                                                        <th scope="col">Nama Divisi</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($peringatanDivisi as $data)
                                                                        <tr>

                                                                            <td>{{ $data->Id_Div }}</td>
                                                                            <td>{{ $data->Nama_Div }}</td>



                                                                        </tr>
                                                                    @endforeach
                                                                    {{-- @foreach ($peringatan as $item)
                                                                        <tr>
                                                                            <td><input type="checkbox" style="margin-right:5px;"
                                                                                    data-id="{{ $item->kd_pegawai }}_{{ $item->peringatan_ke }}_{{ $item->bulan }}_{{ $item->tahun }}">{{ $item->peringatan_ke }}
                                                                                    data-id="{{ $item->kd_pegawai }}_{{ $item->peringatan_ke }}_{{ $item->TglBerlaku }}">{{ $item->peringatan_ke }}
                                                                            </td>
                                                                            <td>{{ $item->Nama_Div }}</td>
                                                                            <td>{{ $item->kd_pegawai }}</td>
                                                                            <td>{{ $item->Nama_Peg }}</td>
                                                                            <td>{{ $item->TglBerlaku ?? 'Null' }}</td>
                                                                            <td>{{ $item->TglAkhir ?? 'Null' }}</td>
                                                                            <td>{{ $item->uraian }}</td>
                                                                            <td>{{ $item->bulan }}</td>
                                                                            <td>{{ $item->tahun }}</td>
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

                                </div>
                            </div>
                            <div class="row" style="margin-left:-120px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Kd Pegawai:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <input class="form-control" type="text" id="Id_Peg" readonly
                                        style="resize: none; height: 40px; max-width: 100px;">
                                    <input class="form-control" type="text" id="Nama_Peg" readonly
                                        style="resize: none; height: 40px; max-width: 450px;">
                                    <button type="button" class="btn" style="margin-left: 10px;" data-toggle="modal"
                                        data-target="#modalPeg">...</button>
                                    <div class="modal fade" id="modalPeg" role="dialog" arialabelledby="modalLabel"
                                        area-hidden="true" style="">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content" style="">
                                                <div class="modal-header" style="justify-content: center;">

                                                    <div class="row" style=";">
                                                        <div class="table-responsive" style="margin:30px;">
                                                            <table id="table_Peg" class="table table-bordered">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th scope="col">Id Pegawai</th>
                                                                        <th scope="col">Nama Pegawai</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>

                            </div>








                        </div>
                        <div class="data1" style="">
                            <div class="card-body-container" style="display: flex; flex-wrap: wrap; margin: 10px;">
                                <div class="card-body" style="flex: 0 0 50%; max-width: 50%;">

                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Tahun Akhir :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                            <input type="text" class="form-control" name="Divisi_pengiriman"
                                                id="Divsi_pengiriman" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Peringatan :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                            <input type="text" class="form-control" name="Divisi_pengiriman"
                                                id="Divsi_pengiriman" placeholder="" required>

                                        </div>
                                    </div>

                                </div>
                                <div class="card-body" style="flex: 0 0 50%; max-width: 50%;">

                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Bulan Akhir :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                            <input type="text" class="form-control" name="Divisi_pengiriman"
                                                id="Divsi_pengiriman" placeholder="" required>

                                        </div>
                                    </div>
                                    <div class="row" style="">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Tgl Akhir Peringatan :</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:180px;">
                                            <input class="form-control" type="date" id="TglMulai" name="TglMulai"
                                                value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required
                                                style="max-width: 200px;">


                                        </div>
                                    </div>

                                </div>



                            </div>






                        </div>


                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Peringatan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <select class="form-control" id="Shift" name="Shift"
                                    style="resize: none;height: 40px; max-width:450px;">
                                    <option value=""></option>
                                    @foreach ($peringatanDivisi as $data)
                                        <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Bulan:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <select class="form-control" id="Shift" name="Shift"
                                    style="resize: none;height: 40px; max-width:450px;">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>

                            </div>
                        </div>

                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Tahun :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                <input type="text" class="form-control" name="Divisi_pengiriman"
                                    id="Divsi_pengiriman" placeholder="" required>

                            </div>
                        </div>
                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">No. Surat :</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0" style="max-width:480px;">
                                <input type="text" class="form-control" name="Divisi_pengiriman"
                                    id="Divsi_pengiriman" placeholder="" required>

                            </div>
                        </div>
                        <div class="row" style="margin-left:-120px; ">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <label for="TglMulai" class="aligned-text" style="min-width: fit-content">Tgl.
                                    Mulai:</label>
                            </div>
                            <div class="form-group col-md-4" style="">
                                <input class="form-control" type="date" id="TglMulai" name="TglMulai"
                                    value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required
                                    style="max-width: 200px;">
                                <span class="aligned-text" style="margin-left: 15px; min-width:fit-content;">Tgl. Akhir
                                    :</span>
                                <input class="form-control" type="date" id="TglSelesai" name="TglSelesai"
                                    value="{{ old('TglSelesai', now()->format('Y-m-d')) }}" required
                                    style="max-width: 200px;">

                            </div>


                        </div>
                        <div class="row" style="margin-left:-120px;">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text"> Keterangan:</span>
                            </div>
                            <div class="form-group col-md-4" style="max-width:1000px">
                                <textarea class="input" name="keterangan" id="keterangan" cols="60" rows="3" placeholder="Keterangan"
                                    style=""></textarea>
                            </div>

                        </div>



                    </div>






                    <div class="row" style="padding-top: 20px; margin:20px;">
                        <div class="col-6" style="text-align: left; ">
                            <button type="button" class="btn btn-primary"
                                style="margin-left: 10px;width:100px;">Isi</button>
                            <button type="button" class="btn btn-secondary"
                                style="margin-left: 10px;width:100px;">Koreksi</button>
                            <button type="button" class="btn btn-danger"
                                style="margin-left: 10px;width:100px;">Hapus</button>
                            <button type="button" class="btn btn-dark"
                                style="margin-left: 10px;width:100px;">Keluar</button>

                        </div>
                        <div class="col-6" style="text-align: right; ">


                        </div>
                    </div>
                </div>






            </div>








            <br>







        </div>
    </div>
@endsection