<?php

require('actions/database.php');

// Valider le formulaire
if (isset($_POST['validate'])) {

    // Vérifier si les champs ne sont pas vides
    if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content'])) {

        // Les données de la question
        $question_title = htmlspecialchars($_POST['title']);
        $question_description = nl2br(htmlspecialchars($_POST['description']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_date = date('d/m/Y');
        $question_id_author = $_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];

        // Traitement de l'image
        $image = '';
        if (!empty($_FILES['image_file']['tmp_name'])) {
            $file_basename = pathinfo($_FILES['image_file']['name'], PATHINFO_FILENAME);
            $file_extension = pathinfo($_FILES['image_file']['name'], PATHINFO_EXTENSION);
            $new_image_name = $file_basename . '_' . date("Ymd_His") . '.' . $file_extension;
            $target_directory = "images/";
            $target_path = $target_directory . $new_image_name;

            // Déplacer le fichier téléchargé
            if (move_uploaded_file($_FILES['image_file']['tmp_name'], $target_path)) {
                $image = $new_image_name;
            } else {
                $errorMsg = "Erreur lors du téléchargement de l'image.";
            }
        }

        // Insérer la question sur le site
        try {
            $insertQuestionOnWebsite = $bdd->prepare('INSERT INTO questions (titre, description, contenu, id_auteur, pseudo_auteur, date_publication, image) VALUES (?, ?, ?, ?, ?, ?, ?)');
            $insertQuestionOnWebsite->execute(array(
                $question_title,
                $question_description,
                $question_content,
                $question_id_author,
                $question_pseudo_author,
                $question_date,
                $image
            ));

            $successMsg = "Votre question a bien été publiée sur le site.";
        } catch (PDOException $e) {
            $errorMsg = "Erreur lors de l'insertion dans la base de données: " . $e->getMessage();
        }

    } else {
        $errorMsg = "Veuillez remplir tous les champs.";
    }
}
?>
