<?php
class ProfilControleur
{
    public static function afficher($id)
    {
        $user = UsersDatabase::read($id);
        $questions = QuestionsDatabase::listeQuestionsUtilisateur($id);
        require_once './view/profil.php';
    }
}