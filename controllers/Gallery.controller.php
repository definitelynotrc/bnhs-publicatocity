<?php
// import controller
require_once 'Controller.php';
require_once 'models/User.model.php';

class GalleryController extends Controller
{

  public function get()
  {
    $this->verifyLogin();
    $user = new User();
    $this->context["pfp"] = $user->getUserById($_SESSION['user']['id'])['profile_pic_url'];
    return $this->context;
  }

  public function post()
  {
    $this->verifyLogin();
  }
}
$gallery = new GalleryController();
$context = $gallery->getContext();
