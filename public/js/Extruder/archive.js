function getSatuan(id_type, i) {
    fetch("/ExtruderNet/getSatuan/" + id_type)
        .then((response) => response.json())
        .then((data) => {
            listSatuan.splice(0);
            listSatuan.push(data[0].SatPrimer);
            listSatuan.push(data[0].SatSekunder);
            listSatuan.push(data[0].SatTritier);

            addSpecificData("table_konversi", 3, i, listSatuan[0]);
            addSpecificData("table_konversi", 5, i, listSatuan[1]);
            addSpecificData("table_konversi", 7, i, listSatuan[2]);
        });
}
