<?php

class User {

  public static function register($name, $email, $password) {
    $password = password_hash($password, PASSWORD_DEFAULT);

    $db = DB::getConnection();

    $sql = 'INSERT INTO User (name, email, password) '
            . 'VALUES(:name, :email, :password)';

    $stmnt = $db->prepare($sql);
    $stmnt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmnt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmnt->bindParam(':password', $password, PDO::PARAM_STR);

    return $stmnt->execute();
  }

  public static function checkName($name) {
    if (strlen($name) >= 1) {
      return true;
    }
    return false;
  }

  public static function checkEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return true;
    }
    return false;
  }

  public static function checkPassword($password) {
    if (strlen($password) >= 6) {
      return true;
    }
    return false;
  }

  public static function checkEmailExists($email) {
    $db = Db::getConnection();

    $sql = 'SELECT COUNT(*) FROM User WHERE email = :email';

    $stmnt = $db->prepare($sql);
    $stmnt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmnt->execute();

    if ($stmnt->fetchColumn())
      return true;

    return false;
  }

  public static function checkUserData($email, $password) {
    $db = Db::getConnection();

    $sql = 'SELECT * FROM User WHERE email = :email';

    $stmnt = $db->prepare($sql);
    $stmnt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmnt->execute();

    $user = $stmnt->fetch(PDO::FETCH_ASSOC);
    
    if (password_verify($password, $user['password']))
      return $user['id'];

    return false;
  }

  public static function auth($userId) {
    $_SESSION['user'] = $userId;
  }

  public static function checkLogged() {
    if (isset($_SESSION['user'])) {
      return $_SESSION['user'];
    }

    header('Location: /php-test/user/login');
  }

  public static function isGuest() {
    if (isset($_SESSION['user'])) {
      return false;
    }
    return true;
  }

  public static function getUserById($id) {
    $db = Db::getConnection();

    $sql = 'SELECT * FROM User WHERE id = :id';

    $stmnt = $db->prepare($sql);
    $stmnt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmnt->execute();

    return $stmnt->fetch(PDO::FETCH_ASSOC);
  }

  public static function edit($id, $name, $password) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $db = Db::getConnection();

    $sql = 'UPDATE user SET name = :name, password = :password 
      WHERE id = :id';

    $stmnt = $db->prepare($sql);
    $stmnt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmnt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmnt->bindParam(':password', $password, PDO::PARAM_STR);
    return $stmnt->execute();
  }
}