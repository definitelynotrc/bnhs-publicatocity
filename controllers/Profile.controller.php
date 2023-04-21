<?php

require_once 'Controller.php';
require_once 'models/User.model.php';

class ProfileController extends Controller
{
  public function get()
  {
    $this->verifyLogin();
    return $this->context;
  }
}

$profile = new ProfileController();
$context = $profile->getContext();
