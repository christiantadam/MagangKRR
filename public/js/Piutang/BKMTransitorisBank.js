let tanggal = document.getElementById('tanggal');
let idBKK = document.getElementById('idBKK');
let mataUangSelect = document.getElementById('mataUangSelect');
let jumlahUang = document.getElementById('jumlahUang');
let namaBankSelect = document.getElementById('namaBankSelect');
let jenisPembayaranSelect  = document.getElementById('jenisPembayaranSelect');
let idKodePerkiraan = document.getElementById('idKodePerkiraan');
let kodePerkiraanSelect = document.getElementById('kodePerkiraanSelect');
let uraian = document.getElementById('uraian');
let idBankBKK = document.getElementById('idBankBKK');
let jenisBank = document.getElementById('jenisBank');
let idJenisPembayaran = document.getElementById('idJenisPembayaran');
let btnTambahBiaya = document.getElementById('btnTambahBiaya');
let cardBKM = document.getElementById('cardBKM');
let kodePerkiraanTambahBiayaSelect = document.getElementById('kodePerkiraanTambahBiayaSelect');
let idKodePerkiraanTambahBiaya = document.getElementById('idKodePerkiraanTambahBiaya');
let btnProsesTambahBiaya = document.getElementById('btnProsesTambahBiaya');
let jumlahBiaya = document.getElementById('jumlahBiaya');
let keterangan = document.getElementById('keterangan');
let idMataUang = document.getElementById('idMataUang');
let btnDetailBG = document.getElementById('btnDetailBG');
let namaJenisPembayaran = document.getElementById('namaJenisPembayaran');

//untuk card BKM
let tanggalBKM = document.getElementById('tanggalBKM');
let idBKM = document.getElementById('idBKM');
let mataUangBKMSelect = document.getElementById('mataUangBKMSelect');
let kurs = document.getElementById('kurs');
let jumlahUangBKM = document.getElementById('jumlahUangBKM');
let namaBankBKMSelect = document.getElementById('namaBankBKMSelect');
let jenisPembayaranBKMSelect = document.getElementById('jenisPembayaranBKMSelect');
let btnTambahBiayaBKM = document.getElementById('btnTambahBiayaBKM');
let kodePerkiraanBKMSelect = document.getElementById('kodePerkiraanBKMSelect');
let idKodePerkiraanBKMSelect = document.getElementById('idKodePerkiraanBKMSelect');
let uraianBKM = document.getElementById('uraianBKM');
let idBankBKM = document.getElementById('idBankBKM');
let jenisBankBKM = document.getElementById('jenisBankBKM');
let idJenisPembayaranBKM = document.getElementById('idJenisPembayaranBKM');
let idMataUangBKM = document.getElementById('idMataUangBKM');
let btnProsesDetailBG = document.getElementById('btnProsesDetailBG');

//MODAL TAMBAH BIAYA BKM
let methodTambahBiayaBKM = document.getElementById('methodTambahBiayaBKM');
let formTambahBiayaBKM = document.getElementById('formTambahBiayaBKM');
let modalTambahBiayaBKM = document.getElementById('modalTambahBiayaBKM');
let btnProsesTambahBiayaBKM = document.getElementById('btnProsesTambahBiayaBKM');
let jumlahBiayaBKM = document.getElementById('jumlahBiayaBKM');
let kodePerkiraanBKMTSelect = document.getElementById('kodePerkiraanBKMTSelect');
let keteranganBKM = document.getElementById('keteranganBKM');

let tabelDetailBiayaBKK;
let selectedRowsDetailBiayaBKK = [];
let tabelDetailBG;
let methodDetailBG = document.getElementById('methodDetailBG');
let formDetailBG = document.getElementById('formDetailBG');

//MODAL DETAIL BG
let bank = document.getElementById('bank');
let jenisPembayaran = document.getElementById('jenisPembayaran');
let nomor = document.getElementById('nomor');
let jatuhTempo = document.getElementById('jatuhTempo');
let statusCetak = document.getElementById('statusCetak')

let btnKoreksiBiayaBKK = document.getElementById('btnKoreksiBiayaBKK');

tanggal.addEventListener('keypress', function (event) {
    event.preventDefault();
    mataUangSelect.focus();
});

mataUangSelect.addEventListener('click', function (event) {
    event.preventDefault();
});;

kodePerkiraanSelect.addEventListener('click', function (event) {
    event.preventDefault();
});

kodePerkiraanSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = kodePerkiraanSelect.options[kodePerkiraanSelect.selectedIndex];
    if (selectedOption) {
        const selectedValue = selectedOption.value; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idBank = selectedValue.split(" | ")[0];
        idKodePerkiraan.value = idBank;
    }
});

//#region ambil list mata uang
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
//#endregion

//#region ambil list bank
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
//#endregion

//#region ambil list jenis bayar
fetch("/getjenispembayaran/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        jenisPembayaranSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Jenis Pembayaran";
        jenisPembayaranSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_Jenis_Bayar;
            option.innerText = entry.Id_Jenis_Bayar + "|" + entry.Jenis_Pembayaran;
            jenisPembayaranSelect.appendChild(option);
        });

});
//#endregion

//#region ambil list kode perkiraan
fetch("/getkodeperkiraan/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        kodePerkiraanSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Kode Perkiraan";
        kodePerkiraanSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.NoKodePerkiraan;
            option.innerText = entry.NoKodePerkiraan + "|" + entry.Keterangan;
            kodePerkiraanSelect.appendChild(option);
        });
});
//#endregion

mataUangSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = mataUangSelect.options[mataUangSelect.selectedIndex];
    if (selectedOption) {
        const idKodeInput = document.getElementById('idMataUang');
        const selectedValue = selectedOption.textContent;
        const idMU = selectedValue.split("|")[0];
        idKodeInput.value = idMU;
    }
});

jumlahUang.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        let jumlah = parseFloat(jumlahUang.value);
        // let kurs = parseFloat(kursRupiah.value);

        if (jumlah === '0.00') {
            alert('Jumlah Uang TIDAK BOLEH = 0 !');
            jumlahUang.focus();
        } else {
            let formattedJumlah = jumlah.toFixed(2);
            jumlahUang.value = formattedJumlah;
        }
    }
});

namaBankSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = namaBankSelect.options[namaBankSelect.selectedIndex];
    if (selectedOption) {
        //const idJenisInput = document.getElementById('idBank');
        const selectedValue = selectedOption.value; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split("|")[0];
        idBankBKK.value = idJenis;
        //console.log(idBank.value);
        fetch("/detailjenisbank/" + idBankBKK.value)
            .then((response) => response.json())
            .then((options) => {
                jenisBank.value = options[0].jenis;
                console.log(options);
            });
    }
});

jenisPembayaranSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = jenisPembayaranSelect.options[jenisPembayaranSelect.selectedIndex];
    if (selectedOption) {
        const idJenisInput = document.getElementById('idJenisPembayaran');
        const selectedValue = selectedOption.textContent; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split("|")[0];
        const namaJenis = selectedValue.split("|")[1];
        idJenisInput.value = idJenis;
        namaJenisPembayaran.value = namaJenis;
    }
});

uraian.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        jenis = 'P';

        if (idBKK.value === "") {
            if (idBankBKK.value == "KRR1") {
                idBankBKK.value = "KI";
            }
            else if (idBankBKK.value == "KRR2") {
                idBankBKK.value = "KKM";
            }
        } else {
            idBankBKK = idBankBKK.value;
        }

        fetch("/getidbkk/" + idBankBKK.value + "/" + tanggal.value)
            .then((response) => response.json())
            .then((options) => {
                console.log(options);
                idBKK.value = options;
            });

            var adaBiaya = confirm('Apakah ada BIAYA?');
            if (adaBiaya) {
                btnTambahBiaya.disabled = false; // Aktifkan tombol jika ada biaya
            } else {
                btnTambahBiaya.disabled = true;  // Nonaktifkan tombol jika tidak ada biaya
                if (cardBKM.classList.contains('disabled')) {
                    cardBKM.classList.remove('disabled'); // Mengaktifkan card
                }
            }
    }
});

kodePerkiraanTambahBiayaSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = kodePerkiraanTambahBiayaSelect.options[kodePerkiraanTambahBiayaSelect.selectedIndex];
    if (selectedOption) {
        const selectedValue = selectedOption.value; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idkp = selectedValue.split(" | ")[0];
        idKodePerkiraanTambahBiaya.value = idkp;
    }
});

btnTambahBiaya.addEventListener('click', function (event) {
    event.preventDefault();
    modalTambahBiaya = $("#modalTambahBiaya");
    modalTambahBiaya.modal('show');

    fetch("/getkodeperkiraan/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        kodePerkiraanTambahBiayaSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Kode Perkiraan";
        kodePerkiraanTambahBiayaSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.NoKodePerkiraan;
            option.innerText = entry.NoKodePerkiraan + "|" + entry.Keterangan;
            kodePerkiraanTambahBiayaSelect.appendChild(option);
        });
    });
})

btnDetailBG.addEventListener('click', function (event) {
    event.preventDefault();
    modalDetailBG = $("#modalDetailBG");
    modalDetailBG.modal('show');

    bank.value = namaBankSelect.value;
    jenisPembayaran.value = namaJenisPembayaran.value;
});

//#region tambah data ke tabel Detail Biaya BKK
btnProsesTambahBiaya.addEventListener('click', function (event) {
    event.preventDefault();
    tabelDetailBiayaBKK = $('#tabelDetailBiayaBKK').DataTable({
        // Opsi kolom yang ditampilkan
        columns: [
            {
                title: 'Keterangan',
                render: function (data, type, row) {
                    return `<input type="checkbox" class="row-checkbox" /> ${row[0]}`;
                },
            },
            { title: 'Biaya' },
            { title: 'Kode Perkiraan' }
        ],
    });

    const Keterangan = keterangan.value;
    console.log(keterangan.value);
    const Biaya = jumlahBiaya.value;
    const KodePerkiraan = idKodePerkiraanTambahBiaya.value;

    // Tambahkan data ke dalam DataTable
    tabelDetailBiayaBKK.row.add([
        Keterangan,
        Biaya,
        KodePerkiraan
    ]).draw();
})
//#endregion


// UNTUK CARD BKM

tanggalBKM.addEventListener('keypress', function (event) {
    event.preventDefault();
    mataUangBKMSelect.focus();
});

//#region untuk ambil liat mata uang untuk BKM
fetch("/getmatauang/")
        .then((response) => response.json())
        .then((options) => {
            console.log(options);
            mataUangBKMSelect.innerHTML="";

            const defaultOption = document.createElement("option");
            defaultOption.disabled = true;
            defaultOption.selected = true;
            defaultOption.innerText = "Mata Uang";
            mataUangBKMSelect.appendChild(defaultOption);

            options.forEach((entry) => {
                const option = document.createElement("option");
                option.value = entry.Id_MataUang;
                option.innerText = entry.Id_MataUang + "|" + entry.Nama_MataUang;
                mataUangBKMSelect.appendChild(option);
            });

        });
//#endregion

mataUangBKMSelect.addEventListener('change', function (event) {
    event.preventDefault();
})

//#region ambil list bank (BKM)
fetch("/getbank/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        namaBankBKMSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Bank";
        namaBankBKMSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_Bank;
            option.innerText = entry.Id_Bank + "|" + entry.Nama_Bank;
            namaBankBKMSelect.appendChild(option);
        });

});
//#endregion

//#region ambil jenis bayar BKM
fetch("/getjenispembayaran/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        jenisPembayaranBKMSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Jenis Pembayaran";
        jenisPembayaranBKMSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_Jenis_Bayar;
            option.innerText = entry.Id_Jenis_Bayar + "|" + entry.Jenis_Pembayaran;
            jenisPembayaranBKMSelect.appendChild(option);
        });

});
//#endregion

fetch("/getkodeperkiraan/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        kodePerkiraanBKMSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Kode Perkiraan";
        kodePerkiraanBKMSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.NoKodePerkiraan;
            option.innerText = entry.NoKodePerkiraan + "|" + entry.Keterangan;
            kodePerkiraanBKMSelect.appendChild(option);
        });
});

namaBankBKMSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = namaBankBKMSelect.options[namaBankBKMSelect.selectedIndex];
    if (selectedOption) {
        //const idJenisInput = document.getElementById('idBank');
        const selectedValue = selectedOption.value; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split("|")[0];
        idBankBKM.value = idJenis;
        //console.log(idBank.value);
        fetch("/detailjenisbank/" + idBankBKM.value)
            .then((response) => response.json())
            .then((options) => {
                jenisBankBKM.value = options[0].jenis;
                console.log(options);
            });
    }
});

mataUangBKMSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = mataUangBKMSelect.options[mataUangBKMSelect.selectedIndex];
    if (selectedOption) {
        const idKodeInput = document.getElementById('idMataUangBKM');
        const selectedValue = selectedOption.textContent;
        const idMU = selectedValue.split("|")[0];
        idKodeInput.value = idMU;
    }
});

jenisPembayaranBKMSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = jenisPembayaranBKMSelect.options[jenisPembayaranBKMSelect.selectedIndex];
    if (selectedOption) {
        const idJenisInput = document.getElementById('idJenisPembayaranBKM');
        const selectedValue = selectedOption.textContent; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split("|")[0];
        idJenisInput.value = idJenis;
    }
});

kodePerkiraanBKMSelect.addEventListener('click', function (event) {
    event.preventDefault();
});

kodePerkiraanBKMSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = kodePerkiraanBKMSelect.options[kodePerkiraanBKMSelect.selectedIndex];
    if (selectedOption) {
        const selectedValue = selectedOption.value; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idBank = selectedValue.split(" | ")[0];
        idKodePerkiraanBKMSelect.value = idBank;
    }
});

kurs.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        if (parseFloat(kurs.value) > 0) {
            if (idMataUang.value === "1" && idMataUangBKM.value !== "1") {
                let total = parseFloat(jumlahUang.value.replace(/,/g, "")) / parseFloat(kurs.value.replace(/,/g, ""));
                jumlahUangBKM.value = formatNumber(total, "###,###,##0.00");
            } else if (idMataUang.value !== "1" && idMataUangBKM.value === "1") {
                let total = parseFloat(jumlahUang.value.replace(/,/g, "")) * parseFloat(kurs.value.replace(/,/g, ""));
                jumlahUangBKM.value = formatNumber(total, "###,###,##0.00");
            }

        } else {
            alert('Nilai kurs Rupiah harus lebih besar dari 0!');
        }
    }
});

btnProsesDetailBG.addEventListener('click', function(event) {
    event.preventDefault();
    tabelDetailBG = $('#tabelDetailBG').DataTable({
        // Opsi kolom yang ditampilkan
        columns: [
            {
                title: 'Nomor',
                render: function (data, type, row) {
                    return `<input type="checkbox" class="row-checkbox" /> ${row[0]}`;
                },
            },
            { title: 'Jatuh Tempo' },
            { title: 'Status Cetak' }
        ],
    });

    const Nomor = nomor.value;
    const JatuhTempo = jatuhTempo.value;
    const StatusCetak = statusCetak.value;

    // Tambahkan data ke dalam DataTable
    tabelDetailBG.row.add([
        Nomor,
        JatuhTempo,
        StatusCetak
    ]).draw();
})

btnTambahBiayaBKM.addEventListener('click', function(event) {
    event.preventDefault();
    modalTambahBiayaBKM = $("#modalTambahBiayaBKM");
    modalTambahBiayaBKM.modal('show');

    fetch("/getkodeperkiraan/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        kodePerkiraanBKMTSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Kode Perkiraan";
        kodePerkiraanBKMTSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.NoKodePerkiraan;
            option.innerText = entry.NoKodePerkiraan + "|" + entry.Keterangan;
            kodePerkiraanBKMTSelect.appendChild(option);
        });
    });
});

uraianBKM.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        jenis = 'P';

        if (idBKM.value === "") {
            if (idBankBKM.value == "KRR1") {
                idBankBKM.value = "KI";
            }
            else if (idBankBKM.value == "KRR2") {
                idBankBKM.value = "KKM";
            }
        } else {
            idBankBKM = idBankBKM.value;
        }

        fetch("/getidbkmtransitoris/" + idBankBKM.value + "/" + tanggalBKM.value)
            .then((response) => response.json())
            .then((options) => {
                console.log(options);
                idBKM.value = options;
            });

            var adaBiaya = confirm('Apakah ada BIAYA?');
            if (adaBiaya) {
                btnProsesTambahBiayaBKM.disabled = false; // Aktifkan tombol jika ada biaya
            } else {

            }
    }
});

function formatNumber(number, format) {
    return number.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
}

//TABEL KANAN
// btnKoreksiBiayaBKK.addEventListener('click', function(event) {
//     event.preventDefault();
//     modalTambahBiaya = $("#modalTambahBiaya");
//     modalTambahBiaya.modal('show');

//     let rows = tabelDetailBiayaBKK.getElementsByTagName("tr");
//     for (let i = 1; i < rows.length; i++) {
//         let cells = rows[i].cells;
//         let checkbox = cells[0].getElementsByTagName("input")[0];
//         if (checkbox.checked) {
//             let rowData = {
//                 Keterangan: cells[0].innerText,
//                 Biaya: cells[1].innerText,
//                 Kode_Perkiraan: cells[2].innerText,
//             };
//             selectedRowsDetailBiayaBKK.push(rowData);
//         }
//     }
//     const keterangan = $("#keterangan");
//     const biaya = $("#jumlahUang")
//     const kodePerkiraan = $("#idKodePerkiraanTambahBiaya");

//     const selectedData = selectedRowsDetailBiayaBKK[0];

//     // Isi nilai pada elemen-elemen modal berdasarkan data yang diambil
//     keterangan.val(selectedData.Keterangan);
//     biaya.val(selectedData.Biaya);
//     kodePerkiraan.val(selectedData.Kode_Perkiraan);
//     console.log(idDetailBiaya);
//     const modal = $("#modalDetailBiaya");
//     modal.modal('show');
//     //untuk ambil list kode perkiraan
//     fetch("/detailkodeperkiraan/" + 1)
//         .then((response) => response.json())
//         .then((options) => {
//             console.log(options);
//             kodePerkiraanBiayaSelect.innerHTML="";

//             const defaultOption = document.createElement("option");
//             defaultOption.disabled = true;
//             defaultOption.selected = true;
//             defaultOption.innerText = "Kode Perkiraan";
//             kodePerkiraanBiayaSelect.appendChild(defaultOption);

//             options.forEach((entry) => {
//                 const option = document.createElement("option");
//                 option.value = entry.NoKodePerkiraan;
//                 option.innerText = entry.NoKodePerkiraan + "|" + entry.Keterangan;
//                 kodePerkiraanBiayaSelect.appendChild(option);
//             });
//         });
// })



