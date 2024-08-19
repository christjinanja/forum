<?php

require('actions/database.php');

$getAllAnswerOfThisQuestion = $bdd->prepare('SELECT id_auteur, pseudo_auteur, id question, contenu FROM answers WHERE id_question = ? ORDER BY id DESC');
$getAllAnswerOfThisQuestion->execute(array($idOfTheQuestion));