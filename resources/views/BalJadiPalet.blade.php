@extends('layouts.appABM')
@section('content')

    <body onload="Greeting()">
        <div class="form-wrapper mt-4">
            <div style="width: 80%;">
                <div class="card">
                    <div class="card-header">Press Ulang</div>
                    <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                        <div class="form berat_woven">
                            <form action="#" method="post" role="form">
                                <div style="display:flex;gap:3%">
                                    <div style="display: flex; flex-direction: column;gap:5px;white-space:nowrap">
                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button">Pilih Shift</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button">
                                                    Divisi</button></div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button">Pilih Type</button></div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button">Scan Barcode</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button">Print Barcode</button>
                                            </div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button">Acc Barcode</button></div>
                                        </div>

                                        <div style="display: flex;flex-direction: row;align-items:center;gap:1%">
                                            <div class="text-center col-md-auto mt-3"><button type="button">Keluar</button>
                                            </div>
                                        </div>
                                    <div>
                                </div>
                            </div>
                                    <div class="card" style="width: 100%">
                                        <div class="card-header">Press Ulang</div>
                                        <div class="row mt-3">
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
                                                <span class="aligned-text">Type:</span>
                                            </div>
                                            <div class="form-group col-md-2 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="Type" rows="Type"
                                                    placeholder="Type">
                                            </div>
                                            <div class="form-group col-md-5 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="Type" rows="Type"
                                                    placeholder="Type">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-2 d-flex justify-content-end">
                                                <span class="aligned-text">No Barcode:</span>
                                            </div>
                                            <div class="form-group col-md-5 mt-3 mt-md-0">
                                                <input class="form-control" type="text" name="Barcode" rows="Barcode"
                                                    placeholder="Barcode">
                                            </div>
                                        </div>

                                        <div class="card ml-5 mr-5 mt-3 m-3">
                                            <div class="card-header">Type</div>
                                            <table>
                                                <tr>
                                                    <thead>
                                                        <th>Barcode</th>
                                                        <th>Jumlah </th>
                                                        <th>Jumlah </th>
                                                        <th>Jumlah</th>
                                                    </thead>
                                                    <tbody>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tbody>
                                                    <tbody>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tbody>
                                                    <tbody>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tbody>
                                                    <tbody>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tbody>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div class="card mt-3" style="width: 83.2%; margin-left:250px">
                                    <div class="card-header">Total</div>
                                    <div class="row mt-3">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Primer:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="primer" rows="primer"
                                                placeholder="Primer">
                                            <div class="text-center col-md-auto"><button type="button">Ball</button>
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
                                            <div class="text-center col-md-auto"><button type="button">LBR</button></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-2 d-flex justify-content-end">
                                            <span class="aligned-text">Tritier:</span>
                                        </div>
                                        <div class="form-group col-md-5 mt-3 mt-md-0">
                                            <input class="form-control" type="text" name="tritier" rows="tritier"
                                                placeholder="Tritier">
                                            <div class="text-center col-md-auto"><button type="button">KG</button></div>
                                        </div>
                                    </div>
                                </div>


                            <div class="card mt-3" style="width: 83.2%; margin-left:250px">
                                <div class="card-header">Input Data Barang</div>
                                <div class="row mt-3">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Tanggal:</span>
                                    </div>
                                    <div class="form-group col-md-5 mt-3 mt-md-0">
                                        <input class="form-control" type="date" name="Tanggal" rows="Tanggal"
                                            placeholder="Tanggal">
                                            <span class="text-center ml-3">Bulan/Tanggal/Tahun</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Kode Barang:</span>
                                    </div>
                                    <div class="form-group col-md-7 mt-3 mt-md-0">
                                        <input class="form-control" type="text" name="Barang" rows="Barang"
                                            placeholder="Barang">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Kelompok:</span>
                                    </div>
                                    <div class="form-group col-md-2 mt-3 mt-md-0">
                                        <input class="form-control" type="text" name="Kelompok" rows="Kelompok"
                                            placeholder="Kelompok">
                                    </div>
                                    <div class="form-group col-md-5 mt-3 mt-md-0">
                                        <input class="form-control" type="text" name="Kelompok" rows="Kelompok"
                                            placeholder="Kelompok">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Sub Kelompok:</span>
                                    </div>
                                    <div class="form-group col-md-2 mt-3 mt-md-0">
                                        <input class="form-control" type="text" name="sub_kelompok" rows="sub_kelompok"
                                            placeholder="Sub Kelompok">
                                    </div>
                                    <div class="form-group col-md-5 mt-3 mt-md-0">
                                        <input class="form-control" type="text" name="sub_kelompok" rows="sub_kelompok"
                                            placeholder="Sub Kelompok">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Divisi:</span>
                                    </div>
                                    <div class="form-group col-md-2 mt-3 mt-md-0">
                                        <input class="form-control" type="text" name="Divisi" rows="Divisi"
                                            placeholder="Divisi">
                                    </div>
                                    <div class="form-group col-md-5 mt-3 mt-md-0">
                                        <input class="form-control" type="text" name="Divisi" rows="Divisi"
                                            placeholder="Divisi">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-2 d-flex justify-content-end">
                                        <span class="aligned-text">Kelut:</span>
                                    </div>
                                    <div class="form-group col-md-2 mt-3 mt-md-0">
                                        <input class="form-control" type="text" name="Kelut" rows="Kelut"
                                            placeholder="Kelut">
                                    </div>
                                </div>
                            </div>
                            <h4 class="mt-3">Gunakan Untuk Menggabungkan Bal Menjadi 1 Palet (Press Ulang)</h4>
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
        </script>
    </body>
@endsection
