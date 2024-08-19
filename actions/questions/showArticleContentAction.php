<?php

require('actions/database.php');

// vérifer si l'id de la question est rentrer dans l'url
if (isset($_GET['id']) AND $_GET['id']) {
    //récupérer  l'identifiant de la question
    $idOfTheQuestion = $_GET['id'];
    
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    if($checkIfQuestionExists->rowCount() > 0) {

        $questionsInfos = $checkIfQuestionExists->fetch();

        $question_title = $questionsInfos['titre'];
        $question_description = $questionsInfos['description'];
        $question_content = $questionsInfos['contenu'];
        $image = $questionsInfos['image'];
        $question_id_author = $questionsInfos['id_auteur'];
        $question_pseudo_author = $questionsInfos['pseudo_auteur'];
        $question_publication_date = $questionsInfos['date_publication'];
        
    }else{
        $errorMsg = "Aucune question n'a été trouvée";
    }

}else{
    $errorMsg = "Aucune question n'a été trouvée";
}