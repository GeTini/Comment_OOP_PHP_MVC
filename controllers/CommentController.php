<?php

class CommentController
{

  public function actionDel($id)
  {
    echo Comment::delComment($id);
    return true;
  }

}
?>