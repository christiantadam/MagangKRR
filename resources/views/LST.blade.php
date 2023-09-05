@extends('layouts.appABM')
@section('content')
<script type="text/javascript" src="{{ asset('js/LST.js') }}"></script>

    <body onload="Greeting()">
        <div id="app">
            <div class="form-wrapper mt-4">
                <div class="form-container">
                    <div class="card">
                        <div class="card-header">Schedule</div>
                        <div class="card-body RDZOverflow RDZMobilePaddingLR0">
                            <div class="form berat_woven">
                                <form action="#" method="post" role="form">
                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Divisi Pengiriman:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Divisi_pengiriman"
                                                id="Divsi_pengiriman" placeholder="Divisi Pengiriman" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Divisi Penerima:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Divisi_penerima"
                                                id="Divisi_penerima" placeholder="Divisi Penerima" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Objek:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input type="text" class="form-control" name="Objek" id="Objek"
                                                placeholder="Objek" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-3 d-flex justify-content-end">
                                            <span class="aligned-text">Tanggal Kirim:</span>
                                        </div>
                                        <div class="form-group col-md-9 mt-3 mt-md-0">
                                            <input type="date" class="form-control" name="Tanggal" id="Tanggal"
                                                placeholder="Tanggal" required>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">Hasil Print</div>
                                        <h1>Tes</h1>
                                    </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col- row justify-content-md-center">
                                    <div class="text-center col-md-auto"><button type="submit">Pilih Semua</button></div>
                                    <div class="text-center col-md-auto"><button type="submit">Hapus</button></div>
                                    <div class="text-center col-md-auto"><button type="submit">Keluar</button></div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
@endsection
