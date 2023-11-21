<?php
require "../Controller/panierC.php";
$c = new ProduitController();
$tab = $c->showproduct();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1" width="55%">
                                    <thead>
                                        <tr>
                                            <th>img</th>
                                            <th>id</th>
                                            <th>nom</th>
                                            <th>prix</th>
                                            <th>quantite</th>
                                            <th>update</th>
                                            <th>Ajouter</th>
                                            

                                        </tr>
                                    <tbody>
                                    <?php
                                    foreach ($tab as $product) {
                                    ?>
                                        <tr>
                                            <td><?php echo $product['img']; ?></td>
                                            <td><?php echo $product['id']; ?></td>
                                            <td><?php echo $product['nom']; ?></td>
                                            <td><?php echo $product['prix']; ?></td>
                                            <td><?php echo $product['quantite']; ?></td>
                                            <td><h1><a href="updateProduit.php?id=<?= $product['id']; ?>">Update</a></h1></td>
                                            <td><h1><a href="test.php">Ajouter</a></h1></td>
                                            <td><a href="suppprod.php?id=<?php echo $product['id']; ?>"><img src="supp.png"></a></td>
                                            

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                        
                                    </tbody>
                                </table>
</body>
</html>