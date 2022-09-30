<?php
    class AccueilControleur
    {
        public static function index()
        {
            $questions = QuestionsDatabase::liste();
            require_once './view/accueil.php';
        }
    }