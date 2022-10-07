<?php
require_once 'accueilControleur.php';
require_once 'profilControleur.php';
require_once 'questioncontroleur.php';
require_once 'userControleur.php';
function verificationConnection()
{
    if (!isset($_SESSION['id']))
        header('location: index.php?page=login');
}