@extends('layouts.appABM')
@section('content')

    <body onload="Greeting()">
        <div class="form-wrapper mt-4">
            <div style="width: 80%;">
                <div class="card">
                    <div class="card-header">FrmPembayaranStaff</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form berat_woven">
                            <form action="#" method="post" role="form">
                                <div style="display:flex;gap:3%">
                                    <div style="display: flex; flex-direction: column;gap:5px;white-space:nowrap">
                                        <div class="row">
                                            <div class="form-group col-md-5 d-flex justify-content-end">
                                                <span class="aligned-text" style="margin-left: -70px">Tanggal:</span>
                                            </div>
                                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                                <input type="date" class="form-control" name="tanggal" id="tanggalInput" style="margin-left: 15px; width: 255px"
                                                    placeholder="Tanggal">
                                            </div>
                                        </div>

                                        <div style="display: flex; flex-direction: row; align-items:center; gap:1%">
                                            <div class="text-center col-md-auto">
                                                <button type="button" onclick="openModal()" id="ButtonShift"
                                                    style="width:180px;">Pilih
                                                    Shift</button>
                                            </div>
                                            <div class="modal" id="myModal">
                                                <div class="modal-content">
                                                    <span>&times;</span>
                                                    <div class="card col-md-auto"
                                                        style="margin-left:50px; margin-right:50px; margin-top:50px; margin-bottom:50px;">
                                                        <div class="row form-group">
                                                            <div class="col-md-3 d-flex justify-content-end">
                                                                <span class="aligned-text mt-3">Pilih Shift:</span>
                                                            </div>
                                                            <div class="form-group mt-4">
                                                                <select id="Shift"
                                                                    style="width: 100px; margin-top: 10px">
                                                                    <option value="Pagi">1</option>
                                                                    <option value="Sore">2</option>
                                                                    <option value="Malam">3</option>
                                                                </select>
                                                            </div>
                                                            <div class="text-center col-md-auto"
                                                                style="margin-top: 15px; margin-left:200px">
                                                                <button type="button" id="okButton"
                                                                    onclick="setShiftValue()">Ok</button>
                                                            </div>
                                                            <div class="text-center col-md-auto" style="margin-top: 15px;"
                                                                onclick="closeModal()">
                                                                <button type="button">Cancel</button>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <h6>Ketik 1 Untuk Shift Pagi, Ketik 2 Untuk Shift Sore,
                                                                dan<br>Ketik 3 Untuk Shift Malam</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width: 180px">Scan
                                                    Barcode</button></div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width: 180px">Pilih Sub
                                                    Kelompok</button></div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width: 180px">Pilih Type</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width: 180px">Timbang</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width: 180px">Print Barcode
                                                    Konversi</button></div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width: 180px">ACC Barcode</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    style="width: 180px">Print Ulang</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button"
                                                    class="btn-danger" style="width: 180px">Keluar</button>
                                            </div>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                    <div class="card" style="width: 100%">
                                        <div class="card-header">Data Barang</div>
                                        <div class="row mt-3">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Tanggal:</span>
                                            </div>
                                            <div class="form-group col-md-3 mt-3 mt-md-0">
                                                <input class="form-control" type="date" name="tanggal" rows="tanggal"
                                                    placeholder="Tanggal">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Shift:</span>
                                            </div>
                                            <div class="form-group col-md-3 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="shift" rows="shift"
                                                    placeholder="Shift">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Kelompok:</span>
                                            </div>
                                            <div class="form-group col-md-2 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="barcode" rows="barcode"
                                                    placeholder="Barcode">
                                            </div>
                                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="barcode" rows="barcode"
                                                    placeholder="Barcode">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Sub Kelompok:</span>
                                            </div>
                                            <div class="form-group col-md-2 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="barcode" rows="barcode"
                                                    placeholder="Barcode">
                                            </div>
                                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="barcode" rows="barcode"
                                                    placeholder="Barcode">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">Type:</span>
                                            </div>
                                            <div class="form-group col-md-2 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="barcode" rows="barcode"
                                                    placeholder="Barcode">
                                            </div>
                                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="barcode" rows="barcode"
                                                    placeholder="Barcode">
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="card mt-3" style="width: 78.5%; margin-left:315px">
                                    <div class="card-header">Info Barang</div>
                                    <div class="row mt-3">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Kode Barang:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="Barang" rows="Barang"
                                                placeholder="Barang">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Stok Akhir Primer :</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="stok_Primer"
                                                rows="stok_Primer" placeholder="Primer">
                                            <div class="text-center col-md-auto"><button type="button"
                                                    style="width: 100px">NULL</button></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Stok Akhir Sekunder :</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="stok_Sekunder"
                                                rows="stok_Sekunder" placeholder="Sekunder">
                                            <div class="text-center col-md-auto"><button type="button"
                                                    style="width: 100px">DOS</button></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text"> Stok Akhir Tritier:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="stok_Tritier"
                                                rows="stok_Tritier" placeholder="Tritier">
                                            <div class="text-center col-md-auto"><button type="button"
                                                    style="width: 100px">KG</button></div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="card mt-3" style="width: 78.5%; margin-left:315px">
                            <div class="card-header">Hasil Produksi</div>
                            <div class="row mt-3">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Primer:</span>
                                </div>
                                <div class="form-group col-md-5 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="primer" rows="primer"
                                        placeholder="Primer">
                                    <div class="text-center col-md-auto"><button type="button"
                                            style="width: 100px">Ball</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Sekunder:</span>
                                </div>
                                <div class="form-group col-md-5 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="sekunder" rows="sekunder"
                                        placeholder="Sekunder">
                                    <div class="text-center col-md-auto"><button type="button"
                                            style="width: 100px">LBR</button></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2 d-flex justify-content-end">
                                    <span class="aligned-text">Tritier:</span>
                                </div>
                                <div class="form-group col-md-5 mt-3 mt-md-0">
                                    <input class="form-control" type="text" name="tritier" rows="tritier"
                                        placeholder="Tritier">
                                    <div class="text-center col-md-auto"><button type="button"
                                            style="width: 100px">KG</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
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

            function openModal() {
                var modal = document.getElementById('myModal');
                modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
            }

            function closeModal() {
                var modal = document.getElementById('myModal');
                modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
            }

            function openModal1() {
                var modal = document.getElementById('myModal1');
                modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
            }

            function closeModal1() {
                var modal = document.getElementById('myModal1');
                modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
            }

            function openModal2() {
                var modal = document.getElementById('myModal2');
                modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
            }

            function closeModal2() {
                var modal = document.getElementById('myModal2');
                modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
            }

            var ButtonShift = document.getElementById('ButtonShift')
            ButtonShift.addEventListener("click", function(event) {
                event.preventDefault();
            });

            // Get the input elements
            const tanggalInput = document.getElementById("tanggalInput");
            const tanggalOutput = document.getElementById("tanggalOutput");

            // Add an event listener to the first input field to update the second input field
            tanggalInput.addEventListener("input", function() {
                // Get the selected date value from the first input field
                const selectedDate = tanggalInput.value;

                // Update the value of the second input field with the selected date
                tanggalOutput.value = selectedDate;
            });

            function setShiftValue() {
                // Get the selected shift value from the modal input
                const selectedShift = document.getElementById("Shift").value;

                // Set the selected shift value to the read-only input with the ID "shift"
                document.getElementById("shift").value = selectedShift;

                // Enable the "Divisi" button
                enableButtonDivisi();

                // Close the modal
                closeModal();
            }
        </script>
    </body>
@endsection
