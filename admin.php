<?php
include "dbConnect.php";

session_start();
$username = $password = '';
$username_err = $password_err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Your login validation code here
}

$query = "SELECT * FROM `appointments` WHERE `approved` = 0";
$result = mysqli_query($conn, $query);

if ($result) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your header content here -->
</head>
<body>
    
<div class="container">
    <h2>Appointments for Approval</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Pet Name</th>
                <th>Pet Owner Name</th>
                <th>Service Type</th>
                <th>Preferred Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['pet_name'] . "</td>";
                echo "<td>" . $row['pet_owner_name'] . "</td>";
                echo "<td>" . $row['appointment_type'] . "</td>";
                echo "<td>" . $row['preferred_date'] . "</td>";
                echo "<td>
                        <a href='approve.php?id=" . $row['id'] . "'>Approve</a> |
                        <form method='post' action='delete.php'>
                            <input type='hidden' name='appointment_id' value='" . $row['id'] . "'>
                            <button type='submit' name='delete' class='btn btn-link'>Delete</button>
                        </form>
                    </td>"; // Link to approve.php with appointment ID
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Other HTML content -->

</body>
</html>

<?php
} else {
    echo "Error fetching appointments: " . mysqli_error($conn);
}
?>
