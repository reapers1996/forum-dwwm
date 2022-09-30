<?php 
require_once './controleurs/controleurs.php';
require_once './models/modeles.php';
require_once './database/database.php';
    session_start();
    if ((!isset($_GET['page']))||($_GET['page']=="accueil"))
    {
        //index.php?page=accueil
        AccueilControleur::index();
    }
    switch ()