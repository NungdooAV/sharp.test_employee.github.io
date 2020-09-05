<?php require("mysql/config.php");?>
<html lang="en">
<head>
    <!--Animation bg color-->
    <style>
    body {
        -webkit-animation: colorchange 25s infinite; 
        animation: colorchange 25s infinite;
        background: linear-gradient(direction/angle, color1, color2, color3, etc)      
    }
    @-webkit-keyframes colorchange {
        0%   {background: #FFFF99;}
        12.5%  {background: #FFFF66;}
        25%  {background: #FFFF33;}
        32.5%  {background: #FFCC00;}
        50% {background: #FF9900;}
        62.5%  {background: #FFCC00;}
        75%  {background: #FFFF33;}
        87.5%  {background: #FFFF66;}
        100%   {background: #FFFF99;}
    }
    @keyframes colorchange {
        0%   {background: #FFFF99;}
        12.5%  {background: #FFFF66;}
        25%  {background: #FFFF33;}
        32.5%  {background: #FFCC00;}
        50% {background: #FF9900;}
        62.5%  {background: #FFCC00;}
        75%  {background: #FFFF33;}
        87.5%  {background: #FFFF66;}
        100%   {background: #FFFF99;}
}
    </style>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!--datatable-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    

    
    <br><title>Personnel List</title>
</head>

<!--form-->
<body class="container p-3 mb-2">
    <h2 class="text-center">Personnel List</h2><br>
    <?php
        $sql="SELECT id,prefix,firstname,surname,gender,date_of_birth,division FROM tbl_employee";
        if(isset($_GET['keyword'])){
            $keyword=$_GET['keyword'];
            $sql.=" WHERE id='$keyword' OR firstname LIKE '%$keyword%'";
        }else{
            $keyword="";
        } // keyword
        require("mysql/connect.php");
        $result=mysqli_query($conn,$sql);

    ?>



    <!--border-->
    <div class="bg-light border rounded p-4 border-dark">

    <!--Button-->
    <div class="col form-group text-right">
        <form action="index.php" method="get" name="SearchForm" target="_self" id="SearchForm" class="form-group text-right bg-transparents border rounded p-4 border-dark">Find : <input name="keyword" type="text" id="keyword" value="<?php echo($keyword)?>" placeholder="Firstname Only">
        <button type="submit" name="button" id="button" class="btn btn-success btn-sm" value="Submit">Summit</button>
        <a href="index.php" class="btn btn-info btn-sm text-right">Refresh</a>
        <a href="emp_form.php" class="btn btn-primary btn-sm text-right">Add</a>
        </form>
    </div>    

    <!--head table-->
    <div style="overflow-x:auto;">
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Prefix</th>
                <th scope="col">Name</th>
                <th scope="col">Lastname</th>
                <th scope="col">Department</th>
                <th scope="col">Manage</th>
            </tr>
        </thead>

        <!--list table-->
        <?php 
            while($record=mysqli_fetch_array($result)){
                $id=$record['id'];
                $prefix=$record['prefix'];
                $firstname=$record['firstname'];
                $surname=$record['surname'];
                $division=$record['division'];
        ?>

        <!--Database Show On Table-->
        <tr class="text-center">
            <td><?php echo $id; ?></td>
            <td><?php echo $prefix; ?></td>
            <td><?php echo $firstname; ?></td>
            <td><?php echo $surname; ?></td>
            <td><?php echo $division; ?></td>
        
            <!--Button Manage--> 
            <div class="form-group">   
            <td align="left" valign="top" class="text-center">
                <a href="emp_detail.php?id=<?php echo $id; ?>" class="btn btn-info btn-sm">View</a>  
                <a href="javascript:removedata('<?php echo $id; ?>')" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </div> 
        </tr>

        <?php } ?>
    </table>
    </div>
    </div>

    <!--Delete-->
    <?php require("mysql/unconn.php");?>
    <script language="javascript">
        function removedata(id){
            if(confirm("delete confirm")==true){
                window.location.href="emp_delete.php?id="+id;
            }
        }
    </script>

    <!-- Start Footer -->
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