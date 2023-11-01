@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Angsuran/angsuranHutangHarian.js') }}"></script>
    <div class="form-wrapper mt-4">
        <div class="form-container">
            <div class="card">
                <div class="card-header">Angsuran Hutang Perusahaan Pegawai Harian</div>
                <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                    <div class="form berat_woven">

                        <div class="row">
                            <div class="form-group col-md-3 d-flex justify-content-end">
                                <span class="aligned-text">Tanggal:</span>
                            </div>
                            <div class="form-group col-md-9 mt-3 mt-md-0">
                                <input type="date" class="form-control" name="Divisi_pengiriman" id="tanggal_Hutang"
                                    value="{{ date('Y-m-d') }}" required>

                                <div class="text-center col-md-auto"><button type="" id="buttonListData">List
                                        Data</button></div>
                            </div>
                        </div>

                        <div class="form-container">
                            <div class="card">
                                <div class="card-header">Table</div>
                                <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                                    <div class="form berat_woven">

                                        <table class="table table-striped table-bordered" id="tabel_Hutang">
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


                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalUpdate" role="dialog" arialabelledby="modalLabel"
                                area-hidden="true" style="">
                                <div class="modal-dialog " role="document">
                                    <div id="">
                                        <div class="modal-content">
                                            <div class="card col-md-auto"
                                                style="margin-left:50px; margin-right:50px; margin-top:50px; margin-bottom:50px;">
                                                <div class="row form-group">
                                                    <div class="col-md-3 d-flex justify-content-end">
                                                        <span class="aligned-text mt-3">Koreksi Jumlah Cicilan ?</span>
                                                    </div>
                                                    <div class="form-group mt-4">

                                                    </div>

                                                </div>

                                                <div class="text-center">
                                                    <input type="number" id="jumlahCicilan" value="" style="width:650px">
                                                </div>
                                                <div class="row mt-3">
                                                    <div style="text-align: middle; margin-top: 20px; margin-left: 290px;">


                                                        <button type="button" class="btn" style="width: 100px"
                                                            id="okButton">OK</button></button>
                                                        <button type="button" class="btn" style="width: 100px"
                                                            id="cancelButton" onclick="hideModalUpdate()">CANCEL</button></button>


                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div id="form-container"></div>
                        <div class="row mt-3">
                            <div class="col- row justify-content-md-center">
                                <div class="text-center col-md-auto"><button id="UpdateButton">Update</button></div>
                                <div class="text-center col-md-auto"><button id="processButton">Process</button></div>
                                <div class="text-center col-md-auto"><button type="">Quit</button></div>
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
