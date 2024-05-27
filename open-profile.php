<?php
require_once ("db-config.php");

if (isset($_GET['username']) && $dbh->isUsernameTaken($_GET['username'])): ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="./css/style.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <?php
    $accountResult = $dbh->getAccountFromUsername($_GET['username']);
    $posts = $dbh->getUserPosts($_GET['username']);
    $followers = $dbh->getFollowersAccount($accountResult['id']);
    $following = $dbh->getFollowedAccount($accountResult['id']);
    ?>
    <script src="./js/UserProfile.js"></script>
    <title>KittyGram Profile: <?php echo $accountResult['username'] ?></title>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
    <script src="js/sendNotification.js"></script>
  </head>



  <body>
    <!-- Inclusione della navbar -->
    <?php require_once ("./components/navbar.php") ?>

    <!-- Inclusione della finestra modale dei follower -->
    <div id="followersModalContainer"> <?php echo require_once ("./modals/followers-modal.php") ?></div>

    <!-- Inclusione della finestra modale dei seguiti -->
    <div id="followingModalContainer"> <?php echo require_once ("./modals/following-modal.php") ?> </div>

    <div class="container d-flex justify-content-center mt-5 py-5">
      <img src="./img/<?php echo $accountResult['pic']; ?>" class="rounded-circle" alt="profile-pic" width="150"
        height="150" />
      <ul class="ms-5">
        <li class="list-group-item d-flex justify-content-between align-items-center" id="name-last-name">
          <h2><?php echo $accountResult['first_name'] . " " . $accountResult['last_name']; ?></h2>
          <?php if ($accountResult['username'] == $_SESSION['username']): ?>
            <button type="button" class="btn btn-light ms-4" onclick="document.location.href='userSettings.php?'">
              Edit Profile
            </button>
          <?php else: ?>
            <!-- Add follow button if session username and get username are not the same -->
            <script src="./js/FollowButton.js"></script>
            <?php
            $isFollowing = $dbh->isFollowing($_SESSION['username'], $accountResult['username']);
            $buttonDesignClass = $isFollowing ? "btn-light" : "btn-primary";
            $buttonText = $isFollowing ? "Following" : "Follow";
            ?>
            <button id="followButton" type="button" class="btn ms-4 btn-light <?php echo $buttonDesignClass ?>"
              followed="<?php echo htmlspecialchars($accountResult['username']); ?>"
              follower="<?php echo htmlspecialchars($_SESSION['username']); ?>">
              <!-- Button text -->
              <?php echo $buttonText ?>
            </button>
          <?php endif; ?>
        </li>

        <li class="list-group-item">
          <h5>@<?php echo $accountResult['username'] ?></h5>
        </li>

        <li class="list-inline-item mt-3 me-4">
          <h5 class="font-weight-bold mb-0 d-block ms-2 "><?php echo $dbh->getNumPostFromId($accountResult['id']) ?>
          </h5>
          <small class="text-muted"> <i class="fas fa-image mr-1"></i>Post</small>
        </li>
        <li class="list-inline-item me-4">
          <a data-bs-toggle="modal" data-bs-target="#followersModal">
            <h5 class="font-weight-bold mb-0 d-block ms-4"><?php echo count($followers) ?></h5><small class="text-muted">
              <i class="fas fa-user mr-1"></i>Followers</small>
          </a>
        </li>
        <li class="list-inline-item">
          <a data-bs-toggle="modal" data-bs-target="#followingModal">
            <h5 class="font-weight-bold mb-0 d-block ms-4"><?php echo count($following) ?></h5><small class="text-muted">
              <i class="fas fa-user mr-1"></i>Following</small>
          </a>
        </li>

        <li class="list-group-item mt-3">
          <h6>
            <em><?php echo nl2br(wordwrap($accountResult['user_bio'], 50, "\n", true)); ?></em>
          </h6>
        </li>


      </ul>
    </div>


    <!-------------- divisione di "POST" e "ADOPTIONS" -------------->
    <?php
    // Determina la pagina corrente
    $current_route = isset($_GET['route']) && ($_GET['route'] == 'posts' || $_GET['route'] == 'adoptions') ? $_GET['route'] : 'posts';
    ?>

    <!-- Contenitore esterno per centrare la barra indicatore attivo -->
    <div class=" container-fluid justify-content-center ">
      <!-- Contenitore della barra indicatore attivo -->
      <div class="active-indicator-container">
        <div class="active-indicator">
          <div class="half-bar half-bar-left <?php echo $current_route == 'posts' ? 'active' : 'inactive'; ?>"></div>
          <div class="half-bar half-bar-right <?php echo $current_route == 'adoptions' ? 'active' : 'inactive'; ?>"></div>
        </div>
      </div>
    </div>


    <nav class="navbar navbar-expand">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
          <div class="navbar-nav mx-auto">
            <!-- tasto POSTS (con icona relativa) -->
            <a class="nav-link mx-3 <?php echo $current_route == 'posts' ? 'active' : ''; ?>" aria-current="page"
              href="open-profile.php?username=<?php echo $_SESSION['username'] ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images"
                viewBox="0 0 16 16">
                <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                <path
                  d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1z" />
              </svg> POSTS</a>
            <!-- tasto ADOPTIONS (con icona relativa) -->
            <a class="nav-link mx-3 <?php echo $current_route == 'adoptions' ? 'active' : ''; ?>"
              href="open-profile.php?username=<?php echo $_SESSION['username'] ?>&route=adoptions">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-house-heart-fill" viewBox="0 0 16 16">
                <path
                  d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.707L8 2.207 1.354 8.853a.5.5 0 1 1-.708-.707z" />
                <path
                  d="m14 9.293-6-6-6 6V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5zm-6-.811c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.691 0-5.018" />
              </svg> ADOPTIONS</a>
          </div>
        </div>
      </div>
    </nav>



    <?php if (!isset($_GET['route']) || $_GET['route'] != 'adoptions'): ?>
      <!-- posts container -->
      <div class=" mt-5 container" id="userPostsContainer">
        <div class="row">
          <?php foreach ($posts as $post): ?>
            <div class="col-md-4">
              <a href="open-post.php?post_id=<?php echo $post['post_id'] ?>">
                <div class="post-image-container"> <img src="./img/<?php echo $post['medias'][0] ?>"
                    class="img-fluid rounded shadow-sm" /></div>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php elseif ($_GET['route'] == 'adoptions'): ?>
      <!-- adoptions container -->
      <div class="container mt-5" id="adoptionsContainer">
        <div class="row">
          <div class="col-md-4">
            <div class="post-image-container">
              <img src="./img/cat-example1.jfif" class="img-fluid rounded shadow-sm"
                onclick="document.location.href='open-post.php?username=<?php echo urlencode($_SESSION['username']); ?>'"
                id="post1">
            </div>
          </div>
          <div class="col-md-4">
            <div class="post-image-container">
              <img src="./img/cat-example2.jfif" class="card-img-top w-100"
                onclick="document.location.href='open-post.php?username=<?php echo urlencode($_SESSION['username']); ?>'"
                id="post2" alt="example2">
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-3">
              <img src="./img/cat-example3.jfif" class="card-img-top w-100"
                onclick="document.location.href='open-post.php?username=<?php echo urlencode($_SESSION['username']); ?>'"
                id="post3" alt="example3">
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

