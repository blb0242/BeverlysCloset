<?php
session_start();
  ini_set('display_errors', 1);
  
  error_reporting(E_ALL);
  include 'db.php';
  //include Stripe PHP library
  require_once('../stripe-php/init.php');

  if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
  }



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Orders</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>

                        </li>
                        <li>
                            <a href="inventory.php">
                                <i class="fas fa-table"></i>Inventory</a>
                        </li>
                        <li class="active">
                            <a  href="#">
                                <i class="fas fa-calendar-alt"></i>Orders</a>
                        </li>
                        <li>
                            <a href="members.php">
                                <i class="fas fa-map-marker-alt"></i>Members</a>
                        </li>
                        <li>
                            <a href="https://beverlyscloset.store">
                                <i class="fa fa-home" aria-hidden="true"></i>Website</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>

                        </li>
                        <li >
                            <a href="inventory.php">
                                <i class="fas fa-table"></i>Inventory</a>
                        </li>

                        <li class="active">
                            <a href="#">
                                <i class="fas fa-calendar-alt"></i>Orders</a>
                        </li>
                        <li>
                            <a href="members.php">
                                <i class="fas fa-map-marker-alt"></i>Members</a>
                        </li>
                        <li>
                            <a href="https://beverlyscloset.store">
                                <i class="fa fa-home" aria-hidden="true"></i>Website</a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
            
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?php echo $_SESSION['admin']['pic']; ?>" alt="<?php echo $_SESSION['admin']['fname']." ".$_SESSION['admin']['lname']; ?>" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['admin']['fname']." ".$_SESSION['admin']['lname']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?php echo $_SESSION['admin']['pic']; ?>" alt="<?php echo $_SESSION['admin']['fname']." ".$_SESSION['admin']['lname']; ?>" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION['admin']['fname']." ".$_SESSION['admin']['lname']; ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $_SESSION['admin']['email']; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="#">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row ">
                            <?php  
                                \Stripe\Stripe::setApiKey("sk_test_oBtNN0oOK9A6HwYDnQiwPQMc");

                                $orders = \Stripe\Order::all(["limit" => 10]);
                            

                            ?>
                            <div class="col-lg-8">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>date</th>
                                                <th>description</th>
                                                <th class="text-right">name</th>
                                                <th class="text-right">email</th>
                                                <th class="text-right">total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                foreach ($orders["data"] as $order) {
                                                    $numOfItems = sizeof($order["items"]) - 2;
                                                    $date = date('m/d/Y', $order["created"]);
                                                    $amount = $order["amount"] - 599;
                                                    $amount  = $amount/100;
                                                    echo '<tr id='.$order["id"].' onClick="getOrder(this.id)">
                                                            <td>'.$date.'</td>    
                                                            <td>'.$numOfItems.' Items</td>
                                                            <td class="text-right">'.$order["shipping"]["name"].'</td>
                                                            <td class="text-right">'.$order["email"].'</td>
                                                            <td class="text-right">$ '.$amount.'</td>
                                                        </tr>';
                                                }
                                             ?>     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-4">

                                <div class="products au-card au-card--bg-blue au-card-top-countries m-b-30">
                                    <div class="au-card-inner">
                                        <div class="table-responsive">
                                            <table class="productTable table table-top-countries">
                                                <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tBody">
                                                    <tr>
                                                        <td>United States</td>
                                                        <td class="text-right">$119,366.96</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
        <!-- PAGE CONTAINER-->
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    <script type="text/javascript">
        
        $('.products').hide();


        function getOrder(id){
            $(".products").fadeIn();
            $('.tBody').text("");
            var total = 0;
              $.ajax({
                   type: "POST",
                   url: 'handleOrders.php',
                   data:{
                            action: 'getOrder',
                            id : id
                        },
                   success:function(response) {
                     console.log(response);
                    var product = JSON.parse(response);
                    
                    console.log(product[0]["skus"]["data"][0]["price"]);
                    console.log(product.length);
                    for (var i = 0; i < product.length; i++) {
                        total += parseFloat(displayOrder(product[i]["name"],product[i]["skus"]["data"][0]["price"]));
                    }
                    

                     $('.productTable > tbody:last-child').append('<tr><td><b>Total</b></td><td class="text-right"><b>$ '+ total +'</b></td></tr>');
                   }

              });
         }

         function displayOrder(pName, pPrice) {

            pPrice = (pPrice / 100);
            var fPrice = pPrice.toFixed(2);

            $('.productTable > tbody:last-child').append('<tr><td>'+ pName +'</td><td class="text-right">$ '+ fPrice +'</td></tr>');
            return fPrice;
         }

    </script>
    

</body>

</html>
<!-- end document-->
