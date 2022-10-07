<?php
 // créer sa classe question
class QuestionsDatabase{
    //pouvoir créer une question
public static function create($question)
    {
        try
        {
            $bdd =connectionDB();
            $insertQuestion = $bdd->prepare('INSERT INTO questions(titre,description,contenu,id_auteur)VALUES(:titre,:description,:contenu,:id_auteur)');
            $insertQuestion->execute(['titre'=>$question->getTitre(),'description'=>$question->getDescription(),'contenu'=>$question->getContenu(),'id_auteur'=>$question->getAuteur()->getId()]);
    
        }
        catch(PDOException $e){
            die('Une erreur PDO a été trouvée : ' . $e->getMessage());
        }
    }
// créer la fonction pour lire une question
public static function read($id):Questions
    {
        try
        {
            $bdd = connectionDB();
            $readQuestion = $bdd->prepare('SELECT * FROM questions where id=:id');
            $readQuestion->execute(['id'=>$id]);
            $data= $readQuestion->fetch();
            $auteur = UsersDatabase::read($data['id_auteur']);
            $question = new Questions($data['id'],$data['titre'],$data['description'],$data['contenu'],$auteur);
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
                $auteur = UsersDatabase::read($element['id_auteur']);
                $question = QuestionsDatabase::read($element['id_question']);
                $answer = new Answers($element['id'],$auteur,$question,$element['contenu']);
                $liste->append($answer);
            }
            
            return $liste;
        }
        catch(PDOException $e){
            die('Une erreur PDO a été trouvée : ' . $e->getMessage());
        }
    }
    //créer une fonction pour créer une liste de questions
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
                $question = new Questions((int)$element['id'],$element['titre'],$element['description'],$element['contenu'],$auteur);
                $liste->append($question);
            }
            
            return $liste;
        }
        catch(PDOException $e){
            die('Une erreur PDO a été trouvée : ' . $e->getMessage());
        }
    }
    //fonction pour afficher la liste des question de l'utilisateur
    public static function listeQuestionsUtilisateur($id):ArrayObject
    {
        try
        {
            $bdd = connectionDB();
            $readAnswers = $bdd->prepare('SELECT * FROM questions WHERE id_auteur=:id');
            $readAnswers->execute(['id'=>$id]);
            $data= $readAnswers->fetchAll();
            $liste = new ArrayObject();
            foreach($data as $element)
            {
                $auteur = UsersDatabase::read($element['id_auteur']);
                $question = new Questions((int)$element['id'],$element['titre'],$element['description'],$element['contenu'],$auteur);
                $liste->append($question);
            }
            
            return $liste;
        }
        catch(PDOException $e){
            die('Une erreur PDO a été trouvée : ' . $e->getMessage());
        }
    }
// modifier une question 
public static function modifier($question)
    {
        try
        {
            $bdd =connectionDB();
            $updateQuestion = $bdd->prepare("UPDATE questions SET titre = :titre, 
            description = :description, contenu = :contenu WHERE questions.id = :id;");

            $updateQuestion->execute(['titre'=>$question->getTitre(),
                                    'description'=>$question->getDescription(),
                             'contenu'=>$question->getContenu(),
                             'id'=>$question->getId()]);
                             var_dump($updateQuestion);
  
        }
        catch(PDOException $e){
            die('Une erreur PDO a été trouvée : ' . $e->getMessage());
        }
    }
// effacer une question
public static function delete($id)
{
    try
    {
        AnswersDatabase::deleteanwers($id);
        $bdd = connectionDB();
        $readQuestion = $bdd->prepare('DELETE FROM questions where id=:id');
        $readQuestion->execute(['id'=>$id]);
        $data= $readQuestion->fetch();
        var_dump($readQuestion);
        return true;
    }
    catch(PDOException $e){
        die('Une erreur PDO a été trouvée : ' . $e->getMessage());
    }
}
}