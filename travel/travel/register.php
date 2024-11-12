<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "book_db";

$conn = new mysqli('localhost', 'root','', 'book_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form data
$full_name = $_POST['full_name'];
$contact_no = $_POST['contact_no'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO user_form (full_name, contact_no, email, password)
        VALUES ('$full_name', '$contact_no', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful";
    header("location: home.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
