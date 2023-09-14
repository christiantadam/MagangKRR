let checkbox = document.getElementById("potongUM");
let penagihanPajak = document.getElementById('penagihanPajak');
let tanggalInput = document.getElementById('tanggalInput');
let namaCustomerSelect = document.getElementById('namaCustomerSelect');
let idCustomer = document.getElementById('idCustomer');
let idJenisCustomer = document.getElementById('idJenisCustomer');
let noPenagihanSelect = document.getElementById('noPenagihanSelect');
let jenisCustomer = document.getElementById('jenisCustomer');
let alamat = document.getElementById('alamat');
let nomorSPSelect = document.getElementById('nomorSPSelect');
let noSP = document.getElementById('noSP');
let nomorPO = document.getElementById('nomorPO');
let mataUangSelect = document.getElementById('mataUangSelect');
let nilaiKurs = document.getElementById('nilaiKurs');
let syaratPembayaran = document.getElementById('syaratPembayaran');
let userPenagihSelect = document.getElementById('userPenagihSelect');
let dokumenSelect = document.getElementById('dokumenSelect');
let jenisPajakSelect = document.getElementById('jenisPajakSelect');
let Ppn = document.getElementById('Ppn');
let noPenagihanUM = document.getElementById('noPenagihanUM');

let tabelSuratPesanan = document.getElementById('tabelSuratPesanan');
//BAWAH TABEL
let nilaiSP = document.getElementById('nilaiSP');
let nilaiUM = document.getElementById('nilaiUM');
let discount = document.getElementById('discount');
let nilaiSdhBayar = document.getElementById('nilaiSdhBayar');
let totalPenagihan = document.getElementById('totalPenagihan');
let terbilang = document.getElementById('terbilang');

let btnIsi = document.getElementById('btnIsi');
let btnKoreksi = document.getElementById('btnKoreksi');
let btnHapus = document.getElementById('btnHapus');

const tanggalPenagihan = new Date();
const formattedDate2 = tanggalPenagihan.toISOString().substring(0, 10);
tanggalInput.value = formattedDate2;

const PJ = new Date();
const formattedDate = PJ.toISOString().substring(0, 10);
penagihanPajak.value = formattedDate;


checkbox.addEventListener("change", function(event) {
    event.preventDefault();
    // Jika checkbox dicentang, atur nilai value menjadi 1
    if (this.checked) {
      this.value = "1";
    } else {
      // Jika checkbox tidak dicentang, atur nilai value menjadi 0
      this.value = "0";
    }
  });

btnIsi.addEventListener('click', function(event) {
    event.preventDefault()

    tanggalInput.removeAttribute("readonly");
    penagihanPajak.removeAttribute("readonly");
    namaCustomerSelect.removeAttribute("readonly");
    noPenagihanSelect.removeAttribute("readonly");
    jenisCustomer.removeAttribute("readonly");
    alamat.removeAttribute("readonly");
    nomorSPSelect.removeAttribute("readonly");
    nomorPO.removeAttribute("readonly");
    mataUangSelect.removeAttribute("readonly");
    nilaiKurs.removeAttribute("readonly");
    syaratPembayaran.removeAttribute("readonly");
    userPenagihSelect.removeAttribute("readonly");
    dokumenSelect.removeAttribute("readonly");
    jenisPajakSelect.removeAttribute("readonly");
    Ppn.removeAttribute("readonly");
    noPenagihanUM.removeAttribute("readonly");

    nilaiSP.removeAttribute("readonly");
    nilaiUM.removeAttribute("readonly");
    discount.removeAttribute("readonly");
    nilaiSdhBayar.removeAttribute("readonly");
    totalPenagihan.removeAttribute("readonly");
    terbilang.removeAttribute("readonly");
});

fetch("/getCustomerr/")
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

        lihatCustomer();

        // noPenagihanSelect.removeAttribute("readonly");
        // noPenagihanSelect.focus();
    }

    fetch("/getNoSP/" + idCustomer.value)
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        nomorSPSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih No. SP";
        nomorSPSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.IDSuratPesanan; // Gunakan entry.IdCust sebagai nilai opsi
            option.innerText = entry.IDSuratPesanan; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
            nomorSPSelect.appendChild(option);
        });
    });
    nomorSPSelect.addEventListener("change", function (event) {
        event.preventDefault();
        const selectedOption = nomorSPSelect.options[nomorSPSelect.selectedIndex];
        if (selectedOption) {
            const selectedValue = selectedOption.textContent; // Atau selectedOption.innerText
            noSP.value  = selectedValue.toString();
        }

        fetch("/getLihatPesanan/" + noSP.value)
        .then((response) => response.json())
        .then((options) => {
            console.log(options);
        });

        HitungPesanan();

    })
});

function lihatCustomer() {
    fetch("/getJenisCustomer/" + idJenisCustomer.value)
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        jenisCustomer.value = options[0].NamaJnsCust;
    });

    if (jenisCustomer.value == "NPX") {
        fetch("/getAlamatCust/" + idCustomer.value)
        .then((response) => response.json())
        .then((options) => {
            console.log(options);
            alamat.value = options[0].Alamat + " " + options[0].Kota;
        });
        jenisPajakSelect.setAttribute("readonly", true);
    } else {
        fetch("/getAlamatCust/" + idCustomer.value)
        .then((response) => response.json())
        .then((options) => {
            console.log(options);
            alamat.value = options[0].AlamatNPWP;
        });
        jenisPajakSelect.removeAttribute("readonly");
    }
    nomorSPSelect.focus();
}

function HitungPesanan() {
    var checkboxValue = document.getElementById("potongUM").value;

  // Melakukan pengecekan apakah nilai checkbox adalah 1
  if (checkboxValue === "1") {
    console.log("Nilai checkbox adalah 1");
    //fetch data
  } else {
    console.log("Nilai checkbox bukan 1");
    // Tambahkan perintah lain di sini
  }

}



