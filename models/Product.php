<?php

class Product {

  const SHOW_BY_DEFAULT = 1;

  public static function getLatestProductsList($count = self::SHOW_BY_DEFAULT, $page = 1){
    $count = intval($count);
    $page = intval($page);
    $offset = ($page - 1) * $count;

    $db = Db::getConnection();
    $productList = array();

    $stmnt = $db->prepare(
      'SELECT id, name, price, image, is_new '
        . 'FROM Product WHERE status = 1 '
        . 'ORDER BY id DESC '
        . 'LIMIT :count '
        . 'OFFSET :offset;'
      );
    $stmnt->bindParam(':count', $count, PDO::PARAM_INT);
    $stmnt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmnt->execute();
    
    $productList = $stmnt->fetchAll(PDO::FETCH_ASSOC);

    return $productList;
  }

  public static function getProductsListByCategory($categoryId = false, $page = 1) {
    if ($categoryId) {
      $count = self::SHOW_BY_DEFAULT;
      $page = intval($page);
      $offset = ($page - 1) * $count;
      
      $db = Db::getConnection();

      $products = array();

      $stmnt = $db->prepare('SELECT id, name, price, image, is_new '
        . 'FROM Product WHERE status = 1 AND category_id = :category_id '
        . 'ORDER BY id DESC '
        . 'LIMIT :count '
        . 'OFFSET :offset;'
      );
      $stmnt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
      $stmnt->bindParam(':count', $count, PDO::PARAM_INT);
      $stmnt->bindParam(':offset', $offset, PDO::PARAM_INT);
      $stmnt->execute();

      $products = $stmnt->fetchAll(PDO::FETCH_ASSOC);

      return $products;
    }
  }

  public static function getProductById($id) {
    $db = Db::getConnection();

    $stmnt = $db->prepare(
      "SELECT * FROM Product WHERE id = :id;"
    );
    $stmnt->bindParam(':id', $id, PDO::PARAM_INT );
    $stmnt->execute();

    $product = $stmnt->fetch(PDO::FETCH_ASSOC);

    return $product;
  }

  public static function getTotalProductsInCategory($categoryId) {
    $db = Db::getConnection();

    $sql = 'SELECT count(id) AS count FROM product WHERE status="1" AND category_id = :category_id';
    $stmnt = $db->prepare($sql);
    $stmnt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
    $stmnt->execute();

    $row = $stmnt->fetch();
    return $row['count'];
  }

  public static function getProductsList() {
    $db = Db::getConnection();

    $stmnt = $db->prepare('SELECT id, name, price, code FROM product ORDER BY id ASC');
    $stmnt->execute();
    $productsList = array();
    $productsList = $stmnt->fetchAll(PDO::FETCH_ASSOC);

    return $productsList;
  }
}