<?php

require_once "../controllers/AdminEvent.contoller.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Create Event</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body style="width: 100%; margin: 0; padding: 0">

  <nav class="navbar bg-dark navbar-expand-lg" data-bs-theme="dark">
    <div class="container">
      <a class="navbar-brand" href="#">Admin</a>

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/create-announcement.php">Create Announcement</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Create Event</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container m-5 w-100 mx-auto">
    <div class="container-fluid w-50">
      <h1 class="text-center">
        Create Event
      </h1>

      <?php if (isset($context["success"])) { ?>
        <div class="alert alert-<?= $context["success"] ? "success" : "danger" ?> text-center">
          <?= $context["message"] ?>
        </div>
      <?php } ?>

      <form action="#" method="POST">
        <div class="mb-3">
          <label for="event-name" class="form-label fw-bold">Event Name:</label>
          <input type="text" class="form-control" name="event-name" id="event-name" placeholder="Enter a name for your event" required>
        </div>
        <div class="mb-3">
          <label for="event-date" class="form-label fw-bold">Event Date:</label>
          <input type="date" class="form-control" name="event-date" id="event-date" required>
        </div>

        <button type="submit" class="btn btn-success">Post Event</button>
        <button type="button" class="btn btn-danger" onclick="window.history.back()">Back</button>

      </form>

    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>