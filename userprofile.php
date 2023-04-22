<?php
require_once "controllers/Profile.controller.php";


if (isset($context["404"])) {
  // only the content
  require_once "404.php";
  die();
}

$isLoggedIn = isset($_SESSION['user']);
$profile_pic = isset($context["pfp"]) ? $context["pfp"] : "./img/cyan.png";
$visitorOnly = isset($context["visitorOnly"]) ? $context["visitorOnly"] : false;
$readOnly = isset($context["readOnly"]) ? $context["readOnly"] : false;
// render 404 
$user = $context["user"];

if ($readOnly) {
  $username = $user['username'];
  $fullname = $user['first_name'] . " " . $user["last_name"];
} else {
  $username = $visitorOnly ? $user['username'] : $_SESSION['user']['username'];
  $fullname = $visitorOnly ? $user['first_name'] . " " . $user["last_name"] : $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@<?= $username ?> | Profile Picture </title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <!-- CSS -->
  <link rel="stylesheet" href="./css/userprofile.css" />
  <link rel="stylesheet" href="./css/TOGGLE.css" />
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>
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
    <li><a href="/">Home</a></li>
    <li><a href="#">About Us</a></li>
    <li><a href="#">Services</a></li>
    <li><a href="./gallery.php">Gallery</a></li>
    <li><a href="#">Contact Us</a></li>
    <li><a href="/logout.php">Log Out</a></li>
  </ul>

  <ul class="social-links">
    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
  </ul>
</div>

<body>
  <div id="root" class="header__wrapper">
    <header></header>
    <div class="cols__container">
      <div class="left__col">
        <div class="img__container <?= $readOnly ? 'readonly' : '' ?>">
          <?php if (!$readOnly) { ?>
            <div class="overlay change-pfp-btn" v-on:click="previewUpload">
              <i class='fa fa-pen' style="color: #ffffff90; margin-top: 70%;"></i>
            </div>
          <?php } ?>
          <img src="<?= $profile_pic ?>" class="pfp" alt="user-profile" />
          <span></span>
          <input type="file" value="" v-on:change="setPreview" name="change-pfp" hidden>
        </div>
        <h2><?= $fullname ?></h2>
        <p>@<?= $username ?></p>
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
            <li><a href="#" class="active">photos</a></li>
            <?= $visitorOnly || $readOnly ? '' : '<li><a href="./gallery.php">galleries</a></li>' ?>
          </ul>
          <template v-if="imageToUpload != null">
            <button v-on:click="saveUpload">Save Profile Picture</button>
          </template>
          <template v-else>
            <?php if ($readOnly) { ?>
              <button class="Follow" v-on:click="follow">Follow</button>
            <?php } else { ?>

              <button class="<?= $isLoggedIn ? "secondary" : "Follow" ?>"><?= $isLoggedIn ? "Edit Profile" : "Follow" ?></button>
            <?php } ?>
          </template>
        </nav>
        <div class="hero">
          <?php

          if (isset($context["gallery"]) && count($context["gallery"])) {
            foreach ($context["gallery"] as $gallery) {
              echo "<div class='img__container'>";
              if ($readOnly || $visitorOnly) {
              } else {
                echo "<div v-on:click='deletePhoto({$gallery["id"]})' class='overlay-delete'><i class='fa fa-trash'></i></div>";
              }
              echo "<img src='./{$gallery["gallery_url"]}' alt='Photo from {$gallery["id"]}'>";
              echo "</div>";
            }
          } else {
            echo '<div v-on:click="previewUpload" style="min-height: 280px; max-height: 280px; max-width: 280px; min-width: 280px; display: flex; align-items: center; justify-content:center">';
            echo '<span style="color: #1f1f1f90; font-size: 1.2rem; text-align: center">No Photos</span>';
            echo '</div>';
          }
          ?>
        </div>

      </div>
    </div>
  </div>
  </div>
  </div>

  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <script>
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
  </script>
  <script type="text/javascript">
    const {
      createApp
    } = Vue

    // 

    createApp({

      methods: {
        previewUpload(e) {
          document.querySelector("[name='change-pfp']").click();
        },

        saveUpload(e) {
          const form = new FormData();
          const img = this.imageToUpload;
          const reader = new FileReader();
          reader.readAsDataURL(img);
          form.append("pfp", img)

          // submit to this page with post on request
          // fetch 
          fetch('./upload-gallery.php', {
              method: "POST",
              body: form,
            })
            .then(response => {
              if (!response.ok) {
                throw new Error('Network response was not ok');
              }
              return response.json();
            })
            .then(data => {
              // Do something with the JSON data
              console.log(data);
              alert("Profile Picture Updated")
              window.location.reload();
            })
            .catch(error => {
              console.error('There was a problem with the fetch operation:', error);
            });

        },

        setPreview(e) {
          const file = e.currentTarget.files[0];

          if (file.type.startsWith('image/')) {
            // Create a new FileReader object
            const reader = new FileReader();

            // When the FileReader has loaded the image, set the preview element's source to the image data
            reader.addEventListener('load', () => {
              // create random id
              document.querySelector(".pfp").src = reader.result;
              this.imageToUpload = file;;
            });

            // Read the image file as a data URL
            reader.readAsDataURL(file);
          }
        },

        deletePhoto(id) {

          // fetch
          fetch('./upload-gallery.php', {
              method: "DELETE",
              body: JSON.stringify({
                id: id
              }),
            })
            .then(response => {
              if (!response.ok) {
                throw new Error('Network response was not ok');
              }
              return response.json();
            })
            .then(data => {
              // Do something with the JSON data
              console.log(data);
              alert("Photo Deleted")
              window.location.reload();
            })
            .catch(error => {
              console.error('There was a problem with the fetch operation:', error);
            });

          // delete photo from gallery
          // reload page
        }

      },
      data() {
        return {
          imageToUpload: null,
          result: null
        }
      }
    }).mount('#root')
  </script>

</body>

</html>