<?php
// import controller
require_once 'Controller.php';
require_once 'models/User.model.php';

class LoginController extends Controller
{

  public function get()
  {
    $this->context = array();
  }

  public function post()
  {
    // check if username and password are set
    if (isset($_POST['username']) && isset($_POST['password'])) {
      $user = new User();
      $userFound = $user->checkUserByCredential($_POST['username'], $_POST['password']);
      // if user is found, set session and redirect to home page
      if ($userFound[0]) {
        // insert once user is found
        $_SESSION['user'] = $userFound[1];
        $this->context = array(
          "message" => "Login Successful",
          "success" => true
        );
      } else {
        $this->context = array(
          "message" => "Invalid username or password",
          "success" => false
        );
      }
    } else {
      $this->context = array(
        "message" => "Invalid username or password",
        "success" => false
      );
    }
    return $this->context;
  }
}
$login = new LoginController();
$context = $login->getContext();
