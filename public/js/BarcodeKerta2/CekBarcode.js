$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $("#CekBarcode").on("click", function () {
        // Mendapatkan nilai input barcode
        var txtbarcode = document.getElementById("txtbarcode").value;

        // Memisahkan string menjadi NoIndeks dan txtbarcode
        var splitArray = txtbarcode.split("-");
        var NoIndeks = splitArray[0];
        txtbarcode = splitArray[1]; // Menggunakan splitArray[1] sebagai txtbarcode

        // Menghilangkan spasi kosong di awal dan akhir input
        txtbarcode = txtbarcode.trim();

        // Memeriksa apakah input kosong
        if (txtbarcode === "") {
            alert("Mohon isi barcode terlebih dahulu.");
            return; // Keluar dari fungsi jika input kosong
        }

        // Membuat URL dengan menggunakan NoIndeks dan txtbarcode
        var url = "/CekBarcode/" + NoIndeks + "." + txtbarcode + ".getBarcode";

        // Melakukan permintaan fetch ke URL yang baru dibuat
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then(data => {
                // Handle data ...
                console.log("Data dari server:", data[0]);

                // Lakukan logika atau tampilkan pesan berdasarkan data yang diterima
                if (data[0].Type_Transaksi === "22" && data[0].Status === "N" && data[0].Ditembak === "") {
                    alert("Barcode Tidak Jadi Dibuat oleh Divisi " + data[0].Divisi);
                } else if (data[0].Type_Transaksi === "22" && data[0].Status === "N" && data[0].Ditembak === "4") {
                    alert("Barcode Barang Setengah Jadi Sudah Diterima Gudang");
                } else if ((data[0].Type_Transaksi === "22" && data[0].Status === "1" && data[0].Ditembak === "1") || (data[0].Type_Transaksi === "28" && data[0].Status === "1" && data[0].Ditembak === "1")) {
                    alert("Barcode Belum Dikirim Oleh Divisi " + data[0].Divisi);
                } else if (data[0].Type_Transaksi === "22" && data[0].Status === "1" && data[0].Ditembak === "4") {
                    alert("Barcode Barang Setengah Jadi Dikirim Ke Kerta 2");
                } else if (data[0].Type_Transaksi === "22" && data[0].Status === "3" && data[0].Ditembak === "3") {
                    alert("Barcode Salah, Hubungi EDP");
                } else if (data[0].Ditembak === "3" && data[0].DivTujuan !== "") {
                    alert("Barcode Dikirim ke Divisi " + data[0].DivTujuan);
                } else if (data[0].Ditembak === "2" && data[0].Pengirim !== "" && data[0].DivTujuan !== "") {
                    alert("Barcode Sudah Discan Oleh Divisi " + data[0].DivTujuan + ", Cek Barcode di Gagal Terima");
                } else if (data[0].Ditembak === "3" && data[0].DivTujuan === "") {
                    alert("Barcode Salah, Hubungi EDP");
                } else if (data[0].Ditembak === "2" && data[0].Pengirim !== "" && data[0].DivTujuan === "") {
                    alert("Barcode Salah, Hubungi EDP");
                } else if (data[0].Ditembak === "2" && data[0].Pengirim === "") {
                    alert("Barcode Dikirim Ke Gudang");
                } else if (data[0].Type_Transaksi === "23" && data[0].Status === "3") {
                    alert("Barcode Sudah Diterima Oleh Divisi " + data[0].Divisi);
                } else if (data[0].Type_Transaksi === "25" || data[0].Type_Transaksi === 27) {
                    alert("Barcode Milik Divisi " + data[0].Divisi);
                } else if ((data[0].Type_Transaksi === "26" && data[0].Status === "5") || (data[0].Type_Transaksi === "29" && data[0].Status === "5")) {
                    alert("Barcode Milik Divisi " + data[0].Divisi);
                } else if (data[0].Type_Transaksi === "5" || data[0].Type_Transaksi === "5") {
                    alert("Barcode Sudah Dihanguskan Oleh Divisi " + data[0].Divisi);
                } else if (data[0].Type_Transaksi === "9" || data[0].Type_Transaksi === "9") {
                    alert("Barcode Sudah Dijual Oleh Divisi " + data[0].Divisi);
                } else if (data[0].Type_Transaksi === "22" && data[0].Ditembak !== "4") {
                    alert("Barcode Tidak Jadi Dibuat Oleh Divisi " + data[0].Divisi);
                } else if (data[0].Type_Transaksi === "22" && data[0].Ditembak === "4") {
                    alert("Barcode Setengah Jadi Sudah Diterima Oleh Divisi Gudang");
                } else if (data[0].Type_Transaksi === "23" || data[0].Type_Transaksi === "25" || data[0].Type_Transaksi === "29") {
                    alert("Barcode Milik Divisi " + data[0].Divisi + " Sudah Tidak Dipakai Lagi");
                } else if (data[0].Type_Transaksi === "26") {
                    alert("Barcode Sudah Dihanguskan Oleh Divisi " + data[0].Divisi);
                } else if (data[0].Type_Transaksi === "27") {
                    alert("Barcode Sudah Dimutasi Satu Divisi Oleh Divisi " + data[0].NamaDivisi);
                } else {
                    alert("Barcode Tidak Ditemukan, Hubungi EDP");
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    });

    $("#txtbarcode").on("keypress", function (event) {
        if (event.key == "Enter") {
            // Mendapatkan nilai input barcode
            var txtbarcode = document.getElementById("txtbarcode").value;

            // Memisahkan string menjadi NoIndeks dan txtbarcode
            var splitArray = txtbarcode.split("-");
            var NoIndeks = splitArray[0];
            txtbarcode = splitArray[1]; // Menggunakan splitArray[1] sebagai txtbarcode

            // Menghilangkan spasi kosong di awal dan akhir input
            txtbarcode = txtbarcode.trim();

            // Memeriksa apakah input kosong
            if (txtbarcode === "") {
                alert("Mohon isi barcode terlebih dahulu.");
                return; // Keluar dari fungsi jika input kosong
            }

            // Membuat URL dengan menggunakan NoIndeks dan txtbarcode
            var url = "/CekBarcode/" + NoIndeks + "." + txtbarcode + ".getBarcode";

            // Melakukan permintaan fetch ke URL yang baru dibuat
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then(data => {
                    // Handle data ...
                    console.log("Data dari server:", data[0]);

                    // Lakukan logika atau tampilkan pesan berdasarkan data yang diterima
                    if (data[0].Type_Transaksi === "22" && data[0].Status === "N" && data[0].Ditembak === "") {
                        alert("Barcode Tidak Jadi Dibuat oleh Divisi " + data[0].Divisi);
                    } else if (data[0].Type_Transaksi === "22" && data[0].Status === "N" && data[0].Ditembak === "4") {
                        alert("Barcode Barang Setengah Jadi Sudah Diterima Gudang");
                    } else if ((data[0].Type_Transaksi === "22" && data[0].Status === "1" && data[0].Ditembak === "1") || (data[0].Type_Transaksi === "28" && data[0].Status === "1" && data[0].Ditembak === "1")) {
                        alert("Barcode Belum Dikirim Oleh Divisi " + data[0].Divisi);
                    } else if (data[0].Type_Transaksi === "22" && data[0].Status === "1" && data[0].Ditembak === "4") {
                        alert("Barcode Barang Setengah Jadi Dikirim Ke Kerta 2");
                    } else if (data[0].Type_Transaksi === "22" && data[0].Status === "3" && data[0].Ditembak === "3") {
                        alert("Barcode Salah, Hubungi EDP");
                    } else if (data[0].Ditembak === "3" && data[0].DivTujuan !== "") {
                        alert("Barcode Dikirim ke Divisi " + data[0].DivTujuan);
                    } else if (data[0].Ditembak === "2" && data[0].Pengirim !== "" && data[0].DivTujuan !== "") {
                        alert("Barcode Sudah Discan Oleh Divisi " + data[0].DivTujuan + ", Cek Barcode di Gagal Terima");
                    } else if (data[0].Ditembak === "3" && data[0].DivTujuan === "") {
                        alert("Barcode Salah, Hubungi EDP");
                    } else if (data[0].Ditembak === "2" && data[0].Pengirim !== "" && data[0].DivTujuan === "") {
                        alert("Barcode Salah, Hubungi EDP");
                    } else if (data[0].Ditembak === "2" && data[0].Pengirim === "") {
                        alert("Barcode Dikirim Ke Gudang");
                    } else if (data[0].Type_Transaksi === "23" && data[0].Status === "3") {
                        alert("Barcode Sudah Diterima Oleh Divisi " + data[0].Divisi);
                    } else if (data[0].Type_Transaksi === "25" || data[0].Type_Transaksi === 27) {
                        alert("Barcode Milik Divisi " + data[0].Divisi);
                    } else if ((data[0].Type_Transaksi === "26" && data[0].Status === "5") || (data[0].Type_Transaksi === "29" && data[0].Status === "5")) {
                        alert("Barcode Milik Divisi " + data[0].Divisi);
                    } else if (data[0].Type_Transaksi === "5" || data[0].Type_Transaksi === "5") {
                        alert("Barcode Sudah Dihanguskan Oleh Divisi " + data[0].Divisi);
                    } else if (data[0].Type_Transaksi === "9" || data[0].Type_Transaksi === "9") {
                        alert("Barcode Sudah Dijual Oleh Divisi " + data[0].Divisi);
                    } else if (data[0].Type_Transaksi === "22" && data[0].Ditembak !== "4") {
                        alert("Barcode Tidak Jadi Dibuat Oleh Divisi " + data[0].Divisi);
                    } else if (data[0].Type_Transaksi === "22" && data[0].Ditembak === "4") {
                        alert("Barcode Setengah Jadi Sudah Diterima Oleh Divisi Gudang");
                    } else if (data[0].Type_Transaksi === "23" || data[0].Type_Transaksi === "25" || data[0].Type_Transaksi === "29") {
                        alert("Barcode Milik Divisi " + data[0].Divisi + " Sudah Tidak Dipakai Lagi");
                    } else if (data[0].Type_Transaksi === "26") {
                        alert("Barcode Sudah Dihanguskan Oleh Divisi " + data[0].Divisi);
                    } else if (data[0].Type_Transaksi === "27") {
                        alert("Barcode Sudah Dimutasi Satu Divisi Oleh Divisi " + data[0].NamaDivisi);
                    } else {
                        alert("Barcode Tidak Ditemukan, Hubungi EDP");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        }
        event.preventDefault()
    });
});
