$(document).ready(function() {
    $('.dropdown-submenu a.test').on("click", function(e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    var ButtonPrint = document.getElementById('ButtonPrint');
    var MasukanNomorBarcode = document.getElementById("Masukan_nomor_barcode");

    // ButtonPrint.addEventListener("click", function(event) {
    //     const IdBarcode = MasukanNomorBarcode.value;
    //     const card = document.getElementById("card");
    //     console.log(IdBarcode);
    //     JsBarcode("#barcode", IdBarcode);
    //     card.hidden = true;
    // });

    MasukanNomorBarcode.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            event.preventDefault(); // Prevent default form submission
            const IdBarcode = MasukanNomorBarcode.value;
            const card = document.getElementById("card");
            console.log(IdBarcode);
            JsBarcode("#barcode", IdBarcode); //Source: https://lindell.me/JsBarcode/#download
        }
    });
});

function printDiv() {
    var divContents = document.getElementById("printSection").innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = divContents;
    window.print();
    document.body.innerHTML = originalContents;
}
