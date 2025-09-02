<?php
// Database connection
$conn = new mysqli("localhost", "root", "root", "my", 8889);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    // Upload image
    $imagePath = "";
    if ($_FILES["image"]["error"] == 0) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
        $imagePath = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO products (name, price, category, image, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $name, $price, $category, $imagePath, $description);

    if ($stmt->execute()) {
        echo "<script>alert('Product added successfully!'); window.location.href='add-product.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Add Product - Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f7f9;
      display: flex;
      height: 100vh;
    }
    .sidebar {
      width: 220px;
      background: #2c3e50;
      color: #ecf0f1;
      padding: 30px 20px;
      display: flex;
      flex-direction: column;
    }
    .sidebar h2 {
      font-size: 22px;
      margin-bottom: 30px;
      text-align: center;
    }
    .sidebar a {
      color: #ecf0f1;
      text-decoration: none;
      margin: 10px 0;
      padding: 10px 15px;
      border-radius: 5px;
      transition: background 0.3s;
    }
    .sidebar a:hover { background: #34495e; }
    .main {
      flex: 1;
      display: flex;
      flex-direction: column;
    }
    .topbar {
      background: #fff;
      padding: 15px 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .topbar h1 {
      font-size: 24px;
      color: #2c3e50;
    }
    .content {
      padding: 30px;
      flex: 1;
    }
    .form-container {
      background: white;
      padding: 30px;
      border-radius: 10px;
      max-width: 500px;
      margin: 0 auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .form-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #2c3e50;
    }
    input, textarea, select {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
    }
    textarea {
      height: 100px;
      resize: vertical;
    }
    button {
      width: 100%;
      padding: 12px;
      background: #27ae60;
      color: #fff;
      border: none;
      font-size: 18px;
      border-radius: 6px;
      cursor: pointer;
    }
    button:hover {
      background: #219150;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: #2c3e50;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="indexadmin.html">Dashboard</a>
    <a href="add-product.php">Add Product</a>
    <a href="all-products.php">All Products</a>
  </div>

  <div class="main">
    <div class="topbar">
      <h1>Add Product</h1>
      <div>Welcome, Admin</div>
    </div>

    <div class="content">
      <div class="form-container">
        <h2>Add New Product</h2>
        <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="name" required>
          </div>

          <div class="form-group">
            <label>Price (₹)</label>
            <input type="number" name="price" required>
          </div>

          <div class="form-group">
            <label>Category</label>
            <input type="text" name="category" required>
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea name="description" required></textarea>
          </div>

          <div class="form-group">
            <label>Upload Image</label>
            <input type="file" name="image" required accept="image/*">
          </div>

          <button type="submit">Add Product</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
