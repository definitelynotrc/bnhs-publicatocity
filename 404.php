<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>404 Not Found</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      text-align: center;
      padding-top: 100px;
    }

    h1 {
      font-size: 48px;
      color: #444;
    }

    p {
      font-size: 18px;
      color: #777;
    }

    button {
      background-color: #000;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 18px;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #444;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <h1>404 Not Found</h1>
  <p>Sorry, the page you are looking for could not be found.</p>

  <button onclick="window.history.back()">
    Go Back
  </button>

</body>

</html>