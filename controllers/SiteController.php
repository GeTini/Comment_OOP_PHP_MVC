<?php

class SiteController
{

  public function actionIndex()
  {
  	$overviewPage = 'is-active';
    $products = array();
    $products = Product::getLatestProducts(6);
    require_once(ROOT . '/views/site/index.php');
    return true;
  }

  public function actionContact()
  {
    $contactPage = 'is-active';
    $result = false;

    if (isset($_POST['submit'])) {
      $userEmail = $_POST['email'];
      $userText = $_POST['message'];

      $errors = false;

      if (!User::checkEmail($userEmail)) {
        $errors = 'Невірний Email';
      }

      if ($errors == false) {
        $adminEmail = 'vberkoz@gmail.com';
        $message = "Текст: {$userText} Від {$userEmail}";
        $subject = 'Ноутбук сервіс';
        $result = mail($adminEmail, $subject, $message);
        $result = true;
      }
    }

    require_once(ROOT.'/views/site/contact.php');

    return true;

  }

}
?>
