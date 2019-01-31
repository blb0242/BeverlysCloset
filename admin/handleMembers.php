<?php

include 'db.php';
if (isset($_POST['userType']) == '2') {

  if (isset($_POST['first_name']) || isset($_POST['last_name']) || isset($_POST['email']) || isset($_POST['password']) || isset($_POST['mobile']) || isset($_POST['address1']) || isset($_POST['address2'])) {



    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];

    $newMemberQuery = "INSERT INTO user_info(first_name,last_name,email,password,mobile,address1,address2) VALUES('$fname','$lname','$email','$password','$mobile','$address1','$address2')";

    $newMember = $conn->query($newMemberQuery);

    $addRow = '
              <tr id="delRow-'.$conn->insert_id.'>
                  <td>
                      <label class="au-checkbox">
                          <input type="checkbox">
                          <span class="au-checkmark"></span>
                      </label>
                  </td>
                  <td>
                      <div class="table-data__info">
                          <h6>'.$fname.' '.$lname.'</h6>
                          <span>
                              <a href="#">'.$email.'</a>
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
                              <option value="" selected="selected">Buy</option>
                              <option value="">Watch</option>
                          </select>
                          <div class="dropDownSelect2"></div>
                      </div>
                  </td>
                  <td>
                  <button id="'.$conn->insert_id.'"  class="item deleteProduct" data-toggle="tooltip" data-placement="top" title="Delete">
                      <i class="zmdi zmdi-delete"></i>
                  </button>
                  </td>
              </tr>
              ';

              // Here, you can also perform some database query operations with above values.
              echo $addRow; // Success Message
  }
} else if(isset($_POST["delID"]))
{
  $id = $_POST["delID"];
  $sql = "DELETE FROM user_info WHERE user_id = $id";
  $delete = $conn->query($sql);

  // Here, you can also perform some database query operations with above values.
  echo "Deleted user id:". $id ."!\n"; // Success Message

}


 ?>
