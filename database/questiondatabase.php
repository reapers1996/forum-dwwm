<?php
 
class QuestionsDatabase{
// create
public static function create($question)
    {
        try
        {
            $bdd =connectionDB();
            $insertQuestion = $bdd->prepare('INSERT INTO question(titre,description,contenu,id_auteur)VALUES(:titre,:description,:contenu,:id_auteur)');
            $insertQuestion->execute(['titre'=>$question->getTitre(),'description'=>$question->getQuestion(),'contenu'=>$question->getContenu(),'id_auteur'=>$question->getIdAuteur(),]);
        }
        catch(PDOException $e){
            die('Une erreur PDO a été trouvée : ' . $e->getMessage());
        }
    }
// read une question
public static function read($id):Questions
    {
        try
        {
            $bdd = connectionDB();
            $readQuestion = $bdd->prepare('SELECT * FROM questions where id=:id');
            $readQuestion->execute(['id'=>$id]);
            $data= $readQuestion->fetch();
            $question = new Questions($data['id'],$data['titre'],$data['description'],$data['contenu'],$data['id_auteur']);
            return $question;
        }
        catch(PDOException $e){
            die('Une erreur PDO a été trouvée : ' . $e->getMessage());
        }
    }
// liste reponses a la question
public static function getAnswers($id):ArrayObject
    {
        try
        {
            $bdd = connectionDB();
            $readAnswers = $bdd->prepare('SELECT * FROM answers where id_question=:id');
            $readAnswers->execute(['id'=>$id]);
            $data= $readAnswers->fetchAll();
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
    public static function liste():ArrayObject
    {
        try
        {
            $bdd = connectionDB();
            $readAnswers = $bdd->prepare('SELECT * FROM questions');
            $readAnswers->execute();
            $data= $readAnswers->fetchAll();
            $liste = new ArrayObject();
            foreach($data as $element)
            {
                $auteur = UsersDatabase::read($element['id_auteur']);
                $question = new Questions($element['id'],$element['titre'],$element['description'],$auteur,$element['contenu']);
                $liste->append($question);
            }
            
            return $liste;
        }
        catch(PDOException $e){
            die('Une erreur PDO a été trouvée : ' . $e->getMessage());
        }
    }
// modifier une question avec tb
// effacer une question avec tb
}