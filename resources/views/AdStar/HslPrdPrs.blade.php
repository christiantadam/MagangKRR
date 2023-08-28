
@extends('layouts.appAdStar')
@section('content')

<link href="{{ asset('css/AdStar/HslPrdPrs.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<div class="container">
    <h2>Maint Hasil Produksi</h2>
</div>


        {{-- <h3 class="card-title">Sales</h3> --}}
        <div class="container">
            <div class="card">
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">Tanggal Produksi:</div>
                    <div class="col-lg-2">
                        <input type="date" id="tanggal" class="form-control" required readonly>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">No. Transaksi:</div>
                    <div class="col-lg-3">
                        <div class="input-group mb-3">
                        <input type="text" id="no-transaksi" class="form-control" required readonly>
                        <button id='ld-transaksi' type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#notransaksi" disabled>
                            List Data
                        </button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">No. Order Kerja:</div>
                    <div class="col-lg-4">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="" aria-label="" readonly>
                            <button id="button_noordkrj" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#noorderkerja" disabled>
                                ...
                            </button>
                            <input type="text" class="form-control" placeholder="" aria-label="" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">Mesin Produksi:</div>
                    <div class="col-lg-4">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="" aria-label="" readonly>
                            <input type="text" class="form-control" placeholder="" aria-label="" readonly>
                            <button id="button_msnprdk" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" disabled>
                                ...
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">Grup Pelaksana:</div>
                    <div class="col-lg-2">
                        <select id="grup-pelaksana-dropdown" required disabled>
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">Jam Mulai:</div>
                    <div class="col-lg-2">
                        <input type="time" id="jammulai" class="form-control" required readonly>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">Jam Akhir:</div>
                    <div class="col-lg-2">
                        <input type="time" id="jamakhir" class="form-control" required readonly>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">Jumlah Ball:</div>
                    <div class="col-lg-2">
                        <input type="number" id="jml-ball" class="input-small" required min="0" readonly>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">Jumlah lembar:</div>
                    <div class="col-lg-2">
                        <input type="number" id="jml-lembar" class="input-small" required min="0" readonly>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-2 aligned-text">Jumlah Kg:</div>
                    <div class="col-lg-2">
                        <input type="number" id="jml-kg" class="input-small" required min="0" readonly>
                    </div>
                </div>
            </div>
        </div>

    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-2 aligned-text">
                <button id="addButton" class="btn btn-primary" style="display: block;">Add</button>
                <button id="saveButton" class="btn btn-primary" style="display: none;">Save</button>
            </div>
            <div class="col-lg-2 aligned-text">
                <button id="updateButton" class="btn btn-success">Update</button>
            </div>
            <div class="col-lg-2 aligned-text">
                <button id="deleteButton" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>

    <div class="scrollable-container">
        <!-- Add content here -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="tabel_Barang2" class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Mesin</th>
                            <th>KD Mesin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataMesin as $data)
                            <tr data-idmesin="{{ $data->IdMesin }}" data-namamesin="{{ $data->NamaMesin }}">
                                <td>{{ $data->NamaMesin }}</td>
                                <td>{{ $data->IdMesin }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="notransaksi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="notransasksiLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="notransaksiLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="tabel_notransaksi" class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Grup/Mesin/Order</th>
                            <th>No Trans</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($dataTransaksi as $data)
                            <tr data-grupmesinorder="{{ $data->GrupMesinOrder }}" data-notrans="{{ $data->IDLog }}">
                                <td>{{ $data->GrupMesinOrder }}</td>
                                <td>{{ $data->IDLog }}</td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="noorderkerja" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="noorderkerja" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="noorderkerja">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="tabel_notransaksi" class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Brg</th>
                            <th>No Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataOrder as $data)
                            <tr data-nmbrng="{{ $data->Nama_brg }}" data-noordr="{{ $data->No_Order }}">
                                <td>{{ $data->Nama_brg }}</td>
                                <td>{{ $data->No_Order }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

    <script>
        const ldtransaksi = document.getElementById('ld-transaksi')


        ldtransaksi.addEventListener("click", function () {
            var tanggal = document.getElementById('tanggal');
            fetch("/HslPrdPrs/" + tanggal.value + ".dataTransaksi")
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json(); // Assuming the response is in JSON format
                })
                .then((data) => {
                    // Handle the data retrieved from the server (data should be an object or an array)
                    console.log(data);
                    // Clear the existing table rows
                    $("#tabel_notransaksi").DataTable().clear().draw();

                    // Loop through the data and create table rows
                    data.forEach((item) => {
                        var row = [item.GrupMesinOrder, item.IDLOG];
                        $("#tabel_notransaksi").DataTable().row.add(row);
                    });

                    // Redraw the table to show the changes
                    $("#tabel_notransaksi").DataTable().draw();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        });

    document.addEventListener("DOMContentLoaded", function() {
        var addButton = document.getElementById("addButton");
        var saveButton = document.getElementById("saveButton");
        var inputElements = document.querySelectorAll("input[readonly]");
        var selectElement = document.getElementById("grup-pelaksana-dropdown");
        var buttonprimary = document.getElementsByClassName("btn-primary");
        var button_noordkrj = document.getElementById("button_noordkrj");
        var ld_transaksi = document.getElementById("ld-transaksi");
        var button_msnprdk = document.getElementById("button_msnprdk");


        function toggleInputEditing(enable) {
            inputElements.forEach(function(input) {
                input.readOnly = !enable;
            });
            selectElement.disabled = !enable;
            button_noordkrj.disabled = !enable;
            ld_transaksi.disabled = !enable;
            button_msnprdk.disabled = !enable;

        }

        // Initialize the form with inputs and buttons disabled
        toggleInputEditing(false);

        addButton.addEventListener("click", function() {
            var isEditing = (addButton.textContent === "Add");
            toggleInputEditing(isEditing);

            if (isEditing) {
                addButton.style.display = "none";
                saveButton.style.display = "block"; // Display the Save button
                updateButton.disabled = true; // Disable the Update button
                deleteButton.disabled = true; // Disable the Delete button
            } else {
                addButton.style.display = "block";
                saveButton.style.display = "none"; // Hide the Save button
                updateButton.disabled = false; // Enable the Update button
                deleteButton.disabled = false; // Enable the Delete button
                // Reset form values if needed
            }
        });

        // Add click event listener to the "Save" button
        saveButton.addEventListener("click", function() {
            toggleInputEditing(false);
            addButton.style.display = "block";
            saveButton.style.display = "none"; // Hide the Save button
            updateButton.disabled = false; // Enable the Update button
            deleteButton.disabled = false; // Enable the Delete button
        });
    });
    </script>
    <script src="{{ asset('js\AdStar\HslPrdPrs.js')}}"></script>

@endsection
