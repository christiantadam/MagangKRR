let idDivisi = document.getElementById("idDivisi");
let namaDivisi = document.getElementById("namaDivisi");

idDivisi.addEventListener("change", function () {
    if (this.selectedIndex !== 0) {
        this.classList.add("input-error");
        this.setCustomValidity("Tekan Enter!");
        this.reportValidity();
        // let text = idMataUang.options[idMataUang.selectedIndex].text.split("|");
        // idMataUang.value = text[0];
        // console.log(text);
    }
});

idDivisi.addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        let text = idDivisi.options[idDivisi.selectedIndex].text.split("|");
        namaDivisi.value = text[1];
        // fetch("/detaildivisi/" + idDivisi.value)
        //     .then((response) => response.json())
        //     .then((options) => {
        //         console.log(options);
        //         let text = namaDivisi.options[namaDivisi.selectedIndex].text.split("|");
        //         namaDivisi.value = text[1];
        //     });
    }
});
