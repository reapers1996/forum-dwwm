<?php
//créer le model question
class Questions{
    private int $id;
    private string $titre;
    private string $description;
    private string $contenu;
    private Users $auteur;
//créer le constructeur
    public function __construct($id,$titre,$description,$contenu,$auteur){
        $this->id=$id;
        $this->titre=$titre;
        $this->description=$description;
        $this->contenu=$contenu;
        $this->auteur=$auteur;
    }
    //chercher un id
    public function getId()
    {
        return $this->id;
    }
    //chercher un titre
    public function getTitre()
    {
        return $this->titre;
    }
    //chercher une description
    public function getDescription()
    {
        return $this->description;
    }
    //chercher un contenu
    public function getContenu()
    {
        return $this->contenu;
    
    }
    //chercher un auteur
    public function getAuteur()
    {
        return $this->auteur;
    }
}