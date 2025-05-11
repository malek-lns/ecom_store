<?php require 'connexion.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Ajouter un produit</title>
</head>
<body>
    <h1>Ajouter un produit</h1>
    <form action="ajouter.php" method="POST">
        <input type="text" name="nom" placeholder="Nom du produit" required><br>
        <textarea name="description" placeholder="Description"></textarea><br>
        <input type="number" step="0.01" name="prix" placeholder="Prix" required><br>
        <input type="text" name="image" placeholder="images/monimage.jpg" required><br>
        <input type="text" name="categorie" placeholder="Catégorie (ex: yaourt)" required><br>
        <button type="submit">Ajouter</button>
    </form>

    <h2>Produits existants</h2>
    <ul>
        <?php
        $stmt = $pdo->query("SELECT * FROM produits");
        while ($p = $stmt->fetch()) {
            echo "<li>{$p['nom']} ({$p['prix']} €) 
                  <a href='supprimer.php?id={$p['id']}'>Supprimer</a></li>";
        }
        ?>
    </ul>
</body>
</html>
