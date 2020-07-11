<?php
  include('errors.php');
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database

DEFINE('DB_USERNAME', 'root');
DEFINE('DB_PASSWORD', 'root');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_DATABASE', 'registration');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_error()) {
  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}



// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  echo $Username =  $_POST['Username'];
  echo $Email =  $_POST['Email'];
  echo $password_1 = $_POST['password_1'];
  echo $password_2 =$_POST['password_2'];
  echo $Phone_Number=$_POST['Phone_Number'];
  echo $Interest=$_POST['Interest'];
  echo $City=$_POST['City'];
  echo $Mailing_Address=$_POST['Mailing_Address'];
  echo $Instagram_Account=$_POST['Instagram_Account'];
  echo $Facebook_Account=$_POST['Facebook_Account'];
  echo $Twitter_Account=$_POST['Twitter_Account'];
  echo $Youtube_Account=$_POST['Youtube_Account'];
  //echo $Password=$_POST['password_1'];


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

  /*if (empty($Username)) { array_push($errors, "Username is required"); }
  if (empty($Email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
*/
  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  /*$user_check_query = "SELECT * FROM Influncer WHERE Username='$Username' OR Email='$Email' LIMIT 1";
  $result = mysqli_query($mysqli, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['Username'] === $Username) {
      echo "error";
      array_push($errors, "Username already exists");
    }

    if ($user['Email'] === $Email) {
      echo "erreo";
      array_push($errors, "email already exists");

    }
  }
*/
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
      $password = md5($password_1);//encrypt the password before saving in the database
      //$Phone_Number=md5($Phone_Number);
      //$City=md5($City);
      $Email=md5($Email);


     /* $query = "INSERT INTO users (username)
      VALUES('$Username')";
if (mysqli_query($mysqli, $query)) {
echo "New record created successfully";*/

}

$query = "INSERT INTO Influncer (Username,  Email ,Instagram_Account,Mailing_Address,Facebook_Account,Youtube_Account,City,Phone_Number,Interest,Twitter_Account)
VALUES('$Username', '$Email','$Instagram_Account','$Mailing_Address','$Facebook_Account','$Youtube_Account','$City','$Phone_Number','$Interest','$Twitter_Account')";

          if (mysqli_query($mysqli, $query)) {
              echo "New record created successfully";

          }

  	//$_SESSION['Username'] = $Username;
  	//$_SESSION['success'] = "You are now logged in";
  	//header('location: index.php');
  }


// ...
