@extends('layouts.WORKSHOP.GPS.appGPS')
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10 RDZMobilePaddingLR0">
        <div class="card">
          <div class="card-header">Work Stations</div>
          <div class="card-body RDZOverflow RDZMobilePaddingLR0">
            <div class="row">
              <div class="col-6">
                <label for="month">Bulan:</label>
                <input type="number" id="month" min="1" max="12">
                <label for="year">Tahun:</label>
                <input type="number" id="year" min="1900" max="2100">
              </div>
              <div class="col-6">
                <a href="" class="btn btn-primary" id="abcdef" onclick="generateCalendar()">OK</a>
              </div>
            </div>

            <div id="calendar"></div>

          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script>
    let abcdef = document.getElementById('abcdef');

    abcdef.addEventListener('click', function(event) {
      event.preventDefault();
    });

    function generateCalendar() {
      var monthInput = document.getElementById('month');
      var yearInput = document.getElementById('year');
      var calendarDiv = document.getElementById('calendar');

      var month = parseInt(monthInput.value);
      var year = parseInt(yearInput.value);

      if (isNaN(month) || isNaN(year) || month < 1 || month > 12) {
        calendarDiv.innerHTML = 'Invalid month!';
        return;
      }

      var daysInMonth = new Date(year, month, 0).getDate();
      var firstDay = new Date(year, month - 1, 1).getDay();

      var calendarHTML = '<table style="padding-top: 10px">';
      var day = 1;
      for (var i = 0; i < 6; i++) {
        calendarHTML += '<tr>';
        for (var j = 1; j <= 7; j++) {
          var dayNumber = i * 7 + j; // Menghitung nomor hari dalam kalender

          if (dayNumber > daysInMonth) {
            // Jika nomor hari melebihi jumlah hari dalam bulan, hentikan loop
            break;
          }

          calendarHTML += '<td style="width: 125px; text-align: center;">' + dayNumber;
          // Menambahkan proses bar untuk setiap tanggal
          // Menambahkan proses bar untuk setiap tanggal
          for (var k = 1; k < 4; k++) {
            calendarHTML += '<div class="progress">' +
              '<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>' +
              '</div><br>';
            if (k==3){
                calendarHTML += '<div class="progress">' +
              '<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>'+
              '</div>';
            }
          }
          calendarHTML += '</td>';
        }
        calendarHTML += '</tr>';

        // Jika nomor hari melebihi jumlah hari dalam bulan, hentikan loop
        if (dayNumber > daysInMonth) {
          break;
        }
      }
      calendarHTML += '</table>';


      calendarDiv.innerHTML = calendarHTML;
    }
  </script>
@endsection
