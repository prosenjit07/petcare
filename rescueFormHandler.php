<?php
session_start();
?>

<?php
include 'dbConnect.php'; // Make sure this path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extracting and sanitizing input
    $rescuer_name = mysqli_real_escape_string($conn, $_POST['rescuerName']);
    $animal_type = mysqli_real_escape_string($conn, $_POST['animalType']);
    $found_area = mysqli_real_escape_string($conn, $_POST['foundArea']);
    $additional_info = mysqli_real_escape_string($conn, $_POST['additionalInfo']);

    // Image upload logic
    if (isset($_FILES['animalImage']) && $_FILES['animalImage']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['animalImage']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);
        if (in_array($filetype, $allowed)) {
            // Ensure a unique filename
            $newFilename = uniqid() . '.' . $filetype;
            // Specify the path for saving
            $uploadPath = 'uploads/' . $newFilename;
            if (move_uploaded_file($_FILES['animalImage']['tmp_name'], $uploadPath)) {
                $imagePath = $uploadPath;
            } else {
                // Handle failure
                echo "Failed to upload image.";
                exit;
            }
        } else {
            // Invalid file type
            echo "Invalid file type.";
            exit;
        }
    } else {
        // No file or error
        $imagePath = 'default/no-image.png'; // Default image or handle appropriately
    }

    // Insert into database with image path
    $query = "INSERT INTO rescue (rescuer_name, animal_type, found_area, additional_info, imagePath, admin_ver) 
          VALUES ('$rescuer_name', '$animal_type', '$found_area', '$additional_info', '$imagePath', 1)";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Rescue request posted successfully.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rescue form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/logstyle.css">
</head>

<body>
    <div id="log" class="container">
        <form action="rescueFormHandler.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="rescuerName" class="form-label">Rescuer's Name</label>
                <input required name="rescuerName" type="text" class="form-control" id="rescuerName">
            </div>
            <div class="mb-3">
                <label for="animalType" class="form-label">Animal Type</label>
                <select required name="animalType" class="form-control" id="animalType">
                    <option value="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="foundArea" class="form-label">Found Area</label>
                <select required name="foundArea" class="form-control" id="foundArea">
                    <option value="Barishal">Barishal</option>
                    <option value="Chattogram">Chattogram</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Rangpur">Rangpur</option>
                    <option value="Mymensingh">Mymensingh</option>
                    <option value="Sylhet">Sylhet</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="additionalInfo" class="form-label">Additional Information</label>
                <textarea required name="additionalInfo" class="form-control" id="additionalInfo" rows="3"></textarea>
            </div>
            <!-- New field for image upload -->
            <div class="mb-3">
                <label for="animalImage" class="form-label">Animal Image</label>
                <input type="file" name="animalImage" id="animalImage" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="js/bootstrap.min.js"></script> <!-- Corrected script source -->
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            <?php if (isset($_SESSION['success'])) : ?>
                alert("<?php echo $_SESSION['success']; ?>");
                window.location.href = 'index.php';
                <?php unset($_SESSION['success']); // Clear the session variable 
                ?>
            <?php endif; ?>
        });
    </script>
</body>

</html>