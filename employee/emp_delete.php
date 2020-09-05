<?php require("mysql/config.php");?>
<html>
<head>
    <meta http-equiv="Content-Type/html; charset=utf8" />
    
    <title>Personnel System</title>
</head>

<body>
    <?php
        // delete db from tbl_employee
        $id=$_GET['id'];
        $photo="photos/".$id.".jpg";

        $sql="DELETE FROM tbl_employee  WHERE id='$id'";
        require("mysql/connect.php");
        $result=mysqli_query($conn,$sql);

        if($result==1){
            $v1=1;
            unlink($photo);
        }else{
            $v1=0;
        }

        require("mysql/unconn.php");
    ?>

    <!--alert delete-->
    <script language="javascript">
        var v1 = <?php echo($v1);?>;
        if(v1==1){
            alert("Delete personnel data sucessfully");
            window.location.replace("index.php");
        }else{
            alert("delete personnel data error");
            window.history.back();
        }
    </script>

</body>
</html>