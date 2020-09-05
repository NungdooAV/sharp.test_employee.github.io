<?php
    // get data db from tbl_employee
    global $conn;
    $sql="SELECT id,prefix,firstname,surname,gender,date_of_birth,division,photo FROM tbl_employee WHERE id='$id'";
    require("mysql/connect.php");
    $result=mysqli_query($conn,$sql) or die(mysqli_error($link));
    $record=mysqli_fetch_array($result);
    
    
    // require db tbl_employee
    $id=$record['id'];
    $prefix=$record['prefix'];
    $firstname=$record['firstname'];
    $surname=$record['surname'];
    $gender=$record['gender'];
    $date_of_birth=$record['date_of_birth'];
    $division=$record['division'];
    $photo=$record['photo'];
    $photo="photos/".$id.".jpg";
    require("mysql/unconn.php");
?>