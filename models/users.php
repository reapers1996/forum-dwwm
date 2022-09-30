<?php

class Users{
    private int $id;
    private String $pseudo;
    private String $nom;
    private string $prenom;
    private string $mdp;

    public function __construct($id,$pseudo,$nom,$prenom,$mdp){
        $this->id=$id;
        $this->pseudo=$pseudo;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->mdp=$mdp;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getPseudo()
    {
        return $this->pseudo;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getMdp()
    {
        return $this->mdp;
    }
}