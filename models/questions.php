<?php

class Questions{
    private int $id;
    private string $titre;
    private string $description;
    private string $contenu;
    private int $id_auteur;

    public function __construct($id,$titre,$description,$contenu,$id_auteur){
        $this->id=$id;
        $this->titre=$titre;
        $this->description=$description;
        $this->contenu=$contenu;
        $this->id_auteur=$id_auteur;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getTitre()
    {
        return $this->titre;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getContenu()
    {
        return $this->contenu;
    
    }
    public function getIdAuteur()
    {
        return $this->id_auteur;
    }
}