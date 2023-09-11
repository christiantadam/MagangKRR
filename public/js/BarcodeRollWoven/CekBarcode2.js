$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    // document.getElementById('txtBarcode').addEventListener('keypress', function (event) {
    //     if (event.key === 'Enter') {
    //         var barcode = txtBarcode.value;
    //         window.location.href = '/barcodes/' + barcode + '/get_barcde';
    //     }
    // });

    //     $(document).ready(function () {
    //         $('.dropdown-submenu a.test').on("click", function (e) {
    //             $(this).next('ul').toggle();
    //             e.stopPropagation();
    //             e.preventDefault();
    //         });

    //         var txtbarcode = document.getElementById("txtbarcode");
    //         var Type_Transaksi, Status, Divisi, Ditembak, Pengirim, DivTujuan;
    //         var splitArray = txtbarcode.value.split("-"); // Memisahkan string berdasarkan tanda "-"
    //         var NoIndeks = splitArray[0];

    //         $("#CekBarcode").on("click", function () {
    //             console.log(txtbarcode.value);

    //             // Menggabungkan ketiga permintaan fetch menjadi satu
    //             fetch("/CekBarcode/" + txtbarcode.value + "." + NoIndeks + ".getBarcode")
    //                 .then(response => {
    //                     if (!response.ok) {
    //                         throw new Error("Network response was not ok");
    //                     }
    //                     return response.json();
    //                 })
    //                 .then(data => {
    //                     // Handle data for the first endpoint (getBarcode)
    //                     console.log("Data dari getBarcode:", data);
    //                     Type_Transaksi = data.Type_Transaksi; // Misalnya, Anda perlu mengatur nilai Type_Transaksi dari data yang diterima
    //                     Status = data.Status; // Misalnya, Anda perlu mengatur nilai Status dari data yang diterima
    //                     Divisi = data.Divisi; // Misalnya, Anda perlu mengatur nilai Divisi dari data yang diterima
    //                     Ditembak = data.Ditembak; // Misalnya, Anda perlu mengatur nilai Ditembak dari data yang diterima
    //                     Pengirim = data.Pengirim;

    //                     // Lanjutkan dengan permintaan kedua
    //                     return fetch("/CekBarcode/" + txtbarcode.value + "." + NoIndeks + ".getBarcodeKeluar");
    //                 })
    //                 .then(response => {
    //                     if (!response.ok) {
    //                         throw new Error("Network response was not ok");
    //                     }
    //                     return response.json();
    //                 })
    //                 .then(data => {
    //                     // Handle data for the second endpoint (getBarcodeKeluar)
    //                     console.log("Data dari getBarcodeKeluar:", data);

    //                     // Lanjutkan dengan permintaan ketiga
    //                     return fetch("/CekBarcode/" + txtbarcode.value + "." + NoIndeks + ".getBarcodeKirim");
    //                 })
    //                 .then(response => {
    //                     if (!response.ok) {
    //                         throw new Error("Network response was not ok");
    //                     }
    //                     return response.json();
    //                 })
    //                 .then(data => {
    //                     // Handle data for the third endpoint (getBarcodeKirim)
    //                     console.log("Data dari getBarcodeKirim:", data);

    //                     // Perform your alert and other logic based on the data here
    //                     if (Type_Transaksi === 22 && Status === "N" && Ditembak === "") {
    //                         alert("Barcode Tidak Jadi Dibuat oleh Divisi " + Divisi);
    //                     } else if (Type_Transaksi === 22 && Status === "N" && Ditembak === "4") {
    //                         alert("Barcode Barang Setengah Jadi Sudah Diterima Gudang");
    //                     } else if ((Type_Transaksi === 22 && Status === "1" && Ditembak === "1") || (Type_Transaksi === 28 && Status === "1" && Ditembak === "1")) {
    //                         alert("Barcode Belum Dikirim Oleh Divisi " + Divisi);
    //                     } else if (Type_Transaksi === 22 && Status === "1" && Ditembak === "4") {
    //                         alert("Barcode Barang Setengah Jadi Dikirim Ke Kerta 2");
    //                     } else if (Type_Transaksi === 22 && Status === "3" && Ditembak === "3") {
    //                         alert("Barcode Salah, Hubungi EDP");
    //                     } else if (Ditembak === "3" && DivTujuan !== "") {
    //                         alert("Barcode Dikirim ke Divisi " + DivTujuan);
    //                     } else if (Ditembak === "2" && Pengirim !== "" && DivTujuan !== "") {
    //                         alert("Barcode Sudah Discan Oleh Divisi " + DivTujuan + ", Cek Barcode di Gagal Terima");
    //                     } else if (Ditembak === "3" && DivTujuan === "") {
    //                         alert("Barcode Salah, Hubungi EDP");
    //                     } else if (Ditembak === "2" && Pengirim !== "" && DivTujuan === "") {
    //                         alert("Barcode Salah, Hubungi EDP");
    //                     } else if (Ditembak === "2" && Pengirim === "") {
    //                         alert("Barcode Dikirim Ke Gudang");
    //                     } else if (Type_Transaksi === 23 && Status === "3") {
    //                         alert("Barcode Sudah Diterima Oleh Divisi " + Divisi);
    //                     } else if (Type_Transaksi === 25 || Type_Transaksi === 27) {
    //                         alert("Barcode Milik Divisi " + Divisi);
    //                     } else if ((Type_Transaksi === 26 && Status === "5") || (Type_Transaksi === 29 && Status === "5")) {
    //                         alert("Barcode Milik Divisi " + Divisi);
    //                     } else if (Type_Transaksi === 5 || Type_Transaksi === 5) {
    //                         alert("Barcode Sudah Dihanguskan Oleh Divisi " + Divisi);
    //                     } else if (Type_Transaksi === 9 || Type_Transaksi === 9) {
    //                         alert("Barcode Sudah Dijual Oleh Divisi " + Divisi);
    //                     } else if (Type_Transaksi === 22 && Ditembak !== "4") {
    //                         alert("Barcode Tidak Jadi Dibuat Oleh Divisi " + Divisi);
    //                     } else if (Type_Transaksi === 22 && Ditembak === "4") {
    //                         alert("Barcode Setengah Jadi Sudah Diterima Oleh Divisi Gudang");
    //                     } else if (Type_Transaksi === 23 || Type_Transaksi === 25 || Type_Transaksi === 29) {
    //                         alert("Barcode Milik Divisi " + Divisi + " Sudah Tidak Dipakai Lagi");
    //                     } else if (Type_Transaksi === 26) {
    //                         alert("Barcode Sudah Dihanguskan Oleh Divisi " + Divisi);
    //                     } else if (Type_Transaksi === 27) {
    //                         alert("Barcode Sudah Dimutasi Satu Divisi Oleh Divisi " + Divisi);
    //                     } else {
    //                         alert("Barcode Tidak Ditemukan, Hubungi EDP");
    //                     }
    //                 })
    //                 .catch(error => {
    //                     console.error("Error:", error);
    //                 });

    //             event.preventDefault();
    //         });
    //     });

    // $(document).ready(function () {
    //     $('.dropdown-submenu a.test').on("click", function (e) {
    //         $(this).next('ul').toggle();
    //         e.stopPropagation();
    //         e.preventDefault();
    //     });

    //     $("#CekBarcode").on("click", function () {
    //         // Mendapatkan nilai input barcode
    //         var txtbarcode = document.getElementById("txtbarcode").value;

    //         // Memisahkan string menjadi NoIndeks dan txtbarcode
    //         var splitArray = txtbarcode.split("-");
    //         var NoIndeks = splitArray[0];
    //         var txtbarcode = splitArray[1]; // Menggunakan splitArray[1] sebagai txtbarcode

    //         // Menghilangkan spasi kosong di awal dan akhir input
    //         txtbarcode = txtbarcode.trim();

    //         // Memeriksa apakah input kosong
    //         if (txtbarcode === "") {
    //             alert("Mohon isi barcode terlebih dahulu.");
    //             return; // Keluar dari fungsi jika input kosong
    //         }

    //         // Membuat URL dengan menggunakan NoIndeks dan txtbarcode
    //         var url = "/CekBarcode/" + NoIndeks + "." + txtbarcode + ".getBarcode";

    //         // Melakukan permintaan fetch ke URL yang baru dibuat
    //         fetch(url)
    //             .then(response => {
    //                 if (!response.ok) {
    //                     throw new Error("Network response was not ok");
    //                 }
    //                 return response.text(); // Mengambil teks dari respons
    //             })
    //             .then(data => {
    //                 if (data.trim() === "") {
    //                     console.warn("Empty response from server.");
    //                     return; // Keluar dari pemrosesan jika respons kosong
    //                 }

    //                 try {
    //                     // Mencoba mengurai JSON dari teks respons
    //                     const jsonData = JSON.parse(data);

    //                     // Handle data for the first endpoint (getBarcode)
    //                     console.log("Data dari getBarcode:", jsonData);

    //                     // Lanjutkan dengan permintaan kedua
    //                     return fetch("/CekBarcode/" + txtbarcode.value + "." + NoIndeks + ".getBarcodeKeluar");
    //                 } catch (error) {
    //                     // Tangani kesalahan jika parsing JSON gagal
    //                     console.error("Error parsing JSON:", error);
    //                 }
    //             })
    //             .then(response => {
    //                 if (!response.ok) {
    //                     throw new Error("Network response was not ok");
    //                 }
    //                 return response.text(); // Mengambil teks dari respons
    //             })
    //             .then(data => {
    //                 if (data.trim() === "") {
    //                     console.warn("Empty response from server.");
    //                     return; // Keluar dari pemrosesan jika respons kosong
    //                 }

    //                 try {
    //                     // Mencoba mengurai JSON dari teks respons
    //                     const jsonData = JSON.parse(data);

    //                     // Handle data for the second endpoint (getBarcodeKeluar)
    //                     console.log("Data dari getBarcodeKeluar:", jsonData);

    //                     // Lanjutkan dengan permintaan ketiga
    //                     return fetch("/CekBarcode/" + txtbarcode.value + "." + NoIndeks + ".getBarcodeKirim");
    //                 } catch (error) {
    //                     // Tangani kesalahan jika parsing JSON gagal
    //                     console.error("Error parsing JSON:", error);
    //                 }
    //             })
    //             .then(response => {
    //                 if (!response.ok) {
    //                     throw new Error("Network response was not ok");
    //                 }
    //                 return response.text(); // Mengambil teks dari respons
    //             })
    //             .then(data => {
    //                 if (data.trim() === "") {
    //                     console.warn("Empty response from server.");
    //                     return; // Keluar dari pemrosesan jika respons kosong
    //                 }

    //                 try {
    //                     // Mencoba mengurai JSON dari teks respons
    //                     const jsonData = JSON.parse(data);

    //                     // Handle data for the third endpoint (getBarcodeKirim)
    //                     console.log("Data dari getBarcodeKirim:", jsonData);

    //                     // Perform your alert and other logic based on the data here
    //                     if (jsonData.Type_Transaksi === 22 && jsonData.Status === "N" && jsonData.Ditembak === "") {
    //                         alert("Barcode Tidak Jadi Dibuat oleh Divisi " + jsonData.Divisi);
    //                     } else if (jsonData.Type_Transaksi === 22 && jsonData.Status === "N" && jsonData.Ditembak === "4") {
    //                         alert("Barcode Barang Setengah Jadi Sudah Diterima Gudang");
    //                     } else if ((jsonData.Type_Transaksi === 22 && jsonData.Status === "1" && jsonData.Ditembak === "1") || (jsonData.Type_Transaksi === 28 && jsonData.Status === "1" && jsonData.Ditembak === "1")) {
    //                         alert("Barcode Belum Dikirim Oleh Divisi " + jsonData.Divisi);
    //                     } else if (jsonData.Type_Transaksi === 22 && jsonData.Status === "1" && jsonData.Ditembak === "4") {
    //                         alert("Barcode Barang Setengah Jadi Dikirim Ke Kerta 2");
    //                     } else if (jsonData.Type_Transaksi === 22 && jsonData.Status === "3" && jsonData.Ditembak === "3") {
    //                         alert("Barcode Salah, Hubungi EDP");
    //                     } else if (jsonData.Ditembak === "3" && jsonData.DivTujuan !== "") {
    //                         alert("Barcode Dikirim ke Divisi " + jsonData.DivTujuan);
    //                     } else if (jsonData.Ditembak === "2" && jsonData.Pengirim !== "" && jsonData.DivTujuan !== "") {
    //                         alert("Barcode Sudah Discan Oleh Divisi " + jsonData.DivTujuan + ", Cek Barcode di Gagal Terima");
    //                     } else if (jsonData.Ditembak === "3" && jsonData.DivTujuan === "") {
    //                         alert("Barcode Salah, Hubungi EDP");
    //                     } else if (jsonData.Ditembak === "2" && jsonData.Pengirim !== "" && jsonData.DivTujuan === "") {
    //                         alert("Barcode Salah, Hubungi EDP");
    //                     } else if (jsonData.Ditembak === "2" && jsonData.Pengirim === "") {
    //                         alert("Barcode Dikirim Ke Gudang");
    //                     } else if (jsonData.Type_Transaksi === 23 && jsonData.Status === "3") {
    //                         alert("Barcode Sudah Diterima Oleh Divisi " + jsonData.Divisi);
    //                     } else if (jsonData.Type_Transaksi === 25 || jsonData.Type_Transaksi === 27) {
    //                         alert("Barcode Milik Divisi " + jsonData.Divisi);
    //                     } else if ((jsonData.Type_Transaksi === 26 && jsonData.Status === "5") || (jsonData.Type_Transaksi === 29 && jsonData.Status === "5")) {
    //                         alert("Barcode Milik Divisi " + jsonData.Divisi);
    //                     } else if (jsonData.Type_Transaksi === 5 || jsonData.Type_Transaksi === 5) {
    //                         alert("Barcode Sudah Dihanguskan Oleh Divisi " + jsonData.Divisi);
    //                     } else if (jsonData.Type_Transaksi === 9 || jsonData.Type_Transaksi === 9) {
    //                         alert("Barcode Sudah Dijual Oleh Divisi " + jsonData.Divisi);
    //                     } else if (jsonData.Type_Transaksi === 22 && jsonData.Ditembak !== "4") {
    //                         alert("Barcode Tidak Jadi Dibuat Oleh Divisi " + jsonData.Divisi);
    //                     } else if (jsonData.Type_Transaksi === 22 && jsonData.Ditembak === "4") {
    //                         alert("Barcode Setengah Jadi Sudah Diterima Oleh Divisi Gudang");
    //                     } else if (jsonData.Type_Transaksi === 23 || jsonData.Type_Transaksi === 25 || jsonData.Type_Transaksi === 29) {
    //                         alert("Barcode Milik Divisi " + jsonData.Divisi + " Sudah Tidak Dipakai Lagi");
    //                     } else if (jsonData.Type_Transaksi === 26) {
    //                         alert("Barcode Sudah Dihanguskan Oleh Divisi " + jsonData.Divisi);
    //                     } else if (jsonData.Type_Transaksi === 27) {
    //                         alert("Barcode Sudah Dimutasi Satu Divisi Oleh Divisi " + jsonData.Divisi);
    //                     } else {
    //                         alert("Barcode Tidak Ditemukan, Hubungi EDP");
    //                     }
    //                 } catch (error) {
    //                     // Tangani kesalahan jika parsing JSON gagal
    //                     console.error("Error parsing JSON:", error);
    //                 }
    //             })
    //             .catch(error => {
    //                 // Tangani kesalahan jaringan
    //                 console.error("Network error:", error);
    //             });
    //     });
    // });
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
                    console.log("Data dari server:", data);

                    // Lakukan logika atau tampilkan pesan berdasarkan data yang diterima
                    if (data.Type_Transaksi === 22 && data.Status === "N" && data.Ditembak === "") {
                        alert("Barcode Tidak Jadi Dibuat oleh Divisi " + data.Divisi);
                    } else if (data.Type_Transaksi === 22 && data.Status === "N" && data.Ditembak === "4") {
                        alert("Barcode Barang Setengah Jadi Sudah Diterima Gudang");
                    } else if ((data.Type_Transaksi === 22 && data.Status === "1" && data.Ditembak === "1") || (data.Type_Transaksi === 28 && data.Status === "1" && data.Ditembak === "1")) {
                        alert("Barcode Belum Dikirim Oleh Divisi " + data.Divisi);
                    } else if (data.Type_Transaksi === 22 && data.Status === "1" && data.Ditembak === "4") {
                        alert("Barcode Barang Setengah Jadi Dikirim Ke Kerta 2");
                    } else if (data.Type_Transaksi === 22 && data.Status === "3" && data.Ditembak === "3") {
                        alert("Barcode Salah, Hubungi EDP");
                    } else if (data.Ditembak === "3" && data.DivTujuan !== "") {
                        alert("Barcode Dikirim ke Divisi " + data.DivTujuan);
                    } else if (data.Ditembak === "2" && data.Pengirim !== "" && data.DivTujuan !== "") {
                        alert("Barcode Sudah Discan Oleh Divisi " + data.DivTujuan + ", Cek Barcode di Gagal Terima");
                    } else if (data.Ditembak === "3" && data.DivTujuan === "") {
                        alert("Barcode Salah, Hubungi EDP");
                    } else if (data.Ditembak === "2" && data.Pengirim !== "" && data.DivTujuan === "") {
                        alert("Barcode Salah, Hubungi EDP");
                    } else if (data.Ditembak === "2" && data.Pengirim === "") {
                        alert("Barcode Dikirim Ke Gudang");
                    } else if (data.Type_Transaksi === 23 && data.Status === "3") {
                        alert("Barcode Sudah Diterima Oleh Divisi " + data.Divisi);
                    } else if (data.Type_Transaksi === 25 || data.Type_Transaksi === 27) {
                        alert("Barcode Milik Divisi " + data.Divisi);
                    } else if ((data.Type_Transaksi === 26 && data.Status === "5") || (data.Type_Transaksi === 29 && data.Status === "5")) {
                        alert("Barcode Milik Divisi " + data.Divisi);
                    } else if (data.Type_Transaksi === 5 || data.Type_Transaksi === 5) {
                        alert("Barcode Sudah Dihanguskan Oleh Divisi " + data.Divisi);
                    } else if (data.Type_Transaksi === 9 || data.Type_Transaksi === 9) {
                        alert("Barcode Sudah Dijual Oleh Divisi " + data.Divisi);
                    } else if (data.Type_Transaksi === 22 && data.Ditembak !== "4") {
                        alert("Barcode Tidak Jadi Dibuat Oleh Divisi " + data.Divisi);
                    } else if (data.Type_Transaksi === 22 && data.Ditembak === "4") {
                        alert("Barcode Setengah Jadi Sudah Diterima Oleh Divisi Gudang");
                    } else if (data.Type_Transaksi === 23 || data.Type_Transaksi === 25 || data.Type_Transaksi === 29) {
                        alert("Barcode Milik Divisi " + data.Divisi + " Sudah Tidak Dipakai Lagi");
                    } else if (data.Type_Transaksi === 26) {
                        alert("Barcode Sudah Dihanguskan Oleh Divisi " + data.Divisi);
                    } else if (data.Type_Transaksi === 27) {
                        alert("Barcode Sudah Dimutasi Satu Divisi Oleh Divisi " + data.Divisi);
                    } else {
                        alert("Barcode Tidak Ditemukan, Hubungi EDP");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        });
    });

});

// $(document).ready(function () {
//     $('#checkBarcodeButton').click(function () {
//         var barcode = $('#txtBarcode').val();

//         // Simulated data (replace with actual data retrieval logic)
//         var TypeTrans = '22';
//         var Status = 'N';
//         var Ditembak = '';
//         var Divisi = 'JBJ';
//         var DivTujuan = '';
//         var Pengirim = '';

//         // ... perform your logic here to determine the values of TypeTrans, Status, Ditembak, Divisi, DivTujuan, and Pengirim ...

//         if (TypeTrans === '22' && Status === 'N' && Ditembak === '') {
//             alert('Barcode Tidak Jadi Dibuat oleh Divisi ' + Divisi);
//             $('#txtBarcode').val('');
//         } else if (TypeTrans === '22' && Status === 'N' && Ditembak === '4') {
//             alert('Barcode Barang Setengah Jadi Sudah Diterima Gudang');
//             $('#txtBarcode').val('');
//         } else if ((TypeTrans === '22' && Status === '1' && Ditembak === '1') || (TypeTrans === '28' && Status === '1' && Ditembak === '1')) {
//             alert('Barcode Belum Dikirim Oleh Divisi ' + Divisi);
//             $('#txtBarcode').val('');
//         } else if ((TypeTrans === '22' && Status === '1' && Ditembak === '4')) {
//             alert('Barcode Barang Setengah Jadi Dikirim Ke Kerta 2');
//             $('#txtBarcode').val('');
//         } else if ((TypeTrans === '22' && Status === '3' && Ditembak === '3')) {
//             alert('Barcode Salah, Hubungi EDP');
//             $('#txtBarcode').val('');
//         } else if ((TypeTrans === '22' && Status === '2') || (TypeTrans === '28' && Status === '2')) {
//             if (Ditembak === '3' && DivTujuan !== '') {
//                 alert('Barcode Dikirim ke Divisi ' + DivTujuan);
//                 $('#txtBarcode').val('');
//             } else if (Ditembak === '2' && Pengirim !== '' && DivTujuan !== '') {
//                 alert('Barcode Sudah Discan Oleh Divisi ' + DivTujuan + ', Cek Barcode di Gagal Terima');
//                 $('#txtBarcode').val('');
//             } else if (Ditembak === '3' && DivTujuan === '') {
//                 alert('Barcode Salah, Hubungi EDP');
//                 $('#txtBarcode').val('');
//             } else if (Ditembak === '2' && Pengirim !== '' && DivTujuan === '') {
//                 alert('Barcode Salah, Hubungi EDP');
//                 $('#txtBarcode').val('');
//             } else if (Ditembak === '2' && Pengirim === '') {
//                 alert('Barcode Dikirim Ke Gudang');
//                 $('#txtBarcode').val('');
//             }
//         } else if ((TypeTrans === '23' && Status === '3')) {
//             alert('Barcode Sudah Diterima Oleh Divisi ' + Divisi);
//             $('#txtBarcode').val('');
//         } else if ((TypeTrans === '25' || TypeTrans === '27')) {
//             alert('Barcode Milik Divisi ' + Divisi);
//             $('#txtBarcode').val('');
//         } else if ((TypeTrans === '26' && Status === '5') || (TypeTrans === '29' && Status === '5')) {
//             alert('Barcode Milik Divisi ' + Divisi);
//             $('#txtBarcode').val('');
//         } else if ((TypeTrans === '5' || TypeTrans === '5')) {
//             alert('Barcode Sudah Dihanguskan Oleh Divisi ' + Divisi);
//             $('#txtBarcode').val('');
//         } else if ((TypeTrans === '9' || TypeTrans === '9')) {
//             alert('Barcode Sudah Dijual Oleh Divisi ' + Divisi);
//             $('#txtBarcode').val('');
//         } else if (TypeTrans === '22' && Ditembak !== '4') {
//             alert('Barcode Tidak Jadi Dibuat Oleh Divisi ' + Divisi);
//             $('#txtBarcode').val('');
//         } else if (TypeTrans === '22' && Ditembak === '4') {
//             alert('Barcode Setengah Jadi Sudah Diterima Oleh Divisi Gudang');
//             $('#txtBarcode').val('');
//         } else if (TypeTrans === '23' || TypeTrans === '25' || TypeTrans === '29') {
//             alert('Barcode Milik Divisi ' + Divisi + ' Sudah Tidak Dipakai Lagi');
//             $('#txtBarcode').val('');
//         } else if (TypeTrans === '26') {
//             alert('Barcode Sudah Dihanguskan Oleh Divisi ' + Divisi);
//             $('#txtBarcode').val('');
//         } else if (TypeTrans === '27') {
//             alert('Barcode Sudah Dimutasi Satu Divisi Oleh Divisi ' + Divisi);
//             $('#txtBarcode').val('');
//         } else {
//             alert('Barcode Tidak Ditemukan, Hubungi EDP');
//             $('#txtBarcode').val('');
//         }
//     });
// });
