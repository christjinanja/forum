<?php
 require('actions/users/securityAction.php');
 require('actions/questions/publishQuestionAction.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    
    <?php include 'includes/navbar.php';?>

    <br><br> 
       <div class="container">
                    
            <div class="card border-info mb-3" >
                <div class="card-body">
                    <form  method="POST" enctype="multipart/form-data" >

                                <?php 
                                if(isset($errorMsg)){
                                    echo '<p>'.$errorMsg.'</p>'; 
                                    }elseif(isset($successMsg)){
                                        echo '<p>'.$successMsg.'</p>';
                                    } 
                                ?>


                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Titre de la quesion</label>
                                    <input type="text" class="form-control" name="title" placeholder="Entrez le titre de la question">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Description de la question</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Entrez la description de la question"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
                                    <textarea class="form-control" name="content" rows="5" placeholder="Entrez le contenu de la question"></textarea>
                                </div>
                                <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"><i class="fas fa-camera"></i>Ajouter une image </label> 
                                <input type="file" class="form-control"  name="image_file">
                                </div>

                                <button type="submit" class="btn btn-primary"  name="validate">Publier la question</button>

                    </form>
            </div>
        </div>

       </div>
</body>
</html>