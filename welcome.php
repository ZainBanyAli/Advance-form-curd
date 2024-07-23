


<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: welcome.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Welcome, <?php echo $_SESSION['first_name']; ?>!</h1>
        <p>Your email: <?php echo $_SESSION['email']; ?></p>
    </div>
</body>
</html>
