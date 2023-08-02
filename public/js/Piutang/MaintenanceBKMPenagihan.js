let tahun = document.getElementById('tahun');
let bulan = document.getElementById('bulan');
let tabelDataPelunasan = document.getElementById('tabelDataPelunasan');
let pilihBank = document.getElementById('pilihBank');

let btnOK = document.getElementById("btnOK");
let btnPilihBank = document.getElementById("btnPilihBank");

btnPilihBank.addEventListener('click', function (event) {
    event.preventDefault();
    validatePilihBank();
    let tabelDataPelunasan = document.getElementById('tabelDataPelunasan');
    let rows = tabelDataPelunasan.getElementsByTagName("tr");
    for (let i = 1; i < rows.length; i++) {
        let cells = rows[i].cells;
        let checkbox = cells[0].getElementsByTagName("input")[0]; // get the checkbox in the current row
        //console.log(checkbox);
        if (checkbox.checked) {
            // check if the checkbox is checked
            let Tgl_Pelunasan = checkbox.value; // get the value of the "Nomor SP" column
            console.log(Tgl_Pelunasan);
            let input = document.createElement("input"); // create a new input element
            input.type = "hidden"; // set the input type to 'hidden'
            input.name = "Tgl_Pelunasans[]"; // set the input name to 'nomorSPs[]'
            input.value = Tgl_Pelunasan; // set the input value to the current nomorSP value
            formPilihBank.appendChild(input); // append the input element to the form
            // console.log(form_submitSelected);
        }
    }
    formPilihBank.submit();
})

btnOK.addEventListener('click', function (event) {
    event.preventDefault();
    clickOK();
        fetch("/detailtabelpenagihan/" + bulan.value +"/"+ tahun.value)
            .then((response) => response.json())
            .then((options) => {
                console.log(options);
                let table = $("#tabelDataPelunasan").DataTable({
                    data: options,
                    columns: [
                        {
                            title: "Tgl Pelunasan",
                            data: "Tgl_Pelunasan",
                            render: function (data) {
                                return `<input type="checkbox" name="divisiCheckbox" value="${data}" /> ${data}`;
                            },
                        },
                        // { title: "Tgl Pelunasan", data: "Tgl_Pelunasan" },
                        { title: "Id. Pelunasan", data: "Id_Pelunasan" },
                        { title: "Id. Bank", data: "Id_bank" },
                        { title: "Jenis Pembayaran", data: "Jenis_Pembayaran" },
                        { title: "Mata Uang", data: "Nama_MataUang" },
                        { title: "Total Pelunasan", data: "Nilai_Pelunasan" },
                        { title: "No. Bukti", data: "No_Bukti" },
                        { title: "Tgl Pembuatan", data: "No_Bukti" },
                    ],
                });
                console.log(table.rows(0).data());
            });
        });

function clickOK() {
    let bulanValue = bulan.value;
    let tahunValue = tahun.value;

    // Cek apakah bulan dan tahun sudah diisi
    if (bulanValue.trim() === '' || tahunValue.trim() === '') {
        alert('Harap isi bulan dan tahun terlebih dahulu!');
        return;
    }
}

function validatePilihBank() {
    const checkedRows = document.querySelectorAll('input[name="divisiCheckbox"]:checked');
    if (checkedRows.length === 0) {
        alert('Pilih 1 Data Pelunasan!');
        return;
    } else {
        $('#pilihBank').modal('show');
    }
    const modal = document.getElementById('pilihBankModal');
    modal.style.display = 'block';

    // Close the modal when the user clicks outside of it
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    }
};

// $("tabelDataPelunasan tbody").off("click", "input[type=checkbox]");
// $("tabelDataPelunasan tbody").on("click", "input[type=checkbox]", function () {
//     if ($(this).prop("checked")) {

//     }
// });

