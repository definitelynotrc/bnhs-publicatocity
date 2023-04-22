<?php

require_once 'DatabaseHandler.php';

class Announcement extends DatabaseHandler
{
  public function createAnnouncement(string $title, string $description)
  {
    $conn = $this::connect();
    $sql = "INSERT INTO announcements (title, description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    try {
      $stmt->execute([$title, $description]);
      return [true, "Announcement created successfully"];
    } catch (PDOException $e) {
      // check if error is duplicate entry
      if ($e->errorInfo[1] == 1062) {
        return [false, "Announcement already exists"];
      }

      return [false, $e->getMessage()];
    }
  }

  public function getAnnouncements()
  {
    $conn = $this::connect();
    $sql = "SELECT * FROM announcements";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}
