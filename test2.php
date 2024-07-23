<?php
session_start();
include "connent.php"; // Database connection

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Validate user credentials
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['email'] = $row['email'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['role_id'] = $row['role_id'];

        // Redirect based on role_id
        if ($row['role_id'] == '1') {
            header("Location: welcome.php");
        } elseif ($row['role_id'] == '2') {
            header("Location: admin.php");
        }
        exit();
    } else {
        echo "Invalid password";
    }
} else {
    echo "No user found with this email";
}

$conn->close();
?>
