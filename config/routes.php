<?php
return array(
  'product/([0-9]+)' => 'product/view/$1',

  'user/register' => 'user/register',
  'user/login' => 'user/login',
  'user/logout' => 'user/logout',

  'cabinet' => 'cabinet/index',

  '' => 'site/index',
  
  'comment/del/([0-9]+)' => 'comment/del/$1',
);
?>