<?php

class ProductController
{

  public function actionView($productId)
  {
    if (isset($_POST['submit'])) {
      if ($_POST['submit'] == 'create') {
        $comment = $_POST['comment'];
        $commentId = $_POST['comment_id'];
        $toUser = $_POST['to_user'];
        $userId = User::checkLogged();
        $result = Comment::createComment($comment, $userId, $productId, $commentId, $toUser);
      }
      if ($_POST['submit'] == 'update') {
        $comment = $_POST['update'];
        $commentId = $_POST['comment_id'];
        $result = Comment::updateComment($comment, $commentId);
      }
    }
  	$detailsPage = 'is-active';
    $product = Product::getProductById($productId);
    $comments = Comment::getCommentsByProductId($productId);
    require_once(ROOT.'/views/product/view.php');
    return true;
  }

}
?>