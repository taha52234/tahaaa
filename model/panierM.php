<?php
class Panier
{
    private ?string $img = null;
    private ?int $id = null;
    private ?int $prix = null;
    private ?int $quantite = null;
    private ?string $nom = null;
    private ?string $cin = null;


    public function __construct($idp=null, $pr, $q,$n,$i,$c)
    {
        $this->id = $idp;
        $this->prix = $pr;
        $this->nom = $n;
        $this->quantite = $q;
        $this->prix = $pr;
        $this->img = $i;
        $this->cin = $c;

    }
    public function getCin()
    {
        return $this->cin;
    }

    public function setCin($cin)
    {
        $this->cin = $cin;
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
