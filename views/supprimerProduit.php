<?php
include "../controller/panierC.php";
$c = new PanierController();
echo $_GET["id"];
$c->supprimer_produit($_GET["id"]);
header('Location:panier.php');