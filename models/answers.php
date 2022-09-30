<?php

class Answers{
    private int $id;
    private int $auteur;
    private int $question;
    private string $contenu;

    public function __construct($id,$auteur,$question,$contenu){
        $this->id=$id;
        $this->auteur=$auteur;
        $this->question=$question;
        $this->contenu=$contenu;
    }
    
    public function getId()
    {
        return $this->id;
    }
    public function getAuteur()
    {
        return $this->auteur;
    }
    public function getQuestion()
    {
        return $this->question;
    }
    public function getContenu()
    {
        return $this->contenu;
    }
}