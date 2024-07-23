<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "advanced_task";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
require_once __DIR__ . '/advanced_task.php';

if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        $imgData = file_get_contents($_FILES['userImage']['tmp_name']);
        $imgType = $_FILES['userImage']['type'];
        $sql = "INSERT INTO tbl_image (imageType, imageData) VALUES (?, ?)";
        $statement = $conn->prepare($sql);
        $null = NULL; // to bind the blob
        $statement->bind_param('sb', $imgType, $null);
        $statement->send_long_data(1, $imgData);
        $current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Image to MySQL BLOB</title>
    <link href="css/form.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <style>
        .image-gallery {
            text-align: center;
        }
        .image-gallery img {
            padding: 3px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
            border: 1px solid #FFFFFF;
            border-radius: 4px;
            margin: 20px;
        }
    </style>
</head>
<body>
    <form name="frmImage" enctype="multipart/form-data" action="" method="post">
        <div class="phppot-container tile-container">
            <label>Upload Image File:</label>
            <div class="row">
                <input name="userImage" type="file" class="full-width" />
            </div>
            <div class="row">
                <input type="submit" value="Submit" />
            </div>
        </div>
        <div class="image-gallery">
            <?php require_once __DIR__ . '/listImages.php'; ?>
        </div>
    </form>
</body>
</html>

<?php
require_once __DIR__ . '/advanced_task.php';

$sql = "SELECT imageType, imageData FROM tbl_image ORDER BY id DESC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo '<img src="data:' . $row["imageType"] . ';base64,' . base64_encode($row["imageData"]) . '" />';
}
?>
