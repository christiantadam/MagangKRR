let tanggalInput = document.getElementById('tanggalInput');
let noPelunasanSelect = document.getElementById('noPelunasanSelect');
let informasiBankSelect = document.getElementById('informasiBankSelect');
let namaCustomerSelect = document.getElementById('namaCustomerSelect');
let mataUangSelect = document.getElementById('mataUangSelect');
let nilaiMasukKas = document.getElementById('nilaiMasukKas');
let nilaiPelunasan = document.getElementById('nilaiPelunasan');
let jenisPembayaranSelect = document.getElementById('jenisPembayaranSelect');
let idBKM = document.getElementById('idBKM');
let sisaPelunasan = document.getElementById('sisaPelunasan');
let tabelPelunasanPenjualan = $('#tabelPelunasanPenjualan').DataTable();
let sUser;

//HIDDEN
let idCustomer = document.getElementById('idCustomer');
let namaCustomer = document.getElementById('namaCustomer');
let noPelunasan = document.getElementById('noPelunasan');
let idJenisPembayaran = document.getElementById('idJenisPembayaran');

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
    noPelunasanSelect.removeAttribute("readonly");
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
    };
});

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
});


let idsebelum;
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
            option.value = entry.ID_Cust; // Gunakan entry.Id_Pelunasan sebagai nilai opsi
            option.innerText = entry.ID_Cust + "|" + entry.NamaCust; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
            namaCustomerSelect.appendChild(option);
        });


        // options.forEach((entry) => {
        //     const option = document.createElement("option");

        //     // if (idsebelum != entry.ID_Cust) {
        //         option.value  = entry.ID_Cust;
        //         idsebelum = option.value;
        //         option.innerText = entry.ID_Cust + "|" + entry.NamaCust; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
        //         namaCustomerSelect.appendChild(option);
        //     // }
        //     // Gunakan entry.IdCust sebagai nilai opsi
        // });
    });
    namaCustomerSelect.addEventListener("change", function (event) {
        event.preventDefault();
        const selectedOption = namaCustomerSelect.options[namaCustomerSelect.selectedIndex];
        if (selectedOption) {
            const selectedValue = selectedOption.textContent; // Atau selectedOption.innerText
            const bagiansatu = selectedValue.split(/[-|]/);
            const idcust = bagiansatu[0];
            const nama = bagiansatu[1];
            idCustomer.value = idcust;
            namaCustomer.value  = nama;
        }

        fetch("/getNoPelunasanCashAdvance/" + idCustomer.value)
        .then((response) => response.json())
        .then((options) => {
            console.log(options);
            noPelunasanSelect.innerHTML = "";

            const defaultOption = document.createElement("option");
            defaultOption.disabled = true;
            defaultOption.selected = true;
            defaultOption.innerText = "Pilih No. Pelunasan";
            noPelunasanSelect.appendChild(defaultOption);

            options.forEach((entry) => {
                const option = document.createElement("option");
                option.value = entry.Id_Pelunasan; // Gunakan entry.Id_Pelunasan sebagai nilai opsi
                option.innerText = entry.Id_Pelunasan + "|" + entry.Nilai_Pelunasan; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
                noPelunasanSelect.appendChild(option);
            });

            noPelunasanSelect.addEventListener("change", function (event) {
                event.preventDefault();
                const selectedOption = noPelunasanSelect.options[noPelunasanSelect.selectedIndex];
                if (selectedOption) {
                    const selectedValue = selectedOption.textContent; // Atau selectedOption.innerText
                    const bagiansatu = selectedValue.split(/[-|]/);
                    const idpen = bagiansatu[0];
                    noPelunasan.value = idpen;
                }
                fetch("/LihatHeaderPelunasanCashAdvance/" + noPelunasan.value)
                .then((response) => response.json())
                .then((options) => {
                    console.log(options);

                    options.forEach((option) => {
                        //Ambil nilai Tgl_Order dari setiap objek data
                        const tglInput = option.Tgl_Pelunasan;
                        const [tanggal, waktu] = tglInput.split(" ");
                        option.Tgl_Pelunasan = tanggal;
                        tanggalInput.value = tanggal;
                    });

                    tanggalInput.value = options[0].Tgl_Pelunasan;
                    idJenisPembayaran.value = options[0].Id_Jenis_Bayar;
                    let JP = idJenisPembayaran.value;
                    let opt2 = jenisPembayaranSelect.options;
                    for (let i = 0; i < opt2.length; i++) {
                        if (opt2[i].value == JP) {
                            jenisPembayaranSelect.selectedIndex = i;
                            break;
                        }
                    };

                    idMataUang.value = options[0].Id_MataUang;
                    let MU = idMataUang.value;
                    let opt = mataUangSelect.options;
                    for (let i = 0; i < opt.length; i++) {
                        if (opt[i].value == MU) {
                            mataUangSelect.selectedIndex = i;
                            break;
                        }
                    };
                    nilaiPelunasan.value = options[0].Nilai_Pelunasan;
                    idBKM.value = options[0].ID_BKM;
                    sisaPelunasan.value = options[0].SaldoPelunasan;
                });
                fetch("/LihatDetailPelunasanCashAdvance/" + noPelunasan.value)
                .then((response) => response.json())
                .then((options) => {
                    console.log(options);
                })
            });

        })
})
