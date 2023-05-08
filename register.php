<!DOCTYPE html>
<html>
<head>
  <title>Student Application</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Student Application</h1>

  <?php
    // Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";

    $conn = new mysqli($servername, $username, $password, $dbname,3306);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Get all rows from "users" table
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    // Display table of results
    if ($result->num_rows > 0) {
      echo "<table>";
      echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Phone</th><th>Action</th></tr>";
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["age"] . "</td><td>" . $row["phone"] . "</td>";
        echo "<td><form method='post' action='process1.php'><input type='hidden' name='id' value='" . $row["id"] . "'><input type='submit' name='accept' value='Accept'></form>";
        echo "<form method='post' action='reject.php'><input type='hidden' name='id' value='" . $row["id"] . "'><input type='submit' name='reject' value='Reject'></form></td></tr>";
      }
      echo "</table>";
    } else {
      echo "No results";
    }

    // Close connection
    $conn->close();
  ?>

</body>
</html>
