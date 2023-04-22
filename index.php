<?php
session_start();
$isLoggedIn = isset($_SESSION['user']);

?>
<html lang="en">

<head>
  <style>
    body {
      background-image: url(240438744_281725183385340_3648183925057517133_n.jpg);
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    *,
    *:before,
    *:after {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #0855ae;
    }

    .popup {
      background-color: #ffffff;
      width: 420px;
      padding: 30px 40px;
      position: absolute;
      transform: translate(-50%, -50%);
      left: 50%;
      top: 50%;
      border-radius: 8px;
      font-family: "Poppins", sans-serif;
      display: none;
      text-align: center;
    }

    .popup button {
      display: block;
      margin: 0 0 20px auto;
      background-color: transparent;
      font-size: 30px;
      color: #ffffff;
      background: #03549a;
      border-radius: 100%;
      width: 40px;
      height: 40px;
      border: none;
      outline: none;
      cursor: pointer;
    }

    .popup h2 {
      margin-top: -20px;
    }

    .popup p {
      font-size: 14px;
      text-align: justify;
      margin: 20px 0;
      line-height: 25px;
    }

    #gawk {
      display: block;
      width: 150px;
      position: relative;
      margin: 10px auto;
      text-align: center;
      background-color: #0f72e5;
      border-radius: 20px;
      color: #ffffff;
      text-decoration: none;
      padding: 8px 0;
    }

    .dropdown-menu {
      visibility: visible;
    }
  </style>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/nav.css" />
  <title>Home</title>
</head>

<body>
  <div class="menu-bar">
    <h1 class="logo"><img src="./img/logo.png" /><span>.</span></h1>
    <ul>
      <li><a id="haha" href="#">Home</a></li>
      <li><a href="userprofile.php">Profile</a></li>
      <li><a href="terms.html">Terms and Policies</a></li>
      <li><a href="authors.php">Author</a></li>
      <li><a href="events.php">Events</a></li>
      <li><a href="announcement.php">Announcements</a></li>
      <li>
        <?php if ($isLoggedIn) { ?>
          <a href="#">Settings <i class="fas fa-caret-down"></i></a>
          <div class="dropdown-menu">
            <ul>
              <li>
                <a href="/logout.php" class="btn btn-info btn-lg">
                  <span class="glyphicon glyphicon-log-out"></span> Log out
                </a>
              </li>
              <li></li>
            </ul>
          </div>
        <?php } else { ?>
          <a href="login.php">Login</a>
        <?php } ?>
      </li>
    </ul>
  </div>

  <div class="hero">&nbsp;</div>

  <div class="popup">
    <button id="close">&times;</button>
    <h2>How to use our Website?</h2>
    <p></p>
    <a id="gawk" href="#">Thank You</a>
  </div>
  <!--Script-->
  <script type="text/javascript">
    window.addEventListener("load", function() {
      setTimeout(function open(event) {
        document.querySelector(".popup").style.display = "block";
      }, 2000);
    });

    document.querySelector("#close").addEventListener("click", function() {
      document.querySelector(".popup").style.display = "none";
    });
  </script>
</body>

</html>