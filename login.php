<?php
require_once 'controllers/Login.controller.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title>Log In</title>
  <link rel="stylesheet" type="text/css" href="./css/signup.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="registerform" style="width: 30%">
    <h1>Welcome to Publicatocity</h1>

    <form autocomplete="no" method="POST">
      <?php
      // check if success in context
      if (isset($context['success']) && $context['success']) {
        echo "<div class=\" msg success \">{$context['message']} <br><small>redirecting In 5 seconds...</small></div>";
      } else if (isset($context['success']) && !$context['success']) {
        echo "<div class=\" msg error \">{$context['message']}</div>";
      }
      ?>
      <i class="fa-regular fa-user" style="color: white"></i>
      <input type="text" autocomplete="no" name="username" placeholder="Enter Username" />
      <i class="fa-solid fa-key" style="color: #f2f2f2"></i>
      <input type="password" autocomplete="no" name="password" placeholder="Enter Password" />
      <input type="submit" name="" value="Log In" />
      <a href="signup.php">Don't have an account?</a><br />
    </form>
  </div>
  <script>
    <?php if (isset($context['success']) && $context['success']) {
      echo "setTimeout(() => {
      window.location.href = '/';
    }, 5000);";
    } ?>
  </script>
</body>

</html>