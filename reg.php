<?php
include "dbConnect.php";

$email_error = false;
$password_error = false;

$valid_email = false;
$correct_passowrd = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);
  $confirmed_password = mysqli_real_escape_string($conn, $_POST["confirm_password"]);


  // checks whether the given email is already used or not, email addresses need to be unique for register
  $match_email_query = "SELECT * FROM `users` WHERE email='$email'";
  $result = mysqli_query($conn, $match_email_query);
  $matchedNumber = mysqli_num_rows($result);

  if ($matchedNumber > 0) {
    $email_error = true;
  } else {
    $valid_email = true;
  }

  if ($password !== $confirmed_password) {
    $password_error = true;
  } else {
    $correct_passowrd = true;
  }


  $correct_credentials = $valid_email && $correct_passowrd;


  if ($correct_credentials) {
    $query = "INSERT INTO `users` (`email`, `password`) VALUES ('$email', '$password')";
    $result = mysqli_query($conn, $query);
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    echo "Creating your account...";
    header("location: login.php");
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
              Email Already Exists! Try a different one.
            </div>';
    } else if ($password_error) {
      echo '<div class="alert alert-danger" role="alert">
              Password does not match
            </div>';
    }

    ?>

    <form action="reg.php" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input required name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input required name="password" type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
        <input required name="confirm_password" type="password" class="form-control" id="exampleInputPassword1">
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