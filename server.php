<?php
    if (isset($_GET['dltid'])) {
        $dlt_query = "DELETE FROM tbl_std WHERE sid = $_GET[dltid]";
        mysqli_query($con,$dlt_query);
        // header("Location:sheet.php");
        header("Refresh:0; url=sheet.php");
    }
    

if (isset($_POST["save"])) {
    
    $name =  $_POST["name"];
    $roll = $_POST["sroll"];
    $en = $_POST["en"];
    $ur = $_POST["ur"];
    $ma = $_POST["ma"];

    if (($en >= 0 && $en <= 100 && !empty($en)) && ($ma >= 0 && $ma <=100 && !empty($ma)) && ($ur >= 0 && $ur <= 100 && !empty($ur))) {
       $obt = $en + $ur + $ma;
       $percentage = ($obt/300)*100;
       $per = number_format((float)$percentage, 2, '.', '');
        $grade;

       if ($en >= 40 && $ur >= 40 && $ma >= 40) {
        $remark = "Pass";

        if ($per>=90 && $per <= 100) {
            $grade = "A+";
        }
        if ($per>=70 && $per < 90) {
            $grade = "A";
        }
        if ($per>=60 && $per < 70) {
            $grade = "B";
        }
        if ($per>=50 && $per < 60) {
            $grade = "C";
        }
        if ($per>=40 && $per < 50) {
            $grade = "D";
        }

       }
       else{
           $remark = "Fail";
           $grade = "F";
       }
       if (isset($_GET["upid"])) {
           $uid = $_GET["upid"];
             $upQuery = "UPDATE tbl_std SET sname='".$name."',sroll='".$roll."',english = '".$en."',math='".$ma."',urdu='".$ur."',obtain='".$obt."',percentage='".$per."',grade='".$grade."',remark='".$remark."' WHERE sid='".$uid."'";
           $ins_up = mysqli_query($con,$upQuery) or die("Date is not Updated");
           header("Refresh:0; url=sheet.php");
           
       }
       else{
       $insert_query = "INSERT INTO tbl_std VALUE('NULL','".$name."','".$roll."','".$en."','".$ma."','".$ur."','".$obt."','".$per."','".$grade."','".$remark."')";
       $ins_data = mysqli_query($con,$insert_query) or die("Data is not Inserted");
       header("Location:sheet.php");
       }
       
    }else{
        echo "Enter Marks greater then 0 and Less then 100 only";
    }

    // echo "Obtain".$obt."<br> per".$per."%<br> Grade".$grade; 
}
?>