<?php
// Database Connection
$conn = new mysqli("localhost", "root", "", "users_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Secure password

// Insert into database
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
if ($conn->query($sql) === TRUE) {
    echo "Registration successful! <a href='login.html'>Login here</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
