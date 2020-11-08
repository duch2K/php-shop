<?php

class SiteController {

  public function actionIndex() {
    $categories = array();
    $categories = Category::getCategoriesList();

    $latestProducts = array();
    $latestProducts = Product::getLatestProductsList(10);
    
    require_once(ROOT . '/views/site/index.php');
    return true;
  }

  public function actionContact() {
    $userEmail = '';
    $text = '';
    $result = false;
    
    if (isset($_POST['submit'])) {
      $userEmail = $_POST['userEmail'];
      $text = $_POST['userText'];

      $errors = false;

      if (!User::checkEmail($userEmail)) {
        $errors[] = 'Invalid email!';
      }

      if ($errors == false) {
        $adminEmail = 'admin@gmail.com';
        $message = "{$text} <br><br>From: {$userEmail}";
        $subject = 'Feedback';
        $result = mail($adminEmail, $subject, $message);
      }
    }

    require_once(ROOT . '/views/site.contact.php');

    return true;
  }
}