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

    var txtbarcode = document.getElementById('txtbarcode')
    var Type_Transaksi, Status, Divisi, Ditembak, Pengirim;
    txtbarcode.addEventListener("click", function (event) {
        console.log(txtbarcode.value);
        fetch("/CekBarcode/" + txtbarcode.value + ".getBarcode")
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
                fetch("/CekBarcode/" + txtbarcode.value + "." + indeks.value + ".getBarcodeKeluar")
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
                        if (TypeTrans === 22 && Status === "N" && Ditembak === "") {
                            alert("Barcode Tidak Jadi Dibuat oleh Divisi " + Divisi);
                            document.getElementById('txtBarcode').value = "";
                        } else if (TypeTrans === 22 && Status === "N" && Ditembak === "4") {
                            alert("Barcode Barang Setengah Jadi Sudah Diterima Gudang");
                            document.getElementById('txtBarcode').value = "";
                        } else if ((TypeTrans === 22 && Status === "1" && Ditembak === "1") || (TypeTrans === 28 && Status === "1" && Ditembak === "1")) {
                            alert("Barcode Belum Dikirim Oleh Divisi " + Divisi);
                            document.getElementById('txtBarcode').value = "";
                        } else if (TypeTrans === 22 && Status === "1" && Ditembak === "4") {
                            alert("Barcode Barang Setengah Jadi Dikirim Ke Kerta 2");
                            document.getElementById('txtBarcode').value = "";
                        } else if (TypeTrans === 22 && Status === "3" && Ditembak === "3") {
                            alert("Barcode Salah, Hubungi EDP");
                        }

                        fetch("/CekBarcode/" + txtbarcode.value + "." + indeks.value + ".getBarcodeKeluar")
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
                                if (Ditembak === "3" && DivTujuan !== "") {
                                    alert("Barcode Dikirim ke Divisi " + DivTujuan);
                                    document.getElementById('txtBarcode').value = "";
                                } else if (Ditembak === "2" && Pengirim !== "" && DivTujuan !== "") {
                                    alert("Barcode Sudah Discan Oleh Divisi " + DivTujuan + ", Cek Barcode di Gagal Terima");
                                    document.getElementById('txtBarcode').value = "";
                                } else if (Ditembak === "3" && DivTujuan === "") {
                                    alert("Barcode Salah, Hubungi EDP");
                                    document.getElementById('txtBarcode').value = "";
                                } else if (Ditembak === "2" && Pengirim !== "" && DivTujuan === "") {
                                    alert("Barcode Salah, Hubungi EDP");
                                    document.getElementById('txtBarcode').value = "";
                                } else if (Ditembak === "2" && Pengirim === "") {
                                    alert("Barcode Dikirim Ke Gudang");
                                    document.getElementById('txtBarcode').value = "";
                                } else if (TypeTrans === 23 && Status === "3") {
                                    alert("Barcode Sudah Diterima Oleh Divisi " + Divisi);
                                    document.getElementById('txtBarcode').value = "";
                                } else if (TypeTrans === 25 || TypeTrans === 27) {
                                    alert("Barcode Milik Divisi " + Divisi);
                                    document.getElementById('txtBarcode').value = "";
                                } else if ((TypeTrans === 26 && Status === "5") || (TypeTrans === 29 && Status === "5")) {
                                    alert("Barcode Milik Divisi " + Divisi);
                                    document.getElementById('txtBarcode').value = "";
                                } else if (TypeTrans === 5 || TypeTrans1 === 5) {
                                    alert("Barcode Sudah Dihanguskan Oleh Divisi " + Divisi);
                                    document.getElementById('txtBarcode').value = "";
                                } else if (TypeTrans === 9 || TypeTrans1 === 9) {
                                    alert("Barcode Sudah Dijual Oleh Divisi " + Divisi);
                                    document.getElementById('txtBarcode').value = "";
                                } else if (TypeTrans1 === 22 && Ditembak !== "4") {
                                    alert("Barcode Tidak Jadi Dibuat Oleh Divisi " + Divisi);
                                    document.getElementById('txtBarcode').value = "";
                                } else if (TypeTrans1 === 22 && Ditembak === "4") {
                                    alert("Barcode Setengah Jadi Sudah Diterima Oleh Divisi Gudang");
                                    document.getElementById('txtBarcode').value = "";
                                } else if (TypeTrans1 === 23 || TypeTrans1 === 25 || TypeTrans1 === 29) {
                                    alert("Barcode Milik Divisi " + Divisi + " Sudah Tidak Dipakai Lagi");
                                    document.getElementById('txtBarcode').value = "";
                                } else if (TypeTrans1 === 26) {
                                    alert("Barcode Sudah Dihanguskan Oleh Divisi " + Divisi);
                                    document.getElementById('txtBarcode').value = "";
                                } else if (TypeTrans1 === 27) {
                                    alert("Barcode Sudah Dimutasi Satu Divisi Oleh Divisi " + Divisi);
                                    document.getElementById('txtBarcode').value = "";
                                } else {
                                    alert("Barcode Tidak Ditemukan, Hubungi EDP");
                                    document.getElementById('txtBarcode').value = "";
                                }

                                // Loop through the data and create table rows
                                data.forEach((item) => {
                                    Type_Transaksi = item.Type_Transaksi;
                                    Status = item.Status;
                                    Divisi = item.IdDivisi;
                                    Ditembak = item.Ditembak;
                                    Pengirim = item.NoTempTrans;
                                    DivTujuan = item.Divisi
                                });

                                // Redraw the table to show the changes

                            })
                            .catch((error) => {
                                console.error("Error:", error);
                            });


                        // Loop through the data and create table rows
                        data.forEach((item) => {
                            Type_Transaksi = item.Type_Transaksi;
                            Status = item.Status;
                            Divisi = item.IdDivisi;
                            Ditembak = item.Ditembak;
                            Pengirim = item.NoTempTrans;
                            DivTujuan = item.Divisi
                        });

                        // Redraw the table to show the changes

                    })
                    .catch((error) => {
                        console.error("Error:", error);
                    });

                // Loop through the data and create table rows
                data.forEach((item) => {
                    Type_Transaksi = item.Type_Transaksi;
                    Status = item.Status;
                    Divisi = item.IdDivisi;
                    Ditembak = item.Ditembak;
                    Pengirim = item.NoTempTrans;
                    DivTujuan = item.Divisi
                });

                // Redraw the table to show the changes

            })
            .catch((error) => {
                console.error("Error:", error);
            });
        event.preventDefault();
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
