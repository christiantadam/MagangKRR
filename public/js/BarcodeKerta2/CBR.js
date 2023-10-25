// $(document).ready(function() {
//     $('.dropdown-submenu a.test').on("click", function(e) {
//         $(this).next('ul').toggle();
//         e.stopPropagation();
//         e.preventDefault();
//     });

//     var ButtonPrint = document.getElementById('ButtonPrint');
//     var MasukanNomorBarcode = document.getElementById("Masukan_nomor_barcode");

//     // ButtonPrint.addEventListener("click", function(event) {
//     //     const IdBarcode = MasukanNomorBarcode.value;
//     //     const card = document.getElementById("card");
//     //     console.log(IdBarcode);
//     //     JsBarcode("#barcode", IdBarcode);
//     //     card.hidden = true;
//     // });

//     MasukanNomorBarcode.addEventListener("keydown", function(event) {
//         if (event.key === "Enter") {
//             event.preventDefault(); // Prevent default form submission
//             const IdBarcode = MasukanNomorBarcode.value;
//             const card = document.getElementById("card");
//             console.log(IdBarcode);
//             JsBarcode("#barcode", IdBarcode); //Source: https://lindell.me/JsBarcode/#download
//         }
//     });
// });

// function printDiv() {
//     // var divContents = document.getElementById("printSection").innerHTML;
//     // var originalContents = document.body.innerHTML;
//     // document.body.innerHTML = divContents;
//     window.print();
//     // document.body.innerHTML = originalContents;
// }

$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    var ButtonPrint = document.getElementById('ButtonPrint');
    var MasukanNomorBarcode = document.getElementById("Masukan_nomor_barcode");

    ButtonPrint.addEventListener("click", function (event) {
        // // Mengambil nilai dari input box
        const IdBarcode = MasukanNomorBarcode.value;

        // // Memeriksa apakah input masih kosong
        // if (IdBarcode.trim() === "") {
        //     // Menampilkan alert jika input masih kosong
        //     alert("Input barcode masih kosong. Mohon isi terlebih dahulu.");
        // } else {
        //     // Jika input tidak kosong, maka proses pencetakan barcode
        //     const card = document.getElementById("card");
        //     console.log(IdBarcode);
        //     JsBarcode("#barcode", IdBarcode);
        //     card.hidden = true;
        // }
        var ScanBarcodeValue = document.getElementById('Masukan_nomor_barcode').value;
        console.log(ScanBarcodeValue);

        var parts = ScanBarcodeValue.split("-");
        console.log(parts); // Output: ["A123", "a234"]

        fetch(`/ABM/BarcodeKerta2/CBR/${parts[0]}.${parts[1]}.getDataStatus`)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then(data => {
                // Handle the data retrieved from the server (data should be an object or an array)
                console.log("Data dari server:", data);

                // Assuming sts is a property in the data object, adjust this part accordingly
                var sts = data;

                // Handling different statuses
                if (sts === "1") {
                    const card = document.getElementById("card");
                    console.log(IdBarcode);
                    JsBarcode("#barcode", IdBarcode);
                    window.print();
                } else if (sts === "2") {
                    // Do something for status 2
                    alert("sudah di kirim ke gudang");
                } else if (sts === "3") {
                    // Do something for status 3
                    alert("sudah diterima oleh gudang");
                } else {
                    // Do something for other statuses
                    alert("Data Barcode Tidak Ditemukan!");
                }
            })
            .catch(error => {
                console.error("Error checking status:", error);
            });
    });

    // MasukanNomorBarcode.addEventListener("keydown", function (event) {
    //     if (event.key === "Enter") {
    //         event.preventDefault(); // Prevent default form submission
    //         const IdBarcode = MasukanNomorBarcode.value;

    //         // Memeriksa apakah input masih kosong saat Enter ditekan
    //         if (IdBarcode.trim() === "") {
    //             // Menampilkan alert jika input masih kosong
    //             alert("Input barcode masih kosong. Mohon isi terlebih dahulu.");
    //         } else {
    //             // Jika input tidak kosong, maka proses pencetakan barcode
    //             const card = document.getElementById("card");
    //             console.log(IdBarcode);
    //             JsBarcode("#barcode", IdBarcode);
    //         }
    //     }
    // });
});

function printDiv() {
    window.print();
}
