
<!doctype html>
<!--[if IE 9]> <html class="ie9 no-js supports-no-cookies" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js supports-no-cookies" lang="en"> <!--<![endif]-->
<head>
<?php include 'db.php'; 
session_start();?>


  <title>
    Home page
  </title>
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/amplitudejs@{{version-number}}/dist/amplitude.js"></script>




</head>
  <body >


    <form action="test.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

   <div class="grid-x grid-padding-x">
      <div class="large-12 medium-12 small-12 cell">
        <div id="single-song-player">
          <img amplitude-song-info="cover_art_url" amplitude-main-song-info="true"/>
          <div class="bottom-container">
            <progress class="amplitude-song-played-progress" amplitude-main-song-played-progress="true" id="song-played-progress"></progress>

            <div class="time-container">
              <span class="current-time">
                <span class="amplitude-current-minutes" amplitude-main-current-minutes="true"></span>:<span class="amplitude-current-seconds" amplitude-main-current-seconds="true"></span>
              </span>
              <span class="duration">
                <span class="amplitude-duration-minutes" amplitude-main-duration-minutes="true"></span>:<span class="amplitude-duration-seconds" amplitude-main-duration-seconds="true"></span>
              </span>
            </div>

            <div class="control-container">
              <div class="amplitude-play-pause" amplitude-main-play-pause="true" id="play-pause"></div>
              <div class="meta-container">
                <span amplitude-song-info="name" amplitude-main-song-info="true" class="song-name"></span>
                <span amplitude-song-info="artist" amplitude-main-song-info="true"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      Amplitude.init({
        "bindings": {
          37: 'prev',
          39: 'next',
          32: 'play_pause'
        },
        "songs": [
          {
            "name": "Risin' High (feat Raashan Ahmad)",
            "artist": "Ancient Astronauts",
            "album": "We Are to Answer",
            "url": "../songs/Ancient Astronauts - Risin' High (feat Raashan Ahmad).mp3",
            "cover_art_url": "../album-art/we-are-to-answer.jpg"
          }
        ]
      });
      window.onkeydown = function(e) {
          return !(e.keyCode == 32);
      };
      /*
        Handles a click on the song played progress bar.
      */
      document.getElementById('song-played-progress').addEventListener('click', function( e ){
        var offset = this.getBoundingClientRect();
        var x = e.pageX - offset.left;
        Amplitude.setSongPlayedPercentage( ( parseFloat( x ) / parseFloat( this.offsetWidth) ) * 100 );
      });
    </script>
    

  </body>
</html>
