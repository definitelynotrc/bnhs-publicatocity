<?php

require_once "models/Event.model.php";

$event = new Events();
$events = $event->getEvents();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Document</title>
  <link rel="stylesheet" href="./css/authors.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        themeSystem: "bootstrap5",
        nowIndicator: true,
      });
      <?php
      // get all events

      foreach ($events as $e) {
        echo "calendar.addEvent({
          title: '" . $e['event_name'] . "',
          start: '" . $e['assigned_date'] . "',
        });";
      }
      ?>
      calendar.render();
    });
  </script>
</head>

<body>

  <div class="container mt-5">
    <h1>
      <small>
        <!-- go back to home -->
        <a href="/" class="btn btn-outline-primary btn-sm">
          <i class="bi bi-arrow-left"></i>
        </a>
      </small> Events
    </h1>

    <div id="calendar" style="max-height: 60vh; max-width: 70%;" class="mx-auto mt-5"></div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script>

  </script>
</body>

</html>