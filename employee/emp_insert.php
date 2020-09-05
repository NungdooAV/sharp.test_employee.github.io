<?php require("mysql/config.php");?>
<html>
<head>
    <meta http-equiv="Content-Type/html; charset=utf8" />

    <title>Personnel System</title>
</head>

<body>
</body>

    <?php
        $id=$_POST['id'];
        $prefix=$_POST['prefix'];
        $firstname=$_POST['firstname'];
        $surname=$_POST['surname'];
        $gender=$_POST['gender'];
        $date_of_birth=$_POST['date_of_birth'];
        $division=$_POST['division'];
        $photo=$_POST['photo'];
        $photo="photos/".$id.".jpg";
        $nullphoto="photos/null.jpg";

        $sql="INSERT INTO tbl_employee(id,prefix,firstname,surname,gender,date_of_birth,division,photo) VALUES ('$id','$prefix','$firstname','$surname','$gender','$date_of_birth','$division','$photo')";
        require("mysql/connect.php");
        $result=mysqli_query($conn,$sql);
    
        if($result==1){
            $v1=1;
            if(!move_uploaded_file($_FILES['photo']['tmp_name'],$photo)){
                copy($nullphoto,$photo);
            }
        }else{
            $v1=0;
        }

        require("mysql/unconn.php");
    ?>

    <script language="javascript">
        var v1 = <?php echo($v1);?>;
        if(v1==1){
            alert("Recording personnel data sucessfully");
            window.location.replace("emp_detail.php?id=<?php echo($id);?>");
        }else{
            alert("Plese input Personnel ID or Check other information Again before recording");
            window.history.back();
        }
    </script>
</html>