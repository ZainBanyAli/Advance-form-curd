<?php

include "connent.php"; 

$email = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['email'] = $row['email'];

        $_SESSION['role_id'] = $row['role_id'];
        if ($row['role_id'] == '2') {
            header("Location: admin.php");
        } else {
            header("Location: welcome.php");
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
