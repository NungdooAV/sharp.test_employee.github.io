<?php require("mysql/config.php");?>
<html>
<head>
    <meta http-equiv="Content-Type/html; charset=utf8" />
    
    <title>Personnel Registration Form</title>
    

    <!--datepicker-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css">
    <script>
		$(function() {
			$( "#date_of_birth" ).datepicker({
				'format': 'yyyy-mm-dd',
				'autoclose': true
			});
		});

	</script>
</head>

<!--bg-->
<body background="bg/bg-callout.jpg">
    <?php
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            require("emp_select.php");
            $action="emp_form.php";
        }else{
            $id="";
            $prefix="";
            $firstname="";
            $surname="";
            $gender="";
            $date_of_birth="";
            $division="";
            $photo="";
            $action="emp_insert.php";
        }

    ?>

    <br><h1 class="title text-center text-white">Personnel Registration Form</h1>
    
    <div class="container">
        <div class="text-left pt-5">

            <form action="<?php echo($action);?>" method="post" enctype="multipart/form-data" name="EmpForm" target="_self" onSubmit="return checkForm();">

                <!-- Start Form Body -->
                <div class="form-group text-center bg-light border rounded p-4 border-dark">
                    <tr>
                        <div class="form-group">
                            <label>Personnel ID : </label>
                            <input name="id"type="text"  id="id" value="<?php echo($id)?>" placeholder="ID">
                            <small class="text-secondary col">example : 102001</small>
                        </div><br>

                        <div class="form-group">
                            <label>Prifix : </label>
                            <select name="prefix" id="prefix" value="<?php echo($prefix)?>">
                                <option value="Mr">Mr.</option>
                                <option value="Mrs">Mrs.</option>
                                <option value="Miss">Miss</option>
                            </select>

                            <label>Firstname : </label>
                            <input name="firstname" type="text" id="firstname" value="<?php echo($firstname)?>" placeholder="Firstname">

                            <label>Lastname : </label>
                            <input name="surname" type="text" id="surname" value="<?php echo($surname)?>" placeholder="Lastname">

                            <label>Gender : </label>
                            <select name="gender" id="gender" value="<?php echo($gender)?>">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group text-left">
                            <label>Date of Birth : </label>
                            <input name="date_of_birth" type="text" autocomplete="off" id="date_of_birth" value="<?php echo($date_of_birth)?>" placeholder="Year/Month/Day">
                        </div><br>

                        <div class="form-group">
                            <label>Department : </label>
                            <select name="division" id="division" value="<?php echo($division)?>">
                                <option value="101-Animation">101-Animation</option>
                                <option value="102-Computer Graphic">102-Computer Graphic</option>
                                <option value="Database">103-Database</option>
                                <option value="104-IT Consultant">104-IT Consultant</option>
                                <option value="105-IT Management">105-IT Management</option>
                                <option value="106-IT Support">106-IT Support</option>
                                <option value="107-Network Admin">107-Network Admin</option>
                                <option value="108-Programmer">108-Programmer</option>
                                <option value="109-System Analyst">109-System Analyst</option>
                                <option value="110-Website">110-Website</option>
                            </select>

                            <label>Photo : </label>
                                <input name="photo" type="file" id="photo" value="<?php echo($photo);?>">
                                <small class="text-danger">.jpg only / size 144x188 px</small><br>
                        </div><br>

                        <hr noshade="noshade">

                        <br><div class="form-group text-center">
                            <input type="submit" name="button" id="button" value="Submit" class="btn btn-success btn-lg">
                        </div>
                        <div class="form-group text-center">
                            <input type="reset" name="button2" id="button2" value="Reset" class="btn btn-warning btn-lg">
                        </div>
                        <div class="form-group text-center">  
                            <a href="index.php" class="btn btn-primary btn-lg">Back to list</a>
                        </div>
                    </tr>
                </div>
            </form>
        </div>
    </div>    
            <script language="javascript">
                document.getElementById('prefix').value="<?php echo($prefix); ?>";
                document.getElementById('gender').value="<?php echo($gender); ?>";
                document.getElementById('division').value="<?php echo($division); ?>";

            function checkForm(){
                var v1 = document.getElementById('id').value;
                if(v1.length<1){
                    alert("Plese input Personnel ID example : 102001")
                    document.getElementById('id').focus();
                    return false;
                }else{
                    return true;
                }
            }

            </script>
            
            <!-- Start footer -->
            <div id="footer">
                <div class="my-4 text-center"><p class="text-black">©Sharp K.Yuttanakorn</p></div>
            </div>
</body>
</html>