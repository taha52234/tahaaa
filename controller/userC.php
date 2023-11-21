<?php
require "../config.php";
class UserController
{
    public function showUser()
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM user";
        try {
            $result = $db->query($sql);
            return $result;
        } catch (Exception $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
    public function ajouter_user($user)
    {
        $sql = "INSERT into user VALUES (:cin,:nom,:prenom,:email,:n_carte)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                'cin' => $user->getCin(),
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'email' => $user->getEmail(),
                'n_carte' => $user->getN_carte(),
                
            ]);
        }
        catch(Exception $e){
            die("ERROR: " . $e->getMessage());
        }
    }
    public function supp_user($cin)
    {
        $db = config::getConnexion();
        $sql = "DELETE FROM user WHERE cin = :cin";
        $req = $db->prepare($sql);
        $req->bindValue(':cin', $cin);
        try {
            $req->execute();
        } catch (Exception $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
}