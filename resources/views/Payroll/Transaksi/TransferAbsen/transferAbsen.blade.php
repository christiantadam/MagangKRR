@extends('layouts.appPayroll')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center" style="width: 850px;">
        <div class="col-md-10 RDZMobilePaddingLR0">

            <div class="card" style="margin:auto;">
                <div class="card-header">Transfer Absen</div>

                <div class="card-body RDZOverflow RDZMobilePaddingLR0" style="flex: 1; margin-left:10 px;">
                    <input type="file" id="fileInput" accept=".xls, .xlsx" />
                    <button id="processButton">Proses</button>
                    <br>
                    <br>
                    <div id="gridViewContainer">
                        <table id="gridView" style="border-collapse: collapse; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="border: 1px solid #ddd; padding: 8px;">Column 1</th>
                                    <th style="border: 1px solid #ddd; padding: 8px;">Column 2</th>
                                    <!-- Add more column headers as needed -->
                                </tr>
                                <tr>
                                    <td>Tes</td>
                                    <td>Tes 2</td>
                                    <!-- Add more column headers as needed -->
                                </tr>
                                <tr>
                                    <td>Tes</td>
                                    <td>Tes 2</td>
                                    <!-- Add more column headers as needed -->
                                </tr>
                                <tr>
                                    <td>Tes</td>
                                    <td>Tes 2</td>
                                    <!-- Add more column headers as needed -->
                                </tr>
                                <tr>
                                    <td>Tes</td>
                                    <td>Tes 2</td>
                                    <!-- Add more column headers as needed -->
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div style="text-align: right; margin: 20px;">
                        <button type="button" class="btn btn-primary">Transfer</button>
                        <button type="button" class="btn btn-dark">Keluar</button>
                    </div>
                </div>

            </div>

            <br>
        </div>
    </div>
</div>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script>
        document.getElementById('processButton').addEventListener('click', function() {
            var fileInput = document.getElementById('fileInput');
            if (fileInput.files.length > 0) {
                var file = fileInput.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    var data = new Uint8Array(e.target.result);
                    var workbook = XLSX.read(data, { type: 'array' });
                    var worksheet = workbook.Sheets['KERTA$'];
                    var jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1 });
                    var html = '';

                    for (var i = 0; i < jsonData.length; i++) {
                        html += '<tr>';
                        for (var j = 0; j < jsonData[i].length; j++) {
                            html += '<td>' + jsonData[i][j] + '</td>';
                        }
                        html += '</tr>';
                    }

                    document.getElementById('gridView').innerHTML = html;
                    document.getElementById('excelContainer').innerHTML = html;
                };

                reader.onerror = function(ex) {
                    console.log(ex);
                    alert('An error occurred while reading the file.');
                };

                reader.readAsArrayBuffer(file);
            } else {
                alert('Please select a file.');
            }
        });
    </script>
@endsection
