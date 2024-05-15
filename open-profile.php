<?php
require_once ("db-config.php");

if (isset($_GET['username']) && $dbh->isUsernameTaken($_GET['username'])): ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="css/astro_style.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
    <script src="./js/UserProfile.js"></script>
    <script src="./js/FollowButton.js"></script>
    <?php
    $accountResult = $dbh->getAccountFromUsername($_GET['username']);
    ?>
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
        <p><?php echo $dbh->getFollowerFromId($accountResult['id']) ?> follower</p>
      </button>
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#followingModal">
        <p><?php echo $dbh->getFollowingFromId($accountResult['id']) ?> following</p>
      </button>
    </div>

    <!-- bio -->
    <div class="container d-flex justify-content-center mt-3">
      <h6 class="text-center">
        <em><?php echo $accountResult['user_bio']; ?></em>
      </h6>
    </div>

    <!-- posts container -->
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-3">
            <img src="./img/cat-example4.jpg" class="card-img-top w-100"
              onclick="redirectToUserPost('/img/cat-example4.jpg')" alt="example1" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-3">
            <img src="./img/cat-example5.jpg" class="card-img-top w-100"
              onclick="redirectToUserPost('/img/cat-example5.jpg')" alt="example1" />
          </div>
        </div>
      </div>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
  </body>

  </html>

<?php else:
  header('Location: ./index.php');
endif;

