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

  // Get ID of student to be rejected
  $id = $_POST['id'];

  // Delete row from "users" table with matching ID
  $sql = "DELETE FROM users WHERE id='$id'";
  $result = $conn->query($sql);

  // Check if delete was successful
  if ($result) {
    echo "Student rejected successfully";
  } else {
    echo "Error rejecting student: " . $conn->error;
  }

  // Close connection
  $conn->close();
?>
