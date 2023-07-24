const selectIdKomposisi = document.getElementById("select_id_komposisi");
const selectMesin = document.getElementById("select_mesin");
const selectHp = document.getElementById("select_hp");
const selectHpNg = document.getElementById("select_hp_ng");
const selectAfalan = document.getElementById("select_afalan");

const selectObjek = document.getElementById("select_objek");
const selectKelompokUtama = document.getElementById("select_kelompok_utama");
const selectKelompok = document.getElementById("select_kelompok");
const selectSubKelompok = document.getElementById("select_sub_kelompok");
const selectType = document.getElementById("select_type");

selectIdKomposisi.addEventListener("change", function () {
    selectMesin.disabled = false;
    clearOptions(selectMesin.id);

    selectHp.disabled = true;
    selectHpNg.disabled = true;
    selectAfalan.disabled = true;
    selectObjek.disabled = true;
    selectKelompok.disabled = true;
    selectSubKelompok.disabled = true;
    selectType.disabled = true;
});

selectMesin.addEventListener("click", function () {
    fetchData(
        "ExtruderNet/getIdKomposisi/MEX/" + selectIdKomposisi.value,
        this.id
    );
});

selectMesin.addEventListener("change", function () {
    selectHp.disabled = false;
    clearOptions(selectHp.id);

    selectHpNg.disabled = true;
    selectAfalan.disabled = true;
    selectObjek.disabled = true;
    selectKelompok.disabled = true;
    selectSubKelompok.disabled = true;
    selectType.disabled = true;
});

selectHp.addEventListener("click", function () {});

//#region Functions

function fetchData(urlString, idTarget) {
    const eleTarget = document.getElementById(idTarget);
    const loadingOption = eleTarget.querySelector('[value="loading"]');

    if (eleTarget.options.length <= 3) {
        loadingOption.style.display = "block";

        fetch(urlString)
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.text();
            })
            .then((data) => {
                // console.log(urlString);
                // console.log(data);

                addOptions(idTarget, data);
                loadingOption.style.display = "none";
            })
            .catch((error) => {
                console.error("Error:", error);
                loadingOption.style.display = "none";
            });
    }
}

function addOptions(idSelect, optionData) {
    const selectEle = document.getElementById(idSelect);
    optionData = JSON.parse(optionData);

    for (let i = 0; i < optionData.length; i++) {
        const newOption = document.createElement("option");

        if (idSelect == selectMesin.id) {
            newOption.value = optionData[i].IdMesin;
            newOption.text = optionData[i].TypeMesin;
        } else if (idSelect == selectHp.id) {
            newOption.value = optionData[i].KodeBarang;
            newOption.text = optionData[i].NamaType;
        }

        selectEle.appendChild(newOption);
    }
}

function clearOptions(idSelect, onlySelection) {
    const selectEle = document.getElementById(idSelect);
    const labelEle = document.querySelector(`label[for="${idSelect}"]`);
    selectEle.selectedIndex = 0;

    if (!onlySelection) {
        selectEle.innerHTML = `
            <option selected disabled>-- Pilih ${labelEle.textContent} --</option>
            <option value="loading" style="display: none" disabled>Loading...</option>
            <option value="temp">haloDunia</option>
        `;
    }
}

//#endregion

// Button Id Komposisi (init)

// SP_5298_EXT_LIST_KOMPOSISI_1
// DB		ConnExtruder
// PARAMETERS	@iddivisi = "MEX"
// RETURN		NamaKomposisi, IdKomposisi

// Jika sdh pilih Id Komposisi

// SP_5298_EXT_LIST_KOMPOSISI_1
// DB		ConnExtruder
// PARAMETERS	@iddivisi = "MEX", @idkomposisi = txtIdKomposisi.Text
// RETURN		IdMesin, TypeMesin (Masuk ke txtIdMesin.Text, txtNamaMesin.Text)

// SP_1273_PRG_BOM_Barang
// DB		ConnInventory
// PARAMETERS	@Kode = "5", @iddivisi = "MEX", @idkomposisi = txtIdKomposisi.Text
// RETURN		KodeBarang, NamaType (Masuk ke txtKodeHP.Text, txtNamaHP.Text)

// SP_1273_PRG_BOM_Barang
// DB		ConnInventory
// PARAMETERS	@Kode = "6", @iddivisi = "MEX", @idkomposisi = txtIdKomposisi.Text
// RETURN		KodeBarang, NamaType (Masuk ke txtKodeNG.Text, txtNamaNG.Text)

// SP_1273_PRG_BOM_Barang
// DB		ConnInventory
// PARAMETERS	@Kode = "7", @iddivisi = "MEX", @idkomposisi = txtIdKomposisi.Text, @IdKelompok = "7227"
// RETURN		KodeBarang, NamaType (Masuk ke listAfalan items, items(j).subitems)
