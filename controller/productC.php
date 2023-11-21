<?php
require "../config.php";
class ProduitController
{
    public function showproduct()
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM produit ";
        try {
            $result = $db->query($sql);
            return $result;
        } catch (Exception $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
    public function addproduct($produit)
    {
        $sql = "INSERT into produit VALUES (:id,:nom,:prix)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                'id'=> $produit->getID(),
                'nom' => $produit->getNom(),
                'prix' => $produit->getPrix(),
                
            ]);
        }
        catch(Exception $e){
            die("ERROR: " . $e->getMessage());
        }
    }
    
}
