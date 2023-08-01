@extends('layouts.appPayroll')
@section('content')
    <style>
        /* Gaya untuk highlight row yang dipilih */
        tr.selected {
            background-color: #6feb75;
            /* Warna highlight */
            /* Atur gaya lainnya sesuai keinginan */
        }
    </style>
    <div class="table-responsive">
        <!-- Isi tabel seperti sebelumnya -->
    </div>

    <style>
        /* Gaya untuk highlight row yang dipilih */
        tr.selected {
            background-color: #ffff99;
            /* Warna highlight */
            /* Atur gaya lainnya sesuai keinginan */
        }
    </style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
      const dataTable = document.getElementById("tabelDivisi");
      const idDivInput = document.getElementById("Id_Div");
      const namaDivInput = document.getElementById("Nama_Div");
      const posisiInput = document.getElementById("Kd_Posisi");
      const namaPosisiInput = document.getElementById("Nama_Posisi");
      const managerInput = document.getElementById("KD_Manager");
      const namaManagerInput = document.getElementById("Nama_Manager");
      const jenisInput = document.getElementById("id_jenis");
      const statusInput = document.getElementById("Id_Status");
      const jmlJamInput = document.getElementById("Jml_Jam");
      const aturanInput = document.getElementById("opsiAturan");
      const grupDivisiInput = document.getElementById("grup_Divisi");
      let selectedRow = null;

      // Fungsi untuk meng-unselect baris
      function unselectRow(row) {
        if (row) {
          row.classList.remove("selected");
          selectedRow = null;
          // Reset nilai input
          idDivInput.value = "";
          namaDivInput.value = "";
          posisiInput.value = "";
          namaPosisiInput.value = "";
          managerInput.value = "";
          namaManagerInput.value = "";
          jenisInput.value = "";
          statusInput.value = "";
          jmlJamInput.value = "";
          aturanInput.value = "";
          grupDivisiInput.value = "";
        }
      }

      // Tambahkan event listener untuk mendengarkan klik pada baris
      dataTable.addEventListener("click", function(event) {
        const clickedRow = event.target.closest("tr");
        if (clickedRow) {
          if (clickedRow === selectedRow) {
            // Jika baris yang dipilih saat ini adalah yang sebelumnya dipilih, unselect baris
            unselectRow(selectedRow);
          } else {
            // Jika baris yang dipilih adalah baris yang berbeda, unselect baris sebelumnya (jika ada)
            unselectRow(selectedRow);
            selectedRow = clickedRow;
            selectedRow.classList.add("selected");

            // Ambil data dari baris yang dipilih
            const idDiv = selectedRow.cells[2].textContent;
            const namaDiv = selectedRow.cells[1].textContent;
            const posisi = selectedRow.cells[0].textContent;
            const namaPosisi = selectedRow.cells[0].textContent; // Ganti sesuai dengan kolom yang sesuai
            const manager = selectedRow.cells[3].textContent;
            const namaManager = selectedRow.cells[3].textContent; // Ganti sesuai dengan kolom yang sesuai
            const jenis = selectedRow.cells[4].textContent;
            const status = selectedRow.cells[5].textContent;
            const jmlJam = selectedRow.cells[6].textContent;
            const aturan = selectedRow.cells[7].textContent;
            const grupDivisi = selectedRow.cells[8].textContent;

            // Isi data ke elemen input
            idDivInput.value = idDiv;
            namaDivInput.value = namaDiv;
            posisiInput.value = posisi;
            namaPosisiInput.value = namaPosisi;
            managerInput.value = manager;
            namaManagerInput.value = namaManager;
            jenisInput.value = jenis;
            statusInput.value = status;
            jmlJamInput.value = jmlJam;
            aturanInput.value = aturan;
            grupDivisiInput.value = grupDivisi;
          }
        }
      });
    });
  </script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const opsiJenis = document.getElementById("opsiJenis");
            const idJenis = document.getElementById("id_jenis");

            opsiJenis.addEventListener("change", function() {
                idJenis.value = opsiJenis.value;
            });
        });
        document.addEventListener("DOMContentLoaded", function() {
            const opsiStatus = document.getElementById("opsiStatus");
            const idStatus = document.getElementById("Id_Status");

            opsiStatus.addEventListener("change", function() {
                idStatus.value = opsiStatus.value;
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
          const isiButton = document.getElementById("isiButton");
          const simpanButton = document.getElementById("simpanButton");
          const koreksiButton = document.getElementById("koreksiButton");
          const batalButton = document.getElementById("batalButton");

          const Id_Div = document.getElementById("Id_Div");
          const Nama_Div = document.getElementById("Nama_Div");
          const divisiButton = document.getElementById("divisiButton");
          const posisiButton = document.getElementById("posisiButton");
          const managerButton = document.getElementById("managerButton");
          const opsiJenisSelect = document.getElementById("opsiJenis");
          const opsiStatusSelect = document.getElementById("opsiStatus");
          const opsiAturanSelect = document.getElementById("opsiAturan");
          const JmlJam = document.getElementById("Jml_Jam");
          const grupDivisi = document.getElementById("grup_Divisi");


          //Button isi diklik maka
          isiButton.addEventListener("click", function () {
            //Hilangkan button isi dan koreksi
            isiButton.classList.add("d-none");
            koreksiButton.classList.add("d-none");
            //Yang ditampilkan ketika button isi ditekan\
            Id_Div.readOnly = false;
            Nama_Div.readOnly = false;

            posisiButton.disabled = false;
            managerButton.disabled = false;
            simpanButton.classList.remove("d-none");
            batalButton.classList.remove("d-none");
            opsiJenisSelect.removeAttribute("disabled");
            opsiStatusSelect.removeAttribute("disabled");
            opsiAturanSelect.removeAttribute("disabled");
            JmlJam.disabled = false;
            grupDivisi.disabled = false;
          });

          batalButton.addEventListener("click", function () {
            //Tampilkan Button isi dan koreksi lagi
            isiButton.classList.remove("d-none");
            koreksiButton.classList.remove("d-none");
            //hide Button simpan dan batal
            simpanButton.classList.add("d-none");
            batalButton.classList.add("d-none");
            //Disable form
            Id_Div.readOnly = true;
            Nama_Div.readOnly = true;

            posisiButton.disabled = true;
            managerButton.disabled = true;

            opsiJenisSelect.setAttribute("disabled", "disabled");
            opsiStatusSelect.setAttribute("disabled", "disabled");
            opsiAturanSelect.setAttribute("disabled", "disabled");
            JmlJam.disabled = true;
            grupDivisi.disabled = true;
          });

          koreksiButton.addEventListener("click", function () {
            //Hide button isi dan koreksi
            isiButton.classList.add("d-none");
            koreksiButton.classList.add("d-none");

            Nama_Div.readOnly = false;
            posisiButton.disabled = false;
            managerButton.disabled = false;
            opsiJenisSelect.removeAttribute("disabled");
            opsiStatusSelect.removeAttribute("disabled");
            opsiAturanSelect.removeAttribute("disabled");
            JmlJam.disabled = false;
            grupDivisi.disabled = false;
            //Tampil Button simpan dan batal
            simpanKoreksiButton.classList.remove("d-none");
            batalKoreksiButton.classList.remove("d-none");
          });

          batalKoreksiButton.addEventListener("click", function () {
            isiButton.classList.remove("d-none");
            simpanKoreksiButton.classList.add("d-none");
            koreksiButton.classList.remove("d-none");
            batalKoreksiButton.classList.add("d-none");

            Nama_Div.readOnly = true;
            posisiButton.disabled = true;
            managerButton.disabled = true;
            opsiJenisSelect.setAttribute("disabled", "disabled");
            opsiStatusSelect.setAttribute("disabled", "disabled");
            opsiAturanSelect.setAttribute("disabled", "disabled");
            JmlJam.disabled = true;
            grupDivisi.disabled = true;
          });
        });
      </script>

    <script type="text/javascript" src="{{ asset('js/Master/Divisi.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">PEKERJA</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="border: solid black 1px">
                        <div class="card-body-container" style="display: flex; flex-wrap: nowrap;">
                            <div class="card-body" style="flex: 0 0 15%;">
                                <div class="row" style="margin-left: 50px;">
                                  <button type="button" class="btn" id="isiButton" style="width: 200px;">Isi</button>
                                  <button type="button" class="btn d-none" id="simpanButton" style="width: 200px;">Simpan</button>
                                  <button type="button" class="btn d-none" id="simpanKoreksiButton" style="width: 200px;">Simpan</button>
                                </div>
                                <div class="row" style="margin-left: 50px; margin-top: 20px;">
                                  <button type="button" class="btn" id="koreksiButton" style="width: 200px;">Koreksi</button>
                                  <button type="button" class="btn d-none" id="batalButton" style="width: 200px;">Batal</button>
                                  <button type="button" class="btn d-none" id="batalKoreksiButton" style="width: 200px;">Batal</button>
                                </div>
                                <div class="row" style="margin-left: 50px; margin-top: 20px;">
                                  <button type="button" class="btn" style="width: 200px;">Hapus</button>
                                </div>
                              </div>

                            <div class="card-body " style="flex: 1; ">
                                <div class="row" style="margin-left:;">
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
                                            data-toggle="modal" data-target="#modalKdPeg" disabled>...</button>

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
                                                                        @foreach ($dataDivisi as $data)
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
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Posisi:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="Kd_Posisi" readonly
                                            style="resize: none; height: 40px; max-width: 100px;">
                                        <input class="form-control" type="text" id="Nama_Posisi" readonly
                                            style="resize: none; height: 40px; max-width: 450px;">
                                        <button type="button" class="btn" id="posisiButton" style="margin-left: 10px;" data-toggle="modal"
                                            data-target="#modalPeg" disabled>...</button>
                                        <div class="modal fade" id="modalPeg" role="dialog" arialabelledby="modalLabel"
                                            area-hidden="true" style="">
                                            <div class="modal-dialog " role="document">
                                                <div class="modal-content" style="">
                                                    <div class="modal-header" style="justify-content: center;">

                                                        <div class="row" style=";">
                                                            <div class="table-responsive" style="margin:30px;">
                                                                <table id="table_Peg_Lama" class="table table-bordered">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th scope="col">Nama Posisi</th>
                                                                            <th scope="col">Kode Posisi</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($dataPosisi as $data)
                                                                            <tr>

                                                                                <td>{{ $data->Nm_Posisi }}</td>
                                                                                <td>{{ $data->KD_Posisi }}</td>



                                                                            </tr>
                                                                        @endforeach
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
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Manager:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="Nama_Manager" readonly
                                            style="resize: none; height: 40px; max-width: 100px;">
                                        <input class="form-control" type="text" id="KD_Manager" readonly
                                            style="resize: none; height: 40px; max-width: 450px;">
                                        <button type="button" class="btn" id="managerButton" style="margin-left: 10px;" data-toggle="modal"
                                            data-target="#modalManager" disabled>...</button>
                                        <div class="modal fade" id="modalManager" role="dialog" arialabelledby="modalLabel"
                                            area-hidden="true" style="">
                                            <div class="modal-dialog " role="document">
                                                <div class="modal-content" style="">
                                                    <div class="modal-header" style="justify-content: center;">

                                                        <div class="row" style=";">
                                                            <div class="table-responsive" style="margin:30px;">
                                                                <table id="table_Manager" class="table table-bordered">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th scope="col">Nama Manager</th>
                                                                            <th scope="col">Kd Manager</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        {{-- @foreach ($dataManager as $data)
                                                                            <tr>

                                                                                <td>{{ $data->nama_peg }}</td>
                                                                                <td>{{ $data->kd_Pegawai }}</td>



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
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Jenis:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="id_jenis" readonly
                                            style="resize: none; height: 40px; max-width: 100px;">
                                        <select class="form-control" id="opsiJenis" name="Jenis"
                                            style="resize: none;height: 40px; max-width:450px;" disabled>
                                            <option value="" disabled selected>-- Pilih Jenis --</option>
                                            <option value="S">S-STAFF</option>
                                            <option value="H">H-HARIAN</option>
                                            <option value="B">B-BORONGAN</option>
                                            <option value="L">L-HARIAN LEPAS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Status:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="Id_Status" readonly
                                            style="resize: none; height: 40px; max-width: 100px;">
                                        <select class="form-control" id="opsiStatus" name="Status"
                                            style="resize: none;height: 40px; max-width:450px;" disabled>
                                            <option value="" disabled selected>-- Pilih Status --</option>
                                            <option value="K">K-KERJA</option>
                                            <option value="T">T-TEMPAT</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Jml Jam Sabtu:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="Jml_Jam"
                                            style="resize: none; height: 40px; max-width: 100px;" disabled>


                                    </div>
                                </div>
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Aturan:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">

                                        <select class="form-control" id="opsiAturan" name="Status"
                                            style="resize: none;height: 40px; max-width:550px;" disabled>
                                            <option value="" disabled selected>-- Pilih Aturan --</option>
                                            <option value="1">1-Aturan 1</option>
                                            <option value="2">2-Aturan 2</option>
                                            <option value="3">3-Aturan 3</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="row" style="margin-left:;">
                                    <div class="form-group col-md-3 d-flex justify-content-end">
                                        <span class="aligned-text">Grup Divisi:</span>
                                    </div>
                                    <div class="form-group col-md-9 mt-3 mt-md-0">
                                        <input class="form-control" type="text" id="grup_Divisi"
                                            style="resize: none; height: 40px; max-width: 100px;" disabled>


                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabelDivisi">
                                <thead>
                                    <tr>
                                        <th scope="col">Posisi</th>
                                        <th scope="col">Nama Divisi</th>
                                        <th scope="col">Id Div</th>
                                        <th scope="col">Manager</th>
                                        <th scope="col">Jenis(H/S/B/L)</th>
                                        <th scope="col">Status(K/T)</th>
                                        <th scope="col">JmlJam</th>
                                        <th scope="col">Aturan</th>
                                        <th scope="col">IdGrupdiv</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($dataDivisi as $index => $data)
                                        <!-- Tambahkan variabel $index -->
                                        <tr data-index="{{ $index }}"> <!-- Tambahkan atribut data-index -->
                                            <td>{{ $data->Nm_Posisi }}</td>
                                            <td>{{ $data->Nama_Div }}</td>
                                            <td>{{ $data->Id_Div }}</td>
                                            <td>{{ $data->Nama_Peg }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td>{{ $data->KStatus }}</td>
                                            <td>{{ $data->JmlJam }}</td>
                                            <td>{{ $data->Aturan }}</td>
                                            <td>{{ $data->Id_Group_Div }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <br>

            </div>
        </div>
    </div>
@endsection
