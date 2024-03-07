<?php 


class Upload{
   private $target_directory;
   private $file_to_upload;
   private $size_mp3_file=15000000;

   private $new_path="";

   public function __construct(string $file_to_upload , $target_directory="sounds/"){
      $this->file_to_upload=$file_to_upload;
      $this->target_directory=$target_directory;
   }

   public function upload_mp3(){
      $targetFile = $this->target_directory . basename($_FILES["$this->file_to_upload"]["name"]); // Get the file name
      $uploadOk=1;
       // Check if file already exists
       if (file_exists($targetFile)) {
           echo "Sorry, file already exists.";
           $uploadOk = 0;
       }

       // Check file size (optional)
    //    if ($_FILES["$this->file_to_upload"]["size"] > $this->size_mp3_file) { // Adjust as per your requirement (5MB in this example)
    //        echo "Sorry, your file is too large.";
    //        $uploadOk = 0;
    //    }



       // Allow only MP3 file format
       $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
       if ($fileExtension != "mp3") {
           echo "Sorry, only MP3 files are allowed.";
           $uploadOk = 0;
       }

       // Check if $uploadOk is set to 0 by an error
       if ($uploadOk == 0) {
           echo "Sorry, your file was not uploaded.";
       } 
       else {
           // If everything is ok, try to upload file
           if (move_uploaded_file($_FILES["$this->file_to_upload"]["tmp_name"], $targetFile)) {
            $this->new_path=$this->target_directory. htmlspecialchars(basename( $_FILES["$this->file_to_upload"]["name"]));
           } else {
               echo "Sorry, there was an error uploading your file.";
           }
       }
      }



   

   public function get_path():string{
      return $this->new_path;
   }


}



?>