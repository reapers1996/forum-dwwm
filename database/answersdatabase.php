<?php

class AnswersDatabase{
    public static function create($answers)
    {
        try
        {
            $bdd =connectionDB();
            $insertAnswer = $bdd->prepare('INSERT INTO answers(id_auteur, id_question, contenu)VALUES(:id_auteur,
             :id_question, :contenu)');
            $insertAnswer->execute(['id_auteur'=>$answers->getIdAuteur(),'id_question'=>$answers->getIdQuestion(),'contenu'=>$answers->getContenu()]);
        }
        catch(PDOException $e){
            die('Une erreur PDO a été trouvée : ' . $e->getMessage());
        }
    }
    public static function read($id):Answers
    {
        try
        {
            $bdd = connectionDB();
            $readAnswer = $bdd->prepare('SELECT * FROM answers where id=:id');
            $readAnswer->execute(['id'=>$id]);
            $data= $readAnswer->fetch();
            $answer = new Answers($data['id'],$data['id_auteur'],$data['id_question'],$data['contenu']);
            return $answer;
        }
        catch(PDOException $e){
            die('Une erreur PDO a été trouvée : ' . $e->getMessage());
        }
    }
    // a faire le update
    public static function getAnswers($idQuestion):ArrayObject
    {
        try
        {
            $bdd = connectionDB();
            $readAnswer = $bdd->prepare('SELECT * FROM answers where id_question=:id');
            $readAnswer->execute(['id'=>$idQuestion]);
            $data= $readAnswer->fetchAll();
            $liste = new ArrayObject();
            foreach($data as $element)
            {
                $answer = new Answers($element['id'],$element['id_auteur'],$element['id_question'],$element['contenu']);
                $liste->append($answer);
            }
            
            return $liste;
        }
        catch(PDOException $e){
            die('Une erreur PDO a été trouvée : ' . $e->getMessage());
        }
    }

    }
