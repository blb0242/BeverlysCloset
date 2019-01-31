<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  include 'db.php';
  //include Stripe PHP library
  require_once('../stripe-php/init.php');

  function compress($source, $destination, $quality) {

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg') 
      $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif') 
      $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png') 
      $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);

    return $destination;
  }
  
  function correctImageOrientation($filename) {
  if (function_exists('exif_read_data')) {
    $exif = exif_read_data($filename);
    if($exif && isset($exif['Orientation'])) {
      $orientation = $exif['Orientation'];
      if($orientation != 1){
        $img = imagecreatefromjpeg($filename);
        $deg = 0;
        switch ($orientation) {
          case 3:
            $deg = 180;
            break;
          case 6:
            $deg = 270;
            break;
          case 8:
            $deg = 90;
            break;
        }
        if ($deg) {
          $img = imagerotate($img, $deg, 0);       
        }
        // then rewrite the rotated image back to the disk as $filename
        imagejpeg($img, $filename, 95);
      } // if there is some rotation necessary
    } // if have the exif orientation info
  } // if function exists     
}


  if (isset($_POST['title']) || isset($_POST['description']) || isset($_POST['categories']) || isset($_POST['price']) || isset($_FILES['file-input'])) {
    
    $file_name = "";
    // Get image name
  	$input_name = basename($_FILES["file-input"]["name"]);
    $arr_string = explode(" ",$input_name);
    foreach($arr_string as $str){
       $file_name .= $str ;
    }
    $target_dir = "../uploads/product_images/";
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file-input"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
   /* if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }*/
    // Check file size
    if ($_FILES["file-input"]["size"] > 8000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if ( $_FILES["file-input"]["size"] > 1000000) {
            move_uploaded_file($_FILES["file-input"]["tmp_name"], $target_file);
            correctImageOrientation($target_file);
            compress($target_file, $target_file, 20);
           
           
            echo "The file ". basename( $_FILES["file-input"]["name"]). " has been uploaded.";
        } else if( $_FILES["file-input"]["size"] <= 1000000) {
            move_uploaded_file($_FILES["file-input"]["tmp_name"], $target_file);
            correctImageOrientation($target_file);
        }else{
            echo "Sorry, there was an error uploading your file.";
        }
    }


    $title = $_POST['title'];
    $desc = $_POST['description'];
    $catID = $_POST['categories'];
    $price = $_POST['price'];


    $cats = "SELECT * FROM categories WHERE cat_id='$catID'";
    $categories = $conn->query($cats);
    $catRow = $categories->fetch_assoc();
    $cTitle = $catRow['cat_title'];
    
    $stripeImage = "https://www.beverlyscloset.store/uploads/product_images/".$file_name;

    // Here, you can also perform some database query operations with above values.
    \Stripe\Stripe::setApiKey("sk_live_jYgZ6rUsgNb9hPzqcqgnxh7R");
    $product = \Stripe\Product::create([
        'name' => $title,
        'type' => 'good',
        'attributes' => [],
        'images' => [$stripeImage],
        'description' => $desc
    ]);

    $stripePriceFormat = explode('.',$price);
    $stripePrice = $stripePriceFormat[0].$stripePriceFormat[1];

    $sku = \Stripe\SKU::create(array(
      "product" => $product['id'],
      "price" => $stripePrice,
      "currency" => "usd",
      "inventory" => array(
        "type" => "finite",
        "quantity" => 10
      )
    ));

    $p_id = $product['id'];
    $s_id = $sku['id'];

    $sql = "INSERT INTO products (product_title,product_desc,product_cat,product_image,product_price,stripe_id,stripe_sku) VALUES ('$title','$desc','$catID','$target_file','$price','$p_id','$s_id')";
    $result = mysqli_query($conn, $sql);
    $picture = '<img height="100" width="125" src="..uploads/product_images/'.$file_name.'">';
    $uploadOk = 1;
   
    $addRow = '<tr id="'.$conn->insert_id.'">
        <td>'.$conn->insert_id.'</td>
        <td>'.$cTitle.'</td>
        <td>'.$title.'</td>
        <td>'.$picture.'</td>
        <td class="process">'.$price.'</td>
        <td>
          <div class="table-data-feature">
            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                <i class="zmdi zmdi-edit"></i>
            </button>
            <button id="'.$conn->insert_id.'"  class="item deleteProduct" data-toggle="tooltip" data-placement="top" title="Delete">
                <i class="zmdi zmdi-delete"></i>
            </button>
            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                <i class="zmdi zmdi-more"></i>
            </button>
        </div>
      </td>
    </tr>';


    echo $addRow; // Success Message

  }
  else if(isset($_POST["removeItemFromCart"]))
  {
    $id = $_POST["removeItemFromCart"];
    $cart = "DELETE FROM cart WHERE p_id = $id";
    $sql = "DELETE FROM products WHERE product_id = $id";
    $stripe = "SELECT products.stripe_id, products.stripe_sku FROM products WHERE product_id = $id";

    $stripeDelete = $conn->query($stripe);
    $delete = $conn->query($sql);
    $delete2 = $conn->query($cart);

    if($row = $stripeDelete->fetch_assoc()){
      \Stripe\Stripe::setApiKey("sk_live_jYgZ6rUsgNb9hPzqcqgnxh7R");

      $sku = \Stripe\SKU::retrieve($row['stripe_sku']);
      $sku->delete();

      $product = \Stripe\Product::retrieve($row['stripe_id']);
      $product->delete();

    }



    // Here, you can also perform some database query operations with above values.
    echo "Deleted product id:". $id ."!\n"; // Success Message

  }
  else if(isset($_POST["updateItem"])){
    $id = $_POST["updateItem"];
    //echo $id;
    $edit = "SELECT * FROM products WHERE product_id = $id";
    $e = $conn->query($edit);
    $eRow = $e->fetch_assoc();
    echo json_encode($eRow);
  }

  else if (isset( $_POST['pro_id'] )) {

      if (!isset($_FILES["Efile-input"]) ) {
       // $image = $_POST['hiddenFile']; 
        $title = $_POST['Etitle'];
        $desc = $_POST['Edescription'];
        $catID = $_POST['Ecategories'];
        $price = $_POST['Eprice'];
        $stripePriceFormat = explode('.',$price);
        $stripePrice = $stripePriceFormat[0].$stripePriceFormat[1];
    
        $stripe_id = $_POST['stripe_id'];
        $stripe_sku = $_POST['stripe_sku'];
        \Stripe\Stripe::setApiKey("sk_live_jYgZ6rUsgNb9hPzqcqgnxh7R");


        $cats = "SELECT * FROM categories WHERE cat_id='$catID'";
        $categories = $conn->query($cats);
        $catRow = $categories->fetch_assoc();
        $cTitle = $catRow['cat_title'];

        $id = $_POST['pro_id'];
        $update = " UPDATE products
                  SET product_title = '$title', product_cat = '$catID', product_price = '$price', product_desc = '$desc'
                  WHERE product_id='$id'";

        $u = $conn->query($update);
        
        $product = \Stripe\Product::retrieve($stripe_id);
        $product->name = $title;
        $product->description = $desc;
        $product->save();
        
        $sku = \Stripe\SKU::retrieve($stripe_sku);
        $sku->price = $stripePrice;
        $sku->save();
      }
      else if (isset($_FILES["Efile-input"]) ){
        $target_dir = "../uploads/product_images/";
        $target_file = $target_dir . basename($_FILES["Efile-input"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["Efile-input"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
       /* if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        } */
        // Check file size
        if ($_FILES["Efile-input"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["Efile-input"]["tmp_name"], $target_file)) {
                correctImageOrientation($target_file);
                compress($target_file, $target_file, 20);
                
                
                echo "The file ". basename( $_FILES["Efile-input"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $title = $_POST['Etitle'];
        $desc = $_POST['Edescription'];
        $catID = $_POST['Ecategories'];
        $price = $_POST['Eprice'];
        $image = $target_file;


        $cats = "SELECT * FROM categories WHERE cat_id='$catID'";
        $categories = $conn->query($cats);
        $catRow = $categories->fetch_assoc();
        $cTitle = $catRow['cat_title'];

        $id = $_POST['pro_id'];
        $update = " UPDATE products
                  SET product_title = '$title', product_cat = '$catID', product_price = '$price', product_desc = '$desc', product_image = '$image'
                  WHERE product_id='$id'";

        $u = $conn->query($update);

      }
    }
    

  

?>
