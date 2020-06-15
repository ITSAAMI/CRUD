<?php

$conn = mysqli_connect("localhost","root","","crud") or die("Database not connected ");

$stu_name = $_POST['sname'];
$stu_address = $_POST['saddress'];
$stu_class = $_POST['class'];
$stu_phone = $_POST['sphone'];



$sqli = "INSERT INTO student(name,address,class,phone) VALUES ('{$stu_name}','{$stu_address}','{$stu_class}','{$stu_phone}')";

$result = mysqli_query($conn,$sqli) or die ("Query Unsuccessful!");




         if(isset($_FILES['fileToUpload']))
         {
            $file_name = $_FILES['fileToUpload']['name'];
            $file_size = $_FILES['fileToUpload']['size'];
            $file_tmp_name = $_FILES['fileToUpload']['tmp_name'];
            $file_type = $_FILES['fileToUpload']['type'];


            move_uploaded_file($file_tmp_name,"images/". $file_name );
         }
         


header("location: http://localhost/crud/add.php");

mysqli_close($conn);



?>