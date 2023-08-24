let tabelStatusSupplier = document.getElementById("tabelStatusSupplier");
let idSupplier = document.getElementById("idSupplier");
let namaSupplier = document.getElementById("namaSupplier");
let idJenisSupplier = document.getElementById("idJenisSupplier");
let namaJenisSupplier = document.getElementById("namaJenisSupplier");

let btnIsi = document.getElementById("btnIsi");
let btnKoreksi = document.getElementById("btnKoreksi");
let btnProses = document.getElementById("btnProses");
let btnKeluar = document.getElementById("btnKeluar");
let btnBatal = document.getElementById("btnBatal");

let formkoreksi = document.getElementById("formkoreksi");
let methodform = document.getElementById("methodkoreksi");

btnKoreksi.addEventListener('click', function (event) {
    event.preventDefault();
});

btnBatal.addEventListener('click', function (event) {
    event.preventDefault();
    //namaBankselect.selectedIndex = 0;
    idSupplier.value = "";
    namaSupplier.value = "";
    idJenisSupplier.value = "";
    namaJenisSupplier.value = "";
});

function clickKoreksi() {
    btnIsi.disabled = true
    btnKoreksi.disabled = true;
    btnProses.style.display = "block";
    btnBatal.style.display = "block";
    proses = 2;
}

function clickBatal() {
    btnIsi.disabled = false;
    btnKoreksi.disabled = false;
    btnProses.style.display = "none";
    btnBatal.style.display = "none";
}

function fillColumns(idSupplier, namaSupplier, idJenisSupplier, namaJenisSupplier) {
    document.getElementById('idSupplier').value = idSupplier;
    document.getElementById('namaSupplier').value = namaSupplier;
    document.getElementById('idJenisSupplier').value = idJenisSupplier;
    document.getElementById('namaJenisSupplier').value = namaJenisSupplier;
}

// Event listener untuk checkbox
var checkboxes = document.querySelectorAll('.checkbox-item');
checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            if (lastChecked !== null && lastChecked !== this) {
                lastChecked.checked = false;
            }
            lastChecked = this;

            var idSupplier = this.getAttribute('data-id-supplier');
            var namaSupplier = this.getAttribute('data-nama-supplier');
            var idJenisSupplier = this.getAttribute('data-id-jenis-supplier');
            var namaJenisSupplier = this.getAttribute('data-nama-jenis-supplier');

            fillColumns(idSupplier, namaSupplier, idJenisSupplier, namaJenisSupplier);
        } else {
            lastChecked = null;
            // Clear kolom input jika checkbox tidak dipilih
            fillColumns('', '', '', '');
        }
    });
});

btnProses.addEventListener("keypress", function (event) {
    event.preventDefault();
    fetch("/detailStatusSupplier/" + idSupplier.value)
        .then((response) => response.json())
        .then((options) => {
            console.log(options);
            idSupplier.value = options[0].NO_SUP;
            namaSupplier.value = options[0].NM_SUP;
        });

});

btnProses.addEventListener ("click", function (event) {
    event.preventDefault();
    //console.log("masuk korek");
    methodform.value="PUT";
    formkoreksi.action = "/detailStatusSupplier/" + idSupplier.value;
    //formkoreksi.append(hiddenInput);
    formkoreksi.submit();

});

