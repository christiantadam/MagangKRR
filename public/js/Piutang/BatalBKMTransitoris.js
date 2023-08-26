let bulanTahun = document.getElementById('bulanTahun');
let idBKMSelect = document.getElementById('idBKMSelect');
let kasKecil = document.getElementById('kasKecil');
let kasBesar = document.getElementById('kasBesar');


bulanTahun.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        const value = this.value;
        const isValidFormat = /^(\d{2})\/(\d{2})$/.test(value);

        if (isValidFormat) {
            // Format valid, tambahkan logic tambahan sesuai kebutuhan
            this.classList.remove("is-valid");
            idBKMSelect.focus();
        } else {
            // Format tidak valid, berikan indikator kesalahan
            this.classList.add("is-invalid");
            alert("Format bulan/tahun tidak valid. Gunakan format MM/YY");

        }
    }
});

idBKMSelect.addEventListener("click", function(event) {
    event.preventDefault();
    if (kasBesar.checked) {
        fetch("/getIdBKMBatal4/" + bulanTahun.value)
        .then((response) => response.json())
        .then((options) => {
            console.log(options);

            idBKMSelect.innerHTML="";

            const defaultOption = document.createElement("option");
            defaultOption.disabled = true;
            defaultOption.selected = true;
            defaultOption.innerText = "Id BKM";
            idBKMSelect.appendChild(defaultOption);

            options.forEach((entry) => {
                const option = document.createElement("option");
                option.value = entry.Id_BKM;
                option.innerText = entry.Id_BKM;
                idBKMSelect.appendChild(option);
            });
        });
    } else if (kasKecil.checked) {
        fetch("/getIdBKMBatal3/" + bulanTahun.value )
        .then((response) => response.json())
        .then((options) => {
            console.log(options);

            idBKMSelect.innerHTML="";

            const defaultOption = document.createElement("option");
            defaultOption.disabled = true;
            defaultOption.selected = true;
            defaultOption.innerText = "Id BKM";
            idBKMSelect.appendChild(defaultOption);

            options.forEach((entry) => {
                const option = document.createElement("option");
                option.value = entry.Id_BKM;
                option.innerText = entry.Id_BKM;
                idBKMSelect.appendChild(option);
            });
        });
    }
});






