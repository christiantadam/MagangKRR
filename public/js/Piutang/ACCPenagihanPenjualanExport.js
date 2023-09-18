let tabelPenagihanPenjualanEx = document.getElementById('tabelPenagihanPenjualanEx');
let idPenagihan = document.getElementById('idPenagihan');
let id_Penagihan = document.getElementById('id_Penagihan');

fetch("/getTabelPenagihanEx/")
.then((response) => response.json())
.then((options) => {
    console.log(options);

    tabelPenagihanPenjualanEx = $("#tabelPenagihanPenjualanEx").DataTable({
        data: options,
        columns: [
            { title: "Tanggal", data: "Tgl_Penagihan" },
            { title: "Id. Penagihan", data: "Id_Penagihan" },
            { title: "Customer", data: "NamaCust" },
            { title: "PO", data: "PO" },
            { title: "Nilai Tagihan", data: "Nilai_Penagihan" },
            { title: "Mata Uang", data: "Nama_MataUang" },
            { title: "Id. Customer", data: "Id_Customer" },
            { title: "Id. Mata Uang", data: "Id_MataUang" },
            { title: "Kurs", data: "NilaiKurs" }
        ]
    });

    $("#tabelPenagihanPenjualanEx tbody").off("click", "tr");
    $("#tabelPenagihanPenjualanEx tbody").on("click", "tr", function () {
        let checkSelectedRows = $("#tabelPenagihanPenjualanEx tbody tr.selected");

        if (checkSelectedRows.length > 0) {
            // Remove "selected" class from previously selected rows
            checkSelectedRows.removeClass("selected");
        }
        $(this).toggleClass("selected");
        const table = $("#tabelPenagihanPenjualanEx").DataTable();
        let selectedRows = table.rows(".selected").data().toArray();
        console.log(selectedRows[0]);

        idPenagihan.value = selectedRows[0].Id_Penagihan;

        id_Penagihan.value = idPenagihan.value.replace(/\//g, '.');
    });
});
