<?php
$products = [];

if (file_exists("products.json")) {
  $products = json_decode(file_get_contents("products.json"), true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Products</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f7f9;
      padding: 30px;
    }

    .product-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .product-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      padding: 20px;
      text-align: center;
    }

    .product-card img {
      max-width: 100%;
      height: 150px;
      object-fit: contain;
      margin-bottom: 10px;
    }

    .product-card h3 {
      margin: 10px 0 5px;
      color: #2c3e50;
    }

    .product-card p {
      margin: 5px 0;
    }

    .product-card small {
      color: #888;
    }
  </style>
</head>
<body>
  <h1>📦 All Products</h1>
  <div class="product-container">
    <?php foreach ($products as $product): ?>
      <div class="product-card">
        <?php if (!empty($product['image'])): ?>
          <img src="<?= htmlspecialchars($product['image']) ?>" alt="Product Image">
        <?php endif; ?>
        <h3><?= htmlspecialchars($product['name']) ?></h3>
        <p>₹<?= htmlspecialchars($product['price']) ?></p>
        <p><?= htmlspecialchars($product['desc']) ?></p>
        <small><?= htmlspecialchars($product['category']) ?></small>
      </div>
    <?php endforeach; ?>
  </div>
</body>
</html>
