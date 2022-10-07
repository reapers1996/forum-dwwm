<?php
// créer la classe de réponses
class AnswersDatabase{
    //pouvoir créer une réponse
    public static function create($answers)
    {
        try
        {
            $bdd =connectionDB();
            $insertAnswer = $bdd->prepare('INSERT INTO answers(id_auteur, id_question, contenu)VALUES(:id_auteur,
             :id_question, :contenu)');
            $insertAnswer->execute(['id_auteur'=>$answers->getAuteur()->getId(),'id_question'=>$answers->getQuestion()->getId(),'contenu'=>$answers->getContenu()]);
        }
        catch(PDOException $e){
            die('Une erreur PDO a été trouvée : ' . $e->getMessage());
        }
    }
    //créer la fonction pour lire les réponses
    public static function read($id):Answers
    {
        try
        {
            $bdd = connectionDB();
            $readAnswer = $bdd->prepare('SELECT * FROM answers where id=:id');
            $readAnswer->execute(['id'=>$id]);
            $data= $readAnswer->fetch();
            $auteur = UsersDatabase::read($data['id_auteur']);
            $question = QuestionsDatabase::read($data['id_question']);
            $answer = new Answers($data['id'],$auteur,$question,$data['contenu']);
            return $answer;
        }
        catch(PDOException $e){
            die('Une erreur PDO a été trouvée : ' . $e->getMessage());
        }
    }
    //fonction pour voir toute les réponses a une question
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
    public static function deleteanwers($idquestion)
{
    try
    {
        $bdd = connectionDB();
        $readQuestion = $bdd->prepare('DELETE FROM answers where id_question=:id_question');
        $readQuestion->execute(['id_question'=>$idquestion]);
        $data= $readQuestion->fetch();
        var_dump($readQuestion);
        var_dump($idquestion);
        return true;
    }
    catch(PDOException $e){
        die('Une erreur PDO a été trouvée : ' . $e->getMessage());
    }
}

    }
