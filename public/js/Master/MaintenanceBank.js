let idBank = document.getElementById("idBank");
let namaBankselect = document.getElementById("namaBankselect");
let jenisBank = document.getElementById("jenisBank");
let statusAktif = document.getElementById("statusAktif");
let kodePerkiraan = document.getElementById("kodePerkiraan");
let noRekening = document.getElementById("noRekening");
let saldoBank = document.getElementById("saldoBank");
let alamat = document.getElementById("alamat");
let kota = document.getElementById("kota");
let telp = document.getElementById("telp");
let person = document.getElementById("person");
let hp = document.getElementById("hp");
let isiNamaBank = document.getElementById("isiNamaBank");

let btnIsi = document.getElementById("btnIsi");
let btnKoreksi = document.getElementById("btnKoreksi");
let btnHapus = document.getElementById("btnHapus");
let btnProses = document.getElementById("btnProses");
let btnKeluar = document.getElementById("btnKeluar");

btnIsi.addEventListener('click', function(event) {
    event.preventDefault();
})
function clickIsi() {
    namaBankselect.style.display="none";
    isiNamaBank.style.display="block";
    btnIsi.disabled=true;
    btnKoreksi.disabled=true;
    btnHapus.disabled=true;
    btnProses.disabled=false;
}

namaBankselect.addEventListener("change",function(){
    if (this.selectedIndex !== 0) {
        this.classList.add("input-error");
        this.setCustomValidity("Tekan Enter!");
        this.reportValidity();
    }
});

namaBankselect.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        fetch("/detailbank/" + namaBankselect.value)
            .then((response) => response.json())
            .then((options) => {
                idBank.value = namaBankselect.value;
                console.log(options);
                saldoBank.value = options[0].SaldoBank;
                noRekening.value = options[0].No_Rekening;
                alamat.value = options[0].Alamat;
                kota.value = options[0].Kota;
                person.value = options[0].Nama_Person;
                telp.value = options[0].No_Telp;
                hp.value = options[0].No_HP;

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
            });
    }
});