(function () {
  "use strict";

  /**
   * Animation on scroll
   */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    })
  });

})()

var formList = ["berat_woven", "berat_jumbo", "berat_adstar", "berat_circular", "berat_assesoris", "update_persen", "komposisi_konversi", "konversi_barang", "konversi_kg", "berat_woven2", "berat_jumbo2", "berat_adstar2", "berat_circular2", "berat_assesoris2"];
var pageTitle = document.getElementById("page_title");
var navbarFull = document.getElementById("navbar_full");
var navbarExit = document.getElementById("navbar_exit");
var myTitle = document.getElementById("titleKu");

function showForm(formName, formTitle) {
  var myForm = document.getElementById(formName);

  if (myForm.classList.contains("hidden")) {
    myForm.classList.remove("hidden");
    pageTitle.classList.add("hidden");
    myTitle.innerHTML = formTitle;
  }

  navbarExit.classList.remove("hidden");
  navbarFull.classList.add("hidden");

  myForm.classList.remove("aos-animate");
  setTimeout(function () {
    myForm.classList.add("aos-animate");
  }, 10);
}

function hideForm() {
  for (let i = 0; i < formList.length; i++) {
    var form = document.getElementById(formList[i]);
    if (!form.classList.contains("hidden")) {
      form.classList.add("hidden");
    }
  }

  pageTitle.classList.remove("hidden");
  myTitle.innerHTML = "Extruder";

  navbarExit.classList.add("hidden");
  navbarFull.classList.remove("hidden");

  pageTitle.classList.remove("aos-animate");
  setTimeout(function () {
    pageTitle.classList.add("aos-animate");
  }, 10);
}
