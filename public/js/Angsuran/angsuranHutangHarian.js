$(document).ready(function () {
    const buttonListData = document.getElementById("buttonListData");
    $("#tabel_Hutang").DataTable({
        order: [[0, "asc"]],
    });
    buttonListData.addEventListener("click", function (event) {
        const Tanggal = document.getElementById("tanggal_Hutang");
        let tanggal_str = Tanggal.value;
        let tanggal_obj = new Date(tanggal_str);
        let tanggal_sekarang = new Date();

        // Periksa apakah tanggal lebih besar dari tanggal sekarang
        if (tanggal_obj.getTime() < tanggal_sekarang.getTime()) {
            alert("Tanggal Lebih Besar Dari Tanggal System");
            return;
        }

        // Periksa apakah tanggal adalah akhir periode gajian
        if (tanggal_obj.getDay() !== 4) {
            alert("Bukan Akhir Periode Gajian");
            return;
        }

        // Cek double tanggal
        let jumlah_penggunaan = cek_tanggal(Tanggal.value);

        if (jumlah_penggunaan > 0) {
            alert("DATA SUDAH PERNAH DIPROSES UNTUK TANGGAL TERSEBUT");
            return;
        }
        fetch(
            "/ProgramPayroll/Angsuran/AngsuranHutang/" +
                Tanggal.value +
                ".cekTanggal"
        )
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then((data) => {
                if (data[0].jumlah > 0) {
                    alert("DATA SUDAH PERNAH DIPROSES UNTUK TANGGAL TERSEBUT");
                } else {
                    fetch(
                        "/ProgramPayroll/Angsuran/AngsuranHutang/" +
                            ".getListData"
                    )
                        .then((response) => {
                            if (!response.ok) {
                                throw new Error("Network response was not ok");
                            }
                            return response.json(); // Assuming the response is in JSON format
                        })
                        .then((data) => {
                            $("#tabel_Hutang").DataTable().clear().draw();
                            data.forEach((item) => {
                                var row = [item.nama_div, item.kd_pegawai, item.Nama_Peg, item.no_bukti, item.sisa_hutang, ""];
                                $("#tabel_Hutang").DataTable().row.add(row);
                            });

                            // Redraw the table to show the changes
                            $("#tabel_Hutang").DataTable().draw();
                        })
                        .catch((error) => {
                            console.error("Error:", error);
                        });
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
});
