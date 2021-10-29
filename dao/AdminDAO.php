<?php

require_once __DIR__ . '/DAO.php';

class AdminDAO extends DAO {
  public function updateEvent($post, $id) {
    if(isset($post["subedit"])) {
      $sql = "UPDATE mb_events SET `name` = :name, `date` = :dates, `time` = :times, `fbevent` = :fbevent, `description` = :description, `image` = :image, `location` = :location WHERE `id` = :id";
      $statement = $this->pdo->prepare($sql);
      $statement->bindValue(':name', $post["name"]);
      $statement->bindValue(':dates', $post["dates"]);
      $statement->bindValue(':times', $post["times"]);
      $statement->bindValue(':fbevent', $post["fbevent"]);
      $statement->bindValue(':description', $post["description"]);
      $statement->bindValue(':image', $post["image"]);
      $statement->bindValue(':location', $post["location"]);
      $statement->bindValue(':id', $id);
      $statement->execute();
      header('location: index.php?page=admin');
    }
  }

  public function addEvent($post) {
    if(isset($post["subadd"])) {
      $sql = "INSERT INTO mb_events  (`name`, `date`, `time`, `fbevent`, `description`, `image`, `location`) VALUES (:name, :dates, :times, :fbevent, :description, :image, :location)";
      $statement = $this->pdo->prepare($sql);
      $statement->bindValue(':name', $post["name"]);
      $statement->bindValue(':dates', $post["dates"]);
      $statement->bindValue(':times', $post["times"]);
      $statement->bindValue(':fbevent', $post["fbevent"]);
      $statement->bindValue(':description', $post["description"]);
      $statement->bindValue(':image', $post["image"]);
      $statement->bindValue(':location', $post["location"]);
      $statement->execute();
      header('location: index.php?page=admin');
    }
  }

  public function deleteEvent($id) {
    $sql = "DELETE FROM `mb_events` WHERE id = :id";
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
    header('location: index.php?page=admin');
  }
}
