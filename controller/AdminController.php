<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/AdminDAO.php';
require_once __DIR__ . '/../dao/EventsDAO.php';


class AdminController extends Controller {

  private $AdminDAO;

  function __construct() {
    $this->AdminDAO = new AdminDAO();
    $this->EventsDAO = new EventsDAO();
  }

  public function index() {
    $events = $this->EventsDAO->getAllEvents();
    $eventList = "<ul>";
    foreach($events as $event) {
      $eventList .= "<li>";
      $eventList .= "<a href='index.php?page=admin&eventid=".$event["id"]."'>".$event["name"]."</a> - <a href='index.php?page=admin&deleteid=".$event["id"]."'>Delete</a>";
      $eventList .= "</li>";
    }
    $eventList .= "<li>&nbsp;</li>";
    $eventList .= "<li><a href='index.php?page=admin&do=add'>!!ADD EVENT!!</a></li>";
    $eventList .= "</ul>";
    if (isset($_GET["eventid"])) {
      $editEvent = $this->EventsDAO->getEvent($_GET["eventid"]);
      $this->set('editEvent', $editEvent);
      if (isset($_POST["subedit"])) {
        $this->AdminDAO->updateEvent($_POST, $_GET["eventid"]);
      }
    }
    if (isset($_GET["do"]) && $_GET["do"] == "add") {
      if (isset($_POST["subadd"])) {
        $this->AdminDAO->addEvent($_POST);
      }
    }

    if (isset($_GET["deleteid"]) ) {
      $this->AdminDAO->deleteEvent($_GET["deleteid"]);

    }
    $this->set('events', $eventList);
  }

}
