<?php

session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database

DEFINE('DB_USERNAME', 'root');
DEFINE('DB_PASSWORD', 'root');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_DATABASE', 'user-registration');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_error()) {
  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}



// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username =  $_POST['username'];
  $email =  $_POST['email'];
  $password_1 = $_POST['password_1'];
  $password_2 =$_POST['password_2'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  //include('error.php');
  /*if (count($errors) > 0)
  {
    	foreach ($errors as $error) {
      echo $error ;
 }
}*/
  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' ";
  $result = mysqli_query($mysqli, $user_check_query);
  $user = mysqli_num_rows($result);

  if ($user >= 1) { // if user exists

      array_push($errors, "Username already exists");


}
//include('error.php');
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password_1 = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (email_y,username,  password)
  			  VALUES('$email','$username',  '$password_1')";
mysqli_query($mysqli, $query);
  	//if (mysqli_query($mysqli, $query)) {
      //echo "New record created successfully";

  //}
  	//$_SESSION['username'] = $username;
  	//$_SESSION['success'] = "You are now logged in";
  	//header('location: index.php');
  }
}

// ...
