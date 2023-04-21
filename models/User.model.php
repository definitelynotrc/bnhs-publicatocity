<?php

require_once 'DatabaseHandler.php';

class User extends DatabaseHandler
{

  public function createUser()
  {
    $conn = $this::connect();
    $sql = "INSERT INTO users (username, password, email, first_name, last_name) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    try {
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $stmt->execute([$_POST['username'], $password, $_POST['email'], $_POST['first_name'], $_POST['last_name']]);
      return [true, "User created successfully"];
    } catch (PDOException $e) {
      // check if error is duplicate entry
      if ($e->errorInfo[1] == 1062) {
        return [false, "Username or email already exists"];
      }

      // check if error is invalid email
      if ($e->errorInfo[1] == 1064) {
        return [false, "Invalid email"];
      }
      return [false, $e->getMessage()];
    }
  }

  public function checkUserByCredential(string $username, string $password)
  {
    $conn = $this::connect();
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // if result is empty, return false
    if (empty($result)) {
      return [false, null];
    } else {
      if (password_verify($password, $result['password'])) {
        return [true, $result];
      } else {
        return [false, null];
      }
    }
  }

  public function changeUserProfilePic(string $url)
  {
    $conn = $this::connect();
    $user_id = $_SESSION['user']['id'];

    $sql = "UPDATE users SET profile_pic_url = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    try {
      $stmt->execute([$url, $user_id]);
      return [true, "Profile picture updated successfully"];
    } catch (PDOException $e) {
      return [false, $e->getMessage()];
    }
  }

  public function getUserById(int $user_id)
  {
    $conn = $this::connect();
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
}
