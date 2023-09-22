$(document).ready(function () {
    const tampilButton = document.getElementById("tampilButton");
    var table = $("#tabel_Abnormal").DataTable({
        order: [[0, "asc"]],
    });
    $("#tabelCetak").DataTable({
        order: [[0, "asc"]],
        dom: "",
    });
    tampilButton.addEventListener("click", function () {
        const TglAbnormal = document.getElementById("TglAbnormal").value;

        // Membagi tanggal menjadi bagian-bagian (tahun, bulan, dan hari)
        const parts = TglAbnormal.split("-");

        // Membangun kembali tanggal dalam format "YYYY-DD-MM"
        const newDate = parts[0] + "-" + parts[2] + "-" + parts[1];


        // Format the date value as desired
        var formattedDate = formatDate(TglAbnormal);

        // Update the contents of the TglCetak div element to display the date
        document.getElementById("TglCetak").textContent =
            "Tanggal: " + formattedDate;
        fetch("/LaporanAbnormal/" + newDate + ".getAbsenAbnormal")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                $("#tabel_Abnormal").DataTable().clear().draw();
                $("#tabelCetak").DataTable().clear().draw();
                // Loop through the data and create table rows
                data.forEach((item) => {
                    var row = [
                        // `<input type="checkbox" name="selectRow" value="${item.Kd_Pegawai}">` +
                        //     " " +
                        item.Kd_Pegawai,
                        item.Nama_Peg,
                        item.JumlahCheckClock,
                        item.Jam_Masuk,
                        item.Jam_Keluar,
                        item.Terlambat,
                        item.Tinggal,
                        item.Ket_Absensi,
                    ];
                    $("#tabel_Abnormal").DataTable().row.add(row);
                    $("#tabelCetak").DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $("#tabel_Abnormal").DataTable().draw();
                $("#tabelCetak").DataTable().draw();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
    function formatDate(dateValue) {
        // Create a new Date object from the date value
        var date = new Date(dateValue);

        // Format the date as desired
        var formattedDate = date.toLocaleDateString("id-ID", {
            day: "numeric",
            month: "long",
            year: "numeric",
        });

        return formattedDate;
    }
});
