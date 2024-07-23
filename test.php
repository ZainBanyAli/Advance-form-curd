<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container col-5">
        <div class="row">
            <div class="col-12">
                <h2 class="mt-5">Login</h2>
                <form action="test2.php" method="post">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

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

