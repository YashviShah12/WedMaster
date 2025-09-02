<?php
// Database connection
$conn = new mysqli("localhost", "root", "root", "my", 8889);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Handle delete request
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM products WHERE id = $id");
    header("Location: all-products.php");
    exit;
}

// Handle update form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_id'])) {
    $id = intval($_POST['update_id']);
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $imagePath = $_POST['existing_image'];
    if ($_FILES["image"]["error"] == 0) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
        $imagePath = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    }

    $stmt = $conn->prepare("UPDATE products SET name=?, price=?, category=?, image=? WHERE id=?");
    $stmt->bind_param("sissi", $name, $price, $category, $imagePath, $id);
    if ($stmt->execute()) {
        echo "<script>alert('Product updated successfully!'); window.location.href='all-products.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch products
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>All Products - Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f7f9;
      display: flex;
      min-height: 100vh;
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
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 12px;
      border: 1px solid #ccc;
      text-align: left;
    }
    th { background: #27ae60; color: white; }
    td img { max-height: 60px; }
    .actions a {
      margin-right: 10px;
      color: #2980b9;
      text-decoration: none;
    }
    .actions a.delete { color: #e74c3c; }
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
      <h1>All Products</h1>
      <div>Welcome, Admin</div>
    </div>

    <div class="content">
      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Category</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['name'] ?></td>
          <td>₹<?= $row['price'] ?></td>
          <td><?= $row['category'] ?></td>
          <td><img src="<?= $row['image'] ?>" alt="" height="60"></td>
          <td class="actions">
            <a href="edit-product.php?id=<?= $row['id'] ?>">Edit</a>
            <a class="delete" href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this product?')">Delete</a>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</body>
</html>
