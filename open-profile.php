<?php
require_once ("db-config.php");

if (isset($_GET['username']) && $dbh->isUsernameTaken($_GET['username'])): ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="./css/astro_style.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="./js/FollowButton.js"></script>
    <?php
    $accountResult = $dbh->getAccountFromUsername($_GET['username']);
    ?>
    <script src="./js/UserProfile.js"></script>
    <title>KittyGram Profile: <?php echo $accountResult['username'] ?></title>
  </head>

  <body>
    <!-- Inclusione della navbar -->
    <?php require_once("./components/navbar.php") ?>

    <!-- Inclusione della finestra modale dei follower -->
    <div id="followersModalContainer"> <?php echo require_once ("./modals/followers-modal.php") ?></div>

    <!-- Inclusione della finestra modale dei seguiti -->
    <div id="followingModalContainer"> <?php echo require_once ("./modals/following-modal.php") ?> </div>

    <sidebar>
      <?php require_once("./components/profile-sidebar.php"); ?>
    </sidebar>

    <!-- 3 bottoni per numero di: POST, FOLLOWERS, SEGUITI -->
    <div class="container d-flex justify-content-between mb-5 align-items-center">
      <p><?php echo $dbh->getNumPostFromId($accountResult['id']) ?> post</p>
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#followersModal">
        <?php echo $dbh->getFollowerFromId($accountResult['id']) ?> follower
      </button>
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#followingModal">
        <?php echo $dbh->getFollowingFromId($accountResult['id']) ?> following
      </button>
    </div>

    <!-- bio -->
    <div class="container d-flex justify-content-center mt-3">
      <h6 class="text-center">
        <em><?php echo $accountResult['user_bio']; ?></em>
      </h6>
    </div>

    <!-- barra di "POST" e "ADOPTIONS" -->
    <?php
    // Determina la pagina corrente
    $current_route = isset($_GET['route']) ? $_GET['route'] : 'posts';
    ?>

    <nav class="navbar navbar-expand">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
          <div class="navbar-nav mx-auto">
            <!-- tasto POSTS (con icona relativa) -->
            <a class="nav-link mx-3 <?php echo $current_route == 'posts' ? 'active' : ''; ?>" aria-current="page" href="open-profile.php?username=<?php echo $_SESSION['username'] ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1z"/>
            </svg> POSTS</a>
            <!-- tasto ADOPTIONS (con icona relativa) -->
            <a class="nav-link mx-3 <?php echo $current_route == 'adoptions' ? 'active' : ''; ?>" href="open-profile.php?username=<?php echo $_SESSION['username'] ?>&route=adoptions">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-heart-fill" viewBox="0 0 16 16">
                <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.707L8 2.207 1.354 8.853a.5.5 0 1 1-.708-.707z"/>
                <path d="m14 9.293-6-6-6 6V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5zm-6-.811c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.691 0-5.018"/>
            </svg> ADOPTIONS</a>
          </div>
        </div>
      </div>
    </nav>



    <?php if(!isset($_GET['route']) || $_GET['route'] == 'post'): ?>
    <!-- posts container -->
    <div class="container mt-5" id="userPostsContainer">
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-3">
            <img src="./img/cat-example4.jpg" class="card-img-top w-100"
              onclick="redirectToUserPost('./img/cat-example4.jpg')" alt="example1" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-3">
            <img src="./img/cat-example5.jpg" class="card-img-top w-100"
              onclick="redirectToUserPost('./img/cat-example5.jpg')" alt="example2" />
          </div>
        </div>
      </div>
    </div>
    <?php elseif($_GET['route'] == 'adoptions'): ?>
    <!-- adoptions container -->
    <div class="container mt-5" id="adoptionsContainer">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="./img/cat-example1.jfif" class="card-img-top w-100" onclick="redirectToUserPost('./img/cat-example1.jfif')" id="post1" alt="example1">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="./img/cat-example2.jfif" class="card-img-top w-100" onclick="redirectToUserPost('./img/cat-example2.jfif')" id="post2" alt="example2">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="./img/cat-example3.jfif" class="card-img-top w-100" onclick="redirectToUserPost('./img/cat-example3.jfif')" id="post3" alt="example3">
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
  </body>

  </html>

<?php else:
  header('Location: ./index.php');
endif;

