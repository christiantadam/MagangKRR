@extends('layouts.appExtruder')
@section('content')
    <div id="tropodo_order_acc" class="form" data-aos="fade-up">
        <table id="table_order" class="hover cell-border">
            <thead>
                <tr>
                    <th>Identifikasi Order</th>
                    <th>Id Order</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2" class="text-center">
                        <h1 class="mt-3">Tabel masih kosong...</h1>
                    </td>
                    <td style="display: none"></td>
                </tr>
            </tbody>
        </table>

        <div class="mt-4"></div>

        <table id="table_detail_order" class="hover cell-border">
            <thead>
                <tr>
                    <th>Nama Type</th>
                    <th>Qty Primer</th>
                    <th>Sat Primer</th>
                    <th>Qty Sekunder</th>
                    <th>Sat Sekunder</th>
                    <th>Qty Tertier</th>
                    <th>Sat Tertier</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @php $tableWidth = 7; @endphp
                    <td colspan="{{ $tableWidth }}" class="text-center">
                        <h1 class="mt-3">Tabel masih kosong...</h1>
                    </td>
                    @for ($i = 0; $i < $tableWidth - 1; $i++)
                        <td class="hidden"></td>
                    @endfor
                </tr>
            </tbody>
        </table>

        <div class="float-end mt-3 mb-3">
            <button type="button" id="btn_proses" class="btn btn-outline-success">Proses</button>
            <button type="button" id="btn_keluar" class="btn btn-outline-danger">Keluar</button>
        </div>
    </div>

    <script src="{{ asset('js/Extruder/ExtruderNet/tropodoOrderACC.js') }}"></script>
@endsection
