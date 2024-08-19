<?php

require('actions/database.php');

if (isset($_POST['title']) AND ! empty($_POST['description']) AND ! empty($_POST['content'])) {

    $new_question_title = htmlspecialchars($_POST['title']);
    $new_question_desciption = nl2br(htmlspecialchars($_POST['description']));
    $new_question_content = nl2br(htmlspecialchars($_POST['content']));

    $editQuestionOnWebsite = $bdd->prepare('UPDATE questions SET titre = ?, description = ?, contenu = ? WHERE id = ?');
    $editQuestionOnWebsite->execute(array($new_question_title, $new_question_desciption, $new_question_content, $idOfQuestion));

    header('Location: my-questions.php');

}else{
    $errorMsg = "Veuillez compléter tout les champs";
}