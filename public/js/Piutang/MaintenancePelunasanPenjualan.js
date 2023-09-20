let tanggalInput = document.getElementById('tanggalInput');
let namaCustomerSelect = document.getElementById('namaCustomerSelect');
let noPelunasanSelect = document.getElementById('noPelunasanSelect');
let jenisPembayaranSelect = document.getElementById('jenisPembayaranSelect');
let mataUangSelect = document.getElementById('mataUangSelect');
let informasiBankSelect = document.getElementById('informasiBankSelect');
let nilaiMasukKas = document.getElementById('nilaiMasukKas');
let buktiPelunasan = document.getElementById('buktiPelunasan');
// let tabelPelunasanPenjualan = document.getElementById('tabelPelunasanPenjualan');
let totalPelunasan = document.getElementById('totalPelunasan');
let nilaiPiutang = document.getElementById('nilaiPiutang');
let totalBiaya = document.getElementById('totalBiaya');
let kurangLebih = document.getElementById('kurangLebih');
let tabelPelunasanPenjualan = $('#tabelPelunasanPenjualan').DataTable();

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
let btnSimpanModal = document.getElementById('btnSimpanModal');

//HIDDEN
let idCustomer = document.getElementById('idCustomer');
let idJenisCustomer = document.getElementById('idJenisCustomer');
let idJenisPembayaran = document.getElementById('idJenisPembayaran');
let idMataUang = document.getElementById('idMataUang');
let idReferensi = document.getElementById('idReferensi');
let cust;
let noPen = document.getElementById('noPen');
let no_Pen = document.getElementById('no_Pen');
let noPen1 = document.getElementById('noPen1');
let no_Pen1 = document.getElementById('no_Pen1');

//MODAL
let totalKembalian = 0;
let noPenagihan = document.getElementById('noPenagihan');
let nilaiPenagihan = document.getElementById('nilaiPenagihan');
let mataUangPenagihan = document.getElementById('mataUangPenagihan');
let nilaiKurs = document.getElementById('nilaiKurs');
let terbayar = document.getElementById('terbayar');
let terbayarRupiah = document.getElementById('terbayarRupiah');
let pelunasanCurrency = document.getElementById('pelunasanCurrency');
let pelunasanRupiah = document.getElementById('pelunasanRupiah');
let jumlahYangDibayar = document.getElementById('jumlahYangDibayar');
let sisa = document.getElementById('sisa');
let sisaRupiah = document.getElementById('sisaRupiah');
let kodePerkiraanSelect = document.getElementById('kodePerkiraanSelect');
let idKodePerkiraan = document.getElementById('idKodePerkiraan');
let nilaiBiaya = document.getElementById('nilaiBiaya');
let nilaiKurangLebih = document.getElementById('nilaiKurangLebih');
let noPenagihan1 = document.getElementById('noPenagihan1');
let lunas = document.getElementById('lunas');

let matauang;
let Z = 0;

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

// function LihatDetailPelunasan() {
//     fetch("/getListPenagihanSJ/" + idCustomer.value)
//         .then((response) => response.json())
//         .then((options) => {
//             console.log(options);
//     })
// }


// Fungsi untuk menangani perubahan pada tombol radio
function handleRadioChange() {
    var selectedValue = document.querySelector('input[name="radiogrup1"]:checked').value;
    kodePerkiraanSelect.removeAttribute("readonly", true);
    jumlahYangDibayar.removeAttribute("readonly", true);
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

        // totalKembalian = options[0].

        noPenagihan.addEventListener("change", function (event) {
            event.preventDefault();
            const selectedOption = noPenagihan.options[noPenagihan.selectedIndex];
            if (selectedOption) {
                const selectedValue = selectedOption.textContent;
                const penagihan = selectedValue.split("|")[0];
                noPen.value = penagihan;

                no_Pen.value = noPen.value.replace(/\//g, '.');

                fetch("/getListPelunasanTagihan/" + no_Pen.value)
                .then((response) => response.json())
                .then((options) => {
                    console.log(options);

                    nilaiPenagihan.value = options[0].Nilai_Penagihan;
                    nilaiPenagihan.value = nilaiPenagihan.value - totalKembalian
                    mataUangPenagihan.value = options[0].Nama_MataUang;
                    nilaiKurs.value = options[0].NilaiKurs;

                    if (options[0].Tot_Pelunasan_Rupiah == null) {
                        terbayarRupiah.value = 0
                        terbayar.value = 0
                    } else {
                        var rows = tabelPelunasanPenjualan.getElementsByTagName('tr');
                        if (rows.length > 0) {
                            var rowCount = rows.length;
                            if (condition) {

                            }else {
                                terbayarRupiah.value = options[0].Tot_Pelunasan_Rupiah - pelunasanRupiah.value;
                                terbayar.value = options[0].Tot_Nilai_Pelunasan - pelunasanCurrency.value;
                            }
                        } else {
                            terbayarRupiah.value = options[0].Tot_Pelunasan_Rupiah;
                            terbayar.value = options[0].Tot_Nilai_Pelunasan;
                        }

                        if (jumlahYangDibayar.value == 0) {
                            jumlahYangDibayar.value = nilaiPenagihan.value - terbayar.value;
                        }
                        sisa.value = nilaiPenagihan.value - terbayar.value;
                        sisaRupiah.value = (nilaiPenagihan.value * nilaiKurs.value) - (terbayar.value - nilaiKurs.value)
                        sisa.value = parseFloat(sisa.value).toFixed(2).replace(/\d(?=(\d{10})+\.)/g, '$&,');
                        sisaRupiah.value = parseFloat(sisaRupiah.value).toFixed(2).replace(/\d(?=(\d{10})+\.)/g, '$&,');
                    }
                    jumlahYangDibayar.focus();

                    jlhyangdibayar();
                })
            }
            pelunasanCurrency.addEventListener("keypress", function(event) {
                if (event.key == "Enter") {
                    event.preventDefault();
                    kodePerkiraanSelect.focus();
                }
            });
        });

    } else if (selectedValue === "2") {
        console.log("Anda memilih Biaya Ditanggung");
    } else if (selectedValue === "3") {
        console.log("Anda memilih Kurang/Lebih");
    }
};

// Tambahkan event listener untuk setiap tombol radio
var radioButtons = document.querySelectorAll('input[name="radiogrup1"]');
radioButtons.forEach(function (radioButton) {
    radioButton.addEventListener('change', handleRadioChange);
});

function jlhyangdibayar() {
    jumlahYangDibayar.addEventListener("keypress", function(event) {
        if (event.key == "Enter") {
            event.preventDefault();
            matauang = mataUangPenagihan.value.trim().toUpperCase();
            if (matauang !== "RUPIAH" && idMataUang.value == 1) {
                pelunasanCurrency.value = jumlahYangDibayar.value / nilaiKurs.value;
                pelunasanRupiah.value = jumlahYangDibayar.value;
            } else {
                pelunasanCurrency.value = jumlahYangDibayar.value * nilaiKurs.value;
                pelunasanRupiah.value = pelunasanCurrency.value;
            }
        } else {
            if (idMataUang != 1) {
                pelunasanRupiah.value = jumlahYangDibayar.value * nilaiKurs.value;
            } else {
                pelunasanRupiah.value = jumlahYangDibayar.value;
            }
            pelunasanCurrency.value = jumlahYangDibayar.value;
        }
        pelunasanCurrency.focus();
    });
};

fetch("/getKdPerkiraan/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        kodePerkiraanSelect.innerHTML="";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih No. Penagihan";
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
    const selectedOption = kodePerkiraanSelect.options[kodePerkiraanSelect.selectedIndex];
    if (selectedOption) {
        const selectedValue = selectedOption.textContent;
        const penagihan = selectedValue.split("|")[0];
        idKodePerkiraan.value = penagihan;
    }
    btnSimpanModal.focus();
});

btnSimpanModal.addEventListener('click', function(event) {
    event.preventDefault();
    var selectedValue = document.querySelector('input[name="radiogrup1"]:checked').value;
    console.log("Harusnya jalan memilih Pelunasan", selectedValue);
    if (selectedValue != "1" && selectedValue != "2" && selectedValue != "3") {
        alert("Tidak Ada Yang DiSimpan !!");
    }

    else if (selectedValue === "1" && jumlahYangDibayar.value <= 0) {
        alert("Nilai Pelunasan Harus Diisi");
    } else if (selectedValue === "2" && nilaiBiaya.value <= 0) {
        alert("Nilai Biaya Harus Diisi");
    } else if (selectedValue === "3" && nilaiKurangLebih.value == 0) {
        alert("Nilai Kurang/Lebih Harus Diisi");
    } else if (selectedValue === "3" && nilaiKurangLebih.value < 0 && noPenagihan1.selectedIndex == 0) {
        alert("Nilai Kurang, Nomor Tagihan Harus Diisi");
    }

    if ((lunas.value == "" || lunas.value == " " || lunas.value.toUpperCase() != "Y" || lunas.value.toUpperCase() != "N")
    && selectedValue === 1 || (idJenisPembayaran.value == 2 || idJenisPembayaran.value == 3) || lunas.value.toUpperCase() == "Y") {
        alert("Salah Input Kolom Lunas");
        lunas.focus();
    };

    const rowCount = tabelPelunasanPenjualan.rows().count();
    console.log("Length of tabelPelunasanPenjualan:", rowCount);
    // tabelPelunasanPenjualan.rows().every(function (index, element) {
    //     // Mendapatkan data pada kolom yang sesuai (misalnya, kolom dengan indeks 0)
    //     var rowData = this.data();
    //     console.log("masuk");
    //     // Lakukan pengecekan
    //     if (rowData[0] !== "" && rowData[0] === noPen.value && Z === 0) {
    //         alert("Data sudah diinputkan");
    //         // Fokus ke elemen yang diinginkan (misalnya, tombol CmdPenagihan)
    //         noPenagihan.focus();
    //         return false; // Keluar dari iterasi
    //     }
    // });

    if (rowCount == 0) {
        console.log("masuk Z == 0");
        totalPelunasan.value = totalPelunasan.value + nilaiPiutang.value;
        totalBiaya.value = totalBiaya.value + nilaiBiaya.value;
        kurangLebih.value = kurangLebih.value + nilaiKurangLebih.value;

        tabelPelunasanPenjualan.row.add([
            noPen.value,
            jumlahYangDibayar.value,
            nilaiBiaya.value,
            lunas.value.toUpperCase(),
            "",
            pelunasanRupiah.value,
            pelunasanRupiah.value,
            idMataUang.value,
            nilaiKurangLebih.value,
            idKodePerkiraan.value,
            noPen1.value
        ]).draw().node();
    }
    $('#modalLihatPenagihan').modal('hide');
})




