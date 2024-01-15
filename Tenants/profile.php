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

// Function to delete a record based on ID
function deleteRecord($conn, $id) {
  $id = mysqli_real_escape_string($conn, $id); // Sanitize input to prevent SQL injection

  $query = "DELETE FROM info WHERE idno = '$id'";

  if ($conn->query($query) === TRUE) {
      // Set a success message
      $_SESSION['success_message'] = "Record deleted successfully";
  } else {
      $_SESSION['error_message'] = "Error: " . $query . "<br>" . $conn->error;
  }
}

// Rest of your PHP code
?>

<?php
// ... (Your existing code)

// Function to search a record based on ID
function searchRecord($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id); // Sanitize input to prevent SQL injection

    $query = "SELECT * FROM info WHERE idno = '$id'";
    $result = $conn->query($query);

    return $result->fetch_assoc();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-actual-hash" crossorigin="anonymous" />
  <link rel="stylesheet" href="profile.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-some-hash>" crossorigin="anonymous" />

</head>
<body>
  <div class="container">
    <nav>
      <ul>

        <li><a href="#" class="logo">
          <span class="nav-item">DashBoard</span>

        </a></li>
        <li><a href="dashboard.php">
          <i class="fas fa-home"></i>
          <span class="nav-item">Home</span>
        </a></li>
  

        <li><a href="profile.php">
          <i class="fas fa-chart-bar"></i>
          <span class="nav-item">Tenant Profile</span>
        </a></li>

        <li><a href="bills.php">
          <i class="fas fa-tasks"></i>
          <span class="nav-item">Utility Bills</span>
        </a></li>

        <li><a href="sms.html">
            <i class="fas fa-cog"></i>
            <span class="nav-item">SMS Configuration</span>
          </a></li>

          <li><a href="message.html">
            <i class="fas fa-question-circle"></i>
            <span class="nav-item">Help</span>
          </a></li>

        <li><a href="" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>

    <section class="main">
      <div class="main-top">
        <h1>TENANTS PROFILE</h1>
      </div>

      <div class="mt-5">
        <form method="POST" action="process_rental.php">
          <div class="form-group">
            <label for="id">IDNo:</label>
            <input style = " position: relative;  left: 56px; border: 2px solid black; border-radius: 20px; padding: 3px; width: 300px; margin-top: 10px;"  
            type="text" class="form-control" id="id" name="id" required>
          </div>
          <div class="form-group">
            <label for="firstname">First Name:</label>
            <input style =" position: relative;  left: 10px; border: 2px solid black; border-radius: 20px; padding: 3px; width: 300px;  margin-top: 10px;"
            type="text" class="form-control" id="firstname" name="firstname" required>
          </div>
          <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input style ="position: relative;  left: 10px; border: 2px solid black; border-radius: 20px; padding: 3px; width: 300px;  margin-top: 10px;"
            type="text" class="form-control" id="lastname" name="lastname" required>
          </div>
          <div class="form-group">
            <label for="age">Age:</label>
            <input style ="position: relative;  left: 65px; border: 2px solid black; border-radius: 20px; padding: 3px; width: 300px;  margin-top: 10px;"
            type="number" class="form-control" id="age" name="age" required>
          </div>
          <div class="form-group">
            <label for="rental_date">Date of Rent:</label>
            <input style ="border: 2px solid black; border-radius: 20px; padding: 3px; width: 300px;  margin-top: 10px;"
            type="text" class="form-control" id="rental_date" name="rental_date" required>
          </div>
          <button style ="border: 2px solid black; padding: 10px; border-radius: 20px; width: 100px; cursor: pointer; margin-left: 110px; margin-top: 10px;"
          type="submit" class="btn-primary">Submit</button>
        </form>
      </div>

      <form method="POST" action="delete_record.php">
                <div class="form-group">
                    <label for="delete_id">ID to delete:</label>
                    <input style ="position: relative; left: 10px; border: 2px solid black; border-radius: 20px; padding: 3px; width: 300px;  margin-top: 10px;"
                    type="text" class="form-control" id="delete_id" name="delete_id" required>
                </div>
                <button style ="display: flex; border: 2px solid black; padding: 10px; border-radius: 20px; cursor: pointer; margin-left: 110px; margin-top: 10px;" 
                type="submit" class="btn btn-danger" name="delete">Delete Record</button>
            </form>

      <div class="mt-5">
        <h2 style="position: absolute; top: 10px; left: 700px;">All Records</h2>
        <?php

$result = $conn->query("SELECT * FROM info");

if ($result->num_rows > 0) {
    echo '<div class="table-responsive">
            <table class="table" style="border: 2px solid black;  position: absolute; top: 60px; right: -130px; ">
                <thead class="thead-dark">
                    <tr>
                        <th style="border: 2px solid black; padding: 10px; background-color: gray;">ID</th>
                        <th style="border: 2px solid black; padding: 10px; background-color: gray;">First Name</th>
                        <th style="border: 2px solid black; padding: 10px; background-color: gray;">Last Name</th>
                        <th style="border: 2px solid black; padding: 10px; background-color: gray;">Age</th>
                        <th style="border: 2px solid black; padding: 10px; background-color: gray;  ">Date of Rent</th>
                    </tr>
                </thead>
                <tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td  style="border: 2px solid black; padding: 10px; background-color: #bcc6d4; cursor: pointer;">' . $row["idno"] . '</td>
                <td  style="border: 2px solid black; padding: 10px; background-color: #bcc6d4; cursor: pointer;">' . $row["firstname"] . '</td>
                <td  style="border: 2px solid black; padding: 10px; background-color: #bcc6d4; cursor: pointer;">' . $row["lastname"] . '</td>
                <td  style="border: 2px solid black; padding: 10px; background-color: #bcc6d4; cursor: pointer;">' . $row["age"] . '</td>
                <td  style="border: 2px solid black; padding: 10px; background-color: #bcc6d4; cursor: pointer;">' . $row["daterented"] . '</td>
              </tr>';
    }

    echo '</tbody>
        </table>
      </div>';
} else {
    echo '<div class="alert alert-info" role="alert">
            No records found
          </div>';
}
?>
</div>
<!-- Form for delete action -->

    </section>
</div>  
</html>
