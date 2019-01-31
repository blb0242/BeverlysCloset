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
    <title>Beverly's Boutique</title>

    

    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
    </script>
    <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
      <link rel="stylesheet" type="text/css" href="css/test.css">
      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    <meta name="pinterest" content="nopin" />
    
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:700" rel="stylesheet">
    <script src="https://js-cdn.music.apple.com/musickit/v1/musickit.js"></script>
    <style>
      html, body, .block {
        height: 100%;
      }
    </style>
  </head>
<body>

<?php 

  $s = "big file name 1 2018.jpg";
  $name = "";
  
  $arr_string = explode(" ",$s);
  foreach($arr_string as $str){
    $name.=$str;
  }
  echo $name;

?>
  

<script>
$( document ).ready(function(){
$('.pushpin').each(function() {
    var $this = $(this);
    var $target = $('#' + $(this).attr('data-target'));
    $this.pushpin({
      top: $target.offset().top,
      bottom: $target.offset().top + $target.outerHeight() - $this.height()
    });
  });
});
</script>
  
</body>

</html>
