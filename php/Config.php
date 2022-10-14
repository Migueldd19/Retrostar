<?php 
require('conectarDB.php');
$result = $connexion->query('SELECT COUNT(*) as total_products FROM product WHERE active = 1');
$row = $result->fetch_assoc();
$num_total_rows = $row['total_products'];
?>