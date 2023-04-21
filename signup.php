<?php

require_once 'controllers/SignUp.controller.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Sign up</title>
  <link rel="stylesheet" type="text/css" href="./css/signup.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="registerform" style="width: 30%">
    <h1>Welcome to Publicatocity</h1>
    <?php
    // check if success in context
    if (isset($context['success']) && $context['success']) {
      echo "<div class=\" msg success \">{$context['message']} <br><small>redirecting In 5 seconds...</small></div>";
    } else if (isset($context['success']) && !$context['success']) {
      echo "<div class=\" msg error \">{$context['message']}</div>";
    }
    ?>

    <h4 style="text-align: center">Sign Up Here</h4>
    <form method="POST">
      <i class="fa-regular fa-user" style="color: white"></i>
      <input type="text" name="first_name" placeholder="Enter Firstname" required />
      <i class="fa-regular fa-user" style="color: white"></i>
      <input type="text" name="last_name" placeholder="Enter Lastname" required />
      <i class="fa-regular fa-user" style="color: white"></i>
      <input type="text" name="username" placeholder="Enter Username" required />
      <i class="fa-solid fa-envelope" style="color: #f2f2f2"></i>
      <input type="email" name="email" placeholder="Enter Email" required />
      <i class="fa-solid fa-lock" style="color: #fcfcfc"></i>
      <input type="password" name="password" placeholder="Enter Password" required />
      <input type="submit" name="" value="Sign up" />
      <a href="login.php">Already have an account?</a><br />
    </form>
  </div>

  <script type="text/javascript">
    <?php if (isset($context['success']) && $context['success']) {
      echo "setTimeout(() => {
      window.location.href = 'login.php';
    }, 5000);";
    } ?>
  </script>

</body>

</html>