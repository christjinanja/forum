<?php
session_start();
require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Verifier si l'user a bien completer tt les champs 
    if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password'])){
    
        //les donners de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);  
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //Verifier si l'user n'existe pas deja sur le site  (on utilise une requete preparee pour eviter les injections SQL)  (SELECT COUNT(*) FROM users WHERE pseudo = :pseudo) est equivalente à (SELECT COUNT(*) FROM users WHERE pseudo =?)
        $checkIfUserALreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserALreadyExists->execute(array($user_pseudo));

        if($checkIfUserALreadyExists->rowCount() == 0){

            //si l'user n'existe pas, on l'inscrit sur le site  (INSERT INTO users(pseudo, nom, prenom, mdp)VALUES(?, ?,?,?))
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, nom, prenom, mdp)VALUES(?, ?, ?, ?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

            //on recupere les informations de l'user pour les stocker dans la session  (SELECT id, pseudo, nom, prenom FROM users WHERE nom =? AND prenom =? AND pseudo =?)
            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom = ? AND prenom = ? AND pseudo = ?');
            $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));

            $userInfos = $getInfosOfThisUserReq->fetch();

            //Authentifier l'utilisateur sur le site et récupérés ses données dans des variables global session
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $userInfo['id'];
            $_SESSION['lastname'] = $userInfo['nom'];
            $_SESSION['firstname'] = $userInfo['prenom'];
            $_SESSION['pseudo'] = $userInfo['pseudo'];

            //redirection vers la page d'accueil  (ici index.php)
            header('Location: index.php');


        }else{
            $errorMsg = "L'utilisateure existe déjà sur le site  ";
        }


    }else{
        $errorMsg = "Veuillez complèter tout les champs... "; 
    }



}