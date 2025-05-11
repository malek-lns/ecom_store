#  Boutique en ligne — Projet e-commerce PHP/MySQL

Ce projet est une boutique en ligne développée en HTML, CSS, JavaScript, PHP et MySQL.  
Il permet d'afficher dynamiquement des produits à partir d'une base de données, avec ajout et suppression via une interface d'administration.

---

# Structure du projet

| Fichier / Dossier       | Rôle                                                                 |
|-------------------------|----------------------------------------------------------------------|
| `index.php`             | Page principale de la boutique. Affiche les produits dynamiquement. |
| `admin.php`             | Interface pour ajouter et supprimer des produits depuis la base.    |
| `ajouter.php`           | Script PHP qui insère un produit en base depuis le formulaire admin.|
| `supprimer.php`         | Script PHP qui supprime un produit en base par son ID.              |
| `connexion.php`         | Fichier de connexion à la base de données MySQL via PDO.            |
| `styles.css`            | Feuille de style principale du site.                                |
| `script.js`             | JavaScript pour le panier, la recherche, le slider, etc.            |
| `images/`               | Contient les images des produits et du site.                        |

---

# Technologies utilisées

- HTML5 / CSS3
- JavaScript (vanilla)
- PHP (avec PDO)
- MySQL
- XAMPP (en local)

---

# Comment tester le projet en local avec XAMPP

1. **Télécharger ou cloner** le projet dans `C:\xampp\htdocs\ecom_store`
2. **Lancer XAMPP** et démarrer :
   - Apache
   - MySQL
3. Aller sur [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
4. Créer une base de données appelée **`boutique`**
5. Exécuter ce SQL pour créer la table `produits` :
   ```sql
   CREATE TABLE produits (
     id INT AUTO_INCREMENT PRIMARY KEY,
     nom VARCHAR(100),
     description TEXT,
     prix DECIMAL(10,2),
     image VARCHAR(255),
     categorie VARCHAR(50)
   );

# Ajouter des produits :
# Aller sur http://localhost/ecom_store/admin.php, remplir le formulaire d’ajout, et cliquer sur "Ajouter".
Les produits seront immédiatement insérés dans la base de données.

# Afficher la boutique :
# Accéder à http://localhost/ecom_store/index.php
Les produits ajoutés s’afficheront dynamiquement.
Tu peux les filtrer, les rechercher ou les ajouter au panier.
