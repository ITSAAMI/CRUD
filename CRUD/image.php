<!DOCTYPE html>
<html>
<body>
<?php

if(isset($_FILES['fileToUpload']))
{
   $file_name = $_FILES['fileToUpload']['name'];
   $file_size = $_FILES['fileToUpload']['size'];
   $file_tmp_name = $_FILES['fileToUpload']['tmp_name'];
   $file_type = $_FILES['fileToUpload']['type'];

   
   move_uploaded_file($file_tmp_name,"images/". $file_name );

   $conn = mysqli_connect("localhost","root","","crud") or die("Database not connected ");


   $sqli = "INSERT INTO image (img_name, img_size, img_tmp_name,img_type) VALUES ('$file_name', '$file_size', '$file_tmp_name', '$file_type')";
   
   $result = mysqli_query($conn,$sqli) or die ("Query Unsuccessful!");

   
  if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    $image_text = mysqli_real_escape_string($db, $_POST['image_text']);

    // image file directory
    $target = "images/".basename($image);

    $sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
    // execute query
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
}
$result = mysqli_query($db, "SELECT * FROM images");
   


}

?>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

