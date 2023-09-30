let btnOk = document.getElementById('btnOk');
let tanggal = document.getElementById('tanggal');
let tanggal2 = document.getElementById('tanggal2');
let tabelSuratJalan = document.getElementById('tabelSuratJalan');
let btnProses = document.getElementById('btnProses');

let noFaktur = document.getElementById('noFaktur');
let totalPenagihan = document.getElementById('totalPenagihan');
let totalPembayaran = document.getElementById('totalPembayaran');
let notaKredit = document.getElementById('notaKredit');
let sisaTagihan = document.getElementById('sisaTagihan');
let lunas = document.getElementById('lunas');
let idBKM = document.getElementById('idBKM');

let formkoreksi = document.getElementById('formkoreksi');
let methodkoreksi = document.getElementById('methodkoreksi');

const tanggalPelunasan = new Date();
const formattedDate = tanggalPelunasan.toISOString().substring(0, 10);
tanggal.value = formattedDate;

const tanggalPelunasan2 = new Date();
const formattedDate2 = tanggalPelunasan2.toISOString().substring(0, 10);
tanggal2.value = formattedDate2;

btnOk.addEventListener('click', function(event) {
    event.preventDefault();
    fetch("/getDisplaySuratJalan/" + tanggal.value + "/" + tanggal2.value)
        .then((response) => response.json())
        .then((options) => {
            console.log(options);

            tabelSuratJalan = $("#tabelSuratJalan").DataTable({
                data: options,
                columns: [
                    { title: "Tgl. Pelunasan", data: "Tgl_Pelunasan" },
                    { title: "Customer", data: "NamaCust" },
                    { title: "No. Faktur", data: "Id_Penagihan" },
                    { title: "Pembayaran", data: "Jenis_Pembayaran" },
                    { title: "Pelunasan", data: "NilaiPelunasan" },
                    { title: "Nilai Tagihan", data: "Nilai_Penagihan" },
                    { title: "Total Bayar", data: "Terbayar" },
                    { title: "Lunas", data: "Lunas" },
                    { title: "BKM", data: "Id_BKM" }
                ]
            });


        })
});

$("#tabelSuratJalan tbody").off("click", "tr");
    $("#tabelSuratJalan tbody").on("click", "tr", function () {
        let checkSelectedRows = $("#tabelSuratJalan tbody tr.selected");

        if (checkSelectedRows.length > 0) {
            // Remove "selected" class from previously selected rows
            checkSelectedRows.removeClass("selected");
        }
        $(this).toggleClass("selected");
        const table = $("#tabelSuratJalan").DataTable();
        let selectedRows = table.rows(".selected").data().toArray();
        console.log(selectedRows[0]);
        noFaktur.value = selectedRows[0].Id_Penagihan;
        totalPenagihan.value = selectedRows[0].Nilai_Penagihan;
        totalPembayaran.value = selectedRows[0].Terbayar;
        notaKredit.value = selectedRows[0].Id_Penagihan;
        sisaTagihan.value = totalPenagihan.value - totalPembayaran.value;
        idBKM.value = selectedRows[0].Id_BKM;

        no_Faktur.value = noFaktur.value.replace(/\//g, '.');
        lunas.focus();
});

lunas.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        btnProses.disabled = false;
        btnProses.focus();
    };
});

btnProses.addEventListener('click', function(event) {
    event.preventDefault();
    if (sisaTagihan.value != 0) {
        alert("Tidak boleh Proses, karena sisa tagihan tdk = Nol.");
    } else if (lunas.value !== "Y" && lunas.value !== "N") {
        alert("Pengisian kolom Lunas Salah");
    } else {
        methodkoreksi.value="PUT";
        formkoreksi.action = "/AnalisaStatusPenjualan/" + no_Faktur.value;
        formkoreksi.submit();
    }
    btnProses.disabled = true;
})
