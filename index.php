<?php 
require_once './controleurs/controleurs.php';
require_once './models/modeles.php';
require_once './database/database.php';
    session_start();
    if ((!isset($_GET['page']))||($_GET['page']=="accueil"))
    {
        //index.php?page=accueil
        AccueilControleur::index();
        die();
    }
    switch ($_GET['page'])
    {
        case 'profil': ProfilControleur::afficher($_GET['id']);
        break;
        case 'login': UserControleur::login();
        break;
        case 'logout': UserControleur::logout();
        break;
        case 'publierquestion': QuestionControleur::publierquestion();
        break;
        case 'modifierquestion' : QuestionControleur::modifierquestion($_GET['id']);
        break;
        case 'signup': UserControleur::signup();
        break;
        case 'unequestion': QuestionControleur::lireunequestion($_GET['id']);
        break;
        case 'mesquestions': QuestionControleur::mesquestion($_GET['id']);
        break;
        default:  AccueilControleur::index();
    }
    