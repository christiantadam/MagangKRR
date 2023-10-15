//untuk button
let abcdef = document.getElementById('abcdef');
let turning1 = document.getElementById('turning1');
let turning2 = document.getElementById('turning2');
let turning3 = document.getElementById('turning3');

abcdef.addEventListener('click', function(event) {
  event.preventDefault();
});
turning1.addEventListener('click', function(event) {
  event.preventDefault();
});
turning2.addEventListener('click', function(event) {
  event.preventDefault();
});
turning3.addEventListener('click', function(event) {
  event.preventDefault();
});

//untuk div
var kalenderturning1 = document.getElementById("kalenderturning1");
var kalenderturning2 = document.getElementById("kalenderturning2");
var kalenderturning3 = document.getElementById("kalenderturning3");

function Gantitap(jenis) {
  if (jenis == 'turning1') {
    kalenderturning1.style.display = "block";
    kalenderturning2.style.display = "none";
    kalenderturning3.style.display = "none";

    // kalenderturning11.classlist.add("active");

  } else if (jenis == 'turning2') {
    kalenderturning1.style.display = "none";
    kalenderturning2.style.display = "block";
    kalenderturning3.style.display = "none";

  } else if (jenis == 'turning3') {
    kalenderturning1.style.display = "none";
    kalenderturning2.style.display = "none";
    kalenderturning3.style.display = "block";

  }
}

function generateCalendar() {
  var monthInput = document.getElementById("month").value;
  var yearInput = document.getElementById("year").value;
  //turning 1
  var tigasatuhari = document.getElementById("JenisBulan1");
  var tigapuluhhari = document.getElementById("JenisBulan2");
  var duasembilanhari = document.getElementById("JenisBulan3");
  var duadelapanhari = document.getElementById("JenisBulan4");
  //turning 2
  var tigasatuharikalenderturning2 = document.getElementById("JenisBulan1turning2");
  var tigapuluhharikalenderturning2 = document.getElementById("JenisBulan2turning2");
  var duasembilanharikalenderturning2 = document.getElementById("JenisBulan3turning2");
  var duadelapanharikalenderturning2 = document.getElementById("JenisBulan4turning2");
  //turning 3
  var tigasatuharikalenderturning3 = document.getElementById("JenisBulan1turning3");
  var tigapuluhharikalenderturning3 = document.getElementById("JenisBulan2turning3");
  var duasembilanharikalenderturning3 = document.getElementById("JenisBulan3turning3");
  var duadelapanharikalenderturning3 = document.getElementById("JenisBulan4turning3");

  var daysInMonth = new Date(yearInput, monthInput, 0).getDate();
console.log(daysInMonth);
  if (daysInMonth == 31) {
    tigasatuhari.style.display = "block";
    tigapuluhhari.style.display = "none";
    duadelapanhari.style.display = "none";
    duasembilanhari.style.display = "none";

    tigasatuharikalenderturning2.style.display = "block";
    tigapuluhharikalenderturning2.style.display = "none";
    duadelapanharikalenderturning2.style.display = "none";
    duasembilanharikalenderturning2.style.display = "none";

    tigasatuharikalenderturning3.style.display = "block";
    tigapuluhharikalenderturning3.style.display = "none";
    duadelapanharikalenderturning3.style.display = "none";
    duasembilanharikalenderturning3.style.display = "none";

console.log(tigasatuharikalenderturning2);
  } else if (daysInMonth == 30) {
    tigasatuhari.style.display = "none";
    tigapuluhhari.style.display = "block";
    duadelapanhari.style.display = "none";
    duasembilanhari.style.display = "none";

    tigasatuharikalenderturning2.style.display = "none";
    tigapuluhharikalenderturning2.style.display = "block";
    duadelapanharikalenderturning2.style.display = "none";
    duasembilanharikalenderturning2.style.display = "none";

    tigasatuharikalenderturning3.style.display = "none";
    tigapuluhharikalenderturning3.style.display = "block";
    duadelapanharikalenderturning3.style.display = "none";
    duasembilanharikalenderturning3.style.display = "none";

  } else if (daysInMonth == 29) {
    tigasatuhari.style.display = "none";
    tigapuluhhari.style.display = "none";
    duadelapanhari.style.display = "none";
    duasembilanhari.style.display = "block";

    tigasatuharikalenderturning2.style.display = "none";
    tigapuluhharikalenderturning2.style.display = "none";
    duadelapanharikalenderturning2.style.display = "none";
    duasembilanharikalenderturning2.style.display = "block";

    tigasatuharikalenderturning3.style.display = "none";
    tigapuluhharikalenderturning3.style.display = "none";
    duadelapanharikalenderturning3.style.display = "none";
    duasembilanharikalenderturning3.style.display = "block";

  } else if (daysInMonth == 28) {
    tigasatuhari.style.display = "none";
    tigapuluhhari.style.display = "none";
    duadelapanhari.style.display = "block";
    duasembilanhari.style.display = "none";

    tigasatuharikalenderturning2.style.display = "none";
    tigapuluhharikalenderturning2.style.display = "none";
    duadelapanharikalenderturning2.style.display = "block";
    duasembilanharikalenderturning2.style.display = "none";

    tigasatuharikalenderturning3.style.display = "none";
    tigapuluhharikalenderturning3.style.display = "none";
    duadelapanharikalenderturning3.style.display = "block";
    duasembilanharikalenderturning3.style.display = "none";
  }
}
