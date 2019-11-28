<?php
  include_once('../includes/database.php');

  /**
   * Verifies if a certain username, password combination
   * exists in the database. Use the sha1 hashing function.
   */
  function checkUserPassword($username, $password) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Utilizador WHERE username = ?');
    $stmt->execute(array($username));

    $user = $stmt->fetch();
    return ($password == $user['pass']);
  }

  function insertUser($username, $password, $email, $name) {
    $db = Database::instance()->db();

    $options = ['cost' => 12];

    $stmt = $db->prepare('INSERT INTO Utilizador VALUES(?, ?, ?, ?, ?, ?)');
    $stmt->execute(array(NULL, $username, $name, $email, NULL, password_hash($password, PASSWORD_DEFAULT, $options)));
  }
?>
