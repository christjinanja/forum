<?php
  session_start();
  require('actions/questions/showAllQuestionActions.php');
 ?> 
<!DOCTYPE html>
<html lang="en">
 <?php include 'includes/head.php';?>
  <body>
          
  
    <?php include 'includes/navbar.php';?>
          <br></br>

          <div class="container">
            

                  <form method="GET>
                  

                    <div class="form-group  row " >

                        <div class="col-8">
                          <input type="search" name="search" class="form-control">
                        </div>
                        <div class="col-4">
                          <button class="btn btn-success" type="submit">Rechercher</button>
                        </div>

                        <?php 
                            if(isset($errorMsg)){
                            echo '<p>'.$errorMsg.'</p>'; 
                            }
                          ?>

                    </div>

                          
                  </form>

                <br>
                  <div class="container">

                      <div class="card border-success mb-3" >
                      <div class="card-body">

                      <?php 
              while($question = $getAllQuestions->fetch()){
                  ?>
                  <div class="card">
                    <div class="card-header">
                        <a href="article.php?id=<?= $question['id']; ?>">
                          <?= $question['titre']; ?>
                         </a> 
                    </div>
                    <div class="card-body">
                        <?= $question['description']; ?>
                    </div>
                    <div class="card-footer">
                        Publié par <a href="profile.php?id=<?= $question['id_auteur'];?>"> <?= $question['pseudo_auteur']; ?></a> le <?= $question['date_publication'] ?>
                    </div>
                  </div>
                  <br>
                  <?php
                  
              }
          ?>
                        
                      </div>
                    </div>

                  </div>
          </div>
              
          

  </body>
</html>