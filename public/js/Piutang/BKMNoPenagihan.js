let idBKM = document.getElementById('idBKM');
let tanggalInput = document.getElementById('tanggalInput');
let namaCustomerSelect = document.getElementById('namaCustomerSelect');
let mataUangSelect = document.getElementById('mataUangSelect');
let idMataUang = document.getElementById('idMataUang');
let kursRupiah = document.getElementById('kursRupiah');

const tanggal = new Date();
const formattedDate = tanggal.toISOString().substring(0, 10);
tanggalInput.value = formattedDate;

namaCustomerSelect.addEventListener('click', function (event) {
    event.preventDefault();
});

// kursRupiahInput.addEventListener('input', function() {
//     const kursValue = parseFloat(kursRupiahInput.value);

//     if (!isNaN(kursValue)) {
//         kursRupiahInput.value = kursValue.toFixed(2);
//     }
// });

fetch("/detailcustomer/")
    .then((response) => response.json())
    .then((options) => {
        console.log(options);
        namaCustomerSelect.innerHTML="";

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
        mataUangSelect.innerHTML="";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.innerText = "Pilih MataUang";
        mataUangSelect.appendChild(defaultOption);

        options.forEach((entry) => {
            const option = document.createElement("option");
            option.value = entry.IdCust;
            option.innerText = entry.Id_MataUang + "|" + entry.Nama_MataUang;
            mataUangSelect.appendChild(option);
        });
})
