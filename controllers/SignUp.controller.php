<?php

// import controller
require_once 'Controller.php';
require_once 'models/User.model.php';

class SignUpController extends Controller
{

  public function get()
  {
    return;
  }

  public function post()
  {
    $user = new User();
    $userCreated = $user->createUser();

    $this->context = array(
      "message" => $userCreated[1],
      "success" => $userCreated[0]
    );

    return $this->context;
  }
}
$signup = new SignUpController();
$context = $signup->getContext();
