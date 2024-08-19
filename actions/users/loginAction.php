<?php
session_start();
require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Verifier si l'user a bien completer tt les champs 
    if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){
    
        //les donners de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);

        //Verifier si l'user existe sur le site  (SELECT* FROM users WHERE pseudo = :pseudo) est equivalente à (SELECT* FROM users WHERE pseudo =?)
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo)); 

        if($checkIfUserExists->rowCount() > 0) {

            //Recupérer les donnees de l'utilisateur
            $userInfos = $checkIfUserExists->fetch();
            
            //Verifier si le mot de passe est correcte (password_verify($motDePasse, $mdpEnBaseDeDonnees))
            if(password_verify($user_password, $userInfos['mdp'])) {

                  //Authentifier l'utilisateur sur le site et récupérés ses données dans des variables global session
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['lastname'] = $userInfos['nom'];
            $_SESSION['firstname'] = $userInfos['prenom'];
            $_SESSION['pseudo'] = $userInfos['pseudo'];
            

            //redirection vers la page d'accueil  (ici index.php)
            header('Location: index.php');

            }else {
                $errorMsg = "Votre mot de passe est incorrecte... ";
            }
            
        } else {
            $errorMsg = "votre pseudo est incorrecte... ";
        }
            



    }else{
        $errorMsg = "Veuillez complèter tout les champs... "; 
    }



}