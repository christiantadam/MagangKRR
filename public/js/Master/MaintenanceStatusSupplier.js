let tabelStatusSupplier = document.getElementById("tabelStatusSupplier");

let btnIsi = document.getElementById("btnIsi");
let btnKoreksi = document.getElementById("btnKoreksi");
let btnProses = document.getElementById("btnProses");
let btnKeluar = document.getElementById("btnKeluar");
let btnBatal = document.getElementById("btnBatal");

function populateTable() {
    var tableBody = $("#data-table tbody");
    tableBody.empty(); // Clear existing rows if any

    // Loop through the data and create rows
    data.forEach(function(rowData) {
        var row = $("<tr>");
        // Populate each cell in the row with data from the rowData object
        row.append($("<td>").text(rowData.id_supp));
        row.append($("<td>").text(rowData.nama_supplier));
        row.append($("<td>").text(rowData.saldo));
        row.append($("<td>").text(rowData.saldo_rp));
        row.append($("<td>").text(rowData.jns_supp));
        row.append($("<td>").text(rowData.jns_bayar));
        tableBody.append(row); // Add the row to the table body
    });
}
