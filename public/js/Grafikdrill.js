//untuk button
let abcdef = document.getElementById('abcdef');
let drill11 = document.getElementById('drill11');
let drill22 = document.getElementById('drill22');
let mill1 = document.getElementById('mill1');
let scrap1 = document.getElementById('scrap1');

abcdef.addEventListener('click', function(event) {
  event.preventDefault();
});
drill11.addEventListener('click', function(event) {
  event.preventDefault();
});
drill22.addEventListener('click', function(event) {
  event.preventDefault();
});
mill1.addEventListener('click', function(event) {
  event.preventDefault();
});
scrap1.addEventListener('click', function(event) {
  event.preventDefault();
});
//untuk div
var drill1 = document.getElementById("kalenderdrill1");
var drill2 = document.getElementById("kalenderdrill2");
var mill = document.getElementById("kalendermill");
var scrap = document.getElementById("kalenderscrap");

function Gantitap(jenis) {
  if (jenis == 'drill1') {
    drill1.style.display = "block";
    drill2.style.display = "none";
    mill.style.display = "none";
    scrap.style.display = "none";
    // drill11.classlist.add("active");

  } else if (jenis == 'drill2') {
    drill1.style.display = "none";
    drill2.style.display = "block";
    mill.style.display = "none";
    scrap.style.display = "none";
  } else if (jenis == 'mill') {
    drill1.style.display = "none";
    drill2.style.display = "none";
    mill.style.display = "block";
    scrap.style.display = "none";
  } else if (jenis == 'scrap') {
    drill1.style.display = "none";
    drill2.style.display = "none";
    mill.style.display = "none";
    scrap.style.display = "block";
    console.log(scrap);
  }
}

function generateCalendar() {
  var monthInput = document.getElementById("month").value;
  var yearInput = document.getElementById("year").value;
  //drill 1
  var tigasatuhari = document.getElementById("JenisBulan1");
  var tigapuluhhari = document.getElementById("JenisBulan2");
  var duasembilanhari = document.getElementById("JenisBulan3");
  var duadelapanhari = document.getElementById("JenisBulan4");
  //drill 2
  var tigasatuharidrill2 = document.getElementById("JenisBulan1drill2");
  var tigapuluhharidrill2 = document.getElementById("JenisBulan2drill2");
  var duasembilanhariDrill2 = document.getElementById("JenisBulan3drill2");
  var duadelapanhariDrill2 = document.getElementById("JenisBulan4drill2");
  //mill
  var tigasatuharimill = document.getElementById("JenisBulan1mill");
  var tigapuluhharimill = document.getElementById("JenisBulan2mill");
  var duasembilanhariMill = document.getElementById("JenisBulan3mill");
  var duadelapanhariMill = document.getElementById("JenisBulan4mill");

  //scrap
  var tigasatuhariscrap = document.getElementById("JenisBulan1scrap");
  var tigapuluhhariscrap = document.getElementById("JenisBulan2scrap");
  var duasembilanhariScrap = document.getElementById("JenisBulan3scrap");
  var duadelapanhariScrap = document.getElementById("JenisBulan4scrap");

  var daysInMonth = new Date(yearInput, monthInput, 0).getDate();

  if (daysInMonth === 31) {
    tigasatuhari.style.display = "block";
    tigapuluhhari.style.display = "none";
    duadelapanhari.style.display = "none";
    duasembilanhari.style.display = "none";

    tigasatuhariDrill2.style.display = "block";
    tigapuluhhariDrill2.style.display = "none";
    duadelapanhariDrill2.style.display = "none";
    duasembilanhariDrill2.style.display = "none";

    tigasatuharimill.style.display = "block";
    tigapuluhharimill.style.display = "none";
    duadelapanhariMill.style.display = "none";
    duasembilanhariMill.style.display = "none";

    tigasatuhariscrap.style.display = "block";
    tigapuluhhariscrap.style.display = "none";
    duadelapanhariScrap.style.display = "none";
    duasembilanhariScrap.style.display = "none";
console.log(tigasatuhariDrill2);
  } else if (daysInMonth == 30) {
    tigasatuhari.style.display = "none";
    tigapuluhhari.style.display = "block";
    duadelapanhari.style.display = "none";
    duasembilanhari.style.display = "none";

    tigasatuhariDrill2.style.display = "none";
    tigapuluhhariDrill2.style.display = "block";
    duadelapanhariDrill2.style.display = "none";
    duasembilanhariDrill2.style.display = "none";

    tigasatuharimill.style.display = "none";
    tigapuluhharimill.style.display = "block";
    duadelapanhariMill.style.display = "none";
    duasembilanhariMill.style.display = "none";

    tigasatuhariscrap.style.display = "none";
    tigapuluhhariscrap.style.display = "block";
    duadelapanhariScrap.style.display = "none";
    duasembilanhariScrap.style.display = "none";
  } else if (daysInMonth == 29) {
    tigasatuhari.style.display = "none";
    tigapuluhhari.style.display = "none";
    duadelapanhari.style.display = "none";
    duasembilanhari.style.display = "block";

    tigasatuhariDrill2.style.display = "none";
    tigapuluhhariDrill2.style.display = "none";
    duadelapanhariDrill2.style.display = "none";
    duasembilanhariDrill2.style.display = "block";

    tigasatuharimill.style.display = "none";
    tigapuluhharimill.style.display = "none";
    duadelapanhariMill.style.display = "none";
    duasembilanhariMill.style.display = "block";

    tigasatuhariscrap.style.display = "none";
    tigapuluhhariscrap.style.display = "none";
    duadelapanhariScrap.style.display = "none";
    duasembilanhariScrap.style.display = "block";
  } else if (daysInMonth == 28) {
    tigasatuhari.style.display = "none";
    tigapuluhhari.style.display = "none";
    duadelapanhari.style.display = "block";
    duasembilanhari.style.display = "none";

    tigasatuhariDrill2.style.display = "none";
    tigapuluhhariDrill2.style.display = "none";
    duadelapanhariDrill2.style.display = "block";
    duasembilanhariDrill2.style.display = "none";

    tigasatuharimill.style.display = "none";
    tigapuluhharimill.style.display = "none";
    duadelapanhariMill.style.display = "block";
    duasembilanhariMill.style.display = "none";

    tigasatuhariscrap.style.display = "none";
    tigapuluhhariscrap.style.display = "none";
    duadelapanhariScrap.style.display = "block";
    duasembilanhariScrap.style.display = "none";
  }
}
