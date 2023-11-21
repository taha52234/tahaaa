<?php
require "../config.php";
class PanierController
{
    public function showPanier()
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM produits";
        try {
            $result = $db->query($sql);
            return $result;
        } catch (Exception $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
    public function ajouter_produit($produit)
    {
        $sql = "INSERT into produits VALUES (null,:nom,:prix,:quantite,:img)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                'img' => $produit->getImage(),
                'nom' => $produit->getNom(),
                'prix' => $produit->getPrix(),
                'quantite' => $produit->getQuantite(),
                
            ]);
        }
        catch(Exception $e){
            die("ERROR: " . $e->getMessage());
        }
    }
    public function supprimer_produit($id)
    {
        $db = config::getConnexion();
        $sql = "DELETE FROM produits WHERE id = :id";
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
}
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
    public function addproduct($product)
    {
        $sql = "INSERT into produit VALUES (:img,:id,:nom,:prix,:quantite)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                'img'=> $product->getImage(),
                'id'=> $product->getID(),
                'nom' => $product->getNom(),
                'prix' => $product->getPrix(),
                'quantite'=> $product->getQuantite(),
                
                
                
            ]);
        }
        catch(Exception $e){
            die("ERROR: " . $e->getMessage());
        }
    }
    public function supprimer_prod($id)
    {
        $db = config::getConnexion();
        $sql = "DELETE FROM produit WHERE id = :id";
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
    public function showProduit($id){
        $sql = "SELECT * from produit where id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $Product = $query->fetch();
            return $Product;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function updateProduit($product, $id){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE produit SET 
                    img = :img,
                    id = :id,
                    nom = :nom,
                    prix  = :prix,
                    quantite = :quantite
                WHERE id = :id'
            );
            $query->execute([
                
                'img'=> $product->getImage(),
                'id'=> $id,
                'nom' => $product->getNom(),
                'prix' => $product->getPrix(),
                'quantite'=> $product->getQuantite(),
                
            ]);
            //echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
}
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
