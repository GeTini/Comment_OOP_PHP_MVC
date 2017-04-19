<?php
class Product
{

  const SHOW_BY_DEFAULT = 6;
  public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
  {
    $count = intval($count);
    $db = Db::getConnection();
    $products = array();
    $result = $db->query('SELECT * FROM products '
      . 'ORDER BY id DESC '
      . 'LIMIT ' . $count);
    $i = 0;
    while ($row = $result->fetch()) {
      $products[$i]['id'] = $row['id'];
      $products[$i]['name'] = $row['name'];
      $products[$i]['duration'] = $row['duration'];
      $products[$i]['description'] = $row['description'];
      $products[$i]['image'] = $row['image'];
      $i++;
    }

    return $products;
  }

  public static function getProductById($id)
  {
    $id = intval($id);
    if ($id) {
      $db = Db::getConnection();
      $result1 = $db->query("SELECT * FROM products WHERE id=".$id);

      $images = array();
      $result2 = $db->query("SELECT * FROM images WHERE product_id=".$id);
      $i = 0;
      while ($row = $result2->fetch()) {
        $images[$i]['id'] = $row['id'];
        $images[$i]['image'] = $row['image'];
        $i++;
      }
      $result1->setFetchMode(PDO::FETCH_ASSOC);
      $result2->setFetchMode(PDO::FETCH_ASSOC);

      $result = array($result1->fetch(), $images);
      return $result;
    }
  }

}
?>
