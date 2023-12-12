<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'loginsystemnp');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['user']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['pass1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['pass2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "तपाईले नाम प्रविस्ट गर्नुभएन।"); }
  if (empty($email)) { array_push($errors, "तपाईले इमेल प्रविस्ट गर्नुभएन।            "); }
  if (empty($password_1)) { array_push($errors, "तपाईले पासवर्ड प्रविस्ट गर्नुभएन।"); }
  if ($password_1 != $password_2) {
  array_push($errors, "पासवर्ड र पुन: पासवर्ड मिलेन।");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM userslogindata WHERE username='$username' AND email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "यो प्रयोगकर्ता नाम पहिले नै लिइसकिएको छ। कृपया अर्को नाम राख्नुहोला।");
    }

    if ($user['email'] === $email) {
      array_push($errors, "यो इमेल पहिले नै लिइसकिएको छ। कृपया अर्को इमेल राख्नुहोला।");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO userslogindata (username, password, email) VALUES('$username', '$password', '$email')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: login.php');
  }
}

//login
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['user']);
  $password = mysqli_real_escape_string($db, $_POST['pass']);

  if (empty($username)) {
  	array_push($errors, "प्रयोगकर्ता नाम आवश्यक छ।");
  }
  if (empty($password)) {
  	array_push($errors, "पासवर्ड आवश्यक छ।");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM userslogindata WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: home.php');
  	}else {
  		array_push($errors, "प्रयोगकर्ता नाम वा पासवर्ड मिलेन।");
  	}
  }
}
?>