<?php include("header.php");

$uid = $_GET['uid'];
$getid = "SELECT * FROM student WHERE s_id=$uid";

$ups = mysqli_query($con,$getid);

$load = mysqli_fetch_assoc($ups);


?>



<div class="container">
    <div class="text-center">
        <h1>Update Student</h1>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 jumbotron">

        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $load['s_id']?>">
            <div class="form-group">
                <label for="name">Student Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $load['s_name']?>">
            </div>
            <div class="form-group">
                <label for="sroll">Roll No #:</label>
                <input type="number" class="form-control" id="sroll" name="sroll" value="<?php echo $load['s_roll']?>">
            </div>

            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sgender" value="Male"<?php if($load['s_gender']=="Male"){echo "checked";}?>>Male
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sgender" value="Female" <?php if($load['s_gender']=="Female"){echo "checked";}?>>Female
                </label>
            </div>
                <br>

                <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="MBA" value="MBA" <?php if($load['mba']=="MBA"){echo "checked";}?>>MBA
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="BBA" value="BBA" <?php if($load['bba']=="MBA"){echo "checked";}?>>BBA
                </label>
            </div>
            <br>
            <select name="scity"  >
                <option >Select City</option>
                <option value="Karachi" <?php if($load['s_city']=="Karachi"){echo "selected";}?>>Karachi</option>
                <option value="Hawaran" <?php if($load['s_city']=="Hawaran"){echo "selected";}?>>Hawaran</option>
                <option value="Lahor" <?php if($load['s_city']=="Lahor"){echo "selected";}?>>Lahor</option>
            </select>
            <br>
            <button type="submit" name="update" class="btn btn-success">Update</button>
        </form>
        </div>
    </div>
</div>
<?php

if (isset($_POST["update"])) {
     $con = mysqli_connect("localhost","root","","practice") or die("Not Connected");  

     $name = $_POST["name"];
     $roll = $_POST["sroll"];
     $gender = $_POST["sgender"];
     $scity = $_POST["scity"];
     $MBA ="Null";
    $BBA = "Null";

    if (!empty($_POST["MBA"])) {
        $MBA = $_POST["MBA"];
    }
    if (!empty($_POST["BBA"])) {
        $BBA = $_POST["BBA"];
    }

 $up_data = "UPDATE `student` SET  `s_name` = '".$name."', `s_gender` = '".$gender."', `s_city` = '".$scity."', `s_roll` = '".$roll."',`mba` = '".$MBA."', `bba` = '".$BBA."' WHERE `s_id` = $uid;";

    $update_data = mysqli_query( $con, $up_data) or die("Data Not Saved");

    header("location:index.php");

}


?>
</body>
</html>