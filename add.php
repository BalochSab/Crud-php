<?php include("header.php") ?>



<div class="container">
    <div class="text-center">
        <h1>Add New User</h1>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 jumbotron">

        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Student Name:</label>
                <input type="text" class="form-control" placeholder="Enter name" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="sroll">Roll No #:</label>
                <input type="number" class="form-control" placeholder="Enter student roll" id="sroll" name="sroll">
            </div>

            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sgender" value="Male">Male
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sgender" value="Female">Female
                </label>
            </div>
                <br>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="MBA" value="MBA">MBA
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="BBA" value="BBA">BBA
                </label>
            </div>
            <br>
            <select name="scity" >
            <option value="Karachi">Karachi</option>
            <option value="Hawaran">Hawaran</option>
            <option value="Lahor">Lahor</option>
            </select>
            <br>
                <div>
                <input type="submit" name="save" class="btn btn-info" value="Save">
                </div>
            
        </form>
        </div>
    </div>
</div>
<?php

if (isset($_POST["save"])) {
    
    $name = $_POST["name"];
    $roll = $_POST["sroll"];
    
    $scity = $_POST["scity"];
    
    $MBA ="Null";
    $BBA = "Null";

    if (!empty($_POST["MBA"])) {
        $MBA = $_POST["MBA"];
    }
    if (!empty($_POST["BBA"])) {
        $BBA = $_POST["BBA"];
    }

    if (!empty($_POST["sgender"])) {
        $gender = $_POST["sgender"];

        $ins = "INSERT INTO `student` (`s_id`, `s_name`, `s_gender`, `s_city`, `s_roll`, `mba`, `bba`) VALUES ('NULL', '".$name."','". $gender ."','".$scity ."','".$roll."','".$MBA."', '".$BBA."')";
        // $sqlInser = "INSERT INTO student VALUE('null', ,,, ,,;
        $insert_data = mysqli_query($con, $ins) or die("Data Not Saved");
    
        header("location:index.php");
            
    }
    else {
        echo "Please Select Gender";
    }

}


?>











</body>
</html>