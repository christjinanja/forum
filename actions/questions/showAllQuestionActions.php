<?php

require('actions/database.php');
include 'includes/head.php';

//récupérer les question par défaut sans la recgerche 
$getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');

//verifier si une recherche a été lancer par l'utilisateur
if(isset($_GET['search']) AND !empty($_GET['search'])){
    

    //récupérer la recherche effectuée par l'utilisateur
    $userSearch = $_GET['search'];

    //récupérer tt les questions qui correspond à la recherche (en fonction du titre)
    $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%'.$userSearch.'%" ORDER BY id DESC');
    
    if($getAllQuestions->rowCount() > 0) {



   
    }else{
        $errorMsg = "Aucun résultat trouver ";
    }
}
