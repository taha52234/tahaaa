<?php
include "../controller/userC.php";
$c = new UserController();
echo $_GET["cin"];
$c->supp_user($_GET["cin"]);
header('Location:tables.php');