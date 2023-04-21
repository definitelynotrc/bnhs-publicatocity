<?php
error_reporting(E_ERROR);

require_once 'DatabaseHandler.php';

class UserGallery extends DatabaseHandler
{

  public function uploadImage(int $user_id)
  {
    $conn = $this::connect();

    // get uploaded files
    $uploadedFilesPath = [];


    foreach ($_FILES as $filename => $f) {
      // random text
      // create directory
      $target_dir = "uploads/gallery-" . $user_id . "/";
      if (!file_exists($target_dir)) {
        mkdir("uploads/gallery-" . $user_id, 0777, true);
      }
      $file_name = substr(md5(mt_rand()), 0, 7) . "-" . basename($f["name"]);
      $target_file = $target_dir . $file_name;
      $check = getimagesize($f["tmp_name"]);
      if ($check !== false) {
        if (move_uploaded_file($f["tmp_name"], $target_file)) {
          $uploadedFilesPath[] = $target_file;
        } else {
          return json_encode(["success" => false, "message" => "Can't upload your file, Please check permissions."]);
        }
      } else {
        return json_encode(["success" => false, "message" => "Can't upload your file, Please check network requests."]);
      }
    }

    try {
      $sql = "INSERT INTO user_gallery (user, gallery_url) VALUES ";

      foreach ($uploadedFilesPath as $path) {
        if (end($uploadedFilesPath) == $path) {
          $sql .= "($user_id, '$path');";
          break;
        } else {
          $sql .= "($user_id, '$path'),";
        }
      }

      $stmt = $conn->prepare($sql);
      $stmt->execute();
      return ["success" => True, "message" => "All files are uploaded.", "sql" => $sql];
    } catch (PDOException $e) {
      return ["success" => False, "message" => $e->getMessage(), "sql" => $sql];
    }
  }

  public function getPhotosFromGallery(int $user_id)
  {
    $conn = $this::connect();
    $sql = "SELECT * FROM user_gallery WHERE user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}
