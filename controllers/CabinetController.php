<?php
class CabinetController {

  public function actionIndex() {
    $cabinetPage = 'is-active';
    $userId = User::checkLogged();
    $user = User::getUserById($userId);
    require_once(ROOT.'/views/cabinet/index.php');
    return true;
  }

  public function actionEdit() {
    $userId = User::checkLogged();
    $user = User::getUserById($userId);
    $name = $user['name'];
    $password = $user['password'];
    $result = false;
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $password = $_POST['password'];
      $errors = false;
      if (!User::checkName($name)) {
        $errors[] = "Ім'я повинне бути довше ніж 2 символи";
      }
      if (!User::checkPassword($password)) {
        $errors[] = 'Пароль повинен бути довше ніж 6 символів';
      }
      if ($errors == false) {
        $result = User::edit($userId, $name, $password);
      }
    }
    require_once(ROOT.'/views/cabinet/edit.php');
    return true;
  }

}
?>
