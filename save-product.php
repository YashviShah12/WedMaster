<?php
$host = 'localhost';
$db   = 'my';
$user = 'root';
$pass = 'root';
$port = 8889;

$conn = new mysqli($host, $user, $pass, $db, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name     = $_POST['name'] ?? '';
    $price    = $_POST['price'] ?? '';
    $desc     = $_POST['desc'] ?? '';
    $category = $_POST['category'] ?? '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imgName   = basename($_FILES['image']['name']);
        $imgTmp    = $_FILES['image']['tmp_name'];
        $imgFolder = 'uploads/';
        $imgPath   = $imgFolder . $imgName;

        if (!is_dir($imgFolder)) {
            mkdir($imgFolder, 0777, true);
        }

        if (move_uploaded_file($imgTmp, $imgPath)) {
            $stmt = $conn->prepare("INSERT INTO products (name, price, description, category, image) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sdsss", $name, $price, $desc, $category, $imgPath);
            $stmt->execute();

            
// Optional: redirect back
header("Location: all-products.php");
            $stmt->close();
        } else {
            echo "❌ Failed to upload image.";
        }
    } else {
        echo "⚠️ No image uploaded or error occurred.";
    }
}

$conn->close();
?>
