let kasKecil = document.getElementById('kasKecil');
let kasBesar = document.getElementById('kasBesar');
let btnOK = document.getElementById('btnOK');
let bulan = document.getElementById('bulan');
let tahun = document.getElementById('tahun');
let BlnThn = document.getElementById('BlnThn');
let tabelKiri = document.getElementById('tabelKiri');
let dataTable = $("#tabelKiri").DataTable();

let lastCheckedCheckbox = null;

let idBKM = document.getElementById('idBKM');

let selectedRow = null;

let IdPelunasan;

btnOK.addEventListener('click', function(event) {
    event.preventDefault();
    BlnThn.value = (bulan.value).toString() + (tahun.value).substring(2).toString();

    // Hapus data yang ada dalam tabel sebelum menambahkan data baru
    if (dataTable) {
        dataTable.clear().draw();
    }

    // Memanggil fungsi untuk menampilkan data sesuai dengan radiobutton yang dicentang
    if (kasKecil.checked) {
        fetchData("/getIdBKMBatal5/" + BlnThn.value);
    } else if (kasBesar.checked) {
        fetchData("/getIdBKMBatal6/" + BlnThn.value);
    }
});

document.getElementById('tabelKiri').addEventListener('change', function(event) {
    if (event.target.getAttribute('name') === 'divisiCheckbox') {
        const checkbox = event.target;

        if (checkbox.checked) {
            if (lastCheckedCheckbox && lastCheckedCheckbox !== checkbox) {
                lastCheckedCheckbox.checked = false;
            }
            lastCheckedCheckbox = checkbox;
            // Dapatkan elemen tr yang mengandung checkbox yang diperiksa
            const tableRow = checkbox.closest('tr');
            // Dapatkan semua elemen <td> dalam baris tersebut
            const tableCells = Array.from(tableRow.getElementsByTagName('td'));
            const id_bkm = tableCells[0].textContent;
            if (idBKM) {
                idBKM.value = id_bkm;
            }
        } else {
            if (idBKM) {
                idBKM.value = '';
            }
        }
    }
});

function fetchData(url) {
console.log(url);
    fetch(url)
    .then((response) => response.json())
    .then((options) => {
        // Filter data berdasarkan ID_BKM yang dipilih
        // const filteredOptions = options.filter(option => selectedIdBKMs.includes(option.Id_BKM));
        console.log(options);
        // Menambahkan data ke dalam tabel
        dataTable = $("#tabelKiri").DataTable({
            destroy:true,
            data: options,
            columns: [
                {
                    title: "Id. BKM", data: "Id_BKM",
                    render: function (data) {
                        return `<input type="checkbox" name="divisiCheckbox" value="${data}" /> ${data}`;
                    },
                },
                { title: "Bank", data: "Id_bank" },
                { title: "Jns. Lunas", data: "Jenis_Pembayaran" },
                { title: "Mata Uang", data: "Symbol" },
                { title: "Nilai Pelunasan", data: "Nilai_Pelunasan" }
            ]
        });
        tabelKiri.on('change', 'input[name="divisiCheckbox"]', function() {
            $('input[name="divisiCheckbox"]').not(this).prop('checked', false);

            if ($(this).prop("checked")) {
                const checkedCheckbox = tabelKiri.row($(this).closest('tr')).data();
                idBKM.value = checkedCheckbox.Id_BKM;
            } else {
                idBKM.value = "";
            }
        });
    });
}
