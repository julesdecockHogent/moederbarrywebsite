<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ContactDAO.php';
require_once __DIR__ . '/../dao/EventsDAO.php';
require_once __DIR__ . '/../dao/PraesidiumDAO.php';


class UsersController extends Controller {

  private $ContactDAO;
  private $EventsDAO;
  private $PraesidiumDAO;

  function __construct() {
    $this->ContactDAO = new ContactDAO();
    $this->EventsDAO = new EventsDAO();
    $this->PraesidiumDAO = new PraesidiumDAO();
  }

  public function index() {
    if (isset($_POST["subcf"]) && isset($_POST["name"])  && isset($_POST["email"]) && isset($_POST["message"])) {
      $this->ContactDAO->sendMessage($_POST);
    }

    $events = $this->EventsDAO->getAllEventsNow();
    $eventSection = "";
    foreach($events as $eventz) {
      $datez = date('D j F', strtotime($eventz['date']));
      $hourz = $eventz["time"];
      $eventSection .= '<article>
        <div class="activity__left">
          <img width="200" src="' . $eventz["image"] . '" alt="Moeder barry emblem" />
          <a href="' . $eventz["fbevent"] . '">Visit the event page!</a>
        </div>
        <div class="activity__content">
          <h3>' . $eventz["name"] . '</h3>
          <span class="date" style="top: 0rem; bottom: 1rem;margin-bottom: .5rem;">' . $datez . ' - ' . $hourz . ' - @'.$eventz["location"].'</span>
          <p>
            ' . $eventz["description"] . '
          </p>
        </div>
      </article>';
    }
    $this->set('events', $eventSection);
  }

  public function roddels() {
    if (isset($_POST["subroddel"]) && isset($_POST["roddelmsg"])) {
      $this->ContactDAO->sendRoddel($_POST["roddelmsg"]);
    }
  }

}
