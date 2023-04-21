<?php
// import controller
require_once 'Controller.php';
require_once 'models/UserGallery.model.php';

class GalleryController extends Controller
{

  public function get()
  {
    $this->verifyLogin();
  }

  public function post()
  {
    $this->verifyLogin();
  }
}
$gallery = new GalleryController();
$context = $gallery->getContext();
