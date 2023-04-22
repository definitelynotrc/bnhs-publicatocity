<?php

require_once 'Controller.php';
require_once 'models/User.model.php';
require_once 'models/UserGallery.model.php';

class ProfileController extends Controller
{
  public function get()
  {

    // check parameters 
    if (!isset($_SESSION["user"])) {
      if (isset($_GET['id'])) {
        $user = new User();
        $result = $user->getUserById($_GET['id']);
        if (!$result) {
          // redirect to 404 page
          // header('Location: /404.php');
          // render 404 page
          $this->context['404'] = true;
          return;
        } else {
          $user = $result;
          $userGallery = new UserGallery();
          $gallery = $userGallery->getPhotosFromGallery($_GET['id']);
          $this->context['gallery'] = $gallery;
          $this->context["pfp"] = $user['profile_pic_url'];
          $this->context["readOnly"] = true;
          $this->context["user"] = $user;
          return $this->context;
        }
      } else {
        // redirect to 404 page
        header('Location: /login.php');
        return;
      }
    }

    $user_id = isset($_GET["id"]) ? $_GET["id"] : $_SESSION['user']['id'];
    $user = new User();

    if ($user_id != $_SESSION["user"]["id"]) {
      $result = $user->getUserById($user_id);
      if (!$result) {
        $this->context['404'] = true;
        return;
      } else {
        $user = $result;
        $userGallery = new UserGallery();
        $gallery = $userGallery->getPhotosFromGallery($_GET['id']);
        $this->context['gallery'] = $gallery;
        $this->context["pfp"] = $user['profile_pic_url'];
        $this->context["visitorOnly"] = true;
        $this->context["readOnly"] = true;
        $this->context["user"] = $user;
        return $this->context;
      }
    } else {

      $userGallery = new UserGallery();
      $gallery = $userGallery->getPhotosFromGallery($user_id);
      $this->context['gallery'] = $gallery;
      $this->context["pfp"] = $user->getUserById($user_id)['profile_pic_url'];
      return $this->context;
    }
  }

  public function post()
  {
    $this->verifyLogin();
  }
}

$profile = new ProfileController();
$context = $profile->getContext();
