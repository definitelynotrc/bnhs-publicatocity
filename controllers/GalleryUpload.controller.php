<?php
// import controller
require_once 'Controller.php';
require_once 'models/UserGallery.model.php';

class UploadGalleryController extends Controller
{

  public function get()
  {
    $this->verifyLogin();
    return [];
  }

  public function post()
  {
    $this->verifyLogin();

    if (isset($_FILES['image-to-upload-1'])) {
      $userGallery = new UserGallery();
      // get all the images uploaded
      $isUploaded = $userGallery->uploadImage($_SESSION['user']['id'], $_FILES);
      header('Content-Type: application/json; charset=utf-8');
      echo json_encode($isUploaded);
      return;
    }

    echo json_encode($this->context);
  }
}
$galleryUpload = new UploadGalleryController();
$context = $galleryUpload->getContext();
