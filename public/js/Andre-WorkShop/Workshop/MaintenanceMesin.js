let divisi = document.getElementById("divisi");
let mesin = document.getElementById("mesin");
let iddivisi = document.getElementById("iddivisi");

divisi.addEventListener("change", function () {
    if (this.selectedIndex !== 0) {
        this.classList.add("input-error");
        this.setCustomValidity("Tekan Enter!");
        this.reportValidity();
    }
});
divisi.addEventListener("keypress", function (event) {
    event.preventDefault();
    if (this.selectedIndex !== 0) {
        iddivisi.value = this.value;
        // this.disabled = true;
        this.setCustomValidity(""); // Clear the custom validity message
        this.reportValidity();
        const enterEvent = new KeyboardEvent("keypress", { key: "Enter" });
        iddivisi.dispatchEvent(enterEvent);
    }
});

iddivisi.addEventListener("keypress", function (event) {
    event.preventDefault();
    if (event.key == "Enter") {
        // this.disabled = true;
        //console.log(divisi.value);

        fetch("/getmesin/" + iddivisi.value)
            .then((response) => response.json())
            .then((options) => {
                //console.log(options);
                mesin.innerHTML = "";
                //
                const defaultOption = document.createElement("option");
                defaultOption.disabled = true;
                defaultOption.selected = true;
                defaultOption.innerText = "Pilih Mesin";
                mesin.appendChild(defaultOption);
                //
                options.forEach((entry) => {
                    const option = document.createElement("option");
                    option.value = entry.Nomer;
                    option.innerText = entry.Mesin;
                    mesin.appendChild(option);
                });
            });
    }
});
