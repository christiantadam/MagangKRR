let tanggalInput = document.getElementById('tanggalInput');
let namaCustomerSelect = document.getElementById('namaCustomerSelect');
let noPenagihanSelect = document.getElementById('noPenagihanSelect');
let jenisPembayaranSelect = document.getElementById('jenisPembayaranSelect');
let mataUangSelect = document.getElementById('mataUangSelect');
let informasiBankSelect = document.getElementById('informasiBankSelect');
let nilaiMasukKas = document.getElementById('nilaiMasukKas');
let buktiPelunasan = document.getElementById('buktiPelunasan');
let tabelPelunasanPenjualan = document.getElementById('tabelPelunasanPenjualan');
let totalPelunasan = document.getElementById('totalPelunasan');
let nilaiPiutang = document.getElementById('nilaiPiutang');
let totalBiaya = document.getElementById('totalBiaya');
let kurangLebih = document.getElementById('kurangLebih');

let btnAddItem = document.getElementById('btnAddItem');
let btnEditItem = document.getElementById('btnEditItem');
let btnDeleteItem = document.getElementById('btnDeleteItem');
let modalLihatPenagihan = document.getElementById('modalLihatPenagihan');
let methodLihatPenagihan = document.getElementById('methodLihatPenagihan');
let formLihatPenagihan = document.getElementById('formLihatPenagihan');

let btnSimpan = document.getElementById('btnSimpan');
let btnKoreksi = document.getElementById('btnKoreksi');
let btnHapus = document.getElementById('btnHapus');
let btnIsi = document.getElementById('btnIsi');
let btnBatal = document.getElementById('btnBatal');

//HIDDEN
let idCustomer = document.getElementById('idCustomer');
let idJenisCustomer = document.getElementById('idJenisCustomer');
let idJenisPembayaran = document.getElementById('idJenisPembayaran');
let idMataUang = document.getElementById('idMataUang');
let idReferensi = document.getElementById('idReferensi');
let cust;

//MODAL
let noPenagihan = document.getElementById('noPenagihan');

btnIsi.addEventListener('click', function(event) {
    event.preventDefault();

    btnIsi.style.display = "none";
    btnSimpan.style.display = "block";
    btnKoreksi.style.display = "none";
    btnBatal.style.display = "block";

    tanggalInput.removeAttribute("readonly");
    namaCustomerSelect.removeAttribute("readonly");
    jenisPembayaranSelect.removeAttribute("readonly");
    buktiPelunasan.removeAttribute("readonly");
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

    cust = 1;
    namaCustomerSelect.focus();
    TampilCust();
});

function TampilCust() {
    if (cust == 1) {
        fetch("/getCustIsi/")
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
                option.value = entry.IDCust; // Gunakan entry.IdCust sebagai nilai opsi
                option.innerText = entry.IDCust + "|" + entry.NAMACUST; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
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

                jenisPembayaranSelect.focus();
            }
            fetch("/getReferensiBank/" + idCustomer.value)
            .then((response) => response.json())
            .then((options) => {
                console.log(options);
                informasiBankSelect.innerHTML="";

                const defaultOption = document.createElement("option");
                defaultOption.disabled = true;
                defaultOption.selected = true;
                defaultOption.innerText = "Ref Bank";
                informasiBankSelect.appendChild(defaultOption);

                options.forEach((entry) => {
                    const option = document.createElement("option");
                    option.value = entry.IdReferensi;
                    option.innerText = entry.IdReferensi + "|" + entry.Ket;
                    informasiBankSelect.appendChild(option);
                });
            });
        });
    }
};

fetch("/getJenisPembayaran/")
.then((response) => response.json())
.then((options) => {
    console.log(options);
    jenisPembayaranSelect.innerHTML = "";

    const defaultOption = document.createElement("option");
    defaultOption.disabled = true;
    defaultOption.selected = true;
    defaultOption.innerText = "Pilih Jenis Bayar";
    jenisPembayaranSelect.appendChild(defaultOption);

    options.forEach((entry) => {
        const option = document.createElement("option");
        option.value = entry.Id_Jenis_Bayar; // Gunakan entry.IdCust sebagai nilai opsi
        option.innerText = entry.Id_Jenis_Bayar + "|" + entry.Jenis_Pembayaran; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
        jenisPembayaranSelect.appendChild(option);
    });
});

jenisPembayaranSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = jenisPembayaranSelect.options[jenisPembayaranSelect.selectedIndex];
    if (selectedOption) {
        const selectedValue = selectedOption.textContent; // Atau selectedOption.innerText
        const bagiansatu = selectedValue.split(/[-|]/);
        const jenis = bagiansatu[0];
        idJenisPembayaran.value = jenis;
    }

    if (idJenisPembayaran.value == 1 || idJenisPembayaran.value == 2 || idJenisPembayaran.value == 3) {
        informasiBankSelect.setAttribute("readonly", true);
        mataUangSelect.removeAttribute("readonly");
        nilaiMasukKas.removeAttribute("readonly");
        mataUangSelect.focus();
    } else {
        informasiBankSelect.removeAttribute("readonly");
        mataUangSelect.setAttribute("readonly", true);
        nilaiMasukKas.setAttribute("readonly", true);
        informasiBankSelect.focus();
    }
});

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
        const selectedValue = selectedOption.textContent;
        const idMU = selectedValue.split("|")[0];
        idMataUang.value = idMU;
    }

    nilaiMasukKas.focus();
});

informasiBankSelect.addEventListener("change", function (event) {
    event.preventDefault();
    const selectedOption = informasiBankSelect.options[informasiBankSelect.selectedIndex];
    if (selectedOption) {
        const selectedValue = selectedOption.textContent;
        const idMU = selectedValue.split("|")[0];
        idReferensi.value = idMU;
    }

    if (informasiBankSelect.selectedIndex != 0) {
        LihatReferensi();
    }
});

function LihatReferensi() {
    fetch("/getDataRefBank/" + idReferensi.value)
    .then((response) => response.json())
    .then((options) => {
        console.log(options);

        options.forEach((option) => {
            //Ambil nilai Tgl_Order dari setiap objek data
            const tglInput = option.Tanggal;
            const [tanggal, waktu] = tglInput.split(" ");
            option.Tanggal = tanggal;
            tanggalInput.value = tanggal;
        });

        idMataUang.value = options[0].Id_MataUang;
        nilaiMasukKas.value = options[0].Nilai;
        buktiPelunasan.value = options[0].No_Bukti;
        tanggalInput.value = options[0].Tanggal;

        let MU = idMataUang.value;
        let opt = mataUangSelect.options;
        for (let i = 0; i < opt.length; i++) {
            if (opt[i].value == MU) {
                mataUangSelect.selectedIndex = i;
                break;
            }
        };
    })
}

nilaiMasukKas.addEventListener("keypress", function(event) {
    if (event.key == "Enter") {
        event.preventDefault();
        buktiPelunasan.focus();
    }
});

buktiPelunasan.addEventListener("keypress", function(event) {
    if (event.key == "Enter") {
        event.preventDefault();
        btnAddItem.focus();
    }
})

btnAddItem.addEventListener('click', function (event) {
    event.preventDefault();
    modalLihatPenagihan = $("#modalLihatPenagihan");
    modalLihatPenagihan.modal('show');
});

// Fungsi untuk menangani perubahan pada tombol radio
function handleRadioChange() {
    var selectedValue = document.querySelector('input[name="radiogrup1"]:checked').value;

    // Cek nilai yang terpilih dan lakukan sesuatu berdasarkan nilai tersebut
    if (selectedValue === "1") {
        console.log("Anda memilih Pelunasan");
        fetch("/getListPenagihanSJ/" + idCustomer.value)
        .then((response) => response.json())
        .then((options) => {
            console.log(options);
            noPenagihan.innerHTML="";

            const defaultOption = document.createElement("option");
            defaultOption.disabled = true;
            defaultOption.selected = true;
            defaultOption.innerText = "Pilih No. Penagihan";
            noPenagihan.appendChild(defaultOption);

            options.forEach((entry) => {
                const option = document.createElement("option");
                option.value = entry.Id_Penagihan;
                option.innerText = entry.Id_Penagihan + "|" + entry.Tgl_Penagihan;
                noPenagihan.appendChild(option);
            });

        })
    } else if (selectedValue === "2") {
        console.log("Anda memilih Biaya Ditanggung");
    } else if (selectedValue === "3") {
        console.log("Anda memilih Kurang/Lebih");
    }
}

// Tambahkan event listener untuk setiap tombol radio
var radioButtons = document.querySelectorAll('input[name="radiogrup1"]');
radioButtons.forEach(function (radioButton) {
    radioButton.addEventListener('change', handleRadioChange);
});


