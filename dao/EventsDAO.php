<?php

require_once __DIR__ . '/DAO.php';

class EventsDAO extends DAO {
  public function getAllEventsNow() {
    $sql = "SELECT * FROM `mb_events` WHERE `date` > NOW() ORDER BY `date` ASC";
    $statement = $this->pdo->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getAllEvents() {
    $sql = "SELECT * FROM `mb_events`";
    $statement = $this->pdo->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getEvent($id) {
    $sql = "SELECT * FROM `mb_events` WHERE id = :id";
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }
}
