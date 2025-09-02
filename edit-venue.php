<?php
$host = 'localhost';
$db   = 'my';
$user = 'root';
$pass = 'root';
$port = 8889;

$conn = new mysqli($host, $user, $pass, $db, $port);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$id = intval($_GET['id']);
$venue = $conn->query("SELECT * FROM wedding_venues WHERE id = $id")->fetch_assoc();
$categories = $conn->query("SELECT * FROM venue_categories");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name        = $_POST['name'];
    $location    = $_POST['location'];
    $description = $_POST['description'];
    $category_id = intval($_POST['category_id']);
    
    // Keep the existing image path by default
    $imagePath = $venue['image'];

    // Handle file upload if a new image was provided
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $originalName = basename($_FILES["image"]["name"]);
        $sanitized = preg_replace("/[^a-zA-Z0-9\._-]/", "_", $originalName);
        $filename = uniqid() . "_" . $sanitized;
        $targetFile = $uploadDir . $filename;

        // Check if the file is an actual image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            die("❌ File is not an image.");
        }

        // Check file size (limit to 5MB)
        if ($_FILES["image"]["size"] > 5000000) {
            die("❌ Sorry, your file is too large (max 5MB).");
        }

        // Allow certain file formats
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (!in_array($imageFileType, $allowedExtensions)) {
            die("❌ Only JPG, JPEG, PNG & GIF files are allowed.");
        }

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Delete old image if it exists and is not the default placeholder
            if (!empty($venue['image']) && file_exists($venue['image']) && 
                strpos($venue['image'], 'placeholder') === false) {
                unlink($venue['image']);
            }
            $imagePath = $targetFile;
        } else {
            die("❌ Sorry, there was an error uploading your file.");
        }
    }

    $stmt = $conn->prepare("UPDATE wedding_venues SET name=?, location=?, description=?, image=?, category_id=? WHERE id=?");
    $stmt->bind_param("ssssii", $name, $location, $description, $imagePath, $category_id, $id);
    
    if ($stmt->execute()) {
        header("Location: show-venue.php?updated=1");
        exit();
    } else {
        die("Error updating record: " . $conn->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Edit Wedding Venue</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Segoe UI', sans-serif; background: #f4f7f9; display: flex; height: 100vh; }
    .sidebar {
      width: 220px; background: #2c3e50; color: #ecf0f1;
      padding: 30px 20px; display: flex; flex-direction: column;
    }
    .sidebar h2 { font-size: 22px; margin-bottom: 30px; text-align: center; }
    .sidebar a {
      color: #ecf0f1; text-decoration: none; margin: 10px 0;
      padding: 10px 15px; border-radius: 5px; transition: background 0.3s;
    }
    .sidebar a:hover { background: #34495e; }
    .main { flex: 1; display: flex; flex-direction: column; }
    .topbar {
      background: #fff; padding: 15px 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
      display: flex; justify-content: space-between; align-items: center;
    }
    .content {
      padding: 30px; max-width: 800px; margin: 0 auto;
    }
    .content h2 {
      text-align: center; margin-bottom: 20px;
      font-size: 26px; color: #2c3e50;
    }
    input, textarea, select {
      width: 100%; padding: 12px; margin-bottom: 20px;
      border: 1px solid #ccc; border-radius: 6px; font-size: 16px;
    }
    button {
      width: 100%; padding: 12px; background: #27ae60;
      color: #fff; border: none; font-size: 18px;
      border-radius: 6px; cursor: pointer;
    }
    button:hover { background: #219150; }
    img.preview { max-width: 200px; margin-bottom: 15px; border-radius: 8px; }
    .file-upload-info {
      display: block;
      margin-top: -15px;
      margin-bottom: 15px;
      font-size: 14px;
      color: #666;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="add-venue.php">Add Venue</a>
    <a href="show-venue.php">Show Venues</a>
    <a href="logout.php">Logout</a>
  </div>

  <div class="main">
    <div class="topbar">
      <h1>Edit Wedding Venue</h1>
      <div>Welcome, Admin</div>
    </div>

    <div class="content">
      <h2>✏️ Update Venue Info</h2>
      <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" value="<?= htmlspecialchars($venue['name']) ?>" placeholder="Venue Name" required />
        <input type="text" name="location" value="<?= htmlspecialchars($venue['location']) ?>" placeholder="Location" required />
        <textarea name="description" rows="4" placeholder="Description" required><?= htmlspecialchars($venue['description']) ?></textarea>

        <?php if ($venue['image']): ?>
          <img src="<?= $venue['image'] ?>" class="preview" alt="Venue Image" />
          <span class="file-upload-info">Current image: <?= basename($venue['image']) ?></span>
        <?php endif; ?>
        <input type="file" name="image" accept="image/*" />
        <span class="file-upload-info">Leave blank to keep current image</span>

        <select name="category_id" required>
          <option value="">Select Category</option>
          <?php while($row = $categories->fetch_assoc()): ?>
            <option value="<?= $row['id'] ?>" <?= $row['id'] == $venue['category_id'] ? 'selected' : '' ?>>
              <?= htmlspecialchars($row['name']) ?>
            </option>
          <?php endwhile; ?>
        </select>

        <div style="text-align: right; margin-top: -10px; margin-bottom: 20px;">
          <a href="manage-venue-categories.php" style="font-size: 14px; color: #2980b9; text-decoration: none;">➕ Manage Categories</a>
        </div>

        <button type="submit">✅ Update Venue</button>
      </form>
    </div>
  </div>
</body>
</html>