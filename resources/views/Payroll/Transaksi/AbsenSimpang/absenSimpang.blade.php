@extends('layouts.appPayroll')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center" style="width: 1250px;">
        <div class="col-md-10 RDZMobilePaddingLR0">

            <div class="card" style="margin:auto;">
                <div class="card-header">Transfer Absen</div>

                <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px;">
                    <div style="align-items: center">
                        <div style="display: flex; align-items:center;">
                            <label style="margin-right: 10px;">Tanggal</label>
                            <input class="form-control" type="date" id="TglLapor" name="TglLapor"
                                value="{{ old('TglLapor', now()->format('Y-m-d')) }}" style="width: 150px; margin-right:20px;" required>
                            <button id="processButton" style="width: 75x; margin-right:20px;">Tampilkan</button>
                            <button id="processButton" style="width: 75px; margin-right:20px;">Cetak</button>
                            <br>

                        </div>


                    </div>


                    <br>
                    <div id="gridViewContainer" style="max-height: 300px; overflow-y: scroll;">
                        <table id="gridView" style="border-collapse: collapse; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="border: 1px solid #ddd; padding: 8px;">Check_Box</th>
                                    <th style="border: 1px solid #ddd; padding: 8px;">Kd_Pegawai</th>
                                    <th style="border: 1px solid #ddd; padding: 8px;">Nama_Pegawai</th>
                                    <th style="border: 1px solid #ddd; padding: 8px;">Ket_A</th>
                                    <th style="border: 1px solid #ddd; padding: 8px;">Jam_Masuk</th>
                                    <th style="border: 1px solid #ddd; padding: 8px;">Jam_Keluar</th>
                                    <th style="border: 1px solid #ddd; padding: 8px;">Jml_Jam</th>
                                    <th style="border: 1px solid #ddd; padding: 8px;">Datang</th>
                                    <th style="border: 1px solid #ddd; padding: 8px;">Pulang</th>
                                    <th style="border: 1px solid #ddd; padding: 8px;">TotalJam</th>
                                    <th style="border: 1px solid #ddd; padding: 8px;">Ket_Masuk</th>
                                    <!-- Add more column headers as needed -->
                                </tr>
                                <tr>
                                    <td style="text-align: center ;"><input type="checkbox" style="margin-top: 10px;"></td>
                                    <td>Tes</td>
                                    <td>Tes 2</td>
                                    <!-- Add more column headers as needed -->
                                </tr>
                                <tr>
                                    <td style="text-align: center ;"><input type="checkbox" style="margin-top: 10px;"></td>
                                    <td>Tes</td>
                                    <td>Tes 2</td>
                                    <!-- Add more column headers as needed -->
                                </tr>
                                <tr>
                                    <td style="text-align: center ;"><input type="checkbox" style="margin-top: 10px;"></td>
                                    <td>Tes</td>
                                    <td>Tes 2</td>
                                    <!-- Add more column headers as needed -->
                                </tr>
                                <tr>
                                    <td style="text-align: center ;"><input type="checkbox" style="margin-top: 10px;"></td>
                                    <td>Tes</td>
                                    <td>Tes 2</td>
                                    <!-- Add more column headers as needed -->
                                </tr>
                                <tr>
                                    <td style="text-align: center ;"><input type="checkbox" style="margin-top: 10px;"></td>
                                    <td>Tes</td>
                                    <td>Tes 2</td>
                                    <!-- Add more column headers as needed -->
                                </tr>

                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <br>
                    <div style="flex: 1; margin-right: 10px; margin-top: 5px; align-items:center;">
                        <input type="checkbox" id="selectAllCheckbox">
                        <label for="staff">Pilih Semua</label>
                    </div>
                    <div style="text-align: left; margin: 20px;">
                        <button type="button" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-dark">Keluar</button>
                    </div>
                </div>

            </div>

            <br>
        </div>
    </div>
</div>

<script>
    document.getElementById('selectAllCheckbox').addEventListener('change', function() {
        var checkboxes = document.querySelectorAll('#gridView input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = this.checked;
        }, this);
    });
</script>

@endsection
