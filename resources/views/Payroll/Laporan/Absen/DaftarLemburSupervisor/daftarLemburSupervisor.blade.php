@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style=" ">
                    <div class="card-header" style="">Form Lembur Supervisor (Tidak dipakai)</div>
                    <div class="card-body-container" style="margin-left:-220px;">

                        <br>
                        <div class="row" style="">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Divisi:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input class="form-control" type="text" id="Id_Div" readonly
                                    style="resize: none; height: 40px; max-width: 250px;">
                                <select class="form-control" id="Nama_Div" name="Nama_Div"
                                    style="resize: none; height: 40px; max-width: 250px;">
                                    <option value=""></option>
                                    @foreach ($divisi as $data)
                                        <option value="{{ $data->Id_Div }}">{{ $data->Nama_Div }}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn" style="margin-left: 10px;">...</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <label for="TglMulai" class="aligned-text">Tanggal:</label>
                            </div>
                            <div class="form-group col-md-4">
                                <input class="form-control" type="date" id="TglMulai" name="TglMulai"
                                    value="{{ old('TglMulai', now()->format('Y-m-d')) }}" required
                                    style="max-width: 200px;">

                                <!-- Tambahkan atribut onclick pada button -->
                                <button type="button" class="btn" style="margin-left: 10px;" onclick="tampilkanDataLembur()">Tampilkan</button>

                                <button type="button" class="btn btn-dark " style="margin-left:10px;">Keluar</button>
                            </div>


                        </div>










                    </div>

                    <div class="row">
                        <div class="table-responsive" style="margin:30px; ">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Divisi</th>
                                        <th scope="col">Kode Pegawai</th>
                                        <th scope="col">Nama Pegawai</th>
                                        <th scope="col">Mulai</th>
                                        <th scope="col">Selesai</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Datang</th>
                                        <th scope="col">Pergi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider" id="tabel-lembur">
                                    {{-- Data lembur akan ditampilkan di sini --}}
                                </tbody>
                            </table>
                        </div>
                    </div>










                </div>
            </div>


        </div>






    </div>
    <script>
        // Ambil elemen <input> dengan id "Id_Div"
        var idDivInput = document.getElementById('Id_Div');

        // Ambil elemen <select> dengan id "Nama_Div"
        var namaDivSelect = document.getElementById('Nama_Div');

        // Tambahkan event listener untuk mengupdate nilai <input> saat opsi dipilih
        namaDivSelect.addEventListener('change', function() {
            // Dapatkan value dari opsi yang dipilih
            var selectedOptionValue = this.options[this.selectedIndex].value;

            // Set nilai value dari <input> dengan value yang dipilih
            idDivInput.value = selectedOptionValue;
        });

        function tampilkanDataLembur() {
            // Ambil nilai dari input divisi dan tanggal
            var divisi = document.getElementById('Nama_Div').value;
            var tanggal = document.getElementById('TglMulai').value;

            // Buat objek XMLHttpRequest untuk request AJAX
            var xhr = new XMLHttpRequest();

            // Atur fungsi yang akan dijalankan saat AJAX request selesai
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Ubah isi tabel dengan data yang diperoleh dari respons
                    var tabelLembur = document.getElementById('tabel-lembur');
                    var dataLembur = JSON.parse(xhr.responseText);

                    // Bersihkan tabel sebelum menambahkan data baru
                    tabelLembur.innerHTML = '';

                    // Loop melalui dataLembur dan tambahkan setiap baris ke tabel
                    dataLembur.forEach(function(lembur) {
                        var row = document.createElement('tr');

                        var divisiCell = document.createElement('td');
                        divisiCell.textContent = lembur.Nama_Div;
                        row.appendChild(divisiCell);

                        var kodePegawaiCell = document.createElement('td');
                        kodePegawaiCell.textContent = lembur.Kd_Pegawai;
                        row.appendChild(kodePegawaiCell);

                        var namaPegawaiCell = document.createElement('td');
                        namaPegawaiCell.textContent = lembur.Pegawai;
                        row.appendChild(namaPegawaiCell);

                        var mulaiCell = document.createElement('td');
                        mulaiCell.textContent = lembur.Jam_Masuk;
                        row.appendChild(mulaiCell);

                        var selesaiCell = document.createElement('td');
                        selesaiCell.textContent = lembur.Jam_Keluar;
                        row.appendChild(selesaiCell);

                        var jumlahCell = document.createElement('td');
                        jumlahCell.textContent = lembur.Jml_Jam;
                        row.appendChild(jumlahCell);

                        var datangCell = document.createElement('td');
                        datangCell.textContent = lembur.Datang;
                        row.appendChild(datangCell);

                        var pergiCell = document.createElement('td');
                        pergiCell.textContent = lembur.Pulang;
                        row.appendChild(pergiCell);

                        tabelLembur.appendChild(row);
                    });
                } else {
                    console.error('Error fetching data:', xhr.status);
                }
            };

            // Buat URL dengan menggabungkan parameter divisi dan tanggal
            var url = '/ProgramPayroll/Laporan/Absen/DaftarLembur/getDataLembur?divisi=' + divisi + '&tanggal=' + tanggal;

            // Lakukan AJAX request ke URL
            xhr.open('GET', url);
            xhr.send();
        }
    </script>

    <br>
@endsection
