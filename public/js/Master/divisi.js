$(document).ready(function () {
    $("#table_Divisi").DataTable({
        order: [[0, "asc"]],
    });

    // Function to remove the backdrop
    function removeBackdrop() {
        $(".modal-backdrop").remove();
    }

    // Function to show the modal
    function showModalDivisi() {
        $("#modalKdPeg").addClass("show");
        $("#modalKdPeg").css("display", "block");
        $("body").addClass("modal-open");
    }

    // Function to hide the modal
    function hideModalDivisi() {
        $("#modalKdPeg").removeClass("show");
        $("#modalKdPeg").css("display", "none");
        $("body").removeClass("modal-open");
        removeBackdrop();
    }

    function showModalPegawai() {
        $("#modalPeg").addClass("show");
        $("#modalPeg").css("display", "block");
        $("body").addClass("modal-open");
    }

    // Function to hide the modal
    function hideModalPegawai() {
        $("#modalPeg").removeClass("show");
        $("#modalPeg").css("display", "none");
        $("body").removeClass("modal-open");
        removeBackdrop();
    }
    $("#btnSimpan").on("click", function () {
        simpanNilaiOpsi();
        // You can also call simpanData() here if needed.
    });

    function showModalManager() {
        $("#modalManager").addClass("show");
        $("#modalManager").css("display", "block");
        $("body").addClass("modal-open");
    }

    // Function to hide the modal
    function hideModalManager() {
        $("#modalManager").removeClass("show");
        $("#modalManager").css("display", "none");
        $("body").removeClass("modal-open");
        removeBackdrop();
    }
    function simpanNilaiOpsi() {
        const radioPerpanjang = document.getElementById("perpanjang");
        const radioResign = document.getElementById("resign");
        const kontrak1 = document.getElementById("kontrak1");
        const kontrak2 = document.getElementById("kontrak2");
        const kontrak3 = document.getElementById("kontrak3");
        const kontrak4 = document.getElementById("kontrak4");
        const kontrak5 = document.getElementById("kontrak5");
        const kontrak6 = document.getElementById("kontrak6");
        const Id_Div = document.getElementById("Id_Div").value;
        const Id_Peg_Lama = document.getElementById("Id_Peg_Lama").value;
        const Shift = document.getElementById("Shift").value;
        const Id_Div_Baru = document.getElementById("Id_Div_Baru").value;
        const Kd_Peg_Baru = document.getElementById("Kd_Peg_Baru").value;
        const TglMasuk = document.getElementById("TglMasuk").value;
        const TglMulai = document.getElementById("TglMulai").value;
        const TglSelesai = document.getElementById("TglSelesai").value;
        const TglKeluar = document.getElementById("TglKeluar").value;
        let opsiKontrak;
        if (kontrak1.checked) {
            opsiKontrak = kontrak1.value;
        } else if (kontrak2.checked) {
            opsiKontrak = kontrak2.value;
        } else if (kontrak3.checked) {
            opsiKontrak = kontrak3.value;
        } else if (kontrak4.checked) {
            opsiKontrak = kontrak4.value;
        } else if (kontrak5.checked) {
            opsiKontrak = kontrak5.value;
        } else if (kontrak6.checked) {
            opsiKontrak = kontrak6.value;
        }

        let opsiKeluar;
        if (radioPerpanjang.checked) {
            opsiKeluar = radioPerpanjang.value;
        } else if (radioResign.checked) {
            opsiKeluar = radioResign.value;
        }
        // Now you can use these variables as needed.
        // For example, you can log them to the console to see their values:
        const data = {
            Id_Div_Baru: Id_Div_Baru,
            Id_Div: Id_Div,
            Id_Peg_Lama: Id_Peg_Lama,
            Kd_Peg_Baru: Kd_Peg_Baru,
            TglKeluar: TglKeluar,
            awalKontrak: TglMulai,
            akhirKontrak: TglSelesai,
            Shift: Shift,
            ketlama: opsiKeluar,
            ketbaru: opsiKontrak,
            TglMasuk: TglMasuk,
        };
        console.log(data);
        console.log(data);

const formContainer = document.getElementById("form-container");
const form = document.createElement("form");
form.setAttribute("action", "updateKontrak");
form.setAttribute("method", "POST");

// Loop through the data object and add hidden input fields to the form
for (const key in data) {
  const input = document.createElement("input");
  input.setAttribute("type", "hidden");
  input.setAttribute("name", key);
  input.value = data[key]; // Set the value of the input field to the corresponding data
  form.appendChild(input);
}

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
        // const csrfToken = $('meta[name="csrf-token"]').attr("content");
        //  $.ajax({
        //     type: 'POST',
        //     url: 'updateKontrak', // Replace this with the actual route to your controller method
        //     data: data,
        //     headers: {
        //         'X-CSRF-TOKEN': csrfToken,
        //     },
        //     success: function(response) {
        //         // Handle the response from the server if needed
        //         console.log(response);
        //     },
        //     error: function(error) {
        //         // Handle any errors that occur during the AJAX request
        //         console.error('AJAX request error:', error);
        //     }
        // });
        // console.log(data);
    }

    function simpanData() {
        // Here you can add the code to send the extracted data to the server or perform any other action.
        // You can access the variables extracted in the simpanNilaiOpsi() function here and process them further.
        // For example:
        // const formData = {
        //     Id_Div: document.getElementById('Id_Div').value,
        //     Id_Peg_Lama: document.getElementById('Id_Peg_Lama').value,
        //     Shift: document.getElementById('Shift').value,
        //     ...
        // };
        // Now you can send this formData to the server using AJAX or perform other actions.
    }

    // Attach click event to DataTable rows
    $("#table_Divisi tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        var rowData = $("#table_Divisi").DataTable().row(this).data();
        // Populate the input fields with the data
        $("#Id_Div").val(rowData[0]);
        $("#Nama_Div").val(rowData[1]);
        // fetch("/getPegawai/" + rowData[0])
        //     .then((response) => {
        //         if (!response.ok) {
        //             throw new Error("Network response was not ok");
        //         }
        //         return response.json(); // Assuming the response is in JSON format
        //     })
        //     .then((data) => {
        //         // Handle the data retrieved from the server (data should be an object or an array)

        //         // Clear the existing table rows
        //         $("#table_Peg_Lama").DataTable().clear().draw();

        //         // Loop through the data and create table rows
        //         data.forEach((item) => {
        //             var row = [item.kd_pegawai, item.nama_peg];
        //             $("#table_Peg_Lama").DataTable().row.add(row);
        //         });

        //         // Redraw the table to show the changes
        //         $("#table_Peg_Lama").DataTable().draw();
        //     })
        //     .catch((error) => {
        //         console.error("Error:", error);
        //     });
        // var idDivValue = rowData[0];
        // submitFormWithIdDiv(idDivValue);
        // Hide the modal immediately after populating the data
        hideModalDivisi();
    });
    $("#table_Peg_Lama").DataTable({
        order: [[0, "asc"]],
    });

    // Attach click event to table rows
    $("#table_Peg_Lama tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        console.log($("#table_Peg_Lama").DataTable().row(this));
        var rowData = $("#table_Peg_Lama").DataTable().row(this).data();
        console.log(rowData);
        // Populate the input fields with the data
        $("#Nama_Posisi").val(rowData[0]);
        $("#Kd_Posisi").val(rowData[1]);

        // Hide the modal immediately after populating the data
        hideModalPegawai();
    });
    $("#table_Divisi_Baru").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Divisi_Baru tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#table_Divisi_Baru").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#Id_Div_Baru").val(rowData[0]);
        $("#Nama_Div_Baru").val(rowData[1]);

        // Hide the modal immediately after populating the data
        hideModalDivisiBaru();
    });
    function showModalDivisiBaru() {
        $("#modalDivisiBaru").addClass("show");
        $("#modalDivisiBaru").css("display", "block");
        $("body").addClass("modal-open");
    }

    // Function to hide the modal
    function hideModalDivisiBaru() {
        $("#modalDivisiBaru").removeClass("show");
        $("#modalDivisiBaru").css("display", "none");
        $("body").removeClass("modal-open");
        removeBackdrop();
    }

    $("#table_Shift").DataTable({
        order: [[0, "asc"]],
    });
    $("#table_Shift tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#table_Shift").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#Shift").val(rowData[0]);
        $("#Jam").val(rowData[1]);

        // Hide the modal immediately after populating the data
        hideModalShift();
    });
    function showModalShift() {
        $("#modalShift").addClass("show");
        $("#modalShift").css("display", "block");
        $("body").addClass("modal-open");
    }

    // Function to hide the modal
    function hideModalShift() {
        $("#modalShift").removeClass("show");
        $("#modalShift").css("display", "none");
        $("body").removeClass("modal-open");
        removeBackdrop();
    }

    $("#table_Manager").DataTable({
        order: [[0, "asc"]],
    });

    // Attach click event to table rows
    $("#table_Manager tbody").on("click", "tr", function () {
        // Get the data from the clicked row
        console.log($("#table_Manager").DataTable().row(this));
        var rowData = $("#table_Manager").DataTable().row(this).data();
        console.log(rowData);
        // Populate the input fields with the data
        $("#Nama_Manager").val(rowData[0]);
        $("#KD_Manager").val(rowData[1]);

        // Hide the modal immediately after populating the data
        hideModalManager();
    });

    $("#tabelDivisi").DataTable({
        order: [[0, "asc"]],
    });
    // Attach click event to the button to show the modal
    $("#divisiButton").on("click", function () {
        showModalDivisi();
    });

    // Attach hidden event to the modal
    $("#modalKdPeg").on("hidden.bs.modal", function () {
        removeBackdrop();
    });
});
