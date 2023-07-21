const selectObjek = document.getElementById("select_objek");
const selectKelompokUtama = document.getElementById("select_kelompok_utama");
const selectKelompok = document.getElementById("select_kelompok");
const selectSubKelompok = document.getElementById("select_sub_kelompok");

selectObjek.addEventListener("change", function () {
    const isEnabled = selectObjek.value != "-- Pilih Objek --";
    selectKelompokUtama.disabled = !isEnabled;

    fetchData(
        "/ExtruderNet/formKomposisiTropodo/kelompokUtama/" + selectObjek.value,
        selectKelompokUtama.id
    );
});

selectKelompokUtama.addEventListener("change", function () {
    if (selectKelompokUtama.value == "0117") {
        /*
        Beri pesan konfirmasi berisi
        "Anda akan memasukkan data bahan pembantu \n
        Apakah Anda sudah memasukkan SEMUA BAHAN BAKU ??"
        Bila pilih "YA", enable selectKelompok
        */
    } else {
        const isEnabled = selectObjek.value != "-- Pilih Kelompok Utama --";
        selectKelompok.disabled = !isEnabled;

        fetchData(
            "/ExtruderNet/formKomposisiTropodo/kelompok/" +
                selectKelompokUtama.value,
            selectKelompok.id
        );
    }
});

/*
button kelompok

SP_5298_EXT_IDKELOMPOKUTAMA_KELOMPOK

db 	inventory
param 	@XIdKelompokUtama_Kelompok = txtIdKelut.Text
return 	"NamaKelompok", "IdKelompok"

jika id kelompok utama "0057", "0121", "0009"
	SP_5298_EXT_CEK_KELOMPOK_MESIN
	db	extruder
	param	@idkel = txtIdKelompok.Text
	// untuk membandingkan mesin yang di db INV dgn db EXT
	jika tidak sama maka beri pesan "Mesin tidak sama"
*/

//#region Utilities

function fetchData(urlString, eleTarget) {
    fetch(urlString)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.text();
        })
        .then((data) => {
            // console.log(urlString);
            console.log(data);

            addOption(eleTarget, data);
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function addOption(idSelect, optionData) {
    const selectEle = document.getElementById(idSelect);
    optionData = JSON.parse(optionData);

    for (let i = 0; i < optionData.length; i++) {
        const newOption = document.createElement("option");

        if (idSelect == selectKelompokUtama.id) {
            newOption.value = optionData[i].IdKelompokUtama;
            newOption.text = optionData[i].NamaKelompokUtama;
        } else if (idSelect == selectKelompok.id) {
            newOption.value = optionData[i].IdKelompok;
            newOption.text = optionData[i].NamaKelompok;
        }

        selectEle.appendChild(newOption);
    }
}

//#endregion
