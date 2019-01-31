<?php
session_start();
#this is Login form page , if user is already logged in then we will not allow user to access this page by executing isset($_SESSION["uid"])
#if below statment return true then we will send user to their profile.php page
if (isset($_SESSION["uid"])) {
	header("location:profile.php");
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Beverly's Closet</title>
		<link rel="icon" href="purse.ico" sizes="16x16">


		<link rel="stylesheet" href="css/outline.css">
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
  		<script src="js/dumb.js"></script>
		<meta name="pinterest" content="nopin" />
		<link href="https://fonts.googleapis.com/css?family=Dancing+Script:700" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	</head>
<body>
	<div class="wait overlay">
		<div class="loader"></div>
	</div>
	
	<div class="header ">
      <h1 class="header-title">Beverly's Closet</h1>

	</div>

	<!-- Dropdown for cart items -->
	<ul id="cartDropDown" style="min-width: 400px;" class="dropdown-content collection"></ul>

	<ul class="sidenav" id="mobile-nav">
	    <li><a href="index.php">Beverly's Closet</a></li>
	    <li class="divider"></li>
	    <li><a href="profile.php">Welcome</a></li>
	    <li><a href="cart.php"><i  class="material-icons left">shopping_cart</i>
	            Cart   <span class="cartItems badge white black-text"></span></a>

	        </li>
	    <li><a href="logout.php">Logout</a></li>
	</ul>
  <div id="nav1" class="block">
		<nav id="navbar" class="pushpin z-depth-0" data-target="nav1">
		  <div class=" nav-wrapper">
	  	<a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
	    <div class="container">
	      <ul class="right hide-on-med-and-down">
	        <li>
	          <a href="index.php" class="site-nav__link">Home</a>
	        </li>
	            <!-- Dropdown Trigger -->
	        <li><a class="dropdown-trigger" href="#!" data-target="cartDropDown"><i  class="shopping-cart-fly material-icons left">shopping_cart</i>
	            Cart    <span class="cartItems badge white black-text"></span></a>

	        </li>

	        <li>
	          <a href="login_form.php" id="customer_login_link">Log in</a>
	        </li>
	       
	      </ul>
	    </div>
	  </div>
	</nav>

	<br>
	<main>
	<div class="container center-align row">
		<div class="col s12 l12">
			<div class="container">
				<ul id="tabs-swipe-demo" class="tabs z-depth-1">
				    <li class="tab col s6 l6"><a class="active" href="#test-swipe-2">Login</a></li>
				    <li class="tab col s6 l6"><a href="#test-swipe-3">Register</a></li>
				</ul>
				<div id="test-swipe-2" class="row">
					
					    <form name="login" id="login" action="login.php" method="post" class="col s12 l12">
					      <div class="row">
					        <div class="input-field col s12">
					          <input name="login_email" id="login_email" type="email" class="validate">
					          <label for="login_email">Email</label>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col s12">
					          <input name="login_password" id="login_password" type="password" class="validate">
					          <label for="login_password">Password</label>
					        </div>
					      </div>
					      <div class="row">
								<div class="col s12">
					      			<input form="login" style="width:100%;" type="submit" class="btn btn-success" style="float:right;" Value="Login">
					  
					      		</div>
					      		
					      </div>
					    </form>
					
				</div>
				<div id="test-swipe-3" class="row">
					
					    <form id="signup_form" onsubmit="return false" class="col s12 l12">
					      <div class="row">
					        <div class="input-field col s6">
					          <input name="f_name" id="f_name" type="text" class="validate">
					          <label for="f_name">First Name</label>
					        </div>
					        <div class="input-field col s6">
					          <input name="l_name" id="l_name" type="text" class="validate">
					          <label for="l_name">Last Name</label>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col s12">
					          <input name="email" id="email" type="email" class="validate">
					          <label for="email">Email</label>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col s6">
					          <input name="password" id="password" type="password" class="validate">
					          <label for="password">Password</label>  
					          <span class="helper-text" data-error="Password too short" data-success="Password accepted"></span>
					        </div>
					        <div class="input-field col s6">
					          <input name="repassword" id="repassword" type="password" class="validate">
					          <label for="repassword">Confirm Password</label>
					          <span class="helper-text" data-error="Password doesn't match" data-success="Passwords match"></span>
					        </div>
					      </div>
					      <div class="row">
					      	<div class="input-field col s6">
					          <input name="mobile" id="mobile" type="text" class="validate">
					          <label for="mobile">Phone Number</label>
					        </div>
					      </div>
					      <div class="row">
					      	<div class="input-field col s12">
					          <input name="address1" id="address1" type="text" class="validate">
					          <label for="address1">Address Line 1</label>
					        </div>
					        <div class="input-field col s9">
					          <input name="city" id="city" type="text" class="validate">
					          <label for="city">City</label>
					        </div>
					        <div class="input-field col s3">
								<select id="state" name="state">
									<option value="AL"selected>AL</option>
									<?php 
												$states = ["AK", "AS", "AZ", "AR", "CA", "CO", "CT", "DE", "DC", "FM", "FL", "GA", "GU", "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MH", "MD", "MA", "MI", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM", "NY", "NC", "ND", "MP", "OH", "OK", "OR", "PW", "PA", "PR", "RI", "SC", "SD", "TN", "TX", "UT", "VT", "VI", "VA", "WA", "WV", "WI", "WY" ];
												foreach ($states as $state) {
													echo '<option value="'.$state.'">'.$state.'</option>';
												}
									?>
								</select>
								<label>State</label>
							</div>
							
					        <div class="input-field col s6">
					          <select id="country" name="country">
									<option value="United States"selected>United States</option>
									
								</select>
					          <label for="country">Country</label>
					        </div>
					        <div class="input-field col s4">
					          <input name="zip" id="zip" type="text" class="validate">
					          <label for="zip">Zip</label>
					        </div>
					      </div>
					      <div class="row">
								<div class="col s12">
									<input style="width:100%;" id="signup" value="Sign Up" type="submit" name="signup_button" class="btn disabled">
								</div>
							</div>

					      
					    </form>				  
				</div>
			</div>
		</div>		
	</div>
	</main>
	</div>
	

	<footer class="custom-footer page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Beverly's Closet</h5>
                <p class="grey-text text-lighten-4">Welcome to Beverly's Closet where you can find custom accessories to complent your style. Sign up or login to begin collecting our unique products. </p>
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


	<script type="text/javascript">
		 $(document).ready(function(){
		    $('.tabs').tabs();
		    $('select').formSelect();

		     function checkform() {
		     	
			    // get all the inputs within the submitted form
			    var inputs = document.getElementsByTagName('input');
			    var selects = document.getElementsByTagName('select');
			    var full = 0;
			    for (var i = 2; i < inputs.length; i++) {
			        // only validate the inputs that have the required attribute
			        
			            if(inputs[i].value == ""){
			             
			            }
			            else if(inputs[i].value != ""){
			            	full += 1;
			            }
			        
			    }

			    if (full == 13 ){
			    	
			    	if (handleConfirmPassword() && handlePassword()) {
			    		document.getElementById("signup").classList.remove("disabled");
			    		//console.log(handleConfirmPassword());
			    	}else {
			    		document.getElementById("signup").classList.add("disabled");
			    		
			    	}
			    	 
			    }
			 
			}

		    

			document.getElementById("password").oninput = function() {handlePassword()};

			function handlePassword() {
				let password = document.getElementById("password");
				let repassword = document.getElementById("repassword");
			    
			    if (password.value.length < 6 ) {
			    	password.className = "invalid";
			    	
			    }
			    else if(password.value.length >= 6 ){
			    	password.className = "valid";
			    	return true;
			    
			    	if (password.value != repassword.value) {
				    	repassword.className = "invalid";
				    	
				    }else{
				    	repassword.className = "valid";
				    	

				    }
				}

			}

			document.getElementById("repassword").oninput = function() {handleConfirmPassword()};

			function handleConfirmPassword() {
				let repassword = document.getElementById("repassword");
				let password = document.getElementById("password");
			    
			    if (password.value != repassword.value) {
			    	repassword.className = "invalid";
			    	
			    	return false;
			    }
			    else{
			    	repassword.className = "valid";
			    	return true;
			    } 
			}
		    
		   
		    
		    
		    $("#login").submit(function(event){
              event.preventDefault(); //prevent default action
              var form = $(this);
              var formdata = false;
              if (window.FormData){
                  formdata = new FormData(form[0]);
              }
              //$('#addModal').modal('toggle'); //or  $('#IDModal').modal('hide');
              var formAction = form.attr('action');
              $.ajax({
                  url         : formAction,
                  data        : formdata ? formdata : form.serialize(),
                  cache       : false,
                  contentType : false,
                  processData : false,
                  type        : 'POST',
                  success     : function(data, textStatus, jqXHR){
                    //$("table tbody").append( data );
                    console.log(data);
                    if(data == "wrong password"){
                        
						M.toast({html: "Wrong user password", displayLength: 3000});
						
					
                    }else if(data == "no user"){
                        M.toast({html: "No such user exist", displayLength: 3000});
                    }
                    
                  }
              });
              //location.reload();
          });

		    document.getElementById("signup_form").oninput = function() {checkform()};

		    
		  });

		    
     
	</script>

</body>
</html>
