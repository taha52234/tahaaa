<?php
class User
{
    private ?string $cin = null;
    private ?string $nom = null;
    private ?string $prenom= null;
    private ?string $email = null;
    private ?string $n_carte = null;


    public function __construct($c, $n, $pr,$e,$nc)
    {
        $this->cin= $c;
        $this->nom = $n;
        $this->prenom = $pr;
        $this->email = $e;
        $this->n_carte = $nc;
        

    }
    public function getCin()
    {
        return $this->cin;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getN_carte()
    {
        return $this->n_carte;
    }
    public function setCin($c)
    {
        return $this->cin = $c;
    }
    public function setNom($n)
    {
        return $this->nom = $n;
    }
    public function setPrenom($pr)
    {
        return $this->prenom = $pr;
    }
    public function setEmail($e)
    {
        return $this->email = $e;
    }
    public function setN_carte($nc)
    {
        return $this->n_carte = $nc;
    }
   
    
}