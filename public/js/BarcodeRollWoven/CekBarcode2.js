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

    $(document).ready(function () {
        $('.dropdown-submenu a.test').on("click", function (e) {
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });

        var txtbarcode = document.getElementById("txtbarcode");
        var Type_Transaksi, Status, Divisi, Ditembak, Pengirim, DivTujuan;
        var splitArray = txtbarcode.value.split("-"); // Memisahkan string berdasarkan tanda "-"
        var NoIndeks = splitArray[0];

        $("#CekBarcode").on("click", function () {
            console.log(txtbarcode.value);

            // Menggabungkan ketiga permintaan fetch menjadi satu
            fetch("/CekBarcode/" + txtbarcode.value + "." + NoIndeks + ".getBarcode")
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then(data => {
                    // Handle data for the first endpoint (getBarcode)
                    console.log("Data dari getBarcode:", data);
                    Type_Transaksi = data.Type_Transaksi; // Misalnya, Anda perlu mengatur nilai Type_Transaksi dari data yang diterima
                    Status = data.Status; // Misalnya, Anda perlu mengatur nilai Status dari data yang diterima
                    Divisi = data.Divisi; // Misalnya, Anda perlu mengatur nilai Divisi dari data yang diterima
                    Ditembak = data.Ditembak; // Misalnya, Anda perlu mengatur nilai Ditembak dari data yang diterima

                    // Lanjutkan dengan permintaan kedua
                    return fetch("/CekBarcode/" + txtbarcode.value + "." + NoIndeks + ".getBarcodeKeluar");
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then(data => {
                    // Handle data for the second endpoint (getBarcodeKeluar)
                    console.log("Data dari getBarcodeKeluar:", data);

                    // Lanjutkan dengan permintaan ketiga
                    return fetch("/CekBarcode/" + txtbarcode.value + "." + NoIndeks + ".getBarcodeKirim");
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then(data => {
                    // Handle data for the third endpoint (getBarcodeKirim)
                    console.log("Data dari getBarcodeKirim:", data);

                    // Perform your alert and other logic based on the data here
                    if (Type_Transaksi === 22 && Status === "N" && Ditembak === "") {
                        alert("Barcode Tidak Jadi Dibuat oleh Divisi " + Divisi);
                    } else if (Type_Transaksi === 22 && Status === "N" && Ditembak === "4") {
                        alert("Barcode Barang Setengah Jadi Sudah Diterima Gudang");
                    } else if ((Type_Transaksi === 22 && Status === "1" && Ditembak === "1") || (Type_Transaksi === 28 && Status === "1" && Ditembak === "1")) {
                        alert("Barcode Belum Dikirim Oleh Divisi " + Divisi);
                    } else if (Type_Transaksi === 22 && Status === "1" && Ditembak === "4") {
                        alert("Barcode Barang Setengah Jadi Dikirim Ke Kerta 2");
                    } else if (Type_Transaksi === 22 && Status === "3" && Ditembak === "3") {
                        alert("Barcode Salah, Hubungi EDP");
                    } else if (Ditembak === "3" && DivTujuan !== "") {
                        alert("Barcode Dikirim ke Divisi " + DivTujuan);
                    } else if (Ditembak === "2" && Pengirim !== "" && DivTujuan !== "") {
                        alert("Barcode Sudah Discan Oleh Divisi " + DivTujuan + ", Cek Barcode di Gagal Terima");
                    } else if (Ditembak === "3" && DivTujuan === "") {
                        alert("Barcode Salah, Hubungi EDP");
                    } else if (Ditembak === "2" && Pengirim !== "" && DivTujuan === "") {
                        alert("Barcode Salah, Hubungi EDP");
                    } else if (Ditembak === "2" && Pengirim === "") {
                        alert("Barcode Dikirim Ke Gudang");
                    } else if (Type_Transaksi === 23 && Status === "3") {
                        alert("Barcode Sudah Diterima Oleh Divisi " + Divisi);
                    } else if (Type_Transaksi === 25 || Type_Transaksi === 27) {
                        alert("Barcode Milik Divisi " + Divisi);
                    } else if ((Type_Transaksi === 26 && Status === "5") || (Type_Transaksi === 29 && Status === "5")) {
                        alert("Barcode Milik Divisi " + Divisi);
                    } else if (Type_Transaksi === 5 || Type_Transaksi === 5) {
                        alert("Barcode Sudah Dihanguskan Oleh Divisi " + Divisi);
                    } else if (Type_Transaksi === 9 || Type_Transaksi === 9) {
                        alert("Barcode Sudah Dijual Oleh Divisi " + Divisi);
                    } else if (Type_Transaksi === 22 && Ditembak !== "4") {
                        alert("Barcode Tidak Jadi Dibuat Oleh Divisi " + Divisi);
                    } else if (Type_Transaksi === 22 && Ditembak === "4") {
                        alert("Barcode Setengah Jadi Sudah Diterima Oleh Divisi Gudang");
                    } else if (Type_Transaksi === 23 || Type_Transaksi === 25 || Type_Transaksi === 29) {
                        alert("Barcode Milik Divisi " + Divisi + " Sudah Tidak Dipakai Lagi");
                    } else if (Type_Transaksi === 26) {
                        alert("Barcode Sudah Dihanguskan Oleh Divisi " + Divisi);
                    } else if (Type_Transaksi === 27) {
                        alert("Barcode Sudah Dimutasi Satu Divisi Oleh Divisi " + Divisi);
                    } else {
                        alert("Barcode Tidak Ditemukan, Hubungi EDP");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                });

            event.preventDefault();
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
