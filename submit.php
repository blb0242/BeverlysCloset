<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'db.php';

//include Stripe PHP library
require_once('stripe-php/init.php');


//check whether stripe token is not empty
if(!empty($_POST['stripeToken'])) {
  \Stripe\Stripe::setApiKey("sk_live_jYgZ6rUsgNb9hPzqcqgnxh7R");
    $statusMsg = "Success";
    //get token, card and user info from the form
    $token  = $_POST['stripeToken'];
    $name = $_SESSION['name'];
    $email = $_POST['stripeEmail'];
    

    $getOrder = "SELECT a.*,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id=".$_SESSION['uid'];
    $runGetOrder = $con->query($getOrder);

        $i=0;
        \Stripe\Stripe::setApiKey("sk_live_jYgZ6rUsgNb9hPzqcqgnxh7R");
        while ($row = $runGetOrder->fetch_assoc()) {

          //
          $items[$i] = array('type' => 'sku', 'parent' => $row['stripe_sku'], 'quantity' => $row['qty']);

          $i++;
        }

    $userDetails = "SELECT * FROM user_info WHERE user_id=".$_SESSION['uid'];
    $runUserDetails = $con->query($userDetails);
    $userRow = $runUserDetails->fetch_assoc();
    $its = count($items);

    $order = \Stripe\Order::create(array(
      "items" => $items,
      "currency" => "usd",
      "shipping" => array(
        "name" => $name,
        "address" => array(
          "line1" => $userRow['address1'],
          "city" => $userRow['city'],
          "state" => $userRow['state'],
          "country" => $userRow['country'],
          "postal_code" => $userRow['zip']
        )
      ),
      "email" => $email
    )); 
        $tax = $order["items"][$its]["amount"];
      $shipping = $order["items"][$its+1]["amount"];

      echo $order["shipping"]["address"];
    

    $subTotal = $_POST['subTotal'];

    $amount = $subTotal + $tax + $shipping;
    
    $charge = \Stripe\Charge::create(array(
      "amount" => $amount,
      "currency" => "usd",
      "source" => "tok_mastercard", // obtained with Stripe.js
      "description" => "Charge for beverlyscloset.store",
      'receipt_email' => $email
    ));


      $delete = "DELETE FROM cart WHERE user_id = '$_SESSION[uid]'";
      $del = $con->query($delete);
   
    
}else{
    $statusMsg = "Form submission error.......";
}

//show success or error message
//header('Location: index.php');
echo $statusMsg;

?>
