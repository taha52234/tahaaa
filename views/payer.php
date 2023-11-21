<?php
require "../controller/userC.php";
require "../model/userM.php";
$error = "";
$user = null;
$userC = new UserController();
if (isset($_POST["cin"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["n_carte"])) //input control
{
    if (!empty($_POST["cin"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["n_carte"])) {
        $user = new User($_POST["cin"], $_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["n_carte"],);    
        $userC->ajouter_user($user);
        header('Location:donate.php');
    } else {
        $error = "information manquante";
    }
} ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style7.css">
        <title>login</title>



    </head>
    <body>
        <section>
            <div class="form-box">  
                <div class="form-value">
                    <form action="" method="POST">
                        <h2>Confirmation de paiement</h2>
                        <div class="inputbox">
                            <input type="text" name="cin" required>
                            <label for="">CIN</label>


                        </div>
                        <div class="inputbox">
                            <input type="text" name="nom" required>
                            <label for="">Nom</label>

                        </div>
                        <div class="inputbox">
                            <input type="text" name="prenom" required>
                            <label for="">Prenom</label>

                        </div>
                        <div class="inputbox">
                            <input type="text" name="email" required>
                            <label for="">Email</label>

                        </div>
                        <div class="inputbox">
                            <input type="text" name="n_carte" required>
                            <label for="">N_Carte</label>

                        </div>
                       
                       </div>
                       <input type="submit" value="Ajouter">
                       
                   


                    </form>

                </div>
            </div>
        </section>
       
        
    </body>
</html>