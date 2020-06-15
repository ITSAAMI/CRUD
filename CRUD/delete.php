<?php include 'header.php';

if(isset($_POST['deletebtn']))
{
    include 'connection.php';

    $stu_id = $_POST['del_id'];
    //echo $stu_id;
    
    $sql = "DELETE FROM student Where id = {$stu_id}";  
    
    $result = mysqli_query($conn,$sql) or Die("Query Unsuccessful");
    
    header("location: http://localhost/crud/index.php");

    mysqli_close($conn);
}
?>
<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="del_id" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>
</body>
</html>
