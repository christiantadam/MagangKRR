$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#TableSubKelompok').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    var ButtonShift = document.getElementById('ButtonShift')
    ButtonShift.addEventListener("click", function (event) {
        event.preventDefault();
    });

    // Dapatkan elemen input tanggal pertama dan kedua
    const tanggalInput = document.getElementById("tanggalInput");
    const tanggalOutput = document.getElementById("tanggalOutput");

    // Tambahkan event listener ke input tanggal pertama untuk mengupdate input tanggal kedua
    tanggalInput.addEventListener("input", function () {
        // Dapatkan nilai tanggal yang dipilih dari input tanggal pertama
        const selectedDate = tanggalInput.value;

        // Update nilai input tanggal kedua dengan tanggal yang dipilih
        tanggalOutput.value = selectedDate;
    });

});

// Function to set the selected shift value and close the modal
function setShiftValue() {
    // Get the selected shift value from the modal input
    const selectedShift = document.getElementById("Shift").value;

    // Set the selected shift value to the read-only input with the ID "shift"
    document.getElementById("shift").value = selectedShift;

    // Close the modal
    closeModal();
}

function openModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal1() {
    var modal = document.getElementById('myModal1');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal1() {
    var modal = document.getElementById('myModal1');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}

function openModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'block'; // Tampilkan modal dengan mengubah properti "display"
}

function closeModal2() {
    var modal = document.getElementById('myModal2');
    modal.style.display = 'none'; // Sembunyikan modal dengan mengubah properti "display"
}
