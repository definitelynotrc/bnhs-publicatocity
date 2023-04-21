<?php
require_once "controllers/Gallery.controller.php";

$isLoggedIn = isset($_SESSION['user']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@<?= $_SESSION["user"]["username"] ?> | Galleries</title>
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

  [v-cloak] {
    display: none;
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
  <div id="root" class="header__wrapper">
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
            <li><a href="./userprofile.php">photos</a></li>
            <li><a href="./gallery.php" class="active">galleries</a></li>
          </ul>
          <button class="<?= $isLoggedIn ? "secondary" : "Follow" ?>"><?= $isLoggedIn ? "Edit Profile" : "Follow" ?></button>
        </nav>
        <div v-if="result != null" :class="{success: result.success, error: !result.success}" class="msg" v-cloak>
          {{ result["message"] }}
        </div>
        <div class="hero">

          <form style="display: none">
            <input type="file" name="file-to-upload" v-on:change="setPreview" accept="image/png, image/gif, image/jpeg" hidden />
          </form>
          <div class="img__container">
            <div class=" uploader" v-on:click="previewUpload" style="border: 1px solid #1f1f1f90; min-height: 280px; max-height: 280px; max-width: 280px; min-width: 280px; display: flex; align-items: center; justify-content:center">
              <i class="far fa-plus" style="color: #1f1f1f90; font-size: 5rem"></i>
            </div>
            <button class="save-btn" type="button" v-on:click="saveUpload" v-if="imageToUploads.length >= 1" v-cloak>Save</button>
          </div>
          <div class="img__container">
          </div>
          <div class="img__container">
          </div>

        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <script type="text/javascript">
    let toggle_bar = document.querySelector(".nav-header");
    const image_to_upload = [];
    const {
      createApp
    } = Vue

    let sidebar = document.querySelector(".sidebar");

    toggle_bar.addEventListener("click", function() {
      if (toggle_bar.firstElementChild.classList.contains("fa-bars")) {
        toggle_bar.firstElementChild.classList.replace("fa-bars", "fa-times");
      } else {
        toggle_bar.firstElementChild.classList.replace("fa-times", "fa-bars");
      }
      sidebar.classList.toggle("sidebaractive")
    })

    // 

    createApp({

      methods: {
        previewUpload(e) {
          document.querySelector("[name='file-to-upload']").click();
        },

        saveUpload(e) {
          const form = new FormData();
          this.imageToUploads.forEach((img, index) => {
            const reader = new FileReader();
            reader.readAsDataURL(img);
            form.append("image-to-upload-" + (index + 1), img)
          })

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
              this.result = data;
            })
            .catch(error => {
              console.error('There was a problem with the fetch operation:', error);
            });

        },

        setPreview(e) {
          const file = e.currentTarget.files[0];

          // document.querySelector("#hero").insertAdjacentElement("afterbegin", document.querySelector(".uploader"));
          // document.querySelector("#hero").insertAdjacentHTML

          if (file.type.startsWith('image/')) {
            // Create a new FileReader object
            const reader = new FileReader();

            // When the FileReader has loaded the image, set the preview element's source to the image data
            reader.addEventListener('load', () => {
              // create random id
              const id = "image-to-upload-" + (this.imageToUploads.length + 1);
              const newImgContainer = document.querySelector(".hero")
              newImgContainer.insertAdjacentHTML("afterbegin", `
              <div class="img__container">
                <img src="#" id="${id}" name="${id}" alt="preview" />
              </div>
              `);
              document.querySelector("#" + id).src = reader.result;
              this.imageToUploads.push(file);
            });

            // Read the image file as a data URL
            reader.readAsDataURL(file);
          }

        },
      },
      data() {
        return {
          imageToUploads: [],
          result: null
        }
      }
    }).mount('#root')
  </script>
</body>

</html>