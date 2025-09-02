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
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Add Wedding Venue - Admin Panel</title>
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
    input, textarea {
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
  </style>
</head>
<body>
   <div class="sidebar">
    <h2>Admin Panel</h2>
   <a href="indexadmin.html"> Dashboard</a>
    <!-- <a href="#"> Orders</a> -->
    <a href="add-product.php">Add Product</a>
    <a href="all-products.php"> All Products </a>
  </div>

  <div class="main">
    <div class="topbar">
      <h1>Add Wedding Venue</h1>
      <div>Welcome, Admin</div>
    </div>

    <div class="content">
      <h2>🏛️ Add New Wedding Venue</h2>
      <form action="save-venue.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Venue Name" required />
        <input type="text" name="location" placeholder="Location" required />
        <textarea name="description" placeholder="Short Description" rows="4" required></textarea>
        <input type="file" name="image" accept="image/*" required />
        <div style="margin-bottom: 20px;">
  <select name="category_id" required style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid #ccc;">
    <option value="">Select Category</option>
    <?php
      $cat_query = "SELECT * FROM venue_categories";
      $cat_result = $conn->query($cat_query);
      while($row = $cat_result->fetch_assoc()) {
          echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['name']) . '</option>';
      }
    ?>
  </select>
  <div style="text-align: right; margin-top: 8px;">
    <a href="manage-venue-categories.php" style="font-size: 14px; color: #2980b9; text-decoration: none;">➕ Manage Categories</a>
  </div>
</div>

        <button type="submit">✅ Add Venue</button>
      </form>
    </div>
  </div>
</body>
</html>
