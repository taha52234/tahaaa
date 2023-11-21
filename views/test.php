<?php
require "../controller/panierC.php";
require "../model/productM.php";
$error = "";
$product = null;
$productC = new ProduitController();
if (isset($_POST["img"]) && isset($_POST["id"]) && isset($_POST["nom"]) && isset($_POST["prix"]) && isset($_POST["quantite"])) //input control
{
    if (!empty($_POST["img"]) && !empty($_POST["id"])&& !empty($_POST["nom"])&& !empty($_POST["prix"])&& !empty($_POST["quantite"])) {
        $product = new Produit($_POST["img"], $_POST["id"], $_POST["nom"], $_POST["prix"], $_POST["quantite"]);    
        $productC->addproduct($product);
        header('Location:produitback.php');
    } else {
        $error = "information manquante";
    }
} 



?>

<form method="post" action="">
    <p>AJOUT:</p>
    <label for="img">image :</label>
    <input type="text" name="img" id="img" required>

    <label for="nom">id du produit :</label>
    <input type="number" name="id" id="id" required>

    <label for="nom">Nom du produit :</label>
    <input type="text" name="nom" id="nom" required>

    <label for="prix">Prix du produit :</label>
    <input type="text" name="prix" id="prix" required>

    <label for="nom">quantite :</label>
    <input type="number" name="quantite" id="quantite" required>




    <button type="submit" href="produitback.php">Enregistrer</button>
</form>

