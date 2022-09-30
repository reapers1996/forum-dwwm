<?php

class Questions{
    private int $id;
    private string $titre;
    private string $description;
    private string $contenu;
    private Users $auteur;

    public function __construct($id,$titre,$description,$contenu,$auteur){
        $this->id=$id;
        $this->titre=$titre;
        $this->description=$description;
        $this->contenu=$contenu;
        $this->auteur=$auteur;
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
    public function getAuteur()
    {
        return $this->auteur;
    }
}