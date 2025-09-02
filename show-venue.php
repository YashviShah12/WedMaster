<?php
$conn = new mysqli("localhost", "root", "root", "my", 8889);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM wedding_venues ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Wedding Venues - Admin Panel</title>
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
      flex: 1;
    }

    h2 {
      text-align: center;
      font-size: 28px;
      margin-bottom: 30px;
      color: #2c3e50;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 24px;
    }

    .card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      overflow: hidden;
      transition: transform 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .card-body {
      padding: 16px;
    }

    .card-body h3 {
      font-size: 20px;
      margin-bottom: 10px;
      color: #2980b9;
    }

    .card-body p {
      font-size: 15px;
      color: #555;
      margin-bottom: 8px;
    }

    .action-buttons {
      margin-top: 15px;
      display: flex;
      justify-content: space-between;
    }

    .btn {
      padding: 6px 12px;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: opacity 0.3s;
    }

    .btn:hover {
      opacity: 0.85;
    }

    .btn-edit {
      background: #3498db;
    }

    .btn-delete {
      background: #e74c3c;
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
      <h1>All Wedding Venues</h1>
      <div>Welcome, Admin</div>
    </div>

    <div class="content">
      <h2>🏛️ All Wedding Venues</h2>
      
      <?php if (isset($_GET['updated'])): ?>
        <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border-radius: 4px;">
          Venue updated successfully!
        </div>
      <?php endif; ?>

      <div class="grid">
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="card">
            <?php 
              // Handle both full path and just filename cases
              $imagePath = $row['image'];
              if (strpos($imagePath, 'uploads/') === false) {
                $imagePath = 'uploads/' . $imagePath;
              }
            ?>
            <img src="<?= htmlspecialchars($imagePath) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
            <div class="card-body">
              <h3><?= htmlspecialchars($row['name']) ?></h3>
              <p><strong>Location:</strong> <?= htmlspecialchars($row['location']) ?></p>
              <p><?= htmlspecialchars($row['description']) ?></p>

              <div class="action-buttons">
                <a href="edit-venue.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                <a href="delete-venue.php?id=<?= $row['id'] ?>" 
                   onclick="return confirm('Are you sure you want to delete this venue?');" 
                   class="btn btn-delete">Delete</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>

  <script>
    // Force refresh the page when coming back from edit to avoid cache issues
    if (performance.navigation.type === 2) {
      location.reload(true);
    }
  </script>
</body>
</html>