$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $("#TableDivisiPengiriman").DataTable({
        order: [[0, "desc"]],
        select: {
            style: "single",
        },
    });

    $("#TableDivisiPenerima").DataTable({
        order: [[0, "desc"]],
        select: {
            style: "single",
        },
    });

    $("#TableObjek").DataTable({
        order: [[0, "desc"]],
        select: {
            style: "single",
        },
    });

    $("#TableABM").DataTable({
        order: [[0, "desc"]],
        select: {
            style: "single",
        },
    });

    $("#TableADS").DataTable({
        order: [[0, "desc"]],
        select: {
            style: "single",
        },
    });

    $("#TableADSMOJO").DataTable({
        order: [[0, "desc"]],
        select: {
            style: "single",
        },
    });

    $("#TableDivisiPengiriman tbody").on("click", "tr", function () {
        // Get the data from the clicked row

        var rowData = $("#TableDivisiPengiriman").DataTable().row(this).data();

        // Populate the input fields with the data
        $("#IdDivisi_pengiriman").val(rowData[0]);
        $("#Divisi_pengiriman").val(rowData[1]);

    });

    $('#TableDivisiPenerima tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableDivisiPenerima').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdDivisi_penerima').val(rowData[0]);
        $('#Divisi_penerima').val(rowData[1]);

    });

    $('#TableObjek tbody').on('click', 'tr', function () {
        // Get the data from the clicked row

        var rowData = $('#TableObjek').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#IdObjek').val(rowData[0]);
        $('#Objek').val(rowData[1]);

    });

    // Function to hide extend cards
    // function hideExtendCards() {
    //     var extendCards = document.querySelectorAll(".extend-card");
    //     extendCards.forEach(function (card) {
    //         card.style.display = "none";
    //     });
    // }

    // Call the function to hide extend cards
    // hideExtendCards();

    document.getElementById('btnPrint').addEventListener('click', function() {
        var strReportPath = "";
        var parameter = 1;
        document.getElementById("ABM").classList.add("hidden")
        document.getElementById("ADS").classList.add("hidden")
        document.getElementById("ADSMOJO").classList.add("hidden")
        document.getElementById("JBB").classList.add("hidden")
        document.getElementById("JBM").classList.add("hidden")
        document.getElementById("JBM2").classList.add("hidden")
        document.getElementById("JBR").classList.add("hidden")
        document.getElementById("LMT").classList.add("hidden")
        document.getElementById("LMT2").classList.add("hidden")
        document.getElementById("CIR").classList.add("hidden")
        document.getElementById("CIR1").classList.add("hidden")
        document.getElementById("CLM").classList.add("hidden")
        document.getElementById("CLM1").classList.add("hidden")
        document.getElementById("MCL").classList.add("hidden")
        document.getElementById("MCL1").classList.add("hidden")

        console.log(document.getElementById('IdObjek').value);
        console.log(document.getElementById('IdDivisi_penerima').value);
        if (document.getElementById('IdObjek').value === "122" && document.getElementById('IdDivisi_penerima').value === "INV") {
            document.getElementById("JBB").classList.remove("hidden")
            strReportPath = "jbb.rpt";
            parameter = 1;
        } else if (document.getElementById('IdObjek').value === "174" && document.getElementById('IdDivisi_penerima').value === "INV") {
            document.getElementById("ADS").classList.remove("hidden")
            strReportPath = "ads.rpt";
            parameter = 1;
        } else if (document.getElementById('IdObjek').value === "222" && document.getElementById('IdDivisi_penerima').value === "MWH") {
            document.getElementById("ADSMOJO").classList.remove("hidden")
            strReportPath = "adsMojo.rpt";
            parameter = 1;
        } else if (document.getElementById('IdObjek').value === "185" && document.getElementById('IdDivisi_penerima').value === "INV") {
            document.getElementById("JBM2").classList.remove("hidden")
            strReportPath = "jbm2.rpt";
            parameter = 1;
        } else if (document.getElementById('IdObjek').value === "185" && document.getElementById('IdDivisi_penerima').value === "MWH") {
            document.getElementById("JBM2").classList.remove("hidden")
            strReportPath = "jbm2.rpt";
            parameter = 1;
        } else if (document.getElementById('IdObjek').value === "186" && document.getElementById('IdDivisi_penerima').value === "INV") {
            document.getElementById("JBR").classList.remove("hidden")
            strReportPath = "jbr.rpt";
            parameter = 1;
        } else if (document.getElementById('IdObjek').value === "086" && document.getElementById('IdDivisi_penerima').value === "INV") {
            document.getElementById("LMT").classList.remove("hidden")
            strReportPath = "lmt.rpt";
            parameter = 2;
        } else if (document.getElementById('IdObjek').value === "086" && document.getElementById('IdDivisi_penerima').value !== "INV") {
            document.getElementById("LMT2").classList.remove("hidden")
            strReportPath = "lmt2.rpt";
            parameter = 2;
        } else if (document.getElementById('IdDivisi_pengiriman').value === "CIR" && document.getElementById('IdDivisi_penerima').value === "INV") {
            document.getElementById("CIR").classList.remove("hidden")
            strReportPath = "ReportCIR1.rpt";
            parameter = 3;
        } else if (document.getElementById('IdDivisi_pengiriman').value === "CIR" && document.getElementById('IdDivisi_penerima').value !== "INV") {
            document.getElementById("CIR").classList.remove("hidden")
            strReportPath = "ReportCIR.rpt";
            parameter = 3;
        } else if (document.getElementById('IdDivisi_pengiriman').value === "CLM" && document.getElementById('IdDivisi_penerima').value === "MNV") {
            document.getElementById("CLM1").classList.remove("hidden")
            strReportPath = "ReportCLM1.rpt";
            parameter = 3;
        } else if (document.getElementById('IdDivisi_pengiriman').value === "CLM" && document.getElementById('IdDivisi_penerima').value === "INV") {
            document.getElementById("CLM1").classList.remove("hidden")
            strReportPath = "ReportCLM1.rpt";
            parameter = 3;
        } else if (document.getElementById('IdDivisi_pengiriman').value === "CLM" && document.getElementById('IdDivisi_penerima').value !== "MNV") {
            document.getElementById("CLM").classList.remove("hidden")
            strReportPath = "ReportCLM.rpt";
            parameter = 3;
        } else if (document.getElementById('IdDivisi_pengiriman').value === "MCL" && document.getElementById('IdDivisi_penerima').value === "MWH") {
            document.getElementById("MCL1").classList.remove("hidden")
            strReportPath = "ReportMCL1.rpt";
            parameter = 3;
        } else if (document.getElementById('IdDivisi_pengiriman').value === "MCL" && document.getElementById('IdDivisi_penerima').value !== "MWH") {
            document.getElementById("MCL").classList.remove("hidden")
            strReportPath = "ReportMCL.rpt";
            parameter = 3;
        } else if (document.getElementById('IdObjek').value === "161" && document.getElementById('IdDivisi_penerima').value === "INV") {
            document.getElementById("ABM").classList.remove("hidden")
            strReportPath = "abm.rpt";
            parameter = 1;
        } else {
            alert("Data tidak ditemukan");
            document.getElementById('btnPengirim').focus();
            return;
        }

        // Load Crystal Report
        // var cr = new ReportDocument();
        // cr.load(strReportPath);

        // // Set Parameters
        // var tanggal = new Date(document.getElementById('dtTanggal').value);
        // cr.setParameterValue("tanggal", tanggal);

        // if (parameter === 2) {
        //     cr.setParameterValue("divisi", document.getElementById('txtDivTujuan').value);
        // }

        // if (parameter === 3) {
        //     cr.setParameterValue("divisi", document.getElementById('txtDivTujuan').value);
        //     cr.setParameterValue("shift", document.getElementById('cboShift').value);
        // }

        // // Set Crystal Report as the source for the viewer
        // document.getElementById('CrystalReportViewer1').reportSource = cr;
    });
});

function openModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block"; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal() {
    var modal = document.getElementById("myModal1");
    modal.style.display = "none"; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal1() {
    var modal = document.getElementById("myModal1");
    modal.style.display = "block"; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal1() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none"; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
    var txtIdDivisi = document.getElementById('IdDivisi_pengiriman');
    fetch("/ABM/LST/" + txtIdDivisi.value + ".getXIdDivisi")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json(); // Assuming the response is in JSON format
        })
        .then((data) => {
            // Handle the data retrieved from the server (data should be an object or an array)
            console.log(data);
            // Clear the existing table rows
            $("#TableObjek").DataTable().clear().draw();

            // Loop through the data and create table rows
            data.forEach((item) => {
                var row = [item.IdObjek, item.NamaObjek];
                $("#TableObjek").DataTable().row.add(row);
            });

            // Redraw the table to show the changes
            $("#TableObjek").DataTable().draw();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function closeModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}
