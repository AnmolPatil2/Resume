<?php
include "./connect.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST["name"];
    $city=  $_POST["city"];
    $commission=  $_POST["comission"];
    $incQuery="SELECT salesman_id FROM salesman ORDER BY salesman_id DESC";
    $incQueryExec = mysqli_query($connection,$incQuery);
    $row= mysqli_fetch_array($incQueryExec, MYSQLI_ASSOC);
    $lastID=$row["salesman_id"];
    $nextID=$lastID+1;
    $query = " INSERT INTO `salesman`(`salesman_id`,`name`,`city`,`commission`)VALUES (8,'$name','$city','$commission')";
    if (mysqli_query($mysqli, $query)) {
        echo "New record created successfully";
        
    } 
   
    
    if(!$query_Exec){
        echo mysqli_error($query_Exec);
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>company</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h1>welcome to homepage</h1> 
<form action="" method="post">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="name"> name of salesman</label>
<input type="text" class="form-control" name="name" placeholder="enter your name">
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="commission"> commission</label>
<input type="text" class="form-control" name="commission" placeholder="enter commission">
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="city"> city</label>
<input type="text" class="form-control" name="city" placeholder="enter your city">
</div>
</div>
</div>

<button class="btn btn-icon btn-success"  type="submit">submit</button>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>