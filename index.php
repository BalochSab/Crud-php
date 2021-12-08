
<?php include("header.php") ?>

<div class="container">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roll No#</th>
                <th>Gender</th>
                <th>City</th>
                <th>BBA</th>
                <th>MBA</th>
                <th>Controlles</th>
            </tr>
            </thead>
            <tbody>

            <?php 
            $select_data = 'SELECT * FROM student';
            $dat = mysqli_query($con, $select_data);
            
            while($show = mysqli_fetch_assoc($dat)){
            ?>
            <tr>
                <td><?php echo $show["s_id"] ?></td>
                <td><?php echo $show["s_name"] ?></td>
                <td><?php echo $show["s_roll"] ?></td>
                <td><?php echo $show["s_gender"] ?></td>
                <td><?php echo $show["s_city"] ?></td>
                <td><?php echo $show["bba"] ?></td>
                <td><?php echo $show["mba"] ?></td>
                

                <td>
                <?php
                    echo "<a href='update.php?uid=$show[s_id]' class='btn btn-success mr3' role='button'>Edit</a>";
                    echo "<a href='index.php?did=$show[s_id]' class='btn btn-danger' onclick='return confirm(\"Are You Sure?\");' role='button'>Delete</a>";
                    ?>
                </td>
            </tr>
            <?php } ?>
                
            </tbody>
        </table>

  </div>


</body>
</html>

<script>

    function deleted(){
        return confirm("Are You Sure?");
    }
</script>

<?php

if (isset($_GET['did'])) {
    
    
    $delete_user = "DELETE FROM student WHERE s_id=$_GET[did]";

    mysqli_query($con, $delete_user) or die("Data Not Deleted");

    header("Location:index.php");

}




?>
