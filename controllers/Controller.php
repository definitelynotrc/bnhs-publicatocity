<?php
session_start();


class Controller
{

  public $context;


  public function __construct()
  {
    $http_method = $_SERVER['REQUEST_METHOD'];

    if ($http_method === "GET") {
      $this->get();
    } else if ($http_method === "POST") {
      $this->post();
    } else if ($http_method === "PUT") {
      $this->put();
    } else if ($http_method === "DELETE") {
      $this->delete();
    } else {
      $this->error();
    }
  }


  public function verifyLogin()
  {
    if (!isset($_SESSION['user'])) {
      header("Location: login.php");
    }
  }

  public function getContext()
  {
    return $this->context;
  }


  public function get()
  {
    return;
  }

  public function post()
  {
    return;
  }

  public function put()
  {
    return;
  }

  public function delete()
  {
    return;
  }

  public function error()
  {
    return;
  }
}
