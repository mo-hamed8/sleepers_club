<?php

require "connect_db.php";
$sql = "SELECT name,artist,path FROM sounds";
$result = $conn->query($sql);

$sounds_list=[];

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $sounds_list=["name"=>$row["name"],"artist"=>$row["artist"],"img"=>"images/2.jpg","src"=>$row["path"]];
  }
} else {
  echo "0 results";
}
$conn->close();

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Music Player</title>
    <!-- google iocns -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <!-- css style sheet -->
    <link rel="stylesheet" href="styles/index.css" />
  </head>
  <body>
    <div class="container">
      <div class="top-bar">
        <i class="material-icons"> expand_more </i>
        <span>Now Playing</span>
        <i class="material-icons">more_horiz</i>
      </div>
      <div class="img-area">
        <img src="" alt="img" />
      </div>
      <div class="song-details">
        <p class="name"></p>
        <p class="artist"></p>
      </div>
      <div class="progress-area">
        <div class="progress-bar">
          <audio id="main-audio" src=""></audio>
        </div>
        <div class="song-timer">
          <span class="current-time">00:00</span>
          <span class="max-duration">00:00</span>
        </div>
      </div>
      <div class="controls">
        <i id="repeat-plist" class="material-icons" title="Playlist looped"
          >repeat</i
        >
        <i id="prev" class="material-icons">skip_previous</i>
        <div class="play-pause">
          <i class="material-icons play">play_arrow</i>
        </div>
        <i id="next" class="material-icons">skip_next</i>
        <i class="material-icons">queue_music</i>
      </div>
    </div>
    <script>let allMusic=[<?php echo json_encode($sounds_list); ?>]</script>
    <script src="js/main.js"></script>
  </body>
</html>
