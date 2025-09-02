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

$id = $_GET['id'] ?? 0;
$product = null;

if ($id) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
}

if (!$product) {
    die("Product not found!");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Edit Product - Admin Panel</title>
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
      max-width: 800px;
      margin: 0 auto;
    }
    .content h2 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 26px;
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
    button {
      width: 100%;
      padding: 12px;
      background: #2980b9;
      color: #fff;
      border: none;
      font-size: 18px;
      border-radius: 6px;
      cursor: pointer;
    }
    button:hover {
      background: #1f6391;
    }
    .current-img {
      margin-bottom: 10px;
    }
    .current-img img {
      width: 100px;
      height: auto;
      border: 1px solid #ccc;
      margin-top: 5px;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="indexadmin.html"> Dashboard</a>
    <!-- <a href="#"> Orders</a> -->
    <a href="add-product.html"> Product</a>
    <a href="sho.html"> All Products </a>
  </div>

  <div class="main">
    <div class="topbar">
      <h1>Edit Product</h1>
      <div>Welcome, Admin</div>
    </div>

    <div class="content">
      <h2>✏️ Edit Product</h2>
      <form action="update-product.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $product['id'] ?>" />
        <input type="text" name="name" value="<?= $product['name'] ?>" required />
        <input type="number" name="price" value="<?= $product['price'] ?>" required />
        <textarea name="desc" rows="3" required><?= $product['description'] ?></textarea>

        <div class="current-img">
          Current Image:<br>
          <?php if ($product['image']): ?>
            <img src="<?= $product['image'] ?>" alt="Current Image" />
          <?php else: ?>
            No image uploaded
          <?php endif; ?>
        </div>
        <input type="file" name="image" accept="image/*" />

        <select name="category" required>
          <option value="">Select Category</option>
          <option <?= $product['category'] == 'Electronics' ? 'selected' : '' ?>>Electronics</option>
          <option <?= $product['category'] == 'Clothing' ? 'selected' : '' ?>>Clothing</option>
          <option <?= $product['category'] == 'Books' ? 'selected' : '' ?>>Books</option>
          <option <?= $product['category'] == 'Other' ? 'selected' : '' ?>>Other</option>
        </select>

        <button type="submit">💾 Update Product</button>
      </form>
    </div>
  </div>

</body>
</html>
