<?php
// import controller
require_once 'Controller.php';
require_once '../models/User.model.php';
require_once '../models/Event.model.php';

class AdminEventController extends Controller
{

  public function get()
  {
    $this->verifyLogin();
  }

  public function post()
  {
    $this->verifyLogin();

    $event = new Events();
    $eventCreated = $event->createEvent($_POST["event-name"], $_POST["event-date"]);

    $this->context = array(
      "message" => $eventCreated[1],
      "success" => $eventCreated[0]
    );
    return $this->context;
  }
}

$adminEvent = new AdminEventController();
$context = $adminEvent->getContext();
