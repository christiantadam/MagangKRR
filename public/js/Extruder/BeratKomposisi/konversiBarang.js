//#region Variables
const dateInput = document.getElementById("tanggal_input");
const dateLoading = document.getElementById("tanggal_loading_bc");

const txtKodeBarang = document.getElementById("kode_barang");
const txtNoKonversi = document.getElementById("no_konversi");
const txtType = document.getElementById("type_berat");
const txtJenisBarang = document.getElementById("jenis_barang");
const txtSubKategori = document.getElementById("sub_kategori");
const spnBeratStandar = document.getElementById("lbl_berat_standar");

const numBeratStandar = document.getElementById("berat_standar");
const numTerkandung = document.getElementById("terkandung");
const numWaste = document.getElementById("waste");

const num_PP_kg = document.getElementById("PP_kg");
const num_PP_persen = document.getElementById("PP_persen");
const num_PP_koef = document.getElementById("koef_PP");

const num_PE_kg = document.getElementById("PE_kg");
const num_PE_persen = document.getElementById("PE_persen");
const num_PE_koef = document.getElementById("koef_PE");

const num_CaCO3_kg = document.getElementById("CaCO3_kg");
const num_CaCO3_persen = document.getElementById("CaCO3_persen");
const num_CaCO3_koef = document.getElementById("koef_CaCO3");

const num_Masterbatch_kg = document.getElementById("Masterbatch_kg");
const num_Masterbatch_persen = document.getElementById("Masterbatch_persen");
const num_Masterbatch_koef = document.getElementById("koef_Masterbatch");

const num_UV_kg = document.getElementById("UV_kg");
const num_UV_persen = document.getElementById("UV_persen");
const num_UV_koef = document.getElementById("koef_UV");

const num_AntiStatic_kg = document.getElementById("Anti_Static_kg");
const num_AntiStatic_persen = document.getElementById("Anti_Static_persen");
const num_AntiStatic_koef = document.getElementById("koef_Anti_Static");

const num_Conductive_kg = document.getElementById("Conductive_kg");
const num_Conductive_persen = document.getElementById("Conductive_persen");
const num_Conductive_koef = document.getElementById("koef_Conductive");

const num_LDPE_kg = document.getElementById("LDPE_kg");
const num_LDPE_persen = document.getElementById("LDPE_persen");
const num_LDPE_koef = document.getElementById("koef_LDPE");

const num_LLDPE_kg = document.getElementById("LLDPE_kg");
const num_LLDPE_persen = document.getElementById("LLDPE_persen");
const num_LLDPE_koef = document.getElementById("koef_LLDPE");

const num_HDPE_kg = document.getElementById("HDPE_kg");
const num_HDPE_persen = document.getElementById("HDPE_persen");
const num_HDPE_koef = document.getElementById("koef_HDPE");

const num_Total_kg = document.getElementById("Total_kg");
const num_Total_persen = document.getElementById("Total_persen");
const num_Total_koef = document.getElementById("koef_Total");

const btnIsi = document.getElementById("btn_isi");
const btnKoreksi = document.getElementById("btn_koreksi");
const btnHapus = document.getElementById("btn_hapus");
const btnTgl = document.getElementById("btn_tgl");
const btnProses = document.getElementById("btn_proses");
const btnPrint = document.getElementById("btn_print");
const btnKeluar = document.getElementById("btn_keluar");

const listKonversi = [];
/** ISI LIST KONVERSI
 * 0 Tanggal
 * 1 NoKonversi
 * 2 BeratStandart
 * 3 KoefPP
 * 4 KoefPE
 * 5 KoefCaCO3
 * 6 KoefMB
 * 7 KoefUV
 * 8 KoefAS
 * 9 KoefConductive
 * 10 KoefLDPE
 * 11 KoefLLDPE
 * 12 KoefHDPE
 * 13 Tgl_LoadingBC
 */

const posKonversi = $("#table_konversi").offset().top - 125;
const colKonversi = [
    { width: "100px" }, // Tanggal
    { width: "100px" }, // No. Konversi
    { width: "125px" }, // Berat Standar
    { width: "100px" }, // Koef. PP
    { width: "100px" }, // Koef. PE
    { width: "100px" }, // Koef. CaCO3
    { width: "100px" }, // Koef. MB
    { width: "100px" }, // Koef. UV
    { width: "100px" }, // Koef. AS
    { width: "100px" }, // Koef. Cond.
    { width: "100px" }, // Koef. LDPE
    { width: "100px" }, // Koef. LLDPE
    { width: "100px" }, // Koef. HDPE
    { width: "100px" }, // Tgl. Loading
];

const groupKomposisi = document.querySelectorAll(".card input");
const allTxtKomposisi = document.querySelectorAll("input.txt_komposisi");
const allTxt = document.querySelectorAll('input:not([type="date"]), textarea');
const allBtn = document.querySelectorAll("button");

var proses,
    jualKg = ["", ""];
var berat1,
    berat2 = [0, 0];
//#endregion

//#region Events
btnKeluar.addEventListener("click", function () {
    if (this.textContent != "Keluar") {
        btnKeluar.textContent = "Keluar";
        txtKodeBarang.disabled = true;
        groupKomposisi.forEach((ele) => (ele.disabled = true));
        btnProses.disabled = true;
        btnIsi.disabled = false;
        btnKoreksi.disabled = false;
        btnHapus.disabled = false;
        clearForm();
    } else window.location.href = "/Extruder/BeratKomposisi";
});

btnIsi.addEventListener("click", function () {
    txtKodeBarang.disabled = false;
    groupKomposisi.forEach((ele) => (ele.disabled = false));
    btnKeluar.textContent = "Batal";
    proses = "1";
    btnProses.disabled = false;
    btnPrint.disabled = false;
    btnKoreksi.disabled = true;
    btnHapus.disabled = true;
    clearForm();
    txtKodeBarang.focus();
});

btnProses.addEventListener("click", function () {
    if (txtKodeBarang.value.trim() != "") {
        if (proses == "4") {
            fetchStmt(
                "/komposisiKonversi/SP_1273_INV_Insert_KonversiKomposisi_1~4/" +
                    dateInput.value +
                    "~" +
                    txtNoKonversi.value.trim() +
                    "~" +
                    dateLoading.value,
                () => {
                    alert("Tgl. Loading Sukses Tersimpan.");
                    clearForm();
                    btnKeluar.textContent = "Keluar";
                    txtKodeBarang.disabled = true;
                    groupKomposisi.forEach((ele) => (ele.disabled = true));
                    btnProses.disabled = true;
                    btnIsi.disabled = false;
                    btnKoreksi.disabled = false;
                    btnHapus.disabled = false;
                }
            );
        } else {
            let is_empty = false;
            let total_komposisi = 0;
            allTxtKomposisi.forEach((ele) => {
                if (ele.value == "") is_empty = true;
                total_komposisi += parseFloat(ele.value);
            });

            if (!is_empty) {
                num_PP_persen.value = (
                    (parseFloat(num_PP_kg.value) /
                        parseFloat(numBeratStandar.value)) *
                    100
                ).toFixed(4);

                num_PE_persen.value = (
                    (parseFloat(num_PE_kg.value) /
                        parseFloat(numBeratStandar.value)) *
                    100
                ).toFixed(4);

                num_CaCO3_persen.value = (
                    (parseFloat(num_CaCO3_kg.value) /
                        parseFloat(numBeratStandar.value)) *
                    100
                ).toFixed(4);

                num_Masterbatch_persen.value = (
                    (parseFloat(num_Masterbatch_kg.value) /
                        parseFloat(numBeratStandar.value)) *
                    100
                ).toFixed(4);

                num_UV_persen.value = (
                    (parseFloat(num_UV_kg.value) /
                        parseFloat(numBeratStandar.value)) *
                    100
                ).toFixed(4);

                num_AntiStatic_persen.value = (
                    (parseFloat(num_AntiStatic_kg.value) /
                        parseFloat(numBeratStandar.value)) *
                    100
                ).toFixed(4);

                num_Conductive_persen.value = (
                    (parseFloat(num_Conductive_kg.value) /
                        parseFloat(numBeratStandar.value)) *
                    100
                ).toFixed(4);

                num_LDPE_persen.value = (
                    (parseFloat(num_LDPE_kg.value) /
                        parseFloat(numBeratStandar.value)) *
                    100
                ).toFixed(4);

                num_LLDPE_persen.value = (
                    (parseFloat(num_LLDPE_kg.value) /
                        parseFloat(numBeratStandar.value)) *
                    100
                ).toFixed(4);

                num_HDPE_persen.value = (
                    (parseFloat(num_HDPE_kg.value) /
                        parseFloat(numBeratStandar.value)) *
                    100
                ).toFixed(4);

                num_Total_kg.value = total_komposisi;
                num_Total_persen.value = (
                    parseFloat(num_PP_persen.value) +
                    parseFloat(num_PE_persen.value) +
                    parseFloat(num_CaCO3_persen.value) +
                    parseFloat(num_Masterbatch_persen.value) +
                    parseFloat(num_UV_persen.value) +
                    parseFloat(num_AntiStatic_persen.value) +
                    parseFloat(num_Conductive_persen.value) +
                    parseFloat(num_LDPE_persen.value) +
                    parseFloat(num_LLDPE_persen.value) +
                    parseFloat(num_HDPE_persen.value)
                ).toFixed(0);

                if (jualKg == "Y") {
                    num_PP_koef.value = (
                        parseFloat(num_PP_kg.value) /
                        parseFloat(numBeratStandar.value)
                    ).toFixed(4);

                    num_PE_koef.value = (
                        parseFloat(num_PE_kg.value) /
                        parseFloat(numBeratStandar.value)
                    ).toFixed(4);

                    num_CaCO3_koef.value = (
                        parseFloat(num_CaCO3_kg.value) /
                        parseFloat(numBeratStandar.value)
                    ).toFixed(4);

                    num_Masterbatch_koef.value = (
                        parseFloat(num_Masterbatch_kg.value) /
                        parseFloat(numBeratStandar.value)
                    ).toFixed(4);

                    num_UV_koef.value = (
                        parseFloat(num_UV_kg.value) /
                        parseFloat(numBeratStandar.value)
                    ).toFixed(4);

                    num_AntiStatic_koef.value = (
                        parseFloat(num_AntiStatic_kg.value) /
                        parseFloat(numBeratStandar.value)
                    ).toFixed(4);

                    num_Conductive_koef.value = (
                        parseFloat(num_Conductive_kg.value) /
                        parseFloat(numBeratStandar.value)
                    ).toFixed(4);

                    num_LDPE_koef.value = (
                        parseFloat(num_LDPE_kg.value) /
                        parseFloat(numBeratStandar.value)
                    ).toFixed(4);

                    num_LLDPE_koef.value = (
                        parseFloat(num_LLDPE_kg.value) /
                        parseFloat(numBeratStandar.value)
                    ).toFixed(4);

                    num_HDPE_koef.value = (
                        parseFloat(num_HDPE_kg.value) /
                        parseFloat(numBeratStandar.value)
                    ).toFixed(4);
                } else if (jualKg == "D") {
                    num_PP_koef.value = (
                        parseFloat(num_PP_kg.value) * 0.9144
                    ).toFixed(4);

                    num_PE_koef.value = (
                        parseFloat(num_PE_kg.value) * 0.9144
                    ).toFixed(4);

                    num_CaCO3_koef.value = (
                        parseFloat(num_CaCO3_kg.value) * 0.9144
                    ).toFixed(4);

                    num_Masterbatch_koef.value = (
                        parseFloat(num_Masterbatch_kg.value) * 0.9144
                    ).toFixed(4);

                    num_UV_koef.value = (
                        parseFloat(num_UV_kg.value) * 0.9144
                    ).toFixed(4);

                    num_AntiStatic_koef.value = (
                        parseFloat(num_AntiStatic_kg.value) * 0.9144
                    ).toFixed(4);

                    num_Conductive_koef.value = (
                        parseFloat(num_Conductive_kg.value) * 0.9144
                    ).toFixed(4);

                    num_LDPE_koef.value = (
                        parseFloat(num_LDPE_kg.value) * 0.9144
                    ).toFixed(4);

                    num_LLDPE_koef.value = (
                        parseFloat(num_LLDPE_kg.value) * 0.9144
                    ).toFixed(4);

                    num_HDPE_koef.value = (
                        parseFloat(num_HDPE_kg.value) * 0.9144
                    ).toFixed(4);
                } else {
                    num_PP_koef.value = (
                        parseFloat(num_PP_kg.value) /
                        (parseFloat(numTerkandung.value) / 100)
                    ).toFixed(4);

                    num_PE_koef.value = (
                        parseFloat(num_PE_kg.value) /
                        (parseFloat(numTerkandung.value) / 100)
                    ).toFixed(4);

                    num_CaCO3_koef.value = (
                        parseFloat(num_CaCO3_kg.value) /
                        (parseFloat(numTerkandung.value) / 100)
                    ).toFixed(4);

                    num_Masterbatch_koef.value = (
                        parseFloat(num_Masterbatch_kg.value) /
                        (parseFloat(numTerkandung.value) / 100)
                    ).toFixed(4);

                    num_UV_koef.value = (
                        parseFloat(num_UV_kg.value) /
                        (parseFloat(numTerkandung.value) / 100)
                    ).toFixed(4);

                    num_AntiStatic_koef.value = (
                        parseFloat(num_AntiStatic_kg.value) /
                        (parseFloat(numTerkandung.value) / 100)
                    ).toFixed(4);

                    num_Conductive_koef.value = (
                        parseFloat(num_Conductive_kg.value) /
                        (parseFloat(numTerkandung.value) / 100)
                    ).toFixed(4);

                    num_LDPE_koef.value = (
                        parseFloat(num_LDPE_kg.value) /
                        (parseFloat(numTerkandung.value) / 100)
                    ).toFixed(4);

                    num_LLDPE_koef.value = (
                        parseFloat(num_LLDPE_kg.value) /
                        (parseFloat(numTerkandung.value) / 100)
                    ).toFixed(4);

                    num_HDPE_koef.value = (
                        parseFloat(num_HDPE_kg.value) /
                        (parseFloat(numTerkandung.value) / 100)
                    ).toFixed(4);
                }

                num_Total_koef.value = (
                    parseFloat(num_PP_koef.value) +
                    parseFloat(num_PE_koef.value) +
                    parseFloat(num_CaCO3_koef.value) +
                    parseFloat(num_Masterbatch_koef.value) +
                    parseFloat(num_UV_koef.value) +
                    parseFloat(num_AntiStatic_koef.value) +
                    parseFloat(num_Conductive_koef.value) +
                    parseFloat(num_LDPE_koef.value) +
                    parseFloat(num_LLDPE_koef.value) +
                    parseFloat(num_HDPE_koef.value)
                ).toFixed(4);

                let [
                    berat_standar,
                    pp,
                    pe,
                    caco3,
                    masterbatch,
                    uv,
                    antistatic,
                    conductive,
                    ldpe,
                    lldpe,
                    hdpe,
                ] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                let [
                    koef_pp,
                    koef_pe,
                    koef_caco3,
                    koef_masterbatch,
                    koef_uv,
                    koef_antistatic,
                    koef_conductive,
                    koef_ldpe,
                    koef_lldpe,
                    koef_hdpe,
                ] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

                fetchSelect(
                    "komposisiKonversi/SP_1273_INV_Cek_KonversiKomposisi_1~4/" +
                        txtKodeBarang.value.trim(),
                    (data) => {
                        if (data.length > 0) {
                            berat_standar = data[0].BeratStandart;
                            pp = data[0].PP;
                            pe = data[0].PE;
                            caco3 = data[0].CaCO3;
                            masterbatch = data[0].Masterbatch;
                            uv = data[0].UV;
                            antistatic = data[0].AntiStatic;
                            conductive = data[0].Conductive;
                            ldpe = data[0].LDPELami;
                            lldpe = data[0].LLDPEInner;
                            hdpe = data[0].HDPEInner;
                            koef_pp = data[0].KoefPP;
                            koef_pe = data[0].KoefPE;
                            koef_caco3 = data[0].KoefCaCO3;
                            koef_masterbatch = data[0].KoefMasterbatch;
                            koef_uv = data[0].KoefUV;
                            koef_antistatic = data[0].KoefAntiStatic;
                            koef_conductive = data[0].KoefConductive;
                            koef_ldpe = data[0].KoefLDPELami;
                            koef_lldpe = data[0].KoefLLDPEInner;
                            koef_hdpe = data[0].KoefHDPEInner;

                            if (
                                berat_standar == numBeratStandar.value &&
                                pp == num_PP_kg.value &&
                                pe == num_PE_kg.value &&
                                caco3 == num_CaCO3_kg.value &&
                                masterbatch == num_Masterbatch_kg.value &&
                                uv == num_UV_kg.value &&
                                antistatic == num_AntiStatic_kg.value &&
                                conductive == num_Conductive_kg.value &&
                                ldpe == num_LDPE_kg.value &&
                                hdpe == num_HDPE_kg.value &&
                                koef_pp == num_PP_koef.value &&
                                koef_pe == num_PE_koef.value &&
                                koef_caco3 == num_CaCO3_koef.value &&
                                koef_masterbatch ==
                                    num_Masterbatch_koef.value &&
                                koef_uv == num_UV_koef.value &&
                                koef_antistatic == num_AntiStatic_koef.value &&
                                koef_conductive == num_Conductive_koef.value &&
                                koef_ldpe == num_LDPE_koef.value &&
                                koef_hdpe == num_HDPE_koef.value
                            ) {
                                alert(
                                    "Tidak Ada Perubahan Data, Konversi Tidak Dapat Disimpan !"
                                );
                                clearForm();
                                txtKodeBarang.select();
                                return;
                            }

                            if (
                                parseFloat(num_Total_kg.value) ==
                                parseFloat(numBeratStandar.value)
                            ) {
                                if (proses == "1") {
                                    fetchStmt(
                                        "/komposisiKonversi/SP_1273_INV_Insert_KonversiKomposisi_1~1/" +
                                            dateInput.value +
                                            "~" +
                                            txtNoKonversi.value +
                                            "~" +
                                            txtKodeBarang.value +
                                            "~" +
                                            numBeratStandar.value +
                                            "~" +
                                            txtJenisBarang.value +
                                            "~" +
                                            numTerkandung.value +
                                            "~" +
                                            numWaste.value +
                                            "~" +
                                            num_PP_kg.value +
                                            "~" +
                                            num_PE_kg.value +
                                            "~" +
                                            num_CaCO3_kg.value +
                                            "~" +
                                            num_Masterbatch_kg.value +
                                            "~" +
                                            num_UV_kg.value +
                                            "~" +
                                            num_Conductive_kg.value +
                                            "~" +
                                            num_LDPE_kg.value +
                                            "~" +
                                            num_LLDPE_kg.value +
                                            "~" +
                                            num_HDPE_kg.value +
                                            "~" +
                                            num_PP_persen.value +
                                            "~" +
                                            num_PE_persen.value +
                                            "~" +
                                            num_CaCO3_persen.value +
                                            "~" +
                                            num_Masterbatch_persen.value +
                                            "~" +
                                            num_UV_persen.value +
                                            "~" +
                                            num_Conductive_persen.value +
                                            "~" +
                                            num_LDPE_persen.value +
                                            "~" +
                                            num_LLDPE_persen.value +
                                            "~" +
                                            num_HDPE_persen.value +
                                            "~" +
                                            num_PP_koef.value +
                                            "~" +
                                            num_PE_koef.value +
                                            "~" +
                                            num_CaCO3_koef.value +
                                            "~" +
                                            num_Masterbatch_koef.value +
                                            "~" +
                                            num_UV_koef.value +
                                            "~" +
                                            num_Conductive_koef.value +
                                            "~" +
                                            num_LDPE_koef.value +
                                            "~" +
                                            num_LLDPE_koef.value +
                                            "~" +
                                            num_HDPE_koef.value +
                                            "~" +
                                            dateLoading.value,
                                        () => {
                                            alert(
                                                "Komposisi Konversi Berhasil Disimpan!"
                                            );

                                            enableForm(false);
                                        }
                                    );
                                } else if (proses == "2") {
                                    fetchStmt(
                                        "/komposisiKonversi/SP_1273_INV_Insert_KonversiKomposisi_1~2/" +
                                            dateInput.value +
                                            "~" +
                                            txtNoKonversi.value +
                                            "~" +
                                            num_PP_kg.value +
                                            "~" +
                                            num_PE_kg.value +
                                            "~" +
                                            num_CaCO3_kg.value +
                                            "~" +
                                            num_Masterbatch_kg.value +
                                            "~" +
                                            num_UV_kg.value +
                                            "~" +
                                            num_Conductive_kg.value +
                                            "~" +
                                            num_LDPE_kg.value +
                                            "~" +
                                            num_LLDPE_kg.value +
                                            "~" +
                                            num_HDPE_kg.value +
                                            "~" +
                                            num_PP_persen.value +
                                            "~" +
                                            num_PE_persen.value +
                                            "~" +
                                            num_CaCO3_persen.value +
                                            "~" +
                                            num_Masterbatch_persen.value +
                                            "~" +
                                            num_UV_persen.value +
                                            "~" +
                                            num_Conductive_persen.value +
                                            "~" +
                                            num_LDPE_persen.value +
                                            "~" +
                                            num_LLDPE_persen.value +
                                            "~" +
                                            num_HDPE_persen.value +
                                            "~" +
                                            num_PP_koef.value +
                                            "~" +
                                            num_PE_koef.value +
                                            "~" +
                                            num_CaCO3_koef.value +
                                            "~" +
                                            num_Masterbatch_koef.value +
                                            "~" +
                                            num_UV_koef.value +
                                            "~" +
                                            num_Conductive_koef.value +
                                            "~" +
                                            num_LDPE_koef.value +
                                            "~" +
                                            num_LLDPE_koef.value +
                                            "~" +
                                            num_HDPE_koef.value +
                                            "~" +
                                            dateLoading.value,
                                        () => {
                                            alert(
                                                "Komposisi Konversi Berhasil Dikoreksi!"
                                            );

                                            enableForm(false);
                                        }
                                    );
                                } else if (proses == "3") {
                                    fetchStmt(
                                        "/komposisiKonversi/SP_1273_INV_Insert_KonversiKomposisi_1~3/" +
                                            dateInput.value +
                                            "~" +
                                            txtNoKonversi.value,
                                        () => {
                                            alert(
                                                "Komposisi Konversi Berhasil Dihapus!"
                                            );

                                            enableForm(false);
                                        }
                                    );
                                }
                            } else
                                alert(
                                    "Jumlah Komposisi Tidak Sama dengan Berat Standart, Cek Kembali Inputan Anda !"
                                );
                        } else alert("Data Komposisi tidak ditemukan.");
                    }
                );
            } else
                alert(
                    "Inputan Komposisi Konversi Belum Terisi Dengan Lengkap, Periksa Kembali Inputan Anda."
                );
        }
    } else {
        alert("Isi Komposisi Terlebih Dahulu !");
        txtKodeBarang.focus();
    }
});

btnKoreksi.addEventListener("click", function () {
    txtKodeBarang.disabled = false;
    groupKomposisi.forEach((ele) => (ele.disabled = false));
    btnKeluar.textContent = "Batal";
    proses = "2";
    btnProses.disabled = false;
    btnPrint.disabled = false;
    btnIsi.disabled = true;
    btnHapus.disabled = true;
    clearForm();
    txtKodeBarang.focus();
});

btnHapus.addEventListener("click", function () {
    txtKodeBarang.disabled = false;
    btnKeluar.textContent = "Batal";
    proses = "3";
    btnProses.disabled = false;
    btnKoreksi.disabled = true;
    clearForm();
    txtKodeBarang.focus();
});
//#endregion

//#region Functions
function clearForm() {
    listKonversi.length = 0;
    clearTable_DataTable("table_konversi", colKonversi.length, "padding=250px");
    allTxt.forEach((ele) => (ele.value = ""));
}

function enableForm(bool_state) {
    if (!bool_state) {
        btnKeluar.textContent = "Keluar";
    } else btnKeluar.textContent = "Batal";

    txtSubKategori.disabled = true;
    txtKodeBarang.disabled = !bool_state;
    groupKomposisi.forEach((ele) => (ele.disabled = !bool_state));
    btnProses.disabled = !bool_state;
    btnIsi.disabled = bool_state;
    btnKoreksi.disabled = bool_state;
    btnHapus.disabled = bool_state;
}

function formWait(bool_state) {
    let cursor_state = bool_state ? "wait" : "default";
    document.body.style.cursor = cursor_state;
    allTxt.forEach((ele) => (ele.style.cursor = cursor_state));
    allBtn.forEach((ele) => (ele.style.cursor = cursor_state));
}

function loadDataKoreksiFetch(s_kode_brg) {
    /**
     * Saat ingin menjalankan fungsi ini lakukan pengecekkan terhadap:
     * - txtKodeBarang
     */

    formWait(true);
    listKonversi.length = 0;

    // Tested
    const cek_komposisi = (post_action = null) => {
        fetchSelect(
            "/komposisiKonversi/SP_1273_INV_Cek_KonversiKomposisi_1/1~" +
                s_kode_brg,
            (data) => {
                let ada = 0;
                if (data.length > 0) ada = data[0].Ada;

                if (ada == 0) {
                    formWait(false);
                    alert("Kode Barang Tersebut Belum Pernah Input Konversi!");
                    txtKodeBarang.value = "";
                    txtJenisBarang.value = "";
                    txtSubKategori.value = "";
                    spnBeratStandar.textContent = "";
                    txtType.value = "";
                    btnProses.disabled = true;
                    txtKodeBarang.focus();
                    return;
                } else if (ada != 1) {
                    ada = parseFloat(ada) - 1;
                    txtNoKonversi.value = txtKodeBarang.value + "-" + ada;
                } else txtNoKonversi.value = txtKodeBarang.value; // Jika ada == 1

                if (post_action != null) post_action();
            }
        );
    };

    // Tested
    const load_komposisi = (post_action = null) => {
        fetchSelect(
            "/komposisiKonversi/SP_1273_INV_Cek_KonversiKomposisi_1~NoKonversi/" +
                txtNoKonversi.value,
            (data) => {
                if (data.length > 0) {
                    numBeratStandar.value = data[0].BeratStandart;
                    dateInput.value = dateTimeToDate(data[0].Tanggal);

                    num_PP_kg.value = data[0].PP;
                    num_PE_kg.value = data[0].PE;
                    num_CaCO3_kg.value = data[0].CaCO3;
                    num_Masterbatch_kg.value = data[0].Masterbatch;
                    num_UV_kg.value = data[0].UV;
                    num_AntiStatic_kg.value = data[0].AntiStatic;
                    num_Conductive_kg.value = data[0].Conductive;
                    num_LDPE_kg.value = data[0].LDPELami;
                    num_LLDPE_kg.value = data[0].LLDPEInner;
                    num_HDPE_kg.value = data[0].HDPEInner;
                    num_Total_kg.value =
                        parseFloat(num_PP_kg.value) +
                        parseFloat(num_PE_kg.value) +
                        parseFloat(num_CaCO3_kg.value) +
                        parseFloat(num_Masterbatch_kg.value) +
                        parseFloat(num_UV_kg.value) +
                        parseFloat(num_AntiStatic_kg.value) +
                        parseFloat(num_Conductive_kg.value) +
                        parseFloat(num_LDPE_kg.value) +
                        parseFloat(num_LLDPE_kg.value) +
                        parseFloat(num_HDPE_kg.value);

                    num_PP_persen.value = data[0].PersenPP;
                    num_PE_persen.value = data[0].PersenPE;
                    num_CaCO3_persen.value = data[0].PersenCaCO3;
                    num_Masterbatch_persen.value = data[0].PersenMB;
                    num_UV_persen.value = data[0].PersenUV;
                    num_AntiStatic_persen.value = data[0].PersenAS;
                    num_Conductive_persen.value = data[0].PersenConductive;
                    num_LDPE_persen.value = data[0].PersenLDPELami;
                    num_LLDPE_persen.value = data[0].PersenLLDPEInner;
                    num_HDPE_persen.value = data[0].PersenHDPEInner;
                    num_Total_persen.value =
                        parseFloat(num_PP_persen.value) +
                        parseFloat(num_PE_persen.value) +
                        parseFloat(num_CaCO3_persen.value) +
                        parseFloat(num_Masterbatch_persen.value) +
                        parseFloat(num_UV_persen.value) +
                        parseFloat(num_AntiStatic_persen.value) +
                        parseFloat(num_Conductive_persen.value) +
                        parseFloat(num_LDPE_persen.value) +
                        parseFloat(num_LLDPE_persen.value) +
                        parseFloat(num_HDPE_persen.value);

                    num_PP_koef.value = data[0].KoefPP;
                    num_PE_koef.value = data[0].KoefPE;
                    num_CaCO3_koef.value = data[0].KoefCaCO3;
                    num_Masterbatch_koef.value = data[0].KoefMB;
                    num_UV_koef.value = data[0].KoefUV;
                    num_AntiStatic_koef.value = data[0].KoefAS;
                    num_Conductive_koef.value = data[0].KoefConductive;
                    num_LDPE_koef.value = data[0].KoefLDPE;
                    num_LLDPE_koef.value = data[0].KoefLLDPE;
                    num_HDPE_koef.value = data[0].KoefHDPE;
                    num_Total_koef.value =
                        parseFloat(num_PP_koef.value) +
                        parseFloat(num_PE_koef.value) +
                        parseFloat(num_CaCO3_koef.value) +
                        parseFloat(num_Masterbatch_koef.value) +
                        parseFloat(num_UV_koef.value) +
                        parseFloat(num_AntiStatic_koef.value) +
                        parseFloat(num_Conductive_koef.value) +
                        parseFloat(num_LDPE_koef.value) +
                        parseFloat(num_LLDPE_koef.value) +
                        parseFloat(num_HDPE_koef.value);

                    if (post_action != null) post_action();
                } else {
                    formWait(false);
                    alert(
                        "Data Konversi Tidak Ditemukan." +
                            "\nPeriksa Kembali Bagian Kode Barang."
                    );

                    enableForm(false);
                    clearForm();
                }
            }
        );
    };

    // Tested
    const load_konversi = () => {
        fetchSelect(
            "/komposisiKonversi/SP_1273_INV_Cek_KonversiKomposisi_1/2~" +
                s_kode_brg,
            (data) => {
                for (let i = 0; i < data.length; i++) {
                    listKonversi.push({
                        Tanggal: dateTimeToDate(data[i].Tanggal),
                        NoKonversi: data[i].NoKonversi,
                        BeratStandart: data[i].BeratStandart,
                        KoefPP: data[i].KoefPP,
                        KoefPE: data[i].KoefPE,
                        KoefCaCO3: data[i].KoefCaCO3,
                        KoefMB: data[i].KoefMB,
                        KoefUV: data[i].KoefUV,
                        KoefAS: data[i].KoefAS,
                        KoefConductive: data[i].KoefConductive,
                        KoefLDPE: data[i].KoefLDPE,
                        KoefLLDPE: data[i].KoefLLDPE,
                        KoefHDPE: data[i].KoefHDPE,
                        Tgl_LoadingBC:
                            data[i].Tgl_LoadingBC !== null
                                ? data[i].Tgl_LoadingBC
                                : "",
                    });
                }

                addTable_DataTable("table_konversi", listKonversi, colKonversi);
                formWait(false);
                if (proses != "2" && proses != "4") {
                    showModal(
                        "Hapus",
                        "Apakah Anda Yakin Ingin Menghapus Konversi Tersebut?",
                        () => {
                            btnProses.focus();
                        },
                        () => {
                            enableForm(false);
                            clearForm();
                        },
                        null,
                        () => {}
                    );
                } else dateLoading.focus();
            }
        );
    };

    // Tested
    fetchSelect(
        "/komposisiKonversi/SP_1273_PRG_DATA_BarangEksport_1/" + s_kode_brg,
        (data) => {
            if (data.length > 0) {
                txtSubKategori.value = data[0].NoSubKategori;
                txtJenisBarang.value = data[0].NamaSubKategori;
                txtType.value = data[0].NamaBarang;
                spnBeratStandar.textContent = data[0].BERAT_TOTAL;

                if (txtSubKategori.value.trim() == "1509") {
                    numTerkandung.value = "95"; // Jumbo
                    numWaste.value = "5";
                } else if (txtSubKategori.value.trim() == "2472") {
                    numTerkandung.value = "96"; // Starpak
                    numWaste.value = "4";
                } else if (txtSubKategori.value.trim() == "1508") {
                    numTerkandung.value = "97"; // Woven
                    numWaste.value = "3";
                } else {
                    numTerkandung.value = "100";
                    numWaste.value = "0";
                }

                cek_komposisi(() => {
                    load_komposisi(() => {
                        load_konversi();
                    });
                });
            } else {
                formWait(false);
                alert("Kode Barang Ini Belum Terdaftar Sebagai Barang Ekspor!");
                txtKodeBarang.value = "";
                btnProses.disabled = true;
                txtKodeBarang.focus();
                return;
            }
        }
    );
}

function loadDataFetch(s_kode_brg) {
    formWait(true);
    listKonversi.length = 0;

    const cek_komposisi = (post_action = null) => {
        fetchSelect(
            "/komposisiKonversi/SP_1273_INV_Cek_KonversiKomposisi_1/1~" +
                s_kode_brg,
            (data) => {
                let ada = 0;
                if (data.length > 0) ada = data[0].Ada;

                if (ada == 0) {
                    txtNoKonversi.value = txtKodeBarang.value;
                } else txtNoKonversi.value = txtKodeBarang.value + "-" + ada;

                fetchSelect(
                    "/komposisiKonversi/SP_1273_PRG_CEK_KOMPOSISI_1/" +
                        s_kode_brg,
                    (data) => {
                        let totalKu = 0;
                        if (data.length > 0) totalKu = data[0].Total;

                        if (totalKu > 0) {
                            if (post_action != null) post_action();
                        } else if (totalKu == 0) {
                            formWait(false);
                            alert(
                                "Kode Barang Ini Belum Input Komposisi Konversi !"
                            );
                            txtKodeBarang.value = "";
                            clearForm();
                            txtKodeBarang.focus();
                        } else alert("Input Data Tidak Valid !");
                    }
                );
            }
        );
    };

    const hit_total = () => {
        return (
            parseFloat(num_PP_kg.value) +
            parseFloat(num_PE_kg.value) +
            parseFloat(num_CaCO3_kg.value) +
            parseFloat(num_Masterbatch_kg.value) +
            parseFloat(num_UV_kg.value) +
            parseFloat(num_AntiStatic_kg.value) +
            parseFloat(num_Conductive_kg.value) +
            parseFloat(num_LDPE_kg.value) +
            parseFloat(num_LLDPE_kg.value) +
            parseFloat(num_HDPE_kg.value)
        );
    };

    const hit_a = (kom_ele, komposisi) => {
        kom_ele.value = (
            Math.round(
                (((parseFloat(komposisi) / parseFloat(berat1)) *
                    parseFloat(berat2)) /
                    1000) *
                    100000
            ) / 100000
        ).toFixed(4);
    };

    const hit_b = (kom_ele, komposisi) => {
        if (
            parseFloat(num_Total_kg.value) != parseFloat(numBeratStandar.value)
        ) {
            kom_ele.value = (
                Math.round(
                    ((parseFloat(komposisi) / 1000).toFixed(4) /
                        parseFloat(spnBeratStandar.textContent)) *
                        parseFloat(numBeratStandar.value) *
                        100000
                ) / 100000
            ).toFixed(4);
            num_Total_kg.value = hit_total();
        }
    };

    const hit_c = (kom_ele, komposisi) => {
        if (
            parseFloat(num_Total_kg.value) == parseFloat(numBeratStandar.value)
        ) {
            if (kom_ele.value > 0) {
                kom_ele.value = parseFloat(komposisi) - 0.0001;
            } else kom_ele.value = parseFloat(komposisi) + 0.0001;
            num_Total_kg.value = hit_total();
        }
    };

    const jual_kg_y = (kom_ele, koef_ele) => {
        koef_ele.value = (
            parseFloat(kom_ele.value) / parseFloat(numBeratStandar.value)
        ).toFixed(4);
    };

    const jual_kg_d = (kom_ele, koef_ele) => {
        koef_ele.value = (parseFloat(kom_ele.value) * 0.9144).toFixed(4);
    };

    const jual_kg_e = (kom_ele, koef_ele) => {
        koef_ele.value = (
            parseFloat(kom_ele.value) /
            (parseFloat(numTerkandung.value) / 100)
        ).toFixed(4);
    };

    const load_komposisi = () => {
        fetchSelect(
            "komposisiKonversi/SP_1273_PRG_DATA_KOMPOSISI_1/" + s_kode_brg,
            (data) => {
                if (data.length > 0) {
                    jualKg = data[0].JualKg;

                    //#region Perhitungan Komposisi
                    hit_a(num_PP_kg, data[0].PP);
                    hit_a(num_PE_kg, data[0].PE);
                    hit_a(num_CaCO3_kg, data[0].CaCO3);
                    hit_a(num_Masterbatch_kg, data[0].Masterbatch);
                    hit_a(num_UV_kg, data[0].UV);
                    hit_a(num_AntiStatic_kg, data[0].AntiStatic);
                    hit_a(num_Conductive_kg, data[0].Conductive);
                    hit_a(num_LDPE_kg, data[0].LDPELami);
                    hit_a(num_LLDPE_kg, data[0].LLDPEInner);
                    hit_a(num_HDPE_kg, data[0].HDPEInner);
                    num_Total_kg.value = hit_total();

                    hit_b(num_PP_kg, data[0].PP);
                    hit_b(num_PE_kg, data[0].PE);
                    hit_b(num_CaCO3_kg, data[0].CaCO3);
                    hit_b(num_Masterbatch_kg, data[0].Masterbatch);
                    hit_b(num_UV_kg, data[0].UV);
                    hit_b(num_AntiStatic_kg, data[0].AntiStatic);
                    hit_b(num_Conductive_kg, data[0].Conductive);
                    hit_b(num_LDPE_kg, data[0].LDPELami);
                    hit_b(num_LLDPE_kg, data[0].LLDPEInner);
                    hit_b(num_HDPE_kg, data[0].HDPEInner);

                    hit_c(num_PP_kg, data[0].PP);
                    hit_c(num_PE_kg, data[0].PE);
                    hit_c(num_CaCO3_kg, data[0].CaCO3);
                    hit_c(num_Masterbatch_kg, data[0].Masterbatch);
                    hit_c(num_UV_kg, data[0].UV);
                    hit_c(num_AntiStatic_kg, data[0].AntiStatic);
                    hit_c(num_Conductive_kg, data[0].Conductive);
                    hit_c(num_LDPE_kg, data[0].LDPELami);
                    hit_c(num_LLDPE_kg, data[0].LLDPEInner);
                    hit_c(num_HDPE_kg, data[0].HDPEInner);
                    //#endregion

                    //#region Perhitungan Jual KG
                    if (jualKg == "Y") {
                        jual_kg_y(num_PP_kg, num_PP_koef);
                        jual_kg_y(num_PE_kg, num_PE_koef);
                        jual_kg_y(num_CaCO3_kg, num_CaCO3_koef);
                        jual_kg_y(num_Masterbatch_kg, num_Masterbatch_koef);
                        jual_kg_y(num_UV_kg, num_UV_koef);
                        jual_kg_y(num_AntiStatic_kg, num_AntiStatic_koef);
                        jual_kg_y(num_Conductive_kg, num_Conductive_koef);
                        jual_kg_y(num_LDPE_kg, num_LDPE_koef);
                        jual_kg_y(num_LLDPE_kg, num_LLDPE_koef);
                        jual_kg_y(num_HDPE_kg, num_HDPE_koef);
                    } else if (jualKg == "D") {
                        jual_kg_d(num_PP_kg, num_PP_koef);
                        jual_kg_d(num_PE_kg, num_PE_koef);
                        jual_kg_d(num_CaCO3_kg, num_CaCO3_koef);
                        jual_kg_d(num_Masterbatch_kg, num_Masterbatch_koef);
                        jual_kg_d(num_UV_kg, num_UV_koef);
                        jual_kg_d(num_AntiStatic_kg, num_AntiStatic_koef);
                        jual_kg_d(num_Conductive_kg, num_Conductive_koef);
                        jual_kg_d(num_LDPE_kg, num_LDPE_koef);
                        jual_kg_d(num_LLDPE_kg, num_LLDPE_koef);
                        jual_kg_d(num_HDPE_kg, num_HDPE_koef);
                    } else {
                        jual_kg_e(num_PP_kg, num_PP_koef);
                        jual_kg_e(num_PE_kg, num_PE_koef);
                        jual_kg_e(num_CaCO3_kg, num_CaCO3_koef);
                        jual_kg_e(num_Masterbatch_kg, num_Masterbatch_koef);
                        jual_kg_e(num_UV_kg, num_UV_koef);
                        jual_kg_e(num_AntiStatic_kg, num_AntiStatic_koef);
                        jual_kg_e(num_Conductive_kg, num_Conductive_koef);
                        jual_kg_e(num_LDPE_kg, num_LDPE_koef);
                        jual_kg_e(num_LLDPE_kg, num_LLDPE_koef);
                        jual_kg_e(num_HDPE_kg, num_HDPE_koef);
                    }
                    //#endregion
                }
            }
        );
    };

    fetchSelect(
        "/komposisiKonversi/SP_1273_PRG_DATA_BarangEksport_1/" + s_kode_brg,
        (data) => {
            if (data.length > 0) {
                txtSubKategori.value = data[0].NoSubKategori;
                txtJenisBarang.value = data[0].NamaSubKategori;
                txtType.value = data[0].NamaBarang;
                spnBeratStandar.textContent = data[0].BERAT_TOTAL;
                numBeratStandar.value = data[0].BERAT_TOTAL2;
                berat1 = data[0].BERAT_TOTAL;
                berat2 = data[0].BERAT_TOTAL2;
                spnBeratStandar.textContent = (
                    parseFloat(spnBeratStandar.textContent) / 1000
                ).toFixed(4);
                numBeratStandar.value = (
                    parseFloat(numBeratStandar.value) / 1000
                ).toFixed(4);

                if (parseFloat(spnBeratStandar.textContent) == 0) {
                    formWait(false);
                    alert(
                        "Berat Standart 1 Untuk Kode Barang Ini Belum diInputkan !"
                    );
                    txtKodeBarang.value = "";
                    txtJenisBarang.value = "";
                    txtSubKategori.value = "";
                    txtType.value = "";
                    btnProses.disabled = true;
                    clearForm();
                    txtKodeBarang.focus();
                    return;
                }

                if (txtSubKategori.value.trim() == "1509") {
                    numTerkandung.value = "95"; // Jumbo
                    numWaste.value = "5";
                } else if (txtSubKategori.value.trim() == "2472") {
                    numTerkandung.value = "96"; // Starpak
                    numWaste.value = "4";
                } else if (txtSubKategori.value.trim() == "1508") {
                    numTerkandung.value = "97"; // Woven
                    numWaste.value = "3";
                } else {
                    numTerkandung.value = "100";
                    numWaste.value = "0";
                }

                cek_komposisi();
            } else {
                formWait(false);
                alert(
                    "Kode Barang Ini Belum diDaftarkan Sebagai Barang Eksport !"
                );
                txtKodeBarang.value = "";
                btnProses.disabled = true;
                txtKodeBarang.focus();
            }
        }
    );
}
//#endregion

function init() {
    $("#table_konversi").DataTable({
        responsive: true,
        paging: false,
        scrollY: "250px",
        scrollX: "1000000px",
        columns: colKonversi,
        dom: '<"row"<"col-sm-6"i><"col-sm-6"f>>' + '<"row"<"col-sm-12"tr>>',
        language: {
            searchPlaceholder: " Tabel konversi...",
            search: "",
        },

        initComplete: () => {
            var searchInput = $('input[type="search"]').addClass(
                "form-control"
            );

            searchInput.wrap('<div class="input-group"></div>');
            searchInput.before('<span class="input-group-text">Cari:</span>');
        },
    });

    clearTable_DataTable("table_konversi", colKonversi.length, "padding=250px");
    dateInput.value = getCurrentDate();
    dateLoading.value = getCurrentDate();
    groupKomposisi.disabled = true;
    txtKodeBarang.disabled = true;
    btnProses.disabled = true;
    btnPrint.disabled = true;
    clearForm();

    /* DEBUG loadDataKoreksiFetch() */
    // txtKodeBarang.value = "KONV01";
    // loadDataKoreksiFetch("0000BAR01");
}

$(document).ready(() => init());
