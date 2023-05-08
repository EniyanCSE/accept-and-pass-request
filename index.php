<!DOCTYPE html>
<html>
  <head>
    <title>Registration Form</title>
  </head>
  <body>
    <h1>Registration Form</h1>
    <form action="process.php" method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name"><br><br>
      <label for="age">Age:</label>
      <input type="number" id="age" name="age"><br><br>
      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone"><br><br>
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
