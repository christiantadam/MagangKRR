$(document).ready(function () {
    const OptAwal = document.getElementById("OptAwal");
    const OptAkhir = document.getElementById("OptAkhir");
    const resetButton = document.getElementById("resetButton");
    const prosesButton = document.getElementById("prosesButton");
    const keluarButton = document.getElementById("keluarButton");
    var myOption, AwalAkhirMinggu;
    resetButton.addEventListener("click", function () {
        OptAwal.checked = false;
        OptAkhir.checked = false;
    });


    prosesButton.addEventListener("click", function () {
        const Mulai = document.getElementById("TglMulai");
        const Akhir = document.getElementById("TglSelesai");
        const dateDifference =
            Math.abs(new Date(Mulai.value) - new Date(Akhir.value)) /
            (1000 * 60 * 60 * 24);

        if (
            dateDifference < 6 ||
            dateDifference > 6 ||
            (new Date(Akhir.value) - new Date()) / (1000 * 60 * 60 * 24) > 6 ||
            Mulai.value === "" ||
            Akhir.value === ""
        ) {
            alert("Cek Kembali Periode Penggajiannya .... ");
            Mulai.focus();
            return;
        }

        myOption = OptAwal.checked
            ? "Minggu pertama"
            : OptAkhir.checked
            ? "Minggu terakhir"
            : "";

        const confirmation = confirm(
            "Periode : " +
                new Date(Mulai.value).toLocaleDateString() +
                " s/d " +
                new Date(Akhir.value).toLocaleDateString() +
                "\n" +
                "Option  : " +
                myOption
        );

        if (confirmation === false) return;
        if (OptAwal.checked) {
            AwalAkhirMinggu = 0;
        } else if (OptAkhir.checked) {
            AwalAkhirMinggu = 1;
        }
        const data = {
            MinDate: Mulai.value,
            MaxDate: Akhir.value,
            AwalAkhirMinggu: AwalAkhirMinggu,
        };
        console.log(data);

        const formContainer = document.getElementById("form-container");
        const form = document.createElement("form");
        form.setAttribute("action", "EstimasiGaji/{AwalAkhirMinggu}");
        form.setAttribute("method", "POST");

        // Loop through the data object and add hidden input fields to the form
        for (const key in data) {
            const input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", key);
            input.value = data[key]; // Set the value of the input field to the corresponding data
            form.appendChild(input);
        }
        // Create method input with "PUT" Value
        const method = document.createElement("input");
        method.setAttribute("type", "hidden");
        method.setAttribute("name", "_method");
        method.value = "PUT"; // Set the value of the input field to the corresponding data
        form.appendChild(method);

        // Create input with "Update Keluarga" Value
        const ifUpdate = document.createElement("input");
        ifUpdate.setAttribute("type", "hidden");
        ifUpdate.setAttribute("name", "_ifUpdate");
        ifUpdate.value = "Update Keluarga"; // Set the value of the input field to the corresponding data
        form.appendChild(ifUpdate);

        formContainer.appendChild(form);

        // Add CSRF token input field (assuming the csrfToken is properly fetched)
        let csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");
        let csrfInput = document.createElement("input");
        csrfInput.type = "hidden";
        csrfInput.name = "_token";
        csrfInput.value = csrfToken;
        form.appendChild(csrfInput);

        // Wrap form submission in a Promise
        function submitForm() {
            return new Promise((resolve, reject) => {
                form.onsubmit = resolve; // Resolve the Promise when the form is submitted
                form.submit();
            });
        }

        // Call the submitForm function to initiate the form submission
        submitForm()
            .then(() => console.log("Form submitted successfully!"))
            .catch((error) => console.error("Form submission error:", error));
    });
});
