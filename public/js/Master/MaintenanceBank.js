let idBank = document.getElementById("idBank");
let namaBankselect = document.getElementById("namaBankselect");
let jenisBankSelect = document.getElementById("jenisBankSelect");
let statusAktif = document.getElementById("statusAktif");
let kodePerkiraanSelect = document.getElementById("kodePerkiraanSelect");
let noRekening = document.getElementById("noRekening");
let saldoBank = document.getElementById("saldoBank");
let alamat = document.getElementById("alamat");
let kota = document.getElementById("kota");
let telp = document.getElementById("telp");
let person = document.getElementById("person");
let hp = document.getElementById("hp");
let isiNamaBank = document.getElementById("isiNamaBank");
let kodePerkiraan = document.getElementById("kodePerkiraan");
let ketKodePerkiraan = document.getElementById("ketKodePerkiraan");
let proses;
var hiddenInput;

let btnIsi = document.getElementById("btnIsi");
let btnKoreksi = document.getElementById("btnKoreksi");
let btnHapus = document.getElementById("btnHapus");
let btnProses = document.getElementById("btnProses");
let btnKeluar = document.getElementById("btnKeluar");
let btnBatal = document.getElementById("btnBatal");

let formkoreksi = document.getElementById("formkoreksi");
let methodform = document.getElementById("methodkoreksi");

btnIsi.addEventListener('click', function (event) {
    event.preventDefault();
})

btnBatal.addEventListener('click', function (event) {
    event.preventDefault();
    // clickBatal();
    idBank.value = "";
    jenisBankSelect.checked = false;
    namaBankselect.selectedIndex = 0;
    statusAktif.checked = false;
    kodePerkiraanSelect.value = "";
    noRekening.value = "";
    saldoBank.value = "";
    alamat.value = "";
    kota.value = "";
    telp.value = "";
    person.value = "";
    hp.value = "";
    isiNamaBank.value = "";
    ketKodePerkiraan.value = "";
    kodePerkiraan.value ="";
});

btnProses.addEventListener('click', function (event) {
    event.preventDefault();
})

btnKoreksi.addEventListener('click', function (event) {
    event.preventDefault();
});

btnHapus.addEventListener('click', function(event) {
    event.preventDefault();
})

function clickIsi() {
    namaBankselect.style.display = "none";
    isiNamaBank.style.display = "block";
    btnIsi.disabled = true;
    btnKoreksi.disabled = true;
    btnHapus.disabled = true;
    btnProses.disabled = false;
    btnKeluar.style.display = "none";
    btnBatal.style.display = "block";
    proses = 1;
}

function clickBatal() {
    namaBankselect.style.display = "block";
    isiNamaBank.style.display = "none";
    btnIsi.disabled = false;
    btnKoreksi.disabled = false;
    btnHapus.disabled = false;
    btnProses.disabled = true;
    btnBatal.style.display = "none";
}

function clickKoreksi() {
    btnIsi.disabled = true
    btnKoreksi.disabled = true;
    btnHapus.disabled = true;
    btnProses.disabled = false;
    btnBatal.style.display = "block";
    proses = 2;
}

function clickHapus() {
    btnIsi.disabled = true
    btnKoreksi.disabled = true;
    btnHapus.disabled = true;
    btnProses.disabled = false;
    btnBatal.style.display = "block";
    proses = 3;
}

namaBankselect.addEventListener("change", function () {
    if (this.selectedIndex !== 0) {
        this.classList.add("input-error");
        this.setCustomValidity("Tekan Enter!");
        this.reportValidity();
    }
});

kodePerkiraanSelect.addEventListener("change", function () {
    if (this.selectedIndex !== 0) {
        this.classList.add("input-error");
        this.setCustomValidity("Tekan Enter!");
        this.reportValidity();
    }
});

kodePerkiraanSelect.addEventListener("keypress", function (event) {
    fetch("/detailkodeperkiraan/" + kodePerkiraanSelect.value)
        .then((response) => response.json())
        .then((kodePerkiraanOptions) => {
            // Cari data yang sesuai dengan kodePerkiraanSelect.value
            var selectedKodePerkiraan = kodePerkiraanOptions.find(option => option.NoKodePerkiraan === kodePerkiraanSelect.value);
            if (selectedKodePerkiraan) {
                ketKodePerkiraan.value = selectedKodePerkiraan.Keterangan;
            } else {
                // Jika tidak ada data yang sesuai, kosongkan nilai kodePerkiraan dan ketKodePerkiraan
                ketKodePerkiraan.value = "";
            }
        });
})

namaBankselect.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        fetch("/detailbank/" + namaBankselect.value)
            .then((response) => response.json())
            .then((options) => {
                hiddenInput = document.createElement("input");
                // Set the type attribute to "hidden"
                hiddenInput.setAttribute("type", "hidden");

                // Set other attributes if needed
                hiddenInput.setAttribute("name", "namaBankselect");
                hiddenInput.setAttribute("value", namaBankselect.options[namaBankselect.selectedIndex].text);
                //console.log(hiddenInput.value);

                idBank.value = namaBankselect.value;
                console.log(options);
                saldoBank.value = options[0].SaldoBank;
                noRekening.value = options[0].No_Rekening;
                alamat.value = options[0].Alamat;
                kota.value = options[0].Kota;
                person.value = options[0].Nama_Person;
                telp.value = options[0].No_Telp;
                hp.value = options[0].No_HP;
                kodePerkiraanSelect.value = options[0].KodePerkiraan;

                // nomor_spSelect.innerHTML =
                //     "<option disabled selected value>-- Pilih Nomor Surat Pesanan --</option>";
                // options.forEach((option) => {
                //     let optionTag = document.createElement("option");
                //     optionTag.value = option.IDSuratPesanan;
                //     optionTag.text =
                //         option.IDSuratPesanan + " | " + option.JnsSuratPesanan;
                //     nomor_spSelect.appendChild(optionTag);
                // });

                var statusAktifCheckbox = document.getElementById("statusAktif");
                if (options[0].Aktif === "Y") {
                    statusAktifCheckbox.checked = true;
                } else {
                    statusAktifCheckbox.checked = false;
                }

                var jenisBankSelect = document.getElementsByName("jenisBankSelect");
                for (var i = 0; i < jenisBankSelect.length; i++) {
                    if (jenisBankSelect[i].value === options[0].Jenis_Bank) {
                        jenisBankSelect[i].checked = true;
                        break;
                    }
                }

                fetch("/detailkodeperkiraan/" + kodePerkiraanSelect.value)
                    .then((response) => response.json())
                    .then((kodePerkiraanOptions) => {
                        // Cari data yang sesuai dengan kodePerkiraanSelect.value
                        var selectedKodePerkiraan = kodePerkiraanOptions.find(option => option.NoKodePerkiraan === kodePerkiraanSelect.value);
                        if (selectedKodePerkiraan) {
                            ketKodePerkiraan.value = selectedKodePerkiraan.Keterangan;
                        } else {
                            // Jika tidak ada data yang sesuai, kosongkan nilai kodePerkiraan dan ketKodePerkiraan
                            ketKodePerkiraan.value = "";
                        }
                    });
            });
    }
});

btnProses.addEventListener ("click", function (event) {
    event.preventDefault();
    if (proses == 1) {
        // console.log("masuk isi");
        formkoreksi.submit();
    } else if (proses == 2) {
        //console.log("masuk korek");
        methodform.value="PUT";
        formkoreksi.action = "/MaintenanceBank/" + idBank.value;
        formkoreksi.append(hiddenInput);
        formkoreksi.submit();
    } else if (proses == 3) {
        methodform.value="DELETE";
        formkoreksi.action = "/MaintenanceBank/" + idBank.value;
        formkoreksi.submit();
    }
});

