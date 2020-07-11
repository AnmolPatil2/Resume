<?php
$host="localhost";
$user="root";
$password="";
$database="ise";
$connection=mysqli_connect($host,$user,$password,$database);
$query=" SELECT *FROM students";
$query_execution=mysqli_query($connection,$query);
while($data = mysqli_fetch_array())

echo "aaa"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
