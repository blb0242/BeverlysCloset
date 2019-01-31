<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";


if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='index.php'><h4>Categories</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}




	if(isset($_POST["addToCart"])){


		$p_id = $_POST["proId"];


		if(isset($_SESSION["uid"])){
			

		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			?> 
					<script type="text/javascript">
						M.toast({html: "Product already added to cart!", displayLength: 3000});
						
					</script>
				<?php

		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`)
			VALUES ('$p_id','$ip_add','$user_id','1')";
			if(mysqli_query($con,$sql)){
				?> 
					<script type="text/javascript">
						M.toast({html: "Product successfully added to cart!", displayLength: 2000, classes: 'rounded'});
						$('.cartItems').addClass('new');
					</script>
				<?php
				
			}
		}
		}else{
			$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($con,$sql);
			if (mysqli_num_rows($query) > 0) {
				
				?> 
					<script type="text/javascript">
						M.toast({html: "Product already added to cart!", displayLength: 3000});
						
					</script>
				<?php
				
					exit();
			}
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`)
			VALUES ('$p_id','$ip_add','-1','1')";
			if (mysqli_query($con,$sql)) {
				?> 
					<script type="text/javascript">
						M.toast({html: "Product successfully added to cart!", displayLength: 2000, classes: 'rounded'});
						$('.cartItems').addClass('new');
					</script>
				<?php
				
				exit();
			}

		}




	}

//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}

	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			while ($row=mysqli_fetch_array($query)) {
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];

				$len = strlen($product_price);
				$cents = substr($product_price, -2);
				$dollars = substr($product_price, 0, ($len-2));
				$stripeFormat = floatval($dollars.".".$cents);
				echo '

					<li class="collection-item avatar">
				      <img src="product_images/'.$product_image.'" alt="" class="circle">
				      <span class="title">'.$product_title.'</span>
				      
				      $'.$stripeFormat.'
				    </li>
					';

			}
			?>
				<a href="cart.php" style="background-color: #49274A;" class="waves-effect waves-light btn"><i class="material-icons right ">check</i>Checkout</a>
        
			<?php
			exit();
		}
	}



}

//Remove Item From cart
if (isset($_POST["delID"])) {

	$id = $_POST["delID"];
	if (isset($_SESSION["uid"])) {
		
    	$sql = "DELETE FROM cart WHERE p_id = $id AND user_id = '$_SESSION[uid]'";
	}else{
		
		$sql = "DELETE FROM cart WHERE p_id = $id AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
		exit();
	}
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
		exit();

	}
}




?>
