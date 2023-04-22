<?php

require_once 'DatabaseHandler.php';

class Events extends DatabaseHandler
{
  public function createEvent(string $eventName, string $assigned_date)
  {
    $conn = $this::connect();
    $sql = "INSERT INTO event (event_name, assigned_date) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    try {
      $stmt->execute([$eventName, $assigned_date]);
      return [true, "Event created successfully"];
    } catch (PDOException $e) {
      // check if error is duplicate entry
      if ($e->errorInfo[1] == 1062) {
        return [false, "Event already exists"];
      }

      return [false, $e->getMessage()];
    }
  }

  public function getEvents()
  {
    $conn = $this::connect();
    $sql = "SELECT * FROM event";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}
