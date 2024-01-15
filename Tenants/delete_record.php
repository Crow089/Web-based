<?php
// Your existing database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tenants.db";

// Establish the database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to delete a record based on ID
function deleteRecord($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id); // Sanitize input to prevent SQL injection

    $query = "DELETE FROM info WHERE idno = '$id'";

    if ($conn->query($query) === TRUE) {
        // Set a success message
        session_start();
        $_SESSION['success_message'] = "Record deleted successfully";
    } else {
        $_SESSION['error_message'] = "Error: " . $query . "<br>" . $conn->error;
    }
}

// Check if delete button is clicked
if (isset($_POST['delete'])) {
    $idToDelete = $_POST['delete_id'];
    deleteRecord($conn, $idToDelete);
    header("Location: profile.php"); // Redirect back to the profile page
    exit();
}
?>
