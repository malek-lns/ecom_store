<?php
require 'connexion.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM produits WHERE id = ?");
$stmt->execute([$id]);

header("Location: admin.php");
