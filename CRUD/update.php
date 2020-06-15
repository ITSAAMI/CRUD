<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Edit Record</h2>

 
    <form class="post-form" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>

    <?php 
    if(isset($_POST['showbtn']))
    {
        $conn = mysqli_connect("localhost","root","","crud") or die("Database not connected ");

        $stu_id = $_POST['sid'];

        $sqli = "SELECT * FROM `student` WHERE id = {$stu_id} ";


        $result = mysqli_query($conn,$sqli) or die ("Query Unsuccessful!");

         if(mysqli_num_rows($result) > 0)
         {


         while ($row = mysqli_fetch_assoc($result))
            {
    ?>

    <form class="post-form" action="updatedata2.php" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="sid"  value="" />
            <input type="text" name="sname" value="<?php  echo $row['name'];?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?php echo $row['address'];?>" />
        </div>
        <div class="form-group">
        <label>Class</label>
        <?php

$sqli1 = "SELECT * FROM `courses`";

$result1 = mysqli_query($conn,$sqli1) or die ("Query Unsuccessful!");

if(mysqli_num_rows($result1) > 0){
    echo "<select name ='sclass'>";
  
    

  while ($row1 = mysqli_fetch_assoc($result1))
  {
    if($row['class'] == $row1['cid'])
    {
      $select = "selected";
    }else 
    {
      $select = " ";
    }
    echo  "<option {$select} value='{$row1['cid']}'>{$row1['cname']}</option>";
  }

       echo "</select>"; 
  }
            ?>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" value="<?php  echo $row['phone'];?>" />
        </div>
    <input class="submit" type="submit" value="Update"  />

    </form>
    <?php 
    if(isset($_POST['deletebtn']))
    {

        
        $sql = "DELETE FROM student Where id = {$stu_id}";  
        
        $result = mysqli_query($conn,$sql) or Die("Query Unsuccessful");
        
        header("location: http://localhost/crud/index.php");
    
        mysqli_close($conn);
    }
       
    }
   }
}
    ?>
</div>
</div>
</body>
</html>
