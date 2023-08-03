@extends('layouts.appExtruder')
@section('content')
    <div id="tropodo_order_acc" class="form" data-aos="fade-up">
        <table id="table_order" class="hover cell-border mt-3">
            <thead>
                <tr>
                    <th scope="col">Identifikasi Order</th>
                    <th scope="col">Id Order</th>
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

        <table id="table_type" class="hover cell-border mt-5">
            <colgroup>
                <col style="width: 300px;">
                <col style="width: 125px;">
                <col style="width: 125px;">
                <col style="width: 125px;">
                <col style="width: 125px;">
                <col style="width: 125px;">
                <col style="width: 125px;">
            </colgroup>
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
                    <td colspan="7" class="text-center">
                        <h1 class="mt-3">Tabel masih kosong...</h1>
                    </td>
                    <td style="display: none"></td>
                    <td style="display: none"></td>
                    <td style="display: none"></td>
                    <td style="display: none"></td>
                    <td style="display: none"></td>
                    <td style="display: none"></td>
                </tr>
            </tbody>
        </table>

        <div class="float-end mt-3 mb-3">
            <button type="button" id="btn_proses" class="btn btn-outline-success">Proses</button>
            <button type="button" id="btn_keluar" class="btn btn-outline-danger">Keluar</button>
        </div>
    </div>

    <script src="{{ asset('js/Extruder/TransaksiTropodo/tropodoOrderACC.js') }}"></script>
@endsection
