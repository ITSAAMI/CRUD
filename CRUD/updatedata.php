<?php

$conn = mysqli_connect("localhost","root","","crud") or die("Database not connected ");


// echo $stu_id = $_POST['sid'];
// echo $stu_name = $_POST['sname'];
// echo $stu_address = $_POST['saddress'];
// echo $stu_class = $_POST['sclass'];
// echo $stu_phone = $_POST['sphone'];

$stu_id = $_POST['sid'];
$stu_name = $_POST['sname'];
$stu_address = $_POST['saddress'];
$stu_class = $_POST['sclass'];
$stu_phone = $_POST['sphone'];

$sqli2 = "UPDATE student SET name = '{$stu_name}', address = '{$stu_address}', class = '{$stu_class}', phone = '{$stu_phone}' WHERE  id = '{$stu_id}'; ";

$result = mysqli_query($conn,$sqli2) or die ("Query Unsuccessful!");

header("location: http://localhost/crud/index.php");

mysqli_close($conn);



?>