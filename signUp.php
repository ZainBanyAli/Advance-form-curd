

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function validateForm() {
           
            var email = document.getElementById('email').value;
            var mobile = document.getElementById('mobile').value;
            var firstName = document.getElementById('first_name').value;
            var middleName = document.getElementById('middle_name').value;
            var lastName = document.getElementById('last_name').value;
            var familyName = document.getElementById('family_name').value;
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm_password').value;

            
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address.');
                return false;
            }

            var mobilePattern = /^\d{10}$/;
            if (!mobilePattern.test(mobile)) {
                alert('Please enter a valid 10-digit mobile number.');
                return false;
            }

            if (firstName.trim() === '' || middleName.trim() === '' || lastName.trim() === '' || familyName.trim() === '') {
                alert('Please fill in all the name fields.');
                return false;
            }

            if (password.length < 8) {
                alert('Password must be at least 8 characters long.');
                return false;
            }

            if (password !== confirmPassword) {
                alert('Passwords do not match.');
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


        <h2 class="mt-2 ">Sign Up</h2>
        <form action="signUP_sql.php" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="text" class="form-control" id="mobile" name="mobile" pattern="\d{10}" required>
            </div>

             <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="middle_name">Middle Name:</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="family_name">Family Name:</label>
                        <input type="text" class="form-control" id="family_name" name="family_name" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <div class="form-group">
                    <label for="image">Profile Picture:</label>
    <!-- <input type="file" name="image" id="image" required> -->
    </div>
            <button type="submit" class="btn btn-primary">Sign Up</button><br>


            </div>
    </div>
    </div>
        </form>
    </div>
</body>
</html>


