<?php

  include 'db.php';
  //include Stripe PHP library
  require_once('../stripe-php/init.php');
  
  if (isset($_POST['id'])) {
    
    $orderID = $_POST['id'];


    // Here, you can also perform some database query operations with above values.
    \Stripe\Stripe::setApiKey("sk_test_oBtNN0oOK9A6HwYDnQiwPQMc");
    $orderInfo = \Stripe\Order::retrieve($orderID);
    $product = array();
    
    foreach ($orderInfo["items"] as $item => $value) {
        if($value["type"] == "sku") 
        {
            $sku = $value["parent"];
            $skuInfo = \Stripe\SKU::retrieve($sku);

            $productInfo = \Stripe\Product::retrieve($skuInfo["product"]);
            
            $product[$item] = $productInfo;
                        
        }
        else
        {
            continue;
        } 
    }
    $pJSON = json_encode($product, JSON_PRETTY_PRINT);
    print_r ($pJSON);
    
}



  

?>
