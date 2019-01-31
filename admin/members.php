<?php
session_start();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
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
    <title>Members</title>

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
                        <li class="active">
                            <a href="map.html">
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
                        <li>
                            <a  href="#">
                                <i class="fas fa-calendar-alt"></i>Orders</a>
                        </li>            
                        <li class="active">
                            <a href="#">
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
                                                <a href="logout.php">
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
                                <h3 class="title-5 m-b-35">Members</h3>
                                <div class="table-data__tool">
                                  <div class="table-data__tool-right">
                                      <button id="add" data-toggle="modal" data-target="#addModal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                          <i class="zmdi zmdi-plus"></i>add member</button>

                                  </div>
                                </div>
                                <!-- USER DATA-->
                                <div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>user data</h3>

                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>name</td>
                                                    <td>role</td>
                                                    <td>type</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php
                                                $adminQuery = "SELECT * FROM admin";
                                                $adminResult = $conn->query($adminQuery);
                                                while ($adminRow = $adminResult->fetch_assoc()) {

                                              ?>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6><?php echo $adminRow['first_name']." ".$adminRow['last_name']; ?></h6>
                                                            <span>
                                                                <a href="#"><?php echo $adminRow['email'] ?></a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="role admin">admin</span>
                                                    </td>
                                                    <td>
                                                        <div class="rs-select2--trans rs-select2--sm">
                                                            <select class="js-select2" name="property">
                                                                <option selected="selected">Full Control</option>
                                                                <option value="">Post</option>
                                                                <option value="">Watch</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                                                    </td>
                                                </tr>

                                                <?php
                                              }
                                                  $membersQuery = "SELECT * FROM user_info";
                                                  $membersResult = $conn->query($membersQuery);
                                                  while ($memberRow = $membersResult->fetch_assoc()) {

                                                ?>
                                                <tr id="<?php echo "delRow-".$memberRow['user_id']; ?>">
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6><?php echo $memberRow['first_name']." ".$memberRow["last_name"]; ?></h6>
                                                            <span>
                                                                <a href="#"><?php echo $memberRow['email']; ?></a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="role user">user</span>
                                                    </td>
                                                    <td>
                                                        <div class="rs-select2--trans rs-select2--sm">
                                                            <select class="js-select2" name="property">
                                                                <option value="">Full Control</option>
                                                                <option value="" selected="selected">Post</option>
                                                                <option value="">Watch</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                      <button id="<?php echo $memberRow['user_id']; ?>" class="item more deleteMember" data-toggle="tooltip" data-placement="top" title="Delete">
                                                          <i class="zmdi zmdi-delete"></i>
                                                      </button>
                                                    </td>
                                                </tr>
                                                <?php

                                                }
                                                 ?>

                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                                <!-- END USER DATA-->
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
                    <h5 class="modal-title" id="largeModalLabel">New Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add Member</strong> Member Info Form
                            </div>
                            <div class="card-body card-block">
                                <form action="handleMembers.php" method="post" enctype="multipart/form-data" class="form-horizontal" id="addMember">

                                  <div class="row form-group">
                                      <div class="col col-md-3">
                                          <label for="selectLg" class=" form-control-label">Member Type</label>
                                      </div>
                                      <div class="col-12 col-md-9">
                                          <select name="userType" id="userType" class="form-control-lg form-control">
                                              <option value="0">Please select type of user</option>
                                              <option value="1">Admin</option>
                                              <option value="2">User</option>

                                          </select>

                                      </div>
                                  </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="first_name" class=" form-control-label">First Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="first_name" name="first_name" placeholder="First" class="form-control">
                                            <small class="form-text text-muted">i.e. Michelle</small>
                                        </div>
                                        <div class="col col-md-3">
                                            <label for="last_name" class=" form-control-label">Last Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="last_name" name="last_name" placeholder="Last" class="form-control">
                                            <small class="form-text text-muted">i.e. Obama</small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email" class=" form-control-label">Email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="email" name="email" id="email" placeholder="123@abc.com" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password" class=" form-control-label">Password</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="password" name="password" id="password" placeholder="********" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="mobile" class=" form-control-label">Mobile</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="mobile" id="mobile" placeholder="(123)-456-7890" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="address1" class=" form-control-label">Address Line 1</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="address1" id="address1" placeholder="123 Disneyland Dr." class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="address2" class=" form-control-label">Address Line 2</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="address2" id="address2" placeholder="Disneyland, CA 90210" class="form-control"></textarea>
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
                    <button type="submit" name="addMember" form="addMember" class="btn btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal large -->
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
        $("#add").click(function(){
          $("#addMember")[0].reset();
        });


          $(".deleteMember").click(function(){
              var delID = $(this).attr("id");
              $.post("handleMembers.php",
                      {delID:delID},
                      function(response){
                        console.log(response);
                        let dSelector = "#delRow-"+delID;
                        $(dSelector).fadeOut();
                      }
              );
          });

          $("#reset").click(function(){
            $("#addMember")[0].reset();
          });


          $("#addMember").submit(function(event){
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
                    console.log(formdata);
                    location.reload();
                  }
              });
          });



      });
    </script>

</body>

</html>
<!-- end document-->
