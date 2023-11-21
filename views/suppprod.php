<?php
include "../controller/panierC.php";
$c = new ProduitController();
echo $_GET["id"];
$c->supprimer_prod($_GET["id"]);
header('Location:produitback.php');