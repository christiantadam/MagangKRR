$("#tabel_Barang").DataTable();
$("#tabel_Barang2").DataTable();


 // // Click event handler for table rows
 $('#tabel_Barang tbody').on('click', 'tr', function() {
    // Get the data from the clicked row
    var nama = $(this).data('nama');
    var kode = $(this).data('kode');
    var idbrng = $(this).data('idbrng');

    // Populate the form fields with the data
    $('#input1').val(idbrng);
    $('#nama-barang').val(nama);
});

    // // Click event handler for table rows
    $('#tabel_Barang2 tbody').on('click', 'tr', function() {
    // Get the data from the clicked row
    var nama = $(this).data('nama');
    var kode = $(this).data('kode');
    var idbrng = $(this).data('idbrng');

    // Populate the form fields with the data
    $('#kd-barang').val(idbrng);
    $('#input2').val(kode);
});

// // Sample data for demonstration purposes
// const tableData = [
//     { id: 1, name: "John Doe" },
//     { id: 2, name: "Jane Smith" },
//     { id: 3, name: "Alice Johnson" },
//     // Add more data here
// ];

// function openModal() {
//     document.getElementById('myModal').style.display = 'block';
//     document.getElementById('overlay').style.display = 'block';
//     populateTable(tableData);
// }

// function closeModal() {
//     document.getElementById('myModal').style.display = 'none';
//     document.getElementById('overlay').style.display = 'none';
// }

function populateTable(data) {
    const tableBody = document.querySelector('#TableDivisi tbody');
    tableBody.innerHTML = '';

    data.forEach(item => {
        const row = `<tr>
                        <td>${item.id}</td>
                        <td>${item.name}</td>
                        <td>
                            <button onclick="addDataToForm(${item.id}, '${item.name}')">
                                Add
                            </button>
                        </td>
                    </tr>`;
        tableBody.innerHTML += row;
    });
}

function searchData() {
    const searchValue = document.getElementById('searchInput').value.toLowerCase();
    const maxRows = parseInt(document.getElementById('maxRowsInput').value);

    // Filter the tableData based on the search input
    const filteredData = tableData.filter(item => {
        return item.name.toLowerCase().includes(searchValue);
    });

    // Limit the number of rows to display based on the maxRows input
    const slicedData = filteredData.slice(0, maxRows);

    populateTable(slicedData);
}

function addDataToForm(id, name) {
    // Here, you can implement the logic to add the selected data
    // (id and name) to another form or perform any other desired action.
    console.log(`Selected Data: ID-${id}, Name-${name}`);
}

function updateData() {
    // Implement the functionality to update the data here
    // Retrieve the data from the form fields and send it to the server
    const idbrng = $('#nama-barang').val();
    const nama = $('#input1').val();
    const kode = $('#input2').val();

    // You can use Ajax or other methods to send the data to the server for updating
    console.log('Updating data...');
    console.log(`ID: ${idbrng}, Nama: ${nama}, Kode: ${kode}`);
}


