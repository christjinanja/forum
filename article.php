<?php 
session_start();
require('actions/questions/showArticleContentAction.php');
require('actions/questions/postAnswerAction.php'); 
require('actions/questions/showAllAnswersOfQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>

    <?php include 'includes/navbar.php';?>
    <br><br>

        <div class="container">

            <div class="card border-info mb-3">
                <div class="card-body">

                
        <?php
            if(isset($errorMsg)){echo $errorMsg;}
        
            if(isset($question_publication_date)){
                ?>
                <section class="show-content">
                    <h3> <?= $question_title;?></h3>
                    <hr>
                    <p><?= $question_description;?></p>
                    <hr>
                    <p><?= $question_content;?></p>
                    <hr>
                    <p> 
                      <img src="images/<?= $image;?>" class="img-thumbnail" width="200" height="200" />
                    </p>
                    <hr>
                    <small><?= '<a href="profile.php?id='.$question_id_author.'">'.$question_pseudo_author. '</a> '.$question_publication_date;?></small>
                </section>
                <br>
                <section class="show-answer">

                    <form class="form-group" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Réponse :</label>
                            <textarea name="answer" class="form-control"></textarea>
                            <br>
                            <button class="btn btn-primary" type="submit" name="validate">Répondre</button>
                        </div>
                    </form>

                    <?php
                        while($answer = $getAllAnswerOfThisQuestion->fetch()){
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <a href="profile.php?id=<?= $answer['id_auteur'];?>">
                                        <?= $answer['pseudo_auteur']; ?>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <?= $answer['contenu']; ?>
                                </div>
                            </div>
                            <br>
                            <?php
                        }
                    ?>

                </section>
                
                <?php
            }
        ?>
                    
                </div>
            </div>

        </div>

    
</body>

    
</body>
</html>