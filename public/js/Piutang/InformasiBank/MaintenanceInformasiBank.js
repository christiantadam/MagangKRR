let tanggal = document.getElementById('tanggal');
let btnOk = document.getElementById('btnOk');
let tabelInfoBank = document.getElementById('tabelInfoBank');
let formkoreksi = document.getElementById('formkoreksi');
let methodkoreksi = document.getElementById('methodkoreksi');

let btnIsi = document.getElementById('btnIsi');
let btnSimpan = document.getElementById('btnSimpan');
let btnKoreksi = document.getElementById('btnKoreksi');
let btnBatal = document.getElementById('btnKoreksi');
let btnSimpanKoreksi = document.getElementById('btnSimpanKoreksi');
let btnBatalKoreksi = document.getElementById('btnBatalKoreksi');

let namaBankSelect = document.getElementById('namaBankSelect');
let idBank = document.getElementById('idBank');
let idReferensi = document.getElementById('idReferensi');
let mataUangSelect = document.getElementById('mataUangSelect');
let idMataUang = document.getElementById('idMataUang');
let totalNilai = document.getElementById('totalNilai');
let keterangan = document.getElementById('keterangan');
let jenisPembayaranSelect = document.getElementById('jenisPembayaranSelect');
let idJenisPembayaran = document.getElementById('idJenisPembayaran');
let noBukti = document.getElementById('noBukti');
var radiogrup1 = document.getElementsByName('radiogrup1');

let dataTable;

//#region untuk ambil LIST BANK BKM
fetch("/getbank/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        namaBankSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Bank";
        namaBankSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_Bank;
            option.innerText = entry.Id_Bank + "|" + entry.Nama_Bank;
            namaBankSelect.appendChild(option);
        });

});

namaBankSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = namaBankSelect.options[namaBankSelect.selectedIndex];
    if (selectedOption) {
        //const idJenisInput = document.getElementById('idBank');
        const selectedValue = selectedOption.value; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split("|")[0];
        idBank.value = idJenis;
    }
});
//#endregion

//#region
fetch("/getmatauang/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        mataUangSelect.innerHTML="";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Mata Uang";
        mataUangSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_MataUang;
            option.innerText = entry.Id_MataUang + "|" + entry.Nama_MataUang;
            mataUangSelect.appendChild(option);
        });
});

mataUangSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = mataUangSelect.options[mataUangSelect.selectedIndex];
    if (selectedOption) {
        const idKodeInput = idMataUang;
        const selectedValue = selectedOption.textContent;
        const idMU = selectedValue.split("|")[0];
        idKodeInput.value = idMU;
    }
});
//#endregion

//#region jenis pembayaran
//#region ambil list jenis pembayaran
fetch("/jenispembayaran/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        jenisPembayaranSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih Jenis Pembayaran";
        jenisPembayaranSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_Jenis_Bayar;
            option.innerText = entry.Id_Jenis_Bayar + "|" + entry.Jenis_Pembayaran;
            jenisPembayaranSelect.appendChild(option);
        });
});

jenisPembayaranSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = jenisPembayaranSelect.options[jenisPembayaranSelect.selectedIndex];
    if (selectedOption) {
        const idJenisInput = idJenisPembayaran;
        const selectedValue = selectedOption.textContent; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split("|")[0];
        idJenisInput.value = idJenis;
    }
});
//#endregion

btnOk.addEventListener('click', function (event) {
    event.preventDefault();
    // clickOK();
        fetch("/getTabelInformasiBank/" + tanggal.value)
            .then((response) => response.json())
            .then((options) => {
                console.log(options);
                console.log(tanggal.value);

                dataTable = $("#tabelInfoBank").DataTable({
                    data: options,
                    columns: [
                        { title: "Id. Referensi", data: "IdReferensi" },
                        { title: "Nama Bank", data: "Nama_Bank" },
                        { title: "Mata Uang", data: "Nama_MataUang" },
                        { title: "Nilai", data: "Nilai" },
                        { title: "Keterangan", data: "Keterangan" },
                        { title: "Nama Customer", data: "NamaCust" },
                        { title: "Id. Bank", data: "Id_Bank" },
                        { title: "Id. Mata Uang", data: "Id_MataUang" },
                        { title: "Tipe Transaksi", data: "TypeTransaksi"},
                        { title: "Id. Jenis Bayar", data: "Id_Jenis_Bayar"},
                        { title: "Jenis Pembayaran", data: "Jenis_Pembayaran"},
                        { title: "No Bukti", data: "No_Bukti"}
                    ],
                });
            });
});

$("#tabelInfoBank tbody").off("click", "tr");
$("#tabelInfoBank tbody").on("click", "tr", function () {
    let checkSelectedRows = $("#tabelInfoBank tbody tr.selected");

    if (checkSelectedRows.length > 0) {
        // Remove "selected" class from previously selected rows
        checkSelectedRows.removeClass("selected");
    }
    $(this).toggleClass("selected");
    const table = $("#tabelInfoBank").DataTable();
    let selectedRows = table.rows(".selected").data().toArray();
    console.log(selectedRows[0]);
    idBank.value = selectedRows[0].Id_Bank;
    idReferensi.value = selectedRows[0].IdReferensi;
    idMataUang.value = selectedRows[0].Id_MataUang;
    totalNilai.value = selectedRows[0].Nilai;
    keterangan.value = selectedRows[0].Keterangan;
    idJenisPembayaran.value = selectedRows[0].Id_Jenis_Bayar;
    noBukti.value = selectedRows[0].No_Bukti;

    const namaBank = selectedRows[0].Id_Bank;
    const options = namaBankSelect.options;
        for (let i = 0; i < options.length; i++) {
            if (options[i].value === namaBank) {
                // Setel select option jenisPembayaranSelect sesuai dengan opsi yang cocok
                namaBankSelect.selectedIndex = i;
                break;
            }
    };

    const matauang = selectedRows[0].Id_MataUang;
    const options2 = mataUangSelect.options;
        for (let i = 0; i < options2.length; i++) {
            if (options2[i].value === matauang) {
                // Setel select option jenisPembayaranSelect sesuai dengan opsi yang cocok
                mataUangSelect.selectedIndex = i;
                break;
            }
    };

    const jenisbayar = selectedRows[0].Id_Jenis_Bayar;
    const options3 = jenisPembayaranSelect.options;
        for (let i = 0; i < options2.length; i++) {
            if (options3[i].value === jenisbayar) {
                // Setel select option jenisPembayaranSelect sesuai dengan opsi yang cocok
                jenisPembayaranSelect.selectedIndex = i;
                break;
            }
    };

    for (var i = 0; i < radiogrup1.length; i++) {
        if (radiogrup1[i].value == selectedRows[0].TypeTransaksi) {
            radiogrup1[i].checked = true;
            break;
        }
    }

});

btnIsi.addEventListener("click", function(event) {
    event.preventDefault();
    btnSimpan.style.display = "block";
    btnIsi.style.display = "none";

    namaBankSelect.removeAttribute("readonly");
    idBank.removeAttribute("readonly");
    mataUangSelect.removeAttribute("readonly");
    idMataUang.removeAttribute("readonly");
    totalNilai.removeAttribute("readonly");
    keterangan.removeAttribute("readonly");
    jenisPembayaranSelect.removeAttribute("readonly");
    idJenisPembayaran.removeAttribute("readonly");
    noBukti.removeAttribute("readonly");
});

btnKoreksi.addEventListener("click", function(event) {
    event.preventDefault();
    btnBatal.style.display = "block";
    btnKoreksi.style.display = "none";
    btnSimpan.style.display = "block";
    btnIsi.style.display = "none";
    btnSimpanKoreksi.style.display = "block";

    namaBankSelect.removeAttribute("readonly");
    idBank.removeAttribute("readonly");
    mataUangSelect.removeAttribute("readonly");
    idMataUang.removeAttribute("readonly");
    totalNilai.removeAttribute("readonly");
    keterangan.removeAttribute("readonly");
    jenisPembayaranSelect.removeAttribute("readonly");
    idJenisPembayaran.removeAttribute("readonly");
    noBukti.removeAttribute("readonly");
});

function clickSimpan() {
    formkoreksi.submit();
}
