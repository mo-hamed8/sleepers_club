<?php 

if(isset($_POST["submit"])){
    if(isset($_POST["name"])){
        echo "F";
        require "Upload.php";
        require "connect_db.php";

        $name=$_POST["name"];
        $artist=$_POST["artist"];

        $upload_obj=new Upload("mp3");
        $upload_obj->upload_mp3();
        $path=$upload_obj->get_path();

        echo $path;

        $sql="INSERT INTO sounds (name, artist, path) VALUES ('$name', '$artist', '$path')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          
          $conn->close();
    }
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MP3 Upload Form</title>
    <link rel="stylesheet" href="styles/form.css">
</head>
<body>
    <div class="form-container">
        <h2>Upload Your MP3</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="input-group">
                <label for="artist">Artist Name</label>
                <input type="text" id="artist" name="artist" >
            </div>
            <div class="input-group">
                <label for="mp3">Choose MP3 File</label>
                <input type="file" id="mp3" name="mp3" accept=".mp3" >
            </div>
            <button type="submit" name="submit" value="send">Upload</button>
        </form>
    </div>
</body>
</html>
