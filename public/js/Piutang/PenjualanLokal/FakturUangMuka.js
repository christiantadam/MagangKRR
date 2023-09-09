let tanggal = document.getElementById('tanggal');
let namaCustomerSelect = document.getElementById('namaCustomerSelect');
let noPenagihanSelect = document.getElementById('noPenagihanSelect');
let idCustomer = document.getElementById('idCustomer');
let idJenisCustomer = document.getElementById('idJenisCustomer');
let btnIsi = document.getElementById('btnIsi');
let btnSimpan = document.getElementById('btnSimpan');
let btnKoreksi = document.getElementById('btnKoreksi');
let btnBatal = document.getElementById('btnBatal');

let namacust;

const tanggalInput = new Date();
const formattedDate = tanggalInput.toISOString().substring(0, 10);
tanggal.value = formattedDate;

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
            option.value = entry.IdCust; // Gunakan entry.IdCust sebagai nilai opsi
            option.innerText = entry.IdCust + "|" + entry.NamaCust; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
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

    fetch("/getNoPenagihan/" + idCustomer.value)
    .then((response) => response.json())
    .then((options) => {
        console.log(options);

        noPenagihanSelect.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih No Penagihan";
        noPenagihanSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.IdCust; // Gunakan entry.IdCust sebagai nilai opsi
            option.innerText = entry.Id_Penagihan + "|" + entry.Tgl_Penagihan; // Gunakan entry.IdCust dan entry.NamaCust untuk teks opsi
            noPenagihanSelect.appendChild(option);
        });
    });
});

console.log(idCustomer.value);
//#region ambil no penagihan


// namaCustomerSelect.addEventListener("change", function (event) {
//     event.preventDefault();
//     const selectedOption = namaCustomerSelect.options[namaCustomerSelect.selectedIndex];
//     if (selectedOption) {
//         const selectedValue = selectedOption.textContent; // Atau selectedOption.innerText
//         const bagiansatu = selectedValue.split(/[-|]/);
//         const jenis = bagiansatu[0];
//         const idcust = bagiansatu[1];
//         namacust = bagiansatu[2];
//         idCustomer.value = idcust;
//         idJenisCustomer.value  = jenis;
//     }
// });
//#endregion

btnIsi.addEventListener("click", function (event) {
    event.preventDefault();
    btnSimpan.style.display = "block";
    btnIsi.style.display = "none";
    btnKoreksi.style.display = "none";
    btnBatal.style.display = "block";
});
