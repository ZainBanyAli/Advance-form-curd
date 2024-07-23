<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function validateForm() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address.');
                return false;
            }

            if (password.length < 8) {
                alert('Password must be at least 8 characters long.');
                return false;
            }

            return true;
        }
    </script>
 
</head>
<body>
    
    <div class="container  col-5">
    <div class="row">
    <div class="col-12">
        <h2 class="mt-5">Login</h2>
        <form action="login_sql.php" method="post">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary"><a href="welcome.php"> </a>Login</button>
        </form>
    </div>
</body>
</html>
