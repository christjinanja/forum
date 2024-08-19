<?php

require('actions/database.php');

//Récuperer l'id de l'utilisateur
if (isset($_GET['id']) AND !empty($_GET['id'])){

    //L'id de l'utilisateur
    $idOfUser = $_GET['id'];
    
    //Vérifier si l'user existe
    $checkIfUserExists = $bdd->prepare('SELECT pseudo, nom, prenom FROM users WHERE id = ?');
    $checkIfUserExists->execute(array($idOfUser));


    if($checkIfUserExists->rowCount() > 0){

        //Récupérer les informations de l'utilisateur
        $userInfos = $checkIfUserExists->fetch();

        $user_pseudo = $userInfos['pseudo'];
        $user_lastname = $userInfos['nom'];
        $user_firstname = $userInfos['prenom'];

        //Récupérer les questions postées par l'utilisateur (SELECT * FROM questions WHERE id_auteur = :id)
        $getHisQuestions = $bdd->prepare('SELECT * FROM questions WHERE id_auteur = ? ORDER BY id DESC');
        $getHisQuestions->execute(array($idOfUser));


    }else{
        $errorMsg = "Utilisateur introuvable";
        
    }

}else{
    $errorMsg = " Aucun utilisateur trouvé";
}