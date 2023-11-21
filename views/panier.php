<?php
require "../controller/panierC.php";
$c = new PanierController();
$tab = $c->showPanier();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="panier">
    <a href="index.html" class="lien1">Retourner</a>
    <br>
    <br>
    <section>
        <table>
            <tr>
                <th>image</th>
                <th>Id</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
            </tr>
            <?php
            foreach ($tab as $produit) {
            ?>
                <tr>
                    <td><img src="<?php echo $produit['img'] ?>" /></td>
                    <td><?php echo $produit['id']; ?></td>
                    <td><?php echo $produit['nom']; ?></td>
                    <td><?php echo $produit['prix']; ?></td>
                    <td><?php echo $produit['quantite']; ?></td>
                    <td><a href="supprimerProduit.php?id=<?php echo $produit['id']; ?>"><img src="supp.png"></a></td>
                </tr>
            <?php
            }
            ?>
            <tr class="total">
                <th>Total:
                    <?php
                    $total = 0;
                    foreach ($tab as $produit) {
                        $total +=  $produit['prix'] * $produit['quantite'];
                    }
                    echo $total . "$";
                    ?>
                </th>

            </tr>
            <a href="index.html" class="lien2">Confirmer</a>
            </tr>
        </table>
    </section>

</body>

</html>