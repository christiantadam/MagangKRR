$(document).ready(function() {
    $('#table_Divisi').DataTable({
        order: [
            [0, 'asc']
        ],
    });



    // Function to remove the backdrop
    function removeBackdrop() {
        $('.modal-backdrop').remove();
    }

    // Function to show the modal
    function showModalDivisi() {
        $('#modalKdPeg').addClass('show');
        $('#modalKdPeg').css('display', 'block');
        $('body').addClass('modal-open');
    }

    // Function to hide the modal
    function hideModalDivisi() {
        $('#modalKdPeg').removeClass('show');
        $('#modalKdPeg').css('display', 'none');
        $('body').removeClass('modal-open');
        removeBackdrop();
    }

    function showModalPegawai() {
        $('#modalPeg').addClass('show');
        $('#modalPeg').css('display', 'block');
        $('body').addClass('modal-open');
    }

    // Function to hide the modal
    function hideModalPegawai() {
        $('#modalPeg').removeClass('show');
        $('#modalPeg').css('display', 'none');
        $('body').removeClass('modal-open');
        removeBackdrop();
    }

    // Attach click event to DataTable rows
    $('#table_Divisi tbody').on('click', 'tr', function() {
        // Get the data from the clicked row
        var rowData = $('#table_Divisi').DataTable().row(this).data();
        // Populate the input fields with the data
        $('#Id_Div').val(rowData[0]);
        $('#Nama_Div').val(rowData[1]);
        fetch("/getPegawai/" + rowData[0])
            .then(response => {

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // Assuming the response is in JSON format
            })
            .then(data => {

                // Handle the data retrieved from the server (data should be an object or an array)

                // Clear the existing table rows
                $('#table_Peg').DataTable().clear().draw();

                // Loop through the data and create table rows
                data.forEach(item => {
                    var row = [item.kd_pegawai, item.nama_peg];
                    $('#table_Peg').DataTable().row.add(row);
                });

                // Redraw the table to show the changes
                $('#table_Peg').DataTable().draw();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        // var idDivValue = rowData[0];
        // submitFormWithIdDiv(idDivValue);
        // Hide the modal immediately after populating the data
        hideModalDivisi();
    });
    $('#table_Peg').DataTable({
        order: [
            [0, 'asc']
        ]
    });

    // Attach click event to table rows
    $('#table_Peg tbody').on('click', 'tr', function() {
        // Get the data from the clicked row
        console.log($('#table_Peg').DataTable().row(this));
        var rowData = $('#table_Peg').DataTable().row(this).data();
        console.log(rowData);
        // Populate the input fields with the data
        $('#Id_Peg').val(rowData[0]);
        $('#Nama_Peg').val(rowData[1]);

        // Hide the modal immediately after populating the data
        hideModalPegawai();
    });
    $('#table_Divisi_Baru').DataTable({
        order: [
            [0, 'asc']
        ]
    });
    $('#table_Divisi_Baru tbody').on('click', 'tr', function() {
        // Get the data from the clicked row

        var rowData = $('#table_Divisi_Baru').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#Id_Div_Baru').val(rowData[0]);
        $('#Nama_Div_Baru').val(rowData[1]);

        // Hide the modal immediately after populating the data
        hideModalDivisiBaru();
    });
    function showModalDivisiBaru() {
        $('#modalDivisiBaru').addClass('show');
        $('#modalDivisiBaru').css('display', 'block');
        $('body').addClass('modal-open');
    }

    // Function to hide the modal
    function hideModalDivisiBaru() {
        $('#modalDivisiBaru').removeClass('show');
        $('#modalDivisiBaru').css('display', 'none');
        $('body').removeClass('modal-open');
        removeBackdrop();
    }

    $('#table_Shift').DataTable({
        order: [
            [0, 'asc']
        ]
    });
    $('#table_Shift tbody').on('click', 'tr', function() {
        // Get the data from the clicked row

        var rowData = $('#table_Shift').DataTable().row(this).data();

        // Populate the input fields with the data
        $('#Shift').val(rowData[0]);
        $('#Jam').val(rowData[1]);

        // Hide the modal immediately after populating the data
        hideModalShift();
    });
    function showModalShift() {
        $('#modalShift').addClass('show');
        $('#modalShift').css('display', 'block');
        $('body').addClass('modal-open');
    }

    // Function to hide the modal
    function hideModalShift() {
        $('#modalShift').removeClass('show');
        $('#modalShift').css('display', 'none');
        $('body').removeClass('modal-open');
        removeBackdrop();
    }


    // Attach click event to the button to show the modal
    $('#divisiButton').on('click', function() {
        showModalDivisi();
    });

    // Attach hidden event to the modal
    $('#modalKdPeg').on('hidden.bs.modal', function() {
        removeBackdrop();
    });

});
