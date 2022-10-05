<?php
require_once 'answersdatabase.php';

require_once 'questiondatabase.php';
require_once 'usersdatabase.php';
//commande pour se connecter a la base de donnée 
function connectionDB()
{
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'root', '');
    }catch(Exception $e){
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }
    return $bdd;
}


