<?php
session_start();
require "../controller/panierC.php";
require "../model/userM.php";
$error = "";
$user = null;
$panierC = new PanierController();
$total=$_GET["total"];
if (isset($_POST["cin"]) && isset($_POST["n_carte"])){ //input control
    if (!empty($_POST["cin"]) &&  !empty($_POST["n_carte"])) {
        //$user = new User($_POST["cin"], $_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["n_carte"],);    
        //$userC->ajouter_user($user);
        $tab = $panierC->showPanier();
        foreach ($tab as $produit) {
            if($produit["cin"] == $_SESSION['cin'])
            $panierC->ajouter_achat($_POST["cin"],$produit["nom"]);
        }
        header('Location:sendmail.php?total='.$total);
    } else {
        $error = "information manquante";
    }
} 


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
    <title>payer</title>
    <link rel="stylesheet" href="style7.css">
    </head>
    <body>
    
        <section>
            <div class="form-box">  
                <div class="form-value">
                    <form action="" method="POST" id="inscriptionForm" >
                        <h2>Confirmation de paiement</h2>
                        <div class="inputbox">
                            <input type="text" name="cin" id="cin" required>
                            <label for="">CIN</label>


                        </div>
                        
                        <div class="inputbox">
                            <input type="text" name="n_carte" id="n_carte" required>
                            <label for="">N_Carte</label>
                        </div>    

                       
                       <input type="submit" value="Payer" >
        
                       


                    </form>

                </div>
            </div>
        </section>
       
        
    </body>
</html>