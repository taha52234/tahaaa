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
    $db = config::getConnexion();

    try {
        $checkSql = "SELECT * FROM produits WHERE (nom = :nom && cin = :cin)";
        $checkQuery = $db->prepare($checkSql);
        $checkQuery->execute([
            'nom' => $produit->getNom(),
            'cin' => $produit->getCin(),
        ]);
        $existingProduct = $checkQuery->fetch();

        if ($existingProduct) {
            $updateSql = "UPDATE produits SET quantite = quantite + :quantite WHERE nom = :nom";
            $updateQuery = $db->prepare($updateSql);
            $updateQuery->execute([
                'quantite' => $produit->getQuantite(),
                'nom' => $produit->getNom(),
            ]);
        } else {
            $insertSql = "INSERT INTO produits (nom, prix, quantite, img,cin) VALUES (:nom, :prix, :quantite, :img,:cin)";
            $insertQuery = $db->prepare($insertSql);
            $insertQuery->execute([
                'img' => $produit->getImage(),
                'nom' => $produit->getNom(),
                'prix' => $produit->getPrix(),
                'quantite' => $produit->getQuantite(),
                'cin' => $produit->getCin(),
            ]);
        }
    } catch (Exception $e) {
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

    public function ajouter_achat($cin, $name)
{
    // First, retrieve the id from produits based on the provided name
    $db = config::getConnexion();
    $selectQuery = "SELECT id FROM produit WHERE nom = :name";
    $dateA = date("Y-m-d H:i:s");
    try {
        $selectStatement = $db->prepare($selectQuery);
        $selectStatement->execute(['name' => $name]);
        $row = $selectStatement->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            // Handle the case where the name doesn't exist in produits
            return false;
        }

        $id = $row['id'];
        
        // Now, perform the INSERT into achats
        $insertQuery = "INSERT INTO achats (cin, id,dateA) VALUES (:cin, :id,:dateA)";
        $insertStatement = $db->prepare($insertQuery);
        $insertStatement->execute([
            'cin' => $cin,
            'id' => $id,
            'dateA' => $dateA
        ]);

        // Return true if the insertion is successful
        return true;
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
        $selectQuery = "SELECT achats.id, achats.cin,achats.dateA, produit.nom
                FROM achats
                JOIN produit ON achats.id = produit.id";
try {
    $selectStatement = $db->prepare($selectQuery);
    $selectStatement->execute();
    $result = $selectStatement->fetchAll(PDO::FETCH_ASSOC);

    if (!$result) {
        // Handle the case where there are no matching records
        return false;
    }


    return $result;
            
        } catch (Exception $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
    public function Show_achats()
    {
        $db = config::getConnexion();
        $sql = "SELECT id FROM achats ";
        try {
            
        } catch (Exception $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
    public function showproduct1()
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
        $sql = "INSERT into user VALUES (:cin,:nom,:prenom,:email)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                'cin' => $user->getCin(),
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'email' => $user->getEmail(),
          
                
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
