<?php
session_start();
if(isset($_SESSION["uid"])){
	header("location:profile.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="google-site-verification" content="74IvrU5CUXM2n_NGxqyUVWpb4HFg44ECe3njTxLsN3I" />
		<meta name="title" content="Beverly's Closet | Purses, Handbags & Baskets">
		<meta name="description" content="Did somebody say demin purses? Beverly's Closet features handcrafted quality products that add more style to your outfit. Don't be scared, come and take a look into Beverly's Closet. ">
		<meta name="author" content="Byron Brown">
		<title>Beverly's Closet
		</title>
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
		<meta name="pinterest" content="nopin" />
		
		<link href="https://fonts.googleapis.com/css?family=Dancing+Script:700" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
<body>

	<div class="wait overlay">
		<div class="loader"></div>
	</div>

	<div style="width: 100%;" class="header ">
	  <h1 class="header-title">Beverly's Closet</h1>
	</div>

	<!-- Dropdown for cart items -->
	<ul id="cartDropDown" style="min-width: 400px;" class="dropdown-content collection"></ul>

	<ul class="sidenav" id="mobile-nav">
		<li>
			<a href="index.php">Beverly's Closet</a>
		</li>
		<li class="divider"></li>
		<li>
			<a href="profile.php">Welcome, guest!</a>
		</li>
		<li>
			<a href="#">
				<i  class="material-icons left">shopping_cart</i>
					Cart   
				<span class="cartItems badge white black-text"></span>
			</a>
		</li>
		<li class="divider"></li>
		<li><a href="login_form.php">Login/ Register</a></li>
	</ul>	
	 <div id="nav1" class="block">
		<nav id="navbar" class="pushpin z-depth-0" data-target="nav1">
		  <div class=" nav-wrapper">
		  	<a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
		    <div class="container">
		      <ul class="right hide-on-med-and-down">
		        <li>
		          <a href="index.php" class="active">Home</a>
		        </li>
		        <li>
		        	Welcome, Guest!
		        </li>
		            <!-- Dropdown Trigger -->
		        <li id="cart-list-item"><a class="dropdown-trigger" href="#!" data-target="cartDropDown"><i  class="shopping-cart-fly material-icons left">shopping_cart</i>
		            Cart   <span class="cartItems badge white black-text"></span></a>

		        </li>

		        <li>
		          <a href="login_form.php" id="customer_login_link">Login/Register</a>
		        </li>
		        
		      </ul>
		    </div>
		  </div>
		</nav>
	</div>
	
	<main>

		<div style="margin-top: 70px;" class="container">
			
			<div class="row"> 
				<h3>Collection</h3>
			</div>
			<div id="product_msg"></div>
		
			<div   class="grid">

					<?php
					include 'db.php';

					$product_query = "SELECT * FROM products";
					$run_query = mysqli_query($con,$product_query);
					if(mysqli_num_rows($run_query) > 0){
						while($row = mysqli_fetch_array($run_query)){
							$pro_id    = $row['product_id'];
							$pro_cat   = $row['product_cat'];
							$pro_desc = $row['product_desc'];
							$pro_title = $row['product_title'];
							$pro_price = $row['product_price'];
							$pro_image = $row['product_image'];

							if($pro_cat == 2){
							$alt_text = $pro_title." purse";
						}else if($pro_cat == 1){
							$alt_text = $pro_title." basket";
						}


							$len = strlen($row['product_price']);
							$cents = substr($row['product_price'], -2);
							$dollars = substr($row['product_price'], 0, ($len-2));
							$d = number_format($dollars,2);
							$number = $dollars.".".$cents;
							setlocale(LC_MONETARY,"en_US");
							$money = money_format("$ %i ", $number);

						?>
						<!-- Collection  -->
						<div class="grid-item">
						  <div class="card hoverable">
							<div class="item card-image">
							  <img class="materialboxed" height="250" width="250" alt="<?php echo $alt_text; ?>" src="<?php echo $pro_image; ?>">

							  <button pid="<?php echo $pro_id; ?>" class="add-to-cart disabled btn-floating halfway-fab waves-effect waves-light"><i class="material-icons">add</i></button>
							</div>
							<div class="card-content">
								<span class="card-title"><?php echo $pro_title; ?></span>
								<p><?php echo $pro_desc; ?></p>
							</div>
							<div class="card-action">
								<?php echo $money; ?>
							</div>
						  </div>
						</div>



				 <?php } ?>

		<?php } ?> </div>
		</div>
	</main>
	

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
                  <li><a class="grey-text text-lighten-3" href="admin/">Admin Portal</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Contact</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Support</a></li>
                  
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            	© 2019 BZSites
            </div>
          </div>
    </footer>
					
 	
 	<script  src="js/dumb.js"></script>
 	<script src="main.js"></script>
 	<script src="masonry/masonry.pkgd.min.js"></script>
	<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.js"></script>
	<script>
		var $grid = $('.grid').imagesLoaded(function () {
			$grid.masonry({
			  itemSelector: '.grid-item',
				isAnimated: true,
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false
				  }
			});
		});
	</script>

	
	
</body>
</html>
