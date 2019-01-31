<?php
include "db.php";

session_start();

#Login script is begin here
#If user given credential matches successfully with the data available in database then we will echo string login_success
#login_success string will go back to called Anonymous funtion $("#login").click()
if(isset($_POST["login_email"]) && isset($_POST["login_password"])){
	$email = mysqli_real_escape_string($con,$_POST["login_email"]);
	$password = md5($_POST["login_password"]);
	
	
	$sql = "SELECT * FROM user_info WHERE email = '$email'";
	$run_query = mysqli_query($con,$sql);
	
	if(mysqli_num_rows($run_query) == 1){
	
	    $sql2 = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'";
	    $run_query2 = mysqli_query($con,$sql2);
	    if(mysqli_num_rows($run_query2) == 1){
	        $row = mysqli_fetch_array($run_query2);
	        $_SESSION["uid"] = $row["user_id"];
		    $_SESSION["name"] = $row["first_name"];
	        
	        //if user is login from page we will send login_success
			echo "login_success";
			exit();
	    }else{
	        echo "wrong password";
	    }
	}else{
	    echo "no user";
	}
	

}

?>
