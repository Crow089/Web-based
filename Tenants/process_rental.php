<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tenants.db";

// Establish the database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $idno = $_POST["id"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $age = $_POST["age"];
    $daterented = $_POST["rental_date"];

    $query = "INSERT INTO info (idno, firstname, lastname, age, daterented) 
              VALUES ('$idno', '$firstname', '$lastname', '$age', '$daterented')";

    if ($conn->query($query) === TRUE) {

        session_start();
        $_SESSION['success_message'] = "Record added successfully";
        header("Location: profile.php"); 
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>
