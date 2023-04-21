<?php
require_once "controllers/Profile.controller.php";

$isLoggedIn = isset($_SESSION['user']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@<?= $_SESSION["user"]["username"] ?> | Profile Picture </title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <!-- CSS -->
  <link rel="stylesheet" href="./css/userprofile.css" />
  <link rel="stylesheet" href="./css/TOGGLE.css" />
</head>
<style>
  *,
  *:before,
  *:after {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }

  body {
    background-color: white;
  }

  .popup {
    background-color: grey;
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
    ;
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
<div class="nav-header">
  <i class="fa fa-bars" style="color: #fff"></i>
</div>

<div class="sidebar ">

  <ul class="nav-links">
    <li><a href="./index.html">Home</a></li>
    <li><a href="#">About Us</a></li>
    <li><a href="#">Services</a></li>
    <li><a href="./gallery.php">Gallery</a></li>
    <li><a href="#">Contact Us</a></li>
  </ul>

  <ul class="social-links">
    <li><a href=""><i class="fa fa-facebook"></i></a></li>
    <li><a href=""><i class="fa fa-twitter"></i></a></li>
    <li><a href=""><i class="fa fa-instagram"></i></a></li>
    <li><a href=""><i class="fa fa-linkedin"></i></a></li>
  </ul>
</div>

<body>
  <div class="header__wrapper">
    <header></header>
    <div class="cols__container">
      <div class="left__col">
        <div class="img__container">
          <img src="./img/cyan.png" alt="Cabalar" />
          <span></span>
        </div>
        <h2><?= $_SESSION["user"]["first_name"] ?> <?= $_SESSION["user"]["last_name"] ?></h2>
        <p>@<?= $_SESSION["user"]["username"] ?></p>
        <p>PUBLICATOCITY MEMBER</p>
        <!-- <p>cornhub.com</p> -->

        <ul class="about">
          <li><span>4,073</span>Followers</li>
          <li><span>322</span>Following</li>
          <li><span>200,543</span>Attraction</li>
        </ul>

        <div class="content">
          <p>
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam
            erat volutpat. Morbi imperdiet, mauris ac auctor dictum, nisl
            ligula egestas nulla.
          </p>

          <ul>
            <li><i class="fab fa-twitter"></i></li>
            <i class="fab fa-pinterest"></i>
            <i class="fab fa-facebook"></i>
            <i class="fab fa-dribbble"></i>
          </ul>
        </div>
      </div>
      <div class="right__col">
        <nav>
          <ul>
            <li><a href="./userprofile.php" class="active">photos</a></li>
            <li><a href="./gallery.php">galleries</a></li>
          </ul>
          <button class="<?= $isLoggedIn ? "secondary" : "Follow" ?>"><?= $isLoggedIn ? "Edit Profile" : "Follow" ?></button>
        </nav>
        <div class="hero">
          <div class="img__container">
            <img src="./img/bianca.jpg">
          </div>
          <div class="img__container">
            <img src="./img/fedlianne.jpg">
          </div>
          <div class="img__container">
            <img src="./img/bianca.jpg">
          </div>
          <div class="img__container">
            <img src="./img/fedlianne.jpg">
          </div>
        </div>

        <div class="popup">
          <button id="close">&times;</button>
          <h2>Policies</h2>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita distinctio fugiat alias iure qui, commodi minima magni ullam aliquam dignissimos?
          </p>
          <a id="gawk" href="#">Thank You</a>
        </div>
        <!--Script-->
        <script type="text/javascript">
          window.addEventListener("load", function() {
            setTimeout(
              function open(event) {
                document.querySelector(".popup").style.display = "block";
              },
              2000
            )
          });


          document.querySelector("#close").addEventListener("click", function() {
            document.querySelector(".popup").style.display = "none";
          });

          document.querySelector("#close").addEventListener("click", function() {
            document.querySelector(".popup").style.display = "none";
          });
          let toggle_bar = document.querySelector(".nav-header");

          let sidebar = document.querySelector(".sidebar");

          toggle_bar.addEventListener("click", function() {
            if (toggle_bar.firstElementChild.classList.contains("fa-bars")) {
              toggle_bar.firstElementChild.classList.replace("fa-bars", "fa-times");
            } else {
              toggle_bar.firstElementChild.classList.replace("fa-times", "fa-bars");
            }
            sidebar.classList.toggle("sidebaractive")
          })
        </script>
      </div>
    </div>
  </div>
  </div>
  </div>
</body>

</html>