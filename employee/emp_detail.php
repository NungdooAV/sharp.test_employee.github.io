<?php require("mysql/config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Personnel Profile</title>
</head>

<!--bg-->
<body background="bg/bg-pen.jpg" class="text-center p-3 mb-2">
    <?php
        $id=$_GET['id'];
        require("emp_select.php");
        
    ?>

    <br><h2 class="text-center">Personnel Profile</h2><br>
    
    <div class="container">

        <!-- Start Form Body -->
        <div class="bg-mute bg-light border rounded p-4 border-dark">
            <div class="form-group">
                <img src="<?php echo($photo); ?>" width= "150" height= "180">
            </div>

            <!-- Start Form -->
            <form id="emp_detail" action="emp_detail.php" method="POST" autocomplete="off" enctype="multipart/form-data" class="form-group text-center"> 
                <label class="form-group">ID : <?php echo($id)?></label><br>
                <label class="form-group">Name : <?php echo($prefix)?></label>
                <label class="form-group"><?php echo($firstname)?></label>
                <label class="form-group">&nbsp;<?php echo($surname)?></label><br>
                <label class="form-group">Gender : <?php echo($gender)?></label><br>
                <label class="form-group">Date of Birth : <?php echo($date_of_birth)?></label><br>
                <label class="form-group">Department : <?php echo($division)?></label> 
            </form>
        </div>
    </div><br>

        <!--button-->
        <a href="javascript:removedata();" class="form-group btn btn-danger btn-lg">Remove</a><br>
        <a href="index.php" class="form-group btn btn-primary btn-lg">Back to list</a>

    <!--delete-->
    <script language="javascript">
        function removedata(){
            if(confirm("delete confirm")==true){
                window.location.href="emp_delete.php?id=<?php echo($id); ?>";
            }
        }
    </script>

    <!-- Start footer -->
    <div id="footer">
        <div class="my-4 text-center"><p class="text-black">©Sharp K.Yuttanakorn</p></div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>