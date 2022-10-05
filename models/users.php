<?php
//créer le model utilisateur
class Users{
    private int $id;
    private String $pseudo;
    private String $nom;
    private string $prenom;
    private string $mdp;
    // créer le contructeur
    public function __construct($id,$pseudo,$nom,$prenom,$mdp){
        $this->id=$id;
        $this->pseudo=$pseudo;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->mdp=$mdp;
    }
    //chercher un id
    public function getId()
    {
        return $this->id;
    }
    //chercher un pseudo
    public function getPseudo()
    {
        return $this->pseudo;
    }
    //chercher un nom
    public function getNom()
    {
        return $this->nom;
    }
    //chercher un prénom
    public function getPrenom()
    {
        return $this->prenom;
    }
    //chercher un mdp
    public function getMdp()
    {
        return $this->mdp;
    }
}