<?php

session_start();
include 'db.php';
//include Stripe PHP library
require_once('stripe-php/init.php');


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Beverly's Boutique</title>
		<link rel="icon" href="purse.ico" sizes="16x16">
		
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<script
		  src="https://code.jquery.com/jquery-3.3.1.min.js"
		  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		  crossorigin="anonymous">
		</script>
	 	<!--Import Google Icon Font-->
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <!-- Compiled and minified CSS -->
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
	    <!-- Compiled and minified JavaScript -->
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
		
		<script src="main.js"></script>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div id="nav1" class="block">
		<nav id="navbar" class="pushpin z-depth-0" data-target="nav1">
	  <div class=" nav-wrapper">
	  	<a href="index.php" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons left">arrow_back</i>Continue Shopping</a>

	  	<ul class="left hide-on-med-and-down">
	        <li>
	          <a href="index.php"><i class="material-icons left">arrow_back</i>Continue Shopping</a>
	        </li>
	       
	      </ul>
	  	
	    
	  </div>
	</nav>

   <main>
	<div style="margin-top: 70px;" class="container">
   
      <h3>Your Cart</h3>
    
      <!-- Horizontal Card -->
      <div class="row">

		<div class="col s12 l8 cart-cards">
	      	<?php 
	      		$stripe = 0;
	      		$subTotal = 0;
				$n=0;
				if (isset($_SESSION["uid"])) {
					//When user is logged in this query will execute

					$sql = "SELECT a.*,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
				}else{
					//When user is not logged in this query will execute
					$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
				}
				$query = mysqli_query($con,$sql);
		                    
				while ($row=mysqli_fetch_array($query)) {
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["product_image"];
					$desc = $row["product_desc"];
					$cart_item_id = $row["id"];
					$qty = $row["qty"];
					//echo $product_price;
					$len = strlen($product_price);

				    //echo $stripePriceFormat;
				    $cents = substr($product_price, -2);
				    $dollars = substr($product_price, 0, ($len-2));
					$moneyFormat = floatval($dollars.".".$cents);
					$subTotal += $moneyFormat;
					$stripe += $product_price;
					
	        ?>           	
     
	        
	          <div style="height: 200px;" id="<?php echo $product_id; ?>" class="card sticky-action horizontal">
	            <div style="width: 400px;"  class=" card-image">
	              <?php echo '<img width="100%" height="100%"  src="'.$product_image.'">';?>
	            </div>
	              
	              <div style="width: 400px;" class=" card-content input">
	                  
	                <input type="hidden" name="price" value="<?php echo $moneyFormat; ?>">
	                <span class="card-title activator grey-text text-darken-4"><?php echo $product_title; ?><i class="material-icons right">more_vert</i></span>
	                 
	                     <p>Price: $<?php echo $product_price; ?></p>
	                   
	               
	                
	              </div> <!-- #94618E -->
	             
	            
	            <div style="width: 100px;" class=" card-action">
                    <a style="color: #F8EEE7; background-color: #49274A;  font-size: 10px;" class="deleteItem waves-effect waves-light btn">
	                  <i class="material-icons">delete</i>
	               </a>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4"><?php echo $product_title; ?><i class="material-icons left">close</i></span>
                        <p><?php echo $desc; ?></p>
                </div>
	          </div>
	        

    		<?php } 

    		?>

    	</div>

    	<div class="col s12 l4 ">
			<h4>Summary</h4>
			<br>
			<b class="subtotal"></b>
			<br>
			<p class="tax"></p>
			<p class="shipping"></p>
			<b class="total"></b>
			<p>Same Day Shipping, 5-7 day delivery depending on location.</p>
			<a id="customButton" style="width: 100%;" class="waves-effect waves-light btn-large">Pay</a>
        </div>

      

      </div><!-- End Row -->
    
    </div><!-- End Container -->
    </main>
    </div>
    
    <footer class="custom-footer page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Beverly's Boutique</h5>
                <p class="grey-text text-lighten-4">Thank you for shopping with Beverly's Boutique. I hope you find something you will love to wear around town. </p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">About</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Contact</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Support</a></li>
                  
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2018 BZSites
            
            </div>
          </div>
    </footer>


	<script src="https://checkout.stripe.com/checkout.js"></script>

	<script type="text/javascript">
		

		$(document).ready(function(){
		    
		    $('.pushpin').each(function() {
                var $this = $(this);
                var $target = $('#' + $(this).attr('data-target'));
                 $this.pushpin({
                    top: $target.offset().top,
                    bottom: $target.offset().top + $target.outerHeight() - $this.height()
                });
            });
			
			var subTotal = parseFloat(0.00);
			var total = parseFloat(0.00);
			
			$("input").each(function(){
				subTotal += parseFloat($(this)[0].value);
			});
			

			console.log(subTotal);
			
		  	var tax = parseFloat(subTotal * .1);
		  	var shipping = parseFloat(5.99);
		
		  	//total += subTotal;
		  	if (subTotal == parseFloat(0.00) || subTotal >= parseFloat(100.00)){
		  		shipping = parseFloat(0.00);
		  		total = tax + subTotal;
		  		$('.tax').html('Tax(10.25%): $'+tax.toFixed(2));
			  	$('.subtotal').append('Subtotal: $'+subTotal.toFixed(2));
			  	$('.total').append('Total: $'+total.toFixed(2));
			  	$('.shipping').html('Shipping: $'+shipping);
		  		
		  	}else{
		  		total = tax + subTotal + shipping;
			  	$('.tax').html('Tax(10.25%): $'+tax.toFixed(2));
			  	$('.subtotal').append('Subtotal: $'+subTotal.toFixed(2));
			  	$('.total').append('Total: $'+total.toFixed(2));

			  	$('.shipping').html('Shipping: $'+shipping);
		  	}


		  	let s = subTotal.toFixed(2);
			let change = s.substr(-2, 2);
			
			let bills = s.substr(0, s.length-3);
			let sub = Number(bills+change);

			console.log(sub);

		  	var handler = StripeCheckout.configure({
			  key: 'pk_live_91X2N7jiHuUp6fyHaydpxpGW',
			  image: 'https://cdn2.iconfinder.com/data/icons/ecommerce-solid-icons-vol-2/64/082-512.png',
			  locale: 'auto',
			  
			  token: function(token) {
			    // You can access the token ID with `token.id`.
			    // Get the token ID to your server-side code for use.
			    $.ajax({
				url : "submit.php",
				method : "POST",
				data : {
					stripeToken: token,
					stripeEmail: token.email,
					subTotal: sub
				},
				success : function(data){
					//window.location.href = "index.php";
					console.log(data);
				}
			}); 
			    console.log(token);
			    window.location.href = "index.php";
			  }
			});

			let t = total.toFixed(2);
			let cents = t.substr(-2, 2);
			
			let dollars = t.substr(0, t.length-3);
			let amount = Number(dollars+cents);
    			

			document.getElementById('customButton').addEventListener('click', function(e) {
			  // Open Checkout with further options:
			  handler.open({
			    name: 'Beverly\'s Boutique',
			    description: '<?php echo $n." items"; ?>',
			    amount: amount
			  });
			  e.preventDefault();
			});

			// Close Checkout on page navigation:
			window.addEventListener('popstate', function() {
			  handler.close();
			});
		  	
		  	

			$(".deleteItem").click(function(){
				var delID = $(this).parents();
				console.log(delID);
				let dSelector = delID[1].id;
				console.log(dSelector);
				$("#"+dSelector).fadeOut();
				$.post("action.php",
					{delID:dSelector},
					function(response){
						var itemPrice = $('input:hidden[name=price]').val();
						subTotal -= itemPrice; 
						
						$('.subtotal').html('Subtotal: $'+subTotal.toFixed(2));
						
						tax = subTotal *.1;
						
						
						if (subTotal == 0) {
							shipping = parseFloat(0.00);
						}
						total = subTotal + tax + shipping;
						$('.total').html('Total: $'+total.toFixed(2));
						$('.tax').html('Tax(10.25%): $'+tax.toFixed(2));
						$('.shipping').html('Shipping: $'+shipping);
						
                        window.location.reload();

					}
				);
				 
		  	});

			

		});
	</script>
			
</body>	
</html>
















		