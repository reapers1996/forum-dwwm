<?php
//créer le model réponses
class Answers{
    private int $id;
    private Users $auteur;
    private Questions $question;
    private string $contenu;
//créer le constructeur 
    public function __construct($id,$auteur,$question,$contenu){
        $this->id=$id;
        $this->auteur=$auteur;
        $this->question=$question;
        $this->contenu=$contenu;
    }
    //chercher un id
    public function getId()
    {
        return $this->id;
    }
    //chercher un'auteur
    public function getAuteur()
    {
        return $this->auteur;
    }
    //chercher une question
    public function getQuestion()
    {
        return $this->question;
    }
    //chercher un contenu
    public function getContenu()
    {
        return $this->contenu;
    }
}