<?php
$host = 'localhost';
$db   = 'my';
$user = 'root';
$pass = 'root';
$port = 8889;

$conn = new mysqli("localhost", "root", "root", "my", 8889);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$id = intval($_GET['id']);

// Optional: delete image file also (not shown here)
$conn->query("DELETE FROM wedding_venues WHERE id = $id");

header("Location: all-wedding-venues.php"); // update this to your current page name
exit;
?>
