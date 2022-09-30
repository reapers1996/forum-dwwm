<?php

class UserControleur
{
    public static function login()
    {   
if(isset($_POST['validate'])&&!empty($_POST['pseudo']) AND !empty($_POST['password']))
    {
        //Vérifier si l'user a bien complété tous les champs
        //Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);
        $user = UsersDatabase::connexion($user_pseudo,$user_password);
            if ($user )
            {
                //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $user->getId();
                $_SESSION['lastname'] = $user->getNom();
                $_SESSION['firstname'] = $user->getPrenom();
                $_SESSION['pseudo'] = $user->getPseudo();
                //Rediriger l'utilisateur vers la page d'accueil
                header('Location: index.php');
            }
            else
            {
                $errorMsg = "Votre pseudo ou mot de passe est incorrect...";
                require_once './view/login.php';
                die();
            }
    }
            
        require_once './view/login.php';

}


        //créer un utilisateur SIGNUP
    public static function signup()
    {
        // tester si le formulaire a été posté en POST
        if(isset($_POST['validate'])){
         //creation d'un utilisateur avec le post
         
         $user_pseudo = htmlspecialchars($_POST['pseudo']);
         $user_nom = htmlspecialchars($_POST['nom']);
         $user_prenom = htmlspecialchars($_POST['prenom']);
         $user_password = htmlspecialchars($_POST['password']);
         $user = new Users(0,$user_pseudo,$user_nom,$user_prenom,$user_password);
         UsersDatabase::create($user);
         
         header('Location: index.php?page=login');
        }
        else
        require_once './view/signup.php';

       

        // si pas de formulaire posté, l'afficher

    }
    // se connecter
}
