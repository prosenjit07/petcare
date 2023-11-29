<?php
include 'dbConnect.php'; // Make sure this path is correct

$animalType = isset($_GET['animalType']) ? $_GET['animalType'] : 'All';
$foundArea = isset($_GET['foundArea']) ? $_GET['foundArea'] : 'All';

echo '<div style="border: 1px solid #000; text-align: center; background-color: #FFA500; color: #FFF; padding: 10px; margin: 10px;">';
echo '<a href="index.php" style="text-decoration: none; color: #FFF;">Home</a>';
echo '</div>';

echo '<div style="display: flex;  margin: 30px;">'; // Horizontal layout
echo '<div>'; // Left side for Animal Type
echo '<form method="get" class="mb-4">';
echo '<label for="animalType">Animal Type: </label>';
echo '<select id="animalType" name="animalType" onchange="this.form.submit()" class="form-select">';
echo '<option value="All"' . ($animalType == 'All' ? ' selected' : '') . '>All</option>';
echo '<option value="Dog"' . ($animalType == 'Dog' ? ' selected' : '') . '>Dogs</option>';
echo '<option value="Cat"' . ($animalType == 'Cat' ? ' selected' : '') . '>Cats</option>';
echo '<option value="Others"' . ($animalType == 'Others' ? ' selected' : '') . '>Others</option>';
echo '</select>';
echo '</form>';
echo '</div>';

echo '<div>'; // Right side for Found Area
echo '<form method="get" class="mb-4">';
echo '<label for="foundArea">Found Area: </label>';
echo '<select id="foundArea" name="foundArea" onchange="this.form.submit()" class="form-select">';
echo '<option value="All"' . ($foundArea == 'All' ? ' selected' : '') . '>All</option>';
echo '<option value="Barisal"' . ($foundArea == 'Barisal' ? ' selected' : '') . '>Barisal</option>';
echo '<option value="Chattogram"' . ($foundArea == 'Chattogram' ? ' selected' : '') . '>Chattogram</option>';
echo '<option value="Dhaka"' . ($foundArea == 'Dhaka' ? ' selected' : '') . '>Dhaka</option>';
echo '<option value="Khulna"' . ($foundArea == 'Khulna' ? ' selected' : '') . '>Khulna</option>';
echo '<option value="Mymensingh"' . ($foundArea == 'Mymensingh' ? ' selected' : '') . '>Mymensingh</option>';
echo '<option value="Rajshahi"' . ($foundArea == 'Rajshahi' ? ' selected' : '') . '>Rajshahi</option>';
echo '<option value="Rangpur"' . ($foundArea == 'Rangpur' ? ' selected' : '') . '>Rangpur</option>';
echo '<option value="Sylhet"' . ($foundArea == 'Sylhet' ? ' selected' : '') . '>Sylhet</option>';
echo '</select>';
echo '</form>';
echo '</div>';
echo '</div>'; // Close horizontal layout

$sql = "SELECT * FROM `rescue` WHERE admin_ver = 1";

if ($animalType != 'All') {
    $sql .= " AND animal_type = '$animalType'"; // Use AND instead of WHERE
}

if ($foundArea != 'All') {
    $sql .= " AND found_area = '$foundArea'"; // Always use AND, as the first condition is always present
}

$result = mysqli_query($conn, $sql);

echo '<div class="container mt-4">';
echo '<div class="row">';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Use the actual image path from the database, or a default image if not available
        $imageUrl = !empty($row['imagePath']) ? $row['imagePath'] : 'image/default.jpg';

        echo '<div class="col-md-4 mb-4">';
        echo '<div class="card h-100">';
        echo '<img src="' . htmlspecialchars($imageUrl) . '" class="card-img-top" alt="Animal Image">';
        echo '<div class="card-body bg-white">';
        echo '<h5 class="card-title">' . $row['animal_type'] . '</h5>';
        echo '<p class="card-text">Rescuer: ' . $row['rescuer_name'] . '<br>Found in: ' . $row['found_area'] . '</p>';
        echo '<p class="card-text">Details:' . $row['additional_info'] . '</p>';
        // Add the onclick attribute to show the prompt
        echo '<a href="javascript:void(0);" class="btn btn-primary" onclick="showPrompt(' . $row['id'] . ')" data-rescue-id="' . $row['id'] . '">Want to Adopt?</a>';

        echo '</div>'; // Close card-body
        echo '</div>'; // Close card
        echo '</div>'; // Close column
    }
} else {
    echo '<p>No animals found.</p>';
}
echo '</div>'; // Close row
echo '</div>'; // Close container

// Close the database connection if necessary
mysqli_close($conn);
?>

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

<!-- JavaScript for the prompt -->
<script>
    function showPrompt(rescueId) {
        var confirmation = confirm("Your request is in process. Do you want to continue?");
        if (confirmation) {
            // AJAX request to send the rescueId to the PHP script
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "handleAdoptionRequest.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                    window.location.href = 'index.php';
                }
            };
            xhr.send("rescueId=" + rescueId);
        }
    }
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/logstyle.css">
</head>

</html>