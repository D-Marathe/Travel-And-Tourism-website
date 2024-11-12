<?php
session_start();

$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "book_db";

// Create connection
$conn = new mysqli('localhost', 'root', '', 'book_db');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM user_form WHERE email='$email'";
$result = $conn->query($sql);

$sql = "SELECT * FROM user_form WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
      if($row['email']===$email && $row['password']===$password)
      {
          echo "Login successful!";
          header("location:home.php");
      } else {
          echo "Incorrect password!";
      }
  }
} else {
  echo "User not found!";
}
$conn->close();
?>
