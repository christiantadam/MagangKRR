@extends('layouts.appPayroll')
@section('content')
    <script type="text/javascript" src="{{ asset('js/Transaksi/prosesGajiStaff.js') }}"></script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">

                <div class="card" style="width:800px;">
                    <div class="card-header" style="">Form Akhir Bulan</div>










                    <div class="card-body" style="border: 1px solid black; margin: 10px;">
                        <div class="card-body">

                            <div class="row" style="margin-left:-80px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <span class="aligned-text">Periode:</span>
                                </div>
                                <div class="form-group col-md-9 mt-3 mt-md-0">
                                    <select class="form-control" id="Periode" name="Periode"
                                        style="resize: none;height: 40px; max-width:450px;" placeholder="LOL">
                                        <option>Pilih Periode</option>
                                        {{-- @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor --}}
                                    </select>

                                </div>
                            </div>



                            <div class="row" style="margin-left:-80px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <label for="TglMulai" class="aligned-text">Tanggal:</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglMulai" name="TglMulai" value=""
                                        required disabled style="max-width: 200px;">
                                    <span class="aligned-text" style="margin-left: 15px;">s/d</span>
                                    <input class="form-control" type="date" id="TglSelesai" name="TglSelesai"
                                        value="" required disabled style="max-width: 200px;">

                                </div>


                            </div>
                            <div class="row" style="margin-left:-80px;">
                                <div class="form-group col-md-3 d-flex justify-content-end">
                                    <label for="TglMulai" class="aligned-text">Penutupan Tgl:</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input class="form-control" type="date" id="TglTutup" name="TglTutup" required
                                        style="max-width: 169px;" value="{{ now()->format('Y-m-d') }}">


                                </div>


                            </div>







                        </div>

                    </div>





                    <div id="form-container"></div>
                    <div class="row" style="padding-top: 20px; margin:20px;">
                        <div class="col-6" style="text-align: left; ">


                        </div>
                        <div class="col-6" style="text-align: right; ">

                            <button type="button" class="btn" style="margin-left: 10px;width:100px;"
                                id="prosesButton">Proses</button>

                            <button type="button" class="btn" style="margin-left: 10px;width:100px;">Keluar</button>
                        </div>
                    </div>
                </div>






            </div>








            <br>







        </div>
    </div>

    </div>
    <br>

    </div>
    </div>
    </div>
    <script>
        var cmbPeriode = document.getElementById("Periode"); // Dapatkan elemen dropdown

        // Loop untuk menambahkan opsi bulan-bulan ke elemen dropdown
        for (var i = 1; i <= 12; i++) {
            var date = new Date(i + "/1/" + new Date().getFullYear());
            var options = {
                year: 'numeric',
                month: 'long'
            };
            var formattedDate = date.toLocaleDateString('id-ID', options); // Gunakan 'id-ID' untuk format bahasa Indonesia

            var option = document.createElement("option"); // Buat elemen option
            option.text = formattedDate; // Tentukan teks opsi
            option.value = i; // Tentukan nilai opsi (jika diperlukan)
            cmbPeriode.add(option); // Tambahkan opsi ke elemen dropdown
        }
    </script>
@endsection
