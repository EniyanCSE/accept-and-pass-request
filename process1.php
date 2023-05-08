<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname, 3306);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if accept button was pressed
if(isset($_POST['accept'])) {
  $id = $_POST['id'];
  
  // Get row from "users" table by ID
  $sql = "SELECT * FROM users WHERE id=$id";
  $result = $conn->query($sql);
  
  // Insert row into "tmstudent" table
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row["name"];
    $age = $row["age"];
    $phone = $row["phone"];
    $sql = "INSERT INTO tmstudent (name, age, phone) VALUES ('$name', $age, '$phone')";
    $sql2 = "DELETE FROM users WHERE id='$id';";

    if ($conn->query($sql) === TRUE && ($conn->query($sql2) === TRUE)) {
      echo "Record inserted successfully";
    } else {
      echo "Error inserting record: " . $conn->error;
    }
  } else {
    echo "No results";
  }
}

// Close connection
$conn->close();
?>
