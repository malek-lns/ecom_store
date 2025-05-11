<?php
require 'connexion.php';

$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$image = $_POST['image'];
$categorie = $_POST['categorie'];

$sql = "INSERT INTO produits (nom, description, prix, image, categorie) 
        VALUES (?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nom, $description, $prix, $image, $categorie]);

header("Location: admin.php");
