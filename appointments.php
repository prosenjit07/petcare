<?php

$appointment_type = $_GET["type"];

include "dbConnect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $pet_name = mysqli_real_escape_string($conn, $_POST["pet_name"]);
  $pet_owner_name = mysqli_real_escape_string($conn, $_POST["pet_owner_name"]);
  //new type add
  $pet_type = mysqli_real_escape_string($conn, $_POST["pet_type"]);
  $phone_number = mysqli_real_escape_string($conn, $_POST["phone_number"]);
  $preffered_date = mysqli_real_escape_string($conn, $_POST["preffered_date"]);


  $appointment_type = $_POST["service_type"];

  $query = "INSERT INTO `appointments` (`pet_name`, `pet_owner_name`, pet_type`,  `phone_number`, `appointment_type`, `preferred_date`) VALUES ( '$pet_name', '$pet_owner_name', '$phone_number', '$appointment_type', '$preffered_date')";
  $result = mysqli_query($conn, $query);
  if ($result) {
    echo '<div class="alert alert-success my-4" role="alert">
        Your Form Has been submitted! We will contact you shortly
      </div>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Appointment</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/logstyle.css">

</head>

<body>
<style>
    body {
      background-color: rgb(200,200,200);
    }
  </style>
</head>

  <div id="log" class="container">

    <form action="appointments.php?type=<?php echo $appointment_type; ?>" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Service Type</label>
        <select name="service_type" class="form-select" aria-label="Default select example">
          <option selected><?php echo $appointment_type; ?></option>
          <option value="Grooming">Grooming </option>
          <option value="Showering">Showering</option>
          <option value="Neuter/Spay">Neuter/Spay</option>
          <option value="Nail Clipping">Nail Clipping</option>
          <option value="Vaccination">Vaccination</option>
          <option value="Vet Consultation">Vet Consultation</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Your Name</label>
        <input required name="pet_owner_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Pet Name</label>
        <input required name="pet_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Pet Type</label>
        <input required name="pet_type" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Phone Number</label>
        <input required name="phone_number" type="tel" class="form-control" id="exampleInputPassword1" patter="[0-9]{3}-[0-9]{3}-[0-9]{4}">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Appointment Date</label>
        <input required name="preffered_date" type="datetime-local" class="form-control" id="Test_DatetimeLocal">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br><br>
  </div>

  <script src="css/bootstrap.min.css"></script>
  <script src="css/style.css"></script>

</body>

</html>