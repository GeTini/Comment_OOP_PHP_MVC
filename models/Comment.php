<?php
/**
 *
 */
class Comment
{

  public static function getCommentsByProductId($id)
  {
    $id = intval($id);
    if ($id) {
      $db = Db::getConnection();

      $result = $db->query("SELECT
        comments.id,
        comments.comment_text,
        comments.comment_date,
        comments.user_id,
        comments.product_id,
        comments.reply_to_comment,
        comments.reply_to_user,
        A.name AS from_user,
        B.name AS to_user
        FROM comments, users A, users B
        WHERE comments.user_id=A.id
        AND comments.reply_to_user=B.id
        AND comments.product_id=
        ".$id);

      $comments = array();
      $i = 0;
      while ($row = $result->fetch()) {
        $comments[$i]['id'] = $row['id'];
        $comments[$i]['comment_text'] = $row['comment_text'];
        $comments[$i]['comment_date'] = $row['comment_date'];
        $comments[$i]['user_id'] = $row['user_id'];
        $comments[$i]['product_id'] = $row['product_id'];
        $comments[$i]['reply_to_comment'] = $row['reply_to_comment'];
        $comments[$i]['reply_to_user'] = $row['reply_to_user'];
        $comments[$i]['from_user'] = $row['from_user'];
        $comments[$i]['to_user'] = $row['to_user'];
        $i++;
      }

      return $comments;
    }
  }

  public static function createComment($comment, $userId, $productId, $commentId, $toUser)
  {
    $db = Db::getConnection();
    $sql = 'INSERT INTO comments (comment_text, user_id, product_id, reply_to_comment, reply_to_user)
      VALUES (:comment_text, :user_id, :product_id, :reply_to_comment, :reply_to_user)';
    $result = $db->prepare($sql);
    $result->bindParam(':comment_text', $comment, PDO::PARAM_STR);
    $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
    $result->bindParam(':product_id', $productId, PDO::PARAM_STR);
    $result->bindParam(':reply_to_comment', $commentId, PDO::PARAM_STR);
    $result->bindParam(':reply_to_user', $toUser, PDO::PARAM_STR);
    $result->execute();
    return $result;
  }

  public static function updateComment($comment, $commentId)
  {
    $db = Db::getConnection();
    $sql = 'UPDATE comments SET comment_text = :comment_text WHERE id = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':comment_text', $comment, PDO::PARAM_STR);
    $result->bindParam(':id', $commentId, PDO::PARAM_STR);
    $result->execute();
    return $result;
  }
  
  public static function delComment($id)
  {
    $db = Db::getConnection();
    $sql = 'DELETE FROM comments WHERE id = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_STR);
	$result->execute();
	$sql = 'DELETE FROM comments WHERE reply_to_comment = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_STR);
	$result->execute();
    return $result;
  }

}

?>
