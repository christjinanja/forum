<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <!-- <a class="navbar-brand" href="#">
  <img src="path/to/logo.png" alt="Forum Logo" style="width: 40px; height: 40px;">
</a> --> 
    <a class="navbar-brand" href="#">Forum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i> <!-- Icône de menu pour le bouton toggler -->
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-home"></i> Les questions
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="publish-question.php">
            <i class="fas fa-plus"></i> Publier une question
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="my-questions.php">
            <i class="fas fa-list"></i> Mes questions
          </a>
        </li>
        <?php 
           if(isset($_SESSION['auth'])){
            ?>
             <li class="nav-item">
              <a class="nav-link" href="profile.php?id=<?= $_SESSION['id'];?>">
                <i class="fas fa-user"></i> Mon profil
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="actions/users/logoutAction.php">
                <i class="fas fa-sign-out-alt"></i> Déconnexion
              </a>
            </li>
            <?php
           }
        ?>
      </ul>
    </div>
  </div>
</nav>
