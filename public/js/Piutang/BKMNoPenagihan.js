let idBKM = document.getElementById('idBKM');
let tanggalInput = document.getElementById('tanggalInput');
let namaCustomerSelect = document.getElementById('namaCustomerSelect');
let mataUangSelect = document.getElementById('mataUangSelect');
let idMataUang = document.getElementById('idMataUang');
let namaBankSelect = document.getElementById('namaBankSelect');
let idBank = document.getElementById('idBank');
let jenisPembayaranSelect = document.getElementById('jenisPembayaranSelect');
let idJenisPembayaran = document.getElementById('idJenisPembayaran');
let kursRupiah = document.getElementById('kursRupiah');
let nilaiPelunasan = document.getElementById('nilaiPelunasan');
let uraian = document.getElementById('uraian');
let jenisBank = document.getElementById('jenisBank');
let btnTambahData = document.getElementById('btnTambahData');
let idCustomer = document.getElementById('idCustomer');
let jenisCustomer = document.getElementById('jenisCustomer');
let totalPelunasan = document.getElementById('totalPelunasan');
let idKodePerkiraan = document.getElementById('idKodePerkiraan');
let tabelDetailData;
let i;
let total;
let selectedRowDetailData = [];

//= $("#tabelDetailData").DataTable();
let jenis;

const tanggal = new Date();
const formattedDate = tanggal.toISOString().substring(0, 10);
tanggalInput.value = formattedDate;

namaCustomerSelect.addEventListener('click', function (event) {
    event.preventDefault();
    const selectedOption = namaCustomerSelect.options[namaCustomerSelect.selectedIndex];

    const selectedText = selectedOption.textContent; // Atau selectedOption.innerText
    const bagiansatu = selectedText.split(/[-|]/);
    const idcust = bagiansatu[0];
    const jnscust = bagiansatu[1];
    //console.log(jnscust);
    idCustomer.value = idcust;
    jenisCustomer.value = jnscust;
});

fetch("/detailcustomer/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        namaCustomerSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih Cust";
        namaCustomerSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.IdCust;
            option.innerText = entry.IdCust + "|" + entry.NamaCust;
            namaCustomerSelect.appendChild(option);
        });
    })

mataUangSelect.addEventListener('click', function (event) {
    event.preventDefault();
});

fetch("/detailmatauang/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        mataUangSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih MataUang";
        mataUangSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.Id_MataUang;
            option.innerText = entry.Id_MataUang + "|" + entry.Nama_MataUang;
            mataUangSelect.appendChild(option);
        });
    })

mataUangSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = mataUangSelect.options[mataUangSelect.selectedIndex];
    if (selectedOption) {
        const idKodeInput = document.getElementById('idMataUang');
        const selectedValue = selectedOption.textContent;
        const idKode = selectedValue.split("|")[1];
        idKodeInput.value = idKode;
    }
});


kursRupiah.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        if (parseFloat(kursRupiah.value) > 0) {
            // Nilai kurs Rupiah lebih besar dari 0, tidak perlu alert
        } else {
            alert('Nilai kurs Rupiah harus lebih besar dari 0!');
        }
    }
});

nilaiPelunasan.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        let jumlah = parseFloat(nilaiPelunasan.value).toFixed(2);
        let kurs = parseFloat(kursRupiah.value);

        if (jumlah === '0.00') {
            alert('Jumlah Uang TIDAK BOLEH = 0 !');
            nilaiPelunasan.focus();
        } else {
            let total = 0;
            if (kurs === 0) {
                nilaiPelunasan.value = formatNumberWithCommas(parseFloat(nilaiPelunasan.value).toFixed(2));
            } else {
                let jum = parseFloat(jumlah) * kurs;
                nilaiPelunasan.value = jum.toFixed(2);
            }
        }
        //totalPelunasan.value = nilaiPelunasan.value;
    }
});

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
        const idJenisInput = document.getElementById('idJenisPembayaran');
        const selectedValue = selectedOption.textContent; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split("|")[1];
        idJenisInput.value = idJenis;
    }
});

fetch("/detailbank/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        namaBankSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih Bank";
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
        const idJenis = selectedValue.split(" | ")[0];
        idBank.value = idJenis;
        //console.log(idBank.value);
        fetch("/detailjenisbank/" + idBank.value)
            .then((response) => response.json())
            .then((options) => {
                jenisBank.value = options[0].jenis;
                console.log(options);
            });
    }
});

fetch("/detailkodeperkiraan/" + 1)
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

kodePerkiraanSelect.addEventListener("change", function (event) {
    event.preventDefault();
    // console.log(idBank.value);
    const selectedOption = kodePerkiraanSelect.options[kodePerkiraanSelect.selectedIndex];
    if (selectedOption) {

        const selectedValue = selectedOption.textContent; // Nilai dari opsi yang dipilih (format: "id | nama")
        const idJenis = selectedValue.split("|")[1];
        idKodePerkiraan.value = idJenis;
    }
});

uraian.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        jenis = 'R';
        if (namaCustomerSelect.value !== '' && parseFloat(nilaiPelunasan.value) !== 0 &&
            jenisPembayaranSelect.value !== '' && namaBankSelect.value !== '' &&
            idMataUang.value !== '' && uraian.value !== '' && mataUangSelect.value !== '') {
            btnTambahData.disabled = false;
        } else {
            alert('Isi semua data');
        }

        if (idBKM.value === "") {
            if (idBank.value == "KRR1" ) {
                idBank.value = "KI";
            }
            else if (idBank.value == "KRR2") {
                idBank.value = "KKM";
            }
        } else {
                idBank = idBank.value;
        }

        tabelDetailData = $('#tabelDetailData').DataTable({
            // Opsi kolom yang ditampilkan
            columns: [
                {
                    title: "Id. Detail",
                    render: function() {
                        return `<input type="checkbox" class="row-checkbox"/>`;
                    },
                },
                // { title: 'Id. Detail' },
                { title: 'Customer' },
                { title: 'Nilai Rincian' },
                { title: 'Jenis Pembayaran' },
                { title: 'Kode Perkiraan' },
                { title: 'Uraian' },
                { title: 'No. Bukti' },
                { title: 'Nama Customer' }
            ],
        });

        const customerColumn = idCustomer.value;
        const nilaiRincianColumn = nilaiPelunasan.value;
        const jenisPembayaranColumn = idJenisPembayaran.value;
        const kodePerkiraanColumn = idKodePerkiraan.value;
        const uraianColumn = uraian.value;
        const noBuktiColumn = noBukti.value;
        const namaCustomerColumn = namaCustomerSelect.value;

        // Tambahkan data ke dalam DataTable
        tabelDetailData.row.add([
            '',
            customerColumn,
            nilaiRincianColumn,
            jenisPembayaranColumn,
            kodePerkiraanColumn,
            uraianColumn,
            noBuktiColumn,
            namaCustomerColumn // Menggunakan nilai dari inputan uraian
        ]).draw();

        // i = tabelDetailData.rows().count();
        // if (i === 1) {
        //     totalPelunasan.value = formatAndSetTotal(nilaiPelunasan.value);
        // } else {
        //     total = parseFloat(nilaiPelunasan.value) + parseFloat(totalPelunasan.value.replace(/,/g, ''));
        //     totalPelunasan.value = formatAndSetTotal(total);
        // }
        let total = 0;
        for (let index = 0; index <tabelDetailData.rows().count(); index++) {
           // const element =[index];

           let uang = parseFloat(tabelDetailData.cell(index,2).data());
           total +=uang
        }

        totalPelunasan.value = total;

        idCustomer.value = ""
        namaCustomerSelect.selectedIndex = 0;
        mataUangSelect.selectedIndex = 0 ;
        idMataUang.value = "";
        kursRupiah.value = "";
        nilaiPelunasan.value = "";
        namaBankSelect.selectedIndex = 0;
        idBank.value = "";
        jenisBank.value = "";
        jenisPembayaranSelect.selectedIndex = 0;
        idKodePerkiraan.value = "";
        kodePerkiraanSelect.selectedIndex = 0;
        noBukti.value = "";
        uraian.value = "";
        jenisCustomer.value = "";
    }
});

$("#tabelDetailData tbody").off("click", "input[type='checkbox'");
$("#tabelDetailData tbody").off("change", "input[type='checkbox']");
$("#tabelDetailData tbody").on("change", "input[type='checkbox']", function () {
});
// $("#tabelDetailData tbody").on("click", "input[type='checkbox']", function () {
//     DetailData();
// });


// function DetailData() {
//     let rows = tabelDetailData.getElementsByTagName("tr");
//     for (let i = 1; i < rows.length; i++) {
//         let cells = rows[i].cells;
//         let checkbox = cells[0].getElementsByTagName("input")[0];
//         if (checkbox.checked) {
//             let rowData = {
//                 Iddetail: cells[0].innerText,
//                 Customer: cells[1].innerText,
//                 Nilairincian: cells[2].innerText,
//                 Jenispembayaran: cells[3].innerText,
//                 Kodeperkiraan: cells[4].innerText,
//                 Uraian: cells[5].innerText,
//                 Nobukti: cells[6].innerText,
//                 Namacustomer: cells[7].innerText,
//             };
//             selectedRowDetailData.push(rowData);
//         }
//     }
//     const idDetail = $("#idDetail");
//     const idCustomer = $("#idCustomer")
//     const nilaiPelunasan = $("#nilaiPelunasan");
//     const idJenisPembayaran = $("#idJenisPembayaran");
//     const idKodePerkiraan = $("#idKodePerkiraan");
//     const uraian = $("#uraian")
//     const noBukti = $("#noBukti");
//     const namaCustomer = $("#idJenisPembayaran");

//     const selectedData = selectedRowDetailData[0];

//     // Isi nilai pada elemen-elemen modal berdasarkan data yang diambil
//     idDetail.val(selectedData.Iddetail);
//     idCustomer.val(selectedData.Customer);
//     nilaiPelunasan.val(selectedData.Nilairincian);
//     idJenisPembayaran.val(selectedData.Jenispembayaran);
//     idKodePerkiraan.val(selectedData.Kodepekiraan);
//     uraian.val(selectedData.Uraian);
//     noBukti.val(selectedData.Nobukti);
//     namaCustomer.val(selectedData.Namacustomer)
//     // idcoba = iddetail.val();
//     //console.log(idcoba);
// }

$("#tabelDetailData").on('change', '.row-checkbox', function () {
    const isChecked = $(this).is(':checked');
    const row = $(this).closest('tr');
    const rowData = [];

    // Ambil data dari setiap sel dalam baris kecuali kolom checkbox
    row.find('td:not(:last-child)').each(function () {
        rowData.push($(this).text());
    });

    if (isChecked) {
        // Checkbox dicentang
        console.log('Checkbox dicentang pada baris:', rowData);
        $('#nilaiPelunasan').val(rowData[2]); // Ganti 0 dengan indeks kolom yang sesuai
        $('#noBukti').val(rowData[6]);
        $('#uraian').val(rowData[5]);
    } else {
        // Checkbox tidak dicentang
        console.log('Checkbox tidak dicentang pada baris:', rowData);
    }
});




