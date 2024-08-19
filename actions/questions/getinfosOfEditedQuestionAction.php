<?php

require('actions/database.php');

//verifier si l'id de la question est bien passé en paramètre dans l'URL
if(isset($_GET['id'])AND !empty($_GET['id'])){

    $idOfQuestion = $_GET['id'];

    //vérifier si la question exist
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    if ($checkIfQuestionExists->rowCount() > 0) {

        //récupérer les données de la question
        $questionInfos = $checkIfQuestionExists->fetch();
        if ($questionInfos['id_auteur'] == $_SESSION['id']){

            $question_title = $questionInfos['titre'];
            $question_description = $questionInfos['description'];
            $question_content = $questionInfos['contenu'];
        

            $question_description = str_replace('<br />', '', $question_description);
            $question_content = str_replace('<br />', '', $question_content);

        }else{
            $errorMsg = "Vous n'ete pas l'auteur de cette question";
        }

    }else{
        $errorMsg = "Aucune question n'a été trouvée";
    }
  
}else{
    $errorMsg = "Aucune question n'a été trouvée";
}