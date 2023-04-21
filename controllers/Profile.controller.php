<?php

require_once 'Controller.php';
require_once 'models/User.model.php';
require_once 'models/UserGallery.model.php';

class ProfileController extends Controller
{
  public function get()
  {
    $this->verifyLogin();
    $userGallery = new UserGallery();
    $user = new User();
    $gallery = $userGallery->getPhotosFromGallery($_SESSION['user']['id']);
    $this->context['gallery'] = $gallery;
    $this->context["pfp"] = $user->getUserById($_SESSION['user']['id'])['profile_pic_url'];
    return $this->context;
  }

  public function post()
  {
    $this->verifyLogin();
  }
}

$profile = new ProfileController();
$context = $profile->getContext();
