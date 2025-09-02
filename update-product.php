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

$id    = $_POST['id'];
$name  = $_POST['name'];
$price = $_POST['price'];
$desc  = $_POST['desc'];
$cat   = $_POST['category'];

$imagePath = null;

// Get current image from DB
$stmt = $conn->prepare("SELECT image FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$current = $result->fetch_assoc();
$stmt->close();

if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    // Handle new image upload
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
    
    $filename = uniqid() . "_" . basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . $filename;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $imagePath = $targetFile;
    } else {
        echo "❌ Image upload failed.";
        exit;
    }
} else {
    $imagePath = $current['image']; // Keep old image
}

// Update product
$stmt = $conn->prepare("UPDATE products SET name = ?, price = ?, description = ?, image = ?, category = ? WHERE id = ?");
$stmt->bind_param("sdsssi", $name, $price, $desc, $imagePath, $cat, $id);

if ($stmt->execute()) {
    header("Location: all-products.php?updated=1");
} else {
    echo "❌ Error updating product: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
