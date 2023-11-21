<?php
include "../controller/panierC.php";
include "../model/productM.php";
$error = "";
$product = null;
$productC = new ProduitController();
if (isset($_POST["img"]) && isset($_POST["id"]) && isset($_POST["nom"]) && isset($_POST["prix"]) && isset($_POST["quantite"])) //input control
{
    if (!empty($_POST["img"]) && !empty($_POST["id"])&& !empty($_POST["nom"])&& !empty($_POST["prix"])&& !empty($_POST["quantite"])) {
        $product = new Produit($_POST["img"], $_POST["id"], $_POST["nom"], $_POST["prix"], $_POST["quantite"]);    
        $productC->updateProduit($product,$_GET['id']);
        header('Location:produitback.php');
    } else {
        $error = "information manquante";
    }
} 
?>
<button><a href="produitback.php">Back to produits</a></button>

    <?php
    if (isset($_GET['id'])) {
        $oldProduit = $productC->showProduit($_GET['id']);
        
    ?>
    <form action="" method="POST">
       
                <label for="img">image :</label>
                <input type="text" id="img" name="img"  value="<?php echo $oldProduit['img'] ?>" />
                <label for="nom">Id produit :</label>
                <input type="number" id="id" name="id"  value="<?php echo $_GET['id'] ?>" />
                <label for="nom">Nom produit :</label>
                <input type="text" id="nom" name="nom" value="<?php echo $oldProduit['nom']?>"/>
                <label for="prix">prix produit:</label>
                <input type="text" id="prix"  name="prix" value="<?php echo $oldProduit['prix']?>"/>
                <label for="nom">quantite :</label>
                <input type="number" id="quantite" name="quantite"  value="<?php echo $oldProduit['quantite'] ?>" />  
                <input type="submit" value="ok">
                


    </form>
    <?php
    }
    ?>

