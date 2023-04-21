<?php

class DatabaseHandler
{

  public static function connect()
  {
    $USERNAME = "root";
    $PASSWORD = "";
    $SERVER = "localhost";
    $DATABASE = "bnhs_publicatocity";

    try {
      $conn = new PDO("mysql:host=$SERVER;dbname=$DATABASE", $USERNAME, $PASSWORD);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      return null;
    }
  }
};
