
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "advanced_task";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $email = $_POST['email'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $first_name = $_POST['first_name'] ?? '';
    $middle_name = $_POST['middle_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $family_name = $_POST['family_name'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $image = $_POST['image'] ?? '';



if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image = file_get_contents($_FILES['image']['tmp_name']);
} else {
    die("Image upload error.");
}


        echo "Email: $email<br>";
        echo "Mobile: $mobile<br>";
        echo "First Name: $first_name<br>";
        echo "Middle Name: $middle_name<br>";
        echo "Last Name: $last_name<br>";
        echo "Family Name: $family_name<br>";
        echo "Password: $password<br>";
        echo "Confirm Password: $confirm_password<br>";


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    if (!preg_match('/^\d{10}$/', $mobile)) {
        die("Invalid mobile number");
    }

    if ($password !== $confirm_password) {
        die("Passwords do not match");
    }

    

    $role_id = 1;

    $sql = "INSERT INTO users (first_name, middle_name, last_name, family_name, email, mobile, password, confirm_password,role_id) 
            VALUES ('$first_name','$middle_name','$last_name','$family_name','$email','$mobile','$password','$confirm_password' ,$role_id)";


    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "advanced_task";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else echo "done";


if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        $imgData = file_get_contents($_FILES['userImage']['tmp_name']);
        $imgType = $_FILES['userImage']['type'];
        $sql = "INSERT INTO tbl_image(imageType ,imageData) VALUES(?, ?)";
        $statement = $conn->prepare($sql);
        $statement->bind_param('ss', $imgType, $imgData);
        $current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());
    }
}
?>
