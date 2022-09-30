<?php

class Answers{
    private int $id;
    private int $id_auteur;
    private int $id_question;
    private string $contenu;

    public function __construct($id,$id_auteur,$id_question,$contenu){
        $this->id=$id;
        $this->id_auteur=$id_auteur;
        $this->id_question=$id_question;
        $this->contenu=$contenu;
    }
    
    public function getId()
    {
        return $this->id;
    }
    public function getIdAuteur()
    {
        return $this->id_auteur;
    }
    public function getIdQuestion()
    {
        return $this->id_question;
    }
    public function getContenu()
    {
        return $this->contenu;
    }
}