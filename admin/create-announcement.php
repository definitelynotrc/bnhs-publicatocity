<?php

require_once "../controllers/AdminAnnouncement.controller.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Create Announcement</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body>

  <nav class="navbar bg-dark navbar-expand-lg" data-bs-theme="dark">
    <div class="container">
      <a class="navbar-brand" href="#">Admin</a>

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Create Announcement</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/create-event.php">Create Event</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container m-5 w-100 mx-auto">
    <div class="container-fluid w-50">
      <h1 class="text-center">
        Create Announcement
      </h1>

      <form action="" method="POST">
        <div class="mb-3">
          <label for="announcement-title" class="form-label fw-bold">Announcement Title:</label>
          <input type="text" class="form-control" name="announcement-title" id="announcement-title" placeholder="Enter a title for announcement">
        </div>

        <div class="mb-3">
          <label for="announcement-description" class="form-label fw-bold">Announcement Description:</label>
          <textarea rows="10" type="text" class="form-control" name="announcement-description" id="announcement-description" placeholder="Enter description for your announcement"></textarea>
        </div>


        <button type="submit" class="btn btn-success">Post Announcement</button>
        <button type="button" class="btn btn-danger" onclick="window.history.back()">Back</button>

      </form>

    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>