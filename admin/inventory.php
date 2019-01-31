<?php
session_start();
  /*ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);*/
  include 'db.php';

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
    <title>Inventory</title>

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
                        <li>
                            <a href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Inventory</a>
						</li>
                       	<li>
                            <a href="orders.php">
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
                       
                        <li class="active">
                            <a href="#!">
                                <i class="fas fa-table"></i>Inventory</a>
						</li>
                        <li>
                            <a href="orders.php">
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
                                <!-- Notifications -->
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <!-- <span class="quantity"></span> -->
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                       <!-- <span class="quantity"></span> -->
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <!-- <span class="quantity"></span> -->
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <h3 class="title-5 m-b-35">inventory</h3>
                                <div class="table-data__tool">
                                  <div class="table-data__tool-right">
                                      <button data-toggle="modal" data-target="#addModal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                          <i class="zmdi zmdi-plus"></i>add item</button>

                                  </div>
                                </div>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>category</th>
                                                <th>title</th>
                                                <th>image file</th>
                                                <th>price</th>
                                                <th>options</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableData">
                                          <?php
                                            $p = "SELECT * FROM products";
                                            $products = $conn->query($p);

                                            if ($products->num_rows > 0) {
                                              while ($productRow = $products->fetch_assoc()){
                                                $productCat = $productRow['product_cat'];
                                                $cats = "SELECT * FROM categories WHERE cat_id='$productCat'";
                                                $catResult = $conn->query($cats);
                                                $catRow = $catResult->fetch_assoc();

                                                $len = strlen($productRow['product_price']);
                                      			    $cents = substr($productRow['product_price'], -2);
                                      			    $dollars = substr($productRow['product_price'], 0, ($len-2));
                                      					$stripeFormat = floatval($dollars.".".$cents);
                                                $money = $dollars.".".$cents;

                                          ?>
                                            <tr id="<?php echo "delRow-".$productRow['product_id']; ?>">
                                                <td ><?php echo $productRow['product_id']; ?></td>
                                                <td id="c_title"><?php echo $catRow['cat_title']; ?></td>
                                                <td id="p_title"><?php echo $productRow['product_title']; ?></td>
                                                <td id="p_image"><?php echo '<img height="100" width="125" src="'.$productRow["product_image"].'">';?></td>
                                                <td id="p_money" class="process"><?php echo "$". $productRow['product_price']; ?></td>
                                                <td>
                                                  <div class="table-data-feature">
                                                    <button id="<?php echo $productRow['product_id']; ?>" class="item update" data-toggle="modal" data-target="#editModal" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i> 
                                                        
                                                    </button>
                                                    <button id="<?php echo $productRow['product_id']; ?>"  class="item deleteProduct" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                    <button class="item " data-toggle="tooltip" data-placement="top" title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                </div>
                                              </td>
                                            </tr>
                                            <?php

                                                 } // End While
                                               } // End If
                                               else{
                                                  echo "<tr>
                                                      <td><?php echo 'No Data'; ?></td>
                                                      </tr>";
                                               }

                                             ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
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
            <!-- modal large -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add Product</strong> Inventory Form
                            </div>
                            <div class="card-body card-block">
                                <form action="handleInventory.php" method="post" enctype="multipart/form-data" class="form-horizontal" id="addProduct">

                                  <div class="row form-group">
                                      <div class="col col-md-3">
                                          <label for="selectLg" class=" form-control-label">Category</label>
                                      </div>
                                      <div class="col-12 col-md-9">
                                          <select name="categories" id="categories" class="form-control-lg form-control">
                                              <option value="0">Please select type of product</option>
                                              <?php
                                                $c = "SELECT * FROM categories";
                                                $categories = $conn->query($c);
                                                if (!$categories) {
                                                  # code...
                                                }else{
                                                  while ($catRows = $categories->fetch_assoc()) {
                                                     echo '<option value="'.$catRows['cat_id'].'">'.$catRows['cat_title'].'</option>';
                                                  }
                                                }

                                              ?>
                                          </select>

                                      </div>
                                  </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="title" class=" form-control-label">Title</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="title" name="title" placeholder="Text" class="form-control">
                                            <small class="form-text text-muted">i.e. Michelle Obama Purse</small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="description" class=" form-control-label">Description</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="description" id="description" rows="4" placeholder="Describe the product to the customer..." class="form-control"></textarea>
                                        </div>
                                    </div>



                                    <div class="row form-group">

                                          <div class="col col-md-3">
                                              <label for ="price" class=" form-control-label">Price</label>
                                          </div>
                                            <div class="col-12 col-md-9 input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-dollar"></i>
                                                </div>
                                                <input type="text" id="price" name="price" placeholder=".00" class="form-control">

                                            </div>

                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">File input</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="file-input" class="form-control-file">
                                            <small class="form-text text-muted">i.e. michelleobamapurse1.jpg</small>
                                        </div>

                                    </div>

                                </form>
                            </div>
                            <div class="card-footer">

                                <button id="reset" type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset Form
                                </button>
                            </div>
                        </div>

                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="addProduct" form="addProduct" class="btn btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end add modal large -->


            <!-- Edit modal large -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                <?php 
                  
                    //$id = $_POST['updateItem']);
                    $get = "SELECT * FROM products WHERE product_id = $itemId";
                    $g = $conn->query($get);
                    echo $itemId;
                    
                    //$eRow = $e->fetch_assoc());

                ?>

              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title eTitle" id="largeModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Edit Product</strong> Inventory Form
                            </div>
                            <div class="card-body card-block">
                                <form action="handleInventory.php" method="post" name="updateForm" enctype="multipart/form-data" class="form-horizontal" id="updateProduct">
                                    <input type="hidden" id="pro_id" name="pro_id">
                                    <input type="hidden" id="stripe_id" name="stripe_id">
                                    <input type="hidden" id="stripe_sku" name="stripe_sku">
                                  <div class="row form-group">
                                      <div class="col col-md-3">
                                          <label for="selectLg" class=" form-control-label">Category</label>
                                      </div>
                                      <div class="col-12 col-md-9">
                                          <select name="Ecategories" id="Ecategories" class="form-control-lg form-control">
                                              <option value="0">Please select type of product</option>
                                              <?php
                                                $c = "SELECT * FROM categories";
                                                $categories = $conn->query($c);
                                                if (!$categories) {
                                                  
                                                }else{
                                                  while ($catRows = $categories->fetch_assoc()) {
                                                     echo '<option value="'.$catRows['cat_id'].'">'.$catRows['cat_title'].'</option>';
                                                  }
                                                }

                                              ?>
                                          </select>

                                      </div>
                                  </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="title" class=" form-control-label">Title</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="Etitle" name="Etitle" placeholder="Text" class="form-control">
                                            <small class="form-text text-muted">i.e. Michelle Obama Purse</small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="description" class=" form-control-label">Description</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="Edescription" id="Edescription" rows="4" placeholder="Describe the product to the customer..." class="form-control"></textarea>
                                        </div>
                                    </div>



                                    <div class="row form-group">

                                          <div class="col col-md-3">
                                              <label for ="price" class=" form-control-label">Price</label>
                                          </div>
                                            <div class="col-12 col-md-9 input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-dollar"></i>
                                                </div>
                                                <input type="text" id="Eprice" name="Eprice" placeholder=".00" class="form-control">

                                            </div>

                                    </div>

                                    

                                </form>
                            </div>
                            <div class="card-footer">

                                <button id="reset" type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset Form
                                </button>
                            </div>
                        </div>
                    
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="updateProduct" form="updateProduct" class="btn btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- end edit modal large -->
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
    <script>
      $(document).ready(function(){
          $(".deleteProduct").click(function(){
              var delID = $(this).attr("id");
              let dSelector = "#delRow-"+delID;
              $(dSelector).fadeOut();
              $.post("handleInventory.php",
                      {removeItemFromCart:delID},
                      function(response){
                        console.log(response);

                      }
              );
          });

          $("#reset").click(function(){
            $("#addProduct")[0].reset();
          });


          $("#addProduct").submit(function(event){
              event.preventDefault(); //prevent default action
              var form = $(this);
              var formdata = false;
              if (window.FormData){
                  formdata = new FormData(form[0]);
              }
              $('#addModal').modal('toggle'); //or  $('#IDModal').modal('hide');
              var formAction = form.attr('action');
              $.ajax({
                  url         : formAction,
                  data        : formdata ? formdata : form.serialize(),
                  cache       : false,
                  contentType : false,
                  processData : false,
                  type        : 'POST',
                  success     : function(data, textStatus, jqXHR){
                    $("table tbody").append( data );
                    console.log(data);
                    
                    location.reload();
                  }
              });
          });


          $(".update").click(function(){
            var updateID = $(this).attr("id");
            //console.log(updateID);
            var currentState = history.state;
            //console.log(currentState);
            var stateObj = { foo: "bar" };
            history.pushState(stateObj, "page 2", "inventory.php?update="+updateID);
            //$('.modal-title').html(updateID);
        
            $.post("handleInventory.php",
                {updateItem:updateID}, 
                function(data, status){
                    //console.log(data);
                    let d = JSON.parse(data);
                    console.log(d);
                    $('#Ecategories').val(d.product_cat);
                    $('#Etitle').val(d.product_title);
                    $('#Edescription').val(d.product_desc);
                    $('#Eprice').val(d.product_price);
                    $('#hiddenFile').val(d.product_image);
                    
                    $('#pro_id').val(d.product_id);
                    console.log(d.stripe_sku);
                    $('#stripe_id').val(d.stripe_id);
                    $('#stripe_sku').val(d.stripe_sku);

            });

            $("#updateProduct").submit(function(event){
              event.preventDefault(); //prevent default action
              var form = $(this);
              var formdata = false;
              if (window.FormData){
                  formdata = new FormData(form[0]);
              }
              $('#editModal').modal('toggle'); //or  $('#IDModal').modal('hide');
              var formAction = form.attr('action');
              $.ajax({
                  url         : formAction,
                  data        : formdata ? formdata : form.serialize(),
                  cache       : false,
                  contentType : false,
                  processData : false,
                  type        : 'POST',
                  success     : function(data, textStatus, jqXHR){
                    $("table tbody").append( data );
                    //console.log(data.product_title);
                    console.log(data);
                    

                    location.reload();
                  }
              });
          });


          
          });


      });
    </script>

</body>

</html>
<!-- end document-->
