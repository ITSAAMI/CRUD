<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <table cellpadding="7px">
        <?php
    include 'connection.php';

    $sql = "SELECT * FROM `student` JOIN courses ON student.class = courses.cid";  

    $result = mysqli_query($conn,$sql) or Die("Query Unsuccessful ");


    if(mysqli_num_rows( $result) > 0)
    {
        ?>
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Image</th>
        <th>Action</th>
        </thead>
        <tbody>
<?php while ($row = mysqli_fetch_assoc($result)){

    ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['cname']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td> Image </td>
                <td>
                    <a href='edit.php?xid=<?php echo $row['id']; ?>'>Edit</a>
                    <a href='delete-inline.php?del_id=<?php echo $row['id']; ?>'>Delete</a>
                </td>
            </tr>
        <?php }// While body?>
          </tbody>
    </table>
<?php }// if Body 
 mysqli_close($conn);
 ?>
</div>
</div>
</body>
</html>
