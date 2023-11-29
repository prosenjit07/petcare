<?php
session_start();
include 'dbConnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['userSno']) && isset($_POST['rescueId'])) {
    $userSno = $_SESSION['userSno'];
    $rescueId = $_POST['rescueId'];

    $query = "INSERT INTO adoption_request (userSno, rescuedId) VALUES ('$userSno', '$rescueId')";

    if (mysqli_query($conn, $query)) {
        echo "Adoption request submitted successfully.";
    } else {
        echo "Error in submitting request: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Invalid request or session information not found.";
}
