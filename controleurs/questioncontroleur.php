<?php
class QuestionControleur
{
    public static function mesquestion($id)
    {
        $questions = QuestionsDatabase::listeQuestionsUtilisateur($id);
        require_once './view/mes_questions.php';
    }
    public static function modifierquestion($id)
    {
        // tester si le formulaire a bien était était modifier avec POST
  
        if(!isset($_POST['id'])){
            //le formulaire n'a pas été posté, afficher le formulaire pré rempli
            $question = QuestionsDatabase::read($id);
            require_once './view/modifier_question.php';  
           } 
           
           else

        {
    // si formulaire posté alors mettre a jour la question et réafficher la question
              //modifier d'une question avec le post
              $question_id = $_POST['id'];
              $question_titre = htmlspecialchars($_POST['title']);
              $question_description = htmlspecialchars($_POST['description']);
              $question_contenu = htmlspecialchars($_POST['content']);
              $question_auteur = UsersDatabase::read($_SESSION['id']);
  
              $question = new Questions($question_id,$question_titre,$question_description,$question_contenu,$question_auteur);
              
              QuestionsDatabase::modifier($question);
              
           header('Location: index.php?page=modifierquestion&id='.$_POST['id']);
        }
           
    }
     //créer une question
     public static function publierquestion()
     {
             // tester si le formulaire a été posté en POST
   
             if(isset($_POST['validate'])){
              //creation d'une question avec le post
              $question_titre = htmlspecialchars($_POST['title']);
              $question_description = htmlspecialchars($_POST['description']);
              $question_contenu = htmlspecialchars($_POST['content']);
              $question_auteur = UsersDatabase::read($_SESSION['id']);
 
              $question = new Questions(0,$question_titre,$question_description,$question_contenu,$question_auteur);
              QuestionsDatabase::create($question);
              
             header('Location: index.php?page=mesquestions&id='.$_SESSION['id']);
             } 
             // si pas de formulaire posté, l'afficher
             else
             require_once './view/publier_question.php';
     }

     public static function lireunequestion($idQuestion)
     {
        
        if(!isset($_POST['validate'])){
            //le formulaire n'a pas été posté, afficher le formulaire pré rempli
            $question = QuestionsDatabase::read($idQuestion);
            $answers = QuestionsDatabase::getAnswers($idQuestion);
            require_once './view/unequestion.php';  
           } 
           else
           {
            $question = QuestionsDatabase::read($idQuestion);
            $auteur = UsersDatabase::read($_GET['id']);
    // traiter le $ Post
             $contenu= htmlspecialchars($_POST['contenu']);
            $reponse = new Answers(0,$auteur,$question,$contenu);
     // créer une nouvelle ranswer 
            AnswersDatabase::create($reponse);

            header('Location: index.php?page=unequestion&id='.$idQuestion);
           }
     }
}