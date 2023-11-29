<?php
include "dbConnect.php";

$email_error = '';
$password_error = '';

$valid_email = '';
$correct_passowrd = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $given_email = mysqli_real_escape_string($conn, $_POST["email"]);
  $given_password = mysqli_real_escape_string($conn, $_POST["password"]);

  $match_email_query = "SELECT * FROM `users` WHERE email='$given_email'";
  $result = mysqli_query($conn, $match_email_query);
  $matchedNumber = mysqli_num_rows($result);


  if ($matchedNumber == 1) {
    $valid_email = true;
  } else {
    $email_error = true;
  }

  $row = mysqli_fetch_assoc($result);
  $actual_password = $row['password'];

  if ($given_password == $actual_password) {
    $correct_passowrd = true;
  } else {
    $password_error = true;
  }


  $correct_credentials = $valid_email && $correct_passowrd;

  if ($correct_credentials) {
    echo "congrats you're logged in";
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['userSno'] = $row['sno'];
    header("location: index.php");
    return;
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/logstyle.css">

</head>

<body>
  <div id="log" class="container">

    <?php

    if ($email_error) {
      echo '<div class="alert alert-danger" role="alert">
              Email Does not Exist
            </div>';
    } else if ($password_error) {
      echo '<div class="alert alert-danger" role="alert">
              Password does not match
            </div>';
    }

    ?>
    <form action='login.php' method='post'>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input required name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input required name="password" type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">save password</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>





  <script src="css/bootstrap.min.css"></script>
  <script src="css/style.css"></script>

</body>

</html>