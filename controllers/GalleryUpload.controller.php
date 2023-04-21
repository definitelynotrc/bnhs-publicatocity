<?php
// import controller
require_once 'Controller.php';
require_once 'models/User.model.php';
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

    if (isset($_FILES['pfp'])) {
      header('Content-Type: application/json; charset=utf-8');
      $user = new User();
      $file = $_FILES['pfp'];
      $user_id = $_SESSION['user']['id'];

      // get uploaded files
      $target_dir = "uploads/pfp-" . $user_id . "/";
      if (!file_exists($target_dir)) {
        mkdir("uploads/pfp-" . $user_id, 0777, true);
      }
      $file_name = substr(md5(mt_rand()), 0, 7) . "-" . basename($file["name"]);
      $target_file = $target_dir . $file_name;
      $check = getimagesize($file["tmp_name"]);
      if ($check !== false) {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
          // $uploadedFilesPath[] = $target_file;
        } else {
          echo json_encode(["success" => false, "message" => "Can't upload your file, Please check permissions."]);
          return;
        }
      } else {
        return;
        echo json_encode(["success" => false, "message" => "Can't upload your file, Please check network requests."]);
      }

      $isUpdated = $user->changeUserProfilePic($target_file);
      if ($isUpdated[0]) {
        echo json_encode(["success" => true, "message" => "Profile picture updated successfully."]);
        return;
      } else {
        echo json_encode(["success" => false, "message" => "Can't update your profile picture, Please try again later."]);
        return;
      }
    }

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
