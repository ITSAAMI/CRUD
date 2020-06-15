<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="sname" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="class">
                <option value="" selected disabled>Select Class</option>
               <?php
            include 'connection.php';
            $sql = "SELECT * FROM `courses`";

            $result = mysqli_query($conn,$sql) or Die("Query Unsuccessful ");
            while ($row = mysqli_fetch_assoc($result)){
            
            
               ?>
            <option value="<?php echo $row['cid'];?>">
                <?php echo $row['cname'];?>
            </option>
        <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" />
        </div>
        
         <div class="form-group">
         <label>Upload Image:</label>
         <input type="file" name="fileToUpload" id="fileToUpload">       
         </div>       

         
        <input class="submit" type="submit" value="Save" name ="fileToUploadbtn" />
    </form>
</div>
</div>
<?php

mysqli_close($conn);
?>
</body>
</html>
