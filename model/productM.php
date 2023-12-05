<?php
class Produit
{
    private ?string $img = null;
    private ?int $id = null;
    private ?string $prix = null;
    private ?int $quantite = null;
    private ?string $nom = null;
    


    public function __construct($i, $idp, $n, $pr, $q,)
    {
        $this->img = $i;
        $this->id = $idp;
        $this->nom = $n;
        $this->prix = $pr;
        $this->quantite = $q;
        
       
    }
    public function getPrix()
    {
        return $this->prix;
    }
    public function getImage()
    {
        return $this->img;
    }
    public function getQuantite()
    {
        return $this->quantite;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getID()
    {
        return $this->id;
    }
    public function setPrix($pr)
    {
        return $this->prix = $pr;
    }
    public function setNom($n)
    {
        return $this->nom = $n;
    }
    public function setQuantite($q)
    {
        return $this->quantite = $q;
    }
    public function setImage($i)
    {
        return $this->img = $i;
    }
    public function setID($idp)
    {
        return $this->id = $idp;
    }
   
    
}