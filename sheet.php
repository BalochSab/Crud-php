<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(function(){
    $('.update').click(function () {
        
    })


})

</script>
</head>
<body>
    <?php $con = mysqli_connect("localhost","root","","crud") or die("Database is not connected");
    // $up[] = "";
    if (isset($_GET["upid"])) {
        $upid = $_GET["upid"];
        $selData = "SELECT * FROM tbl_std WHERE sid=$upid";
        $selUpdate = mysqli_query($con,$selData);
        $record = mysqli_fetch_assoc($selUpdate);
        $rname = $record['sname'];
        $rroll = $record['sroll'];
        $rur = $record['urdu'];
        $ren = $record['english'];
        $rma = $record['math'];
    }
    ?>

<div class="container ">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 ">
        <div class="text-center">
        <!-- <h3>Add Marks</h3> -->
    </div>
        <form action="" method="POST" onsubmit='document.getElementsByClassName(".textbox").value="";'>
            <?php if (isset($_GET["upid"])) {
                echo "<input type='hidden' name='sid' class='textbox' value=".$record["sid"].">";
            }?>
            <div class="form-inline">
                
                <label for="name">Student Name:</label>
                <input type="text" class="form-control textbox" placeholder="Enter name" id="name" name="name" value="<?php if(isset($upid)){ echo $rname;} ;?>" >
            </div>
            <div class="form-inline">
                <label for="sroll">Roll No #:</label>
                <input type="number" class="form-control textbox" placeholder="Enter student roll" id="sroll" name="sroll" value="<?php if(isset($upid)){ echo $rroll;} ?>">
            </div>
            <div class="form-inline">
                <label for="ur">Urdu </label>
                <input type="text" class="form-control textbox" placeholder="Enter Urdu Marks" id="ur" name="ur" value="<?php if(isset($upid)){ echo $rur;}?>">
            </div>
            <div class="form-inline">
                <label for="en">English </label>
                <input type="text" class="form-control textbox" placeholder="Enter English Marks" id="en" name="en" value="<?php if(isset($upid)){ echo $ren;}?>">
            </div>
            <div class="form-inline">
                <label for="ma">Math </label>
                <input type="text" class="form-control textbox" placeholder="Enter Math Marks" id="ma" name="ma" value="<?php if(isset($upid)){ echo $rma;}?>">
            </div>
            
            <div>
                <input type="submit" name="save"   <?php if(isset($upid)){ echo "value='Update'class='btn btn-warning'";}else{echo "value='Save' class='btn btn-info'";}?> >
                <?php  if(isset($upid)){echo "</div><a href='sheet.php' role='button' class='btn btn-danger'>Cancel</a>";} ?>
            </div>
        
        </form>
        </div>
    </div>
    <br>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Roll No$</th>
        <th>English</th>
        <th>Math</th>
        <th>Urdu</th>
        <th>Total Marks</th>
        <th>Obtains Marks</th>
        <th>Per%</th>
        <th>Grade</th>
        <th>Remarks</th>
        <th>Controles</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $Mark_Data = mysqli_query($con,"SELECT * FROM tbl_std");
        while ($std = mysqli_fetch_assoc($Mark_Data)) { ?>
      <tr>
            <td><?php echo $std["sid"];?></td>
            <td><?php echo $std["sname"];?></td>
            <td><?php echo $std["sroll"];?></td>
            <td><?php echo $std["english"];?></td>
            <td><?php echo $std["math"];?></td>
            <td><?php echo $std["urdu"];?></td>
            <td><?php echo "300";?></td>
            <td><?php echo $std["obtain"];?></td>
            <td><?php echo $std["percentage"]?></td>
            <td><?php echo $std["grade"];?></td>
            <td><?php echo $std["remark"];?></td>
            <?php if(!isset($upid)){ ?>
            <td>
            <a href="sheet.php?upid=<?php echo $std['sid']?>" class="btn btn-warning" roll="button">Edit</a>
            <a href="sheet.php?dltid=<?php echo $std['sid']?>" onclick="return confirm('Are your Sure?');" class="btn btn-danger" roll="button">Delete</a>
             </td>
        <?php }
        echo "</tr>";
    } ?>
      </tbody>
  </table>
</div>    
</body>
</html>
<?php include("server.php")?>












