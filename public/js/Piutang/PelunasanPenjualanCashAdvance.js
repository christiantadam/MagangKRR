let tanggalInput = document.getElementById('tanggalInput');

//HIDDEN
let idCustomer = document.getElementById('idCustomer');
let idJenisCustomer = document.getElementById('idJenisCustomer');

let btnSimpan = document.getElementById('btnSimpan');
let btnIsi = document.getElementById('btnIsi');
let btnBatal = document.getElementById('btnBatal');
let btnKeluar = document.getElementById('btnKeluar');

const tanggalPenagihan = new Date();
const formattedDate2 = tanggalPenagihan.toISOString().substring(0, 10);
tanggalInput.value = formattedDate2;

btnIsi.addEventListener('click', function(event) {
    event.preventDefault();

    btnIsi.style.display = "none";
    btnSimpan.style.display = "block";
    btnKeluar.style.display = "none";
    btnBatal.style.display = "block";

    tanggalInput.removeAttribute("readonly");
    namaCustomerSelect.removeAttribute("readonly");
    jenisPembayaranSelect.removeAttribute("readonly");
    informasiBankSelect.removeAttribute("readonly");
    nilaiMasukKas.removeAttribute("readonly");
    nilaiPelunasan.removeAttribute("readonly");
    jenisPembayaranSelect.removeAttribute("readonly");
    // jenisCustomer.removeAttribute("readonly");
    // alamat.removeAttribute("readonly");
    // nomorSPSelect.removeAttribute("readonly");
    // nomorPO.removeAttribute("readonly");
    // mataUangSelect.removeAttribute("readonly");
    // nilaiKurs.removeAttribute("readonly");
    // syaratPembayaran.removeAttribute("readonly");
    // userPenagihSelect.removeAttribute("readonly");
    // dokumenSelect.removeAttribute("readonly");
    // jenisPajakSelect.removeAttribute("readonly");
    // Ppn.removeAttribute("readonly");

    namaCustomerSelect.focus();
    // TampilCust();
});

fetch("/getCustIsiCashAdvance/")
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
            option.value = entry.ID_Cust; // Gunakan entry.IdCust sebagai nilai opsi
            option.innerText = entry.ID_Cust + "|" + entry.NamaCust; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
            namaCustomerSelect.appendChild(option);
        });
    });
    namaCustomerSelect.addEventListener("change", function (event) {
        event.preventDefault();
        const selectedOption = namaCustomerSelect.options[namaCustomerSelect.selectedIndex];
        if (selectedOption) {
            const selectedValue = selectedOption.textContent; // Atau selectedOption.innerText
            const bagiansatu = selectedValue.split(/[-|]/);
            const jenis = bagiansatu[0];
            const idcust = bagiansatu[1];
            namacust = bagiansatu[2];
            idCustomer.value = idcust;
            idJenisCustomer.value  = jenis;
        }
    })
