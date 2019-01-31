<?php
include 'db.php';

$sql = "SELECT product_cat, COUNT(*) as total
FROM products
GROUP BY product_cat";

$labels =  array();
$totals =  array();
$result = $conn->query($sql);
while ($row = $result->fetch_array()) {
  $cat = $row['product_cat'];
  $sql2 = "SELECT * FROM categories WHERE cat_id = '$cat'";
  $result2 = $conn->query($sql2);
  $row2 = $result2->fetch_array();
  array_push($labels,$row2['cat_title']);
  array_push($totals,$row['total']);
  echo $row2['cat_title'];
  echo $row['total'];
    echo "</br>";
}
$labelData = "'".implode("','", $labels)."'";
//  "'" . str_replace(",", "','", $mystring) . "'"
$totalData = implode(",", $totals);
echo $labelData;

echo $totalData;

 ?>
