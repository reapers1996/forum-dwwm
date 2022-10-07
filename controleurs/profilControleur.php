<?php
class ProfilControleur
{
    public static function afficher($id)
    {
        verificationConnection();
        $user = UsersDatabase::read($id);
        $questions = QuestionsDatabase::listeQuestionsUtilisateur($id);
        require_once './view/profil.php';
    }
}