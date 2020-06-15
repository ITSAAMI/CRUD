<?php


$stu_id = $_GET['del_id'];
//echo $stu_id;

include 'connection.php';

$sql = "DELETE FROM student Where id = {$stu_id}";  

$result = mysqli_query($conn,$sql) or Die("Query Unsuccessful");

header("location: http://localhost/crud/index.php");

mysqli_close($conn);

?>