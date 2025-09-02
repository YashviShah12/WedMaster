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

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $location = $conn->real_escape_string($_POST['location']);
    $description = $conn->real_escape_string($_POST['description']);
    $category_id = intval($_POST['category_id']); // use the ID instead of name

    // Handle Image Upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image_name = time() . '_' . basename($_FILES["image"]["name"]);
        $target_dir = "uploads/";
        $target_file = $target_dir . $image_name;

        // Move uploaded file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $stmt = $conn->prepare("INSERT INTO wedding_venues (name, location, description, image, category_id) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $name, $location, $description, $image_name, $category_id);

            $stmt->execute();
            $stmt->close();
            header("Location: show-venue.php");
            exit();
        } else {
            echo "❌ Error uploading image.";
        }
    } else {
        echo "⚠️ No image uploaded or an error occurred.";
    }
}
?>
