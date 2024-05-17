<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="css/astro_style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/FollowButton.js"></script>
    <script src="js/Navbar.js" defer></script>
    <script src="js/IncludeModals.js" defer></script>
    
    <title>User Profile</title>
  </head>


  <body>
    <!-- Inclusione della navbar -->
    <div id="navbarContainer"></div>

    <!-- Inclusione della finestra modale dei follower -->
    <div id="followersModalContainer"></div>

    <!-- Inclusione della finestra modale dei seguiti -->
    <div id="followingModalContainer"></div>


    <!-- user-info container -->
    <div class="container d-flex justify-content-center mt-5 py-5">
        <img src="./img/User_ProfilePic.PNG" class="rounded-circle" alt="profile-pic" width="150" height="150">
        <ul>
            <li class="list-group-item"><h2> Astro Baleno </h2></li>
            <li class="list-group-item"><h4> @astrobaleno </h4></li>
            <button type="button" class="btn btn-light mt-4 opacity-100" onclick="window.location.href='userSettings.php'">Modifica Profilo</button>
        </ul>
    </div>

    <!-- 3 bottoni per numero di: POST, FOLLOWERS, SEGUITI -->
    <div class="container d-flex justify-content-between mb-5 align-items-center">
      <span>3 post</span>
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#followersModal">3 follower</button>
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#followingModal">1 seguiti</button>
    </div>

    <!-- bio -->
    <div class="container d-flex justify-content-center mt-3">
      <h6 class="text-center"><em>" Si alza il vento... bisogna tentare di vivere. "</em></h6>
    </div>


    <!-- posts container -->
    <div class="container mt-5">
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

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>
