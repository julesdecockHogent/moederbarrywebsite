<?php

require_once __DIR__ . '/DAO.php';

class ContactDAO extends DAO {

  public function sendRoddel($message) {
    $sql = "INSERT INTO `mb_roddels` (roddel, date) VALUES (:message, CURRENT_TIMESTAMP)";
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(':message', $message);
    $statement->execute();
  }

  public function sendMessage($post) {
    $sql = "INSERT INTO `mb_contact` (name, email, message, date) VALUES (:name, :email, :message, CURRENT_TIMESTAMP)";
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(':name', $post["name"]);
    $statement->bindValue(':email', $post["email"]);
    $statement->bindValue(':message', $post["message"]);
    $statement->execute();
  }
}
