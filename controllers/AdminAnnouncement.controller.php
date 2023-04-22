<?php
// import controller
require_once 'Controller.php';
require_once '../models/User.model.php';

class AdminAnnouncementController extends Controller
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
$adminAnnouncement = new AdminAnnouncementController();
$context = $adminAnnouncement->getContext();
