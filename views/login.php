<?php
session_start();

require "../controller/panierC.php";
require "../model/userM.php";
$error = "";
$user = null;
$userC = new UserController();
if (isset($_POST["cin"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"])){ //input control
    if (!empty($_POST["cin"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"])) {
        $user = new User($_POST["cin"], $_POST["nom"], $_POST["prenom"], $_POST["email"],);
        $userC->ajouter_user($user);
        $_SESSION['cin'] = $_POST['cin'];
        echo $_SESSION['cin'];
        header('Location:donate.php');
    } else {
        $error = "information manquante";
    }
} 


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
    <title>login</title>
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
                            <input type="text" name="nom" id="nom" required>
                            <label for="">Nom</label>

                        </div>
                        <div class="inputbox">
                            <input type="text" name="prenom" id="prenom" required>
                            <label for="">Prenom</label>

                        </div>
                        <div class="inputbox">
                            <input type="text" name="email" id="email" required>
                            <label for="">Email</label>

                        </div>
                        

                       
                       <input type="submit" value="login" >
        
                       


                    </form>

                </div>
            </div>
        </section>
       
        
    </body>
    <script>
        
        function validateForm() {
            var cin = document.getElementById("cin").value;
            var nom = document.getElementById("nom").value;
            var prenom = document.getElementById("prenom").value;
            var email = document.getElementById("email").value;
            var cinField = document.getElementById('cin');
            var nomField = document.getElementById('nom');
            var prenomField = document.getElementById('prenom');
            var emailField = document.getElementById('email');
            var isValid = true;
            clearMessages();

            var nompattern = /^[a-zA-Z]+$/;
            var emailpattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var cinpattern = /^\d{8}$/;
            if (cin<8||!cinpattern.test(cin)) {
                displayErrorMessage(cinField, "Veuillez entrer un cin valide (8 chiffres).");
                isValid = false;
            } else {
                displaySuccessMessage(cinField, "Correct");
            }
            if (nom.length < 2 || !nompattern.test(nom)) {
                displayErrorMessage(nomField, "Veuillez entrer un nom valide (lettres uniquement et au moins 2 caractères).");
                isValid = false;
            } else {
                displaySuccessMessage(nomField, "Correct");
            }
            if (prenom.length < 2 || !nompattern.test(prenom)) {
                displayErrorMessage(prenomField, "Veuillez entrer un prénom valide (lettres uniquement et au moins 2 caractères).");
                isValid = false;
            } else {
                displaySuccessMessage(prenomField, "Correct");
            }
            if (!emailpattern.test(email)) {
                displayErrorMessage(emailField, "Veuillez entrer un email valide.");
                isValid = false;
            } else {
                displaySuccessMessage(emailField, "Correct");
            }
            
            return isValid;


            
        }
        document.getElementById("inscriptionForm").addEventListener("submit",function (event)
        {
            let isValid = validateForm();
            if(isValid==false)
                event.preventDefault();
        });
        function displayErrorMessage(field, message) {
            var errorMessage = document.createElement("span");
            errorMessage.className = "error-message";
            errorMessage.textContent = message;
            field.insertAdjacentElement("afterend", errorMessage);
        }

        function displaySuccessMessage(field, message) {
            var successMessage = document.createElement("span");
            successMessage.className = "success-message";
            successMessage.textContent = message;
            field.insertAdjacentElement("afterend", successMessage);
        }

        function clearMessages() {
            var errorMessages = document.querySelectorAll(".error-message");
            errorMessages.forEach(function (errorMessage) {
                errorMessage.remove();
            });

            var successMessages = document.querySelectorAll(".success-message");
            successMessages.forEach(function (successMessage) {
                successMessage.remove();
            });
        }
    </script>
</html>