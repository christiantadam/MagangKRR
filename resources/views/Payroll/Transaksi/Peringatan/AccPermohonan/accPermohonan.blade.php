@extends('layouts.appPayroll')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 RDZMobilePaddingLR0">
                <div class="card">
                    <div class="card-header">Acc Peringatan</div>
                    <div class="card-body-container" style="margin-left:-220px;"></div>
                    <div class="row">
                        <div class="table-responsive" style="margin:30px;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Peringatan</th>
                                        <th scope="col">Divisi</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tgl Awal</th>
                                        <th scope="col">Tgl Akhir</th>
                                        <th scope="col">Uraian</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($peringatan as $item)
                                        <tr>
                                            <td><input type="checkbox" style="margin-right:5px;"
                                                    data-id="{{ $item->kd_pegawai }}_{{ $item->peringatan_ke }}_{{ $item->TglBerlaku }}">{{ $item->peringatan_ke }}
                                            </td>
                                            <td>{{ $item->Nama_Div }}</td>
                                            <td>{{ $item->kd_pegawai }}</td>
                                            <td>{{ $item->Nama_Peg }}</td>
                                            <td>{{ $item->TglBerlaku ?? 'Null' }}</td>
                                            <td>{{ $item->TglAkhir ?? 'Null' }}</td>
                                            <td>{{ $item->uraian }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 20px; margin:10px;">
                        <div class="col-6" style="text-align: left;">
                            <button type="button" class="btn btn-primary" style="margin-left: 10px; width:100px;"
                                onclick="prosesPeringatan()">Proses</button>
                            <button type="button" class="btn btn-dark"
                                style="margin-left: 10px; width:100px;">Keluar</button>
                        </div>
                        <div class="col-6" style="text-align: right;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <script>
        function prosesPeringatan() {
            // Ambil semua elemen checkbox yang dicentang
            const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');

            // Buat array untuk menyimpan data peringatan yang akan diproses
            const dataPeringatan = [];

            // Loop melalui setiap elemen checkbox yang dicentang dan ambil nilai data-id
            checkboxes.forEach(checkbox => {
                const dataId = checkbox.getAttribute('data-id');
                const [kd_pegawai, peringatan_ke, TglBerlaku] = dataId.split('_');

                // Tambahkan data ke array dataPeringatan
                dataPeringatan.push({
                    kd_pegawai: kd_pegawai,
                    peringatan_ke: peringatan_ke,
                    TglBerlaku: TglBerlaku
                });
                // console.log('kd_pegawai:', kd_pegawai);
                // console.log('peringatan_ke:', peringatan_ke);
                // console.log('TglBerlaku:', TglBerlaku);
            });

            // Kirim dataPeringatan ke server melalui AJAX untuk diproses
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'AccPermohonan/proses-peringatan', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-Token', token);
            // ...lanjutan kode...

            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Response dari server
                    console.log(xhr.responseText);

                    // Jika respons dari server berhasil, maka refresh halaman
                    location.reload();
                } else {
                    console.error('Error:', xhr.status);
                }
            };

            // Konversi dataPeringatan menjadi JSON dan kirim ke server
            xhr.send(JSON.stringify(dataPeringatan));
        }
    </script>
@endsection
